<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kuliner - KulinerKaltim</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
        }

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
            margin-right: auto;
            margin-left: 80px;
        }

        .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #ff6b35;
        }

        .nav-right { display: flex; align-items: center; }

        .search-container { position: relative; }

        .search-icon {
            font-size: 20px; color: #555; cursor: pointer; width: 40px; height: 40px;
            display: flex; align-items: center; justify-content: center; border-radius: 50%;
            transition: all 0.3s ease;
        }
        .search-icon:hover { background: #fff5f0; color: #ff6b35; }

        .search-dropdown {
            position: absolute; top: 120%; right: 0; background: white; padding: 10px;
            border-radius: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); display: flex;
            align-items: center; width: 300px; border: 1px solid #eee; opacity: 0;
            visibility: hidden; transform: translateY(-10px); transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            z-index: 1000;
        }
        .search-dropdown.active { opacity: 1; visibility: visible; transform: translateY(0); }

        .search-dropdown input {
            flex: 1; border: none; outline: none; padding: 5px 15px; font-size: 14px; font-family: 'Poppins', sans-serif;
        }
        .search-dropdown button {
            background: #ff6b35; color: white; border: none; width: 35px; height: 35px;
            border-radius: 50%; cursor: pointer; display: flex; align-items: center;
            justify-content: center; transition: background 0.3s;
        }
        .search-dropdown button:hover { background: #e65a26; }

        /* Dropdown Styles */
        .dropdown { position: relative; }
        .dropdown-menu {
            position: absolute; top: 100%; left: 0; background: white; min-width: 200px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 15px; padding: 10px 0;
            opacity: 0; visibility: hidden; transform: translateY(10px); transition: all 0.3s ease;
            z-index: 1100;
        }
        .dropdown:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateY(0); }
        .dropdown-item {
            display: block; padding: 10px 20px; color: #555; text-decoration: none; font-size: 14px; transition: all 0.2s;
        }
        .dropdown-item:hover { background: #fff5f0; color: #ff6b35; padding-left: 25px; }

        .container {
            max-width: 1200px;
            margin: 100px auto 50px;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .page-header h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .page-header p {
            color: #666;
        }

        /* Kuliner Grid from Landing Page */
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
            transition: transform 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .kuliner-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 25px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
        }

        .card-rating {
            background: #fff8e1;
            color: #ffc107;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-location {
            color: #777;
            font-size: 13px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-desc {
            color: #555;
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
            <span>Kuliner<span class="highlight">Kaltim</span></span>
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('landing') }}">Beranda</a></li>
            <li><a href="{{ route('public.kuliner') }}" style="color: #ff6b35;">Kuliner</a></li>
            <li class="dropdown">
                <a href="{{ route('landing') }}#destinasi">Daerah <i class="fas fa-chevron-down" style="font-size: 12px; margin-left: 5px;"></i></a>
                <div class="dropdown-menu">
                    @foreach($daerahs as $daerah)
                        <a href="{{ route('landing', ['daerah' => $daerah->id]) }}" class="dropdown-item">{{ $daerah->nama_daerah }}</a>
                    @endforeach
                </div>
            </li>
            <li><a href="{{ route('public.resto') }}">Resto</a></li>
            <li><a href="{{ route('landing') }}#tentang">Tentang</a></li>
        </ul>

        <div class="nav-right">
            <div class="search-container">
                <i class="fas fa-search search-icon" id="searchIcon"></i>
                <form action="{{ route('landing') }}" method="GET" class="search-dropdown" id="searchDropdown">
                    <input type="text" name="search" placeholder="Cari kuliner..." value="{{ request('search') }}">
                    <button type="submit"><i class="fas fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h1>Jelajahi Kuliner Kaltim</h1>
            <p>Ragam cita rasa autentik dari berbagai daerah di Indonesia</p>
        </div>

        <div class="kuliner-grid">
            @forelse($kuliners as $kuliner)
            <a href="{{ route('kuliner.detail', $kuliner->id) }}" class="kuliner-card">
                <img src="{{ asset('storage/' . $kuliner->gambar) }}" alt="{{ $kuliner->nama_kuliner }}" class="card-image">
                <div class="card-content">
                    <div class="card-header">
                        <h3 class="card-title">{{ $kuliner->nama_kuliner }}</h3>
                        <div class="card-rating">
                            <i class="fas fa-star"></i> {{ $kuliner->average_rating ?? $kuliner->rating }}
                        </div>
                    </div>
                    <div class="card-location">
                        <i class="fas fa-map-marker-alt"></i> {{ $kuliner->daerah->nama_daerah ?? 'Indonesia' }}
                        @if($kuliner->resto)
                            <span style="margin: 0 5px;">•</span>
                            <i class="fas fa-store"></i> {{ $kuliner->resto->nama_resto }}
                        @endif
                    </div>
                    <p class="card-desc">
                        {{ $kuliner->deskripsi }}
                    </p>
                </div>
            </a>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 50px;">
                <h3>Belum ada data kuliner.</h3>
            </div>
            @endforelse
        </div>
    </div>
    <script>
        // Dropdown toggle logic
        const searchIcon = document.getElementById('searchIcon');
        const searchDropdown = document.getElementById('searchDropdown');

        if(searchIcon && searchDropdown) {
            searchIcon.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent click from closing immediately
                searchDropdown.classList.toggle('active');
                if(searchDropdown.classList.contains('active')) {
                    searchDropdown.querySelector('input').focus();
                }
            });

            // Close when clicking outside
            document.addEventListener('click', (e) => {
                if (!searchDropdown.contains(e.target) && e.target !== searchIcon) {
                    searchDropdown.classList.remove('active');
                }
            });

            // Prevent closing when clicking inside the dropdown
            searchDropdown.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }
    </script>
</body>
</html>
