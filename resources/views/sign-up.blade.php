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
		<title>GS2E - Création d'utilisateur</title>
		<meta charset="utf-8" />
		<meta name="description" content="Création d'utilisateur - Groupement des services Eau et Electricité" />
		<meta name="keywords" content="gs2e, utilisateur, création, admin" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="fr_FR" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="GS2E - Création d'utilisateur" />
		<meta property="og:url" content="{{ url('/sign-up') }}" />
		<meta property="og:site_name" content="GS2E" />
		<link rel="canonical" href="{{ url('/sign-up') }}" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		
		<script>
			// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
			if (window.top != window.self) { 
				window.top.location.replace(window.self.location.href); 
			}
		</script>
	</head>
	<!--end::Head-->
	
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>
			var defaultThemeMode = "light";
			var themeMode;
			if (document.documentElement) {
				if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
					themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
				} else {
					if (localStorage.getItem("data-bs-theme") !== null) {
						themeMode = localStorage.getItem("data-bs-theme");
					} else {
						themeMode = defaultThemeMode;
					}
				}
				if (themeMode === "system") {
					themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
				}
				document.documentElement.setAttribute("data-bs-theme", themeMode);
			}
		</script>
		<!--end::Theme mode setup on page load-->
		
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>
				body { 
					background-image: url('{{ asset("assets/media/auth/bg4.jpg") }}'); 
				}
				[data-bs-theme="dark"] body { 
					background-image: url('{{ asset("assets/media/auth/bg4-dark.jpg") }}'); 
				}
			</style>
			<!--end::Page bg image-->
			
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-center flex-lg-start flex-column">
						<!--begin::Logo-->
						<a href="index.html" class="mb-3 mb-lg-15">
							<img alt="Logo" src="assets/media/logos/GS2e.svg" class="h-75px h-lg-95px" />
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal m-0">Groupement des services Eau et Electricité</h2>
						<!--end::Title-->
					</div>
					<!--end::Aside-->
				</div>
				<!--begin::Aside-->
				
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
					<!--begin::Card-->
					<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
						<!--begin::Wrapper-->
						<div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="{{ route('utilisateur.store') }}">
								@csrf
								
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-gray-900 fw-bolder mb-3">Créer un utilisateur</h1>
									<!--end::Title-->
								</div>
								
								<!--begin::Input group - Nom-->
								<div class="fv-row mb-8">
									<input 
										type="text" 
										placeholder="Nom complet" 
										name="nom" 
										autocomplete="off" 
										value="{{ old('nom') }}" 
										class="form-control bg-transparent @error('nom') is-invalid @enderror" 
										required 
									/>
									@error('nom')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Input group-->
								
								<!--begin::Input group - Email-->
								<div class="fv-row mb-8">
									<input 
										type="email" 
										placeholder="Email" 
										name="email" 
										value="{{ old('email') }}" 
										autocomplete="off" 
										class="form-control bg-transparent @error('email') is-invalid @enderror" 
										required
									/>
									@error('email')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Input group-->
								
								<!--begin::Input group - Mot de passe-->
								<div class="fv-row mb-8" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input 
								 				class="form-control bg-transparent @error('password') is-invalid @enderror" 
												type="password" 
												placeholder="Mot de passe" 
												name="password" 
												autocomplete="off" 
												required
											/>
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="ki-outline ki-eye-slash fs-2"></i>
												<i class="ki-outline ki-eye fs-2 d-none"></i>
											</span>
										</div>
										<!--end::Input wrapper-->
										
										<!--begin::Meter-->
										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									@error('password')
										<div class="text-danger fs-7">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Input group-->
								
								<!--begin::Input group - Confirmation mot de passe-->
								<div class="fv-row mb-8">
									<input 
										placeholder="Confirmer le mot de passe" 
										name="password_confirmation" 
										type="password" 
										autocomplete="off" 
										class="form-control bg-transparent @error('password_confirmation') is-invalid @enderror" 
										required
									/>
									@error('password_confirmation')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Input group-->
								
								<!--begin::Input group - Rôle-->
								<div class="fv-row mb-8">
								<select name="role" class="form-select  bg-transparent @error('role') is-invalid @enderror" autocomplete="off" data-control="select2" data-hide-search="true" data-placeholder="role" required>
									<option value="">Choisissez un rôle</option>
									<option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
									<option value="utilisateur" {{ old('role') == 'utilisateur' ? 'selected' : '' }}>Utilisateur</option>
								</select>
								@error('role')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
								<!--end::Input group-->
								
								<!--begin::Accept terms-->
								<div class="fv-row mb-8">
									<label class="form-check form-check-inline">
										<input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" value="1" {{ old('terms') ? 'checked' : '' }} required />
										<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">
											J'accepte les 
											<a href="#" class="ms-1 link-primary">conditions d'utilisation</a>
										</span>
									</label>
									@error('terms')
										<div class="text-danger fs-7">{{ $message }}</div>
									@enderror
								</div>
								<!--end::Accept terms-->
								
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Créer l'utilisateur</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">
											Veuillez patienter... 
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
										</span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								
								<!--begin::Back button-->
								<div class="d-flex justify-content-center mb-5">
									<a href="{{ route('utilisateur.index') }}" class="btn btn-light">
										<i class="ki-outline ki-arrow-left fs-2 me-2"></i>
										Retour à la liste des utilisateurs
									</a>
								</div>
 								<!--end::Back button-->
								
								<!--begin::Login link-->
								<div class="text-center">
									<span class="text-gray-500 fw-semibold fs-6">
										Déjà un compte ? 
										<a href="{{ route('login') }}" class="link-primary fw-semibold">Se connecter</a>
									</span>
								</div>
								<!--end::Login link-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Root-->
		
		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('assets/') }}";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('assets/js/custom/authentication/sign-up/general.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>