<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'user_id' => $faker->userName,
        'nama' => $faker->name,
        'password' => bcrypt('password'), // password
        'alamat' => $faker->address,
        'kota' => $faker->city,
        'user_type' => $faker->randomElement($array = ['admin', 'peserta']),
        'remember_token' => Str::random(10),
    ];
});
