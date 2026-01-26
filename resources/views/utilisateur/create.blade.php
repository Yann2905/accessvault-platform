@extends('layouts.app')

@section('content')


    <div class="app-container container-xxl">

    
       <div class="card">
            <div class="card-body">
            
        
            
                <form method="POST" action="{{ route('utilisateur.store') }}" class="form w-100" id="kt_sign_up_form">
                            @csrf
                            
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Créer un Utilisateur</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Remplissez le formulaire ci-dessous</div>
                            </div>

                            <!-- Nom -->
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Nom complet" name="nom" autocomplete="off" class="form-control bg-transparent @error('nom') is-invalid @enderror" required />
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="fv-row mb-8">
                                <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mot de passe -->
                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Mot de passe" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" required />
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirmation du mot de passe -->
                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Confirmer le mot de passe" name="password_confirmation" autocomplete="off" class="form-control bg-transparent @error('password_confirmation') is-invalid @enderror" required />
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="fv-row mb-8">
									<select name="role" class="form-select bg-transparent @error('role') is-invalid @enderror" autocomplete="off" data-control="select2" data-hide-search="true" data-placeholder="role" required/>
									<option value="">Choisissez un statut</option>
										<option value="">Choisissez un rôle</option>
										<option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
										<option value="utilisateur" {{ old('role') == 'utilisateur' ? 'selected' : '' }}>Utilisateur</option>
									</select>
									@error('role')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
                            <!-- Boutons -->
                            <div class="d-flex flex-wrap justify-content-center gap-4">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                    <span class="indicator-label">Créer l'utilisateur</span>
                                    <span class="indicator-progress">Veuillez patienter...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                
                                <a href="{{ route('utilisateur.index') }}" class="btn btn-light">Retour à la liste</a>
                            </div>
                </form>



            </div>
        </div>

    </div>

    @endsection