<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguratorProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'configurator_product_type_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_type()
    {
        return $this->belongsTo(ConfiguratorProductType::class);
    }

}
