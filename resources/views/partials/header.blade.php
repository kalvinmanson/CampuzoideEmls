<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand logo" href="/"><img src="/img/top-logo.png" alt="{{ env('APP_NAME')}}"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navHeader" aria-controls="navHeader" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navHeader">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Cursos</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0 mr-auto">
      <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <ul class="navbar-nav mr-0">
      @guest
        <li class="nav-item">
          <a class="btn btn-outline-light animated pulse infinite" href="{{ route('google') }}"><i class="fab fa-google-plus-g"></i> Ingresa</a>
        </li>
        {{--}}<li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
        @endif--}}
      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('users.show', Auth::user()->username) }}">Perfil</a>
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
