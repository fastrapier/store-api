<?php

namespace App\Services;

use App\Models\Delivery;

interface DeliveryService
{
    public function findAll();

    public function findById(Delivery $delivery);

    public function create(array $validated);

    public function update(array $validated, Delivery $delivery);

    public function delete(Delivery $delivery);
}
