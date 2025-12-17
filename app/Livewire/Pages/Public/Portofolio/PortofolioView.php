<?php

namespace App\Livewire\Pages\Public\Portofolio;

use App\Models\Price;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Portofolio;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PortofolioView extends Component
{
    #[Layout('layouts.guest')]

    public function render()
    {
        return view('livewire.pages.public.portofolio-view', [
            'portofolios' => Portofolio::latest()->get(),
        ]);
    }
}
