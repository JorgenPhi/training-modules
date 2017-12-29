<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $admin;
    static $active;
    static $password;

    return [
        'name' => $faker->name,
        'company' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'admin' => $admin ?: $admin = false,
        'active' => $active ?: $active = false,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
