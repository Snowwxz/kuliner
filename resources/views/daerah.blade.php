<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daerah - KulinerNusantara</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reusing consistent styles */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        body { background-color: #f8f9fa; min-height: 100vh; color: #333; }
        
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

        .container { max-width: 1200px; margin: 0 auto; padding: 0; }
        .content-header { margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; }
        .section-title h2 { font-size: 24px; font-weight: 700; color: #333; }
        .section-title p { color: #777; font-size: 14px; margin-top: 5px; }

        /* Grid */
        .daerah-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px; }
        .daerah-card { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); display: flex; align-items: center; gap: 15px; border-left: 5px solid #1abc9c; transition: transform 0.2s; }
        .daerah-card:hover { transform: translateY(-3px); }
        .daerah-icon { font-size: 24px; color: #1abc9c; }
        .daerah-info h3 { font-size: 18px; font-weight: 700; color: #333; }
        .daerah-info p { font-size: 13px; color: #777; margin-top: 2px; }

        /* Button & Modal Styles (Reused) */
        .btn-add { background: #ff6b35; color: white; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 10px rgba(255, 107, 53, 0.3); display: flex; align-items: center; gap: 8px; transition: transform 0.2s; }
        .btn-add:hover { transform: translateY(-2px); background: #f7931e; }
        
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); align-items: center; justify-content: center; backdrop-filter: blur(5px); }
        .modal-content { background: white; border-radius: 20px; width: 90%; max-width: 500px; max-height: 90vh; overflow-y: auto; position: relative; z-index: 1001; animation: slideUp 0.3s ease; }
        @keyframes slideUp { from { transform: translateY(50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .modal-header { padding: 25px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; background: white; z-index: 10; }
        .modal-body { padding: 25px; }
        .modal-title { font-size: 20px; font-weight: 700; color: #333; }
        .close-btn { font-size: 24px; cursor: pointer; color: #aaa; background: none; border: none; }
        
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; margin-bottom: 8px; font-weight: 500; font-size: 14px; color: #555; }
        .form-input, .form-textarea { width: 100%; padding: 12px 15px; border: 2px solid #eee; border-radius: 10px; font-family: inherit; font-size: 14px; transition: border-color 0.3s; }
        .form-input:focus, .form-textarea:focus { outline: none; border-color: #ff6b35; }
        .submit-btn { width: 100%; padding: 15px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 15px rgba(255, 107, 53, 0.2); }
        .submit-btn:hover { opacity: 0.9; }
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
                <a href="{{ route('daerah') }}" class="nav-link active">
                    <i class="fas fa-map-marker-alt"></i> Daerah
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('resto.index') }}" class="nav-link">
                    <i class="fas fa-store"></i> Resto
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('feedback.index') }}" class="nav-link">
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
            <div class="content-header">
                <div class="section-title">
                    <h2>Daftar Daerah</h2>
                    <p>Wilayah kuliner yang tersedia</p>
                </div>
                <button class="btn-add" onclick="openModal()">
                    <i class="fas fa-plus"></i> Tambah Daerah
                </button>
            </div>

            @if(session('success'))
                <div style="background: #e6fffa; color: #2c7a7b; padding: 15px; border-radius: 10px; margin-bottom: 25px; border: 1px solid #b2f5ea;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <div class="daerah-grid">
                @forelse($daerahs as $daerah)
                <div class="daerah-card">
                    <div class="daerah-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="daerah-info" style="flex: 1;">
                        <h3>{{ $daerah->nama_daerah }}</h3>
                        <p>{{ $daerah->keterangan ?? 'Tidak ada keterangan' }}</p>
                    </div>
                    <form action="{{ route('daerah.destroy', $daerah->id) }}" method="POST" onsubmit="return confirm('Hapus daerah ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color: #e74c3c; cursor: pointer;">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
                @empty
                <p style="color: #777;">Belum ada data daerah.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div id="daerahModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Daerah Baru</h3>
                <button type="button" class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('daerah.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nama Daerah</label>
                        <input type="text" name="nama_daerah" class="form-input" placeholder="Contoh: Samarinda" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-textarea" rows="3" placeholder="Keterangan singkat (opsional)"></textarea>
                    </div>
                    <button type="submit" class="submit-btn"><i class="fas fa-save"></i> Simpan Daerah</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal() { document.getElementById('daerahModal').style.display = 'flex'; }
        function closeModal() { document.getElementById('daerahModal').style.display = 'none'; }
        window.onclick = function(event) {
            var modal = document.getElementById('daerahModal');
            if (event.target == modal) { modal.style.display = 'none'; }
        }
    </script>

</body>
</html>
