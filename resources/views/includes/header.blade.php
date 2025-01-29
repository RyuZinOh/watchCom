<!-- Upper Navbar (Safal's Signature) -->
<nav class="container-fluid text-center" style="background-color: #3730a3; padding: 10px 0;">
  <div>
    <span class="navbar-text" style="color: white; font-weight: bold;">
      Hit the best watches deals!
    </span>
  </div>
</nav>

<!-- Lower Navbar (Sticky) -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm" id="mainNavbar" style="padding: 12px 0;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-size: 2rem; font-weight: 600; color: #3730a3;">watchCom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="color: #3730a3; font-weight: 500;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: #6c757d; font-weight: 500;">Watches</a>
        </li>

        <!-- Logout Link if User is Authenticated -->
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" style="color: #dc3545; font-weight: 500;">Logout</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
