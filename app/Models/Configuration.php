<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_type_id',
        'is_divided',
        'configuration_product_type_id'
    ];

    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function selectedProductType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'configuration_product_type_id');
    }
}
