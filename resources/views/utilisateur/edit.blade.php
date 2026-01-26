<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Modifier l'Utilisateur</title>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
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
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('utilisateur.update', $utilisateur) }}" class="form w-100" id="kt_sign_up_form">
                            @csrf
                            @method('PUT')
                            
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Modifier l'Utilisateur</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Modifiez les informations ci-dessous</div>
                            </div>

                            <!-- Nom -->
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Nom complet" name="nom" value="{{ old('nom', $utilisateur->nom) }}" autocomplete="off" class="form-control bg-transparent @error('nom') is-invalid @enderror" required />
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="fv-row mb-8">
                                <input type="email" placeholder="Email" name="email" value="{{ old('email', $utilisateur->email) }}" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Role -->
                            <div class="fv-row mb-8">
								<select name="role" class="form-select  bg-transparent @error('role') is-invalid @enderror" autocomplete="off" data-control="select2" data-hide-search="true" data-placeholder="role" required>
									<option value="">Choisissez un rôle</option>
									<option value="admin" {{ old('role', $utilisateur->role) == 'admin' ? 'selected' : '' }}>Administrateur</option>
									<option value="utilisateur" {{ old('role', $utilisateur->role) == 'utilisateur' ? 'selected' : '' }}>Utilisateur</option>
								</select>
								@error('role')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

                            <!-- Nouveau mot de passe (optionnel) -->
                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Nouveau mot de passe (laisser vide si inchangé)" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" />
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirmation du nouveau mot de passe -->
                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Confirmer le nouveau mot de passe" name="password_confirmation" autocomplete="off" class="form-control bg-transparent @error('password_confirmation') is-invalid @enderror" />
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Boutons -->
                            <div class="d-flex flex-wrap justify-content-center gap-4">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-warning">
                                    <span class="indicator-label">Mettre à jour</span>
                                    <span class="indicator-progress">Veuillez patienter...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                
                                <a href="{{ route('utilisateur.show', $utilisateur) }}" class="btn btn-light">
                                    <i class="ki-outline ki-arrow-left fs-2"></i>
                                    Retour aux détails
                                </a>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Body-->
            
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{ asset('assets/media/misc/auth-bg.png') }})">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <a href="/" class="d-flex flex-center mb-6">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-gs2e.svg') }}" class="h-60px h-lg-75px theme-light-show" />
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-gs2e-dark.svg') }}" class="h-60px h-lg-75px theme-dark-show" />
                    </a>
                    <!--end::Logo-->
                    
                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-275px w-lg-50 w-xl-500px mb-10 mb-lg-20" src="{{ asset('assets/media/misc/auth-screens.png') }}" alt="" />
                    <!--end::Image-->
                    
                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                        Modification Utilisateur
                    </h1>
                    <!--end::Title-->
                    
                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        Modifiez les informations de vos utilisateurs en toute simplicité.
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-up -->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>var hostUrl = "{{ asset('assets/') }}";</script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/authentication/sign-up/general.js') }}"></script>
    <!--end::Javascript-->
</body>
</html>

