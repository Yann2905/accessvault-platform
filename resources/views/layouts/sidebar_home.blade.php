<style>
#kt_app_sidebar_nav_wrapper > :not(.keep-sidebar-home) { display: none !important; }


</style>

<div class="keep-sidebar-home ">

   
    <!--begin::Title-->

   

    <!--end::Title-->

    <!--begin::Row-->



    <div class="container mt-5">




        <div class="d-flex flex-column flex-wrap row-cols-3">

            @if(Auth::user()->role === 'admin')

                <div class="col mb-4">

                    <a href="{{ route('projet.index2') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-100px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">

                        <span class="mb-2">

                             <i class="ki-outline ki-briefcase fs-1"></i>

                        </span>

                        <span class="fs-7 fw-bold">Gestion des projets</span>

                    </a>

                </div>




                <div class="col mb-4">

                    <a href="{{ route('utilisateur.index') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-100px h-lg-90px w-70px h-70px border-gray-200" data-kt-button="true">

                        <span class="mb-2">

                            <i class="ki-outline ki-user fs-1"></i>

                         </span>

                        <span class="fs-7 fw-bold">Gestion des utilisateurs</span>

                    </a>

                </div>

                <div class="col mb-4">

                    <a href="{{ route('environnements.index') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center w-lg-100px h-lg-90px w-80px h-70px border-gray-200" data-kt-button="true">

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

   


