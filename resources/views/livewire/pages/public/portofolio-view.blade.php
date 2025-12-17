@section('title')
Portofolio | Reka Technology
@endsection


<style>
    /* ===============================
PORTFOLIO CARD GRID
================================ */
    .portfolio-card {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        background: #fff;
    }

    .portfolio-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.15);
    }

    .portfolio-card .thumb {
        position: relative;
        overflow: hidden;
    }

    .portfolio-card img {
        width: 100%;
        height: 260px;
        object-fit: cover;
    }

    /* Hover Effect */
    .portfolio-card .hover-effect {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .portfolio-card:hover .hover-effect {
        opacity: 1;
    }

    .portfolio-card .inner-content {
        text-align: center;
        color: #fff;
    }

    .portfolio-card .inner-content h4 {
        font-size: 18px;
        margin-bottom: 6px;
        font-weight: 700;
    }

    .portfolio-card .inner-content span {
        font-size: 14px;
        opacity: 0.85;
    }
</style>


<!--================== PORTOFOLIO ==================-->
<div id="portfolio" class="our-portfolio section">


    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Project Terbaru <em>& Unggulan</em> dari <span>Klien Kami</span></h2>
                    <span>Our Portfolio</span>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            @foreach ($portofolios as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="portfolio-card">
                    <div class="thumb">
                        <img
                            src="{{ $item->gambar ? asset('storage/img/portofolio/' . $item->gambar) : asset('onix/assets/images/portfolio-01.jpg') }}"
                            alt="{{ $item->nama_project }}">
                        <div class="hover-effect">
                            <div class="inner-content">
                                <h4>{{ $item->nama_project }}</h4>
                                <span>{{ $item->kategori ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
<!--================== END ==================-->