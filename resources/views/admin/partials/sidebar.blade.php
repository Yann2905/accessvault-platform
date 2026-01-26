<div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">
    <div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column hover-scroll-y pe-4 me-n4" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar, #kt_app_sidebar_nav" data-kt-scroll-offset="5px">

        <div class="mb-6">
            <h3 class="text-gray-800 fw-bold mb-8">Services</h3>
            <div class="row row-cols-3" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">

                @if(auth()->user()->role === 'admin')
                    <div class="col mb-4">
                        <a href="{{ route('dashboard.Projects') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
                            <span class="mb-2"><i class="ki-outline ki-briefcase fs-1"></i></span>
                            <span class="fs-7 fw-bold">Gestion Projects</span>
                        </a>
                    </div>
                    <div class="col mb-4">
                        <a href="{{ route('utilisateurs') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
                            <span class="mb-2"><i class="ki-outline ki-user fs-1"></i></span>
                            <span class="fs-7 fw-bold">Gestion Utilisateurs</span>
                        </a>
                    </div>
                @elseif(auth()->user()->role === 'utilisateur')
                    <div class="col mb-4">
                        <a href="{{ route('user.projects.create') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-90px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">
                            <span class="mb-2"><i class="ki-outline ki-briefcase fs-1"></i></span>
                            <span class="fs-7 fw-bold">Ajouter Projet</span>
                        </a>
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>
