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

        /* Table Styling */
        .table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #eee;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th, .data-table td {
            padding: 15px 20px;
            text-align: left;
            vertical-align: middle;
        }

        .data-table th {
            background: #fdfdfd;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid #eee;
            font-size: 14px;
        }

        .data-table td {
            border-bottom: 1px solid #f9f9f9;
            color: #333;
            font-size: 14px;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table tr:hover {
            background-color: #fafafa;
        }

        .thumb-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #eee;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            background: #fff8e1;
            color: #ffc107;
            font-size: 12px;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s;
            color: white;
            background: #aaa; /* Default fallback */
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-edit-sm { background: #3498db; }
        .btn-delete-sm { background: #e74c3c; }
        .btn-sm:hover { opacity: 0.9; }

        /* Modal */
        .modal {
            display: none;
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
            z-index: 1001;
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
                <a href="{{ route('admin') }}" class="nav-link active">
                    <i class="fas fa-drumstick-bite"></i> Kuliner
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('daerah') }}" class="nav-link">
                    <i class="fas fa-map-marker-alt"></i> Daerah
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
            <!-- Stats Widgets -->
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-label">Total Menu</span>
                    <span class="stat-value">{{ $kuliners->count() }}</span>
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

            <!-- Kuliner Table -->
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th width="80">Foto</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Jam Operasional</th>
                            <th>Daerah Asal</th>
                            <th>Rating</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kuliners as $index => $kuliner)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $kuliner->gambar) }}" alt="Thumb" class="thumb-img">
                            </td>
                            <td>
                                <div style="font-weight: 600;">{{ $kuliner->nama_kuliner }}</div>
                                <div style="font-size: 12px; color: #888;">{{ Str::limit($kuliner->alamat, 40) }}</div>
                                <div style="font-size: 11px; color: #aaa; font-style: italic;">{{ Str::limit($kuliner->deskripsi, 30) }}</div>
                            </td>
                            <td>
                                <div style="font-weight: 500; color: #2ecc71;">{{ $kuliner->harga ?? '-' }}</div>
                            </td>
                            <td>
                                <div style="font-size: 13px; color: #555;">
                                    @if($kuliner->jam_buka && $kuliner->jam_tutup)
                                        <i class="far fa-clock"></i> {{ $kuliner->jam_buka }} - {{ $kuliner->jam_tutup }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span style="display: inline-block; background: #f0f0f0; padding: 3px 10px; border-radius: 15px; font-size: 12px; color: #555;">
                                    {{ $kuliner->daerah->nama_daerah ?? 'Indonesia' }}
                                </span>
                            </td>
                            <td>
                                <div class="status-badge">
                                    <i class="fas fa-star" style="font-size: 10px;"></i> {{ $kuliner->rating }}
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-sm btn-edit-sm" title="Edit" onclick='editKuliner(@json($kuliner))'>
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{ route('kuliner.destroy', $kuliner->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus menu ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-sm btn-delete-sm" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: #888;">
                                <i class="fas fa-utensils" style="font-size: 32px; margin-bottom: 15px; opacity: 0.3; display: block;"></i>
                                Belum ada menu kuliner yang ditambahkan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div id="kulinerModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Tambah Menu Baru</h3>
                <button type="button" class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form id="kulinerForm" action="{{ route('kuliner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="methodField"></div>
                    <div class="form-group">
                        <label class="form-label">Nama Menu</label>
                        <input type="text" name="nama_kuliner" id="nama_kuliner" class="form-input" placeholder="Contoh: Soto Banjar" required>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Daerah Asal</label>
                            <select name="daerah_id" id="daerah_id" class="form-select" required>
                                <option value="">Pilih...</option>
                                @foreach($daerahs as $daerah)
                                    <option value="{{ $daerah->id }}">{{ $daerah->nama_daerah }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Link Google Maps</label>
                            <input type="url" name="gmaps_link" id="gmaps_link" class="form-input" placeholder="https://maps.google.com/..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-input" placeholder="Contoh: Rp 25.000 / porsi" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" class="form-textarea" rows="2" placeholder="Masukkan alamat lengkap lokasi..."></textarea>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Jam Buka</label>
                            <input type="time" name="jam_buka" id="jam_buka" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jam Tutup</label>
                            <input type="time" name="jam_tutup" id="jam_tutup" class="form-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi Singkat</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-textarea" rows="3" placeholder="Jelaskan keunikan menu ini..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Rating (1-5)</label>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="range" name="rating" id="rating" min="1" max="5" value="5" class="form-input" oninput="this.nextElementSibling.innerText = this.value">
                            <span id="ratingValue" style="font-weight: bold; color: #ff6b35;">5</span> <i class="fas fa-star" style="color: #ff6b35;"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Foto Menu</label>
                        <input type="file" name="gambar" id="gambar" class="form-input" accept="image/*">
                        <small style="color: #999; font-size: 12px; margin-top: 5px; display: block;">Format: JPG, PNG, Max: 2MB. Biarkan kosong jika tidak ingin mengubah gambar (saat edit).</small>
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-save"></i> Simpan Menu
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal functions
        function openModal() {
            // Reset form for "Add" mode
            document.getElementById('kulinerForm').action = "{{ route('kuliner.store') }}";
            document.getElementById('methodField').innerHTML = '';
            document.getElementById('modalTitle').innerText = 'Tambah Menu Baru';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save"></i> Simpan Menu';
            document.getElementById('nama_kuliner').value = '';
            document.getElementById('daerah_id').value = '';
            document.getElementById('gmaps_link').value = '';
            document.getElementById('harga').value = '';
            document.getElementById('alamat').value = '';
            document.getElementById('jam_buka').value = '';
            document.getElementById('jam_tutup').value = '';
            document.getElementById('deskripsi').value = '';
            document.getElementById('rating').value = 5;
            document.getElementById('ratingValue').innerText = 5;
            document.getElementById('gambar').required = true; // Image required for new items
            
            document.getElementById('kulinerModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('kulinerModal').style.display = 'none';
        }

        function editKuliner(data) {
            // Populate form for "Edit" mode
            let updateUrl = "{{ route('kuliner.update', ':id') }}";
            updateUrl = updateUrl.replace(':id', data.id);
            
            document.getElementById('kulinerForm').action = updateUrl;
            document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
            document.getElementById('modalTitle').innerText = 'Edit Menu Kuliner';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save"></i> Simpan Perubahan';
            
            document.getElementById('nama_kuliner').value = data.nama_kuliner;
            document.getElementById('daerah_id').value = data.daerah_id;
            document.getElementById('gmaps_link').value = data.gmaps_link;
            document.getElementById('harga').value = data.harga;
            document.getElementById('alamat').value = data.alamat;
            document.getElementById('jam_buka').value = data.jam_buka;
            document.getElementById('jam_tutup').value = data.jam_tutup;
            document.getElementById('deskripsi').value = data.deskripsi;
            document.getElementById('rating').value = data.rating;
            document.getElementById('ratingValue').innerText = data.rating;
            document.getElementById('gambar').required = false; // Image not required for update
            
            document.getElementById('kulinerModal').style.display = 'flex';
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
