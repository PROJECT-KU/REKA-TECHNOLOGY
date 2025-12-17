<?php

namespace App\Livewire\Pages\Public\Service;

use App\Models\Price;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Serviceform extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        // Livewire Serviceform.php
        $prices = Price::where('status', 'active')->get();
        $bestPrices = $prices->where('best_price', 'yes')->values();
        $others = $prices->where('best_price', '!=', 'yes')->values();

        $rows = collect();
        $othersIndex = 0;
        $bestIndex = 0;

        // loop untuk membuat baris 3 kolom
        while ($othersIndex < $others->count() || $bestIndex < $bestPrices->count()) {
            $row = [];

            // Ambil 1 paket kiri jika ada
            if (isset($others[$othersIndex])) {
                $row[] = $others[$othersIndex];
                $othersIndex++;
            }

            // Ambil 1 paket best_price tengah jika ada
            if (isset($bestPrices[$bestIndex])) {
                $row[] = $bestPrices[$bestIndex];
                $bestIndex++;
            }

            // Ambil 1 paket kanan jika ada
            if (isset($others[$othersIndex])) {
                $row[] = $others[$othersIndex];
                $othersIndex++;
            }

            // Jika row masih kosong (misal tersisa 1 best_price), tetap push
            if (!empty($row)) {
                $rows->push($row);
            }
        }

        return view('livewire.pages.public.serviceform', [
            'rows' => $rows,
        ]);
    }
}
