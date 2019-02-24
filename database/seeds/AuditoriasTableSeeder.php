<?php
	
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

use App\Models\Auditor;
use App\Models\Procesos;
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
			$this->procesos = factory(Procesos::class)->times(25)->create();

			//5 Auditorias faker
			$auditorias = factory(Auditoria::class)->times(5)->make()
							->each(function ($auditoria) {
								$auditoria->auditorLider()->associate(factory(Auditor::class)->create());

								$auditoria->save();
								$auditoria->auditoresInternos()->sync( Arr::random($this->auditores->pluck('id')->toArray(), 2 ) );
								
								$aud_procesos = factory(AuditoriaProceso::class)->times(5)->make()
													->each(function ($aud_proceso) use ($auditoria) {
														$aud_proceso->auditoria()->associate($auditoria);
														$aud_proceso->proceso()->associate($this->procesos->first()->id);
														$aud_proceso->auditor()->associate(Arr::random($auditoria->auditoresInternos->pluck('id')->toArray(), 1 )[0]);
														// Log::info($this->procesos->first()->id);
														$aud_proceso->save();
														$this->procesos->shift();
													});
							});


	}
}