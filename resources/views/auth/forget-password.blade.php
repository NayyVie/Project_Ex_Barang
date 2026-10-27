<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Password - Ex Used System</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- logo Web --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/logoExBarang.png') }}" type="image/x-icon">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f8fc;
            min-height: 100vh;
        }

        .forgot-page {
            min-height: 100vh;
            display: flex;
        }

        /* =================================
           BAGIAN KIRI
        ================================= */

        .forgot-left {
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

            color: #ffffff;

            padding: 72px 82px 42px;

            display: flex;
            flex-direction: column;
        }

        .forgot-left::after {
            content: "";

            position: absolute;

            width: 420px;
            height: 420px;

            right: -160px;
            bottom: -180px;

            background: rgba(255, 255, 255, 0.05);

            border-radius: 50%;
        }

        /* =================================
           LOGO
        ================================= */

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;

            position: relative;
            z-index: 2;
        }

        .brand-logo {
            width: 57px;
            height: 57px;

            object-fit: contain;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-text .pln {
            font-size: 28px;
            line-height: 1;

            font-weight: 700;
        }

        .brand-text .nps {
            margin-top: 7px;

            font-size: 18px;
            line-height: 1;

            font-weight: 500;
        }

        /* =================================
           CONTENT KIRI
        ================================= */

        .left-content {
            position: relative;
            z-index: 2;

            margin-top: 50px;

            max-width: 600px;
        }

        .system-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 10px 18px;

            background: rgba(255, 255, 255, 0.10);

            border: 1px solid rgba(255, 255, 255, 0.15);

            border-radius: 30px;

            font-size: 13px;
            font-weight: 600;
        }

        .system-badge::before {
            content: "";

            width: 12px;
            height: 12px;

            border-radius: 50%;

            background: #20d7e8;

            box-shadow:
                0 0 10px rgba(32, 215, 232, 0.6);
        }

        .left-content h1 {
            margin-top: 31px;

            font-size: 40px;
            line-height: 1.18;

            font-weight: 800;

            letter-spacing: -0.7px;
        }

        .left-content h1 span {
            color: #18d7ec;
        }

        .left-content h2 {
            margin-top: 49px;

            font-size: 31px;
            line-height: 1.2;

            font-weight: 700;
        }

        .left-content p {
            margin-top: 14px;

            max-width: 520px;

            font-size: 13px;
            line-height: 1.9;

            color: rgba(255, 255, 255, 0.95);
        }

        /* =================================
           COPYRIGHT
        ================================= */

        .copyright {
            position: relative;
            z-index: 2;

            margin-top: auto;

            font-size: 11px;

            color: rgba(255, 255, 255, 0.78);
        }

        /* =================================
           BAGIAN KANAN
        ================================= */

        .forgot-right {
            width: 38.5%;
            min-height: 100vh;

            background: #ffffff;

            padding: 74px 64px;

            display: flex;
            justify-content: center;
            align-items: center;

            overflow-y: auto;
        }

        .forgot-form-wrapper {
            width: 100%;
            max-width: 368px;
            margin: 0 auto;

            position: relative;
        }

        .forgot-form-wrapper::before {
            content: "";

            position: absolute;

            width: 120px;
            height: 120px;

            top: -74px;
            right: -42px;

            background: rgba(22, 157, 221, 0.10);

            border-radius: 50%;

            pointer-events: none;
        }

        /* =================================
           JUDUL
        ================================= */

        .forgot-title {
            position: relative;
            z-index: 2;
        }

        .forgot-title h2 {
            color: #083d82;

            font-size: 26px;
            line-height: 1.3;

            font-weight: 700;
        }

        .forgot-title p {
            margin-top: 8px;

            color: #8394ad;

            font-size: 12px;
            line-height: 1.7;
        }

        /* =================================
           FORM
        ================================= */

        .forgot-form {
            margin-top: 34px;
        }

        .form-label {
            display: block;

            margin-bottom: 10px;

            color: #152b48;

            font-size: 12px;
            font-weight: 600;
        }

        /* =================================
           INPUT
        ================================= */

        .form-group {
            margin-bottom: 21px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            font-size: 16px;

            pointer-events: none;
        }

        .input-icon img {
            width: 22px;
            height: 22px;

            max-width: 22px;
            max-height: 22px;

            object-fit: contain;
        }

        .form-input {
            width: 100%;
            height: 50px;

            padding: 0 16px 0 45px;

            border: 1px solid #ccd5e0;

            border-radius: 7px;

            background: #f8fafc;

            color: #263b57;

            font-family: 'Poppins', sans-serif;

            font-size: 12px;

            outline: none;

            transition: all 0.2s ease;
        }

        .form-input::placeholder {
            color: #9ba8ba;
        }

        .form-input:focus {
            background: #ffffff;

            border-color: #1373c9;

            box-shadow:
                0 0 0 3px rgba(19, 115, 201, 0.08);
        }

        /* =================================
           TOMBOL
        ================================= */

        .btn-send-otp {
            width: 100%;
            height: 50px;

            margin-top: 5px;

            border: none;

            border-radius: 7px;

            background: #0879cf;

            color: #ffffff;

            font-family: 'Poppins', sans-serif;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .btn-send-otp:hover {
            background: #066ab7;

            transform: translateY(-1px);

            box-shadow:
                0 7px 18px rgba(8, 121, 207, 0.20);
        }

        /* =================================
           KEMBALI LOGIN
        ================================= */

        .back-login {
            margin-top: 19px;

            text-align: center;

            font-size: 11px;

            color: #8998ab;
        }

        .back-login a {
            color: #0874c5;

            font-weight: 600;

            text-decoration: none;
        }

        .back-login a:hover {
            text-decoration: underline;
        }

        /* =================================
           ERROR
        ================================= */

        .error-message {
            margin-top: 6px;

            color: #e53935;

            font-size: 10px;
        }

        /* =================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1100px) {

            .forgot-left {
                width: 55%;
                padding: 60px 55px 35px;
            }

            .forgot-right {
                width: 45%;
                padding: 60px 45px;
            }

            .left-content h1 {
                font-size: 34px;
            }

            .left-content h2 {
                font-size: 27px;
            }
        }

        @media (max-width: 850px) {

            .forgot-page {
                flex-direction: column;
            }

            .forgot-left {
                width: 100%;
                min-height: 430px;

                padding: 45px 35px 35px;
            }

            .forgot-right {
                width: 100%;
                min-height: auto;

                padding: 50px 35px;
            }

            .left-content {
                margin-top: 60px;
            }

            .copyright {
                margin-top: 60px;
            }

            .forgot-form-wrapper {
                max-width: 500px;
            }
        }

        @media (max-width: 550px) {

            .forgot-left {
                min-height: 390px;

                padding: 35px 24px 30px;
            }

            .brand-logo {
                width: 48px;
                height: 48px;
            }

            .brand-text .pln {
                font-size: 23px;
            }

            .brand-text .nps {
                font-size: 14px;
            }

            .left-content {
                margin-top: 55px;
            }

            .system-badge {
                font-size: 11px;

                padding: 8px 14px;
            }

            .left-content h1 {
                margin-top: 23px;

                font-size: 29px;
            }

            .left-content h2 {
                margin-top: 30px;

                font-size: 24px;
            }

            .left-content p {
                font-size: 11px;
                line-height: 1.7;
            }

            .forgot-right {
                padding: 40px 22px;
            }

            .forgot-title h2 {
                font-size: 23px;
            }

        }
    </style>
</head>

<body>

    <div class="forgot-page">

        {{-- =================================
             BAGIAN KIRI
        ================================== --}}

        <section class="forgot-left">

            <div class="brand">

                <img src="{{ asset('assets/images/logopln.png') }}" alt="PLN" class="brand-logo">

                <div class="brand-text">

                    <span class="pln">
                        PLN
                    </span>

                    <span class="nps">
                        Nusantara Power Services
                    </span>

                </div>

            </div>


            <div class="left-content">

                <div class="system-badge">
                    Ex Used Management System
                </div>

                <h1>
                    Kelola Aset Ex Used
                    <span>PLN</span>
                </h1>

                <h2>
                    Lupa Password?
                </h2>

                <p>
                    Jangan khawatir. Kami akan membantu Anda
                    mendapatkan kembali akses ke akun Ex Used System
                    dengan mengirimkan kode OTP.
                </p>

            </div>


            <div class="copyright">
                © 2026 PT PLN Nusantara Power Services
            </div>

        </section>


        {{-- =================================
             BAGIAN KANAN
        ================================== --}}

        <section class="forgot-right">

            <div class="forgot-form-wrapper">

                <div class="forgot-title">

                    <h2>
                        Lupa Password
                    </h2>

                    <p>
                        Masukkan email anda untuk menerima kode OTP
                        guna mengatur ulang password Anda.
                    </p>

                </div>


                <form action="{{ route('verifyOtp') }}" method="GET" class="forgot-form">

                    {{-- INPUT EMAIL --}}
                    <div class="form-group" id="emailField">

                        <label class="form-label" for="email">
                            Alamat Email
                        </label>

                        <div class="input-wrapper">

                            <div class="input-icon">
                                <img src="{{ asset('assets/images/gmail.png') }}">
                            </div>

                            <input type="email" id="email" name="email" class="form-input"
                                placeholder="contoh@gmail.com" required>

                        </div>

                    </div>

                    {{-- TOMBOL KIRIM OTP --}}
                    <button type="submit" class="btn-send-otp">
                        Kirim Kode OTP
                    </button>

                    {{-- KEMBALI LOGIN --}}
                    <div class="back-login">
                        Ingat password Anda?

                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </div>

                </form>

            </div>

        </section>

    </div>


    <script>
        function ubahMetodeOTP(metode) {

            const emailField = document.getElementById('emailField');
            const phoneField = document.getElementById('phoneField');

            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');

            if (metode === 'email') {

                emailField.style.display = 'block';
                phoneField.style.display = 'none';

                emailInput.required = true;
                phoneInput.required = false;

                phoneInput.value = '';

            } else {

                emailField.style.display = 'none';
                phoneField.style.display = 'block';

                emailInput.required = false;
                phoneInput.required = true;

                emailInput.value = '';
            }
        }
    </script>

</body>

</html>
