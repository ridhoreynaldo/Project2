<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Perpanjang Kamar - Asrama Quality</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato:wght@400;700&family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* ========================================
            1. CSS DASAR & LATAR BELAKANG (SAMA)
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

        /* Logo dari halaman pembayaran */
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

        .footer {
            margin-top: 80px;
            padding-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.8); 
        }

        .fade-in-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ========================================
            2. CSS BARU UNTUK HALAMAN PERPANJANGAN
            ======================================== */
        
        .page-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 2.5rem;
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: fadeInUp 0.8s ease;
        }

        /* Subtitle */
        .subtitle {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin: -10px auto 40px;
            max-width: 600px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease 0.2s both;
        }
        
        /* Kartu utama (style dari .payment-card) */
        .form-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px 40px;
            border: 2px solid rgba(255,255,255,0.3);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            max-width: 600px;
            margin: 0 auto;
            text-align: left; /* Ratakan teks di dalam kartu ke kiri */
            animation: fadeInUp 0.8s ease 0.4s both;
        }
        
        /* Ikon (style dari .payment-icon) */
        .form-icon {
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
        
        /* Daftar rincian info (style dari .payment-info) */
        .form-info {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .form-info li {
            display: flex;
            flex-direction: column; 
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.2);
        }
        
        .form-info li:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        .form-info .label {
            display: block;
            font-size: 0.95rem;
            font-family: 'Lato', sans-serif;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 8px;
        }
        
        .form-info .value {
            font-size: 1.2rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            color: white;
        }
        
        /* Grup Form untuk Dropdown */
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            font-size: 1.1rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: white;
            margin-bottom: 12px;
            display: block;
        }
        
        .form-group select {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: 2px solid rgba(255,255,255,0.5);
            background: rgba(0,0,0,0.2);
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            appearance: none; /* Hilangkan style default browser */
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 1.2em;
        }
        
        .form-group select:focus {
            outline: none;
            border-color: #ff6b9d;
            box-shadow: 0 0 15px rgba(255,107,157,0.3);
        }

        /* Blok Total Tagihan */
        .total-price {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 25px;
            margin-top: 30px;
            text-align: center;
        }
        
        .total-price .label {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
        }
        
        .total-price .price-value {
            font-size: 2.2rem;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            color: #fff2a3; /* Kuning muda menonjol */
            text-shadow: 0 0 10px rgba(255, 242, 163, 0.5);
        }
        
        /* Tombol Call to Action (CTA) */
        .cta-button {
            display: block; /* Buat tombol jadi full-width */
            width: 100%;
            background: #ff6b9d;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(255,107,157,0.3);
            margin-top: 30px;
        }
        
        .cta-button:hover {
            background: #c44569;
            transform: scale(1.02);
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

        /* Responsif */
        @media (max-width: 768px) {
            .logo {
                width: 120px;
                height: 120px;
            }
            .page-title {
                font-size: 2rem;
            }
            .subtitle {
                font-size: 1.1rem;
            }
            .form-card {
                padding: 20px;
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
                <img src="/logo/logo_asrama.png" alt="Logo Asrama" class="logo-img">
            </div>
            
            <h2 class="page-title">Perpanjang Masa Tinggal</h2>
            <p class="subtitle">
                Pilih durasi perpanjangan untuk kamar Anda saat ini.
            </p>

            <div class="form-card">
                <div class="form-icon">
                    <i class="bi bi-calendar-plus"></i> </div>
                
                <ul class="form-info">
                    <li>
                        <span class="label">Nama Mahasiswa</span>
                        <span class="value">Ridho Reynaldo</span>
                    </li>
                    <li>
                        <span class="label">Kamar Saat Ini</span>
                        <span class="value">Gedung A - Kamar 101</span>
                    </li>
                    <li>
                        <span class="label">Masa Tinggal Berakhir</span>
                        <span class="value">31 Desember 2025</span>
                    </li>
                </ul>

                <form action="/proses-perpanjangan" method="POST">
                    <div class="form-group">
                        <label for="durasi">Pilih Durasi Perpanjangan</label>
                        <select id="durasi" name="durasi_perpanjangan">
                            <option value="0" data-price="0">-- Pilih Durasi --</option>
                            <option value="6" data-price="1500000">6 Bulan (Rp 1.500.000)</option>
                            <option value="12" data-price="2800000">1 Tahun (Rp 2.800.000)</option>
                        </select>
                    </div>

                    <div class="total-price">
                        <span class="label">Total Tagihan</span>
                        <span class="price-value" id="totalTagihan">Rp 0</span>
                    </div>

                    <button type="submit" class="cta-button">
                        Lanjutkan ke Pembayaran
                    </button>
                </form>
            </div>
            
            <a href="dashboard.html" class="back-link fade-in-section">Kembali ke Dashboard</a>

            <div class="footer fade-in-section">
                <p>&copy; 2025 Universitas Quality. All rights reserved.</p>
                <p style="margin-top: 10px;">📍 Jalan Quality No. 1, Medan | 📞 (061) 123-4567 | ✉️ asrama@quality.ac.id</p>
            </div>

        </div>
    </div>

    <script>
        // Parallax effect (SAMA)
        document.addEventListener('mousemove', (e) => {
            const shapes = document.querySelectorAll('.shape');
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            shapes.forEach((shape, index) => {
                const speed = (index + 1) * 10;
                const xOffset = (x - 0.5) * speed;
                const yOffset = (y - 0.5) * speed;
                if (shape.closest('.hero')) {
                    shape.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
                }
            });
        });

        // Intersection Observer (SAMA)
        const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        document.querySelectorAll('.fade-in-section').forEach(section => {
            observer.observe(section);
        });
        
        // ========================================
        // JAVASCRIPT BARU UNTUK UPDATE HARGA
        // ========================================
        
        const durasiSelect = document.getElementById('durasi');
        const totalTagihan = document.getElementById('totalTagihan');

        // Fungsi untuk format mata uang Rupiah
        function formatRupiah(angka) {
            let number_string = angka.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                
            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return 'Rp ' + rupiah;
        }

        // Event listener saat dropdown berubah
        durasiSelect.addEventListener('change', (e) => {
            // Ambil elemen <option> yang sedang dipilih
            const selectedOption = e.target.options[e.target.selectedIndex];
            
            // Ambil nilai dari atribut 'data-price'
            const price = selectedOption.getAttribute('data-price');
            
            // Ubah teks di totalTagihan
            totalTagihan.innerText = formatRupiah(price);
        });

    </script>
</body>
</html>