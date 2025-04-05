<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cafe Flow</title>

    <!-- Custom fonts for this template-->
    <link href={{asset("admin-assets/vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{asset("admin-assets/css/sb-admin-2.min.css")}} rel="stylesheet">
    @yield('styles')


</head>

<body id="page-top">

<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('establishment.show', ['id' => auth()->user()->establishment_id])}}">
            <div class="sidebar-brand-icon">
                <img class="img-profile rounded-circle"
                     src="{{asset('storage/images/CafeFlow.svg')}}"
                     alt="logo"
                     style="height: 2.3em; width: auto;">
            </div>
            <div class="sidebar-brand-text mx-3">Cafe Flow</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item {{ request()->routeIs('start') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{route('start')}}">
                <i class="fas fa-info"></i>
                <span>Старт</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages10" aria-expanded="true" aria-controls="collapsePages10">
                <i class="fas fa-fw fa-users"></i>
                <span>Сотрудники</span>
            </a>
            <div id="collapsePages10" class="collapse {{ request()->routeIs('employees.index') || request()->routeIs('schedules.index') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->routeIs('employees.index') ? 'active' : '' }}" href="{{route('employees.index')}}">Сотрудники</a>
                    <a class="collapse-item {{ request()->routeIs('schedules.index') ? 'active' : '' }}" href="{{route('schedules.index')}}">Рабочий график</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
                <i class="fas fa-fw fa-table"></i>
                <span>Каталог</span>
            </a>
            <div id="collapsePages1" class="collapse {{ request()->routeIs('products.index') || request()->routeIs('tech-maps.index') || request()->routeIs('semimanufactures.index') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->routeIs('products.index') ? 'active' : '' }}" href="{{route('products.index')}}">Товары</a>
                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                        <a class="collapse-item {{ request()->routeIs('tech-maps.index') ? 'active' : '' }}" href="{{route('tech-maps.index')}}">Техкарты</a>
                    @endif
                    <a class="collapse-item {{ request()->routeIs('semimanufactures.index') ? 'active' : '' }}" href="{{route('semimanufactures.index')}}">Полуфабрикаты</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
                <i class="fas fa-fw fa-warehouse"></i>
                <span>Склад</span>
            </a>
            <div id="collapsePages2" class="collapse {{ request()->routeIs('suppliers.index') || request()->routeIs('delivers.index') || request()->routeIs('write_offs.index') || request()->routeIs('remains.index') || request()->routeIs('inventory.index') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->routeIs('suppliers.index') ? 'active' : '' }}" href="{{route('suppliers.index')}}">Поставщики</a>
                    <a class="collapse-item {{ request()->routeIs('delivers.index') ? 'active' : '' }}" href="{{route('delivers.index')}}">Поставки</a>
                    <a class="collapse-item {{ request()->routeIs('write_offs.index') ? 'active' : '' }}" href="{{route('write_offs.index')}}">Списания</a>
                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                        <a class="collapse-item {{ request()->routeIs('remains.index') ? 'active' : '' }}" href="{{route('remains.index')}}">Остатки</a>
                        <a class="collapse-item {{ request()->routeIs('inventory.index') ? 'active' : '' }}" href="{{route('inventory.index')}}">Инвентаризации</a>
                    @endif
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages3">
                <i class="fas fa-fw fa-handshake"></i>
                <span>Группа клиентов</span>
            </a>
            <div id="collapsePages3" class="collapse {{request()->routeIs('clients.index') || request()->routeIs('reservations.index') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->routeIs('clients.index') ? 'active' : '' }}" href="{{route('clients.index')}}">Клиенты</a>
                    <a class="collapse-item {{ request()->routeIs('reservations.index') ? 'active' : '' }}" href="{{route('reservations.index')}}">Бронирование столов</a>
                </div>
            </div>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name ?? 'name'}}</span>
                            <img class="img-profile rounded-circle"
                                 src="{{asset('storage/images/undraw_profile.svg')}}" alt="profile">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('establishment.show', ['id' => auth()->user()->establishment_id])}}">
                                <i class="fas fa-shopping-bag fa-sm fa-fw mr-2 text-gray-400"></i>
                                Заведение
                            </a>
                            <a class="dropdown-item" href="{{route('logoutAction')}}" data-toggle="modal"
                               data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Выход
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Cafe Flow 2025</span>
                </div>
            </div>
        </footer>

    </div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Хотите выйти из профиля?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Выберите «Выход» ниже, если вы готовы завершить текущий сеанс.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
                <a class="btn btn-primary" href="{{route('logoutAction')}}">Выход</a>
            </div>
        </div>f
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src={{asset("admin-assets/vendor/jquery/jquery.min.js")}}></script>
<script src={{asset("admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>

<!-- Core plugin JavaScript-->
<script src={{asset("admin-assets/vendor/jquery-easing/jquery.easing.min.js")}}></script>

<!-- Custom scripts for all pages-->
<script src={{asset("admin-assets/js/sb-admin-2.min.js")}}></script>

@yield('scripts')

</body>

</html>