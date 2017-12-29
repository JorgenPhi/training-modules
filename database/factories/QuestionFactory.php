<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    static $module_id;

    return [
        'module_id' => $module_id?: $module_id = 1,
        'text' => $faker->sentence(5),
        'a1text' => $faker->word,
        'a2text' => $faker->word,
        'a3text' => $faker->word,
        'a4text' => $faker->word,
        'correct' => $faker->numberBetween(1,4),
    ];
});
