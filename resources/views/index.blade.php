
<!DOCTYPE html>

<!--

Author: Keenthemes

Product Name: MetronicProduct Version: 8.2.5

Purchase: https://1.envato.market/EA4JP

Website: http://www.keenthemes.com

Contact: support@keenthemes.com

Follow: www.twitter.com/keenthemes

Dribbble: www.dribbble.com/keenthemes

Like: www.facebook.com/keenthemes

License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.

-->

<html lang="en">

	<!--begin::Head-->

	<head>
<style>

#kt_app_sidebar {
			width: 250px !important;
		}

		#kt_app_wrapper {
				position: relative;
                 left: -75px; 
				
			}

			#kt_app_content_container1 {
    position: relative;
	bottom: 150px;
    left: -20px; /* décale vers la gauche */
    top: -80px;   /* descend de 20px */

}


.card.border-hover-primary {
    height: 250px; /* hauteur souhaitée */
    overflow: hidden; /* coupe le contenu qui dépasse */
	width: 240px !important;
}

#kt_app_content_container {
    position: relative;
    left:-120px; /* décale vers la gauche */
    top: 30px;   /* descend de 20px */

}


.delete-form button {
    position: relative;
    z-index: 10;
    cursor: pointer;
}


			/* Boutons btn-primary orange personnalisés */
.btn-orange-primary,
.btn-orange-primary.btn-active-light-primary,
.btn-orange-primary.btn-focus {
    background-color: #ff9900 !important;  /* orange de base */
    border-color: #ff9900 !important;
    color: #fff !important;                /* texte blanc */
    box-shadow: none !important;           /* supprime le halo bleu */
}

/* Hover */
.btn-orange-primary:hover,
.btn-orange-primary.btn-active-light-primary:hover,
.btn-orange-primary.btn-focus:hover {
    background-color: #e68a00 !important; /* orange un peu plus foncé */
    border-color: #e68a00 !important;
    color: #fff !important;
}

/* Active / Focus / Focus-visible */
.btn-orange-primary:focus,
.btn-orange-primary:active,
.btn-orange-primary:focus-visible,
.btn-orange-primary.btn-active-light-primary:active,
.btn-orange-primary.btn-focus:active {
    background-color: #e68a00 !important;
    border-color: #e68a00 !important;
    color: #fff !important;
    box-shadow: none !important;
}

			
				
