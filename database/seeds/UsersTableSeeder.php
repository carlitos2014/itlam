<?php
	
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {


	public function run() {

		$pass = '123';
		$date = \Carbon\Carbon::now()->toDateTimeString();
		//$faker = Faker\Factory::create('es_ES');

		//*********************************************************************
		$this->command->info('--- Seeder Creación de Usuarios prueba');

			//Admin
			$admin = User::firstOrcreate( [
				'name' => 'Administrador',
				'username' => 'admin',
				'email' => 'admin@itlam.com',
				'password'  => \Hash::make($pass),
			]);

			//Owner
			$owner = User::create( [
				'name' => 'Owner',
				'username' => 'owner',
				'email' => 'owner@itlam.com',
				'password'  => \Hash::make($pass),
			]);

			//5 usuarios faker
			$users = factory(User::class)->times(5)->create();


	}
}