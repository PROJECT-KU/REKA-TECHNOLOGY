<?php

namespace App\Livewire\Pages\Public\Contact;

use App\Models\Price;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Portofolio;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ContactForm extends Component
{
    #[Layout('layouts.guest')]
    public $nama, $telp, $email, $pesan;

    protected $rules = [
        'nama'    => 'required|string|max:255',
        'telp' => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'pesan' => 'required',
    ];

    public function render()
    {
        return view('livewire.pages.public.contact-form');
    }

    public function submitContact()
    {
        $this->validate();

        Contact::create([
            'nama'    => $this->nama,
            'telp' => $this->telp,
            'email'   => $this->email,
            'pesan' => $this->pesan,
        ]);

        $this->reset();

        $this->dispatch('contact-success');
    }
}
