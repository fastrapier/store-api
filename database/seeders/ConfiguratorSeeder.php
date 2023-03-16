<?php

namespace Database\Seeders;

use App\Models\ConfiguratorProduct;
use Illuminate\Database\Seeder;

class ConfiguratorSeeder extends Seeder
{
    public function run(): void
    {
        ConfiguratorProduct::factory(10)->create();
    }
}
