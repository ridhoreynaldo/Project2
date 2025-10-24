<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - Asrama Quality</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato:wght@400;700&family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* ========================================
           SEMUA CSS DARI HALAMAN UTAMA ANDA
           (Tidak ada yang diubah di sini)
           ======================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lato', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            color: white;
            background: linear-gradient(-45deg, #0f172a, #c44569, #0f172a, #ff6b9d);
            background-size: 200% 200%;
            animation: animatedGradient 25s ease infinite;
        }
        
        @keyframes animatedGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
        .logo {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            background: white;
            animation-name: float;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }

        .shape:nth-child(1) { width: 100px; height: 100px; border-radius: 50%; top: 20%; left: 10%; animation-duration: 15s; animation-delay: 0s; }
        .shape:nth-child(2) { width: 120px; height: 120px; border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; top: 60%; left: 80%; animation-duration: 17s; animation-delay: 2s; }
        .shape:nth-child(3) { width: 100px; height: 100px; border-radius: 50%; top: 40%; left: 70%; animation-duration: 14s; animation-delay: 4s; }
        .shape:nth-child(4) { width: 60px; height: 60px; border-radius: 50%; top: 80%; left: 20%; animation-duration: 16s; animation-delay: 1s; }
        .shape:nth-child(5) { width: 40px; height: 40px; border-radius: 50%; top: 50%; left: 45%; animation-duration: 12s; animation-delay: 3s; opacity: 0.15; }
        .shape:nth-child(6) { width: 30px; height: 30px; border-radius: 50%; top: 10%; left: 30%; animation-duration: 10s; animation-delay: 5s; }
        .shape:nth-child(7) { width: 50px; height: 50px; border-radius: 30% 70% 40% 60%; top: 75%; left: 50%; animation-duration: 18s; animation-delay: 6s; }
        .shape:nth-child(8) { width: 35px; height: 35px; border-radius: 50%; top: 90%; left: 35%; animation-duration: 11s; animation-delay: 7s; opacity: 0.05; }
        .shape:nth-child(9) { width: 60px; height: 60px; border-radius: 70% 30% 50% 50%; top: 5%; left: 60%; animation-duration: 19s; animation-delay: 8s; }
        .shape:nth-child(10) { width: 45px; height: 45px; border-radius: 50%; top: 45%; left: 5%; animation-duration: 13s; animation-delay: 9s; }

        .container {
            position: relative;
            z-index: 10;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            text-align: center;
        }

        .logo {
            width: 170px;
            height: 170px;
            margin: 0 auto 30px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: bold;
            color: #ff6b9d;
            box-shadow: 0 20px 60px rgba(255,107,157,0.4);
            overflow: hidden;
        }
        .logo-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            display: block;
        }

        /* Subtitle dari halaman utama, akan kita gunakan lagi */
        .subtitle {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            margin: 0 auto 50px;
            max-width: 600px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease 0.2s both;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .footer {
            margin-top: 80px;
            padding-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.8); 
        }

        /* CSS untuk Animasi Fade-in saat Scroll */
        .fade-in-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            .logo {
                width: 120px;
                height: 120px;
            }
            .subtitle {
                font-size: 1.1rem;
            }
        }
        
        /* ========================================
           CSS BARU UNTUK HALAMAN PEMBAYARAN
           ======================================== */
        
        /* Judul baru untuk halaman ini */
        .page-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 2.5rem; /* Sedikit lebih kecil dari 'Dancing Script' h1 */
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: fadeInUp 0.8s ease;
        }
        
        /* Menggunakan style .subtitle untuk batas waktu */
        .deadline-text {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            margin: -20px auto 40px;
            max-width: 600px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease 0.2s both;
        }
        
        /* Kartu utama untuk detail pembayaran */
        .payment-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px 40px;
            border: 2px solid rgba(255,255,255,0.3);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            max-width: 600px; /* Batasi lebar kartu */
            margin: 0 auto; /* Pusatkan kartu */
            text-align: left; /* Ratakan teks di dalam kartu ke kiri */
            animation: fadeInUp 0.8s ease 0.4s both;
        }
        
        /* Ikon di atas kartu pembayaran */
        .payment-icon {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin: 0 auto 25px; /* Pusatkan ikon */
            color: #ff6b9d; 
            box-shadow: 0 10px 30px rgba(255,107,157,0.3);
        }

        /* Daftar rincian pembayaran */
        .payment-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .payment-info li {
            display: flex;
            flex-direction: column; /* Susun label di atas value */
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .payment-info li:last-child {
            border-bottom: none; /* Hapus garis di item terakhir */
        }
        
        /* Label (seperti "Nama", "Total Tagihan") */
        .payment-info .label {
            display: block;
            font-size: 0.95rem;
            font-family: 'Lato', sans-serif;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 8px;
        }
        
        /* Value (data sebenarnya) */
        .payment-info .value {
            font-size: 1.2rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            color: white;
        }
        
        /* Style khusus untuk harga */
        .payment-info .value.price {
            font-size: 1.6rem;
            font-weight: 800;
            color: white; /* Bisa juga diganti #fff2a3 (kuning muda) jika ingin menonjol */
        }

        /* Blok khusus untuk Nomor VA dan Tombol Salin */
        .va-block {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.2); /* Latar belakang gelap agar kontras */
            border-radius: 10px;
            padding: 12px 15px;
            margin-top: 5px;
        }
        
        .va-number {
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Poppins', sans-serif;
            color: white;
            margin: 0;
            flex-grow: 1; /* Ambil sisa ruang */
        }
        
        .copy-btn {
            background: #ff6b9d;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            margin-left: 15px; /* Jarak dari nomor VA */
            flex-shrink: 0; /* Jangan susutkan tombol */
        }
        
        .copy-btn:hover {
            background: #c44569;
            transform: scale(1.05);
        }
        
        .copy-btn i {
            margin-right: 5px;
        }
        
        /* Teks instruksi di bawah */
        .instruction-text {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-top: 30px;
            text-align: center;
        }
        
        /* Tombol/Link untuk kembali */
        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: white;
            text-decoration: none;
            border: 2px solid rgba(255, 255, 255, 0.5);
            padding: 12px 25px;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }
        
        .back-link:hover {
            background: white;
            color: #ff6b9d;
            border-color: white;
        }

        /* Responsif untuk kartu pembayaran di mobile */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            .deadline-text {
                font-size: 1rem;
            }
            .payment-card {
                padding: 20px;
            }
            .va-block {
                flex-direction: column; /* Susun nomor VA di atas tombol */
                align-items: stretch;
            }
            .va-number {
                text-align: center;
                font-size: 1.2rem;
                margin-bottom: 10px;
            }
            .copy-btn {
                margin-left: 0;
            }
        }

    </style>
