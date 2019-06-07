@ability('', 'user-index,role-index,permission-index')
<li class="{{ Request::is('auth*')? 'active' : '' }}">
	<a href="#"><i class="fa fa-user-circle"></i> <span>Usuarios y roles</span><i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		@permission('user-index')
		<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
			<a href="{!!route('auth.usuarios.index')!!}"><i class="fa fa-user"></i><span>Usuarios</span></a>
		</li>
		@endpermission
		@permission('role-index')
		<li class="{{ Request::is('roles*') ? 'active' : '' }}">
		    <a href="{{route('auth.roles.index')}}"><i class="fa fa-male"></i><span>Roles</span></a>
		</li>
		@endpermission
		@permission('permission-index')
		<li class="{{ Request::is('permisos*') ? 'active' : '' }}">
		    <a href="{{route('auth.permisos.index')}}"><i class="fa fa-address-card"></i><span>Permisos</span></a>
		</li>
		@endpermission
	</ul>
</li>
@endability


<li class="{{ Request::is('sedes*','auditorias.procesos*','auditorias.auditors*')? 'active' : '' }}">
	<a href="#"><i class="fa fa-cogs"></i> <span>Configuración</span><i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li class="{{ Request::is('sedes*') ? 'active' : '' }}">
			<a href="{!! route('sedes.index') !!}"><i class="fa fa-building"></i> Sedes</a>
		</li>
		<li class="{{ Request::is('auditorias.procesos*') ? 'active' : '' }}">
		    <a href="{{route('auditorias.procesos.index')}}"><i class="fa fa-edit"></i><span>Procesos</span></a>
		</li>
		<li class="{{ Request::is('auditorias.auditors*') ? 'active' : '' }}">
		    <a href="{{route('auditorias.auditors.index')}}"><i class="fa fa-edit"></i><span>Auditores Internos</span></a>
		</li>
	</ul>
</li>




<!-- <li class="{{ Request::is('noConformidades*') ? 'active' : '' }}">
	<a href="{!! route('noConformidades.index') !!}"><i class="fa fa-edit"></i> <span>No Conformidades</span></a>
</li> -->

<!-- Academic -->

@permission('acad-*')
<li class="{{ Request::is('academico*')? 'active' : '' }}">
	<a href="#"><i class="fa fa-graduation-cap"></i> <span>Académico</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>


<!-- Profesores -->
<!-- Pendiente Permiso -->
	<ul class="treeview-menu">
		<li class="treeview">
			<a href="{!! route('teacher.index') !!}"><i class="fa fa-address-book-o"></i> Profesores
				<span class="pull-right-container">
					<!-- <i class="fa fa-angle-left pull-right"></i> -->
				</span>
			</a>

		</li>
	</ul>

	<ul class="treeview-menu">
		<li class="treeview">
			<a href="{!! route('asignacion.index') !!}"><i class="fa fa-user-plus"></i> Asignación Académica
				<span class="pull-right-container">
					<!-- <i class="fa fa-angle-left pull-right"></i> -->
				</span>
			</a>

		</li>
	</ul>


	@permission('acad-plan-*')
	<ul class="treeview-menu">
		<li class="treeview">
			<a href="#"><i class="fa fa-calendar-check-o"></i> Planeacion
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>

			@permission('acad-plan-form-*')
			<ul class="treeview-menu">
				<li class="treeview">
					<a href="#"><i class="fa fa-folder-open-o"></i> Formatos
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					@permission('acad-plan-form-plan40-load')
					<ul class="treeview-menu">
						<li><a href="{!! route('academic.index') !!}"><i class="fa fa-calendar"></i> Plan 40 Semanas</a></li>
					</ul>
					@endpermission
					@permission('acad-plan-form-workplan-load')
					<ul class="treeview-menu">
						<li><a href="{!! route('academicWorkplan.index') !!}"><i class="fa fa-calendar"></i> Plan de Trabajo</a></li>
					</ul>
					@endpermission
				</li>
				@endpermission
			</ul>
		@endpermission
		</li>
	</ul>
	@endpermission

	<ul class="treeview-menu">
		<li class="treeview">
			<a href="#"><i class="fa fa-puzzle-piece"></i> Diseño
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>

		</li>
	</ul>

</li>


<!-- Calidad -->
<li class="{{ Request::is('cargarArchivos*') ? 'active' : '' }}">
	<a href="#">
		<i class="fa fa-check-circle"></i> <span>Calidad</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>

	<ul class="treeview-menu">
		<li class="treeview">
			<a href="#"><i class="fa fa-calendar"></i> Programación
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>

			<ul class="treeview-menu">
				<li><a href="{{route('auditorias.index')}}"><i class="fa fa-calendar-check-o"></i> Plan de Auditorias</a></li>
			</ul>

		</li>
	</ul>

	<ul class="treeview-menu">
		<li><a href="#"><i class="fa fa-binoculars"></i> Seguimiento</a></li>
	</ul>

	<ul class="treeview-menu">
		<li><a href="#"><i class="fa fa-asl-interpreting"></i> Ejecución</a></li>
	</ul>

</li>

<li class="{{ Request::is('cargarArchivos*')? 'active' : '' }}">
	<a href="#"><i class="fa fa-book"></i> Gest. Documental<i class="fa fa-angle-left pull-right"></i></a>

	<ul class="treeview-menu">
		<li><a href="{!! route('cargarArchivos.index') !!}"><i class="fa fa-circle-o"></i> Documentos</a></li>
		<li><a href="#"><i class="fa fa-circle-o"></i> Procedimientos</a></li>
		<li><a href="#"><i class="fa fa-circle-o"></i> Formatos</a></li>
	</ul>
</li>

<!-- Seguridad y salud en el trabajo -->
<li class="{{ Request::is('') ? 'active' : '' }}">
		<a href="#">
			<i class="fa fa-handshake-o"></i> <span>SGSST</span>
				<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
				</span>
		</a>
			<ul class="treeview-menu">
				<li><a href="{!! route('sgsst_s.index') !!}"><i class="fa fa-folder-open-o"></i>Formatos</a></li>
			</ul>
		
</li>
