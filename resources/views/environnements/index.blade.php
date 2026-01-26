@extends('layouts.app')     

@section('content') 

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
													<span class="card-label fw-bold text-gray-800">Liste des Environnements</span>
													<span class="text-gray-400 mt-1 fw-semibold fs-6">Gestion des environnements de l'application</span>
												</h3>
												<div class="card-toolbar">
													<!--begin::Toolbar-->
													<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
														<!-- Bouton qui ouvre le modal -->
														<button type="button" class="btn btn-orange-primary mb-4" data-bs-toggle="modal" data-bs-target="#createModal">
															+ Créer un environnemnt
														</button>

													</div>
													<!--end::Toolbar-->
												</div>
											</div>
												<div class="card-header border-0 pt-0 pb-5">
													<div class="d-flex align-items-center position-relative my-1">
															<i class="ki-outline ki-magnifier fs-1 position-absolute ms-6"></i>
															<input type="text" id="searchInput" class="form-control form-control-solid w-300px ps-14" placeholder="Rechercher un environnement..." />
													</div>
												</div>
												<!--end::Card title-->
												<!--begin::Card toolbar-->
												
												<!--end::Card toolbar-->
										     
											<!--end::Heading-->
									<div class="card-body py-4">
											<!--begin::Users Table-->
										   <div class="table-responsive" id="views_environnment_index">
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_views_environnements_index_table">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-bold text-muted">
															<th class="min-w-150px">libelle</th>
                                                            <th class="min-w-150px">couleur</th>
															<th class="min-w-120px">Date de création</th>
															<th class="min-w-120px">Dernière modification</th>
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
														@forelse($environnements ?? [] as $environnement)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		
																		<div class="text-dark fw-bold text-hover-primary fs-6">{{ $environnement->libelle }}</a>
																		
																	</div>
																</div>
															</td>
															<td><span class="badge badge-light-{{ $environnement->couleur }}">{{ ucfirst($environnement->couleur) }}</span></td>
															
															<td>
																<span class="text-muted fw-semibold text-muted d-block fs-7">
																	{{ $environnement->created_at ? $environnement->created_at->format('d/m/Y H:i') : 'N/A' }}
																</span>
															</td>
															<td>
																<span class="text-muted fw-semibold text-muted d-block fs-7">
																	{{ $environnement->updated_at ? $environnement->updated_at->format('d/m/Y H:i') : 'N/A' }}
																</span>
															</td>
															<td class="text-end">
																<div class="d-flex justify-content-end flex-shrink-0">
																	<a href="#" 
																			class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn"
																			data-bs-toggle="modal" 
																			data-bs-target="#editModal"
																			data-id="{{ $environnement->id }}"
																			data-libelle="{{ $environnement->libelle }}"
																			data-couleur="{{ $environnement->couleur }}"
																			title="Modifier">
																			<i class="ki-outline ki-pencil fs-2"></i>
																			</a>

																	
																	
																		
																	<form class= "delete-form"
																	action="{{ route('environnements.destroy', $environnement) }}" 
																		method="POST" 
																		style="display:inline;" 
																		data-id="{{ $environnement->id }}" 
																		data-nom="{{ $environnement->libelle }}" 
																		data-url="{{ route('environnements.index') }}">
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
																	<h3 class="text-muted fw-bold mb-2">Aucun environnement trouvé</h3>
																	<p class="text-muted fs-6">Commencez par créer votre premier environnement</p>
																	<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createModal">
                                                                        + Créer un environnement
                                                                    </button>
																</div>
															</td>
											 			</tr>
														@endforelse
													</tbody>
													<!--end::Table body-->
											</table>
											<div class="d-flex justify-content-center mt-4">
                                                 {{$environnements->links()}}
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

                        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form action="{{ route('environnements.store') }}" method="POST">
                                  @csrf
                                  <div class="modal-header">
                                    <h5 class="modal-title">Créer un environnement</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="mb-3">
                                      <label>Libellé</label>
                                      <input type="text" name="libelle" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                      <select name="couleur" class="form-select" data-control="select2" data-hide-search="true"
									  data-placeholder="Couleur" required>
                                        <option value="">Choisissez une couleur</option>
                                        <option value="primary">Bleu</option>
                                        <option value="warning">Orange</option>
                                        <option value="danger">Rouge</option>
                                        <option value="success">Vert</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Créer</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          
                          
                          <!-- ✅ Modal Modification -->
						  <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog">
							  <div class="modal-content">
								<form id="editForm" method="POST" action=" route('environnement.update',$environnement->id)">
								  @csrf
								  @method('PUT')
								  <div class="modal-header">
									<h5 class="modal-title">Modifier un environnement</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								  </div>
								  <div class="modal-body">
									<div class="mb-3">
									  <label>Libellé</label>
									  <input type="text" name="libelle" id="editLibelle" class="form-control" required>
									</div>
									<div class="mb-3">
									  <label>Couleur</label>
									  <select name="couleur" id="editCouleur" class="form-select" required>
										<option value="primary">Bleu</option>
										<option value="warning">Orange</option>
										<option value="danger">Rouge</option>
										<option value="success">Vert</option>
									  </select>
									</div>
								  </div>
								  <div class="modal-footer">
									<button type="submit" class="btn btn-warning">Modifier</button>
								  </div>
								</form>
							  </div>
							</div>
						  </div>
						  
                          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                          <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              const editButtons = document.querySelectorAll('.edit-btn');
                              const editForm = document.getElementById('editForm');
                              const editLibelle = document.getElementById('editLibelle');
                              const editCouleur = document.getElementById('editCouleur');
                          
                              editButtons.forEach(button => {
                                  button.addEventListener('click', () => {
                                      const id = button.dataset.id;
                                      const libelle = button.dataset.libelle;
                                      const couleur = button.dataset.couleur;
                          
                                      editLibelle.value = libelle;
                                      editCouleur.value = couleur;
                                      editForm.action = `/environnements/${id}`;
                                  });
                              });
                          });


						  $(document).on('click', '.delete-form button', function (e) {
    e.preventDefault();

    let form = $(this).closest('form');
    let id = form.data('id');
    let nom = form.data('nom'); // ✅ correspond maintenant au HTML
    let url = form.attr('action');

    Swal.fire({
        title: 'Êtes-vous sûr de vouloir supprimer ' + nom + ' ?',
        text: "Cette action est irréversible.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Annuler',
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary'
        },
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




document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('kt_views_environnements_index_table');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();

        for (let i = 0; i < rows.length; i++) {
            const libelleCell = rows[i].getElementsByTagName('td')[0]; // première colonne : libelle
            if (libelleCell) {
                const text = libelleCell.textContent || libelleCell.innerText;
                rows[i].style.display = text.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
            }
        }
    });
});





                          </script>

@endsection
