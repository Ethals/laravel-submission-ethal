
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark px-5">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Ethal's Site</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <li class="nav-item">
                     <a class="nav-link {{ (@$active === 'welcome') ? 'active' : '' }}" href="/" aria-current="page">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ Request::is('about*') ? 'active' : '' }}" href="/about">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ Request::is('posts*') ? 'active' : '' }}" href="/posts">Posts</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ Request::is('articles*') ? 'active' : '' }}" href="/articles">Articles</a>
                  </li>
            </ul>
            <ul class="navbar-nav d-flex">
                  @if (Route::has('login'))
                     
                        @auth
                              <li class="nav-item">
                                 <a href="{{ url('/home') }}" class="nav-link text-decoration-none text-white me-2">Home</a>
                              </li>
                        @else
                              <li class="nav-item">
                                 <a href="{{ route('login') }}" class="nav-link text-decoration-none text-white me-2"><i class="fas fa-sign-in-alt me-1"></i><small>Log in</small></a>
                              </li>
                              @if (Route::has('register'))
                              <li class="nav-item">
                                 <a href="{{ route('register') }}" class="nav-link ml-4 font-semibold text-gray-600 hover:text-gray-900 text-decoration-none text-white"><i class="fas fa-user-plus me-1"></i><small>Register</small></a>
                              </li>
                              @endif
                        @endauth
                     
                  @endif
            </ul>
            <!-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
         </div>
      </div>
</nav>
