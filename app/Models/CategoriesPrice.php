<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class CategoriesPrice extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'categories_price';

    protected $fillable = [
        'categories',
        'slug',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * RELASI: 1 Kategori → Banyak Price
     */
    public function prices()
    {
        return $this->hasMany(Price::class, 'categories_price_id');
    }
}
