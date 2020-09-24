<nav class="navbar navbar-expand-md navbar-dark bg-info shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if(!Auth::guest())
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/datas"><i class="far fa-clock mr-1"></i> Latest data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/users"><i class="fas fa-users mr-1"></i> Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/sensors"><i class="fas fa-satellite-dish mr-2"></i>Sensors</a>
                        </li>
                    @else 
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/datas"><i class="far fa-clock mr-1"></i> Latest data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/charts"><i class="far fa-chart-bar mr-1"></i> Charts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/sensors"><i class="fas fa-satellite-dish mr-1"></i> My Sensors</a>
                        </li>
                    @endif
                @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt  mr-1"></i>
                            {{ __('Login') }}
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus mr-1"></i>
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-alt mr-1"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               <i class="fas fa-sign-out-alt mr-1"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
