@section('title')
Layanan | Reka Technology
@endsection


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
</style>
<!--================== END ==================-->

<!--================== HARGA ==================-->
<div id="pricing" class="pricing-tables">

    <div class="tables-right-dec">
        <img src="{{ asset('onix/assets/images/bg6.png') }}" alt="">
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

        <div class="container">
            @foreach ($rows as $row)
            <div class="row mb-4">
                @foreach ($row as $plan)
                <div class="col-lg-4 mb-5">
                    <div class="item {{ $plan->best_price === 'yes' ? 'best-price' : '' }}">

                        <div class="badge-hemat">Hemat {{ $plan->hemat_persentase }}%</div>

                        @if ($plan->best_price === 'yes')
                        <div class="badge-best">BEST PRICE</div>
                        @endif

                        <h4>{{ $plan->nama_paket }}</h4>
                        <em style="color: red;">{{ $plan->harga_awal }}</em>
                        <span>{{ $plan->harga_promo }}</span>

                        <ul class="pricing-features text-start">
                            @foreach (explode(',', $plan->deskripsi) as $fitur)
                            <li>
                                <span class="cloud-icon"></span>
                                {{ trim($fitur) }}
                            </li>
                            @endforeach
                        </ul>

                        <div class="main-blue-button-hover">
                            <a href="#">Get Started</a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>


    </div>
</div>
<!--================== END ==================-->