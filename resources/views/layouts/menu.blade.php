<li class="nav-section">
    <span class="sidebar-mini-icon">
        <i class="fas fa-ellipsis-h"></i>
    </span>
    <h4 class="text-section">Mantenimientos</h4>
</li>

<li class="nav-item {{ Request::is('miembros*') ? 'active' : '' }}">
    <a href="{{url('/miembros/listado')}}"><i class="fas fa-users"></i> <p>Miembros</p></a>
</li>

<li class="nav-item {{ Request::is('organizacion*') ? 'active' : '' }}">
    <a href="{{url('/organizacion/listado')}}"><i class="fas fa-place-of-worship  "></i> <p>Organizaciones</p></a>
</li>

<li class="nav-item {{ Request::is('llamamiento*') ? 'active' : '' }}">
    <a href="{{url('/llamamiento/listado')}}"><i class="fas fa-scroll"></i> <p>Llamamientos</p></a>
</li>

<li><div class="dropdown-divider"></div></li>
