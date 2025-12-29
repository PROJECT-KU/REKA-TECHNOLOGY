<?php

namespace App\Livewire\Pages\Public\Newsletter;

use Livewire\Component;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class NewsletterForm extends Component
{
    public $email_newsletter;
    public $nama;

    // Honeypot
    public $website;

    // Delay anti bot
    public $formLoadedAt;

    public function mount()
    {
        $this->formLoadedAt = now()->timestamp;
    }

    public function submitNewsletter()
    {
        // 1️⃣ Honeypot check
        if (!empty($this->website)) {
            return;
        }

        // 2️⃣ Delay submit (anti bot cepat)
        if (now()->timestamp - $this->formLoadedAt < 3) {
            return;
        }

        // 3️⃣ Rate limit per IP
        $key = 'newsletter:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'email_newsletter' => 'Terlalu banyak percobaan. Silakan coba lagi nanti.',
            ]);
        }

        RateLimiter::hit($key, 60); // 5x / 1 menit

        // 4️⃣ Validasi
        $this->validate([
            'nama' => 'required|string|max:255',
            'email_newsletter' => 'required|email|max:255|unique:newsletter,email_newsletter',
        ]);

        // 5️⃣ Simpan data + IP + browser
        Newsletter::create([
            'id' => (string) Str::uuid(),
            'nama' => $this->nama,
            'email_newsletter' => $this->email_newsletter,
            'ip_address' => request()->ip(),
            'browser' => request()->userAgent(),
        ]);

        // Reset form
        $this->reset(['nama', 'email_newsletter', 'website']);

        // Reset delay agar tidak spam ulang cepat
        $this->formLoadedAt = now()->timestamp;

        $this->dispatch('newsletter-success');
    }

    public function render()
    {
        return view('livewire.pages.public.newsletter');
    }
}
