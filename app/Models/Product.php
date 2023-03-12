<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $attributes = [
        'photo' => 'no_image.jpg',
        'description' => null
    ];

    protected $fillable = [
        'title',
        'article',
        'retail_price',
        'configurator_price',
        'in_stock',
        'description',
        'photo',
        'category_id',
        'product_type_id'
    ];

    public function specifications_values()
    {
        return $this->hasMany(SpecificationValue::class);
    }
}
