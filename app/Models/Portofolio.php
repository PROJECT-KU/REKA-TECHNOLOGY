<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'portofolio';

    protected $fillable = [
        'nama_project',
        'nama_customer',
        'link_url',
        'deskripsi',
        'gambar'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
