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

        .detail-content { width: 100%; } /* Full width */

        .description p { margin-bottom: 20px; line-height: 1.8; color: #555; font-size: 16px; }

        .sidebar-card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .sidebar-title { font-size: 18px; font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; display: none; } /* Hide title as tabs handle it */
        
        /* Tabs Styles */
        .tabs-nav {
            display: flex; gap: 10px; margin-bottom: 0; padding: 0 10px;
            background: #fff; border-radius: 15px 15px 0 0; width: fit-content;
        }
        .tab-btn {
            background: none; border: none; padding: 15px 30px; font-size: 16px; font-weight: 600;
            cursor: pointer; color: #888; border-bottom: 3px solid transparent; transition: all 0.3s;
        }
        .tab-btn:hover { color: #ff6b35; }
        .tab-btn.active { color: #ff6b35; border-bottom-color: #ff6b35; }
        
        .tab-content { display: none; animation: fadeIn 0.5s; }
        .tab-content.active { display: block; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .info-list { list-style: none; }
        .info-item { margin-bottom: 15px; display: flex; justify-content: space-between; padding-bottom: 15px; border-bottom: 1px solid #f0f0f0; }
        .info-item:last-child { border-bottom: none; }
        .info-label { color: #888; font-size: 15px; }
        .info-value { font-weight: 600; color: #333; }

        .reviews-list {
            display: grid;
            gap: 20px;
        }

        .review-item { 
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border: 1px solid #f0f0f0;
            transition: transform 0.2s;
        }
        
        .review-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        }
        .review-header { display: flex; justify-content: space-between; margin-bottom: 5px; }
        .reviewer-name { font-weight: 700; font-size: 16px; }
        .review-date { font-size: 12px; color: #999; margin-bottom: 10px; }
        .review-text { color: #555; line-height: 1.6; }

        .star-rating {
            display: flex; flex-direction: row-reverse; gap: 5px; justify-content: flex-end; margin-bottom: 15px;
        }
        .star-rating input { display: none; }
        .star-rating label {
            font-size: 24px; color: #ccc; cursor: pointer; transition: color 0.2s;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input:checked ~ label {
            color: #ffc107;
        }

        .alert-success {
            padding: 15px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 20px;
        }
        .alert-error {
            padding: 15px; background: #f8d7da; color: #721c24; border-radius: 5px; margin-bottom: 20px;
        }

        /* Rating Summary Styles */
        .rating-summary {
            display: flex; background: white; padding: 25px; border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;
            margin-bottom: 30px; align-items: center; gap: 40px;
        }
        .rating-avg-section {
            flex: 1; text-align: center; border-right: 1px solid #eee; padding-right: 40px;
        }
        .rating-avg-value { font-size: 64px; font-weight: 800; color: #333; line-height: 1; }
        .rating-avg-stars { color: #ffc107; font-size: 20px; margin: 10px 0; }
        .rating-total-count { color: #888; font-size: 14px; }

        .rating-bars-section { flex: 2; }
        .rating-bar-item { display: flex; align-items: center; gap: 15px; margin-bottom: 8px; }
        .bar-label { font-size: 14px; color: #555; width: 30px; }
        .bar-container { flex: 1; height: 8px; background: #eee; border-radius: 4px; overflow: hidden; }
        .bar-fill { height: 100%; background: #ffc107; border-radius: 4px; }
        .bar-count { font-size: 13px; color: #777; width: 20px; text-align: right; }

        .btn-maps { 
            display: flex; align-items: center; justify-content: center; gap: 10px;
            width: fit-content; padding: 10px 20px; background: white; border: 2px solid #ff6b35;
            color: #ff6b35; border-radius: 10px; font-weight: 600; text-decoration: none;
            transition: all 0.3s;
        }
        .btn-maps:hover { background: #ff6b35; color: white; }

        @media (max-width: 768px) {
            .navbar { padding: 15px 20px; }
            .nav-links { display: none; }
            .detail-container { margin-top: 100px; }
            .detail-image-wrapper { height: 300px; }
            .tabs-nav { width: 100%; justify-content: center; }
            .tab-btn { padding: 10px 15px; font-size: 14px; }
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
                    <i class="fas fa-map-marker-alt"></i> {{ $kuliner->daerah->nama_daerah }} {{ $kuliner->alamat ? '• ' . $kuliner->alamat : '' }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-star rating-star"></i> {{ $kuliner->average_rating }}/5
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
                <!-- Tabs Navigation -->
                <div class="tabs-nav">
                    <button class="tab-btn active" onclick="openTab(event, 'tentang')">Tentang</button>
                    <button class="tab-btn" onclick="openTab(event, 'informasi')">Informasi</button>
                    <button class="tab-btn" onclick="openTab(event, 'ulasan')">Ulasan ({{ $kuliner->ulasan->count() }})</button>
                </div>

                <!-- Tab Content: Tentang -->
                <div id="tentang" class="tab-content active">
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Tentang Kuliner Ini</h3>
                        <div class="description">
                            <p>{{ $kuliner->deskripsi }}</p>
                        </div>
                    </div>
                </div>

                <!-- Tab Content: Informasi -->
                <div id="informasi" class="tab-content">
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Informasi Utama</h3>
                        <ul class="info-list">
                            <li class="info-item">
                                <span class="info-label">Harga</span>
                                <span class="info-value" style="color: #2ecc71;">{{ $kuliner->harga ?? '-' }}</span>
                            </li>
                            <li class="info-item">
                                <span class="info-label">Jam Operasional</span>
                                <span class="info-value">
                                    @if($kuliner->jam_buka && $kuliner->jam_tutup)
                                        {{ $kuliner->jam_buka }} - {{ $kuliner->jam_tutup }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </li>
                            <li class="info-item">
                                <span class="info-label">Daerah Asal</span>
                                <span class="info-value">{{ $kuliner->daerah->nama_daerah }}</span>
                            </li>
                            <li class="info-item" style="flex-direction: column; align-items: flex-start; gap: 5px;">
                                <span class="info-label">Alamat Lengkap</span>
                                <span class="info-value" style="font-weight: 400; font-size: 13px; line-height: 1.5;">{{ $kuliner->alamat ?? '-' }}</span>
                            </li>
                            <li class="info-item">
                                <span class="info-label">Rating</span>
                                <span class="info-value">{{ $kuliner->average_rating }} / 5.0</span>
                            </li>
                        </ul>
                    </div>

                    @if($kuliner->gmaps_link)
                    <a href="{{ $kuliner->gmaps_link }}" target="_blank" class="btn-maps" style="margin-top: 20px;">
                        <i class="fas fa-map-marked-alt"></i> Lihat di Google Maps
                    </a>
                    @endif
                </div>

                <!-- Tab Content: Ulasan -->
                <div id="ulasan" class="tab-content">
                    <div class="sidebar-card">
                        
                        @php
                            $totalUlasan = $kuliner->ulasan->count();
                            $ratings = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
                            foreach($kuliner->ulasan as $u) {
                                if(isset($ratings[$u->rating])) $ratings[$u->rating]++;
                            }
                        @endphp

                        <!-- Rating Summary Layout -->
                        <div class="rating-summary">
                            <div class="rating-avg-section">
                                <div class="rating-avg-value">{{ $kuliner->average_rating }}</div>
                                <div class="rating-avg-stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= round($kuliner->average_rating) ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                                <div class="rating-total-count">Dari {{ $totalUlasan }} ulasan</div>
                            </div>
                            <div class="rating-bars-section">
                                @foreach([5, 4, 3, 2, 1] as $star)
                                    @php
                                        $count = $ratings[$star];
                                        $percent = $totalUlasan > 0 ? ($count / $totalUlasan) * 100 : 0;
                                    @endphp
                                    <div class="rating-bar-item">
                                        <div class="bar-label">{{ $star }} <i class="fas fa-star" style="font-size: 10px; color: #ffc107;"></i></div>
                                        <div class="bar-container">
                                            <div class="bar-fill" style="width: {{ $percent }}%;"></div>
                                        </div>
                                        <div class="bar-count">{{ $count }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Form Ulasan -->
                        <div class="add-review-section">
                            <h3 class="sidebar-title" style="display: block; border: none; margin-bottom: 10px;">Tulis Ulasan Anda</h3>
                            
                            @if(session('success'))
                                <div class="alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert-error">
                                    <ul style="list-style: none;">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('kuliner.ulasan.store', $kuliner->id) }}" method="POST" style="margin-top: 15px; margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 30px;">
                                @csrf
                                <input type="text" name="nama_pengulas" placeholder="Nama Anda" class="form-input" style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px;" required>
                                
                                <div class="star-rating" style="margin-bottom: 20px;">
                                    <input type="radio" id="star5" name="rating" value="5" required /><label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                </div>

                                <textarea name="isi_ulasan" placeholder="Tulis pengalaman mu disini..." class="form-input" style="width: 100%; padding: 12px; height: 100px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px;" required></textarea>
                                <button type="submit" class="btn-jelajah" style="border:none; cursor:pointer; width: 100%;">Kirim Ulasan</button>
                            </form>
                        </div>

                        <h3 class="sidebar-title" style="display: block; border: none; margin-bottom: 20px;">Ulasan Pengunjung ({{ $kuliner->ulasan->count() }})</h3>
                        
                        @if($kuliner->ulasan->count() > 0)
                            <div class="reviews-list">
                                @foreach($kuliner->ulasan as $ulasan)
                                <div class="review-item">
                                    <div class="review-header">
                                        <div class="reviewer-name">{{ $ulasan->nama_pengulas }}</div>
                                        <div class="review-rating"><i class="fas fa-star rating-star"></i> {{ $ulasan->rating }}</div>
                                    </div>
                                    <div class="review-date">{{ $ulasan->created_at->format('d M Y') }}</div>
                                    <p class="review-text">{{ $ulasan->isi_ulasan }}</p>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="empty-state" style="border: 1px dashed #ddd; padding: 40px; border-radius: 12px; background: #fafafa;">
                                <i class="far fa-comment-dots" style="font-size: 32px; color: #ccc; margin-bottom: 10px; display: block;"></i>
                                Belum ada ulasan. Jadilah yang pertama mengulas!
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Removed original sidebar since content moved to tabs, or we can keep a summarized sidebar if requested. 
                 Based on request "Menu Tentang, Informasi, Ulasan", tabs feel like the right main layout. 
                 But original layout had a sidebar. I will keep the layout Clean by making the tabs take full width or similar to reference image. 
                 The reference image shows tabs. So I will just use full width for the tabs container. -->
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            // Hide all tab contents
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                tabcontent[i].classList.remove("active");
            }

            // Remove active class from all buttons
            tablinks = document.getElementsByClassName("tab-btn");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the specific tab content and add active class to button
            document.getElementById(tabName).style.display = "block";
            // Small delay to trigger transition if needed, or just add active class
            setTimeout(() => {
                document.getElementById(tabName).classList.add("active");
            }, 10);
            
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>
