<?php

namespace App\Services;

interface ConfiguratorService
{
    public function create(array $data, int $product_id_to_configurator);

    public function update(array $data, int $product_id_to_configurator);
}
