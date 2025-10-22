<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Asrama - Universitas Quality</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato:wght@400;700&family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
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

        /* Font 'Poppins' untuk judul kartu, fitur, dll. */
        h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
        /* Font 'Poppins' juga untuk Teks Logo (jika tidak ada gambar) */
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
            padding: 40px 0; /* Menambah padding untuk layar pendek */
        }

        /* ========================================
           SARAN 1: Hapus animasi garis diagonal
           Blok .hero::before dan @keyframes slide di bawah ini
           sudah dikomentari (dinonaktifkan) untuk mengurangi 'noise'.
        ======================================== */
        /*
        .hero::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255,255,255,.03) 10px,
                rgba(255,255,255,.03) 20px
            );
            animation: slide 20s linear infinite;
        }

        @keyframes slide {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        */

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 1;
        }

        /* ========================================
         2. CSS BARU UNTUK 10 GELEMBUNG "CUTE" 
        ========================================
        */
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

        /* Aturan untuk 10 gelembung */
        .shape:nth-child(1) {
            width: 100px; height: 100px; border-radius: 50%;
            top: 20%; left: 10%;
            animation-duration: 15s; animation-delay: 0s;
        }
        .shape:nth-child(2) {
            width: 120px; height: 120px; border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            top: 60%; left: 80%;
            animation-duration: 17s; animation-delay: 2s;
        }
        .shape:nth-child(3) {
            width: 100px; height: 100px; border-radius: 50%;
            top: 40%; left: 70%;
            animation-duration: 14s; animation-delay: 4s;
        }
        .shape:nth-child(4) {
            width: 60px; height: 60px; border-radius: 50%;
            top: 80%; left: 20%;
            animation-duration: 16s; animation-delay: 1s;
        }
        .shape:nth-child(5) {
            width: 40px; height: 40px; border-radius: 50%;
            top: 50%; left: 45%;
            animation-duration: 12s; animation-delay: 3s;
            opacity: 0.15;
        }
        .shape:nth-child(6) {
            width: 30px; height: 30px; border-radius: 50%;
            top: 10%; left: 30%;
            animation-duration: 10s; animation-delay: 5s;
        }
        .shape:nth-child(7) {
            width: 50px; height: 50px; border-radius: 30% 70% 40% 60%;
            top: 75%; left: 50%;
            animation-duration: 18s; animation-delay: 6s;
        }
        .shape:nth-child(8) {
            width: 35px; height: 35px; border-radius: 50%;
            top: 90%; left: 35%;
            animation-duration: 11s; animation-delay: 7s;
            opacity: 0.05;
        }
        .shape:nth-child(9) {
            width: 60px; height: 60px; border-radius: 70% 30% 50% 50%;
            top: 5%; left: 60%;
            animation-duration: 19s; animation-delay: 8s;
        }
        .shape:nth-child(10) {
            width: 45px; height: 45px; border-radius: 50%;
            top: 45%; left: 5%;
            animation-duration: 13s; animation-delay: 9s;
        }
        /* --- Akhir CSS Gelembung --- */


        .container {
            position: relative;
            z-index: 10;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            text-align: center;
        }

        /* ========================================
         1. PERBAIKAN CSS LOGO 
        ========================================
        */
        .logo {
            width: 170px; /* Ukuran container logo */
            height: 170px; /* Ukuran container logo */
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
            /* animation: pulse 2s infinite; */ /* <-- SARAN 3: Animasi pulse dihapus agar lebih tenang */
            overflow: hidden; /* Ditambahkan agar gambar terpotong rapi */
        }
        .logo-img {
            height: 100%; /* Disesuaikan agar pas */
            width: 100%; /* Disesuaikan agar pas */
            object-fit: cover; /* Memastikan gambar mengisi lingkaran */
            display: block;
        }
        /* --- Akhir Perbaikan Logo --- */


        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Teks Judul dengan Font Dancing Script */
        h1 {
            font-family: 'Dancing Script', cursive;
            font-weight: 700;
            font-size: 4rem; /* Disesuaikan untuk desktop */
            color: white;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: fadeInUp 0.8s ease;
        }

        /* Teks Subtitle yang 'Feminim' */
        .subtitle {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 1.5rem; /* Disesuaikan untuk desktop */
            color: rgba(255, 255, 255, 0.9);
            margin: 0 auto 50px; /* Diberi margin auto */
            max-width: 600px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease 0.2s both;
        }
        
        .subtitle::before, .subtitle::after {
            content: "—";
            margin: 0 10px;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 30px;
            border: 2px solid rgba(255,255,255,0.3);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease both;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
        }

        .card:nth-child(1) { animation-delay: 0.4s; }
        .card:nth-child(2) { animation-delay: 0.6s; }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .card:hover::before { left: 100%; }

        .card:hover {
            background: rgba(255,255,255,0.15);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .card-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin-bottom: 20px;
            transition: transform 0.4s;
            color: #ff6b9d; 
        }

        .card:hover .card-icon {
            transform: rotate(360deg) scale(1.1);
        }

        .card h2 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .card p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: rgba(255,255,255,0.8);
        }

        .features {
            margin-top: 80px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .feature {
            background: rgba(255,255,255,0.05);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s;
            text-align: left;
        }

        .feature:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 30px;
            margin-bottom: 10px;
            color: white;
        }

        .feature h3 {
            color: white;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .feature p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
        }

        .footer {
            margin-top: 80px;
            padding-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
            /* SARAN 2: Kontras dinaikkan dari 0.6 ke 0.8 agar lebih mudah dibaca */
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

        /* ========================================
         3. OPTIMASI TAMPILAN MOBILE (HP)
        ========================================
        */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px; /* Kurangi padding atas/bawah */
            }

            .logo {
                width: 120px; /* Kecilkan logo */
                height: 120px;
            }

            h1 {
                font-size: 2.8rem; /* Sesuaikan font Dancing Script */
            }
            
            .subtitle {
                font-size: 1.1rem; /* Kecilkan subtitle */
            }

            /* Hilangkan tanda hubung di subtitle pada mobile */
            .subtitle::before, .subtitle::after {
                display: none;
            }

            .cards-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <div class="container">
            <div class="logo">
                <img src="https://portaluniversitasquality.ac.id:6923/Project2/public/logo/logo_asrama.png" alt="Logo Asrama" class="logo-img">
            </div>
            
            <h1>Selamat Datang di Asrama Putri</h1>
            <p class="subtitle">Rumah keduamu untuk tumbuh, berkarya, dan berbagi cerita.</p>

            <div class="cards-container">
                <a href="http://192.168.40.154:8000/login" class="card">
                    <div class="card-icon"><i class="bi bi-person-lines-fill"></i></div>
                    <h2>Pendaftaran Asrama</h2>
                    <p>Daftar untuk menempati asrama putri dengan fasilitas lengkap dan nyaman</p>
                </a>

                <a href="http://192.168.40.154:8000/informasi" class="card">
                    <div class="card-icon"><i class="bi bi-info-circle-fill"></i></div>
                    <h2>Informasi Asrama</h2>
                    <p>Lihat informasi lengkap tentang fasilitas, harga, dan peraturan asrama putri</p>
                </a>
            </div>

            <div class="features fade-in-section">
                <div class="feature">
                    <div class="feature-icon"><i class="bi bi-person-standing-dress"></i></div>
                    <h3>Kamar Nyaman</h3>
                    <p>Kamar ber-AC dengan kasur empuk dan lemari pribadi khusus putri</p>
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

            <div class="footer fade-in-section">
                <p>&copy; 2025 Universitas Quality. All rights reserved.</p>
                <p style="margin-top: 10px;">📍 Jalan Quality No. 1, Medan | 📞 (061) 123-4567 | ✉️ asrama@quality.ac.id</p>
            </div>
        </div>
    </div>

    <script>
        // (JavaScript Anda sudah bagus, tidak perlu diubah)

        // Parallax effect on mouse move
        document.addEventListener('mousemove', (e) => {
            const shapes = document.querySelectorAll('.shape');
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;

            shapes.forEach((shape, index) => {
                const speed = (index + 1) * 10; // Sedikit diperhalus
                const xOffset = (x - 0.5) * speed;
                const yOffset = (y - 0.5) * speed;
                if (shape.closest('.hero')) {
                   shape.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
                }
            });
        });

        // Card tilt effect
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 20; 
                const rotateY = (centerX - x) / 20;
                
                card.style.transform = `translateY(-10px) scale(1.02) perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
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
    </script>
</body>
</html>