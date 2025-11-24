<?php

namespace App\Livewire\Pages\Public\Homepage;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.public.homepage');
    }
}
