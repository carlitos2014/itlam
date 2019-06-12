<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Teacher::class, function (Faker $faker) {
    return [
        'nombres'=>$faker->firstName(),
        'apellidos'=>$faker->lastName,
        'telefono'=>$faker->text(15),
        'email'   =>$faker->unique()->safeEmail,
    ];
});
