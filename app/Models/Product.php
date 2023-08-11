<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $attributes = [
        'img' => '/some/path/to/image/no_image.jpg',
        'description' => null
    ];

    protected $fillable = [
        'title',
        'article',
        'retail_price',
        'configurator_price',
        'in_stock',
        'description',
        'img',
        'category_id',
        'product_type_id',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function specification_values(): HasMany
    {
        return $this->hasMany(SpecificationValue::class);
    }

    public function availableProducts(): HasMany
    {
        return $this->hasMany(AvailableProduct::class, 'for_product_id');
    }

    public function platform(): HasMany
    {
        return $this->hasMany(Platform::class, 'product_id');
    }
}
