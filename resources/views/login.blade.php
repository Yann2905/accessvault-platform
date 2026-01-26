<!DOCTYPE html>
<html lang="fr">
<head>

	<style>
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
    <meta charset="UTF-8" />
	<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Connexion Admin</title>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="app-blank">
	@if (session('alert'))
    <div id="custom-modal" style="
        position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
        background: rgba(0,0,0,0.35); display: flex; align-items: center; justify-content: center; z-index: 9999;">
        <div style="
            background: white; padding: 2rem 2.5rem; border-radius: 10px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.2); min-width: 320px; max-width: 90vw; position: relative;">
            <div style="font-size: 1.1rem; margin-bottom: 2rem; text-align:center;">
                {{ session('alert') }}
            </div>
            <div style="text-align: right;">
                <a href="/index" style="
                    padding: 0.5rem 1.5rem;
                    border: none; background: #4e73df; color: white;
                    border-radius: 5px; font-weight: bold; font-size: 1rem;
                    text-decoration: none; display: inline-block;">OK</a>
            </div>
        </div>
    </div>
    <style>body { overflow: hidden; }</style>
@endif


@if (session('error'))
<div class="alert alert-warning">
	{{session('error')}}
</div>
@endif



<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
					<!--begin::Logo-->
					<a href="index.html">
							<img alt="Logo" src="assets/media/logos/logo-gs2e.svg" class="h-100px h-lg-115px" />
						</a>
						<!--end::Logo-->
						<!--begin::Image-->
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
							 <form method="POST" action="{{ route('login.post') }}" class="form w-100" id="kt_sign_in_form">
                        @csrf

                        <div class="text-center mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3">Connexion</h1>
                        </div>

                        <!-- Email -->
                        <div class="fv-row mb-8">
                            <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" required />
                        </div>

                        <!-- Mot de passe -->
                        <div class="fv-row mb-3">
                            <input type="password" placeholder="Mot de passe" name="mot_de_passe" autocomplete="off" class="form-control bg-transparent" required /><br>
                        </div>

                        <!-- Bouton connexion -->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-orange-primary">
                                <span class="indicator-label">Connexion</span>
                                <span class="indicator-progress">Veuillez patienter...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>

                    </form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Form-->
					<!--begin::Footer-->
					<div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
						<!--begin::Languages-->
					
						<!--end::Languages-->
						<!--begin::Links-->
						
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(assets/media/misc/auth-bg.png)">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
						<!--begin::Logo-->
						
						<!--end::Logo-->
						<!--begin::Image-->
						<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="assets/media/misc/auth-screens.png" alt="" />
						<!--end::Image-->
						<!--begin::Title-->
						
						
					</div>
					<!--end::Content-->
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>







<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
</body>
</html>
