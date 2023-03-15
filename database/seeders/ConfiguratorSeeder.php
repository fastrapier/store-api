<?php

namespace Database\Seeders;

use App\Models\ConfiguratorProducts;
use Illuminate\Database\Seeder;

class ConfiguratorSeeder extends Seeder
{
    public function run(): void
    {
        ConfiguratorProducts::factory(10)->create();
    }
}
