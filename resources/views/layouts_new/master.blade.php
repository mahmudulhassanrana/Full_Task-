<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SOFTIC OPC-Task</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.jpg') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> --}}

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ asset('') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            @if (Auth::guard('admin')->user())
                            {{
                                Auth::guard('admin')->user()->name
                            }}
                            @elseif (Auth::guard('web')->user())
                            {{
                                Auth::guard('web')->user()->name
                            }}
                            @else
                            {{
                                Auth::guard('affiliate')->user()->name
                            }}
                            @endif
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item d-flex align-items-center"
                            href="{{ url('/logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->
        <!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                @if (Auth::guard('admin')->user())
                <a class="nav-link " href="{{ asset('/admin/user') }}">
                    <span>User</span>
                </a>
                @elseif (Auth::guard('web')->user())
                <a class="nav-link " href="{{ asset('/user') }}">
                    <span>User</span>
                </a>
                <a class="nav-link " href="{{ asset('/user/userPayment') }}">
                    <span>User payment</span>
                </a>
                @endif
            </li>

            <li class="nav-item">
                @if (Auth::guard('admin')->user())
                <a class="nav-link " href="{{ asset('/admin/affiliate') }}">
                    <span>Affiliate</span>
                </a>
                @elseif (Auth::guard('affiliate')->user() and empty(Auth::guard('affiliate')->user()->affiliate_ref_id))
                <a class="nav-link " href="{{ asset('/affiliate') }}">
                    <span>Affiliate</span>
                </a>
                <a class="nav-link " href="{{ asset('/affiliate/sub_affiliate') }}">
                    <span>Sub-Affiliate</span>
                </a>
                <a class="nav-link " href="{{ asset('/affiliate/user') }}">
                    <span>User</span>
                </a>
                <a class="nav-link " href="{{ asset('/affiliate/paymentHistory') }}">
                    <span>payment History</span>
                </a>
                @endif
            </li>

            <li class="nav-item">
                @if (Auth::guard('admin')->user())
                <a class="nav-link " href="{{ asset('/admin/sub_affiliate') }}">
                    <span>Sub-Affiliate</span>
                </a>
                @elseif (!empty(Auth::guard('affiliate')->user()->affiliate_ref_id))
                <a class="nav-link " href="{{ asset('/affiliate') }}">
                    <span>Sub-Affiliate</span>
                </a>
                <a class="nav-link " href="{{ asset('/affiliate/user') }}">
                    <span>User</span>
                </a>
                <a class="nav-link " href="{{ asset('/affiliate/paymentHistory') }}">
                    <span>payment History</span>
                </a>
                @endif
            </li>

            <!-- End Dashboard Nav -->
        </ul>

    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
        <script>
            var baseUrl = "{{ url('/') }}";
        </script>
    </main><!-- End #main -->



    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

</body>

</html>
