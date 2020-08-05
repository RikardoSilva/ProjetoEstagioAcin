<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="{{ (request()->is('/')) ? 'active' : '' }}">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="{{ Request::segment(1) === 'about' ? 'active' : '' }}">
            <a class="nav-link" href="/about">About</a>
        </li>
        <li class="{{ Request::segment(1) === 'features' ? 'active' : '' }}">
            <a class="nav-link" href="/features">Features</a>
        </li>
        <li class="{{ Request::segment(1) === 'clubs' ? 'active' : '' }}">
            <a class="nav-link" href="/clubs">All Clubs</a>
          </li>
        </ul>
      </ul>

      {{-- Right side of the navbar - Login/Register and Logout --}}
        <ul class="navbar-nav ml-auto">

        {{-- So the 'Add Club' link and the search bar stays at the right --}}
        <ul class="nav navbar-nav navbar-right">
            <li><a class="nav-link" href="/clubs/create">Add Club</a></li>
        </ul>

        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ url('/search') }}">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Club" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>

            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/home">Home</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>