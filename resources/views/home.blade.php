@extends('templates.layout')
<header class="d-flex justify-content-between align-items-center">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <img src="logo.png" alt="Logo" width="50">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/pasien/pendaftaranpasien">Pendaftaran Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/pasien/profile">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/pasien/history">History</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav>
    </nav>
    @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                @can('pasien-access')
                    <a href="/logout"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Logout
                    </a>
                @endcan
                @if (auth()->user()->can('petugas-access') || auth()->user()->can('dokter-access'))
                    @php
                        $role = auth()->user()->getRoleNames()[0];
                        $url = $role . '/dashboard';
                    @endphp
                    <a href="{{ url($url) }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif

</header>

<div class="container-fluid">
    <div class="content">
        <h1>Sistem Informasi Manajemen Rumah Sakit<br>Rumah Sakit Medika Intan</h1>
        <p style="width: 70%">Sistem ini menyediakan fitur untuk melihat Jadwal Dokter, Jadwal Kamar, dan Jadwal Poli.
            Selain itu dapat
            melihat hasil Rekam Medis Anda dan juga menyediakan fitur Layanan Konsultasi Online.</p>
        <div class="features">
            <div>
                <a href="/jadwaldokter/readjadwal"></a>Jadwal Dokter
            </div>
            <div>Informasi Kamar</div>
            <div>Hasil Rekam Medis</div>
        </div>
    </div>
</div>
