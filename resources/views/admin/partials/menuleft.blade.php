<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="nav-item start @yield('active-home')">
                <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Administración</h3>
            </li>
            <li class="nav-item @yield('active-comunidad')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Comunidad</span>
                    <span class="arrow @yield('comunidad')"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @yield('comunidad-datos')">
                        <a href="{{ route('comunidad.index') }}" class="nav-link ">
                            <span class="title">Datos comunidad</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('comunidad-tipos')">
                        <a href="{{ route('tipospropiedades.index') }}" class="nav-link ">
                            <span class="title">Tipos propiedades</span>
                        </a>
                    </li>
                    <li class="nav-item  @yield('comunidad-propiedades')">
                        <a href="{{ route('propiedades.index') }}" class="nav-link ">
                            <span class="title">Propiedades</span>
                        </a>
                    </li>
                    <li class="nav-item  @yield('comunidad-propietarios')">
                        <a href="{{ route('propietarios.index') }}" class="nav-link ">
                            <span class="title">Propietarios</span>
                        </a>
                    </li>
                    <li class="nav-item  @yield('comunidad-relacion')">
                        <a href="{{ route('relacion.index') }}" class="nav-link ">
                            <span class="title">Propiedades + Propietarios</span>
                        </a>
                    </li>
                    <li class="nav-item  @yield('comunidad-garajes')">
                        <a href="{{ route('garajes.index') }}" class="nav-link ">
                            <span class="title">Garajes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  @yield('active-gestion')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-euro"></i>
                    <span class="title">Gestión económica</span>
                    <span class="arrow @yield('gestion')"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('gestion-resumen')">
                        <a href="{{ route('contabilidad.index') }}" class="nav-link ">
                            <span class="title">Estado de cuentas</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('gestion-ingresos')">
                        <a href="{{ route('ingresos.index') }}" class="nav-link ">
                            <span class="title">Ingresos</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('gestion-gastos')">
                        <a href="{{ route('gastos.index') }}" class="nav-link ">
                            <span class="title">Gastos</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  @yield('active-juntas')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Juntas</span>
                    <span class="arrow @yield('juntas')"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('juntas-crear')">
                        <a href="{{ route('junta.index') }}" class="nav-link ">
                            <span class="title">Crear junta</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->