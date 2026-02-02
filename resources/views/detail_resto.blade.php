<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $resto->nama_resto }} - KulinerKaltim</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; color: #333; background: #f9f9f9; }

        /* Navbar */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 60px; background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px); box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .navbar-brand .logo-icon {
            width: 40px; height: 40px; background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 10px; display: flex; align-items: center; justify-content: center;
            color: white; font-size: 20px;
        }
        .navbar-brand span { font-size: 22px; font-weight: 700; color: #333; }
        .navbar-brand span.highlight { color: #ff6b35; }
        .nav-links { 
            display: flex; 
            align-items: center; 
            gap: 40px; 
            list-style: none; 
            margin-left: 80px;
            margin-right: auto;
        }
        .nav-links a { text-decoration: none; color: #555; font-weight: 500; font-size: 15px; transition: color 0.3s; }
        .nav-links a:hover { color: #ff6b35; } 

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

        .btn-jelajah {
            background: linear-gradient(135deg, #ff6b35, #f7931e); color: white;
            padding: 10px 25px; border-radius: 25px; text-decoration: none;
            font-weight: 600; font-size: 14px; transition: all 0.3s ease;
        }

        /* Detail Content */
        .detail-container { max-width: 1000px; margin: 120px auto 60px; padding: 0 20px; }
        
        .breadcrumb { margin-bottom: 20px; font-size: 14px; color: #888; }
        .breadcrumb a { color: #ff6b35; text-decoration: none; }

        .detail-header { margin-bottom: 30px; }
        .detail-title { font-size: 36px; font-weight: 800; color: #333; margin-bottom: 10px; }
        .detail-meta { display: flex; gap: 20px; font-size: 14px; color: #666; align-items: center; flex-wrap: wrap; }
        .meta-item { display: flex; align-items: center; gap: 5px; }
        
        .detail-image-wrapper { 
            width: 100%; height: 500px; border-radius: 20px; overflow: hidden; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-bottom: 40px; position: relative;
        }
        .detail-image { width: 100%; height: 100%; object-fit: cover; }

        .detail-content { width: 100%; }

        .sidebar-card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .sidebar-title { font-size: 18px; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; }

        .info-list { list-style: none; }
        .info-item { margin-bottom: 15px; display: flex; justify-content: space-between; padding-bottom: 15px; border-bottom: 1px solid #f0f0f0; }
        .info-item:last-child { border-bottom: none; }
        .info-label { color: #888; font-size: 15px; }
        .info-value { font-weight: 600; color: #333; }

        /* Menu Section */
        .menu-section { margin-top: 50px; }
        .section-title { font-size: 24px; font-weight: 700; margin-bottom: 25px; color: #333; display: flex; align-items: center; gap: 10px; }
        .section-title i { color: #ff6b35; }

        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .food-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            text-decoration: none;
            color: inherit;
        }
        .food-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .food-img { width: 100%; height: 180px; object-fit: cover; }
        .food-content { padding: 20px; }
        .food-name { font-size: 18px; font-weight: 700; margin-bottom: 5px; color: #333; }
        .food-price { color: #2ecc71; font-weight: 600; font-size: 14px; margin-bottom: 10px; }
        .food-rating { font-size: 12px; color: #ffc107; display: flex; align-items: center; gap: 5px; }
        
        .empty-menu {
            text-align: center; padding: 40px; background: white; border-radius: 15px; color: #888; border: 1px dashed #ddd; width: 100%;
        }

        @media (max-width: 768px) {
            .navbar { padding: 15px 20px; }
            .nav-links { display: none; }
            .detail-container { margin-top: 100px; }
            .detail-image-wrapper { height: 300px; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="/" class="navbar-brand">
            <div class="logo-icon"><i class="fas fa-utensils"></i></div>
            <span>Kuliner<span class="highlight">Kaltim</span></span>
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('landing') }}">Beranda</a></li>
            <li><a href="{{ route('public.kuliner') }}">Kuliner</a></li>
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

    <div class="detail-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('landing') }}">Beranda</a> / 
            <a href="{{ route('public.resto') }}">Restoran</a> / 
            <span>{{ $resto->nama_resto }}</span>
        </div>

        <div class="detail-header">
            <h1 class="detail-title">{{ $resto->nama_resto }}</h1>
            <div class="detail-meta">
                <div class="meta-item">
                    <i class="fas fa-map-marker-alt"></i> {{ $resto->daerah->nama_daerah ?? 'Unknown' }}
                </div>
                <div class="meta-item">
                    <i class="far fa-clock"></i> {{ $resto->jam_buka }} - {{ $resto->jam_tutup }}
                </div>
            </div>
        </div>

        <div class="detail-image-wrapper">
            <img src="{{ asset('storage/' . $resto->gambar) }}" alt="{{ $resto->nama_resto }}" class="detail-image">
        </div>

        <div class="detail-content">
            <!-- Informasi Resto -->
            <div class="sidebar-card">
                <h3 class="sidebar-title">Tentang Restoran</h3>
                <p style="color: #555; line-height: 1.8; margin-bottom: 20px;">
                    {{ $resto->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}
                </p>
                <div style="border-top: 1px solid #eee; padding-top: 20px;">
                    <ul class="info-list">
                        <li class="info-item">
                            <span class="info-label">Alamat Lengkap</span>
                            <span class="info-value">{{ $resto->alamat }}</span>
                        </li>
                        <li class="info-item">
                            <span class="info-label">Jam Operasional</span>
                            <span class="info-value">
                                @if($resto->jam_buka && $resto->jam_tutup)
                                    {{ $resto->jam_buka }} - {{ $resto->jam_tutup }}
                                @else
                                    -
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Menu Makanan -->
            <div class="menu-section">
                <div class="section-title">
                    <i class="fas fa-utensils"></i> Daftar Makanan Populer
                </div>

                @if($resto->kuliners->count() > 0)
                    <div class="food-grid">
                        @foreach($resto->kuliners as $kuliner)
                        <a href="{{ route('kuliner.detail', $kuliner->id) }}" class="food-card">
                            <img src="{{ asset('storage/' . $kuliner->gambar) }}" alt="{{ $kuliner->nama_kuliner }}" class="food-img">
                            <div class="food-content">
                                <div class="food-name">{{ $kuliner->nama_kuliner }}</div>
                                <div class="food-price">{{ $kuliner->harga ?? 'Harga tidak tersedia' }}</div>
                                <div class="food-rating">
                                    <i class="fas fa-star"></i> {{ $kuliner->average_rating }} / 5.0
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                @else
                    <div class="empty-menu">
                        <i class="fas fa-hamburger" style="font-size: 32px; margin-bottom: 10px; display: block; color: #ddd;"></i>
                        Belum ada menu makanan yang terdaftar di restoran ini.
                    </div>
                @endif
            </div>
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
