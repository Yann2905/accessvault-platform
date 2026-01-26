@extends('layouts.app')

@section('content')  

<div class="app-container container-xxl">
    <div class="card">
        <div class="card-body">

            

            <form method="POST" action="{{ route('projet.acces.store',$projet->id) }}" class="form w-100" id="acces-form">
                @csrf

                <!-- Titre -->
                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">Créer un accès</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Remplissez le formulaire ci-dessous</div>
                </div>

                <!-- Type -->
                <div class="fv-row mb-8">
                    <select name="type" id="type-select"
                        class="form-select bg-transparent @error('type') is-invalid @enderror"
                        data-control="select2" data-hide-search="true" data-placeholder="Type" required>
                        <option value="">Choisissez un type</option>
                        <option value="Lien" {{ old('type') == 'Lien' ? 'selected' : '' }}>Lien</option>
                        <option value="identifiants" {{ old('type') == 'identifiants' ? 'selected' : '' }}>identifiants</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- URL -->
                <div class="fv-row mb-8 toggle-field d-none" id="field-url">
                    <input type="text" placeholder="Url" name="url" autocomplete="off"
                        class="form-control bg-transparent @error('url') is-invalid @enderror" />
                    @error('url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Email -->
                <div class="fv-row mb-8 toggle-field d-none" id="field-email">
                    <input type="email" placeholder="Email" name="email" autocomplete="off"
                        class="form-control bg-transparent @error('email') is-invalid @enderror" />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="fv-row mb-8 toggle-field d-none" id="field-password">
                    <input type="password" placeholder="Mot de passe" name="password" autocomplete="off"
                        class="form-control bg-transparent @error('password') is-invalid @enderror" />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Environnement -->
                <div class="fv-row mb-8 toggle-field d-none" id="field-env">
                    <select name="environnement"
                        class="form-select bg-transparent @error('environnement') is-invalid @enderror"
                        autocomplete="off" data-control="select2" data-hide-search="true"
                        data-placeholder="Environnement">
                        <option value="">Choisissez un environnement</option>
                        <option value="en_developpement" {{ old('environnement') == 'en_developpement' ? 'selected' : '' }}>En developpement</option>
                        <option value="production" {{ old('environnement') == 'production' ? 'selected' : '' }}>production</option>
						<option value="recette" {{ old('environnement') == 'recette' ? 'selected' : '' }}>recette</option>
                    </select>
                    @error('environnement')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="d-flex flex-wrap justify-content-center gap-4">
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Créer l'accès</span>
                        <span class="indicator-progress">Veuillez patienter...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <a href="{{ route('projet.acces.index',$projet->id) }}" class="btn btn-light">Retour à la liste</a>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const typeSelect = $('#type-select'); // Select2
    const urlField = $('#field-url');
    const envField = $('#field-env');
    const emailField = $('#field-email');
    const passwordField = $('#field-password');

    function toggleFields() {
        const value = typeSelect.val(); // Select2 nécessite val() jQuery

        // On cache tout
        urlField.addClass('d-none');
        envField.addClass('d-none');
        emailField.addClass('d-none');
        passwordField.addClass('d-none');

        // Affichage en fonction du type choisi
        if (value === "Lien") {
            urlField.removeClass('d-none');
            envField.removeClass('d-none');
        } else if (value === "identifiants") {
            emailField.removeClass('d-none');
            passwordField.removeClass('d-none');
            envField.removeClass('d-none');
        }
    }

    // Initialisation au chargement
    toggleFields();

    // Événement Select2
    typeSelect.on('change.select2', toggleFields);

});
</script>

@endsection
