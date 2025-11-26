<?php

namespace App\Livewire\Pages\Admin\Price;

use App\Models\Price;
use Livewire\Component;
use Livewire\Attributes\Layout;

class PriceEdit extends Component
{
    public Price $Price;

    public function mount(Price $Price)
    {
        $this->Price = $Price;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.admin.price.price-edit', [
            'Price' => $this->Price,
        ]);
    }
}
