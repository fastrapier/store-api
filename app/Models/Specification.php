<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_type_id'
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function specification_values()
    {
        return $this->hasMany(SpecificationValue::class);
    }
}
