<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'price';

    protected $fillable = [
        'nama_paket',
        'harga_awal',
        'harga_promo',
        'hemat_persentase',
        'best_price',
        'show_homepage',
        'deskripsi',
        'status',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
