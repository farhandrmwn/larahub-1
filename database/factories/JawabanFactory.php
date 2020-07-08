<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jawaban;
use Faker\Generator as Faker;

$factory->define(Jawaban::class, function (Faker $faker) {
    return [
        'user_id' => $faker->biasedNumberBetween($min = 1, $max = 5),
        'pertanyaan_id' => $faker->biasedNumberBetween($min = 1, $max = 5),
        'isi' => $faker->paragraph(),
        'created_at' => now()
    ];
});
