<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Admin - Asrama Quality</title>

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

        .subtitle {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            margin: -10px auto 40px; /* Margin atas dikecilkan */
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
            CSS BARU UNTUK HALAMAN KONTAK
            (Menggunakan style dari halaman pembayaran)
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
        
        /* Kartu utama (style dari .payment-card) */
        .contact-card {
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
        .contact-icon {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin: 0 auto 25px; /* Pusatkan ikon */
            color: #ff6b9d; /* Warna pink sesuai brand */
            box-shadow: 0 10px 30px rgba(255,107,157,0.3);
        }
        
        /* Teks instruksi di dalam kartu */
        .instruction-text {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            text-align: center;
            margin-bottom: 30px;
            margin-top: -10px; /* Angkat sedikit */
        }

        /* Daftar rincian kontak (style dari .payment-info) */
        .contact-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .contact-info li {
            display: flex;
            flex-direction: column; /* Susun label di atas value */
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .contact-info li:last-child {
            border-bottom: none;
        }
        
        /* Label (seperti "WhatsApp", "Email") */
        .contact-info .label {
            display: block;
            font-size: 0.95rem;
            font-family: 'Lato', sans-serif;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 8px;
        }
        
        /* Value (data kontak) */
        .contact-info .value {
            font-size: 1.2rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        /* Style untuk link di dalam value */
        .contact-info .value a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }
        
        .contact-info .value a:hover {
            text-decoration: underline;
            opacity: 0.8;
        }
        
        /* Tombol/Link untuk kembali (style dari .back-link) */
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
            .page-title {
                font-size: 2rem;
            }
            .contact-card {
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
            
            <h2 class="page-title">Butuh Bantuan?</h2>
            <p class="subtitle">
                Kami siap membantu jika Anda mengalami kendala pendaftaran.
            </p>

            <div class="contact-card">
                <div class="contact-icon">
                    <i class="bi bi-headset"></i> </div>
                
                <p class="instruction-text">
                    Silakan hubungi kami melalui salah satu saluran di bawah ini pada jam kerja (Senin - Jumat, 08:00 - 16:00 WIB).
                </p>

                <ul class="contact-info">
                    <li>
                        <span class="label">WhatsApp (Respon Cepat)</span>
                        <span class="value">
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Asrama%20Quality,%20saya%20butuh%20bantuan%20pendaftaran." target="_blank">
                                0812-3456-7890
                            </a>
                        </span>
                    </li>
                    <li>
                        <span class="label">Email Resmi</span>
                        <span class="value">
                            <a href="mailto:asrama@quality.ac.id">
                                asrama@quality.ac.id
                            </a>
                        </span>
                    </li>
                    <li>
                        <span class="label">Kunjungi Kami (Jam Kerja)</span>
                        <span class="value" style="font-size: 1.1rem; line-height: 1.5;">
                            Jalan Quality No. 1, Medan
                        </span>
                    </li>
                </ul>
            </div>
            
            <a href="index.html" class="back-link fade-in-section">Kembali ke Beranda</a>

            <div class="footer fade-in-section">
                <p>&copy; 2025 Universitas Quality. All rights reserved.</p>
                <p style="margin-top: 10px;">📍 Jalan Quality No. 1, Medan | 📞 (061) 123-4567 | ✉️ asrama@quality.ac.id</p>
            </div>

        </div>
    </div>

    <script>
        // Parallax effect on mouse move (dari kode asli Anda)
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

        // Intersection Observer untuk fade-in saat scroll (dari kode asli Anda)
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