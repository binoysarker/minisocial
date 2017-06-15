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

    return [
        'name' => $faker->name,
        'username' => $faker->word,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
// model section for article section
$factory->define(App\Article::class, function (Faker\Generator $faker) {
    

    return [
        'user_id' => App\User::all()->random()->id ,
        'live' => $faker->boolean(),
        'post_on' => Carbon\Carbon::parse('+1 weak') ,
        'content' => $faker->paragraph(10) ,
        
    ];
});
