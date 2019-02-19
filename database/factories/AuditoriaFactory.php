<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Procesos::class, function (Faker $faker) {
    return [
        'nombre' => $faker->numerify('Proceso ###') ,
        'responsable' => $faker->name,
    ];
});

$factory->define(App\Models\Auditor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});

$factory->define(App\Models\Auditoria::class, function (Faker $faker) {
    return [
        'fecha' => $faker->dateTime,
        'lugar' => $faker->name,
        'objetivos' => $faker->paragraph,
        'alcances' => $faker->paragraph,
        'criterios' => $faker->paragraph,
        'observaciones' => $faker->paragraph,
    ];
});

$factory->define(App\Models\AuditoriaProceso::class, function (Faker $faker) {
	$time = $faker->time;
    return [
        'fecha' => $faker->date,
        'hora_inicio' => $time,
        'hora_fin' => '23:59:59',
    ];
});
