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

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
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
                    <a class="collapse-item {{ request()->routeIs('tech-maps.index') ? 'active' : '' }}" href="{{route('tech-maps.index')}}">Техкарты</a>
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
                    <a class="collapse-item {{ request()->routeIs('remains.index') ? 'active' : '' }}" href="{{route('remains.index')}}">Остатки</a>
                    <a class="collapse-item {{ request()->routeIs('inventory.index') ? 'active' : '' }}" href="{{route('inventory.index')}}">Инвентаризации</a>
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

                <!-- Topbar Search -->
                <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    {{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"--}}
                    {{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--                            <i class="fas fa-bell fa-fw"></i>--}}
                    {{--                            <!-- Counter - Alerts -->--}}
                    {{--                            <span class="badge badge-danger badge-counter">3+</span>--}}
                    {{--                        </a>--}}
                    {{--                        <!-- Dropdown - Alerts -->--}}
                    {{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
                    {{--                             aria-labelledby="alertsDropdown">--}}
                    {{--                            <h6 class="dropdown-header">--}}
                    {{--                                Alerts Center--}}
                    {{--                            </h6>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="mr-3">--}}
                    {{--                                    <div class="icon-circle bg-primary">--}}
                    {{--                                        <i class="fas fa-file-alt text-white"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="small text-gray-500">December 12, 2019</div>--}}
                    {{--                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="mr-3">--}}
                    {{--                                    <div class="icon-circle bg-success">--}}
                    {{--                                        <i class="fas fa-donate text-white"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="small text-gray-500">December 7, 2019</div>--}}
                    {{--                                    $290.29 has been deposited into your account!--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="mr-3">--}}
                    {{--                                    <div class="icon-circle bg-warning">--}}
                    {{--                                        <i class="fas fa-exclamation-triangle text-white"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="small text-gray-500">December 2, 2019</div>--}}
                    {{--                                    Spending Alert: We've noticed unusually high spending for your account.--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}

                    {{--                    <!-- Nav Item - Messages -->--}}
                    {{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"--}}
                    {{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--                            <i class="fas fa-envelope fa-fw"></i>--}}
                    {{--                            <!-- Counter - Messages -->--}}
                    {{--                            <span class="badge badge-danger badge-counter">7</span>--}}
                    {{--                        </a>--}}
                    {{--                        <!-- Dropdown - Messages -->--}}
                    {{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
                    {{--                             aria-labelledby="messagesDropdown">--}}
                    {{--                            <h6 class="dropdown-header">--}}
                    {{--                                Message Center--}}
                    {{--                            </h6>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="dropdown-list-image mr-3">--}}
                    {{--                                    <img class="rounded-circle" src="img/undraw_profile_1.svg"--}}
                    {{--                                         alt="...">--}}
                    {{--                                    <div class="status-indicator bg-success"></div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="font-weight-bold">--}}
                    {{--                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a--}}
                    {{--                                        problem I've been having.--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="small text-gray-500">Emily Fowler · 58m</div>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="dropdown-list-image mr-3">--}}
                    {{--                                    <img class="rounded-circle" src="img/undraw_profile_2.svg"--}}
                    {{--                                         alt="...">--}}
                    {{--                                    <div class="status-indicator"></div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="text-truncate">I have the photos that you ordered last month, how--}}
                    {{--                                        would you like them sent to you?--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="small text-gray-500">Jae Chun · 1d</div>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="dropdown-list-image mr-3">--}}
                    {{--                                    <img class="rounded-circle" src="img/undraw_profile_3.svg"--}}
                    {{--                                         alt="...">--}}
                    {{--                                    <div class="status-indicator bg-warning"></div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="text-truncate">Last month's report looks great, I am very happy with--}}
                    {{--                                        the progress so far, keep up the good work!--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="dropdown-list-image mr-3">--}}
                    {{--                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"--}}
                    {{--                                         alt="...">--}}
                    {{--                                    <div class="status-indicator bg-success"></div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone--}}
                    {{--                                        told me that people say this to all dogs, even if they aren't good...--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name ?? 'name'}}</span>
                            <img class="img-profile rounded-circle"
                                 src="{{asset('storage/images/undraw_profile.svg')}}" alt="profile">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('logoutAction')}}" data-toggle="modal"
                               data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Cafe Flow 2025</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
{{--                <a class="btn btn-primary" href="{{route('logoutAction')}}">Logout</a>--}}
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