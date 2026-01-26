@extends("layouts.app")


@section("content")
<style>
	#kt_app_main {
				position: relative;
                 left: -85px; 
				width: 110% !important;
			}

			.btn.btn-primary{
    background-color: #ff9900 !important; /* orange */
    border-color: #ff9900 !important;     /* orange */
    color: #fff !important;               /* texte blanc */
}
    
</style>
	
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Card-->
									<div class="card card-flush">
										<!--begin::Card body-->
										<div class="card">
											<!--begin::Heading-->
											<div class="card-header border-0 pt-5">
												<!--begin::Card title-->
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bold text-gray-800">Liste des Utilisateurs</span>
													<span class="text-gray-400 mt-1 fw-semibold fs-6">Gestion des utilisateurs de l'application</span>
												</h3>
												<div class="card-toolbar">
													<!--begin::Toolbar-->
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!-- Bouton qui ouvre le modal -->
														<button type="button" class="btn btn-orange-primary mb-4" data-bs-toggle="modal" data-bs-target="#createUserModal">
															+ Créer un utilisateur
														</button>

													</div>
													<!--end::Toolbar-->
												</div>
											</div>
												<div class="card-header border-0 pt-0 pb-5">
													<div class="d-flex align-items-center position-relative my-1">
															<i class="ki-outline ki-magnifier fs-1 position-absolute ms-6"></i>
															<input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-14" placeholder="Rechercher un utilisateur..." />
													</div>
												</div>
												<!--end::Card title-->
												<!--begin::Card toolbar-->
												
												<!--end::Card toolbar-->
										     
											<!--end::Heading-->
										   <div class="card-body py-4">
											<!--begin::Users Table-->
											<div class="table-responsive" id="views_utilisateur_index">
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_views_utilisateur_index_table">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-bold text-muted">
															<th class="min-w-150px">Utilisateur</th>
															<th class="min-w-140px">Role</th>
															<th class="min-w-120px">Date de création</th>
															<th class="min-w-120px">Dernière modification</th>
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
														@forelse($utilisateurs ?? [] as $utilisateur)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																
																	<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
																		<a href="{{ route('utilisateur.show', $utilisateur->id) }}" class="text-dark fw-bold text-hover-primary fs-6">
																			<div class="symbol-label">
																				@php
																					$avatarPath = $utilisateur->avatar && file_exists(public_path('avatars/'.$utilisateur->avatar))
																								  ? 'avatars/'.$utilisateur->avatar
																								  : 'assets/media/avatars/blank.png';
																				@endphp
																				<img src="{{ asset($avatarPath) }}" alt="{{ $utilisateur->nom }}" class="w-100" />
																			</div>
																		</a>
																	</div>
																	   <div class="d-flex flex-column">
																	        <div class="d-flex align-items-center mb-2 ">
																				<a href="{{ route('utilisateur.show', $utilisateur) }}" class="text-dark fw-bold text-hover-primary fs-6 fw-bold me-1">{{ $utilisateur->prenom }}</a>

																					<a href="{{ route('utilisateur.show', $utilisateur) }}" class="text-dark fw-bold text-hover-primary fs-6 fw-bold me-1">{{ $utilisateur->nom }}</a>
																		    </div>
																		   <div class="d-flex justify-content-start flex-column">
																					
																			<span class="text-muted fw-semibold text-muted d-block fs-7"> {{ $utilisateur->email }}</span>
																		   </div>
																		</div>
																</div>
															</td>
															
															<td>
																<a href="role:{{ $utilisateur->role }}" class="text-dark fw-bold text-hover-primary d-block fs-6">{{ $utilisateur->role }}</a>
															</td>
															<td>
																<span class="text-muted fw-semibold text-muted d-block fs-7">
																	{{ $utilisateur->created_at ? $utilisateur->created_at->format('d/m/Y H:i') : 'N/A' }}
																</span>
															</td>
															<td>
																<span class="text-muted fw-semibold text-muted d-block fs-7">
																	{{ $utilisateur->updated_at ? $utilisateur->updated_at->format('d/m/Y H:i') : 'N/A' }}
																</span>
															</td>
															<td class="text-end">
																<div class="d-flex justify-content-end flex-shrink-0">
																	<a href="{{ route('utilisateur.show', $utilisateur) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="tooltip" title="Voir les détails">
																		<i class="ki-outline ki-eye fs-2"></i>
																	</a>
																	
																	

																	<form action="{{ route('utilisateur.destroy', $utilisateur) }}" 
																		method="POST" 
																		style="display:inline;" 
																		data-id="{{ $utilisateur->id }}" 
																		data-nom="{{ $utilisateur->nom }}" 
																		data-url="{{ route('utilisateur.index') }}">
																		@csrf
																		@method('DELETE')
																		<button type="button" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm btn-delete" title="Supprimer">
																			<i class="ki-outline ki-trash fs-2"></i>
																		</button>
																	</form>

																</div>
															</td>
														</tr>
														@empty
														<tr>
															<td colspan="6" class="text-center py-10">
																<div class="d-flex flex-column align-items-center">
																	<img src="{{ asset('assets/media/illustrations/sketchy-1/2.png') }}" alt="" class="mw-100 h-200px h-sm-325px mb-5" />
																	<h3 class="text-muted fw-bold mb-2">Aucun utilisateur trouvé</h3>
																	<p class="text-muted fs-6">Commencez par créer votre premier utilisateur</p>
																	<a href="{{ route('sign-up') }}" class="btn btn-primary">Créer un utilisateur</a>
																</div>
															</td>
											 			</tr>
														@endforelse
													</tbody>
													<!--end::Table body-->
											</table>
											<div class="d-flex justify-content-center mt-4">
                                                 {{$utilisateurs->links()}}
											</div>
											</div>
											<!--end::Users Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>

                        <!-- Modal Créer un Utilisateur -->
						<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
						
									<!-- Header -->
									<div class="modal-header">
										<h5 class="modal-title" id="createUserModalLabel">Créer un Utilisateur</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
									</div>
						
									<!-- Body -->
									<div class="modal-body">
										<form method="POST" action="{{ route('utilisateur.store') }}" class="form w-100" id="kt_sign_up_form">
											@csrf
						
											<div class="card-body border-top p-9">
												<!-- Instruction -->
												<div class="text-center mb-11">
													<div class="text-gray-500 fw-semibold fs-6">Remplissez le formulaire ci-dessous</div>
												</div>
						
												<!-- Prénom et Nom -->
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Nom complet</label>
													<div class="col-lg-8 fv-row">
														<div class="row">
															<div class="col-lg-6 fv-row mb-3 mb-lg-0">
																<input type="text" name="prenom" placeholder="Prénom" class="form-control form-control-lg form-control-solid @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" required />
																@error('prenom')
																	<div class="invalid-feedback">{{ $message }}</div>
																@enderror
															</div>
															<div class="col-lg-6 fv-row">
																<input type="text" name="nom" placeholder="Nom de famille" class="form-control form-control-lg form-control-solid @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required />
																@error('nom')
																	<div class="invalid-feedback">{{ $message }}</div>
																@enderror
															</div>
														</div>
													</div>
												</div>
						
												<!-- Email -->
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
													<div class="col-lg-8 fv-row">
														<input type="email" placeholder="Email" name="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
														@error('email')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
						
												<!-- Mot de passe -->
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Mot de passe</label>
													<div class="col-lg-8 fv-row">
														<input type="password" placeholder="Mot de passe" name="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" required />
														@error('password')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
						
												<!-- Confirmation du mot de passe -->
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Confirmer le mot de passe</label>
													<div class="col-lg-8 fv-row">
														<input type="password" placeholder="Confirmer le mot de passe" name="password_confirmation" class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror" required />
														@error('password_confirmation')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
						
												<!-- Rôle -->
												<div class="row mb-6">
													<label class="col-lg-4 col-form-label required fw-semibold fs-6">Rôle</label>
													<div class="col-lg-8 fv-row">
														<select name="role" class="form-select form-select-lg form-select-solid @error('role') is-invalid @enderror" data-hide-search="true" data-placeholder="Rôle" data-control="select2" required>
															<option value="">Choisissez un rôle</option>
															<option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
															<option value="utilisateur" {{ old('role') == 'utilisateur' ? 'selected' : '' }}>Utilisateur</option>
														</select>
														@error('role')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
						
											<!-- Boutons -->
											<div class="card-footer d-flex justify-content-end py-6 px-9 gap-3">
												<button type="button" class="btn btn-light btn-active-light-primary" data-bs-dismiss="modal">Annuler</button>
												<button type="submit" class="btn btn-primary">
													<span class="indicator-label">Créer l'utilisateur</span>
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
						
                         

						


						<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
						<script>
							$(document).on('click', '.btn-delete', function (e) {
								e.preventDefault(); 
							
								let form = $(this).closest('form');
								let id = form.data('id');
								let url = form.attr('action');
								let nomUtilisateur = form.data('nom');
							
								Swal.fire({
									title: 'Êtes-vous sûr de vouloir supprimer ' + nomUtilisateur + ' ?',
									text: "Cette action est irréversible.",
									icon: 'warning',
									showCancelButton: true,
									confirmButtonText: 'Oui, supprimer !',
									cancelButtonText: 'Annuler',
									customClass: {
									confirmButton: 'btn btn-danger',
									cancelButton: 'btn btn-secondary'},
									buttonsStyling: false
								}).then((result) => {
									if (result.isConfirmed) {
										$.ajax({
											url: url,
											type: 'POST',
											data: form.serialize(), // _token + _method=DELETE
											success: function (response) {
												if (response.status === 'success') {
													Swal.fire(
														'Supprimé !',
														response.message,
														'success'
													).then(() => {
														window.location.href = form.data('url');
													});
												} else {
													Swal.fire('Erreur', response.message, 'error');
												}
											},
											error: function () {
												Swal.fire(
													'Erreur',
													'Impossible de supprimer ' + nomUtilisateur,
													'error'
												);
											}
										});
									}
								});
							});
							</script>
								<!--end::Content wrapper-->

@endsection