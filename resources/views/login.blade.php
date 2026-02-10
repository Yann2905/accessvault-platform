<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Connexion - GS2E</title>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
   
    <style>
        /* ===================================================================
           VARIABLES CSS POUR LA PALETTE DE COULEURS PROFESSIONNELLE
           =================================================================== */
        :root {
            /* Palette principale - Bleu marine professionnel avec accents dorés */
            --primary-color: #1a365d;        /* Bleu marine foncé */
            --primary-light: #2d4a7c;        /* Bleu marine moyen */
            --primary-dark: #0f1f3d;         /* Bleu marine très foncé */
            --accent-color: #f59e0b;         /* Or/Orange pour les accents */
            --accent-hover: #d97706;         /* Or/Orange foncé au survol */
            
            /* Couleurs neutres */
            --bg-color: #f8fafc;             /* Fond général très clair */
            --white: #ffffff;                /* Blanc pur */
            --text-dark: #1e293b;            /* Texte foncé */
            --text-medium: #64748b;          /* Texte moyen */
            --border-color: #e2e8f0;         /* Bordures légères */
            --input-bg: #ffffff;             /* Fond des champs de saisie */
            
            /* Ombres pour la profondeur */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* ===================================================================
           RESET ET STYLES DE BASE
           =================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
        }

        /* ===================================================================
           CONTENEUR PRINCIPAL DU FORMULAIRE
           =================================================================== */
        .login-container {
            width: 100%;
            max-width: 450px;
            background: var(--white);
            border-radius: 20px;
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            animation: slideIn 0.5s ease-out;
        }

        /* Animation d'entrée du formulaire */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===================================================================
           EN-TÊTE AVEC LOGO ET DÉGRADÉ
           =================================================================== */
        .login-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            padding: 40px 30px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Effet de motif décoratif en arrière-plan */
        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Conteneur du logo avec animation */
        .logo-wrapper {
            position: relative;
            z-index: 2;
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--white);
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: var(--shadow-lg);
            transition: transform 0.3s ease;
        }

        .logo-wrapper:hover {
            transform: translateY(-5px);
        }

        .logo-wrapper img {
            height: 60px;
            width: auto;
            max-width: 100%;
            display: block;
        }

        /* Titre de la section */
        .login-title {
            position: relative;
            z-index: 2;
            color: var(--white);
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.5px;
        }

        /* ===================================================================
           CORPS DU FORMULAIRE
           =================================================================== */
        .login-body {
            padding: 40px 30px;
        }

        /* Sous-titre informatif */
        .login-subtitle {
            text-align: center;
            color: var(--text-medium);
            font-size: 15px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* ===================================================================
           GROUPES DE CHAMPS DE FORMULAIRE
           =================================================================== */
        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        /* Labels des champs */
        .form-label {
            display: block;
            color: var(--text-dark);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        /* Champs de saisie */
        .form-input {
            width: 100%;
            padding: 14px 16px;
            font-size: 15px;
            color: var(--text-dark);
            background: var(--input-bg);
            border: 2px solid var(--border-color);
            border-radius: 10px;
            transition: all 0.3s ease;
            outline: none;
            font-family: inherit;
        }

        /* Focus sur les champs de saisie */
        .form-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(26, 54, 93, 0.1);
            background: var(--white);
        }

        /* Placeholder des champs */
        .form-input::placeholder {
            color: var(--text-medium);
            opacity: 0.6;
        }

        /* Effet au survol des champs */
        .form-input:hover:not(:focus) {
            border-color: var(--primary-light);
        }

        /* Icônes dans les champs (optionnel) */
        .form-group.has-icon {
            position: relative;
        }

        .form-group.has-icon .form-input {
            padding-left: 45px;
        }

        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-medium);
            pointer-events: none;
        }

        /* ===================================================================
           BOUTON DE CONNEXION
           =================================================================== */
        .btn-submit {
            width: 100%;
            padding: 15px 24px;
            font-size: 16px;
            font-weight: 600;
            color: var(--white);
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--accent-hover) 100%);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        /* Effet de brillance au survol */
        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-submit:active {
            transform: translateY(0);
            box-shadow: var(--shadow-sm);
        }

        /* État de chargement du bouton */
        .btn-submit .indicator-progress {
            display: none;
        }

        .btn-submit.loading .indicator-label {
            display: none;
        }

        .btn-submit.loading .indicator-progress {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* Spinner de chargement */
        .spinner-border {
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: var(--white);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* ===================================================================
           MODAL D'ALERTE PERSONNALISÉE
           =================================================================== */
        .custom-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background: var(--white);
            padding: 30px 35px;
            border-radius: 15px;
            box-shadow: var(--shadow-xl);
            min-width: 320px;
            max-width: 90vw;
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .modal-message {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 25px;
            text-align: center;
            line-height: 1.6;
        }

        .modal-footer {
            text-align: center;
        }

        .modal-btn {
            padding: 12px 30px;
            border: none;
            background: var(--primary-color);
            color: var(--white);
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .modal-btn:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* ===================================================================
           ALERTE D'ERREUR
           =================================================================== */
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.5;
        }

        /* ===================================================================
           RESPONSIVE DESIGN POUR MOBILE
           =================================================================== */
        
        /* Tablettes et petits écrans */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .login-container {
                max-width: 100%;
                border-radius: 15px;
            }

            .login-header {
                padding: 30px 20px 25px;
            }

            .logo-wrapper {
                padding: 15px 25px;
            }

            .logo-wrapper img {
                height: 50px;
            }

            .login-title {
                font-size: 24px;
            }

            .login-body {
                padding: 30px 20px;
            }

            .login-subtitle {
                font-size: 14px;
                margin-bottom: 25px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-input {
                padding: 12px 14px;
                font-size: 16px; /* Évite le zoom automatique sur iOS */
            }

            .btn-submit {
                padding: 14px 20px;
                font-size: 15px;
            }
        }

        /* Smartphones en mode portrait */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .login-header {
                padding: 25px 15px 20px;
            }

            .logo-wrapper {
                padding: 12px 20px;
            }

            .logo-wrapper img {
                height: 45px;
            }

            .login-title {
                font-size: 22px;
            }

            .login-body {
                padding: 25px 15px;
            }

            .login-subtitle {
                font-size: 13px;
            }

            .form-label {
                font-size: 13px;
            }

            .form-input {
                padding: 12px;
                font-size: 16px;
            }

            .btn-submit {
                padding: 13px 18px;
            }

            .modal-content {
                padding: 25px 20px;
                min-width: 280px;
            }

            .modal-message {
                font-size: 15px;
            }
        }

        /* Très petits smartphones */
        @media (max-width: 360px) {
            .logo-wrapper img {
                height: 40px;
            }

            .login-title {
                font-size: 20px;
            }

            .modal-content {
                min-width: 260px;
            }
        }

        /* ===================================================================
           AMÉLIORATION DE L'ACCESSIBILITÉ
           =================================================================== */
        
        /* Mode sombre automatique selon les préférences système */
        @media (prefers-color-scheme: dark) {
            /* Le formulaire reste clair pour une meilleure lisibilité */
            /* Mais le fond peut s'adapter */
            body {
                background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            }
        }

        /* Réduction des animations pour ceux qui préfèrent */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus visible pour la navigation au clavier */
        *:focus-visible {
            outline: 2px solid var(--accent-color);
            outline-offset: 2px;
        }
    </style>
</head>

<body id="kt_body" class="app-blank">
    
    <!-- Modal d'alerte personnalisée -->
    @if (session('alert'))
    <div class="custom-modal">
        <div class="modal-content">
            <div class="modal-message">
                {{ session('alert') }}
            </div>
            <div class="modal-footer">
                <a href="/index" class="modal-btn">OK</a>
            </div>
        </div>
    </div>
    <style>body { overflow: hidden; }</style>
    @endif

    <!-- Alerte d'erreur -->
    @if (session('error'))
    <div class="alert-error">
        {{ session('error') }}
    </div>
    @endif

    <!-- Conteneur principal du formulaire de connexion -->
    <div class="login-container">
        
        <!-- En-tête avec logo et titre -->
        <div class="login-header">
            <div class="logo-wrapper">
                <img alt="Logo GS2E" src="assets/media/logos/logo-gs2e.svg" />
            </div>
            <h1 class="login-title">Bienvenue</h1>
        </div>

        <!-- Corps du formulaire -->
        <div class="login-body">
            
            <!-- Sous-titre informatif -->
            <p class="login-subtitle">
                Connectez-vous à votre espace pour accéder à vos services
            </p>

            <!-- Formulaire de connexion -->
            <form method="POST" action="{{ route('login.post') }}" id="kt_sign_in_form">
                @csrf

                <!-- Champ Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        placeholder="votreemail@exemple.com" 
                        autocomplete="email" 
                        class="form-input" 
                        required 
                    />
                </div>

                <!-- Champ Mot de passe -->
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input 
                        type="password" 
                        id="password"
                        name="mot_de_passe" 
                        placeholder="••••••••" 
                        autocomplete="current-password" 
                        class="form-input" 
                        required 
                    />
                </div>

                <!-- Bouton de soumission -->
                <div class="form-group">
                    <button type="submit" id="kt_sign_in_submit" class="btn-submit">
                        <span class="indicator-label">Se connecter</span>
                        <span class="indicator-progress">
                            Connexion en cours...
                            <span class="spinner-border"></span>
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    
    <script>
        // Gestion de l'état de chargement du bouton lors de la soumission du formulaire
        document.getElementById('kt_sign_in_form').addEventListener('submit', function() {
            var submitButton = document.getElementById('kt_sign_in_submit');
            submitButton.classList.add('loading');
            submitButton.disabled = true;
        });
    </script>
</body>
</html>