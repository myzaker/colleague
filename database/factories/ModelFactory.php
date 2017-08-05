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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Department::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->company,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Staff::class, function (Faker\Generator $faker) {
    return [
        'department_id' => $faker->numberBetween(1, 10),
        'name'          => $faker->name,
        'title'         => $faker->title,
    ];
});
