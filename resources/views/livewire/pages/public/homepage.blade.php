@section('title')
Beranda | Reka Technology
@endsection

@php
function convertToEmbed($url) {
return str_replace(['watch?v=','youtu.be/'], 'embed/', $url);
}
@endphp

<main class="main">
  <!--================== CSS UNTUK PRICE PAKET ==================-->
  <style>
    /* ===============================
    PRICING FEATURES LIST
    ================================ */
    .pricing-features {
      padding-left: 0;
      margin-bottom: 0;
    }

    .pricing-features li {
      list-style: none;
      display: flex !important;
      align-items: center !important;
      gap: 10px;
    }

    .pricing-features li+li {
      margin-top: 15px;
    }


    /* ===============================
    CLOUD ICON (CHECKLIST)
    ================================ */
    .cloud-icon {
      position: relative;
      width: 24px;
      height: 18px;
      background: #eaf5ff;
      border-radius: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    /* Awan */
    .cloud-icon::before,
    .cloud-icon::after {
      content: "";
      position: absolute;
      background: #eaf5ff;
      border-radius: 50%;
      z-index: 0;
    }

    .cloud-icon::before {
      width: 12px;
      height: 12px;
      top: -6px;
      left: 2px;
    }

    .cloud-icon::after {
      width: 14px;
      height: 14px;
      top: -8px;
      right: 2px;
    }

    /* Ceklis */
    .cloud-icon::after {
      content: "✓";
      background: transparent;
      color: #4da6e7;
      font-size: 10px;
      font-weight: bold;
      z-index: 1;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }


    /* ===============================
    PRICING CARD LAYOUT
    ================================ */
    .pricing-tables {
      display: flex;
    }

    .pricing-tables .item {
      position: relative;
      display: flex;
      flex-direction: column;
      height: 100%;
      border: 1px solid #eee;
      border-radius: 16px;
      transition: all 0.3s ease;
    }

    /* Tombol selalu di bawah */
    .pricing-tables .main-blue-button-hover {
      margin-top: auto;
    }


    /* ===============================
    BEST PRICE BADGE
    ================================ */
    .pricing-tables .badge-best {
      position: absolute;
      top: 0;
      right: 14px;
      transform: translateY(-50%);

      display: inline-block;
      padding: 8px 16px;
      font-size: 14px;
      font-weight: 700;
      line-height: 1.2;

      background: #4da6e7;
      color: #fff;
      border-radius: 30px;
      text-transform: uppercase;
      z-index: 5;
    }


    /* ===============================
    HIGHLIGHT BEST PRICE CARD
    ================================ */
    .pricing-tables .item.best-price {
      border: 2px solid #4da6e7;
      box-shadow: 0 20px 40px rgba(77, 166, 231, 0.25);
      transform: translateY(-6px);
    }

    .pricing-tables .item.best-price:hover {
      box-shadow: 0 28px 60px rgba(77, 166, 231, 0.35);
    }


    /* ===============================
    BADGE HEMAT
    ================================ */
    .pricing-tables .badge-hemat {
      position: absolute;
      top: 0;
      transform: translateY(-50%);

      display: inline-block;
      padding: 8px 14px;
      font-size: 13px;
      font-weight: 700;
      line-height: 1.2;

      background: #498d32;
      color: #fff;
      border-radius: 30px;
      z-index: 5;
    }

    /* Tanpa best price */
    .pricing-tables .item:not(.best-price) .badge-hemat {
      right: 14px;
    }

    /* Dengan best price */
    .pricing-tables .item.best-price .badge-hemat {
      right: 130px;
    }


    /* ===============================
    NAMA PAKET
    ================================ */
    .pricing-tables .item h4 {
      position: relative;
      top: -10px;
    }

    /* ===============================
    BANNER BACKGROUND STYLE
    ================================ */
    .main-banner {
      background-position: center 85% !important;
      background-size: cover !important;
      background-repeat: no-repeat !important;
    }
  </style>
  <!--================== END ==================-->

  @foreach ($banner as $index => $item)

  <!--================== BANNER ==================-->
  <div class="main-banner" id="top" style="--banner-bg: url('{{ asset('storage/img/banners/' . $item->gambar) }}');">
    <div class="container">
      <div class="row">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="owl-carousel owl-banner">
              <div class="item header-text">
                <h6>Welcome to Reka Technology</h6>
                <h2>Solusi Digital untuk <em>Website & Aplikasi</em> yang <span>Tumbuh</span></h2>
                <p>Kami membantu bisnis Anda berkembang melalui website profesional, aplikasi mobile modern, dan strategi SEO yang terbukti.</p>
                <div class="down-buttons">
                  <div class="main-blue-button-hover">
                    <a href="#contact">Konsultasi Gratis Sekarang</a>
                  </div>
                  <div class="call-button">
                    <a href="#"><i class="fa fa-phone"></i> +62 895-4286-86796</a>
                  </div>
                </div>
              </div>
              <div class="item header-text">
                <h6>Social Media Management</h6>
                <h2>Konten <em>Menarik</em> yang Meningkatkan <span>Engagement</span></h2>
                <p>Kami mengelola konten media sosial Anda secara konsisten dan strategis untuk membangun brand, meningkatkan interaksi, dan mendatangkan pelanggan.</p>
                <div class="down-buttons">
                  <div class="main-blue-button-hover">
                    <a href="#services">Kelola Sosial Media Saya</a>
                  </div>
                  <div class="call-button">
                    <a href="#"><i class="fa fa-phone"></i> +62 895-4286-86796</a>
                  </div>
                </div>
              </div>
              <div class="item header-text">
                <h6>SEO Optimization</h6>
                <h2>Optimasi <em>SEO</em> untuk <span>Peringkat Teratas Google</span></h2>
                <p>Kami membantu website Anda lebih mudah ditemukan calon pelanggan melalui strategi SEO on-page, off-page, dan technical SEO yang tepat sasaran.</p>
                <div class="down-buttons">
                  <div class="main-blue-button-hover">
                    <a href="#contact">Konsultasi SEO Gratis</a>
                  </div>
                  <div class="call-button">
                    <a href="#"><i class="fa fa-phone"></i> +62 895-4286-86796</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================== END ==================-->
  @endforeach

  <!--================== SERVICE ==================-->
  <div id="services" class="our-services section">
    <div class="services-right-dec">
      <img src="{{ asset('onix/assets/images/bg7.png') }}" alt="">
    </div>
    <div class="container">
      <div class="services-left-dec">
        <img src="{{ asset('onix/assets/images/bg6.png') }}" alt="">
      </div>
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Layanan Terbaik <em>untuk Bisnis Anda,</em> Didukung <span>Tools dan Teknologi Terdepan</span></h2>
            <span>Our Services</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-services">

            <div class="item">
              <h4>Konsultan Teknologi Informasi Bisnis</h4>
              <div class="icon" style="color:#498d32; font-size:48px;">
                <i class="fa fa-laptop"></i>
              </div>
              <p>
                Konsultasi IT yang profesional untuk strategi digital pada bisnis Anda agar lebih efisien dan efektif
              </p>
            </div>

            <div class="item">
              <h4>Pengembangan Website & Aplikasi Mobile</h4>
              <div class="icon" style="color:#498d32; font-size:48px;">
                <i class="fa fa-code"></i>
              </div>
              <p>
                Bangun website dan aplikasi mobile yang responsif, berkinerja tinggi,
                dan siap membantu pertumbuhan bisnis Anda
              </p>
            </div>

            <div class="item">
              <h4>Desain dan Pengembangan UI / UX</h4>
              <div class="icon" style="color:#498d32; font-size:48px;">
                <i class="fa fa-paint-brush"></i>
              </div>
              <p>
                Desain UI/UX yang dirancang untuk menarik, mudah digunakan,
                dan mampu meningkatkan performa produk digital Anda
              </p>
            </div>


            <div class="item">
              <h4>Optimasi SEO Berkualitas untuk Pertumbuhan Bisnis</h4>
              <div class="icon" style="color:#498d32; font-size:48px;">
                <i class="fa fa-line-chart"></i>
              </div>
              <p>
                Optimalkan visibilitas website Anda dan raih peringkat terbaik
                di mesin pencari dengan strategi SEO yang terbukti efektif
              </p>
            </div>

            <div class="item">
              <h4>Optimasi Kecepatan Website Bisnis Anda</h4>
              <div class="icon" style="color:#498d32; font-size:48px;">
                <i class="fa fa-tachometer"></i>
              </div>
              <p>
                Percepat loading website Anda untuk pengalaman pengguna yang
                lebih baik dan performa maksimal
              </p>
            </div>

            <div class="item">
              <h4>Pengelolaan Konten Sosial Media</h4>
              <div class="icon" style="color:#498d32; font-size:48px;">
                <i class="fa fa-share-alt"></i>
              </div>
              <p>
                Bangun interaksi dan engagement melalui konten visual
                dan copywriting yang menarik perhatian
              </p>
            </div>

            <div class="item">
              <h4>Edit Video Kreatif & Berkualitas untuk Branding</h4>
              <div class="icon" style="color:#498d32; font-size:48px;">
                <i class="fa fa-video-camera"></i>
              </div>
              <p>
                Tingkatkan kualitas konten dengan editing yang halus, clean,
                dan profesional yang memukau dan siap dipublikasikan
              </p>
            </div>

            <div class="item">
              <h4>Perawatan & Monitoring Website Bisnis Anda</h4>
              <div class="icon" style="color:#498d32; font-size:48px;">
                <i class="fa fa-cogs"></i>
              </div>
              <p>
                Perawatan penuh mulai dari update konten, keamanan,
                hingga peningkatan performa untuk website Anda
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================== END ==================-->

  <!--================== STATISTIK ==================-->
  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="{{ asset('onix/assets/images/about-left-image.png') }}" alt="Two Girls working together">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Kembangkan situs web Anda dengan <em>Alat SEO</em> &amp; <span>Manajemen Proyek </span> Kami</h2>
            <p>Kami membantu bisnis berkembang melalui solusi digital modern, mulai dari pembuatan website, aplikasi mobile, optimasi SEO, hingga manajemen proyek yang terstruktur.
              Dengan tim profesional dan teknologi terbaru, kami menghadirkan layanan yang cepat, aman, dan hasil yang terbukti meningkatkan performa bisnis Anda.</p>
            <div class="row">

              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon" style="color:#498d32; font-size:48px;">
                      <i class="fa fa-line-chart"></i>
                    </div>
                    <div class="count-digit">320</div>
                    <div class="count-title">SEO Projects</div>
                    <p>Proyek SEO yang berhasil meningkatkan peringkat dan trafik klien</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon" style="color:#498d32; font-size:48px;">
                      <i class="fa fa-globe"></i>
                    </div>
                    <div class="count-digit">640</div>
                    <div class="count-title">Websites</div>
                    <p>Website yang kami bangun dengan desain modern dan performa optimal</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon" style="color:#498d32; font-size:48px;">
                      <i class="fa fa-smile-o"></i>
                    </div>
                    <div class="count-digit">889</div>
                    <div class="count-title">Pelanggan yang Puas</div>
                    <p>Klien yang puas dengan layanan profesional dan hasil yang memuaskan</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================== END ==================-->

  <!--================== HARGA ==================-->
  <div id="pricing" class="pricing-tables">

    <div class="tables-right-dec">
      <img src="{{ asset('onix/assets/images/bg5.png') }}" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Temukan <em>Paket</em> yang Tepat untuk <span>Proyek Anda</span></h2>
            <span>Our Plans</span>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($plans as $plan)
        <div class="col-lg-4">
          <div class="item {{ $plan->best_price === 'yes' ? 'second-item best-price' : '' }}">

            <div class="badge-hemat">Hemat {{ $plan->hemat_persentase }}%</div>
            @if ($plan->best_price === 'yes')
            <div class="badge-best">BEST PRICE</div>
            @endif

            <h4>{{ $plan->nama_paket }}</h4>

            <em style="color: red;">{{ $plan->harga_awal }}</em>

            <span style="position: relative;">
              @if ($plan->start_from === 'yes')
              <small style="font-size: 12px; font-weight: 400; opacity: 0.7; position: relative; top: -20px;">
                Mulai
              </small>
              @endif

              {{ $plan->harga_promo }}
            </span>

            <ul class="pricing-features text-start">
              @foreach (explode(',', $plan->deskripsi) as $fitur)
              <li>
                <span class="cloud-icon"></span>
                {{ trim($fitur) }}
              </li>
              @endforeach
            </ul>

            @if (!is_null($plan->note))
            <span style="display: block; text-align: left; font-size: 15px; font-weight: 400; opacity: 0.7; margin-bottom: 15px; color: rgba(0, 0, 0, 0.7);">
              <strong>Cocok untuk :</strong> {{ $plan->note }}
            </span>
            @endif

            <div class="main-blue-button-hover">
              <a href="#">Get Started</a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
  <!--================== END ==================-->

  <!--================== PORTOFOLIO ==================-->
  <div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
      <img style="opacity: 0.50; " src="{{ asset('onix/assets/images/bg2.png') }}" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Project Terbaru <em>& Unggulan</em> dari <span>Klien Kami</span></h2>
            <span>Our Portfolio</span>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-portfolio">

            @foreach ($portofolios as $item)
            <div class="item">
              <div class="thumb">
                <img src="{{ $item->gambar ? asset('storage/img/portofolio/' . $item->gambar) : asset('onix/assets/images/portfolio-01.jpg') }}" alt="{{ $item->nama_project }}">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a rel="sponsored" href="#" target="_parent">
                      <h4>{{ $item->nama_project }}</h4>
                    </a>
                    <span>{{ $item->kategori ?? '-' }}</span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================== END ==================-->

  <!--================== PORTOFOLIO VIDEO ==================-->
  <div id="video" class="our-videos section">
    <div class="videos-left-dec">
      <img src="{{ asset('onix/assets/images/bg4.png') }}" alt="">
    </div>
    <div class="videos-right-dec">
      <img src="{{ asset('onix/assets/images/bg3.png') }}" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-8">
                  <ul class="nacc">
                    @foreach ($project as $index => $item)
                    <li class="{{ $index == 0 ? 'active' : '' }}">
                      <div>
                        <div class="thumb">
                          @if (!empty($item->video_url))
                          <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($item->video_url, 'v=') }}"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen>
                            </iframe>
                          </div>
                          @elseif(!empty($item->video))
                          <div class="video-container">
                            <video controls>
                              <source src="{{ asset('storage/videos/project/' . $item->video) }}" type="video/mp4">
                              Browser Anda tidak mendukung video.
                            </video>
                          </div>
                          @else
                          <p class="text-muted">Tidak ada video</p>
                          @endif
                          <div class="overlay-effect">
                            <a href="#">
                              <h4>{{ $item->judul }}</h4>
                            </a>
                            <span>{{ $item->caption }}</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="col-lg-4">
                  <div class="menu">
                    @foreach ($project as $index => $item)
                    <div class="{{ $index == 0 ? 'active' : '' }}">
                      <div class="thumb">
                        <img src="{{ asset('storage/img/project/' . $item->thumbnail) }}" alt="{{ $item->judul }}" style="height:120px; object-fit:cover; border-radius:8px">
                        <div class="inner-content">
                          <h4>{{ $item->judul }}</h4>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================== END ==================-->

</main>