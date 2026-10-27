<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Lokasi - Ex Used System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background: #f3f7fc;
            color: #0f172a;
            overflow-x: hidden;
        }

        /* =========================================================
           MAIN
        ========================================================= */

        .location-page {
            width: 100%;
            min-height: 100vh;
            display: flex;
            background: #ffffff;
        }

        /* =========================================================
           LEFT SIDE
        ========================================================= */

        .location-left {
            width: 43%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 42px 48px;

            background:
                radial-gradient(circle at 85% 10%,
                    rgba(255, 255, 255, 0.08) 0,
                    rgba(255, 255, 255, 0.04) 20%,
                    transparent 45%),
                linear-gradient(145deg,
                    #063b91 0%,
                    #0750a9 48%,
                    #087abd 100%);
        }

        /* dekorasi lingkaran */

        .decor-circle {
            position: absolute;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            pointer-events: none;
        }

        .circle-top {
            width: 230px;
            height: 230px;
            top: -110px;
            right: -70px;
        }

        .circle-top::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 50%;
            top: 20px;
            left: 20px;
        }

        .circle-bottom {
            width: 280px;
            height: 280px;
            bottom: -160px;
            left: -120px;
        }

        /* =========================================================
           LOGO
        ========================================================= */

        .brand {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            background: #ffdd00;
            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #102c72;
            font-size: 25px;
            font-weight: 900;

            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.15);
        }

        .brand-text {
            color: #ffffff;
            line-height: 1.1;
        }

        .brand-text strong {
            display: block;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .brand-text span {
            display: block;
            margin-top: 4px;
            font-size: 10px;
            font-weight: 500;
            opacity: 0.88;
        }

        /* =========================================================
           LOCATION VISUAL
        ========================================================= */

        .location-visual {
            position: absolute;
            top: 50%;
            left: 50%;

            transform: translate(-50%, -50%);

            width: 190px;
            height: 190px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .visual-ring {
            position: absolute;
            border: 1px solid rgba(255, 255, 255, 0.28);
            border-radius: 50%;
        }

        .ring-one {
            width: 190px;
            height: 190px;
        }

        .ring-two {
            width: 145px;
            height: 145px;
        }

        .ring-three {
            width: 105px;
            height: 105px;
        }

        .visual-center {
            width: 82px;
            height: 82px;

            border-radius: 50%;
            background: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow:
                0 0 0 8px rgba(255, 255, 255, 0.12),
                0 12px 30px rgba(0, 0, 0, 0.18);

            position: relative;
            z-index: 3;
        }

        .visual-center svg {
            width: 38px;
            height: 38px;
            stroke: #1659d6;
        }

        /* =========================================================
           USER INFORMATION
        ========================================================= */

        .user-info {
            position: relative;
            z-index: 2;
            color: #ffffff;
        }

        .system-label {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            opacity: 0.78;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .user-info h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .user-info p {
            font-size: 13px;
            opacity: 0.82;
        }

        /* =========================================================
           RIGHT SIDE
        ========================================================= */

        .location-right {
            width: 57%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 50px 7%;
            background: #ffffff;
        }

        .verification-wrapper {
            width: 100%;
            max-width: 620px;
        }

        /* =========================================================
           HEADER
        ========================================================= */

        .verification-icon {
            width: 54px;
            height: 54px;

            border-radius: 15px;
            background: #eef5ff;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 20px;
        }

        .verification-icon svg {
            width: 28px;
            height: 28px;
            stroke: #1558db;
        }

        .verification-wrapper h1 {
            font-size: 32px;
            line-height: 1.15;
            color: #071a3d;
            font-weight: 800;
            letter-spacing: -0.7px;
            margin-bottom: 10px;
        }

        .verification-description {
            color: #71809b;
            font-size: 14px;
            line-height: 1.7;
            max-width: 520px;
            margin-bottom: 28px;
        }

        /* =========================================================
           INFORMATION CARD
        ========================================================= */

        .location-information {
            width: 100%;

            display: flex;
            align-items: center;
            gap: 16px;

            padding: 20px;

            background: #f1f6ff;
            border: 1px solid #d5e5ff;
            border-radius: 14px;

            margin-bottom: 18px;
        }

        .information-icon {
            flex-shrink: 0;

            width: 46px;
            height: 46px;

            background: #2058e5;
            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .information-icon svg {
            width: 23px;
            height: 23px;
            stroke: #ffffff;
        }

        .information-text strong {
            display: block;

            color: #10234b;
            font-size: 14px;
            font-weight: 700;

            margin-bottom: 5px;
        }

        .information-text span {
            display: block;

            color: #64748b;
            font-size: 12px;
            line-height: 1.55;
        }

        /* =========================================================
           ERROR
        ========================================================= */

        .location-error {
            display: flex;
            align-items: flex-start;
            gap: 12px;

            padding: 15px 17px;

            border-radius: 12px;

            background: #fff2f2;
            border: 1px solid #ffcaca;

            color: #dc2626;

            font-size: 12px;
            line-height: 1.55;

            margin-bottom: 18px;
        }

        .location-error svg {
            flex-shrink: 0;
            width: 18px;
            height: 18px;
            margin-top: 1px;
        }

        /* =========================================================
           RESULT
        ========================================================= */

        .location-result {
            background: #f1fbf6;
            border: 1px solid #bdebd1;
            border-radius: 12px;

            padding: 16px;

            margin-bottom: 18px;

            color: #087443;
            font-size: 12px;
            line-height: 1.6;
        }

        .location-result strong {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
        }

        /* =========================================================
           BUTTON
        ========================================================= */

        .location-button {
            width: 100%;
            height: 52px;

            border: none;
            border-radius: 11px;

            background:
                linear-gradient(90deg,
                    #0647a5 0%,
                    #2164cf 100%);

            color: #ffffff;

            font-size: 14px;
            font-weight: 700;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            cursor: pointer;

            box-shadow:
                0 8px 18px rgba(19, 82, 190, 0.20);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                opacity 0.2s ease;
        }

        .location-button:hover {
            transform: translateY(-1px);

            box-shadow:
                0 11px 22px rgba(19, 82, 190, 0.28);
        }

        .location-button:active {
            transform: translateY(0);
        }

        .location-button:disabled {
            cursor: not-allowed;
            opacity: 0.7;
            transform: none;
        }

        .location-button svg {
            width: 18px;
            height: 18px;
        }

        /* =========================================================
           LOADING
        ========================================================= */

        .loading-spinner {
            width: 17px;
            height: 17px;

            border: 2px solid rgba(255, 255, 255, 0.35);
            border-top-color: #ffffff;

            border-radius: 50%;

            animation: spin 0.7s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* =========================================================
           BACK LOGIN
        ========================================================= */

        .back-login {
            display: inline-flex;
            align-items: center;

            margin-top: 15px;

            color: #6b7b99;
            text-decoration: none;

            font-size: 12px;
            font-weight: 500;

            transition: color 0.2s ease;
        }

        .back-login:hover {
            color: #1458d2;
        }

        /* =========================================================
           RESPONSIVE TABLET
        ========================================================= */

        @media (max-width: 900px) {

            .location-left {
                width: 40%;
                padding: 32px;
            }

            .location-right {
                width: 60%;
                padding: 40px;
            }

            .verification-wrapper h1 {
                font-size: 28px;
            }

            .location-visual {
                transform: translate(-50%, -50%) scale(0.85);
            }
        }

        /* =========================================================
           RESPONSIVE MOBILE
        ========================================================= */

        @media (max-width: 700px) {

            body {
                background: #f3f7fc;
            }

            .location-page {
                min-height: 100vh;
                flex-direction: column;
            }

            .location-left {
                width: 100%;
                min-height: 300px;
                height: 300px;

                padding: 26px 24px;
            }

            .location-right {
                width: 100%;
                min-height: auto;

                padding: 38px 24px 45px;

                align-items: flex-start;
            }

            .location-visual {
                top: 55%;
                transform: translate(-50%, -50%) scale(0.72);
            }

            .circle-top {
                width: 180px;
                height: 180px;
                right: -70px;
                top: -95px;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
                border-radius: 9px;
                font-size: 22px;
            }

            .brand-text strong {
                font-size: 17px;
            }

            .brand-text span {
                font-size: 9px;
            }

            .user-info {
                margin-top: auto;
            }

            .system-label {
                font-size: 9px;
            }

            .user-info h3 {
                font-size: 16px;
            }

            .user-info p {
                font-size: 12px;
            }

            .verification-wrapper {
                max-width: 100%;
            }

            .verification-icon {
                width: 48px;
                height: 48px;
                border-radius: 13px;
            }

            .verification-wrapper h1 {
                font-size: 27px;
            }

            .verification-description {
                font-size: 13px;
            }

            .location-information {
                padding: 16px;
            }

            .information-icon {
                width: 42px;
                height: 42px;
            }

            .location-button {
                height: 50px;
            }
        }

        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 430px) {

            .location-left {
                min-height: 270px;
                height: 270px;
                padding: 22px 20px;
            }

            .location-right {
                padding: 30px 20px 38px;
            }

            .location-visual {
                transform: translate(-50%, -50%) scale(0.62);
            }

            .verification-wrapper h1 {
                font-size: 24px;
            }

            .verification-description {
                font-size: 12px;
            }

            .location-information {
                gap: 12px;
            }

            .information-text strong {
                font-size: 13px;
            }

            .information-text span {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

    <div class="location-page">

        {{-- =========================================================
         LEFT
    ========================================================== --}}

        <section class="location-left">

            <div class="decor-circle circle-top"></div>
            <div class="decor-circle circle-bottom"></div>

            {{-- LOGO --}}
            <div class="brand">

                <div class="brand-logo">
                    ⚡
                </div>

                <div class="brand-text">
                    <strong>PLN</strong>
                    <span>Nusantara Power Services</span>
                </div>

            </div>

            {{-- LOCATION VISUAL --}}
            <div class="location-visual">

                <div class="visual-ring ring-one"></div>
                <div class="visual-ring ring-two"></div>
                <div class="visual-ring ring-three"></div>

                <div class="visual-center">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <circle cx="12" cy="12" r="8"></circle>
                        <line x1="12" y1="2" x2="12" y2="5"></line>
                        <line x1="12" y1="19" x2="12" y2="22"></line>
                        <line x1="2" y1="12" x2="5" y2="12"></line>
                        <line x1="19" y1="12" x2="22" y2="12"></line>
                    </svg>

                </div>

            </div>

            {{-- USER --}}
            <div class="user-info">

                <div class="system-label">
                    Ex Used Management System
                </div>

                <h3>
                    {{ $user['unit'] ?? 'PLN Unit Surabaya' }}
                </h3>

                <p>
                    {{ $user['name'] ?? 'Budi Santoso' }}
                    -
                    {{ $user['employee_id'] ?? 'EMP001' }}
                </p>

            </div>

        </section>


        {{-- =========================================================
         RIGHT
    ========================================================== --}}

        <section class="location-right">

            <div class="verification-wrapper">

                {{-- ICON --}}
                <div class="verification-icon">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                        <circle cx="12" cy="10" r="2.5"></circle>
                    </svg>

                </div>

                {{-- TITLE --}}
                <h1>
                    Verifikasi Lokasi
                </h1>

                <p class="verification-description">
                    Aktifkan GPS untuk mendeteksi dan memverifikasi lokasi Anda
                    sebelum masuk ke sistem.
                </p>


                {{-- INFORMATION --}}
                <div class="location-information">

                    <div class="information-icon">

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <circle cx="12" cy="12" r="8"></circle>
                            <line x1="12" y1="2" x2="12" y2="5"></line>
                            <line x1="12" y1="19" x2="12" y2="22"></line>
                            <line x1="2" y1="12" x2="5" y2="12"></line>
                            <line x1="19" y1="12" x2="22" y2="12"></line>
                        </svg>

                    </div>

                    <div class="information-text">

                        <strong>
                            Verifikasi Lokasi
                        </strong>

                        <span>
                            Lokasi hanya digunakan untuk verifikasi akses
                            dan pencatatan laporan.
                        </span>

                    </div>

                </div>


                {{-- ERROR --}}
                @if (session('location_error'))
                    <div class="location-error">

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>

                        <span>
                            {{ session('location_error') }}
                        </span>

                    </div>
                @endif


                {{-- VALIDATION ERROR --}}
                @if ($errors->any())
                    <div class="location-error">

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>

                        <span>
                            {{ $errors->first() }}
                        </span>

                    </div>
                @endif


                {{-- RESULT --}}
                <div class="location-result" id="locationResult" style="display:none;">
                    <strong>
                        Lokasi berhasil terdeteksi
                    </strong>

                    <span id="locationResultText"></span>
                </div>


                {{-- FORM --}}
                <form action="{{ route('verifyLocation.process') }}" method="POST" id="locationForm">

                    @csrf

                    <input type="hidden" name="latitude" id="latitude">

                    <input type="hidden" name="longitude" id="longitude">

                    <button type="button" class="location-button" id="detectLocation">

                        <svg id="locationButtonIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <circle cx="12" cy="12" r="8"></circle>
                            <line x1="12" y1="2" x2="12" y2="5"></line>
                            <line x1="12" y1="19" x2="12" y2="22"></line>
                            <line x1="2" y1="12" x2="5" y2="12"></line>
                            <line x1="19" y1="12" x2="22" y2="12"></line>
                        </svg>

                        <span id="buttonText">
                            Deteksi Lokasi Saya
                        </span>

                    </button>

                </form>


                {{-- BACK --}}
                <a href="{{ route('login') }}" class="back-login">
                    Kembali ke Login
                </a>

            </div>

        </section>

    </div>


    <script>
        const detectButton = document.getElementById('detectLocation');
        const buttonText = document.getElementById('buttonText');
        const locationForm = document.getElementById('locationForm');

        const latitudeInput = document.getElementById('latitude');
        const longitudeInput = document.getElementById('longitude');

        const locationResult = document.getElementById('locationResult');
        const locationResultText = document.getElementById('locationResultText');


        detectButton.addEventListener('click', function() {

            if (!navigator.geolocation) {

                alert(
                    'Browser Anda tidak mendukung fitur lokasi.'
                );

                return;
            }


            /* =====================================================
               LOADING
            ====================================================== */

            detectButton.disabled = true;

            buttonText.textContent =
                'Mendeteksi lokasi...';

            const oldIcon =
                document.getElementById('locationButtonIcon');

            if (oldIcon) {
                oldIcon.style.display = 'none';
            }

            const spinner =
                document.createElement('span');

            spinner.className =
                'loading-spinner';

            spinner.id =
                'loadingSpinner';

            detectButton.prepend(spinner);


            /* =====================================================
               GPS
            ====================================================== */

            navigator.geolocation.getCurrentPosition(

                function(position) {

                    const latitude =
                        position.coords.latitude;

                    const longitude =
                        position.coords.longitude;


                    latitudeInput.value =
                        latitude;

                    longitudeInput.value =
                        longitude;


                    /* =================================================
                       TAMPILKAN HASIL
                    ================================================== */

                    locationResult.style.display =
                        'block';

                    locationResultText.innerHTML =
                        'Koordinat terdeteksi: ' +
                        '<strong>' +
                        latitude.toFixed(6) +
                        '</strong>, ' +
                        '<strong>' +
                        longitude.toFixed(6) +
                        '</strong>. ' +
                        'Sedang memverifikasi jarak dari unit Anda...';


                    buttonText.textContent =
                        'Memverifikasi lokasi...';


                    /* =================================================
                       SUBMIT KE LARAVEL
                    ================================================== */

                    setTimeout(function() {

                        locationForm.submit();

                    }, 500);

                },

                function(error) {

                    detectButton.disabled =
                        false;

                    buttonText.textContent =
                        'Deteksi Lokasi Saya';


                    const spinner =
                        document.getElementById(
                            'loadingSpinner'
                        );

                    if (spinner) {
                        spinner.remove();
                    }


                    if (oldIcon) {
                        oldIcon.style.display =
                            'block';
                    }


                    let message =
                        'Tidak dapat mendeteksi lokasi Anda.';


                    switch (error.code) {

                        case error.PERMISSION_DENIED:

                            message =
                                'Akses lokasi ditolak. Izinkan akses lokasi pada pengaturan browser, lalu coba lagi.';

                            break;


                        case error.POSITION_UNAVAILABLE:

                            message =
                                'Lokasi tidak tersedia. Pastikan GPS atau layanan lokasi perangkat Anda aktif.';

                            break;


                        case error.TIMEOUT:

                            message =
                                'Waktu pendeteksian lokasi habis. Silakan coba lagi.';

                            break;

                    }


                    alert(message);

                },

                {
                    enableHighAccuracy: true,
                    timeout: 15000,
                    maximumAge: 0
                }

            );

        });
    </script>

</body>

</html>
