<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="../../../" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>GS2E - Dashboard</title>
    
    <!-- Google Fonts - Typographie moderne -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ secure_asset('assets/media/logos/favicon.ico') }}" />
    
    <!-- Vendor Stylesheets -->
    <link href="{{ secure_asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('assets/css/style.bundle.css') }}" rel="stylesheet" />
    
    <style>
        /* ===================================================================
           VARIABLES CSS MODERNES
           =================================================================== */
        :root {
            /* Couleurs principales */
            --primary-color: #1a73e8;
            --primary-dark: #1557b0;
            --primary-light: #e8f0fe;
            --accent-orange: #ff9900;
            --accent-orange-dark: #e68a00;
            
            /* Couleurs neutres */
            --bg-main: #f8f9fa;
            --bg-card: #ffffff;
            --bg-sidebar: #ffffff;
            --text-primary: #202124;
            --text-secondary: #5f6368;
            --text-muted: #80868b;
            --border-color: #e8eaed;
            
            /* Ombres modernes */
            --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            
            /* Typographie */
            --font-primary: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
            
            /* Espacements */
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        /* ===================================================================
           STYLES DE BASE
           =================================================================== */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary) !important;
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
            background: var(--bg-sidebar);
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

        #kt_app_sidebar_logo img {
            max-height: 32px;
            transition: transform 0.3s ease;
        }

        #kt_app_sidebar_logo img:hover {
            transform: scale(1.05);
        }

        /* Navigation wrapper */
        #kt_app_sidebar_nav_wrapper {
            max-height: calc(100vh - 220px);
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        /* Scrollbar moderne */
        #kt_app_sidebar_nav_wrapper::-webkit-scrollbar {
            width: 6px;
        }

        #kt_app_sidebar_nav_wrapper::-webkit-scrollbar-track {
            background: transparent;
        }

        #kt_app_sidebar_nav_wrapper::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 10px;
        }

        #kt_app_sidebar_nav_wrapper::-webkit-scrollbar-thumb:hover {
            background: var(--text-muted);
        }

        /* Avatar utilisateur */
        .symbol-circle {
            border: 2px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .symbol-circle:hover {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--primary-light);
            transform: scale(1.05);
        }

        /* Indicateur en ligne */
        .bg-success {
            background-color: #10b981 !important;
        }

        /* ===================================================================
           BOUTON DÉCONNEXION ORANGE MODERNE
           =================================================================== */
        .btn-orange-primary {
            background: linear-gradient(135deg, var(--accent-orange) 0%, var(--accent-orange-dark) 100%) !important;
            border: none !important;
            color: #fff !important;
            font-weight: 600 !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 12px !important;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-orange-primary:hover,
        .btn-orange-primary:focus,
        .btn-orange-primary:active {
            background: linear-gradient(135deg, var(--accent-orange-dark) 0%, #cc7a00 100%) !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: #fff !important;
        }

        /* ===================================================================
           HEADER MODERNE
           =================================================================== */
        #kt_app_header {
            background: var(--bg-card);
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            height: var(--header-height);
        }

        .app-header-wrapper {
            padding: 1rem 0;
        }

        /* Boutons header */
        .btn-icon {
            border-radius: 10px !important;
            transition: all 0.3s ease;
        }

        .btn-icon:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-md);
        }

        /* ===================================================================
           CONTENT AREA
           =================================================================== */
        .app-main {
            background: var(--bg-main);
            min-height: calc(100vh - var(--header-height));
        }

        /* ===================================================================
           FOOTER SIDEBAR
           =================================================================== */
        #kt_app_sidebar_footer {
            border-top: 1px solid var(--border-color);
            padding: 1.5rem !important;
            background: var(--bg-sidebar);
        }

        /* ===================================================================
           DRAWERS (Chat, Activities, etc.)
           =================================================================== */
        .card {
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-color);
        }

        /* ===================================================================
           RESPONSIVE DESIGN
           =================================================================== */
        @media (max-width: 991px) {
            /* Sidebar mobile */
            #kt_app_sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                height: 100vh;
                z-index: 1000;
            }

            #kt_app_sidebar.drawer-on {
                left: 0;
                box-shadow: var(--shadow-xl);
            }

            /* Overlay pour sidebar */
            .drawer-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .drawer-overlay.active {
                opacity: 1;
                visibility: visible;
            }

            /* Content sans marge sur mobile */
            .app-wrapper {
                margin-left: 0 !important;
            }

            /* Header mobile */
            #kt_app_header {
                padding: 0.5rem 1rem;
            }

            .btn-icon {
                padding: 0.5rem !important;
            }
        }

        @media (max-width: 768px) {
            :root {
                --sidebar-width: 260px;
            }

            .card {
                margin-bottom: 1rem;
            }

            .app-navbar {
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            #kt_app_sidebar_logo {
                padding: 1rem !important;
            }

            .btn-orange-primary {
                padding: 0.6rem 1rem !important;
                font-size: 0.875rem !important;
            }

            #kt_app_sidebar_nav_wrapper {
                max-height: calc(100vh - 200px);
            }
        }

        /* ===================================================================
           TYPOGRAPHIE MODERNE
           =================================================================== */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 600;
        }

        .fw-bold {
            font-weight: 600 !important;
        }

        .fw-semibold {
            font-weight: 500 !important;
        }

        /* ===================================================================
           ANIMATIONS
           =================================================================== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .app-main > * {
            animation: fadeInUp 0.5s ease-out;
        }

        /* ===================================================================
           MODALS
           =================================================================== */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: var(--shadow-xl);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        /* ===================================================================
           BUTTONS PRIMAIRES
           =================================================================== */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
            border: none !important;
            color: #fff !important;
            border-radius: 10px !important;
            padding: 0.75rem 1.5rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #0d3f7a 100%) !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* ===================================================================
           SEPARATORS
           =================================================================== */
        .separator {
            border-color: var(--border-color);
        }

        /* ===================================================================
           TIMELINE (Activities drawer)
           =================================================================== */
        .timeline-line {
            background: var(--border-color);
        }

        .timeline-icon {
            background: var(--bg-card);
            border: 2px solid var(--border-color);
        }

        /* ===================================================================
           BADGES
           =================================================================== */
        .badge {
            border-radius: 8px;
            padding: 0.35rem 0.75rem;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-light-success {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-light-primary {
            background: var(--primary-light);
            color: var(--primary-dark);
        }

        .badge-light-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ===================================================================
           FORMS
           =================================================================== */
        .form-control {
            border-radius: 10px;
            border: 1px solid var(--border-color);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--primary-light);
        }

        /* ===================================================================
           SCROLLTOP BUTTON
           =================================================================== */
        .scrolltop {
            background: var(--primary-color) !important;
            border-radius: 12px !important;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }

        .scrolltop:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        /* ===================================================================
           MENU UTILISATEUR
           =================================================================== */
        .menu {
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-lg);
        }

        .menu-item {
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .menu-item:hover {
            background: var(--primary-light);
        }

        /* ===================================================================
           DRAWERS RESPONSIVES
           =================================================================== */
        @media (max-width: 768px) {
            .app-sidebar,
            #kt_drawer_chat,
            #kt_activities {
                width: 85vw !important;
                max-width: 320px !important;
            }
        }
    </style>

    <script>
        // Frame-busting protection
        if (window.top != window.self) { 
            window.top.location.replace(window.self.location.href); 
        }
    </script>
