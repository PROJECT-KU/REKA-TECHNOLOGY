<?php

namespace App\Livewire\Pages\Public\Contact;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ContactForm extends Component
{
    #[Layout('layouts.guest')]
    public $nama, $telp, $email, $pesan;

    protected $rules = [
        'nama'  => 'required|string|max:255',
        'telp'  => 'required|string|max:255',
        'email' => 'required|email|max:255',
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
            'nama'       => $this->nama,
            'telp'       => $this->telp,
            'email'      => $this->email,
            'pesan'      => $this->pesan,
            'ip_address' => request()->ip(),
            'browser'    => request()->userAgent(),
        ]);

        $this->reset();

        $this->dispatch('contact-success');
    }
}
