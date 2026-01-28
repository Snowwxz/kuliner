<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kuliner->nama_kuliner }} - KulinerNusantara</title>
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
        .nav-links { display: flex; align-items: center; gap: 40px; list-style: none; }
        .nav-links a { text-decoration: none; color: #555; font-weight: 500; font-size: 15px; transition: color 0.3s; }
        .nav-links a:hover { color: #ff6b35; } 

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
        .detail-meta { display: flex; gap: 20px; font-size: 14px; color: #666; align-items: center; }
        .meta-item { display: flex; align-items: center; gap: 5px; }
        .rating-star { color: #ffc107; }

        .detail-image-wrapper { 
            width: 100%; height: 500px; border-radius: 20px; overflow: hidden; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-bottom: 40px; position: relative;
        }
        .detail-image { width: 100%; height: 100%; object-fit: cover; }

        .detail-content { display: grid; grid-template-columns: 2fr 1fr; gap: 40px; }

        .description p { margin-bottom: 20px; line-height: 1.8; color: #555; font-size: 16px; }

        .sidebar-card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .sidebar-title { font-size: 18px; font-weight: 700; margin-bottom: 15px; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px; }
        
        .info-list { list-style: none; }
        .info-item { margin-bottom: 15px; display: flex; justify-content: space-between; }
        .info-label { color: #888; font-size: 14px; }
        .info-value { font-weight: 600; color: #333; }

        .btn-maps { 
            display: flex; align-items: center; justify-content: center; gap: 10px;
            width: 100%; padding: 15px; background: white; border: 2px solid #ff6b35;
            color: #ff6b35; border-radius: 10px; font-weight: 600; text-decoration: none;
            transition: all 0.3s;
        }
        .btn-maps:hover { background: #ff6b35; color: white; }

        @media (max-width: 768px) {
            .navbar { padding: 15px 20px; }
            .nav-links { display: none; }
            .detail-container { margin-top: 100px; }
            .detail-content { grid-template-columns: 1fr; }
            .detail-image-wrapper { height: 300px; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="/" class="navbar-brand">
            <div class="logo-icon"><i class="fas fa-utensils"></i></div>
            <span>Kuliner<span class="highlight">Nusantara</span></span>
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('landing') }}">Beranda</a></li>
            <li><a href="{{ route('landing') }}#destinasi">Daerah</a></li>
            <li><a href="{{ route('landing') }}#tentang">Tentang</a></li>
        </ul>
        <div class="nav-right">
            <a href="{{ route('landing') }}#destinasi" class="btn-jelajah">Jelajah</a>
        </div>
    </nav>

    <div class="detail-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('landing') }}">Beranda</a> / 
            <a href="{{ route('landing', ['daerah' => $kuliner->daerah_id]) }}">{{ $kuliner->daerah->nama_daerah }}</a> / 
            <span>{{ $kuliner->nama_kuliner }}</span>
        </div>

        <div class="detail-header">
            <h1 class="detail-title">{{ $kuliner->nama_kuliner }}</h1>
            <div class="detail-meta">
                <div class="meta-item">
                    <i class="fas fa-map-marker-alt"></i> {{ $kuliner->daerah->nama_daerah }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-star rating-star"></i> {{ $kuliner->rating }}/5
                </div>
                <div class="meta-item">
                    <i class="far fa-clock"></i> Diposting {{ $kuliner->created_at->format('d M Y') }}
                </div>
            </div>
        </div>

        <div class="detail-image-wrapper">
            <img src="{{ asset('storage/' . $kuliner->gambar) }}" alt="{{ $kuliner->nama_kuliner }}" class="detail-image">
        </div>

        <div class="detail-content">
            <div class="main-content">
                <div class="sidebar-card">
                    <h3 class="sidebar-title">Tentang Kuliner Ini</h3>
                    <div class="description">
                        <p>{{ $kuliner->deskripsi }}</p>
                    </div>
                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-card">
                    <h3 class="sidebar-title">Informasi Utama</h3>
                    <ul class="info-list">
                        <li class="info-item">
                            <span class="info-label">Kategori</span>
                            <span class="info-value">Makanan Utama</span>
                        </li>
                        <li class="info-item">
                            <span class="info-label">Daerah Asal</span>
                            <span class="info-value">{{ $kuliner->daerah->nama_daerah }}</span>
                        </li>
                        <li class="info-item">
                            <span class="info-label">Rating</span>
                            <span class="info-value">{{ $kuliner->rating }} / 5.0</span>
                        </li>
                    </ul>
                </div>

                @if($kuliner->gmaps_link)
                <a href="{{ $kuliner->gmaps_link }}" target="_blank" class="btn-maps">
                    <i class="fas fa-map-marked-alt"></i> Lihat di Google Maps
                </a>
                @endif
            </div>
        </div>
    </div>

</body>
</html>
