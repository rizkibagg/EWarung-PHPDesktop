<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E - Warung | {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('/eshopper/img/E.png') }}" rel="icon">

    <link rel="stylesheet" href="{{ asset('/eshopper/css/style-sebelah.css') }}">
    <link rel="stylesheet" href="{{ asset('/eshopper/css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('/eshopper/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('/eshopper/css/skin.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/bootslander/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/bootslander/assets/css/style.css') }}" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/eshopper/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/eshopper/css/style.css') }}" rel="stylesheet">

    {{-- @stack('scripts') --}}

</head>

<body>
    @include('partials.nav')

    @yield('dashboard')

    <!-- Navbar Start -->
    <div class="container-fluid">

        @yield('content')

        <!-- Vendor Start -->
        <div class="text-center mt-5 mb-4">
            <h2 class="section-title px-5"><span class="px-2">Support By</span></h2>
        </div>
        <div class="section-empty bg-white">
            <div class="container content">
                <hr class="space l" />
                <div class="flexslider carousel png-over" data-options="numItems:5,minWidth:100,itemMargin:60,controlNav:false,directionNav:false">
                    <ul class="slides">
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/bca.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/dana.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/paypal.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/gopay.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/jago.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/bca.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/dana.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/paypal.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a class="img-box" href="#">
                                <img src="{{ asset('/template/images/logos/gopay.png') }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- Penutup container-fluid -->
    <!-- Vendor End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5">
        <!-- Subscribe Start -->
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
            </div>
        </div>
        <!-- Subscribe End -->
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-5 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Warung</h1>
                </a>
                <p>E-warung adalah sebuah istilah yang merujuk pada warung atau toko kecil yang menjual berbagai macam produk kebutuhan.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Jl. Tentara Rakyat Mataram, Jetis, Yogyakarta</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>ewarung@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+62 (0) 101 0000 000</p>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Beranda</a>
                            <a class="text-dark mb-2" href="/warung"><i class="fa fa-angle-right mr-2"></i>Warung</a>
                            @auth
                                @if ( Auth::user()->kategori == 'Pembeli')
                                    <a class="text-dark mb-2" href="/keranjang"><i class="fa fa-angle-right mr-2"></i>Keranjang</a>
                                    <a class="text-dark mb-2" href="/checkout"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                                @endif
                            @endauth
                            <a class="text-dark mb-2" href="/contact"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                            <a class="text-dark mb-2" href="/login"><i class="fa fa-angle-right mr-2"></i>Login</a>
                            <a class="text-dark" href="/register"><i class="fa fa-angle-right mr-2"></i>Register</a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">E - Warung</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{ asset('/eshopper/img/payments.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('/eshopper/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/eshopper/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('/eshopper/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('/eshopper/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/eshopper/js/main.js') }}"></script>

    <!-- Template Sebelah -->
    <script src="{{ asset('/template/HTWF/scripts/script.js') }}"></script>
    <script src="{{ asset('/template/HTWF/scripts/flexslider/jquery.flexslider-min.js') }}"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/bootslander/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/bootslander/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/bootslander/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/bootslander/assets/js/main.js') }}"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')

    <!-- SweetAlert -->
    @include('sweetalert::alert')
</body>

</html>
