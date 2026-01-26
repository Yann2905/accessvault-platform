@extends('layouts.app')     

@section('content') 


<style>

.card.border-hover-primary {
    height: 250px; /* hauteur souhaitée */
    overflow: hidden; /* coupe le contenu qui dépasse */
}

    
            #kt_app_main {
                    position: relative;
                     left: -75px; 
                     
                }
    </style>
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        
        <!--begin::Toolbar-->
        <div class="d-flex flex-wrap flex-stack my-5">
            <!--begin::Heading-->
            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Liste des projets
                <span class="fs-6 text-gray-500 ms-1">actif</span>
            </h1>

            <div class="d-flex flex-wrap my-1">
                <div class="m-0">
                    <select id="statutSelect" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body fw-bold w-125px">
                        <option value="Active" selected>Active</option>
                        <option value="en_developpement">En développement</option>
                        <option value="en_recette">En recette</option>
                        <option value="en_production">En production</option>
                    </select>
                </div>
            </div>
            
            <!--end::Heading-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Row-->
        <div class="row g-6 g-xl-9">
            @foreach($projets as $projet)
                <div class="col-md-6 col-xl-4 project-wrapper">
                    <div class="card project-card border-hover-primary" data-statut="{{ $projet->statut }}" data-url="{{ route('utilisateur.projets.show', ['projet' => $projet->id, 'from' => 'all']) }}", style="cursor: pointer;">
                        <div class="card-header border-0 pt-9">
                            <div class="card-title m-0">
                                <div class="symbol symbol-50px w-50px bg-light">
                                    @php
                                        $logo = ($projet->logo && file_exists(public_path($projet->logo))) 
                                            ? asset($projet->logo) 
                                            : asset('assets/media/svg/brand-logos/volicity-9.svg');
                                    @endphp
                                    <img src="{{ $logo }}" alt="logo du projet" class="p-3" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <span class="badge badge-light-{{ 
                                    $projet->statut === 'en production' ? 'danger' : 
                                    ($projet->statut === 'en developpement' ? 'warning' : 'success') 
                                }} fw-bold me-auto px-4 py-3">
                                    {{ ucfirst($projet->statut) }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-9">
                            <div class="fs-3 fw-bold text-gray-900">{{ $projet->nom }}</div>
                            <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                                {{ $projet->description }}
                            </p>
                            <form action="{{ route('utilisateur.projets.store', $projet->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-orange-primary" onclick="event.stopPropagation();">
                                    Ajouter
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!--end::Row-->

    </div>
    <!--end::Content container-->
</div>


   <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Script filtrage -->
<script>
$(document).ready(function() {
    // Initialise Select2
    $('#statutSelect').select2({
        minimumResultsForSearch: Infinity
    });

    // Filtrage des cartes
    $('#statutSelect').on('change', function() {
        const value = $(this).val();

        $('.project-wrapper').each(function() {
            const statut = $(this).find('.project-card').data('statut');
            if (value === 'Active') {
                $(this).show();
            } else {
                $(this).toggle(statut === value);
            }
        });
    });
});



   



document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.project-card').forEach(function(card) {
            card.addEventListener('click', function() {
                const url = card.getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });



    </script>
    
@endsection
