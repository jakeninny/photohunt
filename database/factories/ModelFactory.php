<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Mission::class, function ($faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(1),
        'user_id' => rand(1,5),
        'image' => $faker->imageUrl(1000,1000)
    ];
});

$factory->define(App\Attempt::class, function ($faker) {
    return [
        'mission_id' => rand(1, 5),
        'user_id' => rand(1, 5),
        'image' => $faker->imageUrl(1170, 1170),
        'status' => $faker->randomElement(['success', 'almost', 'miss', 'unchecked'])
    ];
});