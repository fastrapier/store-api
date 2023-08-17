<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\SpecificationValue;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        ProductType::factory(5)->hasSpecifications(5)->hasProducts(10)->hasConfigurations(5)->create();
        SpecificationValue::factory(25)->create();

        User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@mail.ru',
            'phone' => '+79656287261',
            'role' => 'admin',
            'last_name' => 'admin'
        ]);
    }
}
