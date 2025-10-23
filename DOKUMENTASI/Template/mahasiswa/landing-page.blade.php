{{-- Memberitahu Blade untuk menggunakan layout 'app.blade.php' --}}
@extends('layouts.app')

{{-- Mengatur judul halaman (akan mengisi @yield('title') di head) --}}
@section('title', 'Selamat Datang - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
@endpush

{{-- Memulai bagian konten (akan mengisi @yield('content') di layout) --}}
@section('content')

<div class="container">
    <div class="logo">
        <img src="{{ asset('logo/logo_asrama.png') }}" alt="Logo Asrama" class="logo-img">
    </div>
    
    <h1>Selamat Datang di Asrama Putri Universitas Quality</h1>
    <p class="subtitle">Tinggal, Belajar, dan Bertumbuh di Lingkungan Asrama yang Inspiratif.</p>

    <div class="cards-container">
        {{-- SARAN: Ganti URL statis dengan helper route() --}}
        <a href="{{ route('login') }}" class="card">
            <div class="card-icon"><i class="bi bi-person-lines-fill"></i></div>
            <h2>Pendaftaran Asrama</h2>
            <p>Daftar untuk menempati asrama putri dengan fasilitas lengkap dan nyaman</p>
        </a>

        <a href="{{ route('informasi') }}" class="card">
            <div class="card-icon"><i class="bi bi-info-circle-fill"></i></div>
            <h2>Informasi Asrama</h2>
            <p>Lihat informasi lengkap tentang fasilitas, harga, dan peraturan asrama putri</p>
        </a>
    </div>

    <div class="features fade-in-section">
        <div class="feature">
            <div class="feature-icon"><i class="bi bi-person-standing-dress"></i></div>
            <h3>Kamar Nyaman</h3>
            <p>Kamar nyaman</p>
        </div>

        <div class="feature">
            <div class="feature-icon"><i class="bi bi-wifi"></i></div>
            <h3>WiFi Gratis</h3>
            <p>Koneksi internet cepat 24 jam untuk mendukung aktivitas belajar</p>
        </div>

        <div class="feature">
            <div class="feature-icon"><i class="bi bi-shield-lock"></i></div>
            <h3>Keamanan 24/7</h3>
            <p>Sistem keamanan khusus asrama putri dengan pengawasan ketat</p>
        </div>

        <div class="feature">
            <div class="feature-icon"><i class="bi bi-moon-stars"></i></div>
            <h3>Kurikulum dan Pembinaan Asrama</h3>
            <p>Lingkungan yang mendukung pengembangan karakter dan kedisiplinan</p>
        </div>
    </div>

    {{-- Memanggil footer dari partial --}}
    @include('partials.footer')
    
</div>
@endsection
{{-- Mengakhiri bagian konten --}}