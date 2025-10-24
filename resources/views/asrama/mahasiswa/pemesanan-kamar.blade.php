<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kamar - Asrama Quality</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato:wght@400;700&family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* ========================================
           CSS DASAR (SAMA SEPERTI HALAMAN LAIN)
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

        /* (Aturan .shape:nth-child(...) disembunyikan agar ringkas, asumsikan sama) */
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

        .fade-in-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ========================================
           CSS FORM PEMESANAN
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
        
        .booking-form-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px 40px;
            border: 2px solid rgba(255,255,255,0.3);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            max-width: 600px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease 0.4s both;
        }
        
        .booking-icon {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin: 0 auto 25px;
            color: #ff6b9d; 
            box-shadow: 0 10px 30px rgba(255,107,157,0.3);
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 0.95rem;
            font-family: 'Lato', sans-serif;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
        }

        .form-group input[type="date"],
        .form-group input[type="text"],
        .form-group select {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            background: rgba(0, 0, 0, 0.2);
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
        }

        .form-group input[readonly] {
            background: rgba(0, 0, 0, 0.4);
            color: rgba(255, 255, 255, 0.7);
            cursor: not-allowed;
            font-family: 'Lato', sans-serif;
            font-size: 1.05rem;
        }

        .form-group input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
        
        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '\f282';
            font-family: "bootstrap-icons";
            font-size: 1rem;
            color: white;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .form-group option {
            background: #333;
            color: white;
        }

        /* ==============================================
           BARU: Styling untuk Radio Button E-commerce
           ============================================== */
           .payment-method-group {
    display: grid; /* GANTI DARI 'block' MENJADI 'grid' */
    grid-template-columns: 1fr 1fr; /* Buat 2 kolom sama besar */
    gap: 15px; /* Jarak antar semua pilihan */
}

