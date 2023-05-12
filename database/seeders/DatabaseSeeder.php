<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Specification;
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
//        ProductType::factory(30)->create();
//        Category::factory(10)->hasChildren(5)->hasProducts(50)->create();
//        Product::factory(500)->create();
//
//        Specification::factory(50)->create();
//
//        SpecificationValue::factory(50)->create();

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
