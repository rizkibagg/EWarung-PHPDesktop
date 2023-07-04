<header class="fixed-top" data-menu-anima="fade-bottom">
    <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
        <div class="navbar-mini scroll-hide">
            <div class="container">
                <div class="nav navbar-nav navbar-left">
                    <span><i class="im-phone-2"></i>+01-23-4226789</span>
                    <hr />
                    <span><i class="im-envelope"></i>ewarung@example.com</span>
                    <hr />
                    <span><i class="im-calendar-4"></i> Mon - Sat: 07:00 - 00:00 </span>
                </div>
                <div class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav lan-menu">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('/template/images/id2.png') }}" alt="flag" />ID <span class="caret"></span></a>
                            {{-- <ul class="dropdown-menu">
                                <li><a href="#"><img src="{{ asset('/template/images/en.png') }}" alt="flag" />EN</a></li>
                            </ul> --}}
                        </li>
                    </ul>
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" style="color: white" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">GO</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="navbar navbar-main">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img class="logo-default" src="{{ asset('/template/images/logo.png') }}" alt="logo" />
                        <img class="logo-retina" src="{{ asset('/template/images/logo.png') }}" alt="logo" />
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="/" role="button">Beranda <span class="caret"></span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu multi-level">
                                <li class="dropdown dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Company</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about.html">About us</a></li>
                                        <li><a href="history.html">History</a></li>
                                        <li><a href="partners.html">Partners</a></li>
                                        <li><a href="careers.html">Careers</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="services-1.html">Services one</a></li>
                                        <li><a href="services-2.html">Services two</a></li>
                                        <li><a href="services-3.html">Services three</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contacts</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="contacts-1.html">Contacts one</a></li>
                                        <li><a href="contacts-2.html">Contacts two</a></li>
                                        <li><a href="contacts-3.html">Contacts three</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="events.html">Events</a></li>
                                        <li><a href="gallery.html">Photo & video</a></li>
                                        <li><a href="team.html">Team</a></li>
                                        <li><a href="coming-soon.html">Coming soon</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/market" role="button">Market <span class="caret"></span></a>
                        </li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu multi-level">
                                <li><a href="blog-classic.html">Classic</a></li>
                                <li><a href="blog-grid.html">Grid</a></li>
                                <li><a href="blog-masonry.html">Masonry</a></li>
                                <li class="dropdown dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Single post</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="post-1.html">Post one</a></li>
                                        <li><a href="post-2.html">Post two</a></li>
                                        <li><a href="post-3.html">Post three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="nav navbar-nav navbar-right">
                        {{-- Jangan lupa dibalik, Login guest, nama auth --}}
                        @auth
                            <div class="custom-area">
                                <a href="#" class="btn btn-sm">LOGIN</a>
                            </div>
                        @endauth
                        @guest
                            <a href="#">
                                <i class="fa fa-cart-plus" aria-hidden="true"><span class="cart-items">0</span></i>
                            </a>
                            <li class="logout">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    {{-- {{ Auth::user()->nama }} --}}
                                    Rizki Bagus Pangestu<i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
