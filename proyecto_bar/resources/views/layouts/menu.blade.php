<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Inicio</p>
    </a>
    @can('home')
    <a href="{{ route('campuses.index') }}"  class="nav-link {{ Request::is('campuses') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Campus</p>
    </a>
    <a href="{{ route('admin.users.index') }}"  class="nav-link {{ Request::is('admin.users.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Usuarios</p>
    </a>
    @endcan
    <a href="{{ route('bars.index') }}"  class="nav-link {{ Request::is('bars') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Bares</p>
    </a>
    <a href="{{ route('menus.index') }}"  class="nav-link {{ Request::is('menus') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Menus</p>
    </a>
    <a href="{{ route('snacks.index') }}"  class="nav-link {{ Request::is('snacks') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Snacks</p>
    </a>
    <a href="{{ route('buzons.index') }}"  class="nav-link {{ Request::is('buzons') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Buzons</p>
    </a>
    <a href="{{ route('preferencias.index') }}"  class="nav-link {{ Request::is('preferencias') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Preferencias</p>
    </a>
    
</li>
