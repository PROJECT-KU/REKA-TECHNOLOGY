<?php

namespace App\Livewire\Pages\Admin\CategoriesPrice;

use App\Models\CategoriesPrice;
use Livewire\Component;
use Livewire\Attributes\Layout;

class CategoriesPriceEdit extends Component
{
    public CategoriesPrice $CategoriesPrice;

    public function mount(CategoriesPrice $CategoriesPrice)
    {
        $this->CategoriesPrice = $CategoriesPrice;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.admin.categories-price.categories-price-edit', [
            'CategoriesPrice' => $this->CategoriesPrice,
        ]);
    }
}
