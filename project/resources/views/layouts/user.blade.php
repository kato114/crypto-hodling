<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('assets/images/'.$gs->favicon)}}" type="image/x-icon">
    <meta name="robots" content="index, follow" />
    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="msapplication-TileColor" content="#051b4c">
    <meta name="theme-color" content="#051b4c">

    <title>Trading Simulator</title>

    <link rel="stylesheet" href="{{ asset('assets/front/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front/libs/animate.min.css') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/css/fontawesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/dashboard/styles/shards-dashboards.1.3.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/styles/extras.1.3.1.min.css') }}">
    @yield('styles')
</head>
<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" src="{{asset('assets/images/'.$gs->footer_logo)}}" style="max-height: 35px;">
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                        <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                    <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
                    </div>
                </form>
                <div class="nav-wrapper">
                    <h6 class="main-sidebar__nav-title"></h6>
                    <ul class="nav nav--no-borders flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::is('dashboard') ? 'active' :'' }}" href="{{ route('dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <span>My Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::is('hodl') ? 'active' :'' }}" href="{{ route('hodl') }}">
                            <i class="material-icons">library_add</i>
                            <span>Add Portfolio</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::is('profile') ? 'active' :'' }}" href="{{ route('profile', Auth::user()->id) }}">
                            <i class="material-icons">settings</i>
                            <span>My Account</span>
                            </a>
                        </li>
                       <!--  <li class="nav-item">
                            <a class="nav-link {{ \Request::is('charts') ? 'active' :'' }}" href="{{ route('charts') }}">
                            <i class="material-icons">pie_chart</i>
                            <span>Charts</span>
                            </a>
                        </li> -->
                    </ul>
                    <h6 class="main-sidebar__nav-title"></h6>
                    <ul class="nav nav--no-borders flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::is('portfolio') ? 'active' :'' }}" href="{{ route('portfolio') }}">
                            <i class="material-icons">emoji_events</i>
                            <span>Top Portfolio</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::is('activity') ? 'active' :'' }}" href="{{ route('activity') }}">
                            <i class="material-icons">local_activity</i>
                            <span>Recent Activity</span>
                            </a>
                        </li>
                    </ul>
                    <h6 class="main-sidebar__nav-title"></h6>
                    <ul class="nav nav--no-borders flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::is('service') ? 'active' :'' }}" href="{{ route('service') }}">
                            <i class="material-icons">local_laundry_service</i>
                            <span>Services</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::is('blog') ? 'active' :'' }}" href="{{ route('blog') }}">
                            <i class="material-icons">forum</i>
                            <span>Blogs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::is('about') ? 'active' :'' }}" href="{{ route('about') }}">
                            <i class="material-icons">help</i>
                            <span>About</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                            <div class="input-group input-group-seamless ml-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
                            </div>
                        </form>
                        <ul class="navbar-nav border-left flex-row ">
                            <li class="nav-item border-right dropdown notifications">
                                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="nav-link-icon__wrapper">
                                        <i class="material-icons">&#xE7F4;</i>
                                        <span class="badge badge-pill badge-danger">2</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons">&#xE6E1;</i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                            <span class="notification__category">Analytics</span>
                                            <p>Your website’s active users count increased by <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons">&#xE8D1;</i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                            <span class="notification__category">Sales</span>
                                            <p>Last week your store’s sales count decreased by <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->profile_photo_path == NULL)
                                    <img src="{{ asset('assets/images/'.$gs->user_image) }}" alt="User Avatar" class="user-avatar rounded-circle mr-2"> 
                                @else
                                    <img src="{{ asset('/assets/images/users/' . Auth::user()->profile_photo_path) }}" alt="User Avatar" class="user-avatar rounded-circle mr-2">
                                @endif
                                <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">
                                    <a class="dropdown-item" href="{{ route('settings') }}"><i class="material-icons">&#xE8B8;</i> Edit Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="material-icons text-danger">&#xE879;</i> Logout</a>
                                </div>
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-sm-inline d-md-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                            <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                </div>
                <!-- / .main-navbar -->
                @yield('body')
                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('service') }}">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog') }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                    </ul>
                    <span class="copyright ml-auto my-auto mr-2">Copyright © 2020 Trading Simulator</span>
                </footer>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/front/libs/loader.js') }}"></script>
    <script src="{{ asset('assets/front/libs/jquery/3.3.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/libs/popper.js/1.14.3/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/front/libs/wow.min.js') }}"></script>
    <script src="{{ asset('assets/front/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{ asset('assets/front/libs/Chart.js/2.7.1/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/scripts/shards.min.js') }}"></script>
    <script src="{{ asset('assets/front/libs/Sharrre/2.0.1/jquery.sharrre.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/scripts/extras.1.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/scripts/shards-dashboards.1.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/scripts/app/app-analytics-overview.1.3.1.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    @yield('script')
</body>
</html>