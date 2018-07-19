<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="navbar-brand" href="{{ url('/') }}">
        Laravel
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="/">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li>
          <a href="/services">Services</a>
        </li>
        <li>
          <a href="/about">About</a>
        </li>
        <li>
          <a href="/posts">Blog</a>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">

        <!-- Authentication Links -->
        @if (Auth::guest())
        <li>
          <a href="{{ url('/login') }}">Login</a>
        </li>
        <li>
          <a href="{{ url('/register') }}">Register</a>
        </li>
        @else
        <li>
          <a href="/posts/create">Create post</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }}
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="/dashboard">Dashboard</a>
            </li>
            <li>
              <a href="{{ url('/logout') }}">
                <i class="fa fa-btn fa-sign-out"></i>Logout</a>
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>