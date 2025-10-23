@extends('layouts.app')

@section('title', 'Informasi - Asrama Quality')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/informasi.css') }}">
@endpush

@section('content')
    <div class="header">
        <a href="{{ route('landing-page') }}" class="back-button">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <div class="logo">
            <img src="{{ asset('logo/logo_asrama.png') }}" alt="Logo Asrama" class="logo-img">
        </div>
        
        <h1>Informasi Asrama Putri Universitas Quality</h1>
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
                    <li>Tempat tidur</li>
                    <li>Lemari pakaian pribadi</li>
                    <li>Meja belajar dan kursi</li>
                </ul>
            </div>
        
            <!-- Kamar Mandi -->
            <div class="info-card fade-in">
                <div class="info-card-header">
                    <div class="info-icon"><i class="bi bi-droplet-fill"></i></div>
                    <h3>Kamar Mandi</h3>
                </div>
                <ul>
                    <li>Kamar mandi bersih dan terawat</li>
                    <li>Dibersihkan secara rutin</li>
                </ul>
            </div>
        
            <!-- Fasilitas Umum -->
            <div class="info-card fade-in">
                <div class="info-card-header">
                    <div class="info-icon"><i class="bi bi-people-fill"></i></div>
                    <h3>Fasilitas Umum</h3>
                </div>
                <ul>
                    <li>WiFi gratis</li>
                    <li>Dapur bersama</li>
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
                    <li>Area parkir khusus dengan pengawasan</li>
                </ul>
            </div>
        
            <!-- Kurikulum & Pembinaan Asrama -->
            <div class="info-card fade-in">
                <div class="info-card-header">
                    <div class="info-icon"><i class="bi bi-book-half"></i></div>
                    <h3>Kurikulum Asrama</h3>
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
            <h2><i class="bi bi-tag-fill"></i> Uang Pengganti Asrama</h2>
            <p style="color: rgba(255,255,255,0.85); margin-bottom: 20px;">
                Harga terjangkau dengan fasilitas premium untuk kenyamanan Anda
            </p>
            
            <div class="price-cards">
                <div class="price-card">
                    <h4>Per Bulan</h4>
                    <div class="price">Rp 400K</div>
                    <p class="price-period">Bayar setiap bulan</p>
                </div>

                <div class="price-card">
                    <h4>Per Semester</h4>
                    <div class="price">Rp 2,2 Jt</div>
                    <p class="price-period">Hemat Rp 200K</p>
                </div>

                <div class="price-card">
                    <h4>Per Tahun</h4>
                    <div class="price">Rp 4,2 Jt</div>
                    <p class="price-period">Hemat Rp 400K</p>
                </div>
            </div>

            <p style="margin-top: 25px; font-size: 0.95rem; color: rgba(255,255,255,0.75);">
                * Harga sudah termasuk listrik, air, WiFi, dan pemeliharaan fasilitas
            </p>
        </div>

        <!-- Tata Tertib Section -->
        <div class="rules-section fade-in">
            <h2><i class="bi bi-journal-text"></i> Tata Tertib Asrama</h2>
            
            <!-- Kehidupan Asrama -->
            <div class="rules-category">
                <h3><i class="bi bi-house-heart-fill"></i> Kehidupan Asrama</h3>
                <div class="rules-grid">
                    <div class="rule-item">
                        <h4><i class="bi bi-sparkles"></i> Kebersihan & Kenyamanan</h4>
                        <p>Penghuni wajib menjaga kebersihan, ketertiban, keamanan, dan kenyamanan bersama di seluruh area asrama.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-clock"></i> Jam Malam</h4>
                        <p>Wajib mematuhi jam malam pukul 22.00 WIB. Izin khusus dapat diperoleh dari pengurus asrama.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-lightning-charge"></i> Penggunaan Utilitas</h4>
                        <p>Gunakan listrik, air, dan internet secara bijak. Tidak berlebihan dan tidak merugikan penghuni lain.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-calendar-check"></i> Piket Kebersihan</h4>
                        <p>Setiap penghuni wajib ikut serta dalam kegiatan kebersihan lingkungan sesuai jadwal yang ditentukan.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-person-check"></i> Akses Tamu</h4>
                        <p>Asrama hanya untuk penghuni terdaftar. Tamu tidak diperkenankan masuk tanpa izin dari pengurus.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-heart"></i> Etika & Sopan Santun</h4>
                        <p>Wajib menjaga sopan santun, etika, dan tata krama dalam berbicara maupun bertindak.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-exclamation-triangle"></i> Pelaporan</h4>
                        <p>Segala kerusakan atau kondisi tidak wajar di kamar/area asrama wajib dilaporkan segera.</p>
                    </div>
                </div>
            </div>

            <!-- Fasilitas Bersama -->
            <div class="rules-category">
                <h3><i class="bi bi-people"></i> Fasilitas Bersama</h3>
                <div class="rules-grid">
                    <div class="rule-item">
                        <h4><i class="bi bi-cup-hot"></i> Ketentuan Dapur</h4>
                        <p>Setelah digunakan, wajib membersihkan dan mengembalikan kondisi seperti semula. Tidak meninggalkan peralatan atau sampah.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-basket"></i> Penyimpanan Makanan</h4>
                        <p>Tidak boleh menyimpan bahan makanan berbau menyengat atau mudah busuk di area bersama.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-droplet"></i> Ketentuan Toilet</h4>
                        <p>Jaga kebersihan toilet. Tidak meninggalkan sampah atau membuang benda di kloset. Wajib menjaga kering dan higienis.</p>
                    </div>

                    <div class="rule-item">
                        <h4><i class="bi bi-tools"></i> Tanggung Jawab Kerusakan</h4>
                        <p>Kerusakan akibat kelalaian pengguna wajib diperbaiki atau diganti sesuai ketentuan pengurus.</p>
                    </div>
                </div>
            </div>

            <!-- Larangan -->
            <div class="rules-category prohibited">
                <h3><i class="bi bi-x-circle-fill"></i> Larangan Tegas</h3>
                <div class="rules-grid">
                    <div class="rule-item danger">
                        <h4><i class="bi bi-slash-circle"></i> Narkoba & Miras</h4>
                        <p>Dilarang keras membawa, menyimpan, atau mengonsumsi narkoba, minuman keras, serta obat terlarang.</p>
                    </div>

                    <div class="rule-item danger">
                        <h4><i class="bi bi-shield-x"></i> Senjata & Benda Berbahaya</h4>
                        <p>Dilarang membawa senjata tajam, senjata api, atau benda berbahaya lainnya.</p>
                    </div>

                    <div class="rule-item danger">
                        <h4><i class="bi bi-volume-mute"></i> Gangguan Ketertiban</h4>
                        <p>Dilarang berjudi, merokok di area terlarang, atau membuat kegaduhan yang mengganggu penghuni lain.</p>
                    </div>

                    <div class="rule-item danger">
                        <h4><i class="bi bi-person-x"></i> Akses Lawan Jenis</h4>
                        <p>Dilarang membawa lawan jenis masuk ke area asrama.</p>
                    </div>

                    <div class="rule-item danger">
                        <h4><i class="bi bi-exclamation-octagon"></i> Tindakan Kriminal</h4>
                        <p>Dilarang melakukan tindakan asusila, perkelahian, atau tindak kriminal.</p>
                    </div>

                    <div class="rule-item danger">
                        <h4><i class="bi bi-hammer"></i> Merusak Fasilitas</h4>
                        <p>Dilarang merusak, mencoret, atau memindahkan fasilitas tanpa izin pengurus.</p>
                    </div>

                    <div class="rule-item danger">
                        <h4><i class="bi bi-fire"></i> Barang Berbahaya</h4>
                        <p>Dilarang menyimpan barang berbahaya, berbau menyengat, atau mudah meledak di kamar.</p>
                    </div>

                    <div class="rule-item danger">
                        <h4><i class="bi bi-bug"></i> Hewan Peliharaan</h4>
                        <p>Dilarang memelihara hewan di kamar atau fasilitas umum.</p>
                    </div>

                    <div class="rule-item danger">
                        <h4><i class="bi bi-key"></i> Penyewaan Kamar</h4>
                        <p>Dilarang menyewakan atau menitipkan kamar kepada pihak lain.</p>
                    </div>
                </div>
            </div>

            <!-- Sanksi -->
            <div class="rules-category sanctions">
                <h3><i class="bi bi-clipboard-check"></i> Sanksi & Konsekuensi</h3>
                
                <div class="sanction-box light">
                    <h4><i class="bi bi-info-circle"></i> Pelanggaran Ringan</h4>
                    <p><strong>Contoh:</strong> Tidak membersihkan dapur/toilet, meninggalkan sampah, melanggar jam malam.</p>
                    <p><strong>Sanksi:</strong> Teguran lisan hingga teguran tertulis.</p>
                </div>

                <div class="sanction-box medium">
                    <h4><i class="bi bi-exclamation-triangle"></i> Pelanggaran Sedang</h4>
                    <p><strong>Contoh:</strong> Berulang kali tidak menjaga kebersihan, membuat kegaduhan, merusak fasilitas ringan.</p>
                    <p><strong>Sanksi:</strong> Teguran tertulis, pembatasan fasilitas, laporan kepada wali dan ketua prodi, serta kewajiban memperbaiki/mengganti fasilitas rusak.</p>
                </div>

                <div class="sanction-box severe">
                    <h4><i class="bi bi-x-octagon"></i> Pelanggaran Berat</h4>
                    <p><strong>Contoh:</strong> Narkoba, miras, senjata, perjudian, tindakan asusila, membawa lawan jenis, merusak fasilitas sengaja, menolak ganti rugi.</p>
                    <p><strong>Sanksi:</strong> Pencabutan hak tinggal langsung. Wajib mengosongkan kamar maksimal 1x24 jam. Biaya tidak dikembalikan dan dilaporkan ke ketua prodi.</p>
                </div>

                <div class="sanction-box warning">
                    <h4><i class="bi bi-wrench"></i> Sanksi Kerusakan Fasilitas</h4>
                    <p>Segala kerusakan akibat kelalaian wajib diganti sesuai biaya perbaikan/penggantian. Penolakan memperbaiki = pencabutan hak tinggal.</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section fade-in">
            <a href="{{ route('login') }}" class="cta-button">
                <i class="bi bi-pencil-square"></i>
                Daftar Sekarang
            </a>
            <p style="margin-top: 20px; color: rgba(255,255,255,0.8);">
                Segera amankan tempat Anda di asrama putri kami! 🏠✨
            </p>
        </div>

        @include('partials.footer')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/informasi.js') }}"></script>
@endpush