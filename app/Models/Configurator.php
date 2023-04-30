<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Configurator extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function configuratorProductType(): HasMany
    {
        return $this->hasMany(ConfiguratorProductType::class);
    }
}
