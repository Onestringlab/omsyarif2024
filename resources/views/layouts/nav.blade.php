<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <!-- {{ config('app.name', 'Slip Web Id') }} -->
            <img src="{{ asset('/images/slip-web-id.png') }}" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @auth
                @if(in_array(Auth::user()->role, ['superadmin']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house"></i>Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('satker') }}"><i class="fa-solid fa-building"></i> Satuan Kerja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('/users') }}"><i class="fa-solid fa-user"></i> Pengguna</a>
                </li>
                @endif
                @if(in_array(Auth::user()->role, ['user']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bersihlist') }}"><i class="fa-solid fa-money-check"></i> {{ __('Gaji') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tungkinlist') }}"><i class="fa-solid fa-money-bill"></i> Tunjangan
                        Kinerja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('makanlist') }}"><i class="fas fa-utensils"></i> Uang Makan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kendaraanlist') }}"><i class="fas fa-car-side"></i> Uang Transportasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('presensilist') }}"><i class="fa-solid fa-calendar-check"></i> Presensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('potongansslip') }}"><i class="fa-regular fa-file-lines"></i> {{ __('Potongan') }}</a>
                </li>
                @endif
                @if(in_array(Auth::user()->role, ['admin']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('/months') }}"><i class="fa-solid fa-database"></i> Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('/nomenklatur') }}"><i class="fa-solid fa-table-list"></i> Nomenklatur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('/users') }}"><i class="fa-solid fa-user"></i> Pengguna</a>
                </li>
                @endif
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if(Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if(Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa-solid fa-user-tie"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ asset('/password') }}/{{ Auth::user()->id }}">{{ __('Ubah Sandi') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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