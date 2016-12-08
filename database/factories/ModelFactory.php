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
        'email' => "genti.sp@gmail.com",
        'password' => bcrypt("gs1234"),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Movie::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->realText(20),
        'date' => $faker->date(),
        'lead' => $faker->realText(),
        'description' => $faker->realText(),
        'poster' => 'MV5BMTExMzU0ODcxNDheQTJeQWpwZ15BbWU4MDE1OTI4MzAy._V1_SY1000_CR0,0,640,1000_AL_.jpg',
        'highlight_image' => 'ArrivalShip.png',
        'status' => $faker->randomElement(['Coming', 'Active', 'Gone'])
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'headline' => $faker->realText(30),
        'lead' => $faker->realText(200),
        'publish_date' => $faker->dateTime(),
        'body' => $faker->realText(1000),
        'image' => 'GFGTEEEFPRG51479950028462.png'
    ];
});
