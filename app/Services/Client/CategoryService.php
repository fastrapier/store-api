<?php


namespace App\Services\Client;

interface CategoryService
{
    public function findAll();

    public function findById(int $id, array $validated);
}
