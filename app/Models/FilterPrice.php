<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterPrice extends Model
{
    use HasFactory;

    protected $table = 'filter_price';
    protected $fillable = [
        'price_min',
        'price_max',
        
    ];
}
