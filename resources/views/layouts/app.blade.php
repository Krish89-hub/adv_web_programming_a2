<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="{{ url('/home') }}">{{ config('app.name', 'Laravel') }}</a>
          
            <ul class="navbar-nav flex-row d-md-none">
              <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                  <em class="bi bi-search"></em>
                </button>
              </li>
              <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                  <em class="bi bi-list"></em>
                </button>
              </li>
             
            </ul>
          
            <div id="navbarSearch" class="navbar-search w-100 collapse">
              <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
            </div>
            @guest
            @if (Route::has('login'))
                
                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                
            @endif

            @if (Route::has('register'))
                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                
            @endif
        @else
            
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            
        @endguest
          </header>
          <div class="container-fluid">
            <div class="row">
                <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="position: fixed;height:100%">
                    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                      <div class="offcanvas-header">
                        <a href="{{ url('/') }}" class="offcanvas-title" id="sidebarMenuLabel">{{ config('app.name', 'Laravel') }}</a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('posts.index')}}">
                              <em class="bi bi-house-fill"></em>
                              Posts
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="{{route('users.index')}}">
                              <em class="bi bi-person"></em>
                              Users
                            </a>
                          </li>
                    
                        </ul>
                      </div>
                    </div>
                  </div>
                  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                  </main>
            </div>
          </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    </div>
</body>
</html>
