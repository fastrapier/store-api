<?php

namespace App\Services;

interface OrderService
{
    public function findAll();

    public function findById(int $id);

    public function create(array $validated);

    public function update(array $validated, int $id);

    public function delete(int $id);
}
