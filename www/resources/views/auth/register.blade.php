<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E - Warung | {{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/eshopper/img/E.png') }}" rel="icon">
    <link href="{{ asset('/temlogin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/temlogin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/temlogin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/temlogin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/temlogin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/temlogin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/temlogin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/temlogin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/temlogin/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="/" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('/temlogin/img/logo.png') }}" alt="">
                                <span class="d-none d-lg-block">E - Warung</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post" action="{{ route('register') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Your Name</label>
                                            <input type="text" name="nama" class="form-control" id="yourName" autofocus required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPosision" class="form-label">User Type</label>
                                            <select class="form-select" id="yourPosision" name="kategori" required>
                                                <option value="" selected>Choose Your Type</option>
                                                <option value="Penjual">Penjual</option>
                                                <option value="Pembeli">Pembeli</option>
                                            </select>
                                            <div class="invalid-feedback">Please, choose your type!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail" required>
                                            <div class="invalid-feedback">Please enter your email!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <input type="text" name="nomorhp" class="form-control" value="-" hidden>
                                        <input type="text" name="alamat" class="form-control" value="-" hidden>
                                        <input type="text" name="pekerjaan" class="form-control" value="-" hidden>
                                        <input type="text" name="biodata" class="form-control" value="-" hidden>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="" type="checkbox" value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/temlogin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/temlogin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/temlogin/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('/temlogin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('/temlogin/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('/temlogin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('/temlogin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/temlogin/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/temlogin/js/main.js') }}"></script>
    {{-- @include('sweetalert::alert') --}}

</body>

</html>
