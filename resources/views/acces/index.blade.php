@extends('layouts.app')     
   @section('content')    
   <style>

#kt_app_root {
				position: relative;
                 left: -50px; 
				width: 100% !important;
			}

            .btn.btn-primary{
    background-color: #ff9900 !important; /* orange */
    border-color: #ff9900 !important;     /* orange */
    color: #fff !important;               /* texte blanc */
}
	

			
    
</style>   
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
                    <!--begin::Page-->
                <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                        <!--begin::Header-->
                        
                        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">                              
                            <div class="d-flex flex-column flex-column-fluid">
                                    <!--begin::Toolbar-->
                                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
                                        <!--begin::Toolbar container-->
                                        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                        <div class="page-title d-flex flex-column justify-content-center me-3">
                                                <!--begin::Title-->
                                                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0"> Détails du Projet</h1>
                                                <!--end::Title-->
                                                <!--begin::Breadcrumb-->
                                                
                                            </div>
                                        <!--begin::Actions-->
                                        <div class="card-toolbar">
                                            @if(Auth::user()->role==='admin')<!--begin::Toolbar-->
                                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                        
                                                        
                                                        <!--end::Add user-->
                                                    </div>
                                                   @endif <!--end::Toolbar-->
                                                </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Toolbar container-->
                                    </div>
                                    <!--end::Toolbar-->
                                    <!--begin::Content-->
                                    <div id="kt_app_content" class="app-content flex-column-fluid">
                                        <!--begin::Content container-->
                                        <div id="kt_app_content_container" class="app-container container-xxl">
                                            <!--begin::Navbar-->
                                            <div class="card mb-6 mb-xl-9">
                                                <div class="card-body pt-9 pb-0">
                                                    <!--begin::Details-->
                                                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                                                        <!--begin::Image-->
                                                        <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4 position-relative">
                                                            <img id="logoPreview"
                                                                 class="mw-50px mw-lg-75px"
                                                                 src="{{ $projet->logo ? asset($projet->logo) : asset('assets/media/svg/brand-logos/volicity-9.svg') }}"
                                                                 alt="logo du projet" />
                                                        
                                                            <button type="button" 
                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-35px h-35px bg-body shadow 
                                                                           position-absolute bottom-0 end-0 translate-middle"
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#modalLogo">
                                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                            </button>
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Wrapper-->
                                                        <div class="flex-grow-1">
                                                            <!--begin::Head-->
                                                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                                                <!--begin::Details-->
                                                                <div class="d-flex flex-column">
                                                                    <!--begin::Status-->
                                                                    <div class="d-flex align-items-center mb-1">
                                                                        <div class="col-8">{{ $projet->nom }}</div>
                                                                        <span class="badge badge-light-success me-auto">{{ ucfirst(str_replace('_', ' ', $projet->statut)) }}</span>
                                                                    </div>
                                                                    <!--end::Status-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">{{ $projet->description}}</div>
                                                                    <!--end::Description-->
                                                                </div>
                                                                <!--end::Details-->
                                                                <!--begin::Actions-->
                                                                
                                                                <!--end::Actions-->
                                                            </div>
                                                            <!--end::Head-->
                                                            <!--begin::Info-->
                                                            <div class="d-flex flex-wrap justify-content-start">
                                                                <!--begin::Stats-->
                                                                <div class="d-flex flex-wrap">
                                                                    <!--begin::Stat-->
                                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                                        <!--begin::Number-->
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="fs-4 fw-bold">{{ $projet->created_at ? $projet->created_at->format('d/m/Y H:i') : 'N/A'}}</div>
                                                                        </div>
                                                                        <!--end::Number-->
                                                                        <!--begin::Label-->
                                                                        <div class="fw-semibold fs-6 text-gray-500">Créé le</div>
                                                                        <!--end::Label-->
                                                                    </div>

                                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                                        <!--begin::Number-->
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="fs-4 fw-bold">{{ $projet->creator ? $projet->creator-> nom : 'Inconnu'}}</div>
                                                                        </div>
                                                                        <!--end::Number-->
                                                                        <!--begin::Label-->
                                                                        <div class="fw-semibold fs-6 text-gray-500">Créé par</div>
                                                                        <!--end::Label-->
                                                                    </div>
                                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                                        <!--begin::Number-->
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="fs-4 fw-bold">{{ $projet->updater ? $projet->updater-> nom: '-'}}</div>
                                                                        </div>
                                                                        <!--end::Number-->
                                                                        <!--begin::Label-->
                                                                        <div class="fw-semibold fs-6 text-gray-500">Modifier par</div>
                                                                        <!--end::Label-->
                                                                    </div>
                                                                    <div class="d-flex mb-4">
                                                                        @if(Auth::user()->role === 'admin')
                                                                    <div class="d-flex flex-wrap justify-content-center gap-4 mt-8">
                                                                            <!-- Bouton Modifier -->
																			<button type="button" class="btn btn-bg-light btn-orange-primary me-3" data-bs-toggle="modal" data-bs-target="#modalModifierProjet-{{ $projet->id }}">
																				<i class="ki-outline ki-pencil fs-4"></i>
																				Modifier
																			</button>
                                                                            
                                                                            <form action="{{ route('projet.destroy', $projet) }}" method="POST" class="delete-form" data-id="{{ $projet->id }}" data-nom="{{ $projet->nom }}" data-url="{{ route('projet.index2') }}" >
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="button" class="btn btn-danger btn-delete me-3"
                                                                                  data-bs-toggle="tooltip" >
                                                                                    <i class="ki-outline ki-trash fs-4"></i>
                                                                                    Supprimer
                                                                                </button>
                                                                            </form>

                                                                            <a href="{{ route('projet.index2') }}" class="btn btn-bg-light me-3">
                                                                                <i class="ki-outline ki-arrow-left fs-4"></i>
                                                                                Retour à la liste
                                                                            </a>
                                                                            
                                                                            
                                                                    </div>
                                                                    @elseif(Auth::user()->role === 'utilisateur')
                                                                    <a href="{{ route('index') }}" class="btn btn-light btn-active-light-primary me-3">
                                                                        <i class="ki-outline ki-arrow-left fs-4"></i>
                                                                        Retour
                                                                    </a>
                                                                    @endif
                                                                </div>	
                                                                    <!--begin::Menu-->
                                                                    <!--end::Stat-->
                                                                </div>
                                                                <!--end::Stats-->
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Details-->
                                                    <div class="separator"></div>
                                                    <!--begin::Nav-->
                                                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                                        <!--begin::Nav item-->
                                                        <li class="nav-item">
                                                            <a class="nav-link text-active-primary py-5 me-6 active" href="{{ route('projet.acces.index',$projet->id) }}">Acces</a>
                                                        </li>
                                                        <!--begin::Nav item-->
                                                        <li class="nav-item">
                                                            <a class="nav-link text-active-primary py-5 me-6" href="{{ route('projet.document.index3',$projet->id) }}">Documents</a>
                                                        </li>
                                                        <!--end::Nav item-->
                                                    </ul>
                                                    <!--end::Nav-->
                                                </div>
                                            </div>
                                            <!--end::Navbar-->
                                        </div>
                                        <!--end::Content container-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                        </div>
                </div>
            </div>
        </div>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				
									
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <!--begin::Content container-->
                    <div id="kt_app_content_container" class="app-container container-xxl">
                        
                        <div class="card">
                            <div class="card-header border-0 pt-5">
                                <!--begin::Card title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Liste des accès</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Gestion des accès du projet</span>
                                </h3>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->

                                <div class="card-toolbar">

                                    

                                @if(Auth::user()->role==='admin') <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        <!--begin::Add user-->
                                        
                                        <button type="button" class="btn btn-orange-primary mb-4" data-bs-toggle="modal" data-bs-target="#createAccesModal">
                                            + Créer un accès
                                        </button>
                                    </div>
                                @endif <!--end::Toolbar-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            
                            <!--begin::Search bar-->
                            <div class="card-header border-0 pt-0 pb-5">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-outline ki-magnifier fs-1 position-absolute ms-6"></i>
                                    <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-14" placeholder="Rechercher un acces..." />
                                </div>
                            </div>
                            <!--end::Search bar-->
                            <!--begin::Card body-->
                            <div class="card-body py-4">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_acces">
                                        <thead>
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-150px">Type</th>
                                                <th class="min-w-120px text-center">Url</th>
                                                <th class="w-100px"></th>
                                                <th class="min-w-120px">Environnement</th>
                                                <th class="min-w-150px text-center">Email</th>
                                                <th class="w-100px"></th>
                                                <th class="min-w-200px text-center">Mot de passe</th>
                                                <th class="w-100px"></th>
                                                <th class="min-w-150px">Crée le</th>
                                                @if(Auth::user()->role==="admin")
                                                <th class="min-w-150px">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">
                                            @forelse($acces as $acces)
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <!--begin::User details-->
                                                        <div class="d-flex flex-column">
                                                            <span class="text-gray-800 text-hover-primary mb-1 fw-bold">{{ $acces->type }}</span>
                                                        </div>
                                                        <!--end::User details-->
                                                    </td>
                                                    <td data-bs-target="license" class="ps-0 url-cell">{{ $acces->url }}</td>
                                                    <td>
                                                        @if(!empty($acces->url))
                                                            <button data-action="copy" data-copy-target="url"
                                                                class="btn btn-active-color-primary btn-color-gray-500 btn-icon btn-sm btn-outline-light"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Copier">
                                                                <i class="ki-outline ki-copy fs-2"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    
                                                    <td>
                                                        <span class="badge badge-light-{{ $acces->environnement->couleur ?? 'secondary' }}">
                                                            {{ $acces->environnement->libelle ?? 'Non défini' }}
                                                        </span>
											        </td>
                                                       
                                                    
                                                    <td class="email-cell">{{ $acces->email }}</td>
                                                    <td>
                                                        @if(!empty($acces->email))
                                                            <button data-action="copy" data-copy-target="email"
                                                                class="btn btn-active-color-primary btn-color-gray-500 btn-icon btn-sm btn-outline-light"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Copier">
                                                                <i class="ki-outline ki-copy fs-2"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td class="password-cell text-center" >{{ $acces->mot_de_passe }}</td>
                                                    <td>
                                                        @if(!empty($acces->mot_de_passe))
                                                            <button data-action="copy" data-copy-target="password"
                                                                class="btn btn-active-color-primary btn-color-gray-500 btn-icon btn-sm btn-outline-light"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Copier">
                                                                <i class="ki-outline ki-copy fs-2"></i>
                                                            </button>
                                                        @endif
                                                    </td>

                                                    <td>{{ $acces->created_at->format('d/m/Y H:i') }}</td>
                                                    <td class="text-center">
                                                        <!--begin::Action buttons-->
                                                        @if(Auth::user()->role==="admin")
                                                        <form action="{{ route('projet.acces.destroy', ['projet' => $projet->id, 'acces' => $acces->id]) }}" data-url="{{ route('projet.acces.index',$projet->id) }}" 
                                                            method="POST" 
                                                            class="delete-form" 
                                                            data-id="{{ $acces->id }}" 
                                                            data-nom="{{ $acces->nom ?? 'cet accès' }}" 
                                                            style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" data-bs-toggle="tooltip" title="Supprimer">
                                                            <i class="ki-outline ki-trash fs-2"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                        <!--end::Action buttons-->
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted py-4">
                                                        Aucun accès ajouté pour le moment
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>


                                        
                            
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalModifierProjet-{{ $projet->id }}" tabindex="-1" aria-labelledby="modalModifierProjetLabel-{{ $projet->id }}" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalModifierProjetLabel-{{ $projet->id }}">Modifier le Projet</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('projet.update', $projet->id) }}">
						@csrf
						@method('PUT')
	
						<!-- Nom du projet -->
						<div class="row mb-6">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Nom</label>
							<div class="col-lg-8 fv-row">
								<input type="text" class="form-control form-control-lg form-control-solid" name="nom" value="{{ old('nom', $projet->nom) }}" required>
							</div>
						</div>
	
						<!-- Description du projet -->
						<div class="row mb-6">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Description</label>
							<div class="col-lg-8 fv-row">
								<textarea name="description" class="form-control form-control-lg form-control-solid" rows="3">{{ old('description', $projet->description) }}</textarea>
								<div class="form-text text-muted">255 caractères maximum.</div>
							</div>
						</div>
	
						<!-- Statut du projet -->
						<div class="row mb-6">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Statut</label>
							<div class="col-lg-8 fv-row">
								<select name="statut" class="form-select form-select-lg form-select-solid" data-control="select2" required>
									<option value="en_production" {{ $projet->statut=='en_production' ? 'selected' : '' }}>En production</option>
									<option value="en_recette" {{ $projet->statut=='en_recette' ? 'selected' : '' }}>En recette</option>
									<option value="en_developpement" {{ $projet->statut=='en_developpement' ? 'selected' : '' }}>En développement</option>
								</select>
							</div>
						</div>
	
						<!-- Boutons -->
						<div class="card-footer d-flex justify-content-end py-6 px-9 gap-3">
							<button type="button" class="btn btn-light btn-active-light-primary" data-bs-dismiss="modal">Annuler</button>
							<button type="submit" class="btn btn-orange-primary">Mise à jour</button>
						</div>
	
					</form>
				</div>
			</div>
		</div>
	</div>
            
             <!-- Modal Créer un Utilisateur -->
             <div class="modal fade" id="createAccesModal" tabindex="-1" aria-labelledby="createAccesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
            
                        <!-- Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="createAccesModalLabel">Créer un Accès</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
            
                        <!-- Body -->
                        <div class="modal-body">
                            <form method="POST" action="{{ route('projet.acces.store',$projet->id) }}" class="form w-100" id="acces-form">
                                @csrf
            
                                <div class="card-body border-top p-9">
                                    <!-- Instruction -->
                                    <div class="text-center mb-11">
                                        <div class="text-gray-500 fw-semibold fs-6">Remplissez le formulaire ci-dessous</div>
                                    </div>
            
                                    <!-- Type -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Type</label>
                                        <div class="col-lg-8 fv-row">
                                            <select name="type" id="type-select"
                                                class="form-select form-select-lg form-select-solid @error('type') is-invalid @enderror"
                                                data-control="select2" data-hide-search="true" data-placeholder="Type" required>
                                                <option value="">Choisissez un type</option>
                                                <option value="Lien" {{ old('type') == 'Lien' ? 'selected' : '' }}>Lien</option>
                                                <option value="identifiants" {{ old('type') == 'identifiants' ? 'selected' : '' }}>Identifiants</option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- URL -->
                                    <div class="row mb-6 toggle-field d-none" id="field-url">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">URL</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" placeholder="Url" name="url" autocomplete="off"
                                                class="form-control form-control-lg form-control-solid @error('url') is-invalid @enderror" />
                                            @error('url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Email -->
                                    <div class="row mb-6 toggle-field d-none" id="field-email">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Email</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="email" placeholder="Email" name="email" autocomplete="off"
                                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" />
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Password -->
                                    <div class="row mb-6 toggle-field d-none" id="field-password">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Mot de passe</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="password" placeholder="Mot de passe" name="password" autocomplete="off"
                                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" />
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <!-- Environnement -->
                                    <div class="row mb-6 toggle-field d-none" id="field-env">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Environnement</label>
                                        <div class="col-lg-8 fv-row">
                                            <select name="environnement_id"
                                                class="form-select form-select-lg form-select-solid @error('environnement_id') is-invalid @enderror"
                                                autocomplete="off" data-control="select2" data-hide-search="true" data-placeholder="Environnement">
                                                <option value="">Choisissez un environnement</option>
                                                @foreach($environnements as $environnement)
                                                    <option value="{{ $environnement->id }}" {{ old('environnement_id') == $environnement->id ? 'selected' : '' }}>
                                                        {{ $environnement->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('environnement_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Actions -->
                                <div class="card-footer d-flex justify-content-end py-6 px-9 gap-3">
                                    <button type="button" class="btn btn-light btn-active-light-primary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-orange-primary">
                                        <span class="indicator-label">Créer l'accès</span>
                                        <span class="indicator-progress">Veuillez patienter...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
            
                            </form>
                        </div>
            
                    </div>
                </div>
            </div>


            <div class="modal fade" id="modalLogo" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="{{ route('projet.updateLogo', $projet->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="modal-header">
                        <h5 class="modal-title">Modifier le logo du projet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                      </div>
                      <div class="modal-body">
                        <input type="file" name="logo" class="form-control" accept="image/*" required>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-orange-primary">Enregistrer</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <script>
               document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('kt_table_acces');
    const tableBody = table.querySelector('tbody');

    // Crée la ligne "Aucun accès"
    const noResultRow = document.createElement('tr');
    const td = document.createElement('td');
    td.setAttribute('colspan', table.querySelectorAll('thead th').length); // prend toute la largeur
    td.classList.add('text-center', 'text-muted');
    td.textContent = 'Aucun accès ne correspond à votre recherche';
    noResultRow.appendChild(td);
    noResultRow.style.display = 'none'; // cachée par défaut
    tableBody.appendChild(noResultRow);

    searchInput.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        let visibleCount = 0;

        const tableRows = tableBody.querySelectorAll('tr:not(:last-child)'); // on ignore la ligne "noResultRow"
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(filter)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Affiche ou cache la ligne "Aucun accès"
        noResultRow.style.display = visibleCount === 0 ? '' : 'none';
    });
});


                                    document.addEventListener('click', function(event) {
                        // Trouve l'élément parent le plus proche avec l'attribut 'data-action="copy"'.
                        const copyButton = event.target.closest('[data-action="copy"]');

                        if (copyButton) {
                            const copyTarget = copyButton.getAttribute('data-copy-target');
                            const parentRow = copyButton.closest('tr');
                            let textToCopy = '';

                            // Détermine quel texte copier en se basant sur la cible.
                            switch (copyTarget) {
                            case 'url':
                                const urlCell = parentRow.querySelector('.url-cell');
                                if (urlCell) {
                                textToCopy = urlCell.innerText;
                                }
                                break;
                            case 'email':
                                const emailCell = parentRow.querySelector('.email-cell');
                                if (emailCell) {
                                textToCopy = emailCell.innerText;
                                }
                                break;
                            case 'password':
                                const passwordCell = parentRow.querySelector('.password-cell');
                                if (passwordCell) {
                                textToCopy = passwordCell.innerText;
                                }
                                break;
                            default:
                                console.warn('Cible de copie inconnu:', copyTarget);
                                return;
                            }

                            // Si le texte est trouvé, le copie vers le presse-papiers et affiche un retour visuel à l'utilisateur.
                            if (textToCopy) {
                            navigator.clipboard.writeText(textToCopy)
                                .then(() => {
                                console.log('Texte copié avec succès!');
                                showCopySuccess(copyButton);
                                })
                                .catch(err => {
                                console.error('Echec de la copie du texte: ', err);
                                alert('Échec de la copie du texte. Veuillez réessayer.');
                                });
                            }
                        }
                        });

                        // Fonction utilitaire pour donner un retour visuel de succès à l'utilisateur.
                        function showCopySuccess(buttonElement) {
                        const originalTitle = buttonElement.getAttribute('title');
                        const iconElement = buttonElement.querySelector('i');
                        
                        // Sauvegarde le titre original du bouton.
                        const originalClasses = Array.from(iconElement.classList);
                        const originalTitleText = buttonElement.getAttribute('title');
                        
                        // Définit le nouvel état pour le retour visuel (icône de validation, nouveau titre et couleur).
                        iconElement.classList.remove('ki-copy');
                        iconElement.classList.add('ki-check-circle');
                        buttonElement.setAttribute('title', 'Copié !');
                        buttonElement.classList.add('text-success');

                        // Rétablit l'état original après un court délai.
                        setTimeout(() => {
                            iconElement.classList.remove('ki-check-circle');
                            iconElement.classList.add('ki-copy');
                            buttonElement.setAttribute('title', originalTitleText);
                            buttonElement.classList.remove('text-success');
                        }, 1500);
                        }
                
                   


            </script>
            	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    $(document).on('click', '.delete-form button', function (e) {
                        e.preventDefault();

                        let form = $(this).closest('form');
                        let id = form.data('id');
                        let nom = form.data('nom');
                        let url = form.attr('action');

                        Swal.fire({
                            title: 'Êtes-vous sûr de vouloir supprimer ' + nom + ' ?',
                            text: "Cette action est irréversible.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Oui, supprimer !',
                            cancelButtonText: 'Annuler',
                            customClass:{
                            confirmButton: 'btn btn-danger',
                            cancelButton: 'btn btn-secondary'},
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: url,
                                    type: 'POST',
                                    data: form.serialize(),
                                    success: function () {
                                        Swal.fire(
                                            'Supprimé !',
                                            nom + ' a bien été supprimé.',
                                            'success'
                                        ).then(() => {
											window.location.href = form.data('url');
										});
                                       
                                    },
                                    error: function () {
                                        Swal.fire(
                                            'Erreur',
                                            'Impossible de supprimer ' + nom,
                                            'error'
                                        );
                                    }
                                });
                            }
                        });
                    });





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
                
 @endsection('content')
	