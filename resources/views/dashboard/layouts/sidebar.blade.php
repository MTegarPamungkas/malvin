<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/blogs*') ? 'active' : '' }}" href="/dashboard/blogs">
            <span data-feather="file-text"></span>
            My Blogs
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="external-link"></span>
              Go to...
          </a>
          <ul class="dropdown-menu mx-3" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/"><i class="bi bi-dash-square-dotted"></i>Home</a></li>
            <li><a class="dropdown-item" href="/blogs"><i class="bi bi-dash-square-dotted"></i>Blogs</a></li>
            <li><a class="dropdown-item" href="/categories"><i class="bi bi-dash-square-dotted"></i>Categories</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/developer"><i class="bi bi-dash-square-dotted"></i>Developers</a></li>
            <li></li>
          </ul>
        </li>
      </ul>

      @can("isAdmin")
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <span data-feather="grid"></span>
              Blog's Categories
            </a>
          </li>
        </ul>
      @endcan
    </div>
</nav>