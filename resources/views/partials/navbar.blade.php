<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/">V-Blogs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('blogs*') ? 'active' : '' }}" href="/blogs">Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('developer*') ? 'active' : '' }}" href="/developer">Developer</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-dash-square-dotted"></i> Go to Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-right"></i> Logout
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ $pageName == 'Login' ? 'active' : '' }}">
                <i class="bi bi-person-plus"></i>  
                LOGIN
              </a>
            </li>
            @endauth
          </ul>
      </div>
    </div>
</nav>