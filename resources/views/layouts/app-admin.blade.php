<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin Gudang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/logoExBarang.png') }}" type="image/x-icon">

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

        .dashboard-wrapper {
            min-height: 100vh;
        }

        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            width: 245px;
            height: 100vh;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
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

            /* Supaya bagian dalam sidebar yang panjang tidak
       membuat profile ikut bergerak */
            overflow: hidden;
        }

        /* BRAND */

        .sidebar-brand {
            padding: 20px 18px 10px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo img {
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

            letter-spacing: 0.2px;
        }

        .brand-text span {
            margin-top: 4px;

            font-size: 9px;

            font-weight: 400;

            color: rgba(255, 255, 255, 0.82);

            white-space: nowrap;
        }

        /* Menu */

        .sidebar-menu {
            margin-top: 20px;
            padding: 0 10px;

            /* AREA MENU BISA SCROLL */
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            overflow-x: hidden;

            /* Scroll tetap ada, tetapi tidak mengubah desain */
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.18) transparent;
        }

        /* Scrollbar sidebar */
        .sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.18);
            border-radius: 10px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.28);
        }

        .menu-title {
            font-size: 10px;
            font-weight: 600;
            color: #b4bac4;
            /* color: #7c8ba2; */
            text-transform: uppercase;
            margin: 18px 12px 8px;
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
            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            font-size: 16px;
        }

        .menu-icon img {
            width: 20px !important;

            height: 20px !important;

            object-fit: contain;
        }

        .menu-icon-icon {
            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            font-size: 20px;
        }

        .menu-divider {
            height: 1px;

            background: rgba(255, 255, 255, 0.12);

            margin: 16px 10px;
        }


        /* User SIdebar / Sidebar Profile */

        .sidebar-user {
            margin-top: 0;
            padding: 16px 18px;
            border-top:
                1px solid rgba(255, 255, 255, 0.12);

            /* PROFILE TETAP DI BAWAH */
            flex-shrink: 0;
            background: inherit;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .user-avatar {
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

        .user-info strong {
            display: block;
            font-size: 12px;
            font-weight: 600;
        }

        .user-info span {
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
           TOP BAR
        ========================================= */
        .topbar {
            height: 70px;

            position: sticky;
            top: 0;

            z-index: 50;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 38px;

            background: #ffffff;

            border-bottom:
                1px solid #e8edf3;

            box-shadow:
                0 2px 8px rgba(30, 60, 90, 0.025);
        }

        /* Hamburger */
        .mobile-header {
            display: none;
            align-items: center;
            flex-shrink: 0;
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

        /* PAGE TITLE (TOPBAR) */

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

        /* PROFILE WRAPPER */
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


        /* DROPDOWN / DROPDOWN USER */
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
            /* padding: 20px 32px 40px; */
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

        @media (max-width: 1024px) {

            /* SIDEBAR */

            .sidebar {
                width: 250px;
                transform: translateX(-100%);
                transition: transform .25s ease;
                z-index: 100;
            }

            .sidebar.open {
                transform: translateX(0);
            }


            /* OVERLAY */

            .sidebar-overlay {
                display: block;
                position: fixed;
                inset: 0;
                z-index: 90;

                background: rgba(8, 25, 45, .42);

                opacity: 0;
                visibility: hidden;

                transition:
                    opacity .25s ease,
                    visibility .25s ease;
            }

            .sidebar-overlay.show {
                opacity: 1;
                visibility: visible;
            }


            /* MAIN */

            .main {
                margin-left: 0;
                width: 100%;
                min-width: 0;
            }


            /* TOPBAR */

            .topbar {
                width: 100%;
                height: 64px;

                padding: 0 20px;

                display: flex;
                align-items: center;

                gap: 8px;

                box-sizing: border-box;
            }


            /* HAMBURGER */

            .mobile-header {
                display: flex;
                align-items: center;
                flex-shrink: 0;
            }

            .hamburger {
                width: 40px;
                height: 40px;

                padding: 0;

                border: none;
                border-radius: 9px;

                background: transparent;

                color: #164e82;

                font-size: 22px;

                display: flex;
                align-items: center;
                justify-content: center;

                cursor: pointer;

                flex-shrink: 0;
            }

            .hamburger:hover {
                background: #f1f5f9;
            }


            /* PAGE HEADING */

            .page-heading {
                flex: 1;
                min-width: 0;

                overflow: hidden;
            }

            .page-heading h2 {
                font-size: 16px;
                line-height: 1.2;

                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .page-heading p {
                font-size: 9px;

                margin-top: 3px;

                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }


            /* TOPBAR RIGHT */

            .topbar-right {
                flex-shrink: 0;
                gap: 5px;
            }


            /* CONTENT */

            .content {
                width: 100%;
                max-width: 100%;

                margin: 0;

                padding: 22px 20px 32px;

                overflow-x: hidden;

                box-sizing: border-box;
            }

            .content>* {
                max-width: 100%;
                min-width: 0;

                box-sizing: border-box;
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

            .hamburger {
                width: 36px;
                height: 36px;

                font-size: 21px;
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

        /* .hamburger {
            display: none;
            border: 0;
            background: transparent;
            color: white;
            font-size: 22px;
            cursor: pointer;
        } */

        @media (max-width: 360px) {

            .user-top-info,
            .arrow {
                display: none;
            }


            /* .hamburger {
                width: 34px;
                height: 34px;

                font-size: 20px;
            } */
        }
    </style>
</head>

<body>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()">
    </div>

    <div class="dashboard-wrapper">

        {{-- =========================================
         SIDEBAR
    ========================================== --}}

        <aside class="sidebar" id="sidebar">

            <div class="sidebar-brand">

                <div class="brand-logo">
                    <img src="{{ asset('assets/images/logopln.png') }}" alt="PLN Logo">

                    <div class="brand-text">
                        <strong>
                            PLN
                        </strong>
                        <span>Nusantara Power Services</span>
                    </div>
                </div>



            </div>


            <nav class="sidebar-menu">

                <div class="menu-divider"></div>

                {{-- MENU UTAMA --}}

                <div class="menu-title">
                    Menu Utama
                </div>


                {{-- DASHBOARD --}}

                <a href="{{ route('dashboardAdmin') }}"
                    class="menu-item {{ request()->routeIs('dashboardAdmin') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-home.png') }}" alt="Home Icon">
                    </span>

                    <span>Dashboard & Analitik</span>

                </a>


                {{-- DATA BARANG --}}

                <a href="{{ route('katalogAdmin') }}"
                    class="menu-item {{ request()->routeIs('katalogAdmin') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-catalog.png') }}" alt="Catalog Icon">
                    </span>

                    <span>Katalog Ex Barang</span>

                </a>


                <a href="{{ route('StockAdmin') }}"
                    class="menu-item {{ request()->routeIs('StockAdmin') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-stock2.png') }}" alt="Stock Icon"
                            style="width: 20px; height: 20px;">
                    </span>

                    <span>Persediaan & Opname</span>

                </a>

                <a href="{{ route('inputAdmin') }}"
                    class="menu-item {{ request()->routeIs('inputAdmin*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-input.png') }}" alt="Icon Input"
                            style="width: 20px; height: 20px;">
                    </span>

                    <span>Input Ex Barang</span>

                </a>

                <div class="menu-divider"></div>

                {{-- TRANSAKSI --}}

                <div class="menu-title">
                    Transaksi Gudang
                </div>


                <a href="{{ route('penerimaanBarang') }}"
                    class="menu-item {{ request()->routeIs('penerimaanBarang') ? 'active' : '' }}">

                    <span class="menu-iconn">
                        <img src="{{ asset('assets/images/icon-penerimaan.png') }}" alt="PO Icon">
                    </span>

                    <span>Penerimaan Barang (PO)</span>

                </a>


                <a href="{{ route('pengeluaranBarang') }}"
                    class="menu-item {{ request()->routeIs('pengeluaranBarang') ? 'active' : '' }}">

                    <span class="menu-iconn">
                        <img src="{{ asset('assets/images/icon-pengeluaran.png') }}" alt="WO Icon">
                    </span>

                    <span>Pengeluaran Barang (WO)</span>

                </a>


                <a href="{{ route('mutasiGudang') }}"
                    class="menu-item {{ request()->routeIs('mutasiGudang') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-mutasi.png') }}" alt="Mutasi Icon">
                    </span>

                    <span>Mutasi Antar Gudang</span>

                </a>


                <a href="{{ route('riwayatTransaksi') }}"
                    class="menu-item {{ request()->routeIs('riwayatTransaksi') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-transactions.png') }}" alt="Riwayat Icon">
                    </span>

                    <span>Riwayat Transaksi</span>

                </a>

                <div class="menu-divider"></div>

                {{-- PENGELOLAAN --}}

                <div class="menu-title">
                    Pengelolaan & Laporan
                </div>


                <a href="{{ route('materialBekas') }}"
                    class="menu-item {{ request()->routeIs('materialBekas') ? 'active' : '' }}">

                    <span class="menu-icon-icon">♻</span>

                    <span>Material Bekas & Limbah</span>

                </a>


                <a href="{{ route('scanBarcode') }}"
                    class="menu-item {{ request()->routeIs('scanBarcode') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/scan-barcode.png') }}" alt="Barcode">
                    </span>

                    <span>Pemindai Barcode</span>

                </a>


                <a href="{{ route('laporanAdmin') }}"
                    class="menu-item {{ request()->routeIs('laporanAdmin') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-laporan2.png') }}" alt="Icon Laporan">
                    </span>

                    <span>Laporan & BAST</span>

                </a>
            </nav>




            {{-- USER SIDEBAR / SIDEBAR PROFILE --}}

            <div class="sidebar-user">

                <div class="user-profile">

                    <div class="user-avatar">
                        AG
                    </div>

                    <div class="user-info">

                        <strong>Admin Gudang</strong>

                        <span>Admin Gudang • PLN NPS</span>

                    </div>

                </div>
            </div>

        </aside>




        {{-- =========================================
         MAIN
    ========================================== --}}

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
                                <span>@yield('Profile', 'Worker')</span>
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
                            <a href="{{ route('profileAdmin') }}"
                                class="dropdown-item {{ request()->routeIs('profileAdmin') ? 'active' : '' }}">

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


            {{-- =========================================
             CONTENT
        ========================================== --}}

            <div class="content">

                @yield('content')

            </div>

        </main>

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

    @stack('scripts')


</body>

</html>
