<nav id="main-nav" class="navbar navbar-expand-md navbar-dark nav-color-home">
    <div class="container">
        <div style=" display: inline-block; text-align: center;">
            <a class=""  href="{{ url('/home') }}">
                <img id="nav-image" src="/images/logo.png" width="160px" height="80px" alt="">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Left Side Of Navbar --}}
            <ul class="navbar-nav mr-auto">
                @role('admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {!! trans('titles.adminDropdownNav') !!}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item nav-font {{ (Request::is('roles') || Request::is('permissions')) ? 'active' : null }}" href="{{ route('laravelroles::roles.index') }}">
                                {!! trans('titles.laravelroles') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/users') }}">
                                {!! trans('titles.adminUserList') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('users/create') ? 'active' : null }}" href="{{ url('/users/create') }}">
                                {!! trans('titles.adminNewUser') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('themes','themes/create') ? 'active' : null }}" href="{{ url('/themes') }}">
                                {!! trans('titles.adminThemesList') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('logs') ? 'active' : null }}" href="{{ url('/logs') }}">
                                {!! trans('titles.adminLogs') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('phpinfo') ? 'active' : null }}" href="{{ url('/activity') }}">
                                {!! trans('titles.adminActivity') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('phpinfo') ? 'active' : null }}" href="{{ url('/phpinfo') }}">
                                {!! trans('titles.adminPHP') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('routes') ? 'active' : null }}" href="{{ url('/routes') }}">
                                {!! trans('titles.adminRoutes') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('active-users') ? 'active' : null }}" href="{{ url('/active-users') }}">
                                {!! trans('titles.activeUsers') !!}
                            </a>
                            
                            <a class="dropdown-item nav-font {{ Request::is('blocker') ? 'active' : null }}" href="{{ route('laravelblocker::blocker.index') }}">
                                {!! trans('titles.laravelBlocker') !!}
                            </a>
                        </div>
                    </li>
                @endrole
                @permission('menu.juego')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {!! trans('titles.adminGame') !!}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @permission('view.lines')
                        <a class="dropdown-item nav-font {{ Request::is('lineas-marcas') ? 'active' : null }}" href="{{ url('lineas-marcas') }}">
                            {!! trans('titles.lines') !!}
                        </a>
                        @endpermission
                        @permission('view.questions')
                            <a class="dropdown-item nav-font {{ Request::is('blocker') ? 'active' : null }}" href="{{ url('/preguntas-respuestas') }}">
                                {!! trans('titles.questions') !!}
                            </a>
                        @endpermission
                        <a class="dropdown-item nav-font {{ Request::is('blocker') ? 'active' : null }}" href="{{ url('/challenge-list') }}">
                            {!! trans('titles.challenges') !!}
                        </a>
                    </div>
                </li>
                @endpermission
            </ul>
            {{-- Right Side Of Navbar --}}
            <ul class="navbar-nav ml-auto">
                {{-- Authentication Links --}}
                @guest
                    
                @else
                    <li class="nav-item dropdown" onclick="markNotificationAsRead()" style="margin-right: 1rem;">
                        <a id="navbarDropdown" class="dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-globe" aria-hidden="true"></i> Notificaciones <span class="badge badge-info">{{ count(Auth()->user()->unreadNotifications) }}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @forelse (Auth()->user()->unreadNotifications as $notification)                            
                                @include('partials.notification.replied_to_thread')
                                @empty
                                <a class="dropdown-item nav-font" href="#">No hay notificaciones no leídas</a>
                                <hr>
                                <a href="/challenge-list" class="dropdown-item nav-font"><strong><center>ver todos los desafios</center></strong></a>
                            @endforelse
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav">
                            @else
                                <div class="user-avatar-nav"></div>
                            @endif
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item nav-font {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name) }}">
                                {!! trans('titles.profile') !!}
                            </a>
                            <a class="dropdown-item nav-font" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>