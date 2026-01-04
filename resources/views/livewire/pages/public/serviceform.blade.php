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

    /* ===============================
    DESKRIPSI NOTE PRICING STYLE
    ================================ */
    .plan-note {
        display: block !important;
        text-align: left !important;
        font-size: 15px !important;
        font-weight: 400;
        margin-bottom: 15px;
        color: rgba(0, 0, 0, 0.7) !important;
    }

    /* ===============================
    TABS CATEGORY STYLE
    ================================ */

    .nav-tabs {
        border-bottom: none;
    }

    .nav-tabs .nav-link {
        color: #555;
        background-color: #fff;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        font-weight: 500;
    }

    .nav-tabs .nav-link:hover {
        background-color: #f5f5f5;
        color: #333;
    }

    .nav-tabs .nav-link.active {
        color: #fff;
        background-color: #4da6e7;
        /* warna brand */
        border-color: #4da6e7 #4da6e7 #fff;
        box-shadow: 0 4px 10px rgba(77, 166, 231, 0.3);
    }

    /* ===============================
    LEBAR INPUTAN SEARCH STYLE
    ================================ */
    .w-md-50,
    .w-lg-25 {
        width: 100%;
    }

    @media (min-width: 768px) {
        .w-md-50 {
            width: 50% !important;
        }
    }

    @media (min-width: 992px) {
        .w-lg-25 {
            width: 25% !important;
        }
    }
</style>
<!--================== END ==================-->

<!--================== HARGA ==================-->
<div id="pricing" class="pricing-tables">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Temukan <em>Paket</em> yang Tepat untuk <span>Proyek Anda</span></h2>
                    <span>Our Plans</span>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-between" style="border-bottom: 2px solid #eee; padding-bottom: 10px; flex-wrap: wrap;">

            <!-- SEARCH BOX DI KIRI -->
            <form method="GET" action="{{ route('services') }}" class="w-100 w-md-50 w-lg-25 mb-3">
                <input type="hidden" name="selectedCategory" value="{{ $selectedCategory }}">
                <div class="position-relative">

                    <!-- INPUT -->
                    <input type="text"
                        name="searchPrice"
                        value="{{ request('searchPrice') }}"
                        class="form-control ps-5 pe-5"
                        placeholder="Ketik Nama Paket..."
                        style="height: 42px; border-radius: 30px; font-size: 14px; border: 1px solid #e5e7eb; box-shadow: none; transition: all 0.25s ease;" onfocus="this.style.borderColor='#4da6e7'" onblur="this.style.borderColor='#e5e7eb'">

                    <!-- ICON SEARCH -->
                    <span style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #9ca3af; font-size: 14px;">
                        <i class="bi bi-search"></i>
                    </span>

                    @if(request('searchPrice'))
                    <!-- BUTTON RESET (X - DANGER) -->
                    <a href="{{ route('services', ['selectedCategory' => $selectedCategory]) }}"
                        title="Reset pencarian"
                        style="position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 26px; height: 26px; border-radius: 50%; background: #fee2e2; color: #ef4444; display: flex; align-items: center; justify-content: center; font-size: 14px; text-decoration: none; transition: all 0.2s ease;" onmouseover="this.style.background='#fecaca'" onmouseout="this.style.background='#fee2e2'">
                        <i class="fas fa-trash"></i>
                    </a>
                    @else
                    <!-- BUTTON CARI (DEFAULT) -->
                    <button type="submit"
                        style="position: absolute; right: 14px; top: 50%; transform: translateY(-50%); border: none; background: linear-gradient(135deg, #4da6e7, #3b82f6); color: #fff; padding: 6px 16px; border-radius: 20px; font-size: 12px; font-weight: 500; cursor: pointer; transition: all 0.25s ease;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                        Cari
                    </button>
                    @endif

                </div>
            </form>

            <!-- TAB CATEGORIES DI KANAN -->
            <ul class="nav nav-tabs mb-0"
                style="flex-grow:1; justify-content:flex-end; overflow-x:auto; white-space:nowrap;">

                @foreach($categories as $category)
                <li class="nav-item me-2">
                    <a href="{{ route('services', [
                'selectedCategory' => $category->slug,
                'searchPrice' => request('searchPrice')
            ]) }}"
                        class="nav-link {{ request('selectedCategory') == $category->slug ? 'active' : '' }}"
                        style="padding:10px 20px; border-radius:50px; transition:0.3s;">
                        {{ $category->categories }}
                    </a>
                </li>
                @endforeach

                <li class="nav-item">
                    <a href="{{ route('services', ['searchPrice' => request('searchPrice')]) }}"
                        class="nav-link {{ request('selectedCategory') === null ? 'active' : '' }}"
                        style="padding:10px 20px; border-radius:50px; transition:0.3s;">
                        Semua Paket
                    </a>
                </li>
            </ul>

        </div>


        <div class="container">
            @if($rows->isEmpty())
            <div class="alert alert-warning text-center">
                Belum ada paket untuk kategori ini.
            </div>
            @else
            @foreach ($rows as $row)
            <div class="row mb-4 mt-5">
                @foreach ($row as $plan)
                <div class="col-lg-4 mb-5">
                    <div class="item {{ $plan->best_price === 'yes' ? 'best-price' : '' }}">
                        <div class="badge-hemat">Hemat {{ $plan->hemat_persentase }}%</div>

                        @if ($plan->best_price === 'yes')
                        <div class="badge-best">BEST PRICE</div>
                        @endif

                        <h4>{{ $plan->nama_paket }}</h4>

                        <em style="color: red;">{{ $plan->harga_awal }}</em>

                        <span style=" position: relative; font-size: 38px; white-space: nowrap;">
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

                        @if (!empty($plan->note))
                        <span class="plan-note">
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
            @endforeach
            @endif
        </div>


    </div>
</div>
<!--================== END ==================-->