            
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
											<!--begin::Toolbar-->
											<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
												<!--begin::Add user-->
												<a href="{{ route('projet.create') }}" class="btn btn-primary">
													<i class="ki-outline ki-plus fs-2"></i>Créer un Projet</a>
												<!--end::Add user-->
											</div>
											<!--end::Toolbar-->
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
												<div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
													<img class="mw-50px mw-lg-75px" src="assets/media/svg/brand-logos/volicity-9.svg" alt="image" />
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
																<div class="col-8">{{ '$projet()->nom' }}</div>
																<span class="badge badge-light-success me-auto">{{ '$projet->statut' }}</span>
															</div>
															<!--end::Status-->
															<!--begin::Description-->
															<div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">{{ '$projet->description' }}</div>
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
																	<div class="fs-4 fw-bold">{{ '$projet->created_at'? '$projet->created_at->format("d/m/Y H:i")' : 'N/A'  }}</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-semibold fs-6 text-gray-500">Créé le</div>
																<!--end::Label-->
															</div>

                                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<div class="fs-4 fw-bold">{{'$projet->creator ? $projet->creator-> nom : "Inconnu" ' }}</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-semibold fs-6 text-gray-500">Créé par</div>
																<!--end::Label-->
															</div>
                                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<div class="fs-4 fw-bold">{{ '$projet->updater ? $projet->updater-> nom: "-" ' }}</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-semibold fs-6 text-gray-500">Modifier par</div>
																<!--end::Label-->
															</div>
                                                            <div class="d-flex mb-4">
                                                               <div class="d-flex flex-wrap justify-content-center gap-4 mt-8">
                                                                    <a href="{{ route('projet.edit', '$projet') }}" class="btn btn-bg-light btn-primary me-3" data-bs-toggle="modal">
                                                                        <i class="ki-outline ki-pencil fs-4"></i>
                                                                        Modifier
                                                                    </a>
                                                                    
                                                                    <form action="{{ route('projet.destroy', '$projet') }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger me-3">
                                                                            <i class="ki-outline ki-trash fs-4"></i>
                                                                            Supprimer
                                                                        </button>
                                                                    </form>

                                                                    <a href="{{ route('projet.index2') }}" class="btn btn-bg-light me-3">
                                                                        <i class="ki-outline ki-arrow-left fs-4"></i>
                                                                        Retour à la liste
                                                                    </a>
                                                                    
                                                                    
                                                             </div>
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
													<a class="nav-link text-active-primary py-5 me-6 active" href="apps/projects/project.html">Liens</a>
												</li>
												<!--begin::Nav item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary py-5 me-6" href="{{route(projet.document)">Documents</a>
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
