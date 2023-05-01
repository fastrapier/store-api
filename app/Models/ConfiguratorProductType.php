<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ConfiguratorProductType extends Model
{

    use HasFactory;

    protected $fillable = [
        'configurator_id',
        'product_type_id'
    ];

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(ConfiguratorProduct::class);
    }
}
