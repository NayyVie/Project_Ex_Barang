<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Ex Barang Management System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="{{ asset('assets/images/logoExBarang.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            overflow: hidden;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            position: relative;
            background: #ffffff;
        }

        /* =========================
           LEFT SIDE
        ========================= */

        .left-section {
            width: 68%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(90deg,
                    rgba(0, 74, 153, 0.98) 0%,
                    rgba(0, 101, 190, 0.92) 38%,
                    rgba(0, 130, 210, 0.55) 65%,
                    rgba(0, 130, 210, 0.15) 100%),
                url('/assets/images/pln-hero1.png');

            background-size: cover;
            background-position: center;
        }

        .left-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(135deg,
                    rgba(0, 66, 142, 0.75),
                    rgba(0, 110, 200, 0.35),
                    rgba(0, 163, 224, 0.10));
        }

        .left-content {
            position: relative;
            z-index: 2;

            height: 100vh;
            padding: 58px 75px;

            color: white;

            display: flex;
            flex-direction: column;
        }

        /* LOGO */

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-logo {
            display: flex;
            justify-content: center;
            align-items: center;

            color: #005baa;
            font-size: 28px;
            font-weight: 700;
        }

        .brand-text h2 {
            font-size: 31px;
            font-weight: 700;
            line-height: 1;
        }

        .brand-text span {
            display: block;
            font-size: 19px;
            margin-top: 5px;
            font-weight: 400;
        }

        /* CONTENT */

        .hero-content {
            margin-top: 85px;
            max-width: 610px;
        }

        .system-badge {
            display: inline-flex;
            align-items: center;

            background: rgba(45, 173, 242, 0.30);
            border: 1px solid rgba(255, 255, 255, 0.08);

            padding: 9px 18px;
            border-radius: 30px;

            font-size: 14px;
            font-weight: 500;
        }

        .system-badge::before {
            content: '';

            width: 13px;
            height: 13px;

            background: #18e1e7;
            border-radius: 50%;

            margin-right: 10px;

            box-shadow: 0 0 12px rgba(24, 225, 231, 0.8);
        }

        .hero-content h1 {
            margin-top: 28px;

            font-size: 50px;
            line-height: 1.15;

            font-weight: 700;
        }

        .hero-content h1 span {
            color: #0de1ff;
        }

        /* FEATURES */

        .features {
            margin-top: 32px;

            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .feature-icon {
            width: 62px;
            height: 62px;

            flex-shrink: 0;

            border-radius: 18px;

            background: rgba(20, 172, 238, 0.40);

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 28px;
        }

        .feature-text h3 {
            font-size: 16px;
            font-weight: 600;

            margin-bottom: 3px;
        }

        .feature-text p {
            font-size: 12px;

            color: rgba(255, 255, 255, 0.78);
        }

        /* FOOTER */

        .copyright {
            margin-top: auto;

            font-size: 11px;

            color: rgba(255, 255, 255, 0.60);
        }


        /* =========================
           RIGHT SIDE
        ========================= */

        .right-section {
            width: 32%;
            min-height: 100vh;

            background: #f8fbff;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 35px;
        }

        .login-card {
            width: 100%;
            max-width: 490px;

            background: rgba(255, 255, 255, 0.97);

            border-radius: 28px;

            padding: 48px 50px;

            box-shadow:
                0 20px 60px rgba(0, 77, 150, 0.12);

            position: relative;
        }

        .login-card::before {
            content: '';

            position: absolute;

            top: -75px;
            right: 0;

            width: 120px;
            height: 120px;

            background: rgba(43, 177, 239, 0.12);

            border-radius: 50%;
        }

        .login-title {
            font-size: 26px;

            color: #123b78;

            font-weight: 700;
        }

        .login-subtitle {
            margin-top: 7px;

            font-size: 13px;

            line-height: 1.6;

            color: #7386a1;
        }

        /* FORM */

        .form-group {
            margin-top: 27px;
        }

        .form-label {
            display: block;

            font-size: 13px;

            font-weight: 600;

            color: #183b6d;

            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .input-icon {
            width: 20px;
            height: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px 40px 10px 12px;

            height: 50px;

            border: 1px solid #ccc;

            border-radius: 6px;

            padding: 0 45px;

            outline: none;

            font-family: 'Poppins', sans-serif;

            font-size: 14px;
            box-sizing: border-box;

            color: #183b6d;

            background: #f8fbff;

            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #148bd4;

            background: white;

            box-shadow: 0 0 0 3px rgba(20, 139, 212, 0.08);
        }

        .password-toggle {
            position: absolute;

            right: 12px;
            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            cursor: pointer;

            color: #7590ae;

            font-size: 16px;
        }

        /* OPTIONS */

        .form-options {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 10px;
        }

        .remember {
            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 12px;

            color: #7588a2;
        }

        .remember input {
            width: 17px;
            height: 17px;

            accent-color: #0876c9;
        }

        .forgot-password {
            font-size: 11px;

            color: #176dcc;

            font-weight: 600;

            text-decoration: none;
        }

        /* BUTTON */

        .btn-login {
            width: 100%;

            height: 50px;

            border: none;

            border-radius: 10px;

            margin-top: 25px;

            background: #0879ca;

            color: white;

            font-family: 'Poppins', sans-serif;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;
        }

        .btn-login:hover {
            background: #0568b0;

            transform: translateY(-1px);
        }

        /* REGISTER */
        .register-text {
            text-align: center;
            margin-top: 16px;
            font-size: 12px;
            color: #7a8da6;
        }

        .register-text a {
            color: #0879ca;
            text-decoration: none;
            font-weight: 600;
            margin-left: 3px;
        }

        .register-text a:hover {
            text-decoration: underline;
        }


        /* =========================
   RESPONSIVE
========================= */


        /* =========================
   LAPTOP BESAR
========================= */

        @media (min-width: 1400px) {

            .left-section {
                width: 68%;
            }

            .right-section {
                width: 32%;
            }

            .left-content {
                padding: 58px 75px;
            }

            .hero-content h1 {
                font-size: 50px;
            }

            .login-card {
                max-width: 490px;
            }
        }


        /* =========================
   LAPTOP / DESKTOP
   1001px - 1399px
========================= */

        @media (min-width: 1001px) and (max-width: 1399px) {

            .left-section {
                width: 62%;
            }

            .right-section {
                width: 38%;
                padding: 25px;
            }

            .left-content {
                padding: 45px 50px;
            }

            .hero-content {
                margin-top: 40px;
            }

            .hero-content h1 {
                font-size: 40px;
            }

            .hero-description {
                font-size: 15px;
            }

            .features {
                gap: 16px;
            }

            .feature-icon {
                width: 55px;
                height: 55px;
            }

            .login-card {
                max-width: 450px;
                padding: 40px 35px;
            }
        }


        /* =========================
   TABLET LANDSCAPE
   769px - 1000px
========================= */

        @media (min-width: 769px) and (max-width: 1000px) {

            body {
                overflow-y: auto;
            }

            .left-section {
                width: 48%;
            }

            .right-section {
                width: 52%;
                padding: 25px;
            }

            .left-content {
                padding: 40px 30px;
            }

            .brand {
                gap: 10px;
            }

            .brand-logo img {
                width: 45px !important;
                height: 45px !important;
            }

            .brand-text h2 {
                font-size: 25px;
            }

            .brand-text span {
                font-size: 13px;
            }

            .hero-content {
                margin-top: 55px;
            }

            .system-badge {
                font-size: 11px;
                padding: 7px 13px;
            }

            .hero-content h1 {
                font-size: 31px;
            }

            .hero-description {
                font-size: 12px;
                line-height: 1.6;
            }

            .features {
                margin-top: 25px;
                gap: 15px;
            }

            .feature-icon {
                width: 45px;
                height: 45px;
                border-radius: 13px;
            }

            .feature-icon img {
                width: 22px !important;
                height: 22px !important;
            }

            .feature-text h3 {
                font-size: 12px;
            }

            .feature-text p {
                font-size: 9px;
            }

            .login-card {
                width: 100%;
                max-width: 440px;
                padding: 32px 28px;
                border-radius: 22px;
            }

            .login-title {
                font-size: 23px;
            }

            .login-subtitle {
                font-size: 11px;
            }

            .form-control {
                width: 100%;
            }
        }


        /* =========================
   TABLET PORTRAIT
   501px - 768px
========================= */

        @media (min-width: 501px) and (max-width: 768px) {

            body {
                overflow-y: auto;
            }

            .login-page {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }


            /* ===== HEADER / HERO ===== */

            .left-section {
                width: 100%;
                min-height: 310px;
                height: 310px;
            }

            .left-content {
                width: 100%;
                height: 310px;
                padding: 30px 40px;
            }

            .brand-logo img {
                width: 45px !important;
                height: 45px !important;
            }

            .brand-text h2 {
                font-size: 25px;
            }

            .brand-text span {
                font-size: 14px;
            }

            .hero-content {
                margin-top: 35px;
                max-width: 600px;
            }

            .system-badge {
                font-size: 11px;
                padding: 7px 13px;
            }

            .hero-content h1 {
                margin-top: 15px;
                font-size: 30px;
            }

            .hero-description {
                margin-top: 10px;
                font-size: 12px;
                line-height: 1.6;
                max-width: 550px;
            }

            /* Tidak terlalu memenuhi layar tablet */

            .features {
                display: none;
            }

            .copyright {
                display: none;
            }


            /* ===== LOGIN ===== */

            .right-section {
                width: 100%;
                min-height: calc(100vh - 310px);
                padding: 35px 40px;

                display: flex;
                align-items: flex-start;
                justify-content: center;
            }

            .login-card {
                width: 100%;
                max-width: 550px;

                padding: 35px 40px;

                border-radius: 22px;
            }

            .login-card::before {
                display: none;
            }

            .login-title {
                font-size: 25px;
            }

            .login-subtitle {
                font-size: 12px;
            }

            .form-control {
                width: 100%;
            }

            .btn-sso,
            .btn-login {
                width: 100%;
            }
        }


        /* =========================
   HP
   <= 500px
========================= */

        @media (max-width: 500px) {

            body {
                overflow-y: auto;
                background: #f7faff;
            }

            .login-page {
                display: block;
                min-height: 100vh;
            }


            /* =========================
       BAGIAN ATAS
    ========================= */

            .left-section {
                display: block;

                width: 100%;
                height: 220px;
                min-height: 220px;

                background-position: center;
            }

            .left-content {
                width: 100%;
                height: 220px;

                padding: 22px 20px;
            }


            /* ===== LOGO ===== */

            .brand {
                gap: 9px;
            }

            .brand-logo img {
                width: 38px !important;
                height: 38px !important;
            }

            .brand-text h2 {
                font-size: 21px;
            }

            .brand-text span {
                font-size: 11px;
                margin-top: 2px;
            }


            /* ===== HERO ===== */

            .hero-content {
                margin-top: 24px;
                max-width: 100%;
            }

            .system-badge {
                padding: 6px 10px;
                font-size: 9px;
            }

            .system-badge::before {
                width: 8px;
                height: 8px;
                margin-right: 6px;
            }

            .hero-content h1 {
                margin-top: 11px;

                font-size: 24px;
                line-height: 1.2;
            }

            .hero-description {
                margin-top: 8px;

                font-size: 9px;
                line-height: 1.5;

                max-width: 330px;
            }


            /* Sembunyikan fitur di HP */

            .features {
                display: none;
            }

            .copyright {
                display: none;
            }


            /* =========================
       LOGIN
    ========================= */

            .right-section {
                width: 100%;
                min-height: auto;

                padding: 20px 15px 35px;

                display: block;

                background: #f7faff;
            }


            /* ===== CARD ===== */

            .login-card {
                width: 100%;
                max-width: none;

                padding: 27px 20px;

                border-radius: 19px;

                box-shadow:
                    0 8px 30px rgba(0, 77, 150, 0.10);
            }

            .login-card::before {
                display: none;
            }


            /* ===== TITLE ===== */

            .login-title {
                font-size: 21px;
            }

            .login-subtitle {
                margin-top: 5px;

                font-size: 10px;
                line-height: 1.6;
            }


            /* ===== FORM ===== */

            .form-group {
                margin-top: 20px;
            }

            .form-label {
                font-size: 10px;
                margin-bottom: 7px;
            }

            .input-wrapper {
                width: 100%;
            }

            .form-control {
                width: 100%;
                height: 45px;

                padding: 0 40px;

                border-radius: 9px;

                font-size: 10px;
            }


            /* Icon input */

            .input-icon {
                left: 14px !important;
            }


            /* ===== PASSWORD ===== */

            .password-toggle {
                right: 12px;
                font-size: 14px;
            }

            .password-toggle .input-icon {
                left: auto !important;
                width: 16px !important;
                height: 16px !important;
            }


            /* ===== OPTIONS ===== */

            .form-options {
                margin-top: 9px;
            }

            .remember {
                font-size: 9px;
                gap: 6px;
            }

            .remember input {
                width: 14px;
                height: 14px;
            }

            .forgot-password {
                font-size: 9px;
            }


            /* =========================
       SSO BUTTON
    ========================= */

            .btn-sso {
                width: 100%;
                height: 45px;

                margin-top: 19px;

                border-radius: 9px;

                font-size: 9px;
            }

            .btn-sso img {
                width: 16px !important;
                height: 16px !important;
                vertical-align: middle;
            }


            /* =========================
       LOGIN BUTTON
    ========================= */

            .btn-login {
                width: 100%;
                height: 45px;

                margin-top: 11px;

                border-radius: 9px;

                font-size: 10px;
            }


            /* =========================
       REGISTER
    ========================= */

            .register-text {
                margin-top: 13px;

                font-size: 9px;
            }

            .register-text a {
                font-size: 9px;
            }

            /* =========================
   HP SANGAT KECIL
   <= 360px
========================= */

            @media (max-width: 360px) {

                .left-section {
                    height: 195px;
                    min-height: 195px;
                }

                .left-content {
                    height: 195px;
                    padding: 19px 16px;
                }

                .brand-logo img {
                    width: 34px !important;
                    height: 34px !important;
                }

                .brand-text h2 {
                    font-size: 19px;
                }

                .brand-text span {
                    font-size: 10px;
                }

                .hero-content {
                    margin-top: 20px;
                }

                .hero-content h1 {
                    font-size: 21px;
                }

                .hero-description {
                    font-size: 8px;
                }

                .right-section {
                    padding: 15px 11px 25px;
                }

                .login-card {
                    padding: 23px 17px;
                }

                .login-title {
                    font-size: 19px;
                }

                .login-subtitle {
                    font-size: 9px;
                }

                .form-control {
                    height: 43px;
                    font-size: 9px;
                }

                .btn-sso,
                .btn-login {
                    height: 43px;
                }
            }

            .copyright p {
                margin-bottom: 20px;
                text-align: center;
            }
    </style>
</head>


<body>

    <div class="login-page">

        <!-- ================= LEFT ================= -->

        <section class="left-section">

            <div class="left-overlay"></div>

            <div class="left-content">

                <!-- LOGO -->

                <div class="brand">

                    <div class="brand-logo">
                        <img src="{{ asset('assets/images/logopln.png') }}" alt="PLN Logo"
                            style="width: 57px; height: 57px;">
                    </div>

                    <div class="brand-text">
                        <h2>PLN</h2>
                        <span>Nusantara Power Services</span>
                    </div>

                </div>


                <!-- HERO -->

                <div class="hero-content">

                    <div class="system-badge">
                        Ex Barang Management System
                    </div>


                    <h1>
                        Kelola Aset Ex Barang
                        <span>PLN</span> dengan Mudah
                    </h1>


                    <!-- FEATURES -->

                    <div class="features">

                        <div class="feature">

                            <div class="feature-icon">
                                <img src="{{ asset('assets/images/icon-note.png') }}" alt="Clipboard Icon"
                                    style="width: 28px; height: 28px;">
                            </div>

                            <div class="feature-text">

                                <h3>Pelaporan Digital</h3>

                                <p>
                                    Input dan kelola laporan ex barang secara real-time
                                </p>

                            </div>

                        </div>


                        <div class="feature">

                            <div class="feature-icon">
                                <img src="{{ asset('assets/images/icon-chart.png') }}" alt="Monitoring Icon"
                                    style="width: 28px; height: 28px;">
                            </div>

                            <div class="feature-text">

                                <h3>Monitoring Terpusat</h3>

                                <p>
                                    Pantau aset dari semua unit dalam satu dashboard
                                </p>

                            </div>

                        </div>


                        <div class="feature">

                            <div class="feature-icon">
                                <img src="{{ asset('assets/images/icon-check.png') }}" alt="Checkmark Icon"
                                    style="width: 28px; height: 28px;">
                            </div>

                            <div class="feature-text">

                                <h3>Workflow Approval</h3>

                                <p>
                                    Proses persetujuan yang cepat dan terdokumentasi
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="copyright">
                    <p>© 2026 PT PLN Nusantara Power Services</p>
                </div>

            </div>

        </section>


        <!-- ================= RIGHT ================= -->

        <section class="right-section">

            <div class="login-card">

                <h1 class="login-title">
                    Selamat Datang
                </h1>

                <p class="login-subtitle">
                    Masuk ke sistem manajemen ex barang PLN Nusantara Power Services
                </p>


                <!-- FORM -->

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    <!-- USERNAME -->

                    <div class="form-group">

                        <label class="form-label">
                            Username / Email
                        </label>

                        <div class="input-wrapper">
                            {{-- Ikon Flaticon --}}
                            <img src="{{ asset('assets/images/user.png') }}" alt="User Icon" class="input-icon"
                                style="width: 18px; height: 18px; position: absolute; left: 16px; top: 50%; transform: translateY(-50%);">

                            <input type="text" name="email" class="form-control"
                                placeholder="Masukkan username atau email">

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label class="form-label">
                            Password
                        </label>

                        <div class="input-wrapper">

                            {{-- Ikon Flaticon --}}
                            <img src="{{ asset('assets/images/padlock.png') }}" alt="Lock Icon" class="input-icon"
                                style="width: 18px; height: 18px; position: absolute; left: 16px; top: 50%; transform: translateY(-50%);">

                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Masukkan password">

                            {{-- Tombol / Icon Mata --}}
                            <span class="password-toggle" onclick="togglePassword()">
                                <img id="eyeIcon" src="{{ asset('assets/images/hide.png') }}" alt="Show Password"
                                    class="input-icon">
                            </span>

                        </div>

                    </div>


                    <!-- OPTIONS -->

                    <div class="form-options">

                        <label class="remember">

                            <input type="checkbox" name="remember">

                            <span>Ingat saya</span>

                        </label>


                        <a href="{{ route('forgetPassword') }}" class="forgot-password">
                            Lupa password?
                        </a>

                    </div>


                    <!-- LOGIN -->

                    <button type="submit" class="btn-login">
                        Masuk
                    </button>

                    <div class="register-text">
                        Belum Punya Akun?
                        <a href="{{ route('registerr') }}">Daftar Sekarang</a>
                    </div>

                </form>

            </div>

        </section>

    </div>


    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {

                passwordInput.type = 'text';

                eyeIcon.src = '{{ asset('assets/images/view.png') }}';

            } else {

                passwordInput.type = 'password';

                eyeIcon.src = '{{ asset('assets/images/hide.png') }}';

            }

        }
    </script>

</body>

</html>
