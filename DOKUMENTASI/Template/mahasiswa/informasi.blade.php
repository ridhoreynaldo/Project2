
@extends('layouts.app')

@section('title', 'Informasi - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/informasi.css') }}">
@endpush

@section('content')
    <div class="header">

        <a href="javascript:history.back()" class="back-button">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <div class="logo">
            <img src="/logo/logo_asrama.png" alt="Logo Asrama" class="logo-img">
        </div>
        
        <h1>Informasi Asrama Putri</h1>
        <p class="subtitle">Lengkap & Terpercaya untuk Kenyamanan Anda</p>
    </div>

    <div class="container">
        <!-- Fasilitas Section -->
        <div class="info-grid">

            <!-- Fasilitas Kamar -->
            <div class="info-card fade-in">
                <div class="info-card-header">
                    <div class="info-icon"><i class="bi bi-house-door-fill"></i></div>
                    <h3>Fasilitas Kamar</h3>
                </div>
                <ul>
                    <li>Tempat tidur single dengan kasur berkualitas</li>
                    <li>Lemari pakaian pribadi dengan kunci</li>
                    <li>Meja belajar dan kursi ergonomis</li>
                    <li>AC serta kipas angin</li>
                    <li>Jendela dengan ventilasi udara yang baik</li>
                </ul>
            </div>
        
            <!-- Kamar Mandi -->
            <div class="info-card fade-in">
                <div class="info-card-header">
                    <div class="info-icon"><i class="bi bi-droplet-fill"></i></div>
                    <h3>Kamar Mandi</h3>
                </div>
                <ul>
                    <li>Kamar mandi dalam bersih dan terawat</li>
                    <li>Dilengkapi water heater untuk air hangat</li>
                    <li>Shower dan kloset duduk</li>
                    <li>Wastafel dengan cermin</li>
                    <li>Dibersihkan secara rutin setiap hari</li>
                </ul>
            </div>
        
            <!-- Fasilitas Umum -->
            <div class="info-card fade-in">
                <div class="info-card-header">
                    <div class="info-icon"><i class="bi bi-people-fill"></i></div>
                    <h3>Fasilitas Umum</h3>
                </div>
                <ul>
                    <li>WiFi gratis berkecepatan tinggi 24 jam</li>
                    <li>Ruang santai dan TV bersama</li>
                    <li>Dapur bersama dengan peralatan lengkap</li>
                    <li>Mesin cuci dan area penjemuran</li>
                    <li>Musholla dengan perlengkapan ibadah</li>
                </ul>
            </div>
        
            <!-- Keamanan -->
            <div class="info-card fade-in">
                <div class="info-card-header">
                    <div class="info-icon"><i class="bi bi-shield-lock-fill"></i></div>
                    <h3>Keamanan</h3>
                </div>
                <ul>
                    <li>Sistem keamanan 24 jam dengan CCTV</li>
                    <li>Penjaga asrama putri yang siaga</li>
                    <li>Akses masuk menggunakan kartu elektronik</li>
                    <li>Area parkir khusus dengan pengawasan</li>
                    <li>Pencahayaan memadai di seluruh area</li>
                </ul>
            </div>
        
            <!-- Kurikulum & Pembinaan Asrama -->
            <div class="info-card fade-in">
                <div class="info-card-header">
                    <div class="info-icon"><i class="bi bi-book-half"></i></div>
                    <h3>Kurikulum & Pembinaan Asrama</h3>
                </div>
                <ul>
                    <li>Program pengembangan karakter dan kedisiplinan</li>
                    <li>Pelatihan kemandirian dan tanggung jawab</li>
                    <li>Pembinaan ibadah dan nilai keimanan</li>
                    <li>Kegiatan sosial dan kepemimpinan</li>
                </ul>
            </div>
        
        </div>
        

        <!-- Price Section -->
        <div class="price-section fade-in">
            <h2><i class="bi bi-tag-fill"></i> Biaya Asrama</h2>
            <p style="color: rgba(255,255,255,0.85); margin-bottom: 20px;">
                Harga terjangkau dengan fasilitas premium untuk kenyamanan Anda
            </p>
            
            <div class="price-cards">
                <div class="price-card">
                    <h4>Per Bulan</h4>
                    <div class="price">Rp 800K</div>
                    <p class="price-period">Bayar setiap bulan</p>
                </div>

                <div class="price-card">
                    <h4>Per Semester</h4>
                    <div class="price">Rp 4,5 Jt</div>
                    <p class="price-period">Hemat Rp 300K</p>
                </div>

                <div class="price-card">
                    <h4>Per Tahun</h4>
                    <div class="price">Rp 8,5 Jt</div>
                    <p class="price-period">Hemat Rp 1,1 Jt</p>
                </div>
            </div>

            <p style="margin-top: 25px; font-size: 0.95rem; color: rgba(255,255,255,0.75);">
                * Harga sudah termasuk listrik, air, WiFi, dan pemeliharaan fasilitas
            </p>
        </div>

        <!-- Rules Section -->
        <div class="rules-section fade-in">
            <h2><i class="bi bi-journal-text"></i> Peraturan Asrama</h2>
            
            <div class="rules-grid">
                <div class="rule-item">
                    <h4><i class="bi bi-clock"></i> Jam Malam</h4>
                    <p>Pintu asrama ditutup pukul 22.00 WIB. Diharapkan penghuni sudah berada di dalam asrama.</p>
                </div>

                <div class="rule-item">
                    <h4><i class="bi bi-person-x"></i> Tamu</h4>
                    <p>Tamu harus melapor dan hanya boleh berkunjung di ruang tamu hingga pukul 20.00 WIB.</p>
                </div>

                <div class="rule-item">
                    <h4><i class="bi bi-volume-off"></i> Ketenangan</h4>
                    <p>Menjaga ketenangan setelah pukul 22.00 WIB agar tidak mengganggu penghuni lain.</p>
                </div>

                <div class="rule-item">
                    <h4><i class="bi bi-trash"></i> Kebersihan</h4>
                    <p>Setiap penghuni wajib menjaga kebersihan kamar dan area bersama.</p>
                </div>

                <div class="rule-item">
                    <h4><i class="bi bi-fire"></i> Keselamatan</h4>
                    <p>Dilarang memasak di dalam kamar. Gunakan dapur bersama yang telah disediakan.</p>
                </div>

                <div class="rule-item">
                    <h4><i class="bi bi-heart-fill"></i> Sopan Santun</h4>
                    <p>Berpakaian sopan dan saling menghormati sesama penghuni asrama.</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section fade-in">
            <a href="/asrama/mahasiswa/login" class="cta-button">
                <i class="bi bi-pencil-square"></i>
                Daftar Sekarang
            </a>
            <p style="margin-top: 20px; color: rgba(255,255,255,0.8);">
                Segera amankan tempat Anda di asrama putri kami! 🏠✨
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2025 Universitas Quality. All rights reserved.</p>
            <p style="margin-top: 10px;">📍 Jalan Quality No. 1, Medan | 📞 (061) 123-4567 | ✉️ asrama@quality.ac.id</p>
        </div>
    </div>
@endsection

{{-- Mengirim JS DataTables ke slot 'scripts' di layout --}}
@push('scripts')

<script>
    // Smooth scroll animations
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });

    // Parallax effect for shapes
    document.addEventListener('mousemove', (e) => {
        const shapes = document.querySelectorAll('.shape');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        shapes.forEach((shape, index) => {
            const speed = (index + 1) * 8;
            const xOffset = (x - 0.5) * speed;
            const yOffset = (y - 0.5) * speed;
            shape.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
        });
    });
</script>
@endpush