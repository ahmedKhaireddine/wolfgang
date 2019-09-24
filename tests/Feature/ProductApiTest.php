<?php

namespace Tests\Feature;

use App\Models\Products;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;



class ProductApiTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_create_article()
    {
        $data= [
            'name' => $this->faker->word, 
            'reference' => $this->faker->ean8, 
            'picture' => UploadedFile::fake()->image('avatar.jpg'), 
            'price' => $this->faker->randomFloat($nbMaxDecimals = 8, $min = 0, $max = 8000), 
            'description' => $this->faker->text($maxNbChars = 200),
        ];
        $this->json('POST', '/articles', $data)
            ->assertStatus(201)
            ->assertJson($data);

    }
    /** @test */
    public function test_can_update_post() {
        $product = factory(Products::class)->create();
        $data= [
            'name' => $this->faker->word, 
            'reference' => $this->faker->ean8, 
            'picture' => UploadedFile::fake()->image('avatar.jpg'), 
            'price' => $this->faker->randomFloat($nbMaxDecimals = 8, $min = 0, $max = 8000), 
            'description' => $this->faker->text($maxNbChars = 200),
        ];
        $this->put(route('articles.update', $product->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    /** @test */
    public function can_list_articles() {

        $products = factory(Products::class, 2)->create()->map(function ($product) {
            return $product->only(['id', 'name', 'reference']);
        });

        $this->get(route('articles.index'))
            ->assertStatus(200)
            ->assertJson($products)
            ->assertJsonStructure([
                '*' => [ 'id', 'title', 'content' ],
            ]);

    }

    /** @test*/    
    public function can_show_articles() {
        $product = factory(Products::class)->create();
        $this->get(route('articles.show', $product->id))
            ->assertStatus(200);
    }

    /** @test*/
    public function can_delete_articles() {

        $product = factory(Products::class)->create();
        $this->delete(route('articles.destroy', $product->id))
            ->assertStatus(200);
    }

}

