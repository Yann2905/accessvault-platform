<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Modifier le Projet</title>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <!--end::Theme mode setup on page load-->

    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<i class="ki-outline ki-cross fs-1"></i>
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
						<!--begin:Form-->
                        <form method="POST" action="{{ route('projet.edit', $projet->id) }}" class="form"  id="kt_modal_new_target_form" >
                            @csrf
                            @method('PUT')
						
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<!--begin::Title-->
								<h1 class="mb-3">Modifier le Projet</h1>
								<!--end::Title-->
								<div class="text-muted fw-semibold fs-5">Modifiez les informations ci-dessous</div>
								<!--end::Description-->
							</div>
							<!--end::Heading-->
							<!--begin::Input group-->
							<div class="d-flex flex-column mb-8 fv-row">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-semibold mb-2">
									<span class="required">Nom du projet</span>
									<span class="ms-1" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
										<i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
									</span>
								</label>
								<!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Entrer le nom du projet" name="nom" value="{{ old('nom', $projet->nom) }}" autocomplete="off" class="form-control bg-transparent @error('nom') is-invalid @enderror" required />
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row g-9 mb-8">
								<!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">statut</label>
									<select name="statut" class="form-select  bg-transparent @error('statut') is-invalid @enderror" autocomplete="off" data-control="select2" data-hide-search="true" data-placeholder="status" required>
									<option value="">Choisissez un statut</option>
									<option value="en_production" {{ old('statut',$projet->statut) == 'en_production' ? 'selected' : '' }}>en_production</option>
									<option value="en_recette" {{ old('statut',$projet->statut) == 'en_recette' ? 'selected' : '' }}>en_recette</option>
                                    <option value="en_developpement" {{ old('statut',$projet->statut) == 'en_developpement' ? 'selected' : '' }}>en_developpement</option>
								</select>
								@error('statut')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="d-flex flex-column mb-8">
								<label class="fs-6 fw-semibold mb-2">Description</label>
								<textarea class="form-control form-control-solid" rows="3" name="description" placeholder="Description(laisser vide si inchangé)"></textarea>
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<a href="{{ route('projet.show', $projet) }}" class="btn btn-light">
                                    <i class="ki-outline ki-arrow-left fs-2"></i>
                                    Retour aux détails
                                </a>
								<button type="submit" id="kt_modal_new_target_form"  class="btn btn-primary">
									<span class="indicator-label">Mise a jour</span>
									<span class="indicator-progress">Patientez S'il vous plait... 
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		
    
    <!--begin::Root-->
    
    <!--end::Root-->
     
    <!--begin::Javascript-->
    <script>var hostUrl = "{{ asset('assets/') }}";</script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/authentication/sign-up/general.js') }}"></script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('assets/js/custom/apps/projects/project/project.js') }}"></script>
		<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
    <!--end::Javascript-->
</body>
</html>

