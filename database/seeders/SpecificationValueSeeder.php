<?php

namespace Database\Seeders;

use App\Models\SpecificationValue;
use Illuminate\Database\Seeder;

class SpecificationValueSeeder extends Seeder
{
    public function run(): void
    {
        SpecificationValue::factory(40)->create();
    }
}