</head>

<body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    
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
                    <div class="app-header-wrapper d-flex flex-grow-1 align-items-stretch justify-content-between" id="kt_app_header_wrapper">
                        
                        <!-- Logo wrapper mobile -->
                        <div class="d-flex align-items-center">
                            <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary ms-n3 me-2 d-flex d-lg-none" id="kt_app_sidebar_toggle">
                                <i class="ki-outline ki-abstract-14 fs-2"></i>
                            </div>
                            <a href="index.html" class="d-flex d-lg-none">
                                <img alt="Logo" src="assets/media/logos/logo-gs2e.svg" class="h-20px theme-light-show" />
                                <img alt="Logo" src="assets/media/logos/logo-gs2e-dark.svg" class="h-20px theme-dark-show" />
                            </a>
                        </div>

                        <!-- Navbar -->
                        <div class="app-navbar flex-shrink-0">
                            <!-- Chat -->
                            <div class="app-navbar-item ms-1 ms-lg-3">
                                <div class="btn btn-icon btn-circle btn-color-gray-500 btn-active-color-primary btn-custom shadow-xs bg-body" id="kt_drawer_chat_toggle">
                                    <i class="ki-outline ki-message-notif fs-1"></i>
                                </div>
                            </div>
                            
                            <!-- Header menu mobile toggle -->
                            <div class="app-navbar-item d-lg-none ms-2 me-n4" title="Show header menu">
                                <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary" id="kt_app_header_menu_toggle">
                                    <i class="ki-outline ki-text-align-left fs-2 fw-bold"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wrapper -->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                
                <!-- Sidebar -->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="280px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_toggle">
                    
                    <!-- Logo -->
                    <div class="d-flex flex-stack px-4 px-lg-6 py-3 py-lg-8" id="kt_app_sidebar_logo">
                        <a href="{{ route('index') }}">
                            <img alt="Logo" src="assets/media/logos/logo-gs2e.svg" class="h-20px h-lg-25px theme-light-show" />
                            <img alt="Logo" src="assets/media/logos/logo-gs2e-dark.svg" class="h-20px h-lg-25px theme-dark-show" />
                        </a>
                        
                        <!-- User Avatar -->
                        <div class="ms-3">
                            <div class="cursor-pointer position-relative symbol symbol-circle symbol-40px" 
                                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" 
                                data-kt-menu-attach="parent" 
                                data-kt-menu-placement="bottom-end">

                                @php
                                    $avatarUrl = Auth::user()->avatar_url ?? asset('assets/media/avatars/blank.png');
                                @endphp

                                <img src="{{ $avatarUrl }}" 
                                    alt="{{ Auth::user()->nom ?? 'User' }}" 
                                    class="w-100"
                                    onerror="this.onerror=null; this.src='{{ asset('assets/media/avatars/blank.jpg') }}';">

                                <div class="position-absolute rounded-circle bg-success start-100 top-100 h-8px w-8px ms-n3 mt-n3"></div>
                            </div>

                            <!-- User Menu Dropdown -->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <div class="symbol symbol-50px me-5">
                                            <img src="{{ $avatarUrl }}" alt="Avatar" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="fw-bold d-flex align-items-center fs-5">
                                                {{ Auth::user()->nom }} 
                                                <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                            </div>
                                            <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Navigation -->
                    <div class="flex-column-fluid px-4 px-lg-8 py-4" id="kt_app_sidebar_nav">
                        <div id="kt_app_sidebar_nav_wrapper" class="d-flex flex-column pe-4 me-n4">
                            @include('layouts.sidebar_home')
                        </div>
                    </div>

                    <!-- Sidebar Footer -->
                    <div class="flex-column-auto d-flex justify-content-end px-4 px-lg-8 py-3 py-lg-8" id="kt_app_sidebar_footer">
                        <div class="menu-item px-3">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-orange-primary fw-semibold me-2">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>

    <!-- Drawers -->
    @include('layouts.drawers')

    <!-- Scrolltop -->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>

    <!-- Modals -->
    @include('layouts.modals')

    <!-- Scripts -->
    <script>var hostUrl = "assets/";</script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

    <!-- Script pour le toggle sidebar mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('kt_app_sidebar_toggle');
            const sidebar = document.getElementById('kt_app_sidebar');
            
            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('drawer-on');
                    
                    // Créer l'overlay si nécessaire
                    let overlay = document.querySelector('.drawer-overlay');
                    if (!overlay) {
                        overlay = document.createElement('div');
                        overlay.className = 'drawer-overlay';
                        document.body.appendChild(overlay);
                        
                        overlay.addEventListener('click', function() {
                            sidebar.classList.remove('drawer-on');
                            overlay.classList.remove('active');
                        });
                    }
                    
                    overlay.classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>