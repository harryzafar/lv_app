<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Velonic - Bootstrap 5 Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/dist/assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('admin/dist/assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('admin/dist/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('admin/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-lg-5 col-12">
                    <div class="card overflow-hidden bg-opacity-25">
                        <div class="row g-0">

                            <div class="col-lg-12">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-3 text-center">
                                        <a href="#" class="logo-light">
                                            <img src="{{ asset('admin/dist/assets/images/logo.png') }}" alt="logo"
                                                height="22">
                                        </a>
                                        <a href="#" class="logo-dark">
                                            <img src="{{ asset('admin/dist/assets/images/logo-dark.png') }}"
                                                alt="dark logo" height="22">
                                        </a>
                                    </div>
                                    <div class="px-4 pt-2 pb-4 my-auto">
                                        <h4 class="fs-20">Sign Up</h4>

                                        @if (session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show"  role="alert">
                                                {{ session('error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <!-- form -->
                                        <form action="{{ route('auth.registration') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Full Name</label>
                                                <input class="form-control  @error('full_name') is-invalid @enderror"
                                                    type="text" id="fullname" name="full_name"
                                                    placeholder="Enter your name" value="{{ old('full_name') }}">
                                                @error('full_name')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    type="email" id="emailaddress" name="email"
                                                    placeholder="Enter your email" value="{{ old('email') }}">
                                                @error('email')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control  @error('password') is-invalid @enderror"
                                                    type="password" id="password" name="password"
                                                    placeholder="Enter your password">
                                                @error('password')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-0 d-grid text-center">
                                                <button class="btn btn-primary fw-semibold" type="submit">Sign
                                                    Up</button>
                                            </div>


                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">Already have account? <a href="{{ url('login') }}"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Log In</b></a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>
                document.write(new Date().getFullYear())
            </script> © SAAOL
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{ asset('admin/dist/assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/dist/assets/js/app.min.js') }}"></script>



</body>

</html>
