<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/voler/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/voler/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/voler/css/app.css">
    <link rel="shortcut icon" href="/assets/voler/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <h1>Agenda</h1>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        @if(auth()->user()->role == 'administrator')
                        <li class="sidebar-item">
                            <a href="{{route('adminhome')}}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'teacher')
                        <li class="sidebar-item">
                            <a href="{{route('home')}}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @endif

                        {{-- <li class="sidebar-item  ">
                            <a href="{{route('mapel')}}" class='sidebar-link'>
                        <i data-feather="grid" width="20"></i>
                        <span>Tabel Mata Pelajaran</span>
                        </a>
                        </li> --}}
                        @if(auth()->user()->role =='administrator')
                        <li class="sidebar-item  ">
                            <a href="{{route('mapel')}}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Tabel Mapel</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{route('kelas')}}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Tabel Kelas</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{route('guru')}}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Tabel Guru</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{route('agenda')}}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Tabel Agenda</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon me-2">
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="/assets/voler/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, {{auth()->user()->name}}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="{{route('logout')}}"><i data-feather="log-out"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="/assets/voler/js/feather-icons/feather.min.js"></script>
    <script src="/assets/voler/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/voler/js/app.js"></script>

    <script src="/assets/voler/vendors/chartjs/Chart.min.js"></script>
    <script src="/assets/voler/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/voler/js/pages/dashboard.js"></script>

    <script src="/assets/voler/js/main.js"></script>
</body>

</html>