</head>
<body>
    <div class="hero">
        <div class="floating-shapes">
            <div class="shape"></div> <div class="shape"></div> <div class="shape"></div>
            <div class="shape"></div> <div class="shape"></div> <div class="shape"></div>
            <div class="shape"></div> <div class="shape"></div> <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <div class="container">
            
            <div class="logo">
                <img src="{{ asset('logo/logo_asrama.png') }}" alt="Logo Asrama" class="logo-img">
            </div>
            
            <h2 class="page-title">Selesaikan Pembayaran Anda</h2>
            <p class="deadline-text">
                Batas Waktu Pembayaran: <strong>Kamis, 23 Oktober 2025, 11:00 WIB</strong>
            </p>

            <div class="payment-card">
                <div class="payment-icon">
                    <i class="bi bi-hourglass-split"></i>
                </div>

                <ul class="payment-info">
                    <li>
                        <span class="label">Nama Pendaftar</span>
                        <span class="value">Ridho Reynaldo</span>
                    </li>
                    <li>
                        <span class="label">Total Tagihan</span>
                        <span class="value price">Rp 1.500.000</span>
                    </li>
                    <li>
                        <span class="label">Nomor Virtual Account (BCA)</span>
                        <div class="va-block">
                            <span class="va-number" id="vaNumber">8808 1234 5678 9012</span>
                            <button class="copy-btn" id="copyButton">
                                <i class="bi bi-clipboard"></i> Salin
                            </button>
                        </div>
                    </li>
                </ul>

                <p class="instruction-text">
                    Silakan selesaikan pembayaran ke nomor virtual account di atas melalui ATM, m-Banking, atau i-Banking BCA Anda.
                </p>
            </div>
            
            <a href="index.html" class="back-link fade-in-section">Kembali ke Beranda</a>

            <div class="footer fade-in-section">
                <p>&copy; 2025 Universitas Quality. All rights reserved.</p>
                <p style="margin-top: 10px;">📍 Jalan Quality No. 1, Medan | 📞 (061) 123-4567 | ✉️ asrama@quality.ac.id</p>
            </div>

        </div>
    </div>

    <script>
        // ... (Semua kode JS Anda yang lain di atas ini) ...
        
        // ========================================
        // JAVASCRIPT BARU UNTUK TOMBOL SALIN (LEBIH KUAT)
        // ========================================
        const copyButton = document.getElementById('copyButton');
        const vaNumber = document.getElementById('vaNumber');

        /**
         * Fungsi untuk menyalin teks ke clipboard yang berfungsi di
         * konteks aman (https) dan tidak aman (http).
         */
        function copyTextToClipboard(text) {
            // Coba metode modern (aman) terlebih dahulu
            if (navigator.clipboard && window.isSecureContext) {
                return navigator.clipboard.writeText(text);
            } else {
                // Metode fallback (cara lama) untuk http atau browser lama
                return new Promise((resolve, reject) => {
                    let textArea = document.createElement("textarea");
                    textArea.value = text;
                    
                    // Sembunyikan textarea
                    textArea.style.position = "fixed";
                    textArea.style.top = "-9999px";
                    textArea.style.left = "-9999px";

                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();

                    try {
                        const successful = document.execCommand('copy');
                        if (successful) {
                            resolve();
                        } else {
                            reject(new Error('Gagal menyalin'));
                        }
                    } catch (err) {
                        reject(err);
                    } finally {
                        document.body.removeChild(textArea);
                    }
                });
            }
        }

        copyButton.addEventListener('click', () => {
            // Ambil teks dari nomor VA
            const textToCopy = vaNumber.innerText.replace(/\s/g, ''); // Hapus spasi
            
            // Gunakan fungsi copy yang baru
            copyTextToClipboard(textToCopy).then(() => {
                // Berhasil
                const originalText = copyButton.innerHTML;
                copyButton.innerHTML = '<i class="bi bi-check-lg"></i> Tersalin!';
                copyButton.style.background = "#28a745"; // Warna hijau sukses
                
                // Kembalikan ke teks asli setelah 2 detik
                setTimeout(() => {
                    copyButton.innerHTML = originalText;
                    copyButton.style.background = "#ff6b9d"; // Warna pink asli
                }, 2000);
                
            }).catch(err => {
                // Gagal (jarang terjadi)
                console.error('Gagal menyalin: ', err);
                alert('Gagal menyalin nomor VA.');
            });
        });

    </script>
</body>
</html>
</body>
</html>