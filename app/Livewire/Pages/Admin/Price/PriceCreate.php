<?php

namespace App\Livewire\Pages\Admin\Price;

use Livewire\Component;
use Livewire\Attributes\Layout;

class PriceCreate extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.admin.price.Price-create');
    }
}
