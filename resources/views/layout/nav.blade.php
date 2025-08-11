<nav class="navbar navbar-expand-lg bg-primary py-3" data-bs-theme="dark">
    <div class="container-fluid px-4">

        <span class="d-inline-flex align-items-center fw-bold fs-5 text-white me-3">
            <i class="fas fa-lightbulb me-2"></i> ThinkFlow
        </span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-3 align-items-center">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('login') ? 'active' : '' }}" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('register') ? 'active' : '' }}" href="/register">Register</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                            <img  class="me-2 avatar-sm rounded-circle"  style="width:50px; height:50px; object-fit:cover;"  src="{{ Auth::user()->getImageUrl() }}"
                      alt="{{ Auth::user()->name }}">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-light btn-sm ms-2 px-3 py-1">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
