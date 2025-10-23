@extends('layouts.app')

@section('title', 'Selamat Datang - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="logo">
        <img src="{{ asset('logo/logo_asrama.png') }}" alt="Logo Asrama" class="logo-img">
    </div>
    
    <h1>Asrama Putri Universitas Quality</h1>
    <div class="title-decoration"></div>
    <p class="subtitle">Tinggal, Belajar, dan Bertumbuh di Lingkungan Asrama yang Inspiratif.</p>

    <p class="tagline-secondary">
        Rumah kedua bagi mahasiswa yang ingin menjadi pribadi 
        <span class="highlight">Bermoral Etika</span>, 
        <span class="highlight">Disiplin</span>, 
        <span class="highlight">Berkarakter</span>, 
        <span class="highlight">Mandiri</span>, dan 
        <span class="highlight">Unggul</span>
    </p>

    {{-- ========== KARTU PENDAFTARAN DAN INFORMASI ========== --}}
    <div class="cards-container">
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

    {{-- ========== BAGIAN KEUNGGULAN UTAMA ========== --}}
    <section class="features-section fade-section">
        <h2 class="section-title">Keunggulan Utama</h2>
        <div class="features">
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-award-fill"></i></div>
                <h3>Lingkungan & Kurikulum</h3>
                <p>Lingkungan & kurikulum asrama yang membentuk moral dan disiplin hidup.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-pin-map-fill"></i></div>
                <h3>Lokasi Strategis</h3>
                <p>Lokasi di lingkungan kampus utama — hemat waktu dan transportasi.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-laptop"></i></div>
                <h3>Sistem Digital</h3>
                <p>Didukung sistem digital untuk pendaftaran & pembayaran online.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-people-fill"></i></div>
                <h3>Program Mentoring</h3>
                <p>Program mentoring pribadi untuk setiap penghuni.</p>
            </div>
        </div>
    </section>

    {{-- ========== BAGIAN FASILITAS ========== --}}
    <section class="features-section fade-section">
        <h2 class="section-title">Fasilitas Asrama</h2>
        <div class="features">
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-person-workspace"></i></div>
                <h3>Perlengkapan Kamar</h3>
                <p>Kamar dilengkapi kasur, lemari, dan meja belajar yang nyaman.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-wifi"></i></div>
                <h3>WiFi Gratis</h3>
                <p>Koneksi internet cepat 24 jam untuk mendukung aktivitas belajar.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-shield-lock-fill"></i></div>
                <h3>Keamanan 24/7</h3>
                <p>Sistem keamanan khusus asrama putri dengan pengawasan ketat.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-cup-straw"></i></div>
                <h3>Dapur & Ruang Makan</h3>
                <p>Area dapur bersama dan ruang makan yang bersih.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-water"></i></div>
                <h3>Kamar Mandi Bersih</h3>
                <p>Fasilitas kamar mandi bersih dan terawat untuk kenyamanan penghuni.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><i class="bi bi-chat-dots-fill"></i></div>
                <h3>Area Diskusi</h3>
                <p>Ruang komunal untuk belajar kelompok, diskusi, dan bersosialisasi.</p>
            </div>
        </div>
    </section>

    @include('partials.footer')
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/landing-page.js') }}"></script>
@endpush
