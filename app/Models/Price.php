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
        'categories_price_id',
        'nama_paket',
        'harga_awal',
        'harga_promo',
        'hemat_persentase',
        'best_price',
        'start_from',
        'show_homepage',
        'deskripsi',
        'note',
        'status',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
