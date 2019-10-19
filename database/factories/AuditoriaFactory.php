<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Procesos::class, function (Faker $faker) {
    return [
        'nombre' => $faker->numerify('Proceso ###') ,
        'responsable' => $faker->name,
        'email'  => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\Models\Auditor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'email'  => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\Models\Auditoria::class, function (Faker $faker) {
    $fecha = Carbon::instance($faker->dateTimeBetween('-3 month','+ 3 month'));
    return [
        'fecha' => $fecha,
        'lugar' => $faker->name,
        'objetivos' => $faker->paragraph,
        'alcances' => $faker->paragraph,
        'criterios' => $faker->paragraph,
        'observaciones' => $faker->paragraph,
        'fecha_apertura' => $fecha->addDays(3),
        'lugar_apertura' => $faker->name,
        'fecha_cierre' => $fecha->addDays(6),
        'lugar_cierre' => $faker->name,
    ];
});

$factory->define(App\Models\AuditoriaProceso::class, function (Faker $faker) {
    $fecha = Carbon::instance($faker->dateTimeBetween('-1 month','+ 1 month'));
	$time = Carbon::now()->setTimeFromTimeString($faker->time);
    return [
        'fecha' => $fecha,
        'hora_inicio' => $time->toTimeString(),
        'hora_fin' => $time->addHours(2)->toTimeString(),
        'estado' => $faker->randomElement(['PENDIENTE', 'CUMPLIDA', 'REPROGRAMADA', 'APLAZADA']),
    ];
});
