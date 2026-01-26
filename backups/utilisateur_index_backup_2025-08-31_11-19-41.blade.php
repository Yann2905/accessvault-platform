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
<html lang="fr">
	<!--begin::Head-->
	<head>
		<title>Page Utilisateurs</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="canonical" href="{{ url('/utilisateur') }}" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
					<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
						<div class="app-header-wrapper d-flex flex-grow-1 align-items-stretch justify-content-between" id="kt_app_header_wrapper">
							<div class="d-flex align-items-center">
								<div class="btn btn-icon btn-color-gray-600 btn-active-color-primary ms-n3 me-2 d-flex d-lg-none" id="kt_app_sidebar_toggle">
									<i class="ki-outline ki-abstract-14 fs-2"></i>
								</div>
								<a href="{{ route('index') }}" class="d-flex d-lg-none">
									<img alt="Logo" src="{{ asset('assets/media/logos/logo-gs2e.svg') }}" class="h-20px theme-light-show" />
									<img alt="Logo" src="{{ asset('assets/media/logos/logo-gs2e-dark.svg') }}" class="h-20px theme-dark-show" />
								</a>
							</div>
							<div class="app-navbar flex-shrink-0">
								<div class="app-navbar-item ms-1 ms-lg-3">
									<div class="btn btn-icon btn-circle btn-color-gray-500 btn-active-color-primary btn-custom shadow-xs bg-body" id="kt_drawer_chat_toggle">
										<i class="ki-outline ki-message-notif fs-1"></i>
									</div>
								</div>
								
								<div class="app-navbar-item d-lg-none ms-2 me-n4" title="Show header menu">
									<div class="btn btn-icon btn-color-gray-600 btn-active-color-primary" id="kt_app_header_menu_toggle">
										<i class="ki-outline ki-text-align-left fs-2 fw-bold"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="275px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">
						<!--begin::Logo-->
						<div class="d-flex flex-stack px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">
							<!--begin::Logo image-->
							<a href="{{ route('index') }}">
								<img alt="Logo" src="{{ asset('assets/media/logos/logo-gs2e.svg') }}" class="h-20px h-lg-25px theme-light-show" />
								<img alt="Logo" src="{{ asset('assets/media/logos/logo-gs2e-dark.svg') }}" class="h-20px h-lg-25px theme-dark-show" />
							</a>
							<!--end::Logo image-->
							<!--begin::User menu-->
							<div class="ms-3">
								<!--begin::Menu wrapper-->
								<div class="cursor-pointer position-relative symbol symbol-circle symbol-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									<img src="{{ asset('assets/media/avatars/300-2.jpg') }}" alt="user" />
									<div class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3"></div>
								</div>
								<!--begin::User account menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content d-flex align-items-center px-3">
											<!--begin::Avatar-->
											<div class="symbol symbol-50px me-5">
												<img alt="Logo" src="{{ asset('assets/media/avatars/300-2.jpg') }}" />
											</div>
											<!--end::Avatar-->
											<!--begin::Username-->
											<div class="d-flex flex-column">
												<div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->nom ?? 'Utilisateur' }}</div>
												<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email ?? 'email@example.com' }}</a>
											</div>
											<!--end::Username-->
										</div>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="{{ route('profile.edit') }}" class="menu-link px-5">Mon Profil</a>
									</div>
									<!--end::Menu item-->
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
							<div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column hover-scroll-y pe-4 me-n4" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_nav" data-kt-scroll-offset="5px">
								@include('layouts.sidebar_home')
							</div>
							<div class="flex-column-auto d-flex justify-content-end px-4 px-lg-8 py-3 py-lg-8" id="kt_app_sidebar_footer">

						       <div class="menu-item px-3">

								<form action="{{ route('logout') }}" method="POST">

									@csrf

									<button type="submit" class="btn btn-sm  btn-light btn-primary fw-semibold me-2" data-bs-toggle="modal" >

										Déconnexion

									</button>

								</form>
							</div>

							</div>
							<!--end::Nav wrapper-->
						</div>
						
						<!--end::Sidebar nav-->
					</div>
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content-->
						<div id="kt_app_content" class="app-content flex-column-fluid">
							<!--begin::Content container-->
							<div id="kt_app_content_container" class="app-container container-xxl">
								<!--begin::Card-->
								<div class="card">
									<!--begin::Card header-->
									<div class="card-header border-0 pt-5">
										<!--begin::Card title-->
										<h3 class="card-title align-items-start flex-column">
											<span class="card-label fw-bold text-gray-800">Liste des Utilisateurs</span>
											<span class="text-gray-400 mt-1 fw-semibold fs-6">Gestion des utilisateurs de l'application</span>
										</h3>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Toolbar-->
											<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
												<!--begin::Add user-->
												<a href="{{ route('utilisateur.create') }}" class="btn btn-primary">
													<i class="ki-outline ki-plus fs-2"></i>Ajouter un utilisateur</a>
												<!--end::Add user-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									
									<!--begin::Search bar-->
									<div class="card-header border-0 pt-0 pb-5">
										<div class="d-flex align-items-center position-relative my-1">
											<i class="ki-outline ki-magnifier fs-1 position-absolute ms-6"></i>
											<input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Rechercher un utilisateur..." />
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
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
															</div>
														</th>
														<th class="min-w-150px">Utilisateur</th>
														<th class="min-w-200px">Email</th>
														<th class="min-w-120px">Rôle</th>
														<th class="min-w-150px">Date de création</th>
														<th class="min-w-200px text-center">Actions</th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													@forelse($utilisateurs as $utilisateur)
														<tr>
															<td>
																<div class="form-check form-check-sm form-check-custom form-check-solid">
																	<input class="form-check-input" type="checkbox" value="{{ $utilisateur->id }}" />
																</div>
															</td>
															<td class="d-flex align-items-center">
																<!--begin::User details-->
																<div class="d-flex flex-column">
																	<span class="text-gray-800 text-hover-primary mb-1 fw-bold">{{ $utilisateur->nom }}</span>
																	<span class="text-muted fs-7">ID: {{ $utilisateur->id }}</span>
																</div>
																<!--end::User details-->
															</td>
															<td>
																<a href="mailto:{{ $utilisateur->email }}" class="text-gray-800 text-hover-primary">{{ $utilisateur->email }}</a>
															</td>
															<td>
																<span class="badge badge-light-{{ $utilisateur->role === 'admin' ? 'danger' : 'success' }}">
																	{{ ucfirst($utilisateur->role) }}
																</span>
															</td>
															<td>{{ $utilisateur->created_at->format('d/m/Y H:i') }}</td>
																														<td class="text-center">
																<!--begin::Action buttons-->
																<div class="d-flex justify-content-center align-items-center">
																	<a href="{{ route('utilisateur.show', $utilisateur) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-2" title="Voir les détails">
																		<i class="ki-outline ki-eye fs-2"></i>
																	</a>
																	<a href="{{ route('utilisateur.edit', $utilisateur) }}" class="btn btn-icon btn-bg-light btn-active-color-warning btn-sm me-2" title="Modifier">
																		<i class="ki-outline ki-pencil fs-2"></i>
																	</a>
																	<form action="{{ route('utilisateur.destroy', $utilisateur) }}" method="POST" class="d-inline">
																		@csrf
																		@method('DELETE')
																		<button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
																			<i class="ki-outline ki-trash fs-2"></i>
																		</button>
																	</form>
																</div>
																<!--end::Action buttons-->
															</td>
														</tr>
													@empty
														<tr>
															<td colspan="6" class="text-center text-muted py-4">
																Aucun utilisateur trouvé
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
								<!--end::Card-->
							</div>
							<!--end::Content container-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('assets/') }}";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('assets/js/custom/apps/projects/list/list.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
		
		<!--begin::Search functionality-->
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const searchInput = document.querySelector('input[data-kt-filter="search"]');
				const tableRows = document.querySelectorAll('#kt_table_users tbody tr');
				
				searchInput.addEventListener('input', function() {
					const searchTerm = this.value.toLowerCase().trim();
					
					tableRows.forEach(row => {
						const userName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
						const userEmail = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
						
						if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
							row.style.display = '';
						} else {
							row.style.display = 'none';
						}
					});
				});
			});
		</script>
		<!--end::Search functionality-->
		
		<!--begin::Custom CSS for table alignment-->
		<style>
			.table-responsive {
				overflow-x: auto;
				overflow-y: hidden;
			}
			
			#kt_table_users {
				min-width: 800px;
			}
			
			#kt_table_users th:last-child,
			#kt_table_users td:last-child {
				min-width: 200px;
				width: 200px;
			}
			
			.btn-icon {
				width: 32px;
				height: 32px;
				padding: 0;
				display: inline-flex;
				align-items: center;
				justify-content: center;
			}
		</style>
		<!--end::Custom CSS for table alignment-->
	</body>
	<!--end::Body-->
</html>
