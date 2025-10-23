<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - Asrama Quality</title>

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
            background: linear-gradient(-45deg, #0f172a 0%, #0f172a 40%, #c44569 60%, #ff6b9d 100%);
            background-size: 200% 200%;
            animation: animatedGradient 20s ease infinite;
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
            padding: 40px 20px;
        }
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
            width: 100%;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ========================================
           2. CSS HEADER DASHBOARD (SAMA)
           ======================================== */
        
        .dashboard-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 15px 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease both;
        }

        .welcome-message h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 1.1rem;
            color: rgba(255,255,255,0.8);
            margin: 0;
            text-align: left;
        }
        
        .welcome-message h3 span {
            font-weight: 700;
            color: white;
        }

        .logout-link {
            font-family: 'Poppins', sans-serif;
            color: #ffcccc;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            flex-shrink: 0; /* Mencegah tombol mengecil */
        }
        
        .logout-link i {
            margin-left: 5px;
        }

        .logout-link:hover {
            color: white;
            text-shadow: 0 0 10px rgba(255,100,100,0.5);
        }

        h1 {
            font-family: 'Dancing Script', cursive;
            font-weight: 700;
            font-size: 3.5rem; 
            color: white;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: fadeInUp 0.8s ease 0.2s both;
            margin-bottom: 10px;
            text-align: center;
        }

        .dashboard-subtitle {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            text-align: center;
            margin-bottom: 40px; /* Jarak ke panel status baru */
            animation: fadeInUp 0.8s ease 0.4s both;
        }

        /* ========================================
           3. CSS BARU UNTUK PANEL STATUS
           ======================================== */
        .status-panel {
            display: grid;
            /* 3 kolom di desktop, 1 kolom di mobile */
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); 
            gap: 20px;
            margin-bottom: 40px; /* Jarak ke kartu aksi */
            
            /* Menggunakan style glassmorphism yang sama */
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            animation: fadeInUp 0.8s ease 0.6s both; /* Muncul setelah subtitle */
        }

        .status-item {
            display: flex;
            align-items: center;
            text-align: left;
            gap: 20px;
            padding: 10px;
        }

        .status-icon {
            font-size: 2.5rem; /* 40px */
            color: white;
            opacity: 0.8;
        }

        .status-content {
            display: flex;
            flex-direction: column;
        }

        .status-label {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
        }

        .status-value {
            font-size: 1.4rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        /* Style khusus untuk item highlight (Sisa Waktu) */
        .status-item.highlight .status-value {
            font-size: 1.6rem;
            color: #fff2a3; /* Kuning muda agar menonjol */
            text-shadow: 0 0 10px rgba(255, 242, 163, 0.5);
        }
        
        .status-item.highlight .status-icon {
            color: #fff2a3;
            opacity: 1;
        }

        /* ========================================
           4. CSS KARTU AKSI (DARI LANDING PAGE)
           ======================================== */
        
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 0; 
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

        /* Animasi delay untuk kartu (di-update) */
        .cards-container .card:nth-child(1) { animation-delay: 0.8s; }
        .cards-container .card:nth-child(2) { animation-delay: 1.0s; }
        .cards-container .card:nth-child(3) { animation-delay: 1.2s; } 

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

        /* ========================================
           5. CSS RESPONSIVE (MOBILE)
           ======================================== */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }

            .dashboard-nav {
                flex-direction: column;
                gap: 15px;
                padding: 20px;
                align-items: stretch; /* Penuhkan lebar */
            }
            
            .welcome-message h3 {
                font-size: 1rem;
                text-align: center; /* Ratakan tengah di mobile */
            }
            
            .logout-link {
                text-align: center; /* Ratakan tengah di mobile */
                padding: 5px 0;
            }

            h1 {
                font-size: 2.5rem;
            }
            
            .dashboard-subtitle {
                font-size: 1.1rem;
                margin-bottom: 30px;
            }

            /* --- CSS BARU UNTUK PANEL STATUS (MOBILE) --- */
            .status-panel {
                grid-template-columns: 1fr; /* Pastikan 1 kolom */
                padding: 20px;
                gap: 10px;
                margin-bottom: 30px;
            }
            .status-item {
                gap: 15px;
                padding: 5px 0;
            }
            .status-icon {
                font-size: 2rem; /* Kecilkan ikon */
            }
            .status-value {
                font-size: 1.2rem;
            }
            .status-item.highlight .status-value {
                font-size: 1.3rem; /* Sedikit lebih besar */
            }
            /* --- AKHIR CSS BARU --- */


            .cards-container {
                grid-template-columns: 1fr;
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
            
            <div class="dashboard-nav">
                <div class="welcome-message">
                    <h3>Selamat datang, <span>{{ Session::get('mahasiswa')->LOGINUSERNAME }}</span></h3>
                </div>
                <a href="/logout" class="logout-link">
                    Logout <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>

            <h1>Dashboard Mahasiswa</h1>
            <h2 class="dashboard-subtitle">Status & Informasi Asrama Anda</h2>

            <div class="status-panel">
                <div class="status-item">
                    <i class="status-icon bi bi-door-closed"></i>
                    <div class="status-content">
                        <span class="status-label">Kamar Dihuni</span>
                        <span class="status-value">A-101</span>
                    </div>
                </div>
                <div class="status-item">
                    <i class="status-icon bi bi-calendar-check"></i>
                    <div class="status-content">
                        <span class="status-label">Berakhir Tanggal</span>
                        <span class="status-value">31 Des 2025</span>
                    </div>
                </div>
                <div class="status-item highlight">
                    <i class="status-icon bi bi-hourglass-split"></i>
                    <div class="status-content">
                        <span class="status-label">Sisa Waktu</span>
                        <span class="status-value">69 Hari Lagi</span>
                    </div>
                </div>
            </div>
            
            <div class="cards-container">
                
                <a href="/profil" class="card">
                    <div class="card-icon"><i class="bi bi-person-badge"></i></div>
                    <h2>Lengkapi Profil</h2>
                    <p>Pastikan data diri Anda lengkap dan valid sebelum mendaftar.</p>
                </a>

                <a href="/pendaftaran-kamar" class="card">
                    <div class="card-icon"><i class="bi bi-door-open-fill"></i></div>
                    <h2>Pendaftaran Kamar</h2>
                    <p>Lihat ketersediaan kamar, pilih, dan lakukan pendaftaran.</p>
                </a>

                <a href="/history-transaksi" class="card">
                    <div class="card-icon"><i class="bi bi-clock-history"></i></div>
                    <h2>Riwayat Uang Pengganti Asrama</h2>
                    <p>Lihat riwayat uang pengganti asrama anda.</p>
                </a>
            </div>

        </div>
    </div>
</body>
</html>