<?php

namespace App\Livewire\Pages\Admin\CategoriesPrice;

use Livewire\Component;
use Livewire\Attributes\Layout;

class CategoriesPriceCreate extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.admin.categories-price.categories-price-create');
    }
}
