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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    $titles = collect([
        '工程师',
        '设计师',
        '行政专员',
        '人事专员',
        '运营专员',
        '产品专员',
    ]);

    return [
        'department_id'  => $faker->numberBetween(1, 10),
        'name'           => $faker->name,
        'title'          => $titles->random(),
        'email'          => $faker->unique()->safeEmail,
        'phone'          => $faker->phoneNumber,
        'duty'           => $faker->sentence,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Department::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->company,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        'department_id' => $faker->numberBetween(1, 10),
        'name'          => $faker->company,
    ];
});
