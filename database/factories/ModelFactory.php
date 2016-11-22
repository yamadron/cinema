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

$factory->define(App\Movie::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->realText(20),
        'date' => $faker->date(),
        'description' => $faker->realText(),
        'poster' => 'arrival.jpg',
        'highlight_image' => $faker->randomElement(['fantasticbeasts.jpg', 'transformers_final_standee.jpg', 'arrivalhighlight.jpg']),
        'status' => $faker->randomElement(['coming', 'active', 'gone'])
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'headline' => $faker->realText(30),
        'lead' => $faker->realText(200),
        'publish_date' => $faker->dateTime(),
        'body' => $faker->realText(1000),
        'image' => 'doctorstrange.jpg'
    ];
});
