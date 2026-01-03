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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('onix/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('onix/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('onix/assets/css/templatemo-onix-digital.css') }}">
    <link rel="stylesheet" href="{{ asset('onix/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('onix/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('onix/assets/css/custom.css') }}">

    <!-- CSS DROP DOWN ITEM SERVICES -->
    <style>
        /* =====================================================
            DROPDOWN SERVICES — CLEAN & FINAL
        ===================================================== */

        /* =======================
            BASE ITEM STYLE
        ======================= */
        li.scroll-to-section.dropdown ul.dropdown-menu a.dropdown-item {
            display: block !important;
            width: 100% !important;
            padding: 8px 20px !important;
            box-sizing: border-box !important;
            text-align: left !important;
            color: #000 !important;
            background-color: transparent !important;
            font-family: inherit !important;
            font-weight: 400 !important;
            text-transform: none !important;
        }

        /* =======================
            HOVER / FOCUS / ACTIVE
        ======================= */
        li.scroll-to-section.dropdown ul.dropdown-menu a.dropdown-item:hover,
        li.scroll-to-section.dropdown ul.dropdown-menu a.dropdown-item:focus,
        li.scroll-to-section.dropdown ul.dropdown-menu a.dropdown-item:active,
        li.scroll-to-section.dropdown ul.dropdown-menu a.dropdown-item.active {
            color: #4da6e7 !important;
            background-color: rgba(77, 166, 231, 0.12) !important;
        }

        /* =======================
            DROPDOWN STRUCTURE
        ======================== */
        li.scroll-to-section.dropdown>ul.dropdown-menu {
            text-align: left !important;
        }

        li.scroll-to-section.dropdown>ul.dropdown-menu>li {
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        li.scroll-to-section.dropdown>ul.dropdown-menu>li:last-child,
        li.scroll-to-section.dropdown>ul.dropdown-menu>li:last-child>a {
            text-align: left !important;
        }

        /* =======================
            BOOTSTRAP VISIBILITY FIX
        ======================= */
        li.scroll-to-section.dropdown:not(.show)>ul.dropdown-menu {
            display: none !important;
        }

        li.scroll-to-section.dropdown.show>ul.dropdown-menu,
        li.scroll-to-section.dropdown>ul.dropdown-menu.show {
            display: block !important;
        }

        /* =======================
            MOBILE FIX — DROPDOWN PANJANG & SCROLL
        ======================== */
        @media (max-width: 767.98px) {

            /* Dropdown mengalir normal & scroll jika panjang */
            li.scroll-to-section.dropdown>ul.dropdown-menu {
                position: static !important;
                float: none !important;
                width: 100% !important;
                max-height: 60vh !important;
                overflow-y: auto !important;
                overflow-x: hidden !important;
                transform: none !important;
                -webkit-overflow-scrolling: touch !important;
            }

            /* Navbar collapse bisa scroll jika tinggi */
            .navbar-collapse.show {
                max-height: 80vh !important;
                overflow-y: auto !important;
                overflow-x: hidden !important;
            }

            /* Pastikan nav parent tidak memotong dropdown */
            .navbar-nav {
                height: auto !important;
                overflow: visible !important;
            }
        }
    </style>
    <!-- END -->


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
                            <li class="scroll-to-section"><a href="/" class="{{request()->routeIs('homepage') ? 'active' : ''}}">Beranda</a></li>
                            <li class="scroll-to-section dropdown">
                                <a href="#"
                                    class="dropdown-toggle {{ request()->routeIs('services*') ? 'active' : '' }}"
                                    data-bs-toggle="dropdown">
                                    Layanan Kami
                                </a>

                                <ul class="dropdown-menu">
                                    @foreach ($categoriesPricesMenu as $category)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('services', ['selectedCategory' => $category->id]) }}">
                                            {{ $category->categories }}
                                        </a>
                                    </li>
                                    @endforeach
                                    <li>
                                        <a class="dropdown-item" href="{{ route('services') }}">
                                            Semua Paket
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="scroll-to-section">
                                <a href="{{ route('portofolio') }}"
                                    class="{{ request()->routeIs('portofolio') ? 'active' : '' }}">
                                    Portofolio
                                </a>
                            </li>
                            <li class="scroll-to-section d-block d-lg-inline-block">
                                <!-- <div class="main-red-button-hover ">
                                    <a href="{{ route('contact') }}"
                                        class="{{ request()->routeIs('contact') ? 'active' : '' }}" style="color: black;">
                                        Kontak Kami
                                    </a>
                                </div> -->
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
                        <a href="#">help@rekatechnology.id</a>
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
                                    <li><a href="#">Perawatan & Monitoring Website</a></li>
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
                <livewire:pages.public.newsletter.newsletter-form />
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <!--================== SWEETALERT2 UNTUK NOTIFIKASI ==================-->
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('newsletter-success', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Email newsletter Anda berhasil disimpan.',
                    confirmButtonText: 'OK'
                })
            })
        })
    </script>
    <!--================== END ==================-->

</body>

</html>