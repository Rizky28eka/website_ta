<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | FlexAdmin - Tailwind CSS 3 Admin Layout & UI Kit Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="MyraStudio">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Icons CSS -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Google Font: Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="flex wrapper">

        <!-- Sidebar -->
        <aside id="app-menu"
            class="hs-overlay fixed inset-y-0 start-0 z-[60] hidden w-64 -translate-x-full transform overflow-y-auto border-e border-default-200 bg-white transition-all duration-300 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">
            @include('layouts.admin.sidebar')
        </aside>

        <!-- Page Content -->
        <div class="page-content">

            <!-- Header -->
            <header class="sticky top-0 bg-white h-16 flex items-center px-5 gap-4 z-50">
                @include('layouts.admin.header')
            </header>

            <!-- Main Content -->
            <main class="flex-grow p-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="footer h-16 flex items-center px-6 bg-white border-t border-gray-200 shadow">
                @include('layouts.admin.footer')
            </footer>

        </div>
    </div>

    <!-- Plugins JS -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/preline/preline.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/iconify-icon/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('path/to/hs-overlay.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
