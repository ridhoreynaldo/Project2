{{-- Memberitahu Blade untuk menggunakan layout 'app.blade.php' --}}
@extends('layouts.app')

{{-- Mengatur judul halaman (akan mengisi @yield('title') di head) --}}
@section('title', 'Login - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

{{-- Memulai bagian konten (akan mengisi @yield('content') di layout) --}}
@section('content')

<div class="container">
    <form method="POST" action="login" class="login-card">
        @csrf
        
        <h2>Login Mahasiswa</h2>

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <div class="input-group">
            <label for="username">Username (NPM)</label>
            <input type="text" id="username" name="LOGINUSERNAME" placeholder="Masukkan NPM Anda" required>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="LOGINPASSWORD" placeholder="Masukkan Password" required>
        </div>

        <button type="submit" class="login-button">Login</button>

        <div class="back-link">
            <a href="/"> 
                <i class="bi bi-arrow-left-circle"></i>
                Kembali ke Beranda
            </a>
        </div>
    </form>

</div>
@endsection
{{-- Mengakhiri bagian konten --}}