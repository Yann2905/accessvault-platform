#!/bin/bash
set -e

echo "========================================="
echo "  AccessVault - Démarrage"
echo "========================================="

echo ""
echo "=== Configuration ==="
echo "DATABASE_URL: ${DATABASE_URL:0:30}..."
echo "APP_ENV: ${APP_ENV}"
echo "APP_URL: ${APP_URL}"
echo "===================="

# Vérifier les variables obligatoires
if [ -z "$APP_KEY" ]; then
    echo "❌ ERREUR: APP_KEY n'est pas défini!"
    exit 1
fi

if [ -z "$DATABASE_URL" ]; then
    echo "❌ ERREUR: DATABASE_URL n'est pas défini!"
    exit 1
fi

# Attendre la base de données
echo ""
echo "⏳ Attente base de données PostgreSQL..."

MAX_RETRIES=30
RETRY_COUNT=0

until php -r "
try {
    \$url = parse_url(getenv('DATABASE_URL'));
    
    if (!\$url || !isset(\$url['host'])) {
        throw new Exception('DATABASE_URL invalide');
    }
    
    \$host = \$url['host'];
    \$port = \$url['port'] ?? 5432;
    \$database = ltrim(\$url['path'], '/');
    \$username = \$url['user'] ?? '';
    \$password = \$url['pass'] ?? '';
    
    \$pdo = new PDO(
        \"pgsql:host=\$host;port=\$port;dbname=\$database\",
        \$username,
        \$password,
        [PDO::ATTR_TIMEOUT => 5, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    echo \"✅ Connexion DB réussie\n\";
    exit(0);
} catch (Exception \$e) {
    echo \"❌ Erreur DB: \" . \$e->getMessage() . \"\n\";
    exit(1);
}
"; do
  RETRY_COUNT=$((RETRY_COUNT + 1))
  if [ $RETRY_COUNT -ge $MAX_RETRIES ]; then
    echo "❌ Échec connexion DB après $MAX_RETRIES tentatives"
    exit 1
  fi
  echo "Tentative $RETRY_COUNT/$MAX_RETRIES..."
  sleep 2
done

# Migrations
echo ""
echo "🔄 Migrations..."
php artisan migrate --force || {
    echo "❌ Erreur lors des migrations"
    exit 1
}

# Seeders
echo ""
echo "🌱 Seeders..."
php artisan db:seed --force || {
    echo "⚠️ Seeders ignorés (déjà exécutés ou erreur non critique)"
}

# Configuration du storage
echo ""
echo "📂 Configuration du stockage..."

# Créer les dossiers nécessaires s'ils n'existent pas
mkdir -p /app/storage/app/public/avatars
mkdir -p /app/public/storage
mkdir -p /app/public/avatars

# Créer le lien symbolique
php artisan storage:link --force || echo "⚠️ Storage link déjà créé"

# Copier les avatars si nécessaire (pour la compatibilité)
if [ -d "/app/storage/app/public/avatars" ]; then
    cp -rn /app/storage/app/public/avatars/* /app/public/avatars/ 2>/dev/null || true
fi

# Définir les permissions finales
chown -R www-data:www-data \
    /app/storage \
    /app/bootstrap/cache \
    /app/public/storage \
    /app/public/avatars

chmod -R 775 \
    /app/storage \
    /app/bootstrap/cache \
    /app/public/storage \
    /app/public/avatars

# Nettoyage du cache
echo ""
echo "🧹 Nettoyage du cache..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Optimisation Laravel
echo ""
echo "⚡ Optimisation Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Génération de la configuration Nginx
echo ""
echo "🔧 Configuration Nginx (PORT=${PORT:-10000})..."
export PORT=${PORT:-10000}
envsubst '${PORT}' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

echo "✅ Nginx configuré sur le port $PORT"

# Démarrage de Supervisord
echo ""
echo "🚀 Démarrage de l'application..."
echo "========================================="

exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf