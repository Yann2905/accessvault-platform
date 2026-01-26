<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps.js') }}"></script>

    <!-- Ici tu peux mettre tes fichiers CSS Metronic -->
</head>
<body id="kt_body" class="app-blank">

    <!-- Sidebar -->
    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
        @auth
            @include('partials.sidebar')  <!-- ton menu Metronic -->
        @endauth
    </div>

    <!-- Main content -->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!-- Content wrapper -->
        <div class="d-flex flex-column flex-column-fluid">
            <!-- Content -->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                @yield('content')  <!-- le contenu spécifique de chaque page -->
            </div>
        </div>
    </div>

    <button class="btn btn-icon btn-active-light-primary d-lg-none" id="kt_app_sidebar_mobile_toggle">
    <i class="ki-outline ki-menu-2 fs-2"></i>
</button>


</body>


</html>
