<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi OTP - Ex Barang System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            min-height: 100vh;
        }

        .forgot-page {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* =========================================
           LEFT SECTION
        ========================================= */

        .forgot-left {
            width: 64%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(90deg,
                    rgba(0, 83, 170, 0.97) 0%,
                    rgba(0, 123, 214, 0.90) 55%,
                    rgba(20, 154, 225, 0.70) 100%),
                url("{{ asset('assets/images/pln-hero1.png') }}");

            background-size: cover;
            background-position: center;
            color: white;
            padding: 72px 82px 40px;
        }

        .forgot-left::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            right: -80px;
            top: 70px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .forgot-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            position: relative;
            z-index: 2;
        }

        .forgot-brand img {
            width: 57px;
            height: 57px;
            object-fit: contain;
        }

        .forgot-brand-text {
            display: flex;
            flex-direction: column;
        }

        .forgot-brand-text .pln {
            font-size: 29px;
            font-weight: 800;
            line-height: 1;
        }

        .forgot-brand-text .nps {
            font-size: 18px;
            font-weight: 600;
            margin-top: 6px;
        }

        .forgot-system {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            margin-top: 50px;
            padding: 10px 19px;

            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            background: rgba(255, 255, 255, 0.10);

            font-size: 13px;
            font-weight: 600;

            position: relative;
            z-index: 2;
        }

        .forgot-system-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #19d9e8;
            box-shadow: 0 0 10px rgba(25, 217, 232, 0.6);
        }

        .forgot-title {
            margin-top: 35px;
            position: relative;
            z-index: 2;
        }

        .forgot-title h1 {
            font-size: 39px;
            line-height: 1.18;
            font-weight: 800;
            max-width: 590px;
        }

        .forgot-title h1 span {
            color: #19d9e8;
        }

        .forgot-description {
            margin-top: 42px;
            position: relative;
            z-index: 2;
        }

        .forgot-description h2 {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 13px;
        }

        .forgot-description p {
            font-size: 13px;
            line-height: 1.8;
            max-width: 560px;
            color: rgba(255, 255, 255, 0.95);
        }

        .forgot-copyright {
            position: absolute;
            left: 82px;
            bottom: 43px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.92);
            z-index: 2;
        }

        /* =========================================
           RIGHT SECTION
        ========================================= */

        .forgot-right {
            width: 36%;
            min-height: 100vh;
            background: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;
            position: relative;
        }

        .forgot-right::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #e8f6ff;
            top: 0;
            right: 25px;
        }

        .forgot-form-wrapper {
            width: 100%;
            max-width: 368px;
            position: relative;
            z-index: 2;
        }

        .forgot-form-wrapper h2 {
            color: #073b78;
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .forgot-form-wrapper .form-description {
            color: #8295b1;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 32px;
        }

        /* OTP */

        .otp-label {
            display: block;
            color: #102f56;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .otp-inputs {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            width: 100%;
        }

        .otp-input {
            width: 52px;
            height: 56px;

            border: 1px solid #c9d6e6;
            border-radius: 7px;

            background: #ffffff;

            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 21px;
            font-weight: 600;
            color: #073b78;

            outline: none;
            transition: 0.2s ease;
        }

        .otp-input:focus {
            border-color: #087dcc;
            box-shadow: 0 0 0 3px rgba(8, 125, 204, 0.10);
        }

        .otp-info {
            margin-top: 15px;
            color: #8295b1;
            font-size: 11px;
            line-height: 1.6;
        }

        .otp-email strong {
            color: #087dcc;
            font-weight: 600;
        }

        .verify-button {
            width: 100%;
            height: 51px;

            margin-top: 28px;

            border: none;
            border-radius: 7px;

            background: #087dcc;
            color: white;

            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 600;

            cursor: pointer;
            transition: 0.2s ease;
        }

        .verify-button:hover {
            background: #076db1;
        }

        .resend-wrapper {
            text-align: center;
            margin-top: 19px;
        }

        .resend-wrapper span {
            color: #8295b1;
            font-size: 11px;
        }

        .resend-button {
            border: none;
            background: none;
            padding: 0;
            margin-left: 4px;

            color: #087dcc;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 600;

            cursor: pointer;
        }

        .back-login {
            text-align: center;
            margin-top: 20px;
        }

        .back-login span {
            color: #8295b1;
            font-size: 11px;
        }

        .back-login a {
            color: #087dcc;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 900px) {
            .forgot-left {
                width: 55%;
                padding: 55px 45px 35px;
            }

            .forgot-right {
                width: 45%;
                padding: 30px;
            }

            .forgot-title h1 {
                font-size: 32px;
            }

            .forgot-description h2 {
                font-size: 25px;
            }

            .forgot-copyright {
                left: 45px;
            }
        }

        @media (max-width: 768px) {
            .forgot-page {
                display: block;
            }

            .forgot-left {
                display: none;
            }

            .forgot-right {
                width: 100%;
                min-height: 100vh;
                padding: 30px 24px;
            }

            .forgot-form-wrapper {
                max-width: 380px;
            }
        }

        @media (max-width: 480px) {
            .forgot-right {
                padding: 25px 20px;
            }

            .forgot-form-wrapper h2 {
                font-size: 22px;
            }

            .otp-inputs {
                gap: 7px;
            }

            .otp-input {
                width: 47px;
                height: 53px;
            }
        }
    </style>
</head>

<body>

    <div class="forgot-page">

        <!-- LEFT -->
        <section class="forgot-left">

            <div class="forgot-brand">
                <img src="{{ asset('assets/images/logopln.png') }}" alt="PLN">

                <div class="forgot-brand-text">
                    <div class="pln">PLN</div>
                    <div class="nps">Nusantara Power Services</div>
                </div>
            </div>

            <div class="forgot-system">
                <span class="forgot-system-dot"></span>
                Ex Barang Management System
            </div>

            <div class="forgot-title">
                <h1>
                    Kelola Aset Ex Barang
                    <span>PLN</span><br>
                    dengan Mudah
                </h1>
            </div>

            <div class="forgot-description">
                <h2>Verifikasi Kode OTP</h2>

                <p>
                    Masukkan kode OTP yang telah dikirimkan ke email Anda
                    untuk melanjutkan proses pengaturan ulang password.
                </p>
            </div>

            <div class="forgot-copyright">
                © 2026 PT PLN Nusantara Power Services
            </div>

        </section>


        <!-- RIGHT -->
        <section class="forgot-right">

            <div class="forgot-form-wrapper">

                <h2>Verifikasi Kode OTP</h2>

                <p class="form-description">
                    Masukkan 6 digit kode OTP yang telah dikirimkan
                    ke alamat email Anda.
                </p>

                <form action="{{ route('verifyOtp') }}" method="POST" id="otpForm">
                    @csrf

                    <label class="otp-label">
                        Kode OTP
                    </label>

                    <div class="otp-inputs">

                        <input type="text" name="otp[]" class="otp-input" maxlength="1" inputmode="numeric"
                            autocomplete="one-time-code" required>

                        <input type="text" name="otp[]" class="otp-input" maxlength="1" inputmode="numeric"
                            required>

                        <input type="text" name="otp[]" class="otp-input" maxlength="1" inputmode="numeric"
                            required>

                        <input type="text" name="otp[]" class="otp-input" maxlength="1" inputmode="numeric"
                            required>

                        <input type="text" name="otp[]" class="otp-input" maxlength="1" inputmode="numeric"
                            required>

                        <input type="text" name="otp[]" class="otp-input" maxlength="1" inputmode="numeric"
                            required>

                    </div>

                    <div class="otp-info">
                        Kode OTP telah dikirim ke
                        <span class="otp-email">
                            <strong>{{ request('email') }}</strong>
                        </span>
                    </div>

                    <button type="submit" class="verify-button">
                        Verifikasi Kode OTP
                    </button>
                </form>

                <div class="resend-wrapper">
                    <span>Tidak menerima kode?</span>

                    <form action="{{ route('resendOtp') }}" method="POST" style="display:inline;">
                        @csrf

                        <button type="submit" class="resend-button">
                            Kirim Ulang
                        </button>
                    </form>
                </div>

                <div class="back-login">
                    <span>Ingin kembali?</span>
                    <a href="{{ route('login') }}">Login</a>
                </div>

            </div>

        </section>

    </div>


    <script>
        const otpInputs = document.querySelectorAll('.otp-input');

        otpInputs.forEach((input, index) => {

            input.addEventListener('input', function() {

                this.value = this.value.replace(/[^0-9]/g, '');

                if (this.value && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', function(event) {

                if (
                    event.key === 'Backspace' &&
                    !this.value &&
                    index > 0
                ) {
                    otpInputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', function(event) {

                event.preventDefault();

                const pastedData =
                    event.clipboardData
                    .getData('text')
                    .replace(/\D/g, '')
                    .slice(0, 6);

                pastedData.split('').forEach((digit, i) => {

                    if (otpInputs[i]) {
                        otpInputs[i].value = digit;
                    }
                });

                if (pastedData.length > 0) {
                    const nextIndex =
                        Math.min(
                            pastedData.length,
                            otpInputs.length - 1
                        );

                    otpInputs[nextIndex].focus();
                }
            });
        });
    </script>

</body>

</html>
