<?php

namespace App\Services;

interface ConfiguratorProductTypeService
{
    public function create(array $data);

    public function findById(int $id);

    public function delete(int $id);
}
