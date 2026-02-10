<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GS2E Dashboard') }}</title>
    
    <!-- Fonts - Google Fonts pour un design moderne -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles Bundle -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
    
    <style>
        /* ===================================================================
           VARIABLES CSS POUR LE THEME MODERNE
           =================================================================== */
        :root {
            /* Palette de couleurs professionnelle */
            --primary-color: #1a73e8;
            --primary-dark: #1557b0;
            --primary-light: #e8f0fe;
            --accent-orange: #ff9900;
            --accent-orange-dark: #e68a00;
            
            /* Couleurs neutres modernes */
            --bg-main: #f8f9fa;
            --bg-card: #ffffff;
            --text-primary: #202124;
            --text-secondary: #5f6368;
            --text-muted: #80868b;
            --border-color: #e8eaed;
            
            /* Ombres élégantes */
            --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            
            /* Typographie moderne */
            --font-primary: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
            
            /* Espacements */
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        /* ===================================================================
           RESET ET STYLES DE BASE
           =================================================================== */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary);
            background: var(--bg-main);
            color: var(--text-primary);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ===================================================================
           SIDEBAR MODERNE
           =================================================================== */
        #kt_app_sidebar {
            width: var(--sidebar-width) !important;
            background: var(--bg-card);
            border-right: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Logo section avec dégradé subtil */
        #kt_app_sidebar_logo {
            background: linear-gradient(135deg, var(--primary-light) 0%, #fff 100%);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem !important;
        }

        /* Boutons de navigation modernisés */
        #kt_app_sidebar .btn {
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 1rem;
            margin-bottom: 0.75rem;
        }

        #kt_app_sidebar .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            background: var(--primary-light) !important;
            border-color: var(--primary-color) !important;
        }

        #kt_app_sidebar .btn i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        /* Bouton déconnexion orange personnalisé */
        .btn-orange-primary {
            background: linear-gradient(135deg, var(--accent-orange) 0%, var(--accent-orange-dark) 100%) !important;
            border: none !important;
            color: #fff !important;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .btn-orange-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* ===================================================================
           CARTES DE PROJETS MODERNISÉES
           =================================================================== */
        .card.border-hover-primary {
            border-radius: 16px;
            border: 1px solid var(--border-color);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--bg-card);
            height: auto;
            min-height: 280px;
            overflow: visible;
            position: relative;
        }

        .card.border-hover-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 16px;
            padding: 2px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-orange));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card.border-hover-primary:hover::before {
            opacity: 1;
        }

        .card.border-hover-primary:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: transparent;
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Badges de statut avec styles modernes */
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .badge-light-warning {
            background: #fff3e0;
            color: #f57c00;
        }

        .badge-light-success {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-light-danger {
            background: #ffebee;
            color: #c62828;
        }

        /* ===================================================================
           DASHBOARD STATS CARDS
           =================================================================== */
        .stats-card {
            border-radius: 16px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            height: 100%;
        }

        .stats-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .stats-number {
            font-family: var(--font-display);
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===================================================================
           CHART CANVAS FIX
           =================================================================== */
        #kt_project_list_chart {
            max-width: 150px;
            max-height: 150px;
        }

        .chart-container {
            position: relative;
            width: 150px;
            height: 150px;
        }

        /* ===================================================================
           RESPONSIVE DESIGN MOBILE
           =================================================================== */
        @media (max-width: 991px) {
            #kt_app_sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                height: 100vh;
                z-index: 1000;
            }

            #kt_app_sidebar.drawer-on {
                left: 0;
            }

            #kt_app_wrapper {
                margin-left: 0 !important;
            }

            #kt_app_content_container {
                left: 0 !important;
                padding: 1rem;
            }

            .card.border-hover-primary {
                height: auto;
                min-height: 250px;
            }

            .stats-number {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .col-lg-6.col-xxl-4 {
                margin-bottom: 1.5rem;
            }

            .card-body {
                padding: 1rem;
            }

            .stats-number {
                font-size: 1.75rem;
            }
        }

        /* ===================================================================
           HEADER MODERNE
           =================================================================== */
        .page-heading {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        /* ===================================================================
           BOUTONS D'ACTION
           =================================================================== */
        .btn-icon {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-icon:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-md);
        }

        .btn-delete:hover {
            background: #ffebee !important;
            color: #c62828 !important;
        }

        /* ===================================================================
           ANIMATIONS
           =================================================================== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card.border-hover-primary {
            animation: fadeInUp 0.5s ease-out;
        }

        .stats-card {
            animation: fadeInUp 0.5s ease-out;
        }

        /* Stagger animation pour les cartes */
        .col-md-6:nth-child(1) .card,
        .col-lg-6:nth-child(1) .stats-card {
            animation-delay: 0.1s;
        }

        .col-md-6:nth-child(2) .card,
        .col-lg-6:nth-child(2) .stats-card {
            animation-delay: 0.2s;
        }

        .col-md-6:nth-child(3) .card,
        .col-lg-6:nth-child(3) .stats-card {
            animation-delay: 0.3s;
        }

        /* ===================================================================
           TYPOGRAPHIE AMÉLIORÉE
           =================================================================== */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 600;
        }

        .fs-2hx {
            font-family: var(--font-display);
        }

        /* ===================================================================
           AVATAR UTILISATEUR
           =================================================================== */
        .symbol-circle {
            border: 2px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .symbol-circle:hover {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--primary-light);
        }
    </style>
