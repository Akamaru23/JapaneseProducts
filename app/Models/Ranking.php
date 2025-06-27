<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table = 'ranking';

    protected $fillable =
    [
        'rank',
        'Prefecture',
        'products_name',
        'products_img',
        'description',
        'url',
    ];

    use HasFactory;
}
