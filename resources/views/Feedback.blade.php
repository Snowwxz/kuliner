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

        /* List Styling */
        .feedback-list {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #eee;
        }

        .feedback-item {
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.2s;
        }

        .feedback-item:last-child {
            border-bottom: none;
        }

        .feedback-item:hover {
            background: #fafafa;
        }

        .feedback-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            align-items: flex-start;
        }

        .user-info h4 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 3px;
        }

        .user-info span {
            font-size: 13px;
            color: #888;
        }

        .rating-stars {
            color: #ffca28;
            font-size: 14px;
        }

        .feedback-message {
            color: #555;
            font-size: 14px;
            line-height: 1.6;
        }

        .timestamp {
            font-size: 12px;
            color: #aaa;
            margin-top: 10px;
            text-align: right;
            display: block;
        }
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
                <a href="{{ route('admin') }}" style="color: rgba(255,255,255,0.8); text-decoration: none; font-weight: 500; transition: color 0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.8)'">Kuliner</a>
                <a href="{{ route('daerah') }}" style="color: rgba(255,255,255,0.8); text-decoration: none; font-weight: 500; transition: color 0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.8)'">Daerah</a>
                <a href="{{ route('feedback.index') }}" style="color: white; text-decoration: none; font-weight: 700;">Feedback</a>
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
        <!-- Content Header -->
        <div class="content-header">
            <div class="section-title">
                <h2>Daftar Feedback</h2>
                <p>Ulasan dan masukan dari pengguna</p>
            </div>
        </div>

        <!-- Feedback List -->
        <div class="feedback-list">
            @forelse($feedbacks as $feedback)
            <div class="feedback-item">
                <div class="feedback-header">
                    <div class="user-info">
                        <h4>{{ $feedback->name }}</h4>
                        <span>{{ $feedback->email }}</span>
                    </div>
                    <div>
                        <div class="rating-stars">
                            @for($i = 0; $i < $feedback->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @for($i = $feedback->rating; $i < 5; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="feedback-message">
                    "{{ $feedback->message }}"
                </p>
                <span class="timestamp">
                    <i class="far fa-clock"></i> {{ $feedback->created_at->diffForHumans() }}
                </span>
            </div>
            @empty
            <div style="padding: 40px; text-align: center; color: #888;">
                <i class="far fa-comment-dots" style="font-size: 48px; margin-bottom: 15px; opacity: 0.3;"></i>
                <p>Belum ada feedback yang diterima.</p>
            </div>
            @endforelse
        </div>
    </div>
</body>
</html>
