@section('title')
Portofolio | Reka Technology
@endsection

<style>
    /* ===============================
    PORTFOLIO BLOG LAYOUT
    ================================= */
    .portfolio-blog {
        margin-top: 50px;
    }

    .portfolio-blog .blog-card {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 30px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        background: #fff;
    }

    .portfolio-blog .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.15);
    }

    .portfolio-blog .blog-thumb {
        flex: 1 1 40%;
        max-width: 40%;
        overflow: hidden;
    }

    .portfolio-blog .blog-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .portfolio-blog .blog-content {
        flex: 1 1 60%;
        max-width: 60%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .portfolio-blog .blog-content h4 {
        font-size: 22px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .portfolio-blog .blog-content span {
        font-size: 13px;
        opacity: 0.7;
        margin-bottom: 15px;
        display: block;
    }

    .portfolio-blog .blog-content p {
        font-size: 12px;
        color: #555;
        margin-bottom: 15px;
    }

    .portfolio-blog .blog-content .btn-read-more {
        align-self: start;
        background-color: #498d32;
        color: #fff;
        padding: 8px 20px;
        border-radius: 9999px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .portfolio-blog .blog-content .btn-read-more:hover {
        background-color: #3f7c2c;
        color: #fff;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .portfolio-blog .blog-card {
            flex-direction: column;
        }

        .portfolio-blog .blog-thumb,
        .portfolio-blog .blog-content {
            max-width: 100%;
            flex: 1 1 100%;
        }
    }

    .btn-view-site {
        display: inline-block;
        padding: 6px 16px;
        background-color: transparent;
        /* bisa diganti #498d32 kalau ingin warna */
        color: #498d32;
        border: 2px solid #498d32;
        border-radius: 9999px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .btn-view-site:hover {
        background-color: #498d32;
        color: #fff;
    }
</style>

<div id="portfolio" class="our-portfolio section portfolio-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-4">
                <div class="section-heading">
                    <h2>Project <em>{{ $portofolio->nama_project }}</em></h2>
                    <span>Informasi Lengkap & Deskripsi Project</span>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="blog-card">
                    <div class="blog-thumb">
                        <img src="{{ $portofolio->gambar ? asset('storage/app/public/img/portofolio/' . $portofolio->gambar) : asset('onix/assets/images/portfolio-01.jpg') }}" alt="{{ $portofolio->nama_project }}">
                    </div>
                    <div class="blog-content">
                        <h4>{{ $portofolio->nama_project }}</h4>
                        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 15px;">
                            <span style="display: flex; align-items: center; gap: 5px;">
                                <i class="fa fa-user" style="color:#498d32;"></i>
                                {{ $portofolio->nama_customer }}
                            </span>
                            <span style="display: flex; align-items: center; gap: 5px;">
                                <i class="fa fa-link" style="color:#498d32;"></i>
                                <a href="{{ $portofolio->link_url }}" target="_blank"
                                    class="btn-view-site">
                                    Lihat Situs
                                </a>
                            </span>
                        </div>
                        <p>{{ $portofolio->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>