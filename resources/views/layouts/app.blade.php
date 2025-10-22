<!DOCTYPE html>
<html lang="id">
<head>
    {{-- Memanggil semua isi <head> dari partial --}}
    @include('partials.head')
    
    {{-- Slot untuk CSS tambahan jika ada halaman yang butuh style khusus --}}
    @stack('styles')
</head>
{{-- <body> --}}
<body class="page-@yield('page-class', 'default')">

    <div class="hero">
        {{-- Memanggil animasi gelembung dari partial --}}
        @include('partials.floating-shapes')

        {{-- Ini adalah 'slot' utama. Konten dari welcome.blade.php akan masuk di sini --}}
        @yield('content')
    </div>

    {{-- Memanggil semua script utama dari partial --}}
    @include('partials.scripts')
    
    {{-- Slot untuk JS tambahan jika ada halaman yang butuh script khusus --}}
    @stack('scripts')
</body>
</html>