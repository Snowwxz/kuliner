<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - KulinerNusantara</title>
    <meta name="description" content="Masuk ke akun KulinerNusantara Anda dan jelajahi destinasi kuliner Indonesia.">
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
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #fff5f0 0%, #ffe8dc 100%);
        }

        /* Left Side - Branding */
        .login-branding {
            flex: 1;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff6b35 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .login-branding::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(180deg); }
        }

        .branding-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .branding-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        .branding-logo .logo-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .branding-logo span {
            font-size: 32px;
            font-weight: 700;
        }

        .branding-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .branding-subtitle {
            font-size: 18px;
            opacity: 0.9;
            max-width: 400px;
            line-height: 1.6;
        }

        .branding-features {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 15px 25px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .feature-item i {
            font-size: 20px;
        }

        .feature-item span {
            font-size: 15px;
            font-weight: 500;
        }

        /* Decorative Elements */
        .decoration {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .decoration-1 {
            width: 300px;
            height: 300px;
            bottom: -100px;
            left: -100px;
        }

        .decoration-2 {
            width: 200px;
            height: 200px;
            top: -50px;
            right: -50px;
        }

        .decoration-3 {
            width: 150px;
            height: 150px;
            top: 50%;
            right: 10%;
        }

        /* Right Side - Login Form */
        .login-form-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
        }

        .login-form-container {
            width: 100%;
            max-width: 450px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #777;
            font-size: 16px;
        }

        .login-form {
            background: white;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(255, 107, 53, 0.1);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .input-wrapper input {
            width: 100%;
            padding: 16px 20px 16px 55px;
            border: 2px solid #eee;
            border-radius: 15px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: #ff6b35;
            background: white;
            box-shadow: 0 5px 20px rgba(255, 107, 53, 0.1);
        }

        .input-wrapper input:focus + i,
        .input-wrapper:focus-within i {
            color: #ff6b35;
        }

        .input-wrapper input::placeholder {
            color: #bbb;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            display: none;
        }

        .checkmark {
            width: 20px;
            height: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .remember-me input[type="checkbox"]:checked + .checkmark {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-color: #ff6b35;
        }

        .checkmark i {
            color: white;
            font-size: 12px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .remember-me input[type="checkbox"]:checked + .checkmark i {
            opacity: 1;
        }

        .remember-me span {
            color: #666;
            font-size: 14px;
        }

        .forgot-password {
            color: #ff6b35;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #e55a2b;
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border: none;
            border-radius: 15px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
            gap: 15px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .divider span {
            color: #aaa;
            font-size: 14px;
        }

        .social-login {
            display: flex;
            gap: 15px;
        }

        .social-btn {
            flex: 1;
            padding: 14px;
            border: 2px solid #eee;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            color: #555;
        }

        .social-btn:hover {
            border-color: #ff6b35;
            background: #fff5f0;
        }

        .social-btn.google i {
            color: #ea4335;
        }

        .social-btn.facebook i {
            color: #1877f2;
        }

        .signup-link {
            text-align: center;
            margin-top: 30px;
            color: #777;
            font-size: 15px;
        }

        .signup-link a {
            color: #ff6b35;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #e55a2b;
            text-decoration: underline;
        }

        /* Back to Home */
        .back-home {
            position: absolute;
            top: 30px;
            left: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .back-home:hover {
            transform: translateX(-5px);
        }

        .back-home i {
            font-size: 18px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            body {
                flex-direction: column;
            }

            .login-branding {
                padding: 40px 30px;
                min-height: auto;
            }

            .branding-logo span {
                font-size: 24px;
            }

            .branding-title {
                font-size: 28px;
            }

            .branding-subtitle {
                font-size: 14px;
            }

            .branding-features {
                display: none;
            }

            .login-form-section {
                padding: 40px 20px;
            }

            .back-home {
                top: 20px;
                left: 20px;
            }
        }

        @media (max-width: 576px) {
            .login-form {
                padding: 30px 25px;
            }

            .form-header h1 {
                font-size: 26px;
            }

            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .social-login {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Left Side - Branding -->
    <div class="login-branding">
        <a href="/" class="back-home">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>

        <!-- Decorative Elements -->
        <div class="decoration decoration-1"></div>
        <div class="decoration decoration-2"></div>
        <div class="decoration decoration-3"></div>

        <div class="branding-content">
            <div class="branding-logo">
                <div class="logo-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <span>KulinerNusantara</span>
            </div>

            <h2 class="branding-title">Selamat Datang<br>Kembali!</h2>
            <p class="branding-subtitle">
                Masuk ke akun Anda dan mulai jelajahi ribuan destinasi kuliner autentik dari seluruh Nusantara.
            </p>

            <div class="branding-features">
                <div class="feature-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>1000+ Destinasi Kuliner</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-star"></i>
                    <span>Review dari Komunitas</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-heart"></i>
                    <span>Simpan Favorit Anda</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="login-form-section">
        <div class="login-form-container">
            <div class="form-header">
                <h1>Masuk ke Akun</h1>
                <p>Silakan masukkan kredensial Anda</p>
            </div>

            <form class="login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                        <i class="fas fa-lock"></i>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span class="checkmark"><i class="fas fa-check"></i></span>
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="forgot-password">Lupa password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>

                <div class="divider">
                    <span>atau masuk dengan</span>
                </div>

                <div class="social-login">
                    <button type="button" class="social-btn google">
                        <i class="fab fa-google"></i>
                        Google
                    </button>
                    <button type="button" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                        Facebook
                    </button>
                </div>

                <div class="signup-link">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
