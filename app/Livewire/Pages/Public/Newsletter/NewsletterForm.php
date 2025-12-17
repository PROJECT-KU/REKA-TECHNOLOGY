<?php

namespace App\Livewire\Pages\Public\Newsletter;

use Livewire\Component;
use App\Models\Newsletter;
use Illuminate\Support\Str;

class NewsletterForm extends Component
{
    public $email_newsletter;

    public function submitNewsletter()
    {
        $this->validate([
            'email_newsletter' => 'required|email|max:255',
        ]);

        Newsletter::create([
            'id' => Str::uuid(),
            'email_newsletter' => $this->email_newsletter,
        ]);

        $this->reset('email_newsletter');

        $this->dispatch('newsletter-success');
    }

    public function render()
    {
        return view('livewire.pages.public.newsletter');
    }
}
