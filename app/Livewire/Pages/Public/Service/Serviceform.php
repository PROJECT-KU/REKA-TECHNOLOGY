<?php

namespace App\Livewire\Pages\Public\Service;

use App\Models\Price;
use App\Models\CategoriesPrice;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Serviceform extends Component
{
    #[Layout('layouts.guest')]

    public $selectedCategory = null; // SLUG kategori aktif
    public $categories = [];
    public $searchPrice = '';

    protected $queryString = [
        'selectedCategory' => ['except' => ''],
        'searchPrice' => ['except' => ''],
    ];

    public function mount()
    {
        $this->categories = CategoriesPrice::orderBy('categories')->get();

        $this->selectedCategory = request('selectedCategory');
        $this->searchPrice = request('searchPrice');

        // VALIDASI SLUG
        if ($this->selectedCategory) {
            $exists = CategoriesPrice::where('slug', $this->selectedCategory)->exists();
            if (!$exists) {
                $this->selectedCategory = null;
            }
        }
    }

    public function render()
    {
        $query = Price::where('status', 'active');

        /* =========================
           FILTER KATEGORI (SLUG)
        ========================= */
        if ($this->selectedCategory) {
            $categoryId = CategoriesPrice::where('slug', $this->selectedCategory)->value('id');

            if ($categoryId) {
                $query->where('categories_price_id', $categoryId);
            }
        }

        /* =========================
           FILTER SEARCH
        ========================= */
        if (!empty($this->searchPrice)) {

            $searchNumber = preg_replace('/[^0-9]/', '', $this->searchPrice);
            $searchText = $this->searchPrice;

            $query->where(function ($q) use ($searchNumber, $searchText) {

                // TEXT
                $q->where('nama_paket', 'like', "%{$searchText}%")
                    ->orWhere('deskripsi', 'like', "%{$searchText}%")
                    ->orWhere('note', 'like', "%{$searchText}%");

                // HARGA RUPIAH
                if ($searchNumber !== '') {
                    $q->orWhereRaw(
                        "REPLACE(REPLACE(REPLACE(harga_awal, 'Rp', ''), '.', ''), ' ', '') LIKE ?",
                        ["%{$searchNumber}%"]
                    )
                        ->orWhereRaw(
                            "REPLACE(REPLACE(REPLACE(harga_promo, 'Rp', ''), '.', ''), ' ', '') LIKE ?",
                            ["%{$searchNumber}%"]
                        );
                }
            });
        }

        $prices = $query->get();

        /* =========================
           BEST PRICE LAYOUT
        ========================= */
        $bestPrices = $prices->where('best_price', 'yes')->values();
        $others = $prices->where('best_price', '!=', 'yes')->values();

        $rows = collect();
        $o = 0;
        $b = 0;

        while ($o < $others->count() || $b < $bestPrices->count()) {
            $row = [];

            if (isset($others[$o])) $row[] = $others[$o++];
            if (isset($bestPrices[$b])) $row[] = $bestPrices[$b++];
            if (isset($others[$o])) $row[] = $others[$o++];

            if ($row) $rows->push($row);
        }

        return view('livewire.pages.public.serviceform', [
            'rows' => $rows,
            'categories' => $this->categories,
        ]);
    }
}
