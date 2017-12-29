<?php

use Faker\Generator as Faker;

$factory->define(App\Module::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'body' => $faker->paragraph(5, true),
    ];
});
