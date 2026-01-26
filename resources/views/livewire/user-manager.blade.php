<div>
    <!-- 🔹 Bouton pour afficher le formulaire -->
    @if(!$showForm)
        <div class="d-flex justify-content-end mb-4">
            <button wire:click="afficherForm" class="btn btn-primary">
                <i class="ki-outline ki-plus fs-2"></i> Ajouter un utilisateur
            </button>
        </div>
    @endif

    <!-- 🔹 Message flash -->
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- 🔹 Afficher la liste ou le formulaire -->
    @if($showForm)
        <!-- Formulaire d'inscription -->
        <div class="card p-4">
            <h3>Créer un Utilisateur</h3>
            <form wire:submit.prevent="creerUtilisateur">
                <div class="mb-3">
                    <input type="text" wire:model="nom" placeholder="Nom complet" class="form-control @error('nom') is-invalid @enderror" required>
                    @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <input type="email" wire:model="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <input type="password" wire:model="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <input type="password" wire:model="password_confirmation" placeholder="Confirmer le mot de passe" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                    @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <select wire:model="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="">Choisissez un rôle</option>
                        <option value="admin">Administrateur</option>
                        <option value="utilisateur">Utilisateur</option>
                    </select>
                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Créer</button>
                    <button type="button" wire:click="afficherListe" class="btn btn-secondary">Annuler</button>
                </div>
            </form>
        </div>
    @else
        <!-- Liste des utilisateurs -->
        <div class="card p-4">
            <!-- Recherche côté JS -->
            <input type="text" class="form-control mb-3" placeholder="Rechercher un utilisateur..." id="search">

            <table class="table table-striped" id="userTable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($utilisateurs as $utilisateur)
                        <tr>
                            <td>{{ $utilisateur->nom }}</td>
                            <td>{{ $utilisateur->email }}</td>
                            <td>{{ ucfirst($utilisateur->role) }}</td>
                            <td>{{ $utilisateur->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Aucun utilisateur trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- 🔹 JS pour filtrer la table -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.getElementById('search');
                const tableRows = document.querySelectorAll('#userTable tbody tr');

                searchInput.addEventListener('input', function () {
                    const term = this.value.toLowerCase();
                    tableRows.forEach(row => {
                        const name = row.cells[0].textContent.toLowerCase();
                        const email = row.cells[1].textContent.toLowerCase();
                        row.style.display = (name.includes(term) || email.includes(term)) ? '' : 'none';
                    });
                });
            });
        </script>
    @endif
</div>
