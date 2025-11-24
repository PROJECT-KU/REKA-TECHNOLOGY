<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Favicons -->
    <link href="{{ asset('onix/assets/images/rekafavicon.png') }}" rel="icon">
    <link href="{{ asset('onix/assets/images/rekafavicon.png') }}" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('onix/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('onix/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('onix/assets/css/templatemo-onix-digital.css') }}">
    <link rel="stylesheet" href="{{ asset('onix/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('onix/assets/css/owl.css') }}">

</head>

<body class="index-page">
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{ asset('onix/assets/images/logoreka.png') }}"
                                style="width:189px; height:70px; object-fit:contain;">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/" class="{{request()->routeIs('homepage') ? 'active' : ''}}">Home</a></li>
                            <li class="scroll-to-section"><a class="{{request()->routeIs('services.*') ? 'active' : ''}}">Services</a></li>
                            <li class="scroll-to-section"><a class="{{request()->routeIs('about.*') ? 'active' : ''}}">About</a></li>
                            <li class="scroll-to-section"><a class="{{request()->routeIs('portfolio.*') ? 'active' : ''}}">Portfolio</a></li>
                            <li class="scroll-to-section"><a class="{{request()->routeIs('video.*') ? 'active' : ''}}">Videos</a></li>
                            <li class="scroll-to-section"><a class="{{request()->routeIs('contact.*') ? 'active' : ''}}">Contact Us</a></li>
                            <li class="scroll-to-section">
                                <div class="main-red-button-hover"><a href="#contact">Contact Us Now</a></div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    {{ $slot }}
    <!-- ======= Footer ======= -->
    <div class="footer-dec">
        <img src="{{ asset('onix/assets/images/footer-dec.png') }}" alt="">
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="about footer-item">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('onix/assets/images/logoreka.png') }}" alt="Reka Technology" style="width:189px; height:70px; object-fit:contain;"></a>
                        </div>
                        <a href="#">help@rekatechnology.com</a>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="services footer-item">
                        <h4>Layanan</h4>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li><a href="#">IT Consultant</a></li>
                                    <li><a href="#">Pengembangan Website & Aplikasi Mobile</a></li>
                                    <li><a href="#">Pengembangan UI / UX</a></li>
                                    <li><a href="#">Optimasi SEO</a></li>
                                </ul>
                            </div>

                            <div class="col-6">
                                <ul>
                                    <li><a href="#">Optimasi Kecepatan Website</a></li>
                                    <li><a href="#">Pengelolaan Konten Sosial Media</a></li>
                                    <li><a href="#">Edit Video</a></li>
                                    <li><a href="#">erawatan & Monitoring Website</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3">
                    <div class="community footer-item">
                        <h4>Community</h4>
                        <ul>
                            <li><a href="#">Digital Marketing</a></li>
                            <li><a href="#">Business Ideas</a></li>
                            <li><a href="#">Website Checkup</a></li>
                            <li><a href="#">Page Speed Test</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-lg-3">
                    <div class="subscribe-newsletters footer-item">
                        <h4>Daftar Newsletter</h4>
                        <p>Jangan lewatkan promo, info penting, dan tips teknologi terbaru dari kami</p>
                        <form action="#" method="get">
                            <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                            <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane-o"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright">
                        <p>Copyright © {{ date('Y') }} Reka Technology. All Rights Reserved.</p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('onix/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('onix/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('onix/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('onix/assets/js/animation.js') }}"></script>
    <script src="{{ asset('onix/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('onix/assets/js/custom.js') }}"></script>

    <script>
        // Acc
        $(document).on("click", ".naccs .menu div", function() {
            var numberIndex = $(this).index();

            if (!$(this).is("active")) {
                $(".naccs .menu div").removeClass("active");
                $(".naccs ul li").removeClass("active");

                $(this).addClass("active");
                $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

                var listItemHeight = $(".naccs ul")
                    .find("li:eq(" + numberIndex + ")")
                    .innerHeight();
                $(".naccs ul").height(listItemHeight + "px");
            }
        });
    </script>

</body>

</html>