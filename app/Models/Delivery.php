<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'name',
        'description',
        'cost',
        'categories',
        'categories_price',
        'position',
        'is_active'
    ];
}
