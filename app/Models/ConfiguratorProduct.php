<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConfiguratorProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'configurator_product_type_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function product_type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function configurator_product_type(): BelongsTo
    {
        return $this->belongsTo(ConfiguratorProductType::class);
    }
}
