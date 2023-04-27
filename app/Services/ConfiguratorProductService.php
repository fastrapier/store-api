<?php

namespace App\Services;

interface ConfiguratorProductService
{
    public function create(array $data);

    public function delete(int $id);
}
