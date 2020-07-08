<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pertanyaan;
use Faker\Generator as Faker;

$factory->define(Pertanyaan::class, function (Faker $faker) {
    return [
        'user_id' => $faker->biasedNumberBetween($min = 1, $max = 5),
        'judul' => $faker->sentence(),
        'isi' => $faker->paragraph(),
        'tag' => $faker->word(),
        'created_at' => now()
    ];
});