/* Ini adalah container untuk radio + logo + teks */
.payment-radio-small {
    display: flex; /* Sejajarkan item di dalamnya */
    align-items: center;
    padding: 15px;
    background: rgba(0, 0, 0, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    /* margin-bottom: 15px; */ /* HAPUS INI (sudah di-handle 'gap') */
    user-select: none;
}

/* .payment-radio-small:last-child {
    HAPUS 'margin-bottom: 0;' DARI SINI
    Rule ini bisa dihapus semua jika isinya hanya itu
} */

.payment-radio-small:hover {
    background: rgba(0, 0, 0, 0.4);
    border-color: rgba(255, 255, 255, 0.8);
}
        
        /* Style lingkaran radio button kustom */
        .payment-radio-small input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            
            width: 20px;
            height: 20px;
            min-width: 20px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            background-clip: content-box;
            padding: 3px; /* Jarak antara lingkaran luar dan dalam */
            transition: all 0.2s ease;
            margin-right: 15px; /* Jarak ke logo */
            cursor: pointer;
        }
        
        /* Tampilan lingkaran radio saat DIPILIH */
        .payment-radio-small input[type="radio"]:checked {
            background-color: #ff6b9d; /* Warna pink saat dipilih */
            border-color: #ff6b9d;
        }

        /* Style untuk label yang checked */
        .payment-radio-small:has(input[type="radio"]:checked) {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ff6b9d;
        }

        /* Logo kecil di samping radio button */
        .bank-logo-small {
            height: 25px; /* Ukuran logo dikecilkan */
            width: auto;
            margin-right: 15px; /* Jarak ke nama */
            object-fit: contain;
        }
        
        .bank-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            color: white;
            font-weight: 400;
        }
        
        /* Beri efek bold pada nama bank saat dipilih */
        .payment-radio-small input[type="radio"]:checked + .bank-logo-small + .bank-name {
            font-weight: 700;
        }
        /* --- Akhir Style Radio Button --- */
        
        
        .price-summary {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
        }
        .price-summary h3 {
            font-weight: 400;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            margin-bottom: 5px;
        }
        .price-summary h2 {
            font-weight: 800;
            font-size: 2.5rem;
            color: white;
            margin-top: 5px;
            transition: all 0.3s ease;
        }
        
        .submit-btn {
            background: #ff6b9d;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 15px 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 10px 30px rgba(255,107,157,0.3);
        }
        
        .submit-btn:hover {
            background: #c44569;
            transform: scale(1.02);
        }
        
        .submit-btn i {
            margin-left: 10px;
        }

        /* ========================================
           RESPONSIVE
           ======================================== */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
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
            .booking-form-card {
                padding: 20px;
            }
            .price-summary h2 {
                font-size: 2rem;
            }
            .submit-btn {
                font-size: 1rem;
            }
            
            /* Penyesuaian mobile untuk radio kecil */
            .payment-radio-small {
                padding: 12px;
            }
            .bank-logo-small {
                height: 15px;
            }
            .bank-name {
                font-size: 1rem;
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
                <img src="https://portaluniversitasquality.ac.id:6923/Project2/public/logo/logo_asrama.png" alt="Logo Asrama" class="logo-img">
            </div>
            
            <h2 class="page-title">Formulir Pemesanan Kamar</h2>
            <p class="subtitle">Silakan pilih tanggal masuk dan durasi tinggal Anda.</p>

            <form action="{{ route('kode-pembayaran') }}" method="GET" class="booking-form-card">
                <div class="booking-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>

                <div class="form-group">
                    <label for="tanggal_masuk">Pilih Tanggal Masuk</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" required>
                </div>

                <div class="form-group">
                    <label for="periode">Pilih Periode Tinggal</label>
                    <div class="select-wrapper">
                        <select id="periode" name="periode" required>
                            <option value="" disabled selected>— Pilih durasi —</option>
                            <option value="30_500000">1 Bulan (30 hari) - Rp 500.000</option>
                            <option value="90_1400000">3 Bulan (90 hari) - Rp 1.400.000</option>
                            <option value="180_2700000">6 Bulan (180 hari) - Rp 2.700.000</option>
                            <option value="365_5000000">1 Tahun (365 hari) - Rp 5.000.000</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal_keluar">Perkiraan Tanggal Keluar</label>
                    <input type="text" id="tanggal_keluar" name="tanggal_keluar" placeholder="Pilih tanggal & periode dahulu" readonly>
                </div>

                <div class="form-group">
                    <label>Pilih Metode Pembayaran</label>
                    <div class="payment-method-group">
    
                        <label class="payment-radio-small">
                            <input type="radio" name="metode_pembayaran" value="bca" required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1000px-Bank_Central_Asia.svg.png" alt="BCA" class="bank-logo-small">
                            <span class="bank-name"></span>
                        </label>
                        
                        <label class="payment-radio-small"> <input type="radio" name="metode_pembayaran" value="mandiri">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/512px-Bank_Mandiri_logo_2016.svg.png" alt="Mandiri" class="bank-logo-small">
                            <span class="bank-name"></span>
                        </label>
                        
                        <label class="payment-radio-small"> <input type="radio" name="metode_pembayaran" value="bri">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" alt="BRI" class="bank-logo-small">
                            <span class="bank-name"></span>
                        </label>
                        
                        <label class="payment-radio-small"> <input type="radio" name="metode_pembayaran" value="bni">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Bank_BNI_Logo.png" alt="BNI" class="bank-logo-small">
                            <span class="bank-name"></span>
                        </label>
                        
                    </div>
                </div>

                <div class="price-summary">
                    <h3>Total Pembayaran:</h3>
                    <h2 id="total-harga">Rp 0</h2>
                </div>
                
                <button type="submit" class="submit-btn">
                    Lanjutkan ke Pembayaran <i class="bi bi-arrow-right-circle-fill"></i>
                </button>
                
            </form>
            
            <div class="footer fade-in-section">
                <p>&copy; 2025 Universitas Quality. All rights reserved.</p>
                <p style="margin-top: 10px;">📍 Jalan Quality No. 1, Medan | 📞 (061) 123-4567 | ✉️ asrama@quality.ac.id</p>
            </div>

        </div>
    </div>

    <script>
        // Parallax effect on mouse move
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

        // Intersection Observer untuk fade-in saat scroll
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

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
        
        
        // ================================================
        // JAVASCRIPT: KALKULASI TANGGAL & HARGA
        // ================================================
        
        const tanggalMasukEl = document.getElementById('tanggal_masuk');
        const tanggalKeluarEl = document.getElementById('tanggal_keluar');
        const periodeSelectEl = document.getElementById('periode');
        const totalHargaEl = document.getElementById('total-harga');

        function formatRupiah(angka) {
            if (!angka || isNaN(angka)) return 'Rp 0';
            return 'Rp ' + parseInt(angka).toLocaleString('id-ID');
        }

        function formatDateIDN(date) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }

        function updateBookingDetails() {
            const entryDateValue = tanggalMasukEl.value;
            const periodValue = periodeSelectEl.value;

            if (entryDateValue && periodValue) {
                const parts = periodValue.split('_');
                const daysToAdd = parseInt(parts[0]);
                const price = parseInt(parts[1]);

                const dateParts = entryDateValue.split('-');
                const entryDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);

                const exitDate = new Date(entryDate);
                exitDate.setDate(entryDate.getDate() + daysToAdd);
                
                tanggalKeluarEl.value = formatDateIDN(exitDate);
                totalHargaEl.innerText = formatRupiah(price);
                
            } else {
                if (!entryDateValue) {
                    tanggalKeluarEl.value = "Pilih tanggal masuk dahulu";
                } else if (!periodValue) {
                    tanggalKeluarEl.value = "Pilih periode tinggal dahulu";
                }
                totalHargaEl.innerText = 'Rp 0';
            }
        }

        tanggalMasukEl.addEventListener('change', updateBookingDetails);
        periodeSelectEl.addEventListener('change', updateBookingDetails);
        
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("tanggal_masuk").setAttribute('min', today);

    </script>
</body>
</html>