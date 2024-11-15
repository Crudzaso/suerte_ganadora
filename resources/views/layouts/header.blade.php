<header class="header">
    <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
        <div class="app-container container-xxl d-flex align-items-center justify-content-between" id="kt_app_header_container">
            <div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
                <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                <a href="{{ url('/dashboard') }}">
                    <img alt="logo" src="{{ asset('media/logo.jpeg') }}" class="h-40px h-lg-100px" style="border-radius: 18%" />
                </a>
            </div>
            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                    <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-app-menu-placement="bottom" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                            <span class="menu-link">
                                <a href="{{ url('/dashboard') }}" class="menu-title">Inicio</a>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                        </div>
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
                            <span class="menu-link">
                                <a href="{{ route('rifas.index') }}" class="menu-title">Rifas</a>

                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                        </div>
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                            <span class="menu-link">
                                <a href="" class="menu-title">App</a>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                        </div>
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                            <span class="menu-link">
                                <a href="" class="menu-title">help</a>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="app-navbar flex-shrink-0">
                    <div class="app-navbar-item me-2 me-lg-5">
                        <a class="btn btn-success d-flex flex-center h-35px h-lg-50px" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Comprar</a>
                    </div>
                    <div class="app-navbar-item" id="kt_header_user_menu_toggle">
                        <div class="cursor-pointer symbol symbol-35px symbol-lg-50px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            @php
                            $nameParts = explode(' ', auth()->user()->name);
                            $initials = strtoupper($nameParts[0][0] . (isset($nameParts[1]) ? $nameParts[1][0] : ''));
                            @endphp
                            <div class="bg-primary text-white d-flex justify-content-center align-items-center" style="border-radius: 50%; width: 50px; height: 50px;">
                                {{ $initials }}
                            </div>
                        </div>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5">
                                            {{ auth()->user()->name }}
                                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <a href="account/overview.html" class="menu-link px-5">Mi perfil</a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="account/statements.html" class="menu-link px-5">Mis estadisticas</a>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100">Cerrar sesión</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>