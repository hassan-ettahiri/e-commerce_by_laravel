<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">CHAWCHAA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          @if (Route::has('login'))
              @auth
                  <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                    @if (Auth::user()->role_as == 1)
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/dashboard">
                                            {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/">
                                            My profil
                                         </a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                        @endguest
                    </ul>
              @else
              <a href="{{ route('login') }}" class="nav-link">Log in</a>

              @if (Route::has('register'))
              <a href="{{ route('register') }}" class="nav-link">Register</a>
              @endif
            @endauth
          @endif
        </ul>
      </div>
    </div>
</nav>