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

    <!-- datatable -->
    <link href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/4f2d7302b1.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- <link rel="stylesheet" href="{{ asset('build/assets/app-Co2e8z2G.css') }}"> -->
    <style>
        .dt-input{
            margin-right: 3%;
        }

        .btn.btn-primary {
            background-color: #727CF5;
            border-color: #727CF5;
        }

        body {
            background: url('{{ asset("image/bg.webp") }}') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if(Auth::user()->role === 'admin')
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    @elseif(Auth::user()->role === 'superadmin')
                    <a class="navbar-brand" href="{{ route('superadmin.dashboard') }}">
                    @else
                    <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                @endif
                    <img src="{{ asset('image/police_logo.webp') }}" class="float-end" alt="police logo" style="width:25%">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if(Auth::user()->role === 'superadmin' || Auth::user()->role === 'admin')
                            @php
                                $userRole = Auth::user()->role;
                            @endphp
                            <li class="nav-item">
                                <a href="{{ route($userRole . '.account.index') }}" class="nav-link">
                                    <i class="fa-solid fa-user me-1"></i>Account
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route($userRole . '.rank.index') }}" class="nav-link">
                                    <i class="fa-solid fa-ranking-star me-1"></i>Rank
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route($userRole . '.office.index') }}" class="nav-link">
                                    <i class="fa-solid fa-building-shield me-1"></i>Office
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route($userRole . '.program.index') }}" class="nav-link">
                                    <i class="fa-solid fa-book me-1"></i>Program
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-walkie-talkie me-1"></i>Special Course
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route($userRole . '.special.index') }}">Special course (Main)</a></li>
                                    <li><a class="dropdown-item" href="{{ route($userRole . '.specialExtn.index') }}">Special course (Extension)</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route($userRole . '.bmi.index') }}" class="nav-link">
                                    <i class="fa-solid fa-dumbbell me-1"></i>BMI
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route($userRole . '.report.programChart') }}" class="nav-link">
                                    <i class="fa-solid fa-table me-1"></i>Reports
                                </a>
                            </li>
                        @endif
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}
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

                                    <form action="{{ route('school-rfid-token') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Go to</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="/build/assets/app-H1p8gvK4.js"></script>
    @stack('scripts')
</body>
</html>
