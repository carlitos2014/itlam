<?php

use Faker\Generator as Faker;

$factory->define(App\Models\sedes::class, function (Faker $faker) {
    return [
        'nombre'   =>$faker->city,
        'direccion'=>$faker->streetAddress,
        'telefono' =>$faker->text(15),
        'web'      =>$faker->url,
        'email'    =>$faker->unique()->safeEmail,
    ];
});
