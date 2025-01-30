<nav class="container-fluid text-center" style="background-color: #3730a3; padding: 10px 0;">
  <div>
    <span class="navbar-text" style="color: white; font-weight: bold;">
      Hit the best watches deals!
    </span>
  </div>
</nav>

<style>
  .navbar-nav .nav-link {
    color: black !important;
    position: relative;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background-color: #3730a3;
    bottom: 0;
    left: 0;
    transition: width 0.3s ease;
  }

  .navbar-nav .nav-link:hover {
    color: #3730a3 !important;
  }

  .navbar-nav .nav-link:hover::after {
    width: 100%;
  }

  .navbar-nav .nav-link.active {
    color: #3730a3 !important;
    border-bottom: none !important;
  }

  /* Specific styles for the logout link */
  .navbar-nav .nav-link.no-hover:hover {
    color: inherit !important;
  }

  .navbar-nav .nav-link.no-hover:hover::after {
    width: 0;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm" id="mainNavbar" style="padding: 12px 0;">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 2rem; font-weight: 600;">watchCom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Watches</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('cart.show') ? 'active' : '' }}" href="{{ route('cart.show') }}">Cart</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link no-hover text-danger" href="{{ route('logout') }}" style="color: #dc3545 !important;">
            <i class="fa fa-sign-out" aria-hidden="true"></i> 
          </a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>