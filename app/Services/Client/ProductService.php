<?php


namespace App\Services\Client;

interface ProductService
{
    public function findAll();

    public function findById(int $id);
}
