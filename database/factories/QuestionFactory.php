<?php

use Faker\Generator as Faker;

$factory->define(ModuleBasedTraining\Question::class, function (Faker $faker) {
    return [
        'module_id' => $faker->numberBetween(1,10),
        'text' => $faker->sentence(5),
        'a1text' => $faker->word,
        'a2text' => $faker->word,
        'a3text' => $faker->word,
        'a4text' => $faker->word,
        'correct' => $faker->numberBetween(1,4),
    ];
});
