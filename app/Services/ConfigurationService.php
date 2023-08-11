<?php

namespace App\Services;

use App\Models\Configuration;
use App\Models\ProductType;

interface ConfigurationService
{
    public function store(array $validated, ProductType $productType);

    public function update(array $validated, ProductType $productType, Configuration $configuration);

    public function destroy(Configuration $configuration);
}
