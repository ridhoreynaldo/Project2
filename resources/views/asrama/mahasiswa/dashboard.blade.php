@extends('layouts.app')

@section('title', 'Dashboard - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')

    <div class="container">
        <div class="dashboard-nav">
            <div class="welcome-message">
                <h3>Selamat datang, <span>{{ Session::get('mahasiswa')->LOGINUSERNAME }}</span></h3>
            </div>
            <a href="{{ route('logout') }}" class="logout-link">
                Logout <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>

        <h1>Dashboard Mahasiswa</h1>
        <h2 class="dashboard-subtitle">Status & Informasi Asrama Anda</h2>

        <div class="status-panel">
            <div class="status-item">
                <i class="status-icon bi bi-door-closed"></i>
                <div class="status-content">
                    <span class="status-label">Kamar Dihuni</span>
                    <span class="status-value">A-101</span>
                </div>
            </div>
            <div class="status-item">
                <i class="status-icon bi bi-calendar-check"></i>
                <div class="status-content">
                    <span class="status-label">Berakhir Tanggal</span>
                    <span class="status-value">31 Des 2025</span>
                </div>
            </div>
            <div class="status-item highlight">
                <i class="status-icon bi bi-hourglass-split"></i>
                <div class="status-content">
                    <span class="status-label">Sisa Waktu</span>
                    <span class="status-value">69 Hari Lagi</span>
                </div>
            </div>
        </div>
        
        <div class="cards-container">
            
            {{-- <a href="{{ route('profil') }}" class="card">
                <div class="card-icon"><i class="bi bi-person-badge"></i></div>
                <h2>Lengkapi Profil</h2>
                <p>Pastikan data diri Anda lengkap dan valid sebelum mendaftar.</p>
            </a> --}}

            <a href="{{ route('profil') }}" class="card">
                <div class="card-icon"><i class="bi bi-door-open-fill"></i></div>
                <h2>Pendaftaran Kamar</h2>
                <p>Lihat ketersediaan kamar, pilih, dan lakukan pendaftaran.</p>
            </a>

            <a href="{{ route('history-transaksi') }}" class="card">
                <div class="card-icon"><i class="bi bi-clock-history"></i></div>
                <h2>Riwayat Uang Pengganti Asrama</h2>
                <p>Lihat riwayat uang pengganti asrama anda.</p>
            </a>

            <a href="{{ route('contact-admin') }}" class="card">
                <div class="card-icon"><i class="bi bi-headset"></i></div>
                <h2>Contact Admin</h2>
                <p>Hubungi admin untuk bantuan atau pertanyaan seputar asrama.</p>
            </a>
        </div>
    @include('partials.footer')
    </div>
@endsection