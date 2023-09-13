<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                @auth <!-- Display navigation bar only when user is logged in -->
                <ul class="navbar-nav side-nav">
                    <!-- Add your navigation items for Admin here -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admins.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.admins') }}">Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('display.categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('display.jobs') }}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('display.apps') }}">Applications</a>
                    </li>
                </ul>
                @endauth

                <ul class="navbar-nav ml-md-auto d-md-flex">
                    @guest <!-- Display login link only when user is logged out -->
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.login') }}">Login</a>
                    </li>
                    @else <!-- Display user info and logout when user is logged in -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-white">{{ auth()->user()->email }}</span>
                        </a>
                        {{-- <div class="nav-item"> --}}
                            {{-- <li class="nav-item">
                            <a class="text-white" href="{{ route('admins.dashboard') }}">Home</a>
                            </li> --}}
                        {{-- </div> --}}
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <main class="">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
