<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPP - KU</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg p-3 shadow-sm" style="background-color: #E7DAD1">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <b>SPP-KU</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Auth::user()->role == 1)
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('petugas.index') }}">Petugas</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('siswa.index') }}">Siswa</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('kelas.index') }}">Kelas</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page" href="{{ route('spp.index') }}">SPP</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('pembayaran.index') }}">Pembayaran SPP</a>
                            </li>
                        @elseif(Auth::user()->role == 2)
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('siswa.index') }}">Siswa</a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('pembayaran.index') }}">Pembayaran SPP</a>
                            </li>
                        @elseif(Auth::user()->role == 3)
                            <marquee behavior="" direction="">Mari Bayar SPP Kalian Semua</marquee>
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
                                @if (Auth::user()->role == true)
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle fs-bold" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                @else
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Halo, Siswa
                                    </a>
                                @endif
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
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

            @stack('modal')
        </main>
    </div>
</body>

</html>