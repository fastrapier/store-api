<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'specification_id',
        'product_id'
    ];

    public function specification()
    {
        return $this->belongsTo(Specification::class);
    }
}
