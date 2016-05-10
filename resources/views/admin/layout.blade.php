<!DOCTYPE html>
<html lang="es">

@include('admin.partials.head')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

    @include('admin.partials.menutop')

    <!-- BEGIN CONTAINER -->
    <div class="page-container">

        @include('admin.partials.menuleft')

                <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">

                @yield('pageheader')

                @yield('main-content')

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->

    @include('admin.partials.footer')

    @include('admin.partials.scripts')

    @yield('scripts')

</body>

</html>
