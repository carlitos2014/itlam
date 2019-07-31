<?php
	
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

use App\Models\Firma;

class FirmasTableSeeder extends Seeder {

	private $auditores = null;
	private $procesos = null;

	public function run() {

		$date = \Carbon\Carbon::now()->toDateTimeString();

		//*********************************************************************
		$this->command->info('--- Seeder Creación de Firmas prueba');

		$firmas = [
	        ['cargo'=>'Coordinador de Calidad',  'filename'=>'firma_1.png' ],
	        ['cargo'=>'Alta Dirección',          'filename'=>'firma_2.jpg' ],
		];

		foreach ($firmas as $firma) {
			Firma::create($firma);
		}

	}
}