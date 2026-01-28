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

        /* Dropdown Styles */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 200px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 15px;
            padding: 10px 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 1100;
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: block;
            padding: 10px 20px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: #fff5f0;
            color: #ff6b35;
            padding-left: 25px;
        }

        .dropdown-item::after {
            display: none; /* Remove underline from dropdown items */
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


        /* Kuliner Section */
        .kuliner-section {
            padding: 80px 0;
            background-color: #f9f9f9;
        }

        .section-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #666;
            font-size: 16px;
        }

        .kuliner-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .kuliner-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .kuliner-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.15);
        }

        .card-image {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .card-content {
            padding: 25px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .card-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            background: #fff5f0;
            padding: 5px 10px;
            border-radius: 15px;
            color: #ff6b35;
            font-weight: 600;
            font-size: 14px;
        }

        .card-location {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #888;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .card-desc {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
            <li><a href="{{ route('landing') }}">Beranda</a></li>
            <li class="dropdown">
                <a href="#destinasi">Daerah <i class="fas fa-chevron-down" style="font-size: 12px; margin-left: 5px;"></i></a>
                <div class="dropdown-menu">

                    @foreach($daerahs as $daerah)
                        <a href="{{ route('landing', ['daerah' => $daerah->id]) }}" class="dropdown-item">{{ $daerah->nama_daerah }}</a>
                    @endforeach
                </div>
            </li>
            <li><a href="#tentang">Tentang</a></li>
        </ul>

        <div class="nav-right">
            <i class="fas fa-search search-icon"></i>
            <a href="#destinasi" class="btn-jelajah">
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

            <form action="{{ route('landing') }}" method="GET" class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" name="search" placeholder="Cari makanan atau lokasi..." value="{{ request('search') }}">
                <button type="submit" class="btn-search">Cari Sekarang</button>
            </form>

            <div class="popular-tags">
                <span class="popular-label">Populer:</span>
                <a href="#" class="tag">Rendang</a>
                <a href="#" class="tag">Sate Ayam</a>
                <a href="#" class="tag">Nasi Goreng</a>
                <a href="#" class="tag">Gado-Gado</a>
            </div>
        </div>
    </section>

    <!-- Kuliner Section -->
    <section class="kuliner-section" id="destinasi">
        <div class="section-container">
            <div class="section-title">
                <h2>
                    @if(request('daerah') && $selectedDaerah = $daerahs->find(request('daerah')))
                        Kuliner di {{ $selectedDaerah->nama_daerah }}
                    @elseif(request('search'))
                        Hasil Pencarian: "{{ request('search') }}"
                    @else
                        Rekomendasi Kuliner Terbaik
                    @endif
                </h2>
                <p>
                    @if(request('daerah'))
                        Menampilkan hasil pencarian berdasarkan daerah pilihan Anda
                    @elseif(request('search'))
                        Menampilkan hasil pencarian untuk "{{ request('search') }}"
                    @else
                        Nikmati hidangan dengan rating tertinggi pilihan kami
                    @endif
                </p>
            </div>

            <div class="kuliner-grid">
                @foreach($kuliners as $kuliner)
                <a href="{{ route('kuliner.detail', $kuliner->id) }}" class="kuliner-card">
                    <img src="{{ asset('storage/' . $kuliner->gambar) }}" alt="{{ $kuliner->nama_kuliner }}" class="card-image">
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">{{ $kuliner->nama_kuliner }}</h3>
                            <div class="card-rating">
                                <i class="fas fa-star"></i> {{ $kuliner->average_rating }}
                            </div>
                        </div>
                        <div class="card-location">
                            <i class="fas fa-map-marker-alt"></i> {{ $kuliner->daerah->nama_daerah ?? 'Indonesia' }}
                        </div>
                        <p class="card-desc">
                            {{ $kuliner->deskripsi }}
                        </p>
                    </div>
                </a>
                @endforeach
        </div>
    </section>

    <script>
        document.querySelector('.search-icon').addEventListener('click', function() {
            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput) {
                // Scroll to search box smoothly
                searchInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                // Focus the input after a short delay to allow scroll to start
                setTimeout(() => {
                    searchInput.focus();
                }, 500);
            }
        });
    </script>
</body>
</html>
