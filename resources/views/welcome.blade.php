<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SOFTIC OPC-Task</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.jpg')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
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
                <img src="assets/img/logo.png" alt="">
            </a>
        </div>
        <!-- End Logo -->


    </header><!-- End Header -->

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

              <!-- Left side columns -->
              <div class="col-lg-8">
                <div class="row">

                  <!-- Sales Card -->
                  <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                      <div class="card-body">
                        <a type="button" data-bs-toggle="modal"  data-bs-target="#UserRegistration"> <h5 class="card-title">Registration</h5> </a>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                              </div>
                          <div class="ps-3">
                             <a type="button" data-bs-toggle="modal"  data-bs-target="#User_login"> <h6>User Login</h6></a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div><!-- End Sales Card -->

                  <!-- Revenue Card -->
                  <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                      <div class="card-body">
                        <h5 class="card-title">Affiliate | Sub-Affiliate</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                              </div>
                              <div class="ps-3">
                                <a type="button" data-bs-toggle="modal"  data-bs-target="#affiliate_login"> <h6>Login</h6></a>
                             </div>
                        </div>
                      </div>

                    </div>
                  </div><!-- End Revenue Card -->

                  <!-- Customers Card -->
                  <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">
                      <div class="card-body">
                        <h5 class="card-title">Admin</h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                          </div>
                          <div class="ps-3">
                            <a type="button" data-bs-toggle="modal"  data-bs-target="#admin_login"> <h6>Login</h6></a>
                          </div>
                        </div>

                      </div>
                    </div>

                  </div><!-- End Customers Card -->

                </div>
              </div><!-- End Left side columns -->

            </div>
          </section>

    {{-- admin login form --}}
    <div class="modal fade" id="admin_login" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">admin login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Floating Labels Form -->
                    <form class="row g-3"  method="POST" action="{{url('/login/admin')}}">
                        @csrf
                        <div>
                            <div class="form-floating">
                                <input name="email" type="email" class="form-control" id="floatingEmail"
                                    placeholder="Your Email">
                                <label for="floatingEmail">Your Email</label>
                            </div>
                        </div>
                            <div class="form-floating">
                                <input name="password" type="password" class="form-control" id="floatingpassword"
                                    placeholder="Your Password">
                                <label for="floatingPassword">Password</label>
                            </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End floating Labels Form -->
                </div>
            </div>
        </div>
    </div>
    {{-- Affiliate | Sub-Affiliate login form --}}
    <div class="modal fade" id="affiliate_login" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Affiliate | Sub-Affiliate login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Floating Labels Form -->
                    <form class="row g-3"  method="POST" action="{{url('/login/affiliate')}}">
                        @csrf
                        <div>
                            <div class="form-floating">
                                <input name="email" type="email" class="form-control" id="floatingEmail"
                                    placeholder="Your Email">
                                <label for="floatingEmail">Your Email</label>
                            </div>
                        </div>
                            <div class="form-floating">
                                <input name="password" type="password" class="form-control" id="floatingpassword"
                                    placeholder="Your Password">
                                <label for="floatingPassword">Password</label>
                            </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End floating Labels Form -->
                </div>
            </div>
        </div>
    </div>
    {{-- User login form --}}
          <div class="modal fade" id="User_login" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3"  method="POST" action="{{url('/login/user')}}">
                            @csrf
                            <div>
                                <div class="form-floating">
                                    <input name="email" type="email" class="form-control" id="floatingEmail"
                                        placeholder="Your Email">
                                    <label for="floatingEmail">Your Email</label>
                                </div>
                            </div>
                                <div class="form-floating">
                                    <input name="password" type="password" class="form-control" id="floatingpassword"
                                        placeholder="Your Password">
                                    <label for="floatingPassword">Password</label>
                                </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
        </div>
    {{-- User Registration form --}}
          <div class="modal fade" id="UserRegistration" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Registration</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Floating Labels Form -->
                        <form class="row g-3"  method="POST" action="{{ url('register') }}">
                            @csrf
                            <div>
                                <div class="form-floating">
                                    <input name="name" type="text" class="form-control" id="floatingName"
                                        placeholder="Your Name" required>
                                    <label for="floatingName">Your Name</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating">
                                    <input name="email" type="email" class="form-control" id="floatingEmail"
                                        placeholder="Your Email"required>
                                    <label for="floatingEmail">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input name="promo_code" type="promo_code" class="form-control" id="promo_code"
                                        placeholder="Promo Code">
                                    <label for="phonenumber">Promo Code</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                  <input name="dob" type="date" class="form-control" id="dob">
                                  <label for="phonenumber" required>Date of birth</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating">
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Your password"required>
                                    <label for="floatingEmail">Your password</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
        </div><!-- End Basic Modal-->

    </main><!-- End #main -->



    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
