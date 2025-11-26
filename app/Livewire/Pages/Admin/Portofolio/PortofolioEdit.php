<?php

namespace App\Livewire\Pages\Admin\Portofolio;

use App\Models\Portofolio;
use Livewire\Component;
use Livewire\Attributes\Layout;

class PortofolioEdit extends Component
{
    public Portofolio $Portofolio;

    public function mount(Portofolio $Portofolio)
    {
        $this->Portofolio = $Portofolio;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.admin.portofolio.portofolio-edit', [
            'Portofolio' => $this->Portofolio,
        ]);
    }
}
