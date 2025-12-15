<?php

namespace App\Livewire\Pages\Public\Homepage;

use App\Models\Price;
use App\Models\Project;
use App\Models\Portofolio;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        // Ambil semua paket aktif yang ditampilkan di homepage
        $plans = Price::where('status', 'active')
            ->where('show_homepage', 'yes')
            ->get();

        // Pisahkan best price & lainnya
        $bestPrice = $plans->where('best_price', 'yes')->first();
        $others    = $plans->where('best_price', '!=', 'yes')->values();

        // Susun agar best price di tengah
        $orderedPlans = collect();

        if ($others->count() > 0) {
            $orderedPlans->push($others->get(0)); // kiri
        }

        if ($bestPrice) {
            $orderedPlans->push($bestPrice); // tengah (BEST PRICE)
        }

        if ($others->count() > 1) {
            $orderedPlans->push($others->get(1)); // kanan
        }

        return view('livewire.pages.public.homepage', [
            'plans'    => $orderedPlans,
            'project' => Project::where('status', 'active')->get(),
            'portofolios' => Portofolio::latest()->take(12)->get(),
        ]);
    }
}
