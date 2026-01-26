<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KulinerNusantara - Jelajahi Kelezatan Nusantara</title>
    <meta name="description" content="Temukan 1000+ destinasi kuliner Indonesia dari Sabang sampai Merauke. Jelajahi cita rasa autentik Indonesia yang menggugah selera.">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 60px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .navbar-brand .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .navbar-brand span {
            font-size: 22px;
            font-weight: 700;
            color: #333;
        }

        .navbar-brand span.highlight {
            color: #ff6b35;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #ff6b35;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ff6b35;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-icon {
            font-size: 18px;
            color: #555;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .search-icon:hover {
            color: #ff6b35;
        }

        .btn-jelajah {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .btn-jelajah:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            min-height: 700px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .hero-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.3) 0%,
                rgba(0, 0, 0, 0.5) 50%,
                rgba(0, 0, 0, 0.7) 100%
            );
            z-index: -1;
        }

        .hero-content {
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 0 20px;
            margin-top: 60px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 14px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hero-badge i {
            color: #ff6b35;
        }

        .hero-title {
            font-size: 56px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            text-shadow: 2px 4px 20px rgba(0, 0, 0, 0.3);
        }

        .hero-title .highlight {
            color: #ff6b35;
            display: block;
        }

        .hero-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 40px;
            line-height: 1.6;
            font-weight: 300;
        }

        /* Search Box */
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 8px 8px 8px 30px;
            display: flex;
            align-items: center;
            max-width: 600px;
            margin: 0 auto 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .search-box i {
            color: #999;
            font-size: 18px;
        }

        .search-box input {
            flex: 1;
            border: none;
            outline: none;
            padding: 15px 20px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .search-box input::placeholder {
            color: #aaa;
        }

        .btn-search {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-search:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(255, 107, 53, 0.4);
        }

        /* Popular Tags */
        .popular-tags {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .popular-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .tag {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .tag:hover {
            background: rgba(255, 107, 53, 0.8);
            border-color: #ff6b35;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .navbar {
                padding: 15px 30px;
            }

            .nav-links {
                display: none;
            }

            .hero-title {
                font-size: 42px;
            }

            .hero-subtitle {
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 15px 20px;
            }

            .navbar-brand span {
                font-size: 18px;
            }

            .hero-title {
                font-size: 32px;
            }

            .search-box {
                flex-direction: column;
                border-radius: 20px;
                padding: 20px;
                gap: 15px;
            }

            .search-box input {
                width: 100%;
                text-align: center;
            }

            .btn-search {
                width: 100%;
            }

            .popular-tags {
                gap: 10px;
            }

            .tag {
                padding: 6px 15px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="/" class="navbar-brand">
            <div class="logo-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <span>Kuliner<span class="highlight">Nusantara</span></span>
        </a>

        <ul class="nav-links">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#destinasi">Destinasi</a></li>
            <li><a href="#kategori">Kategori</a></li>
            <li><a href="#tentang">Tentang</a></li>
        </ul>

        <div class="nav-right">
            <i class="fas fa-search search-icon"></i>
            <a href="#" class="btn-jelajah">
                <i class="fas fa-compass"></i>
                Jelajah
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="hero-background">
            <!-- Background image placeholder - ganti dengan gambar makanan Indonesia -->
            <img src="{{ asset('images/hero-food-bg.jpg') }}" alt="Indonesian Food Background" 
                 onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f0f23 100%)';">
        </div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-map-marker-alt"></i>
                Temukan 1000+ Destinasi Kuliner
            </div>

            <h1 class="hero-title">
                Jelajahi Kelezatan
                <span class="highlight">Nusantara</span>
            </h1>

            <p class="hero-subtitle">
                Dari Sabang sampai Merauke, temukan cita rasa autentik Indonesia yang menggugah selera
            </p>

            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari makanan atau lokasi...">
                <button class="btn-search">Cari Sekarang</button>
            </div>

            <div class="popular-tags">
                <span class="popular-label">Populer:</span>
                <a href="#" class="tag">Rendang</a>
                <a href="#" class="tag">Sate Ayam</a>
                <a href="#" class="tag">Nasi Goreng</a>
                <a href="#" class="tag">Gado-Gado</a>
            </div>
        </div>
    </section>
</body>
</html>
