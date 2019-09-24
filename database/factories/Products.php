<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'name' => $faker->word, 
        'reference' => $faker->ean8, 
        'picture' => 'http://localhost:8888/cours-laravel/Wolfgang/public/uploads/images/moto6_1568025017.jpg', 
        'price' => $faker->randomFloat($nbMaxDecimals = 8, $min = 0, $max = 8000), 
        'description' => $faker->text($maxNbChars = 200),
    ];
});
