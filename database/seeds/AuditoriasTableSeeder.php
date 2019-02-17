<?php
	
use Illuminate\Database\Seeder;
use App\Models\Auditor;
use App\Models\Auditoria;

class AuditoriasTableSeeder extends Seeder {


	public function run() {

		$pass = '123';
		$date = \Carbon\Carbon::now()->toDateTimeString();
		//$faker = Faker\Factory::create('es_ES');

		//*********************************************************************
		$this->command->info('--- Seeder Creación de Auditorías prueba');

			//5 Auditores faker
			$auditores = factory(Auditor::class)->times(5)->create();

			//5 Auditorias faker
			$auditorias = factory(Auditoria::class)->times(5)->make()
							->each(function ($model) {
				                $model->auditorLider()->associate(factory(Auditor::class)->create());
				                $model->save();
				            });


	}
}