</style>

		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

		<!--end::Fonts-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

		<!--begin::Vendor Stylesheets(used for this page only)-->

		<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">

		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet">



		<!--end::Global Stylesheets Bundle-->

		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>

	</head>

	<!--end::Head-->

	<!--begin::Body-->

	<body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">

		<!--begin::Theme mode setup on page load-->

		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>

		<!--end::Theme mode setup on page load-->

		<!--begin::App-->

		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">

			<!--begin::Page-->

			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">

				<!--begin::Header-->

				<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate-="true" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: '200px', lg: '300px'}">

					<!--begin::Header container-->

					<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">

						<!--begin::Header wrapper-->

						<div id="kt_app_content_container" class="app-container container-xxl">
								@if(Auth::user()->role==='utilisateur')
											<!--begin::Toolbar-->
											<div class="page-title d-flex flex-column justify-content-center me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Mon Tableau de bord</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">Mes projets ajoutés</li>
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>
												
											<!--end::Toolbar-->

											<!--begin::Row-->
											<div class="row g-6 g-xl-9">
												@foreach($projets as $projet)
													<div class="col-md-6 col-xl-4" id="projet-{{ $projet->id }}">
														
														<!--  Carte du projet -->
														<div class="card project-card border-hover-primary "
															data-url="{{ route('utilisateur.projets.show', ['projet' => $projet->id, 'from' => 'dashboard']) }}"
															style="cursor: pointer;"> <!-- le style pointer montre que c’est cliquable -->

															<!-- En-tête de la carte -->
															<div class="card-header border-0 pt-9">
																<div class="card-title m-0">
																	<div class="symbol symbol-50px w-50px bg-light">
																		@php
																			// On vérifie si le projet a un logo enregistré, sinon on affiche un logo par défaut
																			$logo = ($projet->logo && file_exists(public_path($projet->logo))) 
																				? asset($projet->logo) 
																				: asset('assets/media/svg/brand-logos/volicity-9.svg');
																		@endphp
																		<img src="{{ $logo }}" alt="logo du projet" class="p-3" />
																	</div>
																</div>

																<!--  Statut du projet -->
																<div class="card-toolbar">
																	<span class="badge badge-light-{{ 
																		$projet->statut === 'en_production' ? 'danger' : 
																		($projet->statut === 'en_developpement' ? 'warning' : 'success') 
																	}} fw-bold me-auto px-4 py-3">
																		{{ ucfirst($projet->statut) }}
																	</span>
																</div>
															</div>

															<!--  Corps de la carte -->
															<div class="card-body p-9">
																<div class="fs-3 fw-bold text-gray-900">{{ $projet->nom }}</div>
																<p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
																	{{ $projet->description }}
																</p>

																<!--  Boutons d'action -->
																<div class="d-flex gap-2">
																	<!--  Supprimer le projet -->
																	<form action="{{ route('utilisateur.projets.destroy', $projet->id) }}"
																		method="POST"
																		class="delete-form"
																		data-id="{{ $projet->id }}"
																		data-nom="{{ $projet->nom }}"
																		data-url="{{ route('index') }}">
																		@csrf
																		@method('DELETE')
																		<button type="button"
																				class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm btn-delete"
																				data-bs-toggle="tooltip"
																				title="Supprimer">
																			<i class="ki-outline ki-trash fs-2"></i>
																		</button>
																	</form>
																</div>
															</div>
															<!--  Fin du corps -->

														</div>
														<!-- Fin de la carte -->
													</div>
												@endforeach
											</div>
                                @endif
											<!--end::Row-->
                                         
										</div>
										<!--end::Content container-->
									</div>
                                
									

								</div>

						<!--end::Header wrapper-->

					</div>

					<!--end::Header container-->

				</div>

				<!--end::Header-->

				<!--begin::Wrapper-->

				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

					<!--begin::Sidebar-->

					<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="275px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">

						<!--begin::Logo-->

						<div class="d-flex flex-stack px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">

							<!--begin::Logo image-->

							<a href="index.html">

								<img alt="Logo" src="assets/media/logos/logo-gs2e.svg" class="h-20px h-lg-25px theme-light-show" />

								<img alt="Logo" src="assets/media/logos/logo-gs2e.svg" class="h-20px h-lg-25px theme-dark-show" />

							</a>

							<!--end::Logo image-->

							<!--begin::User menu-->

							<div class="ms-3">

								<!--begin::Menu wrapper-->

								<div class="cursor-pointer position-relative symbol symbol-circle symbol-40px" 
										data-kt-menu-trigger="{default: 'click', lg: 'hover'}" 
										data-kt-menu-attach="parent" 
										data-kt-menu-placement="bottom-end">


										
									<a href="{{ route('utilisateur.monProfil') }}" class="cursor-pointer position-relative symbol symbol-circle symbol-40px">
										@php
											$avatarPath = (Auth::user()->avatar && file_exists(public_path('avatars/' . Auth::user()->avatar)))
												? 'avatars/' . Auth::user()->avatar
												: 'assets/media/avatars/blank.jpg';
										@endphp

										<img src="{{ asset($avatarPath) }}" alt="{{ Auth::user()->nom }}" class="w-100" />
										<div class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3"></div>
									</a>
								</div>

								<!--begin::User account menu-->

								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px">

									<!--begin::Menu item-->

									<div class="menu-item px-3">

										<div class="menu-content d-flex align-items-center px-3">

											<!--begin::Avatar-->

											

											

										</div>

									</div>

								

								</div>

								<!--end::User account menu-->

								<!--end::Menu wrapper-->

							</div>

                                <!--end::User menu-->

						</div>



						<!--end::Logo-->

						<!--begin::Sidebar nav-->

						<div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">

							<!--begin::Nav wrapper-->



							<div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column  pe-4 me-n4" >
								

								<div class="mb-6">

									<!--begin::Title-->

									

									<!--end::Title-->

									<!--begin::Row-->



                                <div class="container mt-5">

    



                                 <div class="d-flex flex-column gap mt-5">

                                     @if(Auth::user()->role === 'admin')

                                        <div class="col mb-4">

                                             <a href="{{ route('projet.index2') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">

                                                 <span class="mb-2">

                                                      <i class="ki-outline ki-briefcase fs-1"></i>

                                                 </span>

                                                 <span class="fs-7 fw-bold">Gestion des projets</span>

                                             </a>

                                        </div>


										

								 
			

                                 <div class="col mb-4">

                                     <a href="{{ route('utilisateur.index') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">

                                         <span class="mb-2">

                                             <i class="ki-outline ki-user fs-1"></i>

                                          </span>

                                         <span class="fs-7 fw-bold">Gestion des utilisateurs</span>

                                     </a>

                                 </div>

		

								 <div class="col mb-4">

										<a href="{{ route('environnements.index') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">

												<span class="mb-2">

													<i class="ki-outline ki-abstract-28 fs-1"></i>

												</span>

											<span class="fs-7 fw-bold">Gestion des Environnements</span>

										</a>

										</div>


                                  @elseif(Auth::user()->role === 'utilisateur')

										<div class="col mb-4">

											<a href="{{ route('utilisateur.projets.index') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">

												<span class="mb-2">

													<i class="ki-outline ki-plus fs-1"></i>

												</span>

												<span class="fs-7 fw-bold">Ajouter un projet</span>

											</a>

										</div>

                                    @endif

                                </div>



                            </div>





							  			

									</div>



									<!--end::Row-->

								</div>

								                     </div>

                     <div class="flex-column-auto d-flex justify-content-end px-4 px-lg-8 py-3 py-lg-8" id="kt_app_sidebar_footer">

						     

				<div class="menu-item px-3">

					<form action="{{ route('logout') }}" method="POST">

						@csrf

						<button type="submit" class="btn btn-sm  btn-light btn-orange-primary fw-semibold me-2" data-bs-toggle="modal" >

							Déconnexion

						</button>

					</form>

				</div>

					

							<!--begin::Settings-->

								<!--end::Links-->

							</div>

					<!--end::Nav wrapper-->

						</div>

						<!--end::Sidebar nav-->

						<!--begin::Footer-->

					

					<!--end::Sidebar-->

					<!--begin::Main-->

								<div class="app-main flex-column flex-row-fluid" id="kt_app_main">

									<!--begin::Content wrapper-->
									@if(Auth::user()->role === 'admin')
									<div class="d-flex flex-column flex-column-fluid">

										<!--begin::Content-->

										<div id="kt_app_content" class="app-content flex-column-fluid">

											<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
									   <!--begin::Content wrapper-->
									     <div class="d-flex flex-column flex-column-fluid">
										<!--begin::Content-->
										<div id="kt_app_content" class="app-content flex-column-fluid">
											<!--begin::Content container-->
											<div id="kt_app_content_container1" class="app-container container-xxl">
												<div class="row gx-6 gx-xl-9">
													<div class="col-lg-6 col-xxl-4 mb-5">
														<div class="card h-100">
															<div class="card-body p-9">
																
																<!-- Total projets -->
																<div class="fs-2hx fw-bold">{{ $totalProjets }}</div>
																<div class="fs-4 fw-semibold text-gray-500 mb-7">Total des Projets</div>

																<!-- Graphique + Statistiques -->
																<div class="d-flex flex-wrap">
																	<!-- Chart -->
																	<div class="d-flex flex-center h-100px w-100px me-9 mb-5">
																		<canvas id="kt_project_list_chart" width="150" height="150"></canvas>
																	</div>

																	<!-- Labels -->
																	<div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
																		<div class="d-flex fs-6 fw-semibold align-items-center mb-3">
																			<div class="bullet bg-warning me-3"></div>
																			<div class="text-gray-500">Développement</div>
																			<div class="ms-auto fw-bold text-gray-700">{{ $statsProjets['developpement'] }}</div>
																		</div>
																		<div class="d-flex fs-6 fw-semibold align-items-center mb-3">
																			<div class="bullet bg-success me-3"></div>
																			<div class="text-gray-500">Recette</div>
																			<div class="ms-auto fw-bold text-gray-700">{{ $statsProjets['recette'] }}</div>
																		</div>
																		<div class="d-flex fs-6 fw-semibold align-items-center">
																			<div class="bullet bg-danger me-3"></div>
																			<div class="text-gray-500">Production</div>
																			<div class="ms-auto fw-bold text-gray-700">{{ $statsProjets['production'] }}</div>
																		</div>
																	</div>
																</div>

																<!-- 🆕 Derniers projets créés -->
																<div class="mt-6">
																	<div class="fw-bold text-gray-600 mb-3">Derniers Projets</div>

																	@forelse($derniersProjets as $projet)
																		<div class="d-flex align-items-center mb-3">
																			<!-- Logo du projet -->
																			<div class="symbol symbol-40px me-4">
																				<img src="{{ $projet->logo && file_exists(public_path($projet->logo)) ? asset($projet->logo) : asset('assets/media/svg/brand-logos/volicity-9.svg') }}" class="rounded">
																			</div>

																			<!-- Infos du projet -->
																			<div class="flex-grow-1">
																				<div class="fw-semibold text-gray-800 fs-6">{{ $projet->nom }}</div>
																				<div class="text-muted fs-7">{{ ucfirst(str_replace('_', ' ', $projet->statut)) }}</div>
																			</div>

																			<!-- Badge statut visuel -->
																			<span class="badge 
																				@if($projet->statut == 'en_developpement') badge-light-warning
																				@elseif($projet->statut == 'en_recette') badge-light-success
																				@elseif($projet->statut == 'en_production') badge-light-danger
																				@else badge-light-secondary
																				@endif fs-8 px-3 py-2">
																				{{ ucfirst(str_replace('_', ' ', $projet->statut)) }}
																			</span>
																		</div>
																	@empty
																		<div class="text-muted fs-7">Aucun projet pour le moment</div>
																	@endforelse
																</div>

															</div>
														</div>
													</div>

												

													<div class="col-lg-6 col-xxl-4 mb-5">
														<!--begin::Accès Card-->
														<div class="card h-100">
															<div class="card-body p-9">
																
																<!--  Total accès -->
																<div class="fs-2hx fw-bold">{{ $totalAcces }}</div>
																<div class="fs-4 fw-semibold text-gray-500 mb-7">Total des Accès</div>

																<!--  Nombres par type -->
																@foreach($accesParType as $type => $nombre)
																	<div class="fs-6 d-flex justify-content-between mb-4">
																		<div class="fw-semibold">{{ ucfirst($type) }}</div>
																		<div class="d-flex fw-bold text-gray-700">{{ $nombre }}</div>
																	</div>
																	<div class="separator separator-dashed"></div>
																@endforeach

																<!--  Derniers accès créés -->
																<div class="mt-5">
																	<div class="fw-bold text-gray-600 mb-3">Derniers Accès</div>

																	@forelse($derniersAcces as $acces)
																		<div class="d-flex justify-content-between align-items-center mb-3">
																			<div>
																				<div class="fw-semibold text-gray-800">{{ ucfirst($acces->type) }}</div>
																				
																				@if($acces->type === 'lien')
																					<!-- Si c’est un lien -->
																					<a href="{{ $acces->url }}" target="_blank" class="text-primary fs-7">
																						{{ \Illuminate\Support\Str::limit($acces->url, 80) }}
																					</a>
																				@elseif($acces->type === 'identifiants')
																					<!-- Si c’est des identifiants -->
																					<div class="text-muted fs-7">
																						Email : {{ $acces->email ?? 'N/A' }}
																					</div>
																					<div class="text-muted fs-7">
																						Mot de passe : {{ $acces->mot_de_passe ?? 'N/A' }}
																					</div>
																				@else
																					<div class="text-muted fs-7">N/A</div>
																				@endif
																			</div>

																			<!-- Temps relatif -->
																			<span class="badge badge-light-primary fs-8">
																				{{ $acces->created_at->diffForHumans() }}
																			</span>
																		</div>
																	@empty
																		<div class="text-muted">Aucun accès pour le moment</div>
																	@endforelse
																</div>

															</div>
														</div>
														<!--end::Accès Card-->
													</div>
												
												

													<div class="col-lg-6 col-xxl-4 mb-5">
														<div class="card h-100">
															<div class="card-body p-9">
																<!-- Nombre total -->
																<div class="fs-2hx fw-bold">{{ $totalUtilisateurs }}</div>
																<div class="fs-4 fw-semibold text-gray-500 mb-7">Total des Utilisateurs</div>

																<!-- Groupe d'utilisateurs -->
																<div class="symbol-group symbol-hover mb-7">
																	@foreach($utilisateurs as $u)
																		<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $u->prenom }} {{ $u->nom }}">
																			@if($u->avatar && file_exists(public_path('avatars/'.$u->avatar)))
																				<img alt="Pic" src="{{ asset('avatars/'.$u->avatar) }}" />
																			@else
																				@php
																					$initial = strtoupper(substr($u->prenom ?? $u->nom ?? 'U', 0, 1));
																					$couleurs = ['primary', 'success', 'info', 'warning', 'danger', 'dark'];
																					$bg = $couleurs[array_rand($couleurs)];
																				@endphp
																				<span class="symbol-label bg-{{ $bg }} text-inverse-{{ $bg }} fw-bold">{{ $initial }}</span>
																			@endif
																		</div>
																	@endforeach

																	@if($totalUtilisateurs > count($utilisateurs))
																		<a href="{{ route('utilisateur.index') }}" class="symbol symbol-35px symbol-circle">
																			<span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+{{ $totalUtilisateurs - count($utilisateurs) }}</span>
																		</a>
																	@endif
																</div>

																<!-- Derniers utilisateurs créés -->
																<div class="mt-5">
																	<div class="fw-bold text-gray-600 mb-3">Derniers utilisateurs</div>
																	@forelse($derniersUtilisateurs as $u)
																		<div class="d-flex justify-content-between align-items-center mb-3">
																			<div class="d-flex align-items-center">
																				<div class="symbol symbol-30px symbol-circle me-3">
																					@if($u->avatar && file_exists(public_path('avatars/'.$u->avatar)))
																						<img alt="Pic" src="{{ asset('avatars/'.$u->avatar) }}" />
																					@else
																						@php
																							$initial = strtoupper(substr($u->prenom ?? $u->nom ?? 'U', 0, 1));
																							$couleurs = ['primary', 'success', 'info', 'warning', 'danger', 'dark'];
																							$bg = $couleurs[array_rand($couleurs)];
																						@endphp
																						<span class="symbol-label bg-{{ $bg }} text-inverse-{{ $bg }} fw-bold">{{ $initial }}</span>
																					@endif
																				</div>
																				<div>
																					<div class="fw-semibold text-gray-800">{{ $u->prenom }} {{ $u->nom }}</div>
																					<div class="text-muted fs-7">{{ $u->email }}</div>
																				</div>
																			</div>
																			<span class="badge badge-light-primary fs-8">{{ $u->created_at->diffForHumans() }}</span>
																		</div>
																	@empty
																		<div class="text-muted">Aucun utilisateur récent</div>
																	@endforelse
																</div>

																<!-- Actions -->
																
															</div>
														</div>
													</div>


													<div class="col-lg-6 col-xxl-4 mb-5">
														<!--begin::Environnements Card-->
														<div class="card h-100">
															<div class="card-body p-9">

																<!--  Total environnements -->
																<div class="fs-2hx fw-bold">{{ $totalEnvironnements }}</div>
																<div class="fs-4 fw-semibold text-gray-500 mb-7">Total des Environnements</div>

																<!--  Derniers environnements créés -->
																<div class="mt-5">
																	<div class="fw-bold text-gray-600 mb-3">Derniers Environnements</div>

																	@forelse($derniersEnvironnements as $environnement)
																		<div class="d-flex justify-content-between align-items-center mb-3">
																			<div>
																				
																				<span class="badge badge-light-{{ $environnement->couleur ?? 'secondary' }}">
																					{{ $environnement->libelle ?? 'Non défini' }}
																				</span>
																			</div>
																			<!-- Temps relatif -->
																			<span class="badge badge-light-primary fs-8">
																				{{ $environnement->created_at->diffForHumans() }}
																			</span>
																		</div>
																	@empty
																		<div class="text-muted">Aucun environnement pour le moment</div>
																	@endforelse
																</div>

																<!-- Actions -->
																

															</div>
														</div>
														<!--end::Environnements Card-->
													</div>



												</div>
												<!--end::Row-->
												<!--begin::Row-->
												<!--end::Row-->
											</div>
											<!--end::Content container-->
										</div>
										<!--end::Content-->
									</div>
									@endif
								</div>

								

								<!--end::Content container-->

							</div>

							<!--end::Content-->

						</div>

						<!--end::Content wrapper-->

						

					</div>

					<!--end:::Main-->

				</div>
				

				<!--end::Wrapper-->

			</div>

			<!--end::Page-->

		</div>

		<!--end::App-->

		<!--begin::Drawers-->

		<!--begin::Activities drawer-->

		

		<!--end::Modal - Invite Friend-->

		<!--end::Modals-->

		<!--begin::Javascript-->

		<script>var hostUrl = "assets/";</script>

		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('kt_project_list_chart');
    if (!canvas) {
        console.error('Canvas non trouvé');
        return;
    }

    const ctx = canvas.getContext('2d');

    const data = {
        labels: ['Développement', 'Recette', 'Production'],
        datasets: [{
            data: [
                {{ $statsProjets['developpement'] ?? 0 }},
                {{ $statsProjets['recette'] ?? 0 }},
                {{ $statsProjets['production'] ?? 0 }}
            ],
            backgroundColor: ['#FFC107', '#28A745', '#DC3545']
        }]
    };

    new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: { display: false }
            }
        }
    });
});
</script>

		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

		<!--end::Global Javascript Bundle-->

		<!--begin::Vendors Javascript(used for this page only)-->

		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>

		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>

		 <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

		<!--end::Vendors Javascript-->

		<!--begin::Custom Javascript(used for this page only)-->

		 <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>

	<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>

		<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>

		<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

		

		<!--end::Custom Javascript-->

		<!--end::Javascript-->
	@if(Auth::user()->role==='utilisateur')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script>
				$(document).on('click', '.btn-delete', function (e) {
    e.stopPropagation(); // empêche le clic parent de déclencher la redirection
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


document.addEventListener('DOMContentLoaded', function () {
    const projectCards = document.querySelectorAll('.project-card');

    projectCards.forEach(card => {
        card.addEventListener('click', function (event) {
            // si clic sur un bouton => on ne redirige pas
            if (event.target.closest('button')) return;

            const url = this.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });
});



document.querySelectorAll('.project-clickable').forEach(card => {
    card.addEventListener('click', function() {
        window.location.href = this.dataset.url;
    });
});




</script>





			
       @endif

	</body>

	<!--end::Body-->

</html>