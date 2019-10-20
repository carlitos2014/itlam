<?php
	
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

use App\Models\Auditor;
use App\Models\Proceso;
use App\Models\Auditoria;
use App\Models\AuditoriaProceso;

class AuditoriasTableSeeder extends Seeder {

	private $auditores = null;
	private $procesos = null;

	public function run() {

		$date = \Carbon\Carbon::now()->toDateTimeString();

		//*********************************************************************
		$this->command->info('--- Seeder Creación de Auditorías prueba');

			//5 Auditores faker
			$this->auditores = factory(Auditor::class)->times(5)->create();
			//$this->procesos = factory(Proceso::class)->times(25)->create();

			$procesos = [
				['nombre'=>'Dirección Pedagógica', 'responsable'=>'Pepe1', 'email'=>'correo1@test.com'],
				['nombre'=>'Coordinación',         'responsable'=>'Pepe2', 'email'=>'correo2@test.com'],
				['nombre'=>'Psicología',           'responsable'=>'Pepe3', 'email'=>'correo3@test.com'],
				['nombre'=>'Salud Ocupacional',    'responsable'=>'Pepe4', 'email'=>'correo4@test.com'],
    		];

			$this->procesos = collect();
    		foreach ($procesos as $proc) {
				$this->procesos->push(Proceso::create($proc));
    		}

			//5 Auditorias faker
			$auditorias = factory(Auditoria::class)->times(10)->make()
							->each(function ($auditoria) {
								$auditoria->auditorLider()->associate(factory(Auditor::class)->create());

								$auditoria->save();
								$auditoria->auditoresInternos()->sync( Arr::random($this->auditores->pluck('id')->toArray(), 2 ) );
								
								$aud_procesos = factory(AuditoriaProceso::class)->times(5)->make()
													->each(function ($aud_proceso) use ($auditoria) {
														$aud_proceso->auditoria()->associate($auditoria);
														$aud_proceso->proceso()->associate($this->procesos->random());
														$aud_proceso->auditor()->associate(Arr::random($auditoria->auditoresInternos->pluck('id')->toArray(), 1 )[0]);
														// Log::info($this->procesos->first()->id);
														$aud_proceso->save();
														//$this->procesos->shift();
													});
							});


	}
}