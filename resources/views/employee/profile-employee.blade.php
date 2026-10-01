@extends('layouts.app')

@section('title', 'Profil')

@section('page-title', 'Profil')

@section('page-subtitle', 'PLN Nusantara Power Services')

@section('content')

    <div class="profilee-container">

        {{-- ==========================================
         PROFILE CARD
    =========================================== --}}
        <div class="profilee-card">

            {{-- BAGIAN BANNER BIRU --}}
            <div class="profilee-banner"></div>

            {{-- ISI PROFILE --}}
            <div class="profilee-main">

                {{-- AVATAR --}}
                <div class="profilee-avatar">
                    B
                </div>

                {{-- INFORMASI UTAMA --}}
                <div class="profilee-identity">

                    <h2>Budi Santoso</h2>

                    <p>PLN Unit Surabaya</p>

                    <span class="role-badge">
                        worker
                    </span>

                </div>

            </div>

        </div>


        {{-- ==========================================
         INFORMASI AKUN
    =========================================== --}}
        <div class="profilee-section">

            <div class="section-title">
                Informasi Akun
            </div>

            <div class="account-grid">

                {{-- NAMA --}}
                <div class="account-item">

                    <span class="account-label">
                        Nama
                    </span>

                    <span class="account-value">
                        Budi Santoso
                    </span>

                </div>


                {{-- ID KARYAWAN --}}
                <div class="account-item">

                    <span class="account-label">
                        ID Karyawan
                    </span>

                    <span class="account-value">
                        EMP001
                    </span>

                </div>


                {{-- EMAIL --}}
                <div class="account-item">

                    <span class="account-label">
                        Email
                    </span>

                    <span class="account-value">
                        budi.santoso@pln.co.id
                    </span>

                </div>


                {{-- TELEPON --}}
                <div class="account-item">

                    <span class="account-label">
                        Telepon
                    </span>

                    <span class="account-value">
                        +62 812-3456-7890
                    </span>

                </div>


                {{-- UNIT --}}
                <div class="account-item">

                    <span class="account-label">
                        Unit
                    </span>

                    <span class="account-value">
                        PLN Unit Surabaya
                    </span>

                </div>


                {{-- PERAN --}}
                <div class="account-item">

                    <span class="account-label">
                        Peran
                    </span>

                    <span class="account-value">
                        worker
                    </span>

                </div>

            </div>

        </div>


        {{-- ==========================================
         PENGATURAN
    =========================================== --}}
        <div class="profilee-section settings-card">

            <div class="section-title">
                Pengaturan
            </div>

            <div class="setting-row">

                <div class="setting-info">

                    <h4>Bahasa</h4>

                    <p>
                        Pilih bahasa tampilan
                    </p>

                </div>


                {{-- <div class="language-switch">
                    <button type="button" class="language-btn active" id="languageToggle">
                        <span id="languageText">English</span>
                    </button>
                </div> --}}

                <div class="language-switch">
                    <button type="button" class="language-btn active notranslate" id="languageToggle" translate="no">
                        <span id="languageText" class="notranslate" translate="no">English</span>
                    </button>
                </div>

            </div>

        </div>


        {{-- ==========================================
         KELUAR
    =========================================== --}}
        <div class="logout-section">

            <button type="button" class="logout-button" onclick="window.location.href='{{ route('login') }}'">

                <span class="logout-icon">

                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">

                        <path d="M10 17L15 12L10 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />

                        <path d="M15 12H3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />

                        <path d="M13 4H19C20.1 4 21 4.9 21 6V18C21 19.1 20.1 20 19 20H13" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" />

                    </svg>


                </span>

                <span>
                    Keluar
                </span>

            </button>

        </div>

    </div>


    {{-- ==========================================
     CSS
=========================================== --}}
    <style>
        /* ==========================================
                                                                                                                                                   CONTAINER
                                                                                                                                                =========================================== */

        .profilee-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 25px 36px 50px;
        }


        /* ==========================================
                                                                                                                                                   PROFILE CARD
                                                                                                                                                =========================================== */

        .profilee-card {
            background: #ffffff;
            border: 1px solid #e5eaf0;
            border-radius: 17px;
            overflow: hidden;

            box-shadow:
                0 3px 10px rgba(20, 50, 80, 0.06);

            margin-bottom: 23px;
        }


        /* BANNER */

        .profilee-banner {
            height: 96px;

            background:
                linear-gradient(135deg,
                    #06489a 0%,
                    #1768be 55%,
                    #286fc0 100%);

            position: relative;
            overflow: hidden;
        }


        .profilee-banner::after {
            content: "";

            position: absolute;

            width: 210px;
            height: 210px;

            right: -45px;
            top: -100px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.05);
        }


        /* ==========================================
                                                                                                                                                   PROFILE MAIN
                                                                                                                                                =========================================== */

        .profilee-main {
            position: relative;

            padding:
                42px 24px 21px;

            min-height: 98px;
        }


        /* AVATAR */

        .profilee-avatar {
            position: absolute;

            left: 24px;
            top: -32px;

            width: 64px;
            height: 64px;

            border-radius: 14px;

            background: #ffffff;

            border: 1px solid #e8edf3;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #0758b5;

            font-size: 25px;
            font-weight: 600;

            box-shadow:
                0 4px 10px rgba(20, 50, 80, 0.12);
        }


        /* IDENTITY */

        .profilee-identity h2 {
            margin: 0;

            color: #0f2340;

            font-size: 18px;
            font-weight: 700;
        }


        .profilee-identity p {
            margin: 3px 0 5px;

            color: #667c98;

            font-size: 12px;
        }


        /* ROLE */

        .role-badge {
            display: inline-flex;
            align-items: center;

            padding: 3px 11px;

            background: #e8f2ff;

            color: #1769d0;

            border: 1px solid #c8ddfb;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 500;
        }


        /* ==========================================
                                                                                                                                                   GENERAL SECTION
                                                                                                                                                =========================================== */

        .profilee-section {
            background: #ffffff;

            border: 1px solid #e5eaf0;

            border-radius: 17px;

            padding: 25px 24px;

            margin-bottom: 22px;

            box-shadow:
                0 3px 10px rgba(20, 50, 80, 0.05);
        }


        .section-title {
            color: #102a4c;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 17px;
        }


        /* ==========================================
                                                                                                                                                   ACCOUNT INFORMATION
                                                                                                                                                =========================================== */

        .account-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            column-gap: 80px;
            row-gap: 18px;
        }


        .account-item {
            display: flex;

            flex-direction: column;

            gap: 5px;
        }


        .account-label {
            color: #8798ae;

            font-size: 11px;

            font-weight: 500;
        }


        .account-value {
            color: #102a4c;

            font-size: 13px;

            font-weight: 500;
        }


        /* ==========================================
                                                                                                                                                   SETTINGS
                                                                                                                                                =========================================== */

        .settings-card {
            padding-bottom: 17px;
        }


        .setting-row {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding-bottom: 13px;

            border-bottom: 1px solid #edf1f5;
        }


        .setting-info h4 {
            margin: 0;

            color: #193454;

            font-size: 13px;

            font-weight: 500;
        }


        .setting-info p {
            margin: 2px 0 0;

            color: #9aa9bc;

            font-size: 11px;
        }


        /* ==========================================
                                                                                                                                                   LANGUAGE SWITCH
                                                                                                                                                =========================================== */

        .language-switch {
            display: flex;

            align-items: center;

            gap: 2px;

            padding: 3px;

            background: #f3f5f8;

            border-radius: 10px;
        }


        .language-btn {
            border: none;

            background: transparent;

            padding: 7px 13px;

            border-radius: 8px;

            color: #66758a;

            font-family: 'Poppins', sans-serif;

            font-size: 11px;

            font-weight: 500;

            cursor: pointer;

            transition: all 0.2s ease;
        }


        .language-btn.active {
            background: #ffffff;

            color: #0758b5;

            font-weight: 600;

            box-shadow:
                0 2px 5px rgba(20, 50, 80, 0.08);
        }


        .language-btn:hover {
            color: #0758b5;
        }


        /* ==========================================
                                                                                                                                                   LOGOUT
                                                                                                                                                =========================================== */

        .logout-section {
            width: 100%;
        }


        .logout-button {
            width: 100%;

            height: 46px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            border-radius: 12px;

            border: 1px solid #ffcaca;

            background: #fff5f5;

            color: #f00000;

            font-family: 'Poppins', sans-serif;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: all 0.2s ease;
        }


        .logout-button:hover {
            background: #fff0f0;

            border-color: #ff8888;

            transform: translateY(-1px);

            box-shadow:
                0 4px 10px rgba(220, 50, 50, 0.06);
        }


        .logout-icon {
            font-size: 19px;

            line-height: 1;

            font-weight: 600;
        }


        /* ==========================================
                                                                                                                                                   RESPONSIVE TABLET
                                                                                                                                                =========================================== */

        @media (max-width: 900px) {

            .profilee-container {
                padding: 22px 25px 45px;
            }

            .account-grid {
                column-gap: 40px;
            }

        }


        /* ==========================================
                                                                                                                                                   RESPONSIVE MOBILE
                                                                                                                                                =========================================== */

        @media (max-width: 650px) {

            .profilee-container {
                padding: 18px 16px 35px;
            }


            .profilee-banner {
                height: 85px;
            }


            .profilee-main {
                padding:
                    42px 20px 20px;
            }


            .profilee-avatar {
                left: 20px;
            }


            .profilee-section {
                padding: 21px 20px;
            }


            .account-grid {
                grid-template-columns: 1fr;

                gap: 16px;
            }


            .setting-row {
                align-items: flex-start;

                flex-direction: column;
            }


            .language-switch {
                width: 100%;
            }


            .language-btn {
                flex: 1;
            }

        }


        /* ==========================================
                                                                                                                                                   SMALL MOBILE
                                                                                                                                                =========================================== */

        @media (max-width: 400px) {

            .profilee-container {
                padding-left: 12px;
                padding-right: 12px;
            }


            .profilee-identity h2 {
                font-size: 17px;
            }


            .profilee-identity p {
                font-size: 11px;
            }


            .account-value {
                font-size: 12px;
            }

        }
    </style>

@endsection
