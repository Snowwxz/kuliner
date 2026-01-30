<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - KulinerNusantara</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            color: #333;
        }

        /* Sidebar Layout */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, #ff6b35 0%, #f7931e 100%);
            padding: 30px 20px;
            color: white;
            z-index: 100;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }

        .sidebar-brand {
            font-size: 24px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 50px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .nav-menu {
            list-style: none;
            flex: 1;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            transform: translateX(5px);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: white;
            color: #ff6b35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-infoo {
            flex: 1;
        }
        
        .user-name {
            font-size: 14px;
            font-weight: 600;
        }

        .logout-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        
        .logout-btn:hover { opacity: 1; }

        /* Main Content Adjustment */
        .main-content {
            margin-left: 260px;
            padding: 40px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0;
        }

        /* Content Section */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title h2 {
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }

        .section-title p {
            color: #777;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Card Grid Styling */
        .feedback-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            background: transparent;
            box-shadow: none;
            border: none;
            overflow: visible;
        }

        .feedback-item {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: 1px solid #eee;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .feedback-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .feedback-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            align-items: flex-start;
        }
        
        .kuliner-tag {
            display: inline-block;
            padding: 4px 10px;
            background: #fff0e6;
            color: #ff6b35;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 10px;
            width: fit-content;
        }

        .user-info h4 {
            font-size: 16px;
            font-weight: 700;
            color: #333;
            margin-bottom: 3px;
        }

        .user-info span { /* Reused for 'Pengunjung' label if needed, or remove */
            font-size: 12px;
            color: #999;
        }

        .rating-stars {
            color: #ffc107;
            font-size: 14px;
        }

        .feedback-message {
            color: #555;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 15px;
            font-style: italic;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
        }

        .timestamp {
            font-size: 12px;
            color: #aaa;
            text-align: right;
            border-top: 1px solid #f0f0f0;
            padding-top: 10px;
        }
        
        .empty-state {
            grid-column: 1 / -1;
            padding: 40px; text-align: center; color: #888;
            background: white; border-radius: 15px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-utensils"></i> Admin
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('landing') }}" class="nav-link">
                    <i class="fas fa-home"></i> Halaman Utama
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link">
                    <i class="fas fa-drumstick-bite"></i> Kuliner
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('daerah') }}" class="nav-link">
                    <i class="fas fa-map-marker-alt"></i> Daerah
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('resto.index') }}" class="nav-link">
                    <i class="fas fa-store"></i> Resto
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('feedback.index') }}" class="nav-link active">
                    <i class="fas fa-comment-dots"></i> Feedback
                </a>
            </li>
        </ul>

        <div class="user-section">
            <div class="user-avatar">
                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
            </div>
            <div class="user-infoo">
                <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button onclick="document.getElementById('logout-form').submit()" class="logout-btn" title="Logout">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Content Header -->
            <div class="content-header">
                <div class="section-title">
                    <h2>Daftar Ulasan Pengguna</h2>
                    <p>Memantau ulasan yang masuk untuk setiap kuliner</p>
                </div>
            </div>

            <!-- Feedback List (Cards) -->
            <div class="feedback-list">
                @forelse($reviews as $review)
                <div class="feedback-item">
                    
                    @if($review->kuliner)
                    <div class="kuliner-tag">
                        <i class="fas fa-utensils"></i> {{ $review->kuliner->nama_kuliner }}
                    </div>
                    @else
                    <div class="kuliner-tag" style="background: #eee; color: #888;">
                        <i class="fas fa-info-circle"></i> Kuliner Terhapus
                    </div>
                    @endif

                    <div class="feedback-header">
                        <div class="user-info">
                            <h4>{{ $review->nama_pengulas }}</h4>
                            <span>Pengunjung</span>
                        </div>
                        <div class="rating-stars">
                            @for($i = 0; $i < $review->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @for($i = $review->rating; $i < 5; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                    </div>

                    <p class="feedback-message">
                        "{{ $review->isi_ulasan }}"
                    </p>

                    <span class="timestamp">
                        <i class="far fa-clock"></i> {{ $review->created_at->diffForHumans() }}
                    </span>
                </div>
                @empty
                <div class="empty-state">
                    <i class="far fa-comment-dots" style="font-size: 48px; margin-bottom: 15px; opacity: 0.3;"></i>
                    <p>Belum ada ulasan yang diterima.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

</body>
</html>
