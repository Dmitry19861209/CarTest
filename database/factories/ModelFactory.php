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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\CarModel::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'alias' => $faker->name,
        'actuality' => $faker->numberBetween(0, 1),
    ];
});

$factory->define(App\Models\CarModelService::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => (string) $faker->numberBetween(5000, 10000),
        'model_id' => factory(App\Models\CarModel::class)->create()->id,
    ];
});
