<?php

namespace App\Services;

interface SpecificationService
{
    public function findAll();

    public function findById(int $id);

    public function create(array $validated);

    public function update(array $validated, int $id);

    public function delete(int $id);
}
