<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - KulinerNusantara</title>
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

        /* Top Navbar */
        .navbar {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.2);
            color: white;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn-home {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-home:hover {
            background: white;
            color: #ff6b35;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 35px;
            height: 35px;
            background: white;
            color: #ff6b35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Stats Row */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            border-left: 5px solid #ff6b35;
        }

        .stat-label {
            color: #777;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #333;
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

        .btn-add {
            background: #ff6b35;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(255, 107, 53, 0.3);
            transition: transform 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            background: #f7931e;
        }

        /* Card Grid */
        .kuliner-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .kuliner-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border: 1px solid #eee;
        }

        .kuliner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .card-img-wrapper {
            position: relative;
            height: 180px;
            overflow: hidden;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .kuliner-card:hover .card-img {
            transform: scale(1.05);
        }

        .card-overlay {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255,255,255,0.9);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #ff6b35;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #333;
        }

        .card-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 12px;
            font-size: 12px;
            color: #888;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-desc {
            font-size: 13px;
            color: #666;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-actions {
            display: flex;
            gap: 10px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .action-btn {
            flex: 1;
            padding: 8px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .btn-edit {
            background: #fff5f0;
            color: #ff6b35;
        }

        .btn-edit:hover {
            background: #ffe0d1;
        }

        .btn-delete {
            background: #ffecec;
            color: #ea4335;
        }

        .btn-delete:hover {
            background: #ffd6d6;
        }

        /* Modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            z-index: 1001; /* Ensure content is above overlay */
        }

        .modal-header {
            padding: 25px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
        }

        .modal-title { font-size: 20px; font-weight: 700; color: #333; }

        .close-btn {
            font-size: 24px;
            cursor: pointer;
            color: #aaa;
            background: none;
            border: none;
        }

        .modal-body {
            padding: 25px;
        }

        .form-group { margin-bottom: 20px; }
        .form-label { display: block; margin-bottom: 8px; font-weight: 500; font-size: 14px; color: #555; }
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #eee;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #ff6b35;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.2);
        }

        .submit-btn:hover { opacity: 0.9; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div style="display: flex; align-items: center; gap: 30px;">
            <div class="navbar-brand">
                <i class="fas fa-utensils" style="margin-right: 10px;"></i> Dashboard Admin
            </div>
            <div class="nav-links" style="display: flex; gap: 20px;">
                <a href="{{ route('admin') }}" style="color: white; text-decoration: none; font-weight: 700;">Kuliner</a>
                <a href="{{ route('daerah') }}" style="color: rgba(255,255,255,0.8); text-decoration: none; font-weight: 500; transition: color 0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.8)'">Daerah</a>
            </div>
        </div>
        <div class="nav-actions">
            <!-- Reuse existing user profile section -->
            <div class="user-profile">
                <div class="avatar">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <!-- Logout Form Hidden but triggerable -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button onclick="document.getElementById('logout-form').submit()" style="background:none; border:none; color:white; cursor:pointer;" title="Logout">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Stats Widgets -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-label">Total Menu</span>
                <span class="stat-value">{{ $kuliners->count() }}</span>
            </div>
            <div class="stat-card" style="border-left-color: #1abc9c;">
                <span class="stat-label">Kategori Tersedia</span>
                <span class="stat-value">{{ $kategoris->count() }}</span>
            </div>
            <div class="stat-card" style="border-left-color: #3498db;">
                <span class="stat-label">Daerah Terjangkau</span>
                <span class="stat-value">{{ $daerahs->count() }}</span>
            </div>
        </div>

        <!-- Content Header -->
        <div class="content-header">
            <div class="section-title">
                <h2>Daftar Menu</h2>
                <p>Kelola menu kuliner yang tersedia</p>
            </div>
            <button class="btn-add" onclick="openModal()">
                <i class="fas fa-plus"></i> Tambah Menu
            </button>
        </div>

        <!-- Messages -->
        @if(session('success'))
            <div style="background: #e6fffa; color: #2c7a7b; padding: 15px; border-radius: 10px; margin-bottom: 25px; border: 1px solid #b2f5ea;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background: #fff5f5; color: #c53030; padding: 15px; border-radius: 10px; margin-bottom: 25px; border: 1px solid #feb2b2;">
                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Kuliner Grid Cards -->
        <div class="kuliner-grid">
            @forelse($kuliners as $kuliner)
            <div class="kuliner-card">
                <div class="card-img-wrapper">
                    <img src="{{ Storage::url($kuliner->gambar) }}" alt="{{ $kuliner->nama_kuliner }}" class="card-img">
                    <div class="card-overlay">
                        <i class="fas fa-star"></i> {{ $kuliner->rating ?? '0' }}
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $kuliner->nama_kuliner }}</h3>
                    <div class="card-meta">
                        <div class="meta-item">
                            <i class="fas fa-tag"></i> {{ $kuliner->kategori->nama_kategori ?? 'Umum' }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt"></i> {{ $kuliner->daerah->nama_daerah ?? 'Indonesia' }}
                        </div>
                    </div>
                    <p class="card-desc">{{ $kuliner->deskripsi }}</p>
                    
                    <div class="card-actions">
                        <button class="action-btn btn-edit">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </button>
                        <form action="{{ route('kuliner.destroy', $kuliner->id) }}" method="POST" style="flex:1;" onsubmit="return confirm('Hapus menu ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete" style="width:100%;">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 50px; color: #888;">
                <i class="fas fa-utensils" style="font-size: 48px; margin-bottom: 15px; opacity: 0.3;"></i>
                <p>Belum ada menu kuliner yang ditambahkan.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Modal Form -->
    <div id="kulinerModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Menu Baru</h3>
                <button type="button" class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kuliner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nama Menu</label>
                        <input type="text" name="nama_kuliner" class="form-input" placeholder="Contoh: Soto Banjar" required>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Kategori</label>
                            <select name="kategori_id" class="form-select" required>
                                <option value="">Pilih...</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Daerah Asal</label>
                            <select name="daerah_id" class="form-select" required>
                                <option value="">Pilih...</option>
                                @foreach($daerahs as $daerah)
                                    <option value="{{ $daerah->id }}">{{ $daerah->nama_daerah }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi Singkat</label>
                        <textarea name="deskripsi" class="form-textarea" rows="3" placeholder="Jelaskan keunikan menu ini..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Rating (1-5)</label>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="range" name="rating" min="1" max="5" value="5" class="form-input" oninput="this.nextElementSibling.innerText = this.value">
                            <span style="font-weight: bold; color: #ff6b35;">5</span> <i class="fas fa-star" style="color: #ff6b35;"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Foto Menu</label>
                        <input type="file" name="gambar" class="form-input" accept="image/*" required>
                        <small style="color: #999; font-size: 12px; margin-top: 5px; display: block;">Format: JPG, PNG, Max: 2MB</small>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> Simpan Menu
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal functions
        function openModal() {
            document.getElementById('kulinerModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('kulinerModal').style.display = 'none';
        }

        // Close when clicking outside
        window.onclick = function(event) {
            var modal = document.getElementById('kulinerModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
