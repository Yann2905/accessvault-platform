@extends('layouts.app')

@section('content')  
   
    <div class="app-container container-xxl">

    
       <div class="card">
            <div class="card-body">
	 
	                <form method="POST" action="{{ route('projet.store') }}" class="form w-100" id="kt_sign_up_form">
	
                             @csrf
							
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									    <h1 class="text-gray-900 fw-bolder mb-3">Créer un Projet</h1>
                                         <div class="text-gray-500 fw-semibold fs-6">Remplissez le formulaire ci-dessous</div>
                               
									<!--end::Title-->
									<!--begin::Text-->
									<!--end::Link-->
								</div>
								<!--end::Heading-->
								<!--begin::Input group-->
								<div class="fv-row mb-8">
                                    <input type="text" placeholder="Nom du projet" name="nom" autocomplete="off" class="form-control bg-transparent @error('nom') is-invalid @enderror" required />
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
									
									
								</div>
								<div class="fv-row mb-8">
								
                                    <input type="text" placeholder="Description du projet" name="description" autocomplete="off" class="form-control bg-transparent @error('description') is-invalid @enderror" required />
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
									
									<div class="text-muted">255 caractères maximum.</div>
								</div>
								<div class="fv-row mb-8">
								<select name="statut" class="form-select  bg-transparent @error('statut') is-invalid @enderror" autocomplete="off" data-control="select2" data-hide-search="true" data-placeholder="status" required/>
									<option value="">Choisissez un statut</option>
									<option value="en_production" {{ old('statut') == 'en_production' ? 'selected' : '' }}>en production</option>
									<option value="en_recette" {{ old('statut') == 'en_recette' ? 'selected' : '' }}>en recette</option>
                                    <option value="en_developpement" {{ old('statut') == 'en_developpement' ? 'selected' : '' }}>en developpement</option>
								</select>
								@error('status')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							    </div>
								
								
								<!--end::Input group-->
								<!--begin::Actions-->
								
									<!--begin::Submit-->
									<!-- Boutons -->
                                <div class="d-flex flex-wrap justify-content-center gap-4">
                                    <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                    <span class="indicator-label">Créer le projet</span>
                                    <span class="indicator-progress">Veuillez patienter...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    </button>
                                
                                     <a href="{{ route('projet.index2') }}" class="btn btn-light">Retour à la liste</a>
                                </div>
									<!--end::Submit-->
									
								</div>
								<!--end::Actions-->
					</form>

			</div>
        </div>

    </div>
@endsection('content') 							