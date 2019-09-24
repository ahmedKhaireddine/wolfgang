<?php

namespace Tests\Feature;

use App\Models\Products;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;


class ProductTest extends TestCase
{
     use RefreshDatabase;
    /** @test */
    public function can_list_products()
    {
        $products = factory(Products::class, 1)->create();
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
    }

    /** @test */
    public function can_create_route(){
        $response = $this->get(route('products.create'));
        $response->assertStatus(200);
        $response->assertViewIs('products.create');
    }
    
    /** @test */
    public function can_create_product() {
        $data= [
            '_token'=> csrf_token(),
            'name' => $this->faker->word, 
            'reference' => $this->faker->ean8, 
            'picture' => UploadedFile::fake()->image('avatar.jpg'), 
            'price' => $this->faker->randomFloat($nbMaxDecimals = 8, $min = 0, $max = 8000), 
            'description' => $this->faker->text($maxNbChars = 200),
        ];

        $response = $this->post(route('products.store'), $data);
        $response->assertStatus(200);
        $response->assertRedirect(route('products.index'));

    }

    /** @test */
    public function can_edit_product(){
        $product = factory(Products::class)->create();
        $response = $this->get(route('products.edit', $product->id));
        $response->assertStatus(200);
        $response->assertViewIs('products.edit');
    }

    /** @test */
    public function can_update_product() {
        $product = factory(Products::class)->create();
        $data= [
            '_token'=> csrf_token(),
            'name' => $this->faker->word, 
            'reference' => $this->faker->ean8, 
            'picture' => UploadedFile::fake()->image('avatar.jpg'), 
            'price' => $this->faker->randomFloat($nbMaxDecimals = 8, $min = 0, $max = 8000), 
            'description' => $this->faker->text($maxNbChars = 200),
        ];
        $response = $this->put(route('products.update', $product->id), $data);
        $response->assertStatus(200);
        $response->assertRedirect(route('products.show'));
    }

    /** @test */
    public function can_delete_product() {
        $product = factory(Products::class)->create();
        $response = $this->delete(route('products.destroy', $product->id));
        $response->assertStatus(200);
    }
    
}
