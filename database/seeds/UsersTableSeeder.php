<?php
	
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UsersTableSeeder extends Seeder {

	private $rolOwner;
	private $rolAdmin;
	private $rolEmpleado;


	public function run() {

		$pass = '123';
		$date = \Carbon\Carbon::now()->toDateTimeString();
		//$faker = Faker\Factory::create('es_ES');

		//*********************************************************************
		$this->command->info('--- Seeder Creación de Roles');

			$this->rolOwner = Role::create([
				'name'         => 'owner',
				'display_name' => 'Project Owner',
				'description'  => 'User is the owner of a given project',
			]);
			$this->rolAdmin = Role::create([
				'name'         => 'admin',
				'display_name' => 'Administrador',
				'description'  => 'User is allowed to manage and edit other users',
			]);
			$this->rolAcademicoAdmin = Role::create([
				'name'         => 'academico-admin',
				'display_name' => 'Académico Admin',
				//'description'  => 'Comentario',
			]);
			$this->rolAcademicoUser = Role::create([
				'name'         => 'academico-user',
				'display_name' => 'Académico User',
				//'description'  => 'Comentario',
			]);
			$this->rolEmpleado = Role::create([
				'name'         => 'empleado',
				'display_name' => 'Empleado',
				//'description'  => 'Comentario',
			]);



		//*********************************************************************
		$this->command->info('--- Seeder Creación de Permisos');


			$this->createPermissions(User::class, 'usuarios', null,  true, false);
			$this->createPermissions(Permission::class, 'permisos', null, true, false);
			$this->createPermissions(Role::class, 'roles', null, true, false);

			$this->createPermissions(Auditor::class, 'Auditores', null, true, false);
			$this->createPermissions(Procesos::class, 'Procesos', null, true, false);
			$this->createPermissions(Auditoria::class, 'Auditorías', null, true, false);
			$this->createPermissions(AuditoriaProceso::class, 'Proceso de auditoria', null, true, false);

			$workplanLoad = Permission::create([
				'name'         => 'acad-plan-form-workplan-load',
				'display_name' => 'Cargar plan de trabajo',
				'description'  => 'Permiso para poder cargar archivos pdf del plan de trabajo.',
			]);
			$this->rolAcademicoAdmin->attachPermission($workplanLoad);
			$this->rolAdmin->attachPermission($workplanLoad);
			
			$plan40Load = Permission::create([
				'name'         => 'acad-plan-form-plan40-load',
				'display_name' => 'Cargar plan de 40 Semanas',
				'description'  => 'Permiso para poder cargar archivos pdf del plan 40 semanas.',
			]);
			$this->rolAcademicoAdmin->attachPermission($plan40Load);
			$this->rolAdmin->attachPermission($plan40Load);

			$permAsignacion = $this->createPermissions(Asignacion::class, 'asignaciones académicas', null, true, false, 'acad-');
			$this->rolAcademicoAdmin->attachPermissions($permAsignacion);
			$this->rolAcademicoUser->attachPermission($permAsignacion['index']);
			
			$permAsignacionDownload = Permission::create([
				'name'         => 'acad-asignacion-download',
				'display_name' => 'Descargar asignación académica',
				'description'  => 'Permiso para poder descargar archivos de la asignación académica.',
			]);
			$this->rolAdmin->attachPermission($permAsignacionDownload);
			$this->rolAcademicoAdmin->attachPermission($permAsignacionDownload);
			$this->rolAcademicoUser->attachPermission($permAsignacionDownload);

		//*********************************************************************
		$this->command->info('--- Seeder Creación de Usuarios prueba');

			//Admin
			$admin = User::firstOrcreate( [
				'name' => 'Administrador',
				//'cedula' => 1,
				'username' => 'admin',
				'email' => 'admin@itlam.com',
				'password'  => \Hash::make($pass),
			]);
			$admin->attachRole($this->rolAdmin);

			//Owner
			$owner = User::create( [
				'name' => 'Owner',
				//'cedula' => 2,
				'username' => 'owner',
				'email' => 'owner@itlam.com',
				'password'  => \Hash::make($pass),
			]);
			$owner->attachRole($this->rolOwner);

			//Editores
			$empleado = User::create( [
				'name' => 'Empleado 1 de prueba',
				//'cedula' => 3,
				'username' => 'empleado',
				'email' => 'empleado@itlam.cm',
				'password'  => \Hash::make($pass),
				//'USER_CREADOPOR'  => 'PRUEBAS'
			]);
			$empleado->attachRole($this->rolEmpleado);


			//5 usuarios faker
			//$users = factory(App\Models\User::class)->times(5)->create();

	}

	private function createPermissions($name, $display_name, $description = null, $attachAdmin=true, $attachEmpleado=true, $prefix='')
	{
        $name = strtolower(last(explode('\\',basename(get_model($name)))));

		if($description == null)
			$description = $display_name;

		$create = Permission::create([
			'name'         => $prefix.$name.'-create',
			'display_name' => 'Crear '.$display_name,
			'description'  => 'Crear '.$description,
		]);
		$edit = Permission::create([
			'name'         => $prefix.$name.'-edit',
			'display_name' => 'Editar '.$display_name,
			'description'  => 'Editar '.$description,
		]);
		$index = Permission::create([
			'name'         => $prefix.$name.'-index',
			'display_name' => 'Listar '.$display_name,
			'description'  => 'Listar '.$description,
		]);
		$delete = Permission::create([
			'name'         => $prefix.$name.'-delete',
			'display_name' => 'Borrar '.$display_name,
			'description'  => 'Borrar '.$description,
		]);

		if($attachAdmin)
			$this->rolAdmin->attachPermissions([$index, $create, $edit, $delete]);

		if($attachEmpleado)
			$this->rolEmpleado->attachPermissions([$index, $create, $edit]);

		return compact('create', 'edit', 'index', 'delete');
	}

}