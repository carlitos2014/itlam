<?php
	
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Teacher;
use App\Models\sedes;

class TeachersTableSeeder extends Seeder {

	private $auditores = null;
	private $procesos = null;

	public function run() {

		$date = \Carbon\Carbon::now()->toDateTimeString();

		//*********************************************************************
		$this->command->info('--- Seeder Creación de Teachers prueba');

			//5 Auditores faker
			$this->sedes = factory(sedes::class)->times(10)->create();

			//5 Auditorias faker
			$teachers = factory(Teacher::class)->times(50)->make()
							->each(function ($teacher) {
								$teacher->sede()->associate($this->sedes->random());
								$user = factory(User::class)->create();
								$teacher->user_id = $user -> id; //cuando es relacion 1 a 1
								$teacher->save();
							});
	}
}