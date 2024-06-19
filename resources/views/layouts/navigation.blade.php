<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    @role('admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                </svg>
                {{ __('Users') }}
            </a>
        </li>
    @endrole

    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('roles*') ? 'active' : ''}}" href="{{ route('roles.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-group') }}"></use>
            </svg>
            {{ __('Roles') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('permissions*') ? 'active' : ''}}" href="{{ route('permissions.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
            </svg>
            {{ __('Permissions') }}
        </a>
    </li> --}}

    @role('admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('criterias*') ? 'active' : '' }}" href="{{ route('criterias.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Kriteria') }}
            </a>
        </li>
    @endrole

    @role('director')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('criterias*') ? 'active' : '' }}" href="{{ route('criterias.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Kriteria') }}
            </a>
        </li>
    @endrole

    @role('admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('weights*') ? 'active' : '' }}" href="{{ route('weights.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Bobot') }}
            </a>
        </li>
    @endrole

    @role('director')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('weights*') ? 'active' : '' }}" href="{{ route('weights.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Bobot') }}
            </a>
        </li>
    @endrole

    @role('admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('teams*') ? 'active' : '' }}" href="{{ route('teams.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Tim') }}
            </a>
        </li>
    @endrole

    @role('director')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('teams*') ? 'active' : '' }}" href="{{ route('teams.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Tim') }}
            </a>
        </li>
    @endrole

    @role('admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('juries*') ? 'active' : '' }}" href="{{ route('juries.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Juri') }}
            </a>
        </li>
    @endrole

    @role('director')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('juries*') ? 'active' : '' }}" href="{{ route('juries.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Juri') }}
            </a>
        </li>
    @endrole

    @role('admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gmm*') ? 'active' : '' }}" href="{{ route('gmm.assessment') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Penilaian') }}
            </a>
        </li>
    @endrole

    @role('director')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gmm*') ? 'active' : '' }}" href="{{ route('gmm.assessment') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Penilaian') }}
            </a>
        </li>
    @endrole

    @role('admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gmm*') ? 'active' : '' }}" href="{{ route('gmm.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Perhitungan') }}
            </a>
        </li>
    @endrole

    @role('director')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gmm*') ? 'active' : '' }}" href="{{ route('gmm.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Perhitungan') }}
            </a>
        </li>
    @endrole

    @role('jury')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gmm*') ? 'active' : '' }}" href="{{ route('hint.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
                </svg>
                {{ __('Panduan') }}
            </a>
        </li>
    @endrole

    @role('jury')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('gmm*') ? 'active' : '' }}" href="{{ route('gmm.jury.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-room') }}"></use>
                </svg>
                {{ __('Penilaian') }}
            </a>
        </li>
    @endrole

    {{-- <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            Two-level menu
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="#" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-bug') }}"></use>
                    </svg>
                    Child menu
                </a>
            </li>
        </ul>
    </li> --}}
</ul>
