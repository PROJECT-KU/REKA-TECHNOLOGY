<?php

namespace App\Livewire\Pages\Public\Portofolio;

use App\Models\Portofolio;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PortofolioDetail extends Component
{
    #[Layout('layouts.guest')]

    public $portofolio;

    public function mount($id)
    {
        $this->portofolio = Portofolio::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pages.public.portofolio-detail', [
            'portofolio' => $this->portofolio
        ]);
    }
}
