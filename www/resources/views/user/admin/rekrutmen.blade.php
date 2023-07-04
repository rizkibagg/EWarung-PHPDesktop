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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.4.1
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/admin/dashboard" class="logo d-flex align-items-center">
                <img src="{{asset('temlogin/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block mx-2">E-Warung</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{asset('temlogin/img/min.png') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $admin->nama }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $admin->nama }}</h6>
                            <span>{{ $admin->username }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin_logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/users">
                    <i class="bi bi-person"></i>
                    <span>Data Users</span>
                </a>
            </li><!-- End Users Page Nav -->

            <li class="nav-item">
                <a class="nav-link " href="/admin/rekrutmen">
                    <i class="bi bi-search"></i>
                    <span>Rekrutmen</span>
                </a>
            </li><!-- End Rekrutmen Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="maintenance.html">
                    <i class="bi bi-gear"></i>
                    <span>Maintenance</span>
                </a>
            </li><!-- End Maintenance Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
            </li><!-- End Blank Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Recruitment</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Recruitment</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-12 col-md-12">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h1 class="card-title">Open Recruitment</h1>
                                    <h2 class="card-title">PT. E - Warung Tbk</h2>
                                    <h5 class="card-title">Posision : Kurir</h5>
                                    <h5 class="card-title">Kualifikasi</h5>

                                    <div class="d-flex align-items-center">
                                        <p>
                                            - Laki laki <br>
                                            - Good Looking <br>
                                            - Good Attitude <br>
                                            - Maksimal 25th <br>
                                            - Minimal lulusan SMA/SMK <br>
                                            - Memiliki SIM C <br>
                                            - Tidak memiliki riwayat penyakit dalam <br>
                                        </p>
                                    </div>

                                    <h5 class="card-title">Pendidikan</h5>

                                    <div class="d-flex align-items-center">
                                        <p>
                                            - SMA/SMU/SMK (Diwajibkan) <br>
                                        </p>
                                    </div>

                                    <h5 class="card-title">Job Deskripsi</h5>

                                    <div class="d-flex align-items-center">
                                        <p>
                                            - Menyiapkan barang untuk dikirimkan ke customer <br>
                                            - Mengirim barang yang sesuai ke customer <br>
                                            - Mencatat seluruh barang yang masuk dan keluar dari gudang <br>
                                            - Menerima barang datang dan mengeluarkan barang dari gudang sesuai dengan dokumen <br>
                                            - Mengecek sesuai fisik dan dokumen terhadap barang yang akan datang, keluar, serta barang retur <br>
                                        </p>
                                    </div>

                                    <h5 class="card-title">Jenis Pekerjaan</h5>

                                    <div class="d-flex align-items-center">
                                        <p>
                                            - Penuh Waktu <br>
                                            - Fresh Grad <br>
                                        </p>
                                    </div>

                                    <h5 class="card-title">Benefit</h5>

                                    <div class="d-flex align-items-center">
                                        <p>
                                            - Gaji UMR Jakarta : Dari Rp 4.500.000 per bulan <br>
                                            - Uang Transportasi <br>
                                        </p>
                                    </div>

                                    <h5 class="card-title">Domisili</h5>

                                    <div class="d-flex align-items-center">
                                        <p>
                                            - Diutamakan area Yogyakarta <br>
                                        </p>
                                    </div>

                                    <h5 class="card-title">Pengalaman</h5>

                                    <div class="d-flex align-items-center">
                                        <p>
                                            - Kurir (Diutamakan) <br>
                                            - Helper Gudang (Diutamakan) <br>
                                        </p>
                                    </div>

                                    <div class="text-center">
                                        <!-- Button trigger modal -->
                                        <a class="btn btn-primary btn-block text-white" type="submit" data-toggle="modal" data-target="#orangDalamModal" href="/#orangdalam">Daftar Sekarang</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="orangDalamModal" tabindex="-1" role="dialog" aria-labelledby="orangDalamModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="orangDalamModalLabel">Pembayaran melalui Orang Dalam</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('bootslander/assets/img/barcode_dana.jpeg') }}" alt="">
                                                        <p style="font-size: 13px"><strong>Catatan:</strong> Semua itu bisa didapatkan jika ada Orang Dalam.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>E-Warung</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

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

    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/temlogin/js/main.js') }}"></script>

    @include('sweetalert::alert')

</body>

</html>
