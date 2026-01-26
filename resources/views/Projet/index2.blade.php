 
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

			#kt_app_toolbar_container {
				position: relative;
                 left: -75px; 
				width: 110% !important;
			}


			.btn.btn-primary{
    background-color: #ff9900 !important; /* orange */
    border-color: #ff9900 !important;     /* orange */
    color: #fff !important;               /* texte blanc */
}
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

<base href="../" />
		<title>Pages Projet</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="canonical" href="{{ url('/Projects') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
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
						<div class="app-header-wrapper d-flex flex-grow-1 align-items-stretch justify-content-between" id="kt_app_header_wrapper">
							<!--begin::Menu wrapper-->
							<div class="app-header-menu app-header-mobile-drawer align-items-start align-items-lg-center w-100" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
								<!--begin::Menu-->
								
								<!--end::Menu-->
							</div>
							<!--end::Menu wrapper-->
							<!--begin::Logo wrapper-->
							
							<!--end::Navbar-->
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
								<img alt="Logo" src="assets/media/logos/logo-gs2e-dark.svg" class="h-20px h-lg-25px theme-dark-show" />
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
											// Vérifie si l'utilisateur a un avatar et si le fichier existe
											$avatarPath = (Auth::user()->avatar && file_exists(public_path('avatars/' . Auth::user()->avatar)))
														? 'avatars/' . Auth::user()->avatar
														: 'assets/media/avatars/blank.jpg';
										@endphp

										<img src="{{ asset($avatarPath) }}" alt="{{ Auth::user()->nom }}" class="w-100" />
                                    </a>
										<!-- Cercle vert pour statut en ligne -->
										<div class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3"></div>
								</div>
								<!--begin::User account menu-->
								
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
								<!--begin::Progress-->
								
								@include('layouts.sidebar_home')
							</div>
							<!--end::Nav wrapper-->
						</div>
						<!--end::Sidebar nav-->
						<!--begin::Footer-->
						<div class="flex-column-auto d-flex justify-content-end px-4 px-lg-8 py-3 py-lg-8" id="kt_app_sidebar_footer">
							<!--begin::Apps-->
							<div class="menu-item px-3">
								<form action="{{ route('logout') }}" method="POST">
									@csrf
									<button type="submit" class="btn btn-sm  btn-orange-primary fw-semibold me-2" data-bs-toggle="modal">Déconnexion</button>
								</form>
							</div>
						
						
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-0">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
								<div class="card">
									<div class="card-header border-0 pt-5">
										<!--begin::Card title-->
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bold text-gray-800">Liste des Projets</span>
											<span class="text-gray-400 mt-1 fw-semibold fs-6">Gestion des projets de l'application</span>
										</h3>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Toolbar-->
											<div class="d-flex justify-content-end" data-kt-projets-table-toolbar="base">
												<!--begin::Add projets-->
												<button type="button" class="btn btn-orange-primary" data-bs-toggle="modal" data-bs-target="#createProjetsModal">
													+ Ajouter un projet
												</button>
												<!--end::Add projets-->
											</div ""
											<!--end::Toolbar-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									
									<!--begin::Search bar-->
									<div class="card-header border-0 pt-0 pb-5">
										<div class="d-flex align-items-center position-relative my-1">
											<i class="ki-outline ki-magnifier fs-1 position-absolute ms-6"></i>
											<input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-14" placeholder="Rechercher un projet..." />
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
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_projets">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_projets .form-check-input" value="1" />
															</div>
														</th>
														<th class="min-w-150px">Projet</th>
														<th class="min-w-120px">Description</th>
														<th class="min-w-120px">Statut</th>
														<th class="min-w-150px">Date de création</th>
														<th class="min-w-200px text-center">Actions</th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													@forelse($projets as $projet)
														<tr>
															<td>
																<div class="form-check form-check-sm form-check-custom form-check-solid">
																	<input class="form-check-input" type="checkbox" value="{{ $projet->id }}" />
																</div>
															</td>
															<td class="d-flex align-items-center">
																<!--begin::User details-->
																<div class="d-flex flex-column">
																	<span class="text-gray-800 text-hover-primary mb-1 fw-bold">{{ $projet->nom }}</span>
																</div>
																<!--end::User details-->
															</td>
															<td>{{ $projet->description }}</td>
															<td>
																<span class="badge badge-light-{{ 
																	$projet->statut === 'en_production' ? 'danger' : 
																	($projet->statut === 'en_developpement' ? 'warning' : 'success') 
																}}">
																	{{ ucfirst(str_replace('_', ' ', $projet->statut)) }}
																</span>
															</td>
															<td>{{ $projet->created_at->format('d/m/Y H:i') }}</td>
															<td class="text-center">
																<!--begin::Action buttons-->
																<div class="d-flex justify-content-center align-items-center">	
																	<a href="{{ route('projet.show', $projet) }}" class="btn btn-bg-light btn-orange-primary me-3">
																		Voir les détails
																	</a>
																</div>
																<!--end::Action buttons-->
															</td>
														</tr>
													@empty
														<tr>
															<td colspan="6" class="text-center text-muted py-4">
																Aucun projet trouvé
															</td>
														</tr>
													@endforelse
												</tbody>
											</table>
											<div class="d-flex justify-content-center mt-4">
												{{ $projets->links() }}
											</div>

										</div>
										<!--end::Table-->
									</div>
									<!--end::Card body-->
								</div>
												<!--end::Header-->
												<!--begin::Menu separator-->
												<div class="separator border-gray-200"></div>
												<!--end::Menu separator-->
												<!--begin::Form-->
												<div class="px-7 py-5">
													<!--begin::Input group-->
													
													<!--end::Input group-->
													<!--begin::Input group-->
													
													<!--end::Input group-->
													<!--begin::Input group-->
													
													<!--end::Input group-->
													<!--begin::Actions-->
													
													<!--end::Actions-->
												</div>
												<!--end::Form-->
											</div>
											<!--end::Menu 1-->
										</div>
										<!--end::Filter menu-->
										<!--begin::Secondary button-->
										<!--end::Secondary button-->
										<!--begin::Primary button-->
										
										<!--end::Primary button-->
									</div>
									<!--end::Actions-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
						
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>

        

        <div  class="modal fade" id="createProjetsModal" tabindex="-1" aria-labelledby="createProjetsModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-lg">
			  
				<div class="modal-content">
					
					<!-- Header -->
					<div class="modal-header">
						
						<h2 class="modal-title" id="createProjetsModalLabel">Créer un projet</h2>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
						
					</div>

					<!-- Body -->
					<div class="modal-body">
						<form method="POST" action="{{ route('projet.store') }}" class="form" id="kt_sign_up_form">
							@csrf

							<div class="card-body border-top p-9">
								<!-- Titre / Instruction -->
								<div class="text-center mb-11">
									<div class="text-gray-500 fw-semibold fs-6">Remplissez le formulaire ci-dessous</div>
								</div>

								<!-- Nom du projet -->
								<div class="row mb-6">
									<label class="col-lg-4 col-form-label required fw-semibold fs-6">Nom du projet</label>
									<div class="col-lg-8 fv-row">
										<input type="text" name="nom" placeholder="Nom du projet" class="form-control form-control-lg form-control-solid @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required />
										@error('nom')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>

								
								<!-- Description du projet -->
									<div class="row mb-6">
										<label class="col-lg-4 col-form-label fw-semibold fs-6">Description</label>
										<div class="col-lg-8 fv-row">
											<textarea name="description" placeholder="Description du projet" class="form-control form-control-lg form-control-solid @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>
											@error('description')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
											<div class="form-text text-muted">255 caractères maximum.</div>
										</div>
									</div>


								<!-- Statut du projet -->
								<div class="row mb-6">
									<label class="col-lg-4 col-form-label fw-semibold fs-6">Statut</label>
									<div class="col-lg-8 fv-row">
										<select name="statut" class="form-select form-select-lg form-select-solid @error('statut') is-invalid @enderror" autocomplete="off" data-control="select2" data-hide-search="true" data-placeholder="Choisissez un statut" required>
											<option value="">Choisissez un statut</option>
											<option value="en_production" {{ old('statut') == 'en_production' ? 'selected' : '' }}>En production</option>
											<option value="en_recette" {{ old('statut') == 'en_recette' ? 'selected' : '' }}>En recette</option>
											<option value="en_developpement" {{ old('statut') == 'en_developpement' ? 'selected' : '' }}>En développement</option>
										</select>
										@error('statut')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
							</div>

							<!-- Actions / Boutons -->
							<div class="card-footer d-flex justify-content-end py-6 px-9 gap-3">
								<button type="button" class="btn btn-light btn-active-light-primary" data-bs-dismiss="modal">Annuler</button>
								<button type="submit" class="btn btn-primary">
									<span class="indicator-label">Créer le projet</span>
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
			
				
		<!--end::App-->
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->
		
		<!--end::Activities drawer-->
		<!--begin::Chat drawer-->
		<!--end::Modal - Invite Friend-->
		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>
						document.addEventListener('DOMContentLoaded', function() {
					const searchInput = document.getElementById('searchInput');

					searchInput.addEventListener('keyup', function() {
						const filter = this.value.toLowerCase();
						const tableRows = document.querySelectorAll('#kt_table_projets tbody tr'); // sélection ici
						tableRows.forEach(row => {
							const text = row.textContent.toLowerCase();
							row.style.display = text.includes(filter) ? '' : 'none';
						});
					});
				});

        </script>


		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		 <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/main.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/new-address.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>