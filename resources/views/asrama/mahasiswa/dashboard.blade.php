{{-- Memberitahu Blade untuk menggunakan layout 'app.blade.php' --}}
@extends('layouts.app')

{{-- Mengatur judul halaman (akan mengisi @yield('title') di head) --}}
@section('title', 'Dashboard - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

{{-- Memulai bagian konten (akan mengisi @yield('content') di layout) --}}
@section('content')
    <div class="container">
        <div class="dashboard-nav">
            <div class="welcome-message">
                <h3>Selamat datang, <span>{{ Session::get('mahasiswa')->LOGINUSERNAME }}</span></h3>
            </div>
            <a href="/asrama/mahasiswa/logout" class="logout-link">
                Logout <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>

        <h1>Dashboard Mahasiswa</h1>
        <h2 class="dashboard-subtitle">Apa yang ingin Anda lakukan?</h2>

        <div class="cards-container">
            
            {{-- <a href="/mahasiswa/profil" class="card">
                <div class="card-icon"><i class="bi bi-person-badge"></i></div>
                <h2>Lengkapi Profil</h2>
                <p>Pastikan data diri Anda lengkap dan valid sebelum mendaftar.</p>
            </a> --}}

            <a href="/asrama/mahasiswa/pemesanan-kamar" class="card">
                <div class="card-icon"><i class="bi bi-door-open-fill"></i></div>
                <h2>Pendaftaran Asrama</h2>
                <p>Lihat ketersediaan kamar, pilih, dan lakukan pendaftaran.</p>
            </a>

            <a href="/asrama/mahasiswa/history-transaksi" class="card">
                <div class="card-icon"><i class="bi bi-clock-history"></i></div>
                <h2>Riwayat Uang Pengganti Asrama</h2>
                <p>Lihat riwayat uang pengganti asrama anda.</p>
            </a>
            </div>
    </div>

@endsection
{{-- Mengakhiri bagian konten --}}