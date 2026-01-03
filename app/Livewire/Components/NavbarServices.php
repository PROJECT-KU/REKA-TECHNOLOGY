<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\CategoriesPrice;

class NavbarServices extends Component
{
    public $categories = [];

    // ⬅️ mount DIPANGGIL SEKALI
    public function mount()
    {
        $this->categories = CategoriesPrice::orderBy('categories')->get();
    }

    public function render()
    {
        return view('layouts.guest');
    }
}