</head>

<body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">

    <!-- Theme mode setup -->
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

    <!-- App Root -->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            
            <!-- Header -->
            <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate-="true" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                    
                    @if(Auth::user()->role === 'utilisateur')
                    <div id="kt_app_content_container" class="app-container container-xxl">
                        <!-- Toolbar -->
                        <div class="page-title d-flex flex-column justify-content-center me-3">
                            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                                Mon Tableau de bord
                            </h1>
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <li class="breadcrumb-item text-muted">Mes projets ajoutés</li>
                            </ul>
                        </div>

                        <!-- Grille de projets -->
                        <div class="row g-6 g-xl-9 mt-5">
                            @foreach($projets as $projet)
                            <div class="col-md-6 col-xl-4" id="projet-{{ $projet->id }}">
                                <div class="card project-card border-hover-primary"
                                     data-url="{{ route('utilisateur.projets.show', ['projet' => $projet->id, 'from' => 'dashboard']) }}"
                                     style="cursor: pointer;">
                                    
                                    <!-- Header -->
                                    <div class="card-header border-0 pt-9">
                                        <div class="card-title m-0">
                                            <div class="symbol symbol-50px w-50px bg-light">
                                                @php
                                                    $logo = ($projet->logo && file_exists(public_path($projet->logo))) 
                                                        ? asset($projet->logo) 
                                                        : asset('assets/media/svg/brand-logos/volicity-9.svg');
                                                @endphp
                                                <img src="{{ $logo }}" alt="logo" class="p-3" />
                                            </div>
                                        </div>
                                        <div class="card-toolbar">
                                            <span class="badge badge-light-{{ 
                                                $projet->statut === 'en_production' ? 'danger' : 
                                                ($projet->statut === 'en_developpement' ? 'warning' : 'success') 
                                            }} fw-bold me-auto px-4 py-3">
                                                {{ ucfirst(str_replace('_', ' ', $projet->statut)) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Body -->
                                    <div class="card-body p-9">
                                        <div class="fs-3 fw-bold text-gray-900">{{ $projet->nom }}</div>
                                        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                                            {{ Str::limit($projet->description, 100) }}
                                        </p>

                                        <!-- Actions -->
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('utilisateur.projets.destroy', $projet->id) }}"
                                                  method="POST"
                                                  class="delete-form"
                                                  data-id="{{ $projet->id }}"
                                                  data-nom="{{ $projet->nom }}"
                                                  data-url="{{ route('index') }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                        class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm btn-delete"
                                                        data-bs-toggle="tooltip"
                                                        title="Supprimer">
                                                    <i class="ki-outline ki-trash fs-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            <!-- Wrapper -->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                
                <!-- Sidebar -->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="280px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">
                    
                    <!-- Logo -->
                    <div class="d-flex flex-stack px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">
                        <a href="{{ route('index') }}">
                            <img alt="Logo" src="assets/media/logos/logo-gs2e.svg" class="h-20px h-lg-25px" />
                        </a>
                        
                        <!-- User Avatar -->
                        <div class="ms-3">
                            <a href="{{ route('utilisateur.monProfil') }}" class="cursor-pointer position-relative symbol symbol-circle symbol-40px">
                                @php
                                    $avatarPath = (Auth::user()->avatar && file_exists(public_path('avatars/' . Auth::user()->avatar)))
                                        ? 'avatars/' . Auth::user()->avatar
                                        : 'assets/media/avatars/blank.jpg';
                                @endphp
                                <img src="{{ asset($avatarPath) }}" alt="{{ Auth::user()->nom }}" class="w-100" />
                                <div class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3"></div>
                            </a>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">
                        <div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column pe-4 me-n4">
                            
                            <div class="d-flex flex-column gap-3 mt-5">
                                @if(Auth::user()->role === 'admin')
                                    <!-- Admin Links -->
                                    <a href="{{ route('projet.index2') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center h-auto border-gray-200">
                                        <span class="mb-2"><i class="ki-outline ki-briefcase fs-1"></i></span>
                                        <span class="fs-7 fw-bold">Gestion des projets</span>
                                    </a>

                                    <a href="{{ route('utilisateur.index') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center h-auto border-gray-200">
                                        <span class="mb-2"><i class="ki-outline ki-user fs-1"></i></span>
                                        <span class="fs-7 fw-bold">Gestion des utilisateurs</span>
                                    </a>

                                    <a href="{{ route('environnements.index') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center h-auto border-gray-200">
                                        <span class="mb-2"><i class="ki-outline ki-abstract-28 fs-1"></i></span>
                                        <span class="fs-7 fw-bold">Gestion des Environnements</span>
                                    </a>

                                @elseif(Auth::user()->role === 'utilisateur')
                                    <!-- User Links -->
                                    <a href="{{ route('utilisateur.projets.index') }}" class="btn btn-icon btn-outline btn-bg-light btn-active-light-primary btn-flex flex-column flex-center h-auto border-gray-200">
                                        <span class="mb-2"><i class="ki-outline ki-plus fs-1"></i></span>
                                        <span class="fs-7 fw-bold">Ajouter un projet</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Footer / Logout -->
                    <div class="flex-column-auto d-flex justify-content-end px-4 px-lg-8 py-3 py-lg-8" id="kt_app_sidebar_footer">
                        <div class="menu-item px-3">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-orange-primary fw-semibold w-100">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            
                            @if(Auth::user()->role === 'admin')
                            <div class="app-container container-xxl">
                                <div class="row gx-6 gx-xl-9">
                                    
                                    <!-- Card Projets -->
                                    <div class="col-lg-6 col-xxl-4 mb-5">
                                        <div class="card stats-card h-100">
                                            <div class="card-body p-9">
                                                <div class="stats-number">{{ $totalProjets }}</div>
                                                <div class="fs-4 fw-semibold text-gray-500 mb-7">Total des Projets</div>

                                                <div class="d-flex flex-wrap">
                                                    <div class="chart-container me-9 mb-5">
                                                        <canvas id="kt_project_list_chart"></canvas>
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                                        <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                            <div class="bullet bg-warning me-3" style="width: 12px; height: 12px; border-radius: 50%;"></div>
                                                            <div class="text-gray-500">Développement</div>
                                                            <div class="ms-auto fw-bold text-gray-700">{{ $statsProjets['developpement'] }}</div>
                                                        </div>
                                                        <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                                            <div class="bullet bg-success me-3" style="width: 12px; height: 12px; border-radius: 50%;"></div>
                                                            <div class="text-gray-500">Recette</div>
                                                            <div class="ms-auto fw-bold text-gray-700">{{ $statsProjets['recette'] }}</div>
                                                        </div>
                                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                                            <div class="bullet bg-danger me-3" style="width: 12px; height: 12px; border-radius: 50%;"></div>
                                                            <div class="text-gray-500">Production</div>
                                                            <div class="ms-auto fw-bold text-gray-700">{{ $statsProjets['production'] }}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Derniers projets -->
                                                <div class="mt-6">
                                                    <div class="fw-bold text-gray-600 mb-3">Derniers Projets</div>
                                                    @forelse($derniersProjets as $projet)
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="symbol symbol-40px me-4">
                                                            <img src="{{ $projet->logo && file_exists(public_path($projet->logo)) ? asset($projet->logo) : asset('assets/media/svg/brand-logos/volicity-9.svg') }}" class="rounded">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="fw-semibold text-gray-800 fs-6">{{ $projet->nom }}</div>
                                                            <div class="text-muted fs-7">{{ ucfirst(str_replace('_', ' ', $projet->statut)) }}</div>
                                                        </div>
                                                        <span class="badge 
                                                            @if($projet->statut == 'en_developpement') badge-light-warning
                                                            @elseif($projet->statut == 'en_recette') badge-light-success
                                                            @elseif($projet->statut == 'en_production') badge-light-danger
                                                            @else badge-light-secondary
                                                            @endif fs-8 px-3 py-2">
                                                            {{ ucfirst(str_replace('_', ' ', $projet->statut)) }}
                                                        </span>
                                                    </div>
                                                    @empty
                                                    <div class="text-muted fs-7">Aucun projet pour le moment</div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Accès -->
                                    <div class="col-lg-6 col-xxl-4 mb-5">
                                        <div class="card stats-card h-100">
                                            <div class="card-body p-9">
                                                <div class="stats-number">{{ $totalAcces }}</div>
                                                <div class="fs-4 fw-semibold text-gray-500 mb-7">Total des Accès</div>

                                                @foreach($accesParType as $type => $nombre)
                                                <div class="fs-6 d-flex justify-content-between mb-4">
                                                    <div class="fw-semibold">{{ ucfirst($type) }}</div>
                                                    <div class="d-flex fw-bold text-gray-700">{{ $nombre }}</div>
                                                </div>
                                                <div class="separator separator-dashed"></div>
                                                @endforeach

                                                <div class="mt-5">
                                                    <div class="fw-bold text-gray-600 mb-3">Derniers Accès</div>
                                                    @forelse($derniersAcces as $acces)
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div>
                                                            <div class="fw-semibold text-gray-800">{{ ucfirst($acces->type) }}</div>
                                                            @if($acces->type === 'lien')
                                                            <a href="{{ $acces->url }}" target="_blank" class="text-primary fs-7">
                                                                {{ \Illuminate\Support\Str::limit($acces->url, 80) }}
                                                            </a>
                                                            @elseif($acces->type === 'identifiants')
                                                            <div class="text-muted fs-7">Email : {{ $acces->email ?? 'N/A' }}</div>
                                                            @endif
                                                        </div>
                                                        <span class="badge badge-light-primary fs-8">
                                                            {{ $acces->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                    @empty
                                                    <div class="text-muted">Aucun accès</div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Utilisateurs -->
                                    <div class="col-lg-6 col-xxl-4 mb-5">
                                        <div class="card stats-card h-100">
                                            <div class="card-body p-9">
                                                <div class="stats-number">{{ $totalUtilisateurs }}</div>
                                                <div class="fs-4 fw-semibold text-gray-500 mb-7">Total des Utilisateurs</div>

                                                <div class="symbol-group symbol-hover mb-7">
                                                    @foreach($utilisateurs as $u)
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $u->prenom }} {{ $u->nom }}">
                                                        @if($u->avatar && file_exists(public_path('avatars/'.$u->avatar)))
                                                        <img alt="Pic" src="{{ asset('avatars/'.$u->avatar) }}" />
                                                        @else
                                                        @php
                                                            $initial = strtoupper(substr($u->prenom ?? $u->nom ?? 'U', 0, 1));
                                                            $couleurs = ['primary', 'success', 'info', 'warning', 'danger', 'dark'];
                                                            $bg = $couleurs[array_rand($couleurs)];
                                                        @endphp
                                                        <span class="symbol-label bg-{{ $bg }} text-inverse-{{ $bg }} fw-bold">{{ $initial }}</span>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>

                                                <div class="mt-5">
                                                    <div class="fw-bold text-gray-600 mb-3">Derniers utilisateurs</div>
                                                    @forelse($derniersUtilisateurs as $u)
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                                @if($u->avatar && file_exists(public_path('avatars/'.$u->avatar)))
                                                                <img alt="Pic" src="{{ asset('avatars/'.$u->avatar) }}" />
                                                                @else
                                                                @php
                                                                    $initial = strtoupper(substr($u->prenom ?? $u->nom ?? 'U', 0, 1));
                                                                    $couleurs = ['primary', 'success', 'info', 'warning', 'danger', 'dark'];
                                                                    $bg = $couleurs[array_rand($couleurs)];
                                                                @endphp
                                                                <span class="symbol-label bg-{{ $bg }} text-inverse-{{ $bg }} fw-bold">{{ $initial }}</span>
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <div class="fw-semibold text-gray-800">{{ $u->prenom }} {{ $u->nom }}</div>
                                                                <div class="text-muted fs-7">{{ $u->email }}</div>
                                                            </div>
                                                        </div>
                                                        <span class="badge badge-light-primary fs-8">{{ $u->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    @empty
                                                    <div class="text-muted">Aucun utilisateur récent</div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Environnements -->
                                    <div class="col-lg-6 col-xxl-4 mb-5">
                                        <div class="card stats-card h-100">
                                            <div class="card-body p-9">
                                                <div class="stats-number">{{ $totalEnvironnements }}</div>
                                                <div class="fs-4 fw-semibold text-gray-500 mb-7">Total des Environnements</div>

                                                <div class="mt-5">
                                                    <div class="fw-bold text-gray-600 mb-3">Derniers Environnements</div>
                                                    @forelse($derniersEnvironnements as $environnement)
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <span class="badge badge-light-{{ $environnement->couleur ?? 'secondary' }}">
                                                            {{ $environnement->libelle ?? 'Non défini' }}
                                                        </span>
                                                        <span class="badge badge-light-primary fs-8">
                                                            {{ $environnement->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                    @empty
                                                    <div class="text-muted">Aucun environnement</div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    
    <!-- Chart.js - IMPORTANT: Charger depuis CDN pour garantir qu'il fonctionne en production -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    @if(Auth::user()->role === 'admin')
    <script>
        // Initialisation du Chart après chargement complet du DOM et de Chart.js
        document.addEventListener('DOMContentLoaded', function () {
            // Vérifier que Chart.js est chargé
            if (typeof Chart === 'undefined') {
                console.error('Chart.js non chargé');
                return;
            }

            const canvas = document.getElementById('kt_project_list_chart');
            if (!canvas) {
                console.error('Canvas non trouvé');
                return;
            }

            const ctx = canvas.getContext('2d');

            const data = {
                labels: ['Développement', 'Recette', 'Production'],
                datasets: [{
                    data: [
                        {{ $statsProjets['developpement'] ?? 0 }},
                        {{ $statsProjets['recette'] ?? 0 }},
                        {{ $statsProjets['production'] ?? 0 }}
                    ],
                    backgroundColor: ['#FFC107', '#28A745', '#DC3545'],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            };

            new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            borderRadius: 8,
                            titleFont: {
                                size: 14,
                                weight: 'bold'
                            },
                            bodyFont: {
                                size: 13
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true,
                        duration: 1000,
                        easing: 'easeInOutQuart'
                    }
                }
            });
        });
    </script>
    @endif

    @if(Auth::user()->role === 'utilisateur')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Gestion de la suppression de projet
        $(document).on('click', '.btn-delete', function (e) {
            e.stopPropagation();
            e.preventDefault();

            let form = $(this).closest('form');
            let id = form.data('id');
            let nom = form.data('nom');
            let url = form.attr('action');

            Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer ' + nom + ' ?',
                text: "Cette action est irréversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: form.serialize(),
                        success: function () {
                            Swal.fire(
                                'Supprimé !',
                                nom + ' a bien été supprimé.',
                                'success'
                            ).then(() => {
                                window.location.href = form.data('url');
                            });
                        },
                        error: function () {
                            Swal.fire(
                                'Erreur',
                                'Impossible de supprimer ' + nom,
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // Redirection au clic sur la carte
        document.addEventListener('DOMContentLoaded', function () {
            const projectCards = document.querySelectorAll('.project-card');
            
            projectCards.forEach(card => {
                card.addEventListener('click', function (event) {
                    if (event.target.closest('button')) return;
                    
                    const url = this.getAttribute('data-url');
                    if (url) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
    @endif

</body>
</html>