<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/logoExBarang.png') }}" type="image/x-icon">


    <style>
        .location-page {
            min-height: calc(100vh - 140px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 20px;
        }

        .location-card {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 8px 30px rgba(15, 55, 95, 0.08);
            border: 1px solid #e7edf5;
        }

        .location-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .location-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #e8f3ff;
            color: #0874c9;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .location-icon svg {
            width: 34px;
            height: 34px;
        }

        .location-header h2 {
            margin: 0;
            color: #12345b;
            font-size: 23px;
            font-weight: 700;
        }

        .location-header p {
            margin: 8px 0 0;
            color: #8191a7;
            font-size: 13px;
            line-height: 1.6;
        }

        .location-status {
            background: #f6f9fc;
            border: 1px solid #e3eaf2;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 20px;
        }

        .status-title {
            font-size: 13px;
            color: #718096;
            margin-bottom: 7px;
        }

        .status-text {
            font-size: 15px;
            font-weight: 600;
            color: #12345b;
        }

        .unit-result {
            display: none;
            background: #eef8ff;
            border: 1px solid #cce9ff;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 20px;
        }

        .unit-result.show {
            display: block;
        }

        .unit-label {
            color: #718096;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .unit-name {
            color: #075ca8;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .unit-distance {
            color: #64748b;
            font-size: 12px;
        }

        .location-message {
            display: none;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 13px;
            line-height: 1.5;
        }

        .location-message.show {
            display: block;
        }

        .location-message.success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .location-message.error {
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
        }

        .location-message.loading {
            background: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }

        .location-button {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(135deg, #075ca8, #0874c9);
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .location-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(8, 116, 201, .2);
        }

        .location-button:disabled {
            opacity: .65;
            cursor: not-allowed;
            transform: none;
        }

        .location-note {
            text-align: center;
            margin-top: 16px;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.5;
        }

        @media (max-width: 600px) {
            .location-page {
                padding: 20px 12px;
            }

            .location-card {
                padding: 25px 20px;
                border-radius: 15px;
            }

            .location-header h2 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="location-page">

        <div class="location-card">

            <div class="location-header">

                <div class="location-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                </div>

                <h2>Verifikasi Lokasi</h2>

                <p>
                    Pastikan Anda berada di lokasi unit kerja yang terdaftar
                    untuk melanjutkan proses.
                </p>

            </div>


            <div class="location-status">

                <div class="status-title">
                    Status Lokasi
                </div>

                <div class="status-text" id="statusText">
                    Belum melakukan verifikasi lokasi
                </div>

            </div>


            <div class="unit-result" id="unitResult">

                <div class="unit-label">
                    Unit Kerja Terdeteksi
                </div>

                <div class="unit-name" id="unitName">
                    -
                </div>

                <div class="unit-distance" id="unitDistance">
                    -
                </div>

            </div>


            <div class="location-message" id="locationMessage"></div>


            <button type="button" class="location-button" id="locationButton" onclick="verifyLocation()">
                Verifikasi Lokasi
            </button>


            <div class="location-note">
                Sistem akan menggunakan lokasi perangkat Anda untuk
                mencocokkan posisi dengan lokasi unit kerja.
            </div>

        </div>

    </div>


    <script>
        /*
                        |--------------------------------------------------------------------------
                        | DATA LOKASI UNIT
                        |--------------------------------------------------------------------------
                        |
                        | Untuk sementara contoh.
                        | Nanti koordinatnya bisa kita isi berdasarkan data Excel
                        | TEMPLATE KODE WILAYAH PLNNPS.xlsx
                        |
                        */

        const units = [{
                name: "PLN Unit Surabaya",
                latitude: -7.250445,
                longitude: 112.768845
            },

            {
                name: "PLN Unit Gresik",
                latitude: -7.1550,
                longitude: 112.6500
            },

            {
                name: "PLN Unit Sidoarjo",
                latitude: -7.4478,
                longitude: 112.7183
            }

            {
                name: "PLN NPS Surabaya",
                latitude: -7.376893765452586,
                longitude: 112.7381353229256
            }
        ];


        /*
        |--------------------------------------------------------------------------
        | RADIUS MAKSIMAL
        |--------------------------------------------------------------------------
        */

        const MAX_RADIUS = 500;


        /*
        |--------------------------------------------------------------------------
        | ELEMENT
        |--------------------------------------------------------------------------
        */

        const statusText =
            document.getElementById('statusText');

        const locationMessage =
            document.getElementById('locationMessage');

        const locationButton =
            document.getElementById('locationButton');

        const unitResult =
            document.getElementById('unitResult');

        const unitName =
            document.getElementById('unitName');

        const unitDistance =
            document.getElementById('unitDistance');


        /*
        |--------------------------------------------------------------------------
        | VERIFIKASI LOKASI
        |--------------------------------------------------------------------------
        */

        function verifyLocation() {

            if (!navigator.geolocation) {

                showMessage(
                    'Browser Anda tidak mendukung fitur lokasi.',
                    'error'
                );

                return;
            }


            locationButton.disabled = true;

            locationButton.textContent =
                'Mendeteksi Lokasi...';


            statusText.textContent =
                'Sedang mendeteksi posisi Anda...';


            showMessage(
                'Mohon tunggu, sistem sedang mengambil lokasi perangkat Anda.',
                'loading'
            );


            navigator.geolocation.getCurrentPosition(

                function(position) {

                    const userLatitude =
                        position.coords.latitude;

                    const userLongitude =
                        position.coords.longitude;


                    checkNearestUnit(
                        userLatitude,
                        userLongitude
                    );

                },

                function(error) {

                    locationButton.disabled = false;

                    locationButton.textContent =
                        'Verifikasi Lokasi';


                    let message =
                        'Lokasi tidak dapat diperoleh.';


                    if (error.code === 1) {

                        message =
                            'Akses lokasi ditolak. Silakan izinkan akses lokasi pada browser Anda.';

                    } else if (error.code === 2) {

                        message =
                            'Lokasi tidak tersedia. Pastikan GPS/lokasi perangkat aktif.';

                    } else if (error.code === 3) {

                        message =
                            'Waktu pengambilan lokasi habis. Silakan coba lagi.';
                    }


                    statusText.textContent =
                        'Verifikasi lokasi gagal';


                    showMessage(
                        message,
                        'error'
                    );

                },

                {
                    enableHighAccuracy: true,
                    timeout: 15000,
                    maximumAge: 0
                }

            );
        }


        /*
        |--------------------------------------------------------------------------
        | CARI UNIT TERDEKAT
        |--------------------------------------------------------------------------
        */

        function checkNearestUnit(
            userLatitude,
            userLongitude
        ) {

            let nearestUnit = null;
            let nearestDistance = Infinity;


            units.forEach(function(unit) {

                const distance =
                    calculateDistance(
                        userLatitude,
                        userLongitude,
                        unit.latitude,
                        unit.longitude
                    );


                if (distance < nearestDistance) {

                    nearestDistance =
                        distance;

                    nearestUnit =
                        unit;
                }

            });


            locationButton.disabled = false;

            locationButton.textContent =
                'Verifikasi Ulang';


            if (
                nearestUnit &&
                nearestDistance <= MAX_RADIUS
            ) {

                statusText.textContent =
                    '✓ Lokasi berhasil diverifikasi';


                unitName.textContent =
                    nearestUnit.name;


                unitDistance.textContent =
                    'Jarak dari lokasi unit: ' +
                    formatDistance(nearestDistance);


                unitResult.classList.add('show');


                showMessage(
                    'Lokasi Anda sesuai dengan unit kerja yang terdaftar.',
                    'success'
                );


                /*
                 * Kalau nanti sudah masuk ke proses login/session,
                 * bagian ini bisa diarahkan ke halaman berikutnya.
                 *
                 * Contoh:
                 * window.location.href = "{{ route('dashboardEmployee') }}";
                 */

            } else {

                statusText.textContent =
                    '✕ Lokasi tidak sesuai';


                unitResult.classList.remove('show');


                showMessage(
                    'Anda berada di luar radius lokasi unit kerja. Silakan berada di lokasi unit yang terdaftar.',
                    'error'
                );
            }

        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG JARAK
        |--------------------------------------------------------------------------
        */

        function calculateDistance(
            lat1,
            lon1,
            lat2,
            lon2
        ) {

            const R = 6371000;

            const dLat =
                toRadians(lat2 - lat1);

            const dLon =
                toRadians(lon2 - lon1);


            const a =
                Math.sin(dLat / 2) *
                Math.sin(dLat / 2) +

                Math.cos(toRadians(lat1)) *
                Math.cos(toRadians(lat2)) *

                Math.sin(dLon / 2) *
                Math.sin(dLon / 2);


            const c =
                2 *
                Math.atan2(
                    Math.sqrt(a),
                    Math.sqrt(1 - a)
                );


            return R * c;
        }


        function toRadians(value) {

            return value *
                Math.PI /
                180;

        }


        /*
        |--------------------------------------------------------------------------
        | FORMAT JARAK
        |--------------------------------------------------------------------------
        */

        function formatDistance(distance) {

            if (distance < 1000) {

                return Math.round(distance) +
                    ' meter';

            }

            return (
                    distance / 1000
                ).toFixed(2) +
                ' km';
        }


        /*
        |--------------------------------------------------------------------------
        | MESSAGE
        |--------------------------------------------------------------------------
        */

        function showMessage(
            message,
            type
        ) {

            locationMessage.textContent =
                message;

            locationMessage.className =
                'location-message show ' +
                type;

        }
    </script>

    {{-- @endsection --}}
</body>

</html>
