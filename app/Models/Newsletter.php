<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'newsletter';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'email_newsletter',
    ];
}
