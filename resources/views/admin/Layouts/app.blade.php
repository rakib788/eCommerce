
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('page_title')</title>

   <!-- Fontfaces CSS-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link href="{{ asset('backend/assets/css/font-face.css') }}" rel="stylesheet" media="all">
   <link href="{{ asset('backend/assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
   <link href="{{ asset('backend/assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
   <link href="{{ asset('backend/assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

   <!-- Bootstrap CSS-->
   <link href="{{ asset('backend/assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

   <!-- Vendor CSS-->
   <link href="{{ asset('backend/assets/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
   <link href="{{ asset('backend/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
   <link href="{{ asset('backend/assets/vendor/wow/animate.css" rel="stylesheet') }}" media="all">
   <link href="{{ asset('backend/assets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
   <link href="{{ asset('backend/assets/vendor/slick/slick.css" rel="stylesheet') }}" media="all">
   <link href="{{ asset('backend/assets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
   <link href="{{ asset('backend/assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

   <!-- Main CSS-->
   <link href="{{ asset('backend/assets/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('backend/assets/images/icon/logo.png') }}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{ route('admin.dasboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('admin.partials.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('admin.partials.header')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            @include('admin.partials.footer')
        </div>

    </div>

      <!-- Jquery JS-->
      <script src="{{ asset('backend/assets/vendor/jquery-3.2.1.min.js') }}"></script>
      <!-- Bootstrap JS-->
      <script src="{{ asset('backend/assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
      <script src="{{ asset('backend/assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
      <!-- Vendor JS       -->
      <script src="{{ asset('backend/assets/vendor/slick/slick.min.js') }}">
      </script>
      <script src="{{ asset('backend/assets/vendor/wow/wow.min.js') }}"></script>
      <script src="{{ asset('backend/assets/vendor/animsition/animsition.min.js') }}"></script>
      <script src="{{ asset('backend/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
      </script>
      <script src="{{ asset('backend/assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
      <script src="{{ asset('backend/assets/vendor/counter-up/jquery.counterup.min.js') }}">
      </script>
      <script src="{{ asset('backend/assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
      <script src="{{ asset('backend/assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
      <script src="{{ asset('backend/assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
      <script src="{{ asset('backend/assets/vendor/select2/select2.min.js') }}">
      </script>

      <!-- Main JS-->
      <script src="{{ asset('backend/assets/js/main.js') }}"></script>
</body>

</html>
<!-- end document-->
