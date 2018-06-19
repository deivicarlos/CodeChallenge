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

// $table->increments('id');
//             $table->string('first_name');
//             $table->string('last_name');
//             $table->string('name');
//             $table->string('email');
//             $table->date('date_of_birth');
//             $table->boolean('is_host');
//             $table->decimal('latitude',9,6);
//             $table->decimal('longitude',9,6);

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(10)), // secret
        'remember_token' => str_random(10),
    ];
});
