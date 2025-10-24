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
        /* =========================================================
    GLOBAL RESET & BASE
    ========================================================= */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Lato', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow-x: hidden;
        color: white;
        background: linear-gradient(-45deg, #0f172a, #a8325c, #0f172a, #e05588);
        background-size: 200% 200%;
        animation: animatedGradient 25s ease infinite;
    }

    @keyframes animatedGradient {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    h2, h3, h4, h5, h6,
    .logo {
        font-family: 'Poppins', sans-serif;
    }

    /* =========================================================
    HERO SECTION
    ========================================================= */
    .hero {
        min-height: 100vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
    }

    /* Background diagonal stripes (soft noise effect) */
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
        0%   { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    /* =========================================================
    FLOATING SHAPES (CUTE BUBBLES)
    ========================================================= */
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
        50%      { transform: translateY(-30px) rotate(180deg); }
    }

    /* Individual bubble positions & timings */
    .shape:nth-child(1)  { width:100px; height:100px; border-radius:50%;                top:20%; left:10%;  animation:float 15s infinite 0s; }
    .shape:nth-child(2)  { width:120px; height:120px; border-radius:30% 70% 70% 30% / 30% 30% 70% 70%; top:60%; left:80%; animation:float 17s infinite 2s; }
    .shape:nth-child(3)  { width:100px; height:100px; border-radius:50%;                top:40%; left:70%;  animation:float 14s infinite 4s; }
    .shape:nth-child(4)  { width:60px;  height:60px;  border-radius:50%;                top:80%; left:20%;  animation:float 16s infinite 1s; }
    .shape:nth-child(5)  { width:40px;  height:40px;  border-radius:50%;                top:50%; left:45%;  opacity:0.15; animation:float 12s infinite 3s; }
    .shape:nth-child(6)  { width:30px;  height:30px;  border-radius:50%;                top:10%; left:30%;  animation:float 10s infinite 5s; }
    .shape:nth-child(7)  { width:50px;  height:50px;  border-radius:30% 70% 40% 60%;    top:75%; left:50%;  animation:float 18s infinite 6s; }
    .shape:nth-child(8)  { width:35px;  height:35px;  border-radius:50%;                top:90%; left:35%;  opacity:0.05; animation:float 11s infinite 7s; }
    .shape:nth-child(9)  { width:60px;  height:60px;  border-radius:70% 30% 50% 50%;    top:5%;  left:60%;  animation:float 19s infinite 8s; }
    .shape:nth-child(10) { width:45px;  height:45px;  border-radius:50%;                top:45%; left:5%;   animation:float 13s infinite 9s; }

    /* =========================================================
    CONTAINER
    ========================================================= */
    .container {
        position: relative;
        z-index: 10;
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
        text-align: center;
    }

    /* =========================================================
    LOGO
    ========================================================= */
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
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50%      { transform: scale(1.05); }
    }

    /* =========================================================
    TEXT STYLING
    ========================================================= */
    h1 {
        font-family: 'Dancing Script', cursive;
        font-weight: 700;
        font-size: 4rem;
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

    .subtitle::before,
    .subtitle::after {
        margin: 0 10px;
    }

    .subtitle2 {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1rem;
        color: rgba(255,255,255,0.85);
        max-width: 700px;
        margin: -20px auto 50px;
        line-height: 1.7;
        animation: fadeInUp 0.8s ease 0.4s both;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* =========================================================
    CARD SECTION
    ========================================================= */
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
        color: #ff6b9d;
        transition: transform 0.4s;
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

    /* =========================================================
    FEATURE SECTION
    ========================================================= */
    .features-section {
        margin-top: 100px;
        padding: 80px 20px;
        border-radius: 30px;
        background: rgba(255,255,255,0.04);
        box-shadow: 0 0 50px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }

    .features-section.alt {
        background: rgba(255,255,255,0.08);
    }

    .section-title {
        font-family: 'Poppins', sans-serif;
        font-size: 2.2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 50px;
        color: #fff;
        position: relative;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #ff6b9d;
        margin: 15px auto 0;
        border-radius: 2px;
    }

    .features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .feature {
        background: rgba(255,255,255,0.06);
        padding: 25px;
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.1);
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    .feature:hover {
        transform: translateY(-8px);
        background: rgba(255,255,255,0.1);
    }

    .feature-icon {
        font-size: 40px;
        color: #ff6b9d;
        margin-bottom: 15px;
    }

    .feature h3 {
        font-size: 1.3rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 10px;
    }

    .feature p {
        font-size: 1rem;
        line-height: 1.6;
        color: rgba(255,255,255,0.8);
    }

    /* =========================================================
    FOOTER
    ========================================================= */
    .footer {
        margin-top: 80px;
        padding-top: 40px;
        border-top: 1px solid rgba(255,255,255,0.1);
        color: rgba(255,255,255,0.8);
    }

    /* =========================================================
    ANIMATION & EFFECTS
    ========================================================= */
    .fade-in-section {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .fade-in-section.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .title-decoration {
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #ff6b9d, transparent);
        margin: 0 auto 25px;
        border-radius: 2px;
        animation: fadeInUp 0.8s ease 0.3s both;
    }

    .tagline-secondary {
        font-size: 1.05rem;
        font-weight: 300;
        color: rgba(255,255,255,0.85);
        max-width: 750px;
        margin: 0 auto 45px;
        line-height: 1.7;
        padding: 20px 30px;
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255,255,255,0.15);
        animation: fadeInUp 0.8s ease 0.4s both;
    }

    .highlight {
        font-weight: 600;
        color: #fff;
        position: relative;
        padding: 0 3px;
    }

    /* =========================================================
    RESPONSIVE DESIGN
    ========================================================= */
    @media (max-width: 768px) {
        .container { padding: 30px 20px; }

        .logo { width: 120px; height: 120px; }

        h1 { font-size: 2.8rem; }
        .subtitle { font-size: 1.1rem; }
        .subtitle::before, .subtitle::after { display: none; }

        .cards-container { grid-template-columns: 1fr; }

        .title-decoration {
            width: 60px;
            margin-bottom: 20px;
        }

        .features-section {
            padding: 50px 20px;
            margin-top: 60px;
        }

        .section-title { font-size: 1.8rem; }
        .tagline-secondary {
            font-size: 0.9rem;
            padding: 15px 18px;
        }
    }

    @media (max-width: 480px) {
        h1 { font-size: 2rem; }

        .logo { width: 100px; height: 100px; }

        .tagline-primary { font-size: 1rem; }
        .tagline-secondary {
            font-size: 0.9rem;
            padding: 15px 18px;
        }
    }
    .fade-section {
        opacity: 0;
        transform: translateY(60px);
        transition: all 0.8s ease-out;
    }
    
    .fade-section.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .footer {
        text-align: center;
        padding: 30px 20px;
        border-top: 1px solid rgba(255,255,255,0.2);
        color: rgba(255,255,255,0.8);
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

            <div class="cards-container">
                <a href="https://portaluniversitasquality.ac.id:6923/Project2/public/asrama/mahasiswa/login" class="card">
                    <div class="card-icon"><i class="bi bi-person-lines-fill"></i></div>
                    <h2>Pendaftaran Asrama</h2>
                    <p>Daftar untuk menempati asrama putri dengan fasilitas lengkap dan nyaman</p>
                </a>

                <a href="https://portaluniversitasquality.ac.id:6923/Project2/public/asrama/mahasiswa/informasi" class="card">
                    <div class="card-icon"><i class="bi bi-info-circle-fill"></i></div>
                    <h2>Informasi Asrama</h2>
                    <p>Lihat informasi lengkap tentang fasilitas, harga, dan peraturan asrama putri</p>
                </a>
            </div>


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

            <div class="footer fade-in-section">
                <p>&copy; 2025 Universitas Quality. All rights reserved.</p>
                <p style="margin-top: 10px;">📍 Jl. Ngumban Surbakti No. 18 Medan | 📞 (000) 000-000 | ✉️ asrama@universitasquality.ac.id</p>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const sections = document.querySelectorAll('.fade-section');
        
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
    
        sections.forEach(section => observer.observe(section));
    });
    document.addEventListener("DOMContentLoaded", () => {
        const sections = document.querySelectorAll('.fade-in-section');
        const observer = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('is-visible');
          });
        }, { threshold: 0.2 });
      
        sections.forEach(sec => observer.observe(sec));
      });
    </script>
</body>
</html>