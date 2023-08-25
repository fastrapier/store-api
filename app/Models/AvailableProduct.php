<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AvailableProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'available_product_id',
        'configuration_id',
        'for_product_id'
    ];

    public function configuration(): BelongsTo
    {
        return $this->belongsTo(Configuration::class, 'configuration_id');
    }

    public function forProduct() {
        return $this->belongsTo(Product::class, 'for_product_id');
    }
    public function availableProduct() {
        return $this->belongsTo(Product::class, 'available_product_id');
    }
}
