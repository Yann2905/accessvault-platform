

@extends('layouts.app')     
   @section('content')  
   <style>
	#kt_app_root {
				position: relative;
                 left: -50px; 
				width: 100% !important;
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
									@if(Auth::user()->role==='admin')
											<!--begin::Toolbar-->
											<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
												<!--begin::Add user-->
											
												<!--end::Add user-->
											</div>
										@endif	<!--end::Toolbar-->
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
															
                                                              <!-- afficher les boutons Créer / Modifier / Supprimer -->

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
																	
																	<a href="{{ route('index') }}" class="btn btn-light btn-active-light-primary">
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
													<a class="nav-link text-active-primary py-5 me-6 " href="{{ route('projet.acces.index',$projet->id) }}">Acces</a>
												</li>
												<!--begin::Nav item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary py-5 me-6 active" href="{{ route('projet.document.index3',$projet->id) }}">Documents</a>
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
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				
									
									<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
										<!--begin::Content wrapper-->
										<div class="d-flex flex-column flex-column-fluid">
											<!--begin::Content-->
											<div id="kt_app_content" class="app-content flex-column-fluid">
												<!--begin::Content container-->
												<div id="kt_app_content_container" class="app-container container-xxl">
													<div class="row g-6 g-xl-9 mb-6 mb-xl-9">
														
													@foreach($documents as $doc)	<!--begin::Col-->
													    <div class="col-md-6 col-lg-4 col-xl-3">
														  <!--begin::Card-->
															<div class="card h-100">
																<!--begin::Card body-->
															  
																<div class="card-body d-flex justify-content-center text-center flex-column p-8">
																	<!--begin::Name-->
																	<a   href="{{ \Illuminate\Support\Facades\Storage::url($doc->chemin_fichier) }}"    target="_blank"     class="text-gray-800 text-hover-primary d-flex flex-column">
																		<!--begin::Image-->
																		<div class="symbol symbol-60px mb-5">
																			<img src="{{ asset($doc->icon_fichier)}}" class="theme-light-show" alt="{{ $doc->type_fichier}}"/>
																		</div>
																		<!--end::Image-->
																		<!--begin::Title-->
																		<div class="fs-5 fw-bold mb-2">{{ $doc->nom_fichier }}</div>
																		<!--end::Title-->
																	</a>
																	<!--end::Name-->
																	@if(Auth::user()->role==='admin')<!--begin::Description-->
																	<form action="{{ route('projet.document.destroy', ['projet' => $projet->id, 'document' => $doc->id]) }}"  data-url="{{ route('projet.acces.index',$projet->id) }}" 
																		method="POST" 
																		class="delete-form" 
																		data-id="{{ $doc->id }}" 
																		data-nom="{{ $doc->nom_fichier }}" 
																		style="display: inline;">
																	  @csrf
																	  @method('DELETE')
																	  <button type="button" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
																		  <i class="ki-outline ki-trash fs-2"></i>
																	  </button>
																	  
																  </form>
																  @endif
																	<!--end::Description-->
																</div>
																<!--end::Card body-->
															</div>
														    <!--end::Card-->
													    </div>
													@endforeach
														<!--begin::Col-->
														<div class="col-md-6 col-lg-4 col-xl-3">
															@if(Auth::user()->role === 'admin')<!--begin::Card-->
															<div class="card h-100 flex-center bg-light-primary border-primary border border-dashed p-8">
																<!--begin::Image-->
																<img src="assets/media/svg/files/upload.svg" class="mb-5" alt="" />
																<!--end::Image-->
																<!--begin::Link-->
																<button type="button" class="btn btn-orange-primary" data-bs-toggle="modal" data-bs-target="#DocumentModal">+ Ajouter</button>
																<!--end::Link-->
																<!--begin::Description-->
																
																<!--end::Description-->
															</div>
															@endif<!--end::Card-->
														</div>
														<!--end::Col-->
													</div>
													<!--end:Row-->
												</div>
												<!--end::Content container-->
											</div>
											<!--end::Content-->
										</div>
										<!--end::Content wrapper-->
										
									</div>
									<!--end:::Main-->
				              
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


	<div class="modal fade" id="DocumentModal" tabindex="-1" aria-labelledby="createDocumentModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
	
				<!-- Header -->
				<div class="modal-header">
					<h5 class="modal-title" id="createDocumentModalLabel">Créer un Document</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
				</div>
	
				<!-- Body -->
				<div class="modal-body">
					<form method="POST" enctype="multipart/form-data" action="{{ route('projet.document.store',$projet->id) }}" class="form w-100" id="kt_sign_up_form">
						@csrf
	
						<div class="card-body border-top p-9">
	
							<!-- Instruction -->
							<div class="text-center mb-11">
								<div class="text-gray-500 fw-semibold fs-6">Remplissez le formulaire ci-dessous</div>
							</div>
	
							<!-- Nom du fichier -->
							<div class="row mb-6">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Nom du fichier</label>
								<div class="col-lg-8 fv-row">
									<input type="text" name="nom_fichier" placeholder="Nom du fichier" class="form-control form-control-lg form-control-solid @error('nom_fichier') is-invalid @enderror" value="{{ old('nom_fichier') }}" required />
									@error('nom_fichier')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
	
							<!-- Fichier à uploader -->
							<div class="row mb-6">
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Fichier</label>
								<div class="col-lg-8 fv-row">
									<input type="file" name="chemin_fichier" class="form-control form-control-lg form-control-solid @error('chemin_fichier') is-invalid @enderror" required />
									@error('chemin_fichier')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
	
						</div>
	
						<!-- Actions -->
						<div class="card-footer d-flex justify-content-end py-6 px-9 gap-3">
							<button type="button" class="btn btn-light btn-active-light-primary" data-bs-dismiss="modal">Annuler</button>
							<button type="submit" class="btn btn-orange-primary">
								<span class="indicator-label">Créer le document</span>
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
    </script>
					@endsection('content')
	