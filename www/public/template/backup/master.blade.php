<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Warung | {{$title}}</title>
    <meta name="description" content="Multipurpose HTML template.">
    <link rel="stylesheet" href="{{ asset('/template/HTWF/scripts/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/HTWF/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/HTWF/css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/HTWF/scripts/flexslider/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/HTWF/scripts/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/HTWF/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/HTWF/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/HTWF/scripts/php/contact-form.css') }}">
    <link href="{{ asset('/template/images/favicon.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('/template/skin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="preloader"></div>
    @include('partials.nav')

    @yield('content')

    <div class="section-empty bg-white">
        <div class="container content">
            <h2 class="text-center text-left-xs">Support By</h2>
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
    <div class="section-empty bg-white">
        <div class="container content">
            <div class="row">
                <div class="col-md-4">
                    <div class="advs-box advs-box-top-icon text-left">
                        <i class="im-information icon circle text-color"></i>
                        <h3>Have a question? call us now</h3>
                        <p>
                            Office 1: +(62) 0106 387 4456<br />
                            Office 2: +(62) 0106 387 4456
                        </p>
                        <a href="#" class="btn-text">Where we are</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="advs-box advs-box-top-icon text-left">
                        <i class="im-envelope icon circle text-color"></i>
                        <h3>Need support? Drop us an email</h3>
                        <p>
                            ewarung@example.com<br />
                            team@example.com
                        </p>
                        <a href="#" class="btn-text">Online form</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="advs-box advs-box-top-icon text-left">
                        <i class="im-calendar icon circle text-color"></i>
                        <h3>We are open all days all week</h3>
                        <p>
                            Mon to Fri 07:00 – 00:00<br />
                            Sat – Sun 07:00 – 22:00
                        </p>
                        <a href="#" class="btn-text">View more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
    <footer class="footer-base">
        <div class="container content">
            <div class="row">
                <div class="col-md-4">
                    <img class="logo" src="{{ asset('/template/images/logo.png') }}" alt="logo" />
                    <hr class="space s" />
                    <p class="text-s">
                        Lorem ipsum dolor sit amet, consy ect etu o dolor sitct raqum nemo de amet.
                    </p>
                    <hr class="space s" />
                    <div class="btn-group social-group btn-group-icons">
                        <a target="_blank" href="#" data-social="share-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <i class="fa fa-facebook text-s circle"></i>
                        </a>
                        <a target="_blank" href="#" data-social="share-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                            <i class="fa fa-twitter text-s circle"></i>
                        </a>
                        <a target="_blank" href="#" data-social="share-google" data-toggle="tooltip" data-placement="top" title="Google+">
                            <i class="fa fa-google-plus text-s circle"></i>
                        </a>
                        <a target="_blank" href="#" data-social="share-linkedin" data-toggle="tooltip" data-placement="top" title="LinkedIn">
                            <i class="fa fa-linkedin text-s circle"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="text-black text-uppercase">Contact Info</h3>
                    <hr class="space space-30" />
                    <ul class="fa-ul text-s ul-squares">
                        <li>Jl. Cerme, Panjatan, Kulon Progo</li>
                        <li>Kulon Progo, Yogyakarta</li>
                        <li>ewarung@example.com</li>
                        <li>+62 (0) 101 0000 000</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="text-black text-uppercase">Useful resources</h3>
                    <hr class="space space-30" />
                    <div class="footer-menu text-s">
                        <a href="#">NEWSLETTER</a>
                        <a href="#">ABOUT US</a>
                        <a href="#">SUBSCRIBE</a>
                        <a href="#">CONTACTS</a>
                    </div>
                </div>
            </div>
            <hr class="space hidden-sm" />
            <div class="row copy-row">
                <div class="col-md-12 copy-text">
                    © 2023 E-Warung - Electronic Warung by <a href="http://schiocco.com/">team.com</a>
                </div>
            </div>
        </div>
        <script src="{{ asset('/template/HTWF/scripts/jquery.min.js') }}"></script>
        <script src="{{ asset('/template/HTWF/scripts/parallax.min.js') }}"></script>
        <script src="{{ asset('/template/HTWF/scripts/script.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('/template/HTWF/scripts/iconsmind/line-icons.min.css') }}">
        <script src="{{ asset('/template/HTWF/scripts/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/template/HTWF/scripts/imagesloaded.min.js') }}"></script>
        <script src="{{ asset('/template/HTWF/scripts/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('/template/HTWF/scripts/flexslider/jquery.flexslider-min.js') }}"></script>
        <script src="{{ asset('/template/HTWF/scripts/jquery.tab-accordion.js') }}"></script>
        <script src="{{ asset('/template/HTWF/scripts/isotope.min.js') }}"></script>
        <script src="{{ asset('/template/HTWF/scripts/bootstrap/js/bootstrap.popover.min.js') }}"></script>
        <script src='{{ asset('/template/HTWF/scripts/php/contact-form.js') }}'></script>
        <script src='{{ asset('/template/HTWF/scripts/jquery.progress-counter.js') }}'></script>
        <script src="{{ asset('/template/HTWF/scripts/smooth.scroll.min.js') }}"></script>
    </footer>
</body>
</html>
