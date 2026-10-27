<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Ex Used System')</title>

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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            color: #172b4d;
            overflow-x: hidden;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        /* =========================================
           LAYOUT
        ========================================= */

        .dashboard {
            min-height: 100vh;
        }

        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            width: 245px;
            min-height: 100vh;

            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;

            display: flex;
            flex-direction: column;

            background: linear-gradient(180deg,
                    #063f82 0%,
                    #0756a8 48%,
                    #0874c9 100%);

            color: white;
            z-index: 100;

            box-shadow:
                4px 0 18px rgba(0, 63, 130, 0.15);
        }

        /* BRAND */

        .sidebar-logo {
            padding: 20px 18px 10px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand img {
            width: 42px;
            height: 42px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            color: #ffffff;
            line-height: 1.15;
        }

        .brand-text strong {
            font-size: 17px;
            font-weight: 700;
        }

        .brand-text span {
            margin-top: 4px;
            font-size: 9px;
            color: rgba(255, 255, 255, 0.82);
            white-space: nowrap;
        }

        .system-name {
            margin-top: 12px;
            font-size: 10px;
            color: rgba(255, 255, 255, 0.68);
        }

        /* MENU */

        .sidebar-menu {
            margin-top: 20px;
            padding: 0 10px;
        }

        .menu-item {
            min-height: 46px;

            display: flex;
            align-items: center;
            gap: 13px;

            padding: 0 15px;
            margin-bottom: 5px;

            color: rgba(255, 255, 255, 0.82);
            text-decoration: none;

            font-size: 13px;
            font-weight: 500;

            border-radius: 10px;

            transition: 0.2s ease;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.10);
            color: white;
        }

        .menu-item.active {
            background: rgba(255, 255, 255, 0.18);
            color: white;
            font-weight: 600;

            box-shadow:
                inset 3px 0 0 rgba(255, 255, 255, 0.9);
        }

        .menu-icon {
            width: 20px;
            height: 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }

        /*  */
        .menu-icon img {
            width: 17px !important;
            height: 17px !important;
            object-fit: contain;
        }

        .menu-divider {
            height: 1px;

            background: rgba(255, 255, 255, 0.12);

            margin: 16px 10px;
        }

        /* SIDEBAR PROFILE */

        .sidebar-profile {
            margin-top: auto;
            padding: 16px 18px;

            border-top:
                1px solid rgba(255, 255, 255, 0.12);
        }

        .profile-mini {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .profile-avatarr {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #075eae;

            color: white;
            font-size: 11px;
            font-weight: 600;
        }

        .profile-info strong {
            display: block;
            font-size: 12px;
            font-weight: 600;
        }

        .profile-info span {
            display: block;
            margin-top: 2px;

            font-size: 10px;
            color: rgba(255, 255, 255, 0.68);
        }

        /* =========================================
           MAIN
        ========================================= */

        .main {
            margin-left: 245px;
            width: calc(100% - 245px);

            min-height: 100vh;

            background: #f5f7fa;
        }

        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {
            height: 70px;

            position: sticky;

            top: 0;

            z-index: 50;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:

                0 38px;

            background: #ffffff;

            border-bottom:

                1px solid #e8edf3;

            box-shadow:

                0 2px 8px rgba(30, 60, 90, 0.025);
        }

        /* Hamburger */
        .mobile-header {

            display: none;
        }


        .hamburger {

            width: 40px;

            height: 40px;

            border: none;

            border-radius: 9px;

            background: transparent;

            color: #164e82;

            font-size: 22px;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

        }

        .hamburger:hover {

            background: #f1f5f9;

        }


        /* PAGE TITTLE */
        .page-title h2 {
            font-size: 18px;
            line-height: 1.2;

            color: #172b4d;

            font-weight: 600;
        }

        .page-title p {
            margin-top: 3px;

            font-size: 10px;

            color: #94a3b8;
        }

        /* =========================================
           TOPBAR RIGHT
        ========================================= */

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        /* * NOTIFICATION * */
        .notification {

            position: relative;

            width: 40px;

            height: 40px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: none;

            border-radius: 10px;

            background: transparent;

            cursor: pointer;

            transition: background 0.2s ease;

        }

        .notification:hover {

            background: #f2f6fa;

        }

        .notification img {

            width: 21px !important;

            height: 21px !important;

            object-fit: contain;

            display: block;

        }

        .notification-dot {

            position: absolute;

            width: 7px;

            height: 7px;

            top: 7px;

            right: 7px;

            border-radius: 50%;

            background: #e5394f;

            border: 2px solid #ffffff;

        }

        /* =========================================
   PROFILE HEADER
========================================= */

        .profile-wrapper {
            position: relative;
        }


        /* PROFILE BUTTON */

        .profile-button {
            border: none;
            background: transparent;

            display: flex;
            align-items: center;

            gap: 10px;

            padding: 7px 4px 7px 8px;

            cursor: pointer;

            font-family: inherit;
        }


        /* AVATAR */

        .profile-avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #075eae;
            color: #ffffff;

            font-size: 15px;
            font-weight: 600;
        }


        /* PROFILE INFO */

        .profile-info {
            display: flex;
            flex-direction: column;

            align-items: flex-start;

            line-height: 1.25;
        }

        .profile-info strong {
            font-size: 13px;
            font-weight: 600;

            color: #263b5b;
        }

        .profile-info span {
            margin-top: 3px;

            font-size: 11px;

            color: #8c9aaf;
        }

        .profile-infoo {
            display: flex;
            flex-direction: column;

            align-items: flex-start;

            line-height: 1.25;
        }

        .profile-infoo strong {
            font-size: 13px;
            font-weight: 600;

            color: #f8f8f8;
        }

        .profile-infoo span {
            margin-top: 3px;

            font-size: 11px;

            color: #f8fcff;
        }


        /* ARROW */

        .profile-arrow {
            margin-left: 4px;

            font-size: 12px;

            color: #8997aa;

            transition: transform 0.2s ease;
        }


        /* ketika dropdown aktif */

        .profile-wrapper.open .profile-arrow {
            transform: rotate(180deg);
        }


        /* =========================================
   DROPDOWN
========================================= */

        .profile-dropdown {
            position: absolute;

            top: calc(100% + 8px);
            right: 0;

            width: 208px;

            background: #ffffff;

            border-radius: 16px;

            border: 1px solid #edf0f5;

            box-shadow:
                0 8px 30px rgba(15, 23, 42, 0.13);

            overflow: hidden;

            z-index: 1000;

            opacity: 0;
            visibility: hidden;

            transform: translateY(-5px);

            transition:
                opacity 0.2s ease,
                transform 0.2s ease,
                visibility 0.2s ease;
        }


        /* OPEN */

        .profile-wrapper.open .profile-dropdown {
            opacity: 1;

            visibility: visible;

            transform: translateY(0);
        }


        /* =========================================
   DROPDOWN USER
========================================= */

        .dropdown-user {
            padding: 17px 17px 14px;

            display: flex;
            flex-direction: column;
        }

        .dropdown-user strong {
            font-size: 14px;

            color: #263b5b;

            font-weight: 600;
        }

        .dropdown-user span {
            margin-top: 4px;

            font-size: 11px;

            color: #8b98aa;
        }


        /* =========================================
   DIVIDER
========================================= */

        .dropdown-divider {
            height: 1px;

            background: #edf0f4;
        }


        /* =========================================
   DROPDOWN ITEM
========================================= */

        .dropdown-item {
            width: 100%;

            min-height: 48px;

            padding: 0 17px;

            display: flex;

            align-items: center;

            gap: 11px;

            border: none;

            background: transparent;

            color: #52647c;

            text-decoration: none;

            font-family: inherit;

            font-size: 13px;

            cursor: pointer;

            box-sizing: border-box;

            transition: background 0.2s ease;
        }

        .dropdown-item:hover {
            background: #f7f9fc;
        }


        /* ICON */

        .dropdown-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 10px;
            background: #edf6ff;
            color: #176bc0;
        }

        /* LOGOUT */

        .logout-item {
            color: #ef4444;
        }

        .logout-item .dropdown-icon {
            color: #ef4444;
        }

        .dropdown-iconn {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 10px;
            background: #ee0a0a15;
            color: #ef4444;
        }

        .logout-item:hover {
            background: #fff5f5;
        }

        /*  */
        /* =========================================
           CONTENT
        ========================================= */

        .content {
            width: 100%;
            max-width: 1500px;

            margin: 0 auto;

            padding: 30px 38px 45px;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 1200px) {

            .sidebar {
                width: 225px;
            }

            .main {
                margin-left: 225px;
                width: calc(100% - 225px);
            }

            .content {
                padding: 27px 28px 40px;
            }

            .topbar {
                padding: 0 28px;
            }
        }

        @media (max-width: 768px) {

            .sidebar {
                width: 250px;

                transform: translateX(-100%);

                transition: transform .25s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-overlay {
                display: block;

                position: fixed;
                inset: 0;

                z-index: 90;

                background: rgba(8, 25, 45, .42);

                opacity: 0;
                visibility: hidden;

                transition: .25s ease;
            }

            .sidebar-overlay.show {
                opacity: 1;
                visibility: visible;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .topbar {
                height: 64px;
                padding: 0 18px;
            }

            .mobile-header {

                display: flex;

                align-items: center;

            }

            .hamburger {

                display: flex;

            }

            .content {
                padding: 22px 18px 32px;
            }
        }

        @media (max-width: 520px) {

            .topbar {
                height: 62px;
                padding: 0 14px;
            }

            .page-title h2 {
                font-size: 16px;
            }

            .page-title p {
                font-size: 9px;
            }

            .topbar-right {
                gap: 4px;
            }

            .user-top-info {
                display: block;
            }

            .user-top-info strong {
                font-size: 10px;
            }

            .user-top-info span {
                font-size: 8px;
            }

            .user-top-avatar {
                width: 35px;
                height: 35px;
            }

            .arrow {
                font-size: 11px;
            }

            .profile-dropdown {
                width: 220px;
            }

            .content {
                padding: 17px 13px 28px;
            }
        }

        @media (max-width: 360px) {

            .user-top-info,
            .arrow {
                display: none;
            }
        }

        /* =========================================
           STEP FORM
        ========================================= */

        .form-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .step-card {
            background: #fff;

            border: 1px solid #e7edf3;

            border-radius: 16px;

            padding: 22px 25px;

            box-shadow:
                0 4px 15px rgba(30, 60, 90, 0.045);
        }

        /* PROGRESS */

        .progress-card {
            margin-bottom: 24px;
        }

        .progress {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .progress-step {
            flex: 1;

            position: relative;

            text-align: center;
        }

        .progress-step:not(:last-child)::after {
            /* content: ""; */

            position: absolute;

            top: 18px;
            left: 50%;

            width: 100%;
            height: 2px;

            background: #e2e8f0;

            z-index: 0;
        }

        .step-number {
            width: 36px;
            height: 36px;

            position: relative;
            z-index: 2;

            margin: 0 auto 7px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #f1f5f9;

            color: #94a3b8;

            font-size: 13px;
            font-weight: 600;
        }

        .progress-step.active .step-number {
            background: #0756a8;
            color: #fff;
        }

        .step-label {
            font-size: 10px;
            color: #94a3b8;
        }

        .progress-step.active .step-label {
            color: #0756a8;
            font-weight: 500;
        }

        /* FORM */

        .form-title {
            margin-bottom: 20px;
        }

        .form-title h3 {
            font-size: 15px;
            color: #172b4d;
            font-weight: 600;
        }

        .form-title p {
            margin-top: 4px;

            font-size: 10px;

            color: #94a3b8;
        }

        .form-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 18px 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            margin-bottom: 7px;

            font-size: 10px;

            color: #334e68;

            font-weight: 500;
        }

        .required {
            color: #e5394f;
        }

        .form-control {
            width: 100%;

            height: 45px;

            padding: 0 13px;

            border: 1px solid #dfe6ed;

            border-radius: 10px;

            background: #fff;

            color: #172b4d;

            font-size: 11px;

            outline: none;

            transition: .2s ease;
        }

        .form-control:focus {
            border-color: #176bc0;

            box-shadow:
                0 0 0 3px rgba(23, 107, 192, .08);
        }

        .form-control::placeholder {
            color: #a0aaba;
        }

        .form-control:disabled {
            background: #f8fafc;
            color: #8d99a8;
        }

        select.form-control {
            cursor: pointer;
        }

        /* BUTTON */

        .form-actions {
            display: flex;

            justify-content: flex-end;

            margin-top: 25px;

            padding-top: 20px;

            border-top:
                1px solid #edf1f5;
        }

        .btn-next {
            min-width: 105px;

            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 0 18px;

            border: none;

            border-radius: 10px;

            background: #0756a8;

            color: white;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .btn-next:hover {
            background: #06458f;

            transform: translateY(-1px);

            box-shadow:
                0 5px 14px rgba(7, 86, 168, .2);
        }

        .btn-next span {
            font-size: 17px;
            line-height: 1;
        }

        @media (max-width: 600px) {

            .step-card {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .step-label {
                font-size: 8px;
            }

            .step-number {
                width: 32px;
                height: 32px;
            }

            .progress-step:not(:last-child)::after {
                top: 16px;
            }
        }

        /* ==========================================
   GOOGLE TRANSLATE
   HIDE ALL GOOGLE UI
   ========================================== */

        /* Hilangkan Google Translate top banner */
        iframe.goog-te-banner-frame,
        iframe.goog-te-banner-frame.skiptranslate,
        .goog-te-banner-frame,
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            height: 0 !important;
            width: 0 !important;
            border: 0 !important;
            position: fixed !important;
            top: -9999px !important;
            left: -9999px !important;
            pointer-events: none !important;
        }

        /* Google kadang memasukkan banner ke dalam
   elemen skiptranslate */
        body>.skiptranslate {
            display: none !important;
            visibility: hidden !important;
        }

        /* Jangan biarkan Google menggeser halaman */
        html,
        html.translated-ltr,
        html.translated-rtl {
            margin-top: 0 !important;
        }

        body,
        body.translated-ltr,
        body.translated-rtl {
            top: 0 !important;
            margin-top: 0 !important;
        }

        /* ==========================================
   HIDE GOOGLE TRANSLATE POPUP
   ========================================== */

        #goog-gt-tt,
        .goog-tooltip,
        .goog-tooltip:hover,
        .goog-te-balloon-frame,
        .goog-te-ftab,
        #gtx-trans {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        /* ==========================================
   HIDE GOOGLE TRANSLATE SELECT
   Tetap aktif untuk sistem bahasa,
   tetapi tidak terlihat oleh user
   ========================================== */

        #google_translate_element,
        .goog-te-gadget,
        .goog-te-combo {
            display: none !important;
            visibility: hidden !important;
        }
    </style>

    @stack('styles')
    <!-- GOOGLE TRANSLATE -->
    <div id="google_translate_element" style="display: none;"></div>

    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'id,en',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>

    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>

<body>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()">
    </div>

    <div class="dashboard">

        {{-- ================= SIDEBAR ================= --}}
        <aside class="sidebar" id="sidebar">

            <div class="sidebar-logo">

                <div class="brand">

                    <img src="{{ asset('assets/images/logopln.png') }}" alt="PLN Logo">

                    <div class="brand-text">
                        <strong>PLN</strong>
                        <span>Nusantara Power Services</span>
                    </div>

                </div>

                <div class="system-name">
                    Ex Used System
                </div>

            </div>


            <nav class="sidebar-menu">

                {{-- DASHBOARD --}}
                <a href="{{ route('dashboardEmployee') }}"
                    class="menu-item {{ request()->routeIs('dashboardEmployee') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-home.png') }}" alt="Home">
                    </span>

                    <span>Dashboard</span>

                </a>


                {{-- INPUT EX BARANG --}}
                <a href="{{ route('inputExBarang') }}"
                    class="menu-item {{ request()->routeIs('inputExBarang*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-input.png') }}" alt="Input">
                    </span>

                    <span>Input Ex Used</span>

                </a>


                {{-- RIWAYAT --}}
                <a href="{{ route('riwayatEmployee') }}"
                    class="menu-item {{ request()->routeIs('riwayatEmployee') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-history.png') }}" alt="History">
                    </span>
                    <span id="historyMenuText" class="notranslate" translate="no">Riwayat</span>
                </a>


                {{-- LAPORAN --}}
                <a href="{{ route('laporanEmployee') }}"
                    class="menu-item {{ request()->routeIs('laporanEmployee') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-laporan.png') }}" alt="Report Icon"
                            style="width: 17px; height: 17px;">
                    </span>

                    <span>Laporan</span>

                </a>


                <div class="menu-divider"></div>


                {{-- NOTIFIKASI --}}
                <a href="{{ route('notifikasiEmployee') }}"
                    class="menu-item {{ request()->routeIs('notifikasiEmployee') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-notification.png') }}" alt="Notification">
                    </span>

                    <span>Notifikasi</span>

                </a>


                {{-- PROFIL --}}
                <a href="{{ route('profileEmployee') }}"
                    class="menu-item {{ request()->routeIs('profileEmployee') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-profile.png') }}" alt="Profile">
                    </span>

                    <span>Profil</span>

                </a>

            </nav>


            {{-- SIDEBAR PROFILE --}}
            <div class="sidebar-profile">

                <div class="profile-mini">

                    <div class="profile-avatarr">
                        B
                    </div>

                    <div class="profile-infoo">

                        <strong>Budi Santoso</strong>

                        <span>Worker</span>

                    </div>

                </div>

            </div>

        </aside>


        {{-- ================= MAIN ================= --}}
        <main class="main">

            {{-- TOPBAR --}}
            <header class="topbar">

                <div class="mobile-header">

                    <button class="hamburger" onclick="toggleSidebar()">
                        ☰
                    </button>

                </div>


                {{-- JUDUL OTOMATIS --}}
                <div class="page-title">

                    <h2>
                        @yield('page-title', 'Dashboard')
                    </h2>

                    <p>
                        @yield('page-subtitle', 'PLN Nusantara Power Services')
                    </p>

                </div>


                <div class="topbar-right">

                    {{-- NOTIFICATION --}}
                    <button type="button" class="notification" onclick="showNotification()">

                        <img src="{{ asset('assets/images/icon-notificationT.png') }}" alt="Notification">
                        <span class="notification-dot"></span>

                    </button>


                    {{-- PROFILE --}}
                    <div class="profile-wrapper">

                        <button type="button" class="profile-button" id="profileButton">

                            <div class="profile-avatar">
                                B
                            </div>

                            <div class="profile-info">
                                <strong>Budi Santoso</strong>
                                <span>Worker</span>
                            </div>

                            <span class="profile-arrow" id="profileArrow">
                                ▾
                            </span>

                        </button>


                        {{-- PROFILE DROPDOWN --}}
                        <div class="profile-dropdown" id="profileDropdown">

                            {{-- USER INFO --}}
                            <div class="dropdown-user">

                                <strong>
                                    Budi Santoso
                                </strong>

                                <span>
                                    budi.santoso@pln.co.id
                                </span>

                            </div>


                            {{-- DIVIDER --}}
                            <div class="dropdown-divider"></div>


                            {{-- PROFIL --}}
                            <a href="{{ route('profileEmployee') }}"
                                class="dropdown-item {{ request()->routeIs('profileEmployee') ? 'active' : '' }}">

                                <span class="dropdown-icon">

                                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 15.5C14.2091 15.5 16 13.7091 16 11.5C16 9.29086 14.2091 7.5 12 7.5C9.79086 7.5 8 9.29086 8 11.5C8 13.7091 9.79086 15.5 12 15.5Z"
                                            stroke="currentColor" stroke-width="1.7" />

                                        <path
                                            d="M4.93 19.07C6.74 17.26 9.2 16.25 12 16.25C14.8 16.25 17.26 17.26 19.07 19.07"
                                            stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />

                                        <path
                                            d="M19.5 4.5L20.2 6.1L21.8 6.8L20.2 7.5L19.5 9.1L18.8 7.5L17.2 6.8L18.8 6.1L19.5 4.5Z"
                                            stroke="currentColor" stroke-width="1.4" stroke-linejoin="round" />
                                    </svg>

                                </span>

                                <span>
                                    Profil
                                </span>

                            </a>


                            {{-- KELUAR --}}
                            <form action="#" method="POST">

                                @csrf

                                <button type="button" class="dropdown-item logout-item"
                                    onclick="window.location.href='{{ route('login') }}'">

                                    <span class="dropdown-iconn">

                                        <svg width="19" height="19" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path d="M10 17L15 12L10 7" stroke="currentColor" stroke-width="1.8"
                                                stroke-linecap="round" stroke-linejoin="round" />

                                            <path d="M15 12H3" stroke="currentColor" stroke-width="1.8"
                                                stroke-linecap="round" />

                                            <path d="M13 4H19C20.1 4 21 4.9 21 6V18C21 19.1 20.1 20 19 20H13"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />

                                        </svg>

                                    </span>

                                    <span>
                                        Keluar
                                    </span>

                                </button>

                            </form>

                        </div>

                    </div>
                </div>

            </header>


            {{-- CONTENT --}}
            <div class="content">

                @yield('content')

            </div>

        </main>

    </div>


    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            if (!sidebar || !overlay) return;
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }

        function closeSidebar() {
            if (!sidebar || !overlay) return;
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        }

        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(function(menu) {
            menu.addEventListener('click', function() {
                if (window.innerWidth <= 768) closeSidebar();
            });
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) closeSidebar();
        });


        // PROFILE DROPDOWN
        document.addEventListener('DOMContentLoaded', function() {

            const profileButton =
                document.getElementById('profileButton');

            const profileWrapper =
                document.querySelector('.profile-wrapper');

            if (!profileButton || !profileWrapper) {
                return;
            }


            /* CLICK PROFILE */

            profileButton.addEventListener('click', function(event) {

                event.stopPropagation();

                profileWrapper.classList.toggle('open');

            });


            /* CLICK DI LUAR DROPDOWN */

            document.addEventListener('click', function(event) {

                if (!profileWrapper.contains(event.target)) {

                    profileWrapper.classList.remove('open');

                }

            });


            /* ESC */

            document.addEventListener('keydown', function(event) {

                if (event.key === 'Escape') {

                    profileWrapper.classList.remove('open');

                }

            });

        });

        function showNotification() {

            alert('Belum ada notifikasi baru.');

        }
    </script>

    {{-- ========================================== --}}
    {{-- GOOGLE TRANSLATE --}}
    {{-- ========================================== --}}

    <script>
        function getCurrentLanguage() {
            return localStorage.getItem('siteLanguage') || 'id';
        }

        function updateLanguageButton() {
            const languageText =
                document.getElementById('languageText');

            if (!languageText) {
                return;
            }

            const currentLanguage =
                getCurrentLanguage();

            if (currentLanguage === 'id') {
                languageText.textContent = 'English';
            } else {
                languageText.textContent = 'Indonesia';
            }
        }

        // FUNGSI KHUSUS MENU RIWAYAT
        function updateHistoryMenu() {

            const historyMenu =
                document.getElementById('historyMenuText');

            if (!historyMenu) {
                return;
            }

            const currentLanguage =
                getCurrentLanguage();

            if (currentLanguage === 'id') {

                historyMenu.textContent = 'Riwayat';

            } else {

                historyMenu.textContent = 'History';

            }
        }

        // FUNGSI KHUSUS LOGOUT
        function updateLogoutMenu() {

            const logoutMenu =
                document.getElementById('logoutMenuText');

            if (!logoutMenu) {
                return;
            }

            const currentLanguage =
                getCurrentLanguage();

            if (currentLanguage === 'id') {

                logoutMenu.textContent = 'Keluar';

            } else {

                logoutMenu.textContent = 'Logout';

            }
        }

        /* ==========================================
           HIDE GOOGLE TRANSLATE UI
           ========================================== */

        function removeGoogleTranslateUI() {

            document.querySelectorAll(
                'iframe.goog-te-banner-frame'
            ).forEach(function(element) {
                element.remove();
            });

            document.querySelectorAll(
                '.goog-te-banner-frame'
            ).forEach(function(element) {
                element.remove();
            });

            document.querySelectorAll(
                '#goog-gt-tt'
            ).forEach(function(element) {
                element.remove();
            });

            document.querySelectorAll(
                '.goog-te-balloon-frame'
            ).forEach(function(element) {
                element.remove();
            });

            document.querySelectorAll(
                '.goog-tooltip'
            ).forEach(function(element) {
                element.style.display = 'none';
                element.style.visibility = 'hidden';
                element.style.opacity = '0';
            });

            document.querySelectorAll(
                '#gtx-trans'
            ).forEach(function(element) {
                element.style.display = 'none';
                element.style.visibility = 'hidden';
                element.style.opacity = '0';
            });

            document.documentElement.style.marginTop = '0px';

            document.body.style.top = '0px';

            document.body.style.marginTop = '0px';
        }


        /* ==========================================
           TRANSLATE PAGE
           ========================================== */

        function translatePage(language) {

            const googleSelect =
                document.querySelector('.goog-te-combo');

            if (!googleSelect) {

                setTimeout(function() {
                    translatePage(language);
                }, 300);

                return;
            }

            googleSelect.value = language;

            if (googleSelect.fireEvent) {

                googleSelect.fireEvent('onchange');

            } else {

                const event =
                    new Event('change', {
                        bubbles: true
                    });

                googleSelect.dispatchEvent(event);
            }

            localStorage.setItem(
                'siteLanguage',
                language
            );

            updateLanguageButton();
            updateHistoryMenu();
            updateLogoutMenu();

            /* Google Translate membuat banner
               kembali setelah proses translate */
            setTimeout(removeGoogleTranslateUI, 50);
            setTimeout(removeGoogleTranslateUI, 150);
            setTimeout(removeGoogleTranslateUI, 300);
            setTimeout(removeGoogleTranslateUI, 700);
            setTimeout(removeGoogleTranslateUI, 1200);
            setTimeout(removeGoogleTranslateUI, 2000);
        }


        /* ==========================================
           INITIALIZATION
           ========================================== */

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                updateLanguageButton();
                updateHistoryMenu();
                updateLogoutMenu();
                removeGoogleTranslateUI();

                setTimeout(
                    removeGoogleTranslateUI,
                    100
                );

                setTimeout(
                    removeGoogleTranslateUI,
                    300
                );

                setTimeout(
                    removeGoogleTranslateUI,
                    500
                );

                setTimeout(
                    removeGoogleTranslateUI,
                    1000
                );

                setTimeout(
                    removeGoogleTranslateUI,
                    2000
                );


                /* ==================================
                   LANGUAGE BUTTON
                   ================================== */

                const languageToggle =
                    document.getElementById(
                        'languageToggle'
                    );

                if (!languageToggle) {
                    return;
                }


                languageToggle.addEventListener(
                    'click',
                    function(event) {

                        event.preventDefault();

                        event.stopPropagation();


                        const currentLanguage =
                            getCurrentLanguage();


                        const targetLanguage =
                            currentLanguage === 'id' ?
                            'en' :
                            'id';


                        translatePage(
                            targetLanguage
                        );
                    }
                );
            }
        );


        /* ==========================================
           MUTATION OBSERVER
           ========================================== */

        const googleTranslateObserver =
            new MutationObserver(
                function() {

                    removeGoogleTranslateUI();

                }
            );


        googleTranslateObserver.observe(
            document.documentElement, {
                childList: true,
                subtree: true
            }
        );


        /* ==========================================
           EXTRA PROTECTION
           ========================================== */

        setInterval(
            function() {

                removeGoogleTranslateUI();

            },
            500
        );
    </script>

    @stack('scripts')

</body>

</html>
