<li class="{{ Request::is('noConformidades*') ? 'active' : '' }}">
	<a href="{!! route('noConformidades.index') !!}"><i class="fa fa-edit"></i> <span>No Conformidades</span></a>
</li>

<li class="{{ Request::is('sedes*')? 'active' : '' }}">
	<a href="#"><i class="fa fa-cogs"></i> <span>Configuración</span><i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li class="{{ Request::is('sedes*') ? 'active' : '' }}">
			<a href="{!! route('sedes.index') !!}"><i class="fa fa-building"></i> Sedes</a>
		</li>
		<li class="{{ Request::is('procesos*') ? 'active' : '' }}">
		    <a href="#"><i class="fa fa-edit"></i><span>Procesos</span></a>
		</li>
	</ul>
</li>
<li class="{{ Request::is('academico*')? 'active' : '' }}">
	<a href="#"><i class="fa fa-graduation-cap"></i> <span>Académico</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>

	<ul class="treeview-menu">
		<li class="treeview">
			<a href="#"><i class="fa fa-calendar-check-o"></i> Planeacion
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu">
					<li class="treeview">
						<a href="#"><i class="fa fa-folder-open-o"></i> Formatos
							<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="{!! route('academic.index') !!}"><i class="fa fa-calendar"></i> Plan 40 Semanas</a></li>
						</ul>
						<ul class="treeview-menu">
							<li><a href="{!! route('academicWorkplan.index') !!}"><i class="fa fa-calendar"></i> Plan de Trabajo</a></li>
						</ul>
		</li>
				</ul>
	</ul>

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

<li class="{{ Request::is('cargarArchivos*') ? 'active' : '' }}">
	<a href="#">
		<i class="fa fa-check-circle"></i> <span>Gestión de calidad</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>

			<ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-calendar"></i> Programación</a></li>
			</ul>
			<ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-binoculars"></i> Seguimiento</a></li>
			</ul>
			<ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-asl-interpreting"></i> Ejecución</a></li>
			</ul>

	
		<li class="treeview">
			<a href="#"><i class="fa fa-bullhorn"></i> Auditorias
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-circle-o"></i> Externas</a></li>
				<li class="treeview">
					<a href="#"><i class="fa fa-circle-o"></i> Internas
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="{{route('auditorias.index')}}"><i class="fa fa-calendar-check-o"></i> Programación</a></li>
						<li><a href="#"><i class="fa fa-eye"></i> Seguimiento</a></li>
					</ul>
					<li class="{{ Request::is('auditors*') ? 'active' : '' }}">
					    <a href="{!! route('auditors.index') !!}"><i class="fa fa-edit"></i><span>Auditores Internos</span></a>
					</li>
				</li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-book"></i> Gest. Documental<i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{!! route('cargarArchivos.index') !!}"><i class="fa fa-circle-o"></i> Documentos</a></li>
				<li><a href="#"><i class="fa fa-circle-o"></i> Procedimientos</a></li>
				<li><a href="#"><i class="fa fa-circle-o"></i> Formatos</a></li>
			</ul>

		</li>
	</ul>
</li>