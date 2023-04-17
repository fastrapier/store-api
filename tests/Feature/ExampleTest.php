<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_category_image_upload(): void
    {
        $file = UploadedFile::fake()->image('test.jpg');


        $response = $this->json("POST", 'http://localhost:8000/api/v1/categories', [
            'img' => $file,
            'name' => 'test'
        ], [
            'Accept: application/json',
            'Content-Type: application/json'
        ]);

        $json = json_decode($response->getContent(), true);
        \Log::info($response->content());
        self::assertNotEmpty($json['data']['img']);
    }

    public function test_storage_link()
    {
        $url = Storage::url('images\categories\KD0Z13KjiZxdLDm7MO1rXHqRmm5JFLavWg9kru4L.jpg');

        \Log::info($url);
    }
}
