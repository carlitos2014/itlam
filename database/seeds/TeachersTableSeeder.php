<?php
	
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
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
			$rolTeacher = Role::where('name', 'academico-user')->first();

			//5 Auditorias faker
			$teachers = factory(Teacher::class)->times(50)->make()
							->each(function ($teacher) use ($rolTeacher) {
								$teacher->sede()->associate($this->sedes->random());
								$user = User::create([
									'name' => $teacher->nombres.' '.$teacher->apellidos,
									'username' => mb_strtolower($teacher->nombres.'.'.$teacher->apellidos),
									'email' => $teacher->email,
									'password' => bcrypt('123'),
								]);
								$teacher->user_id = $user->id; //cuando es relacion 1 a 1
								$user->attachRole($rolTeacher);
								$teacher->save();
							});
	}
}