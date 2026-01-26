@extends('layouts.app')     
@section('content')       
<style>
	#kt_app_root {
				position: relative;
                 left: -50px; 
				width: 100% !important;
			}

			
    
</style>       
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
                                                <img id="logoPreview"
                                                        class="mw-50px mw-lg-75px"
                                                        src="{{ $projet->logo && file_exists(public_path($projet->logo)) ? asset($projet->logo) : asset('assets/media/svg/brand-logos/volicity-9.svg') }}"
                                                        alt="logo du projet" />
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
                                                             <div class="col-8">{{ $projet->nom }}</div>
                                                             <span class="badge badge-light-{{ 
                                                                $projet->statut === 'en_production' ? 'danger' : 
                                                                ($projet->statut === 'en_developpement' ? 'warning' : 'success') 
                                                            }} fw-bold me-auto px-4 py-3">{{ ucfirst(str_replace('_', ' ', $projet->statut)) }}</span>
                                                         </div>
                                                         <!--end::Status-->
                                                         <!--begin::Description-->
                                                         <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">{{ $projet->description }}</div>
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
                                                                 <div class="fs-4 fw-bold">{{ $projet->created_at ? $projet->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                                                             </div>
                                                             <!--end::Number-->
                                                             <!--begin::Label-->
                                                             <div class="fw-semibold fs-6 text-gray-500">Créé le</div>
                                                             <!--end::Label-->
                                                         </div>

                                                         <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                             <!--begin::Number-->
                                                             <div class="d-flex align-items-center">
                                                                 <div class="fs-4 fw-bold">{{$projet->creator ? $projet->creator-> nom : 'Inconnu' }}</div>
                                                             </div>
                                                             <!--end::Number-->
                                                             <!--begin::Label-->
                                                             <div class="fw-semibold fs-6 text-gray-500">Créé par</div>
                                                             <!--end::Label-->
                                                         </div>
                                                         <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                             <!--begin::Number-->
                                                             <div class="d-flex align-items-center">
                                                                 <div class="fs-4 fw-bold">{{ $projet->updater ? $projet->updater-> nom: '-' }}</div>
                                                             </div>
                                                             <!--end::Number-->
                                                             <!--begin::Label-->
                                                             <div class="fw-semibold fs-6 text-gray-500">Modifier par</div>
                                                             <!--end::Label-->
                                                         </div>
                                                            <div class="d-flex mb-4">

                                                                @php
                                                                    $from = request()->query('from', 'all'); // valeur par défaut 'all'
                                                                @endphp

                                                                <a href="{{ $from === 'dashboard' ? route('index') : route('utilisateur.projets.index') }}"
                                                                class="btn btn-light btn-active-light-primary me-3">
                                                                <i class="ki-outline ki-arrow-left fs-4"></i>
                                                                     Retour 
                                                                </a>


                                                               
                                                                 
                                                                 
                                                            </div>
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
                                                 <a class="nav-link text-active-primary py-5 me-6 active" href="{{ route('projet.acces.index', $projet->id) }}">Acces</a>
                                             </li>
                                             <!--begin::Nav item-->
                                             <li class="nav-item">
                                                 <a class="nav-link text-active-primary py-5 me-6" href="{{ route('projet.document.index3', $projet->id) }}">Documents</a>
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
                         <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                 
                                <div class="card">
                                    <div class="card-header border-0 pt-5">
                                        <!--begin::Card title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-800">Liste des accès</span>
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Gestion des accès du projet</span>
                                        </h3>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                        
                                        <div class="card-toolbar">
                        
                                            
                        
                                           @if(Auth::user()->role==='admin') <!--begin::Toolbar-->
                                             <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                <!--begin::Add user-->
                                                 
                                                <button type="button" class="btn btn-orange-primary mb-4" data-bs-toggle="modal" data-bs-target="#createAccesModal">
                                                    + Créer un accès
                                                </button>
                                             </div>
                                           @endif <!--end::Toolbar-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    
                                    <!--begin::Search bar-->
                                    <div class="card-header border-0 pt-0 pb-5">
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <i class="ki-outline ki-magnifier fs-1 position-absolute ms-6"></i>
                                            <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-14" placeholder="Rechercher un acces..." />
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
                                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_acces">
                                                <thead>
                                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="min-w-150px">Type</th>
                                                        <th class="min-w-120px text-center">Url</th>
                                                        <th class="w-100px"></th>
                                                        <th class="min-w-120px">Environnement</th>
                                                        <th class="min-w-150px text-center">Email</th>
                                                        <th class="w-100px"></th>
                                                        <th class="min-w-200px text-center">Mot de passe</th>
                                                        <th class="w-100px"></th>
                                                        <th class="min-w-150px">Crée le</th>
                                                        @if(Auth::user()->role==="admin")
                                                        <th class="min-w-150px">Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody class="text-gray-600 fw-semibold">
                                                    @forelse($acces as $acces)
                                                        <tr>
                                                            <td class="d-flex align-items-center">
                                                                <!--begin::User details-->
                                                                <div class="d-flex flex-column">
                                                                    <span class="text-gray-800 text-hover-primary mb-1 fw-bold">{{ $acces->type }}</span>
                                                                </div>
                                                                <!--end::User details-->
                                                            </td>
                                                            <td data-bs-target="license" class="ps-0 url-cell">{{ $acces->url }}</td>
                                                            <td>
                                                                @if(!empty($acces->url))
                                                                    <button data-action="copy" data-copy-target="url"
                                                                        class="btn btn-active-color-primary btn-color-gray-500 btn-icon btn-sm btn-outline-light"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Copier">
                                                                        <i class="ki-outline ki-copy fs-2"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-light-{{ $acces->environnement->couleur ?? 'secondary' }}">
                                                                    {{ $acces->environnement->libelle ?? 'Non défini' }}
                                                                </span>
                                                            </td>
                                                            
                                                            
                                                            <td class="email-cell">{{ $acces->email }}</td>
                                                            <td>
                                                                @if(!empty($acces->email))
                                                                    <button data-action="copy" data-copy-target="email"
                                                                        class="btn btn-active-color-primary btn-color-gray-500 btn-icon btn-sm btn-outline-light"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Copier">
                                                                        <i class="ki-outline ki-copy fs-2"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                            <td class="password-cell text-center" >{{ $acces->mot_de_passe }}</td>
                                                            <td>
                                                                @if(!empty($acces->mot_de_passe))
                                                                    <button data-action="copy" data-copy-target="password"
                                                                        class="btn btn-active-color-primary btn-color-gray-500 btn-icon btn-sm btn-outline-light"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Copier">
                                                                        <i class="ki-outline ki-copy fs-2"></i>
                                                                    </button>
                                                                @endif
                                                            </td>
                        
                                                            <td>{{ $acces->created_at->format('d/m/Y H:i') }}</td>
                                                            <td class="text-center">
                                                                <!--begin::Action buttons-->
                                                                @if(Auth::user()->role==="admin")
                                                                <form action="{{ route('projet.acces.destroy', ['projet' => $projet->id, 'acces' => $acces->id]) }}" data-url="{{ route('projet.acces.index',$projet->id) }}" 
                                                                    method="POST" 
                                                                    class="delete-form" 
                                                                    data-id="{{ $acces->id }}" 
                                                                    data-nom="{{ $acces->nom ?? 'cet accès' }}" 
                                                                    style="display: inline;">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="button" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" data-bs-toggle="tooltip" title="Supprimer">
                                                                      <i class="ki-outline ki-trash fs-2"></i>
                                                                  </button>
                                                              </form>
                                                              @endif
                                                                <!--end::Action buttons-->
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center text-muted py-4">
                                                                Aucun accès ajouté pour le moment
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
                        
                        
                                                  
                                    
                            </div>
                        </div>
                         
                     </div>
             </div>
     </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('kt_table_acces');
    const tableBody = table.querySelector('tbody');

    // Crée la ligne "Aucun accès"
    const noResultRow = document.createElement('tr');
    const td = document.createElement('td');
    td.setAttribute('colspan', table.querySelectorAll('thead th').length); // prend toute la largeur
    td.classList.add('text-center', 'text-muted');
    td.textContent = 'Aucun accès correspondant à votre recherche';
    noResultRow.appendChild(td);
    noResultRow.style.display = 'none'; // cachée par défaut
    tableBody.appendChild(noResultRow);

    searchInput.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        let visibleCount = 0;

        const tableRows = tableBody.querySelectorAll('tr:not(:last-child)'); // on ignore la ligne "noResultRow"
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(filter)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Affiche ou cache la ligne "Aucun accès"
        noResultRow.style.display = visibleCount === 0 ? '' : 'none';
    });
});


</script>
 @endsection('content')