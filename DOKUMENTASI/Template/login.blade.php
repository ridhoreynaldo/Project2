<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mahasiswa - Asrama Quality</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato:wght@400;700&family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* ========================================
           1. CSS DASAR & LATAR BELAKANG (DARI LANDING PAGE)
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
            /* OPSI 1: Gradien Dominan Gelap (Lebih Halus) 
               Jika Anda mencoba opsi ini dari chat sebelumnya.
            */
            background: linear-gradient(-45deg, #0f172a 0%, #0f172a 40%, #c44569 60%, #ff6b9d 100%);
            background-size: 200% 200%;
            animation: animatedGradient 20s ease infinite;

            /* OPSI 2: Gradien Pink Gelap (Lebih Tegas)
               Jika Anda lebih suka ini, hapus 'background' di atas dan gunakan ini.
            */
            /*
            background: linear-gradient(-45deg, #0f172a, #3a0e1a, #0f172a, #5b1f3c);
            background-size: 200% 200%;
            animation: animatedGradient 25s ease infinite;
            */
        }
        
        @keyframes animatedGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h2, h3, h4, h5, h6, .login-button {
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

        /* Aturan untuk 10 gelembung (Sama seperti landing page) */
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
        
        /* Container utama */
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
           2. CSS BARU UNTUK KARTU LOGIN
           ======================================== */

        .login-card {
            /* Menggunakan style 'card' dari landing page */
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 30px;
            border: 2px solid rgba(255,255,255,0.3);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            
            /* Penyesuaian untuk form */
            max-width: 450px; /* Batasi lebar form */
            margin: 0 auto; /* Posisikan di tengah */
            text-align: left; /* Konten form rata kiri */
            animation: fadeInUp 0.8s ease both; /* Animasi muncul */
        }

        .login-card h2 {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 30px;
            font-weight: 700;
            color: white;
        }

        /* Style untuk pesan error Laravel */
        .error-message {
            background: rgba(255, 60, 60, 0.2);
            color: #ffcccc;
            border: 1px solid rgba(255, 60, 60, 0.5);
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: rgba(255,255,255,0.9);
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .input-group input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 10px;
            background: rgba(255,255,255,0.1);
            color: white;
            font-size: 1rem;
            font-family: 'Lato', sans-serif;
            transition: all 0.3s ease;
        }

        .input-group input::placeholder {
            color: rgba(255,255,255,0.5);
        }

        .input-group input:focus {
            background: rgba(255,255,255,0.2);
            outline: none;
            border-color: #ff6b9d; /* Warna pink saat aktif */
            box-shadow: 0 0 15px rgba(255,107,157,0.3);
        }

        .login-button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: #ff6b9d; /* Warna pink utama */
            color: white;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-button:hover {
            background: #c44569; /* Warna pink lebih gelap saat hover */
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            transform: translateY(-2px);
        }

        /* Tautan kembali ke beranda */
        .back-link {
            text-align: center;
            margin-top: 25px;
        }

        .back-link a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .back-link a i {
            margin-right: 5px;
            transition: transform 0.3s ease;
        }

        .back-link a:hover {
            color: #ff6b9d; /* Warna pink saat hover */
        }

        .back-link a:hover i {
            transform: translateX(-3px);
        }

        /* ========================================
           3. CSS RESPONSIVE (MOBILE)
           ======================================== */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }

            .login-card {
                padding: 30px 25px;
            }

            .login-card h2 {
                font-size: 1.6rem;
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
            
            <form method="POST" action="/login" class="login-card">
                @csrf
                
                <h2>Login Mahasiswa</h2>

                @if(session('error'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="input-group">
                    <label for="username">Username (NPM)</label>
                    <input type="text" id="username" name="LOGINUSERNAME" placeholder="Masukkan NPM Anda" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="LOGINPASSWORD" placeholder="Masukkan Password" required>
                </div>

                <button type="submit" class="login-button">Login</button>

                <div class="back-link">
                    <a href="/"> 
                        <i class="bi bi-arrow-left-circle"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </form>

        </div>
    </div>

    </body>
</html>