<li class="{{ Request::is('sedes*') ? 'active' : '' }}">
    <a href="{!! route('sedes.index') !!}"><i class="fa fa-edit"></i><span>Sedes</span></a>
</li>

<li class="{{ Request::is('noConformidades*') ? 'active' : '' }}">
    <a href="{!! route('noConformidades.index') !!}"><i class="fa fa-edit"></i><span>No Conformidades</span></a>
</li>

