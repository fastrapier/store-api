<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductTypeSeeder::class,
            SpecificationSeeder::class,
            ProductSeeder::class,
            SpecificationValueSeeder::class,
        ]);
    }
}
