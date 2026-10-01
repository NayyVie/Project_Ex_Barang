<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi - Ex Barang System</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/logoExBarang.png') }}" type="image/x-icon">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        .register-page {
            min-height: 100vh;
            display: flex;
            position: relative;
            background: #ffffff;
        }

        /* =========================
           BAGIAN KIRI
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

        /* Logo */

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand logo {
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

        /* Content kiri */
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

        .hero-content h2 {
            margin-bottom: 12px;

            font-size: 32px;
            font-weight: 700;
            line-height: 1.3;
        }

        .hero-content p {
            max-width: 430px;

            font-size: 13px;
            line-height: 1.8;

            color: rgba(255, 255, 255, 0.88);
        }

        /* FOOTER */

        .copyright {
            margin-top: auto;

            font-size: 11px;

            color: rgba(255, 255, 255, 0.60);
        }

        /* =========================
           BAGIAN KANAN
        ========================= */

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

        .register-card {
            width: 100%;
            max-width: 490px;

            background: rgba(255, 255, 255, 0.97);

            border-radius: 28px;

            padding: 48px 50px;

            box-shadow:
                0 20px 60px rgba(0, 77, 150, 0.12);

            position: relative;
        }

        .register-card::before {
            content: '';

            position: absolute;

            top: -75px;
            right: 0;

            width: 120px;
            height: 120px;

            background: rgba(43, 177, 239, 0.12);

            border-radius: 50%;
        }

        .register-title {
            font-size: 26px;

            color: #123b78;

            font-weight: 700;
        }

        .register-subtitle {
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

        .input-wrapper .form-control {
            width: 100%;
            padding-right: 48px;
        }

        .form-control {
            width: 100%;
            padding: 10px 40px 10px 12px;

            height: 50px;

            border: 1px solid #ccc;

            border-radius: 6px;

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
            position: absolute !important;
            top: 50% !important;
            right: 12px !important;
            transform: translateY(-50%) !important;

            width: 32px !important;
            height: 32px !important;

            padding: 0 !important;
            margin: 0 !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            border: 0 !important;
            outline: none !important;
            background: transparent !important;

            cursor: pointer !important;

            z-index: 20 !important;
        }

        .password-toggle img {
            width: 20px !important;
            height: 20px !important;

            display: block !important;
            object-fit: contain;

            pointer-events: none !important;
        }

        .password-toggle .input-icon {
            width: 20px;
            height: 20px;

            display: block;
            object-fit: contain;

            cursor: pointer;
            pointer-events: none;
        }

        /* BUTTON */

        .btn-register {
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

        .btn-register:hover {
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

        /* ========================================
   PASSWORD TOGGLE
======================================== */

        .password-wrapper .password-toggle {
            position: absolute;

            right: 8px;
            top: 50%;

            width: 32px;
            height: 32px;

            transform: translateY(-50%);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0;

            border: none;
            background: transparent;

            cursor: pointer;

            z-index: 5;
        }


        /* Ikon mata */

        .password-wrapper .password-toggle img {
            position: static !important;

            width: 18px;
            height: 18px;

            object-fit: contain;

            display: block;

            margin: 0;
            transform: none !important;
        }


        /* Hover */

        .password-wrapper .password-toggle:hover {
            opacity: 0.75;
        }

        /* ======== ROLE ======== */
        .role-select {
            appearance: auto;
            -webkit-appearance: auto;
            -moz-appearance: auto;

            cursor: pointer;
        }

        .role-select:invalid {
            color: #8a9ab0;
        }

        .role-select option {
            color: #172b4d;
            background: #ffffff;
        }

        /* =========================================================
   RESPONSIVE FIX
   Tidak mengubah desain utama
   Hanya merapikan posisi dan ukuran pada layar kecil
========================================================= */

        /* =========================
   LAPTOP BESAR
========================= */
        @media (min-width: 1400px) {

            .left-section {
                width: 68%;
            }

            .right-section {
                width: 32%;
                min-height: 100vh;
            }

            .left-content {
                padding: 58px 75px;
            }

            .register-card {
                width: min(100%, 560px);
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
                min-height: 100vh;
            }

            .left-content {
                padding: 48px 55px;
            }

            .hero-content {
                margin-top: 65px;
                max-width: 540px;
            }

            .hero-content h1 {
                font-size: 42px;
            }

            .hero-content h2 {
                font-size: 28px;
            }

            .hero-content p {
                max-width: 430px;
            }

            .register-card {
                width: min(100% - 36px, 520px);
                margin: 24px auto;
            }
        }


        /* =========================
   TABLET LANDSCAPE / SMALL LAPTOP
   769px - 1000px
========================= */
        @media (min-width: 769px) and (max-width: 1000px) {

            .register-page {
                min-height: 100vh;
                align-items: stretch;
            }

            .left-section {
                width: 48%;
                min-height: 100vh;
            }

            .right-section {
                width: 52%;
                min-height: 100vh;
                padding: 25px 18px;
                overflow-y: auto;
            }

            .left-content {
                height: 100vh;
                padding: 40px 32px;
            }

            .brand {
                gap: 10px;
            }

            .brand-text h2 {
                font-size: 25px;
            }

            .brand-text span {
                font-size: 13px;
            }

            .hero-content {
                margin-top: 55px;
                max-width: 100%;
            }

            .system-badge {
                font-size: 12px;
                padding: 8px 14px;
            }

            .hero-content h1 {
                font-size: 34px;
                line-height: 1.15;
            }

            .hero-content h2 {
                font-size: 25px;
            }

            .hero-content p {
                font-size: 12px;
                max-width: 100%;
            }

            .register-card {
                width: 100%;
                max-width: 500px;
                margin: auto;
            }
        }


        /* =========================
   TABLET PORTRAIT
   501px - 768px
========================= */
        @media (min-width: 501px) and (max-width: 768px) {

            body {
                overflow-x: hidden;
                overflow-y: auto;
            }

            .register-page {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            /* Bagian kiri tetap menggunakan desain yang sama,
       hanya dibuat menjadi bagian atas */
            .left-section {
                width: 100%;
                min-height: 390px;
                height: auto;
            }

            .left-content {
                height: auto;
                min-height: 390px;
                padding: 35px 40px 40px;
            }

            .brand {
                gap: 10px;
            }

            .brand-text h2 {
                font-size: 26px;
            }

            .brand-text span {
                font-size: 13px;
            }

            .hero-content {
                margin-top: 45px;
                max-width: 600px;
            }

            .system-badge {
                font-size: 12px;
                padding: 8px 15px;
            }

            .hero-content h1 {
                font-size: 38px;
                line-height: 1.15;
                margin-top: 22px;
            }

            .hero-content h2 {
                font-size: 27px;
            }

            .hero-content p {
                font-size: 12px;
                max-width: 520px;
            }

            .copyright {
                display: none;
            }

            .right-section {
                width: 100%;
                min-height: auto;
                padding: 30px 24px 45px;
                overflow: visible;
                display: block;
            }

            .register-card {
                width: 100%;
                max-width: 560px;
                margin: 0 auto;
            }

            .register-title {
                font-size: 28px;
            }

            .register-subtitle {
                font-size: 12px;
                line-height: 1.6;
            }

            .form-group {
                width: 100%;
            }

            .form-control,
            .role-select {
                width: 100%;
            }
        }


        /* =========================
   HP
   max 500px
========================= */
        @media (max-width: 500px) {

            html,
            body {
                width: 100%;
                min-width: 0;
                overflow-x: hidden;
            }

            body {
                overflow-y: auto;
            }

            .register-page {
                width: 100%;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            /* =====================
       BAGIAN KIRI
    ===================== */

            .left-section {
                width: 100%;
                min-height: 335px;
                height: auto;
            }

            .left-content {
                width: 100%;
                height: auto;
                min-height: 335px;
                padding: 28px 24px 35px;
            }

            .brand {
                gap: 9px;
                align-items: center;
            }

            .brand-logo img {
                width: 45px !important;
                height: 45px !important;
            }

            .brand-text h2 {
                font-size: 23px;
            }

            .brand-text span {
                font-size: 11px;
                margin-top: 3px;
            }

            .hero-content {
                margin-top: 40px;
                max-width: 100%;
            }

            .system-badge {
                max-width: 100%;
                width: fit-content;
                font-size: 10px;
                padding: 7px 12px;
            }

            .system-badge::before {
                width: 9px;
                height: 9px;
                margin-right: 7px;
            }

            .hero-content h1 {
                margin-top: 20px;
                font-size: 29px;
                line-height: 1.15;
            }

            .hero-content h2 {
                margin-top: 8px;
                margin-bottom: 9px;
                font-size: 23px;
                line-height: 1.25;
            }

            .hero-content p {
                max-width: 100%;
                font-size: 10px;
                line-height: 1.65;
            }

            .copyright {
                display: none;
            }


            /* =====================
       BAGIAN KANAN
    ===================== */

            .right-section {
                width: 100%;
                min-height: auto;
                padding: 25px 16px 40px;
                display: block;
                overflow: visible;
            }

            .register-card {
                width: 100%;
                max-width: none;
                margin: 0 auto;
                padding: 28px 20px 30px;
                border-radius: 18px;
            }

            .register-title {
                font-size: 24px;
                line-height: 1.3;
            }

            .register-subtitle {
                font-size: 10px;
                line-height: 1.6;
                margin-bottom: 22px;
            }

            /* =====================
       FORM
    ===================== */

            .form-group {
                width: 100%;
                margin-bottom: 17px;
            }

            .form-label {
                font-size: 11px;
                margin-bottom: 7px;
            }

            .form-control,
            .role-select {
                width: 100%;
                height: 48px;
                font-size: 12px;
                padding-left: 14px;
                padding-right: 42px;
            }

            .form-control::placeholder {
                font-size: 11px;
            }

            /* Dropdown role */
            .role-select {
                cursor: pointer;
            }

            /* Password wrapper tetap terpisah */
            .input-wrapper,
            .input-wrapperr {
                position: relative;
                width: 100%;
            }

            .input-wrapper .form-control,
            .input-wrapperr .form-control {
                width: 100%;
                padding-right: 45px;
            }

            .password-toggle {
                position: absolute;
                right: 13px;
                top: 50%;
                transform: translateY(-50%);
                z-index: 5;
                width: 28px;
                height: 28px;
                display: flex;
                align-items: center;
                justify-content: center;
            }


            /* =====================
       BUTTON
    ===================== */

            button,
            .btn-register,
            .register-button {
                width: 100%;
            }
        }


        /* =========================
   HP SANGAT KECIL
   max 360px
========================= */
        @media (max-width: 360px) {

            .left-section {
                min-height: 315px;
            }

            .left-content {
                min-height: 315px;
                padding: 24px 18px 30px;
            }

            .brand-text h2 {
                font-size: 21px;
            }

            .brand-text span {
                font-size: 10px;
            }

            .hero-content {
                margin-top: 32px;
            }

            .hero-content h1 {
                font-size: 26px;
            }

            .hero-content h2 {
                font-size: 21px;
            }

            .hero-content p {
                font-size: 9px;
            }

            .right-section {
                padding: 20px 12px 35px;
            }

            .register-card {
                padding: 24px 17px 28px;
                border-radius: 16px;
            }

            .register-title {
                font-size: 22px;
            }

            .register-subtitle {
                font-size: 9px;
            }

            .form-label {
                font-size: 10px;
            }

            .form-control,
            .role-select {
                height: 46px;
                font-size: 11px;
            }
        }

        .copyright p {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="register-page">

        {{-- =========================
             BAGIAN KIRI
        ========================== --}}
        <section class="left-section">
            <div class="left-overlay"></div>
            <div class="left-content">

                {{-- LOGO --}}
                <div class="brand">

                    <div class="brand-logo">
                        <img src="{{ asset('assets/images/logopln.png') }}" alt="PLN"
                            style="width: 57px; height: 57px;">
                    </div>

                    <div class="brand-text">
                        <h2>PLN</h2>
                        <span>Nusantara Power Services</span>
                    </div>

                </div>

                <div class="hero-content">

                    <div class="system-badge">
                        Ex Barang Management System
                    </div>

                    <h1>
                        Kelola Aset Ex Barang
                        <span>PLN</span>
                        dengan Mudah
                    </h1>

                    <h2>
                        Buat Akun Baru
                    </h2>

                    <p>
                        Daftarkan akun Anda untuk menggunakan Ex Barang System
                        dan melakukan pengelolaan laporan pengembalian barang.
                    </p>

                </div>

                <div class="copyright">
                    © 2026 PT PLN Nusantara Power Services
                </div>



        </section>

        {{-- =========================
             BAGIAN KANAN
        ========================== --}}
        <section class="right-section">

            <div class="register-card">

                <h1 class="register-title">
                    Buat Akun Baru
                </h1>

                <p class="register-subtitle">
                    Daftarkan akun Anda untuk menggunakan Ex Barang System
                </p>

                {{-- FORM --}}
                <form action="{{ route('dashboardEmployee.post') }}" method="POST">
                    @csrf

                    {{-- NAMA LENGKAP --}}
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    {{-- ID PEGAWAI --}}
                    <div class="form-group">
                        <label class="form-label">ID Pegawai</label>
                        <input type="text" id="id_pegawai" name="id_pegawai" class="form-control"
                            placeholder="Masukkan ID pegawai" required>
                    </div>

                    {{-- ROLE --}}
                    <div class="form-group">
                        <label class="form-label">Role</label>

                        <div class="input-wrapper">
                            <select name="role" id="role" class="form-control role-select" required>
                                <option value="" selected disabled>
                                    Pilih role
                                </option>

                                <option value="teknisi">
                                    Teknisi / Worker
                                </option>

                                <option value="admin_gudang">
                                    Admin Gudang
                                </option>
                            </select>
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Masukkan email" required>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="form-group">
                        <label class="form-label">Password</label>

                        <div class="input-wrapper">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Masukkan password" required>

                            <button type="button" class="password-toggle" id="togglePassword"
                                aria-label="Tampilkan password">
                                <img id="eyeIcon" src="{{ asset('assets/images/hide.png') }}" alt="">
                            </button>
                        </div>
                    </div>

                    {{-- KONFIRMASI PASSWORD --}}
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Password</label>

                        <div class="input-wrapper">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Masukkan ulang password" required>

                            <button type="button" class="password-toggle" id="togglePasswordConfirmation"
                                aria-label="Tampilkan konfirmasi password">
                                <img id="eyeIconConfirmation" src="{{ asset('assets/images/hide.png') }}"
                                    alt="">
                            </button>
                        </div>
                    </div>
                    {{-- TOMBOL DAFTAR --}}
                    <button type="submit" class="btn-register">
                        Daftar
                    </button>

                    <div class="register-text">
                        Sudah Punya Akun?
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>


            </div>

        </section>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // =========================
            // PASSWORD
            // =========================
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput && togglePassword && eyeIcon) {

                togglePassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';

                        eyeIcon.src = "{{ asset('assets/images/view.png') }}";
                        togglePassword.setAttribute(
                            'aria-label',
                            'Sembunyikan password'
                        );

                    } else {
                        passwordInput.type = 'password';

                        eyeIcon.src = "{{ asset('assets/images/hide.png') }}";
                        togglePassword.setAttribute(
                            'aria-label',
                            'Tampilkan password'
                        );
                    }
                });
            }


            // =========================
            // KONFIRMASI PASSWORD
            // =========================
            const confirmationInput =
                document.getElementById('password_confirmation');

            const toggleConfirmation =
                document.getElementById('togglePasswordConfirmation');

            const eyeIconConfirmation =
                document.getElementById('eyeIconConfirmation');


            if (
                confirmationInput &&
                toggleConfirmation &&
                eyeIconConfirmation
            ) {

                toggleConfirmation.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (confirmationInput.type === 'password') {
                        confirmationInput.type = 'text';

                        eyeIconConfirmation.src =
                            "{{ asset('assets/images/view.png') }}";

                        toggleConfirmation.setAttribute(
                            'aria-label',
                            'Sembunyikan konfirmasi password'
                        );

                    } else {
                        confirmationInput.type = 'password';

                        eyeIconConfirmation.src =
                            "{{ asset('assets/images/hide.png') }}";

                        toggleConfirmation.setAttribute(
                            'aria-label',
                            'Tampilkan konfirmasi password'
                        );
                    }
                });
            }

        });
    </script>

</body>

</html>
