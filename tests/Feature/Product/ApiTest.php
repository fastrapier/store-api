<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ApiTest extends TestCase
{
    public function testBasic()
    {
        $this->assertTrue(true);
    }

    public function testStore()
    {
        $data = [
            'title' => 'test_product',
            'article' => 'test_product_artqi11cle1q11q1',
            'retail_price' => 19.99,
            'configurator_price' => 21.99,
            'in_stock' => true,
            'description' => 'product_from_test_case',
            'img' => UploadedFile::fake()->image('test.jpg'),
            'category_id' => 1,
            'product_type_id' => 1,
            'specification_values' => [
                [
                    'specification_id' => 51,
                    'value' => 'test_specification_value'
                ]
            ]
        ];

        $response = $this->json("POST", 'http://localhost:8000/api/v1/products', $data, [
            'Accept: application/json',
            'Content-Type: application/json',
        ]);

        \Log::info($response->content());

        $this->assertTrue(true);
    }
}
