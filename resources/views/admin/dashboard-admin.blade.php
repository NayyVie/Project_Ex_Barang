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
            color: #7c8ba2;
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

        /* .menu-item {
            width: 100%;
            min-height: 38px;
            padding: 9px 12px;
            margin-bottom: 3px;
            display: flex;
            align-items: center;
            gap: 11px;
            border-radius: 8px;
            text-decoration: none;
            color: #9eabc0;
            font-size: 12px;
            font-weight: 500;
            transition: .2s ease;
        } */


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

        .menu-iconn {
            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            font-size: 16px;
        }

        .menu-iconn img {
            width: 15px !important;

            height: 15px !important;

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

        /* PAGE HEADING (TOPBAR) */

        .page-heading h2 {
            font-size: 18px;
            line-height: 1.2;

            color: #172b4d;

            font-weight: 600;
        }

        .page-heading p {
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

        /* =========================================
           CONTENT
        ========================================= */

        .content {
            padding: 20px 32px 40px;
        }

        /* Alert */

        .warning-box {
            min-height: 72px;
            border-radius: 12px;
            /* border: 1px solid #e4ad38; */
            background: linear-gradient(90deg, #ffcc004f, #e6c56ba8);
            padding: 14px 17px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 23px;
        }

        .warning-left {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .warning-icon {
            color: #a78114;
            font-size: 35px;
            font-weight: 500;
        }

        .warning-text h3 {
            font-size: 15px;
            color: #a78114;
            margin-bottom: 4px;
        }

        .warning-text p {
            font-size: 9px;
            color: #977759;
        }

        .warning-btn {
            background: #28221b;
            border: 1px solid #705d3100;
            color: #ffda56;
            padding: 5px 20px;
            border-radius: 7px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        /* =========================================
           STAT CARDS
        ========================================= */

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 23px;
        }

        .stat-card {
            background: #ffff;
            border: 1px solid #e7edf3;
            border-radius: 12px;
            padding: 18px 20px;
            min-height: 160px;
            position: relative;
            overflow: hidden;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-label {
            font-size: 13px;
            font-weight: 600;
            color: #000000b5;
            letter-spacing: .3px;
        }

        .stat-icon {
            width: 31px;
            height: 31px;
            border-radius: 7px;
            background: #d7ecff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #176bc0;
            font-size: 25px;
        }

        .stat-value {
            font-size: 26px;
            line-height: 1;
            font-weight: 700;
            color: #172b4de6;
            margin-top: 17px;
        }

        .stat-value small {
            font-size: 10px;
            font-weight: 400;
            color: #7c8ba0;
        }

        .stat-sub {
            margin-top: 9px;
            font-size: 10px;
            color: #72829a;
        }

        .stat-link {
            margin-top: 9px;
            display: inline-block;
            color: #009ff1;
            font-size: 9px;
            text-decoration: none;
        }

        .accuracy {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .progress {
            width: 100%;
            height: 5px;
            background: #7f7f7f57;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 12px;
        }

        .progress-bar {
            height: 100%;
            width: 70%;
            background: #08a9ed;
            border-radius: 8px;
        }

        /* =========================================
           QUICK BUTTON
        ========================================= */

        .quick-buttons {
            /* display: flex;
            gap: 8px; */

            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
            margin-top: 17px;
            width: 100%;
            box-sizing: border-box;
        }




        /* =========================================
           LOWER CONTENT
        ========================================= */

        .lower-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 22px;
        }

        .panel {
            background: #ffffff;
            border: 1px solid #e3eaf2;
            border-radius: 12px;
            padding: 21px;
            min-height: 300px;
            box-shadow: 0 4px 14px rgba(23, 43, 77, 0.04);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .panel-title {
            display: flex;
            gap: 9px;
        }

        .panel-icon {
            color: #00a9eb;
            font-size: 16px;
        }

        .panel-title h3 {
            color: #172b4d;
            font-size: 14px;
        }

        .panel-title p {
            color: #72829a;
            font-size: 10px;
        }

        .legend {
            display: flex;
            gap: 15px;
            font-size: 9px;
            color: #72829a;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .legend-dot {
            width: 9px;
            height: 9px;
            border-radius: 3px;
            background: #08a8ed;
        }

        .legend-dot.orange {
            background: #ff9c00;
        }

        /* Comparison */

        .comparison-item {
            margin-bottom: 17px;
        }

        .comparison-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .material-name {
            /* color: #d7deea; */
            color: #172b4d;
            font-size: 10px;
            font-weight: 600;
            max-width: 72%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .rack {
            color: #75859b;
            font-size: 8px;
        }

        .bar-row {
            height: 12px;
            background: #7f7f7f57;
            border-radius: 8px;
            position: relative;
            margin-bottom: 3px;
        }

        .bar {
            height: 100%;
            border-radius: 8px;
        }

        .bar.blue {
            background: #08a8ed;
        }

        .bar.orange {
            background: #ff9900;
        }


        /* Composition */

        .composition-content {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 210px;
            gap: 30px;
        }

        .donut {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: conic-gradient(#7b54ed 0deg 85deg,
                    #65748a 85deg 185deg,
                    #09a9e8 185deg 255deg,
                    #15bf83 255deg 320deg,
                    #d5a63b 320deg 360deg);
            position: relative;
        }

        .donut::after {
            content: "";
            width: 82px;
            height: 82px;
            position: absolute;
            top: 34px;
            left: 34px;
            border-radius: 50%;
            background: #101a2e;
        }

        .composition-list {
            min-width: 180px;
        }

        .composition-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 9px;
            color: #8291a5;
        }

        .composition-name {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
        }

        .composition-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #7b54ed;
        }

        .composition-dot.gray {
            background: #65748a;
        }

        .composition-dot.blue {
            background: #09a9e8;
        }

        .composition-dot.green {
            background: #15bf83;
        }

        .composition-dot.yellow {
            background: #d5a63b;
        }

        .composition-value {
            color: #72829a;
            font-size: 12px;
        }

        /* =========================================
   RESPONSIVE
   HANYA MENGATUR POSISI / UKURAN RESPONSIVE
   DESAIN ASLI TETAP
========================================= */

        .sidebar-overlay {
            display: none;
        }


        /* =========================================
   TABLET / LAPTOP KECIL
========================================= */

        @media (max-width: 1200px) {

            .content {
                padding: 20px 28px 40px;
            }

            .topbar {
                padding: 0 28px;
            }

            /* TOMBOL TETAP 2 KOLOM */
            .quick-buttons {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

        }


        /* =========================================
   SIDEBAR COLLAPSE
   MULAI MENUTUP SAAT LAYAR MENGECIL
========================================= */

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


            /* WARNING */

            .warning-box {
                width: 100%;
                max-width: 100%;

                box-sizing: border-box;
            }

            .warning-left {
                min-width: 0;
            }

            .warning-text {
                min-width: 0;
            }

            .warning-text h3 {
                overflow-wrap: break-word;
            }


            /* STAT CARD
       2 KOLOM */

            .stat-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 12px;

                width: 100%;
            }

            .stat-card {
                width: 100%;
                min-width: 0;

                box-sizing: border-box;

                overflow: hidden;
            }


            /* QUICK BUTTON
       2 BARIS = 2 KOLOM */

            .quick-buttons {
                display: grid;

                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 10px;

                width: 100%;
                min-width: 0;

                box-sizing: border-box;
            }

            .quick-action {
                width: 100%;
                min-width: 0;

                box-sizing: border-box;

                overflow: hidden;
            }

            .quick-action-content {
                min-width: 0;
                overflow: hidden;
            }

            .quick-action-title,
            .quick-action-subtitle {
                min-width: 0;

                overflow: hidden;
                text-overflow: ellipsis;
            }


            /* PANEL BAWAH
       TIDAK BOLEH TERPOTONG */

            .lower-grid {
                grid-template-columns: 1fr;

                width: 100%;
                max-width: 100%;

                gap: 18px;
            }

            .panel {
                width: 100%;
                min-width: 0;

                box-sizing: border-box;

                overflow: hidden;
            }

        }


        /* =========================================
   MOBILE
========================================= */

        @media (max-width: 768px) {

            .topbar {
                height: 64px;
                padding: 0 18px;
                gap: 7px;
            }


            /* CONTENT */

            .content {
                padding: 18px 16px 30px;
            }


            /* WARNING */

            .warning-box {
                padding: 13px 15px;
                margin-bottom: 18px;

                gap: 10px;
            }

            .warning-left {
                gap: 10px;
                flex: 1;
            }

            .warning-icon {
                font-size: 31px;
                flex-shrink: 0;
            }

            .warning-text h3 {
                font-size: 14px;
                line-height: 1.35;
            }

            .warning-text p {
                font-size: 8px;
                line-height: 1.4;
            }

            .warning-btn {
                flex-shrink: 0;
                padding: 5px 17px;
            }


            /* STAT CARD */

            .stat-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 10px;

                margin-bottom: 18px;
            }

            .stat-card {
                min-width: 0;
                width: 100%;

                padding: 16px 16px;

                overflow: hidden;
            }

            .stat-label {
                min-width: 0;

                overflow: hidden;
                text-overflow: ellipsis;
            }

            .stat-value {
                font-size: 24px;

                white-space: normal;
                overflow-wrap: anywhere;
            }

            .stat-sub {
                line-height: 1.5;
            }

            .stat-link {
                line-height: 1.4;
            }


            /* QUICK BUTTON
       2 BARIS */

            .quick-buttons {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 8px;

                width: 100%;
            }

            .quick-action {
                min-height: 58px;

                width: 100%;
                min-width: 0;

                padding: 9px 9px;

                gap: 7px;

                overflow: hidden;
            }

            .quick-action-icon {
                width: 30px;
                height: 30px;

                flex: 0 0 30px;
            }

            .quick-action-content {
                min-width: 0;
                flex: 1;
            }

            .quick-action-title {
                font-size: 12px;

                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .quick-action-subtitle {
                font-size: 8px;

                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .quick-action-arrow {
                flex: 0 0 18px;

                width: 18px;
                height: 18px;

                font-size: 18px;
            }


            /* PANEL */

            .lower-grid {
                grid-template-columns: 1fr;

                gap: 16px;
            }

            .panel {
                width: 100%;
                min-width: 0;

                padding: 17px;

                overflow: hidden;
            }

            .panel-header {
                gap: 10px;
            }

            .panel-title {
                min-width: 0;
            }

            .panel-title h3 {
                line-height: 1.35;
            }

            .panel-title p {
                line-height: 1.4;
            }

            .legend {
                flex-shrink: 0;
            }

        }


        /* =========================================
   HP KECIL
========================================= */

        @media (max-width: 520px) {

            .topbar {
                height: 62px;

                padding: 0 13px;

                gap: 5px;
            }


            /* HAMBURGER */

            .hamburger {
                width: 36px;
                height: 36px;

                font-size: 21px;
            }


            /* PAGE TITLE */

            .page-heading h2 {
                font-size: 15px;
            }

            .page-heading p {
                font-size: 8px;
            }


            /* PROFILE */

            .topbar-right {
                gap: 2px;
            }

            .profile-button {
                gap: 7px;

                padding: 5px 2px 5px 4px;
            }

            .profile-avatar {
                width: 35px;
                height: 35px;

                font-size: 14px;
            }

            .profile-info strong {
                font-size: 10px;
            }

            .profile-info span {
                font-size: 8px;
            }

            .profile-arrow {
                font-size: 10px;
            }

            .profile-dropdown {
                width: 220px;
                right: 0;
            }


            /* CONTENT */

            .content {
                padding: 15px 12px 27px;
            }


            /* WARNING */

            .warning-box {
                padding: 12px 13px;

                align-items: center;
            }

            .warning-left {
                gap: 8px;
            }

            .warning-icon {
                font-size: 28px;
            }

            .warning-text h3 {
                font-size: 12px;
                line-height: 1.35;
            }

            .warning-text p {
                font-size: 7.5px;
            }

            .warning-btn {
                padding: 5px 13px;
                font-size: 11px;
            }


            /* STAT CARD */

            .stat-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 8px;
            }

            .stat-card {
                padding: 14px 13px;

                min-height: 160px;
            }

            .stat-label {
                font-size: 12px;
                line-height: 1.35;
            }

            .stat-icon {
                width: 29px;
                height: 29px;

                font-size: 22px;
            }

            .stat-value {
                font-size: 22px;
            }

            .stat-sub {
                font-size: 9px;
            }

            .stat-link {
                font-size: 8px;
            }


            /* QUICK BUTTON
       TETAP 2 KOLOM */

            .quick-buttons {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 7px;
            }

            .quick-action {
                min-height: 58px;

                padding: 8px;

                gap: 6px;
            }

            .quick-action-icon {
                width: 28px;
                height: 28px;

                flex: 0 0 28px;
            }

            .quick-action-title {
                font-size: 11px;
            }

            .quick-action-subtitle {
                font-size: 7.5px;
            }

            .quick-action-arrow {
                font-size: 17px;
            }


            /* PANEL */

            .panel {
                padding: 15px;
            }

            .panel-title h3 {
                font-size: 13px;
            }

            .panel-title p {
                font-size: 9px;
            }

            .legend {
                font-size: 8px;
                gap: 8px;
            }

        }


        /* =========================================
   HP SANGAT KECIL
========================================= */

        @media (max-width: 360px) {

            .topbar {
                padding: 0 10px;
                gap: 3px;
            }

            .hamburger {
                width: 34px;
                height: 34px;

                font-size: 20px;
            }

            .page-heading h2 {
                font-size: 14px;
            }

            .page-heading p {
                display: none;
            }

            .profile-info {
                display: none;
            }

            .profile-arrow {
                display: none;
            }


            .content {
                padding: 13px 9px 24px;
            }


            /* STAT */

            .stat-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 7px;
            }

            .stat-card {
                padding: 13px 11px;
            }

            .stat-label {
                font-size: 11px;
            }

            .stat-value {
                font-size: 20px;
            }


            /* QUICK BUTTON
       2 KOLOM / 2 BARIS */

            .quick-buttons {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 7px;
            }

            .quick-action {
                min-height: 58px;

                padding: 7px;

                gap: 5px;
            }

            .quick-action-icon {
                width: 27px;
                height: 27px;

                flex: 0 0 27px;
            }

            .quick-action-title {
                font-size: 10px;

                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .quick-action-subtitle {
                font-size: 7px;
            }

            .quick-action-arrow {
                flex: 0 0 16px;

                width: 16px;
                font-size: 16px;
            }


            /* PANEL */

            .lower-grid {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 13px;
            }

        }

        /*  */

        /* =========================================
   ADMIN DASHBOARD - WHITE CARD STYLE
   ========================================= */

        .stat-card {
            background: #ffffff;
            border: 1px solid #e3eaf2;
            box-shadow: 0 4px 14px rgba(23, 43, 77, 0.04);
        }

        .panel {
            background: #ffffff;
            border: 1px solid #e3eaf2;
            box-shadow: 0 4px 14px rgba(23, 43, 77, 0.04);
        }

        .panel h3 {
            color: #172b4d;
        }

        .panel p {
            color: #8a9ab5;
        }

        .material-name {
            color: #172b4d;
        }

        .comparison-top {
            color: #172b4d;
        }


        /* =========================================================
   QUICK ACTION - ADMIN GUDANG
   ========================================================= */

        .quick-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            width: 100%;
        }


        /* ======== KARTU / TOMBOL UNTUK 4 FITUR UTAMA ========= */

        .quick-action {
            min-height: 58px;
            padding: 9px 10px;

            display: flex;
            align-items: center;
            gap: 9px;

            border-radius: 9px;

            text-decoration: none;
            color: #ffffff;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                filter 0.2s ease;

            box-sizing: border-box;
        }


        /* HOVER */

        .quick-action:hover {
            transform: translateY(-2px);

            box-shadow:
                0 5px 12px rgba(23, 43, 77, 0.20);

            filter: brightness(1.05);
        }


        /* =========================================================
   WARNA TOMBOL
   ========================================================= */

        .quick-action-blue {
            background: linear-gradient(135deg,
                    #0866c6,
                    #087fd4);
        }

        .quick-action-cyan {
            background: linear-gradient(135deg,
                    #087fd4,
                    #08a0d9);
        }

        .quick-action-purple {
            background: linear-gradient(135deg,
                    #3157bd,
                    #4b65d8);
        }

        .quick-action-dark {
            background: linear-gradient(135deg,
                    #173b69,
                    #24517e);
        }


        /* =========================================================
   ICON
   ========================================================= */

        .quick-action-icon {
            width: 30px;
            height: 30px;

            flex: 0 0 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 7px;

            background: rgba(255, 255, 255, 0.17);

            color: #ffffff;

            font-size: 15px;
            font-weight: 600;
        }


        /* =========================================================
   TEXT
   ========================================================= */

        .quick-action-content {
            min-width: 0;

            display: flex;
            flex-direction: column;
            justify-content: center;

            flex: 1;
        }


        .quick-action-title {
            color: #ffffff;

            font-size: 13px;
            font-weight: 550;

            line-height: 1.35;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .quick-action-subtitle {
            margin-top: 2px;

            color: rgba(255, 255, 255, 0.72);

            font-size: 9px;
            font-weight: 400;

            line-height: 1.3;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        /* =========================================================
   PANAH
   ========================================================= */

        .quick-action-arrow {
            width: 20px;
            height: 20px;

            flex: 0 0 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            /* background: rgba(255, 255, 255, 0.14); */

            color: #ffff;

            font-size: 20px;
            font-weight: 400;

            transition: transform 0.2s ease;
        }


        .quick-action:hover .quick-action-arrow {
            transform: translateX(2px);
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
                    class="menu-item active {{ request()->routeIs('dashboardAdmin') ? 'active' : '' }}">

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

                    <span class="menu-icon">▤</span>

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
                    <button type="button" class="hamburger" onclick="toggleSidebar()" aria-label="Buka menu">
                        ☰
                    </button>
                </div>

                <div class="page-heading">

                    <h2>
                        Dashboard Admin
                    </h2>

                    <p>
                        PLN Nusantara Power Services
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


            {{-- =========================================
             CONTENT
        ========================================== --}}

            <section class="content">


                {{-- WARNING --}}

                <div class="warning-box">

                    <div class="warning-left">

                        <div class="warning-icon">
                            ⚠
                        </div>

                        <div class="warning-text">

                            <h3>
                                Perhatian: Ditemukan 3 Item Ex Barang Berselisih
                            </h3>

                            <p>
                                Segera lakukan rekonsiliasi dan verifikasi fisik untuk memastikan
                                data gudang sesuai dengan kondisi barang aktual.
                            </p>

                        </div>

                    </div>


                    <button class="warning-btn">
                        Buka
                    </button>

                </div>


                {{-- =========================================
                 STAT CARDS
            ========================================== --}}

                <div class="stat-grid">


                    {{-- CARD 1 --}}

                    <div class="stat-card">

                        <div class="stat-top">

                            <span class="stat-label">
                                Ketepatan Stok
                            </span>

                            <div class="stat-icon">
                                ⚖
                            </div>

                        </div>


                        <div class="accuracy">

                            <div class="stat-value">
                                70.0%
                            </div>
                        </div>


                        <div class="stat-sub">
                            7 dari 10 item akurat 100%
                        </div>


                        <div class="progress">

                            <div class="progress-bar" style="width:70%;">
                            </div>

                        </div>

                    </div>


                    {{-- CARD 2 --}}

                    <div class="stat-card">

                        <div class="stat-top">

                            <span class="stat-label">
                                Nilai Inventory Gudang
                            </span>

                            <div class="stat-icon" style="color:#00d89a;background:#13d5b13d;">
                                ◇
                            </div>

                        </div>


                        <div class="stat-value" style="font-size:23px;">
                            Rp 893.960.000
                        </div>


                        <div class="stat-sub">
                            10 katalog material aktif terdaftar
                        </div>


                        <a href="#" class="stat-link">
                            Lihat Katalog Ex Barang →
                        </a>

                    </div>


                    {{-- CARD 3 --}}

                    <div class="stat-card">

                        <div class="stat-top">

                            <span class="stat-label">
                                Persediaan Material Bekas
                            </span>

                            <div class="stat-icon" style="color:#00d89a;background:#13d5b13d;">
                                ♻
                            </div>

                        </div>


                        <div class="stat-value">

                            5.420
                            <small>Kg (5,42 Ton)</small>

                        </div>

                        <a href="#" class="stat-link">
                            Kelola Material Bekas →
                        </a>

                    </div>


                    {{-- CARD 4 --}}

                    <div class="stat-card">

                        <div class="stat-top">

                            <span class="stat-label">
                                Transaksi Gudang
                            </span>

                            <div class="stat-icon">
                                ⇄
                            </div>

                        </div>


                        <div class="stat-value">
                            8
                            <small>Transaksi Tercatat</small>
                        </div>


                        <a href="#" class="stat-link">
                            Buka Riwayat Transaksi →
                        </a>

                    </div>

                </div>


                {{-- =========================================
                 QUICK ACTION
            ========================================== --}}

                {{-- <div class="quick-action"> --}}

                {{-- <div class="quick-title">

                        <div class="quick-title-icon">
                            ▤
                        </div>

                        <div>

                            <h3>
                                Aksi Cepat Transaksi & Lapangan
                            </h3>

                            <p>
                                Percepat proses pergudangan menggunakan sistem terintegrasi
                            </p>

                        </div>

                    </div> --}}

                <section class="quick-buttons">

                    {{-- PENERIMAAN BARANG --}}
                    <a href="{{ route('penerimaanBarang') }}" class="quick-action quick-action-blue">
                        <div class="quick-action-icon">
                            <img src="{{ asset('assets/images/icon-penerimaan.png') }}" alt="PO Icon">
                        </div>

                        <div class="quick-action-content">
                            <span class="quick-action-title">
                                Penerimaan Barang
                            </span>

                            <span class="quick-action-subtitle">
                                Input barang masuk
                            </span>
                        </div>

                        <div class="quick-action-arrow">
                            ›
                        </div>
                    </a>


                    {{-- PENGELUARAN BARANG --}}
                    <a href="{{ route('pengeluaranBarang') }}" class="quick-action quick-action-cyan">
                        <div class="quick-action-icon">
                            <img src="{{ asset('assets/images/icon-pengeluaran.png') }}" alt="WO Icon">
                        </div>

                        <div class="quick-action-content">
                            <span class="quick-action-title">
                                Pengeluaran Barang
                            </span>

                            <span class="quick-action-subtitle">
                                Input barang keluar
                            </span>
                        </div>

                        <div class="quick-action-arrow">
                            ›
                        </div>
                    </a>


                    {{-- MUTASI ANTAR GUDANG --}}
                    <a href="{{ route('mutasiGudang') }}" class="quick-action quick-action-purple">
                        <div class="quick-action-icon">
                            <img src="{{ asset('assets/images/icon-mutasi.png') }}" alt="Mutasi Icon">
                        </div>

                        <div class="quick-action-content">
                            <span class="quick-action-title">
                                Mutasi Antar Gudang
                            </span>

                            <span class="quick-action-subtitle">
                                Pindahkan material
                            </span>
                        </div>

                        <div class="quick-action-arrow">
                            ›
                        </div>
                    </a>


                    {{-- SCAN BARCODE --}}
                    <a href="#" class="quick-action quick-action-dark">
                        <div class="quick-action-icon">
                            <img src="{{ asset('assets/images/scan-barcode.png') }}" alt="Barcode">
                        </div>

                        <div class="quick-action-content">
                            <span class="quick-action-title">
                                Scan Barcode
                            </span>

                            <span class="quick-action-subtitle">
                                Scan spare part
                            </span>
                        </div>

                        <div class="quick-action-arrow">
                            ›
                        </div>
                    </a>

                </section>


                {{-- <div class="quick-buttons"> --}}

                {{-- PENERIMAAN BARANG --}}
                {{-- <button class="quick-btn">
                            <span class="quick-btn-icon">↙</span>
                            <span class="quick-btn-text">Penerimaan Barang</span>
                            <span class="quick-btn-arrow">›</span>
                        </button> --}}

                {{-- PENGELUARAN BARANG --}}
                {{-- <button class="quick-btn">
                            <span class="quick-btn-icon">↗</span>
                            <span class="quick-btn-text">Pengeluaran Barang</span>
                            <span class="quick-btn-arrow">›</span>
                        </button> --}}

                {{-- MUTASI ANTAR GUDANG --}}
                {{-- <button class="quick-btn">
                            <span class="quick-btn-icon">⇄</span>
                            <span class="quick-btn-text">Mutasi Antar Gudang</span>
                            <span class="quick-btn-arrow">›</span>
                        </button> --}}

                {{-- SCAN BARCODE --}}
                {{-- <button class="quick-btn dark">
                            <span class="quick-btn-icon">▦</span>
                            <span class="quick-btn-text">Scan Barcode</span>
                            <span class="quick-btn-arrow">›</span>
                        </button>

                    </div> --}}

                {{-- </div> --}}


                {{-- =========================================
                 LOWER GRID
            ========================================== --}}

                <div class="lower-grid">


                    {{-- COMPARISON --}}

                    <div class="panel">

                        <div class="panel-header">

                            <div class="panel-title">

                                <div class="panel-icon">
                                    ▱
                                </div>

                                <div>

                                    <h3>
                                        Komparasi Stok Fisik vs Data Sistem
                                    </h3>

                                    <p>
                                        Perbandingan stok aktual hasil opname dengan
                                        data sistem gudang
                                    </p>

                                </div>

                            </div>


                            <div class="legend">

                                <div class="legend-item">
                                    <span class="legend-dot"></span>
                                    Fisik Lapangan
                                </div>

                                <div class="legend-item">
                                    <span class="legend-dot orange"></span>
                                    Data Sistem
                                </div>

                            </div>

                        </div>


                        {{-- ITEM 1 --}}

                        <div class="comparison-item">

                            <div class="comparison-top">

                                <span class="material-name">
                                    EX-081201 - Mechanical Seal Cartridge
                                </span>

                                <span class="rack">
                                    RAK - 1.02
                                </span>

                            </div>

                            <div class="bar-row">
                                <div class="bar blue" style="width:70%;">
                                </div>
                            </div>

                            <div class="bar-row">
                                <div class="bar orange" style="width:70%;">
                                </div>
                            </div>

                        </div>


                        {{-- ITEM 2 --}}

                        <div class="comparison-item">

                            <div class="comparison-top">

                                <span class="material-name">
                                    EX-042219 - Circuit Breaker Vacuum 6.6kV
                                </span>

                                <span class="rack">
                                    RAK - 3.01
                                </span>

                            </div>

                            <div class="bar-row">
                                <div class="bar blue" style="width:50%;">
                                </div>
                            </div>

                            <div class="bar-row">
                                <div class="bar orange" style="width:50%;">
                                </div>
                            </div>

                        </div>


                        {{-- ITEM 3 --}}

                        <div class="comparison-item">

                            <div class="comparison-top">

                                <span class="material-name">
                                    EX-031115 - Motor Fan Industrial
                                </span>

                                <span class="rack">
                                    RAK - 2.04
                                </span>

                            </div>

                            <div class="bar-row">
                                <div class="bar blue" style="width:35%;">
                                </div>
                            </div>

                            <div class="bar-row">
                                <div class="bar orange" style="width:42%;">
                                </div>
                            </div>

                        </div>


                        {{-- ITEM 4 --}}

                        <div class="comparison-item">

                            <div class="comparison-top">

                                <span class="material-name">
                                    EX-021022 - Kabel Power 20kV
                                </span>

                                <span class="rack">
                                    RAK - 1.05
                                </span>

                            </div>

                            <div class="bar-row">
                                <div class="bar blue" style="width:60%;">
                                </div>
                            </div>

                            <div class="bar-row">
                                <div class="bar orange" style="width:60%;">
                                </div>
                            </div>

                        </div>

                    </div>


                    {{-- COMPOSITION --}}

                    <div class="panel">

                        <div class="panel-header">

                            <div class="panel-title">

                                <div class="panel-icon" style="color:#00d89a;">
                                    ◢
                                </div>

                                <div>

                                    <h3>
                                        Komposisi Material Bekas
                                    </h3>

                                    <p>
                                        Distribusi material ex barang berdasarkan
                                        kategori
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="composition-content">

                            <div class="donut"></div>


                            <div class="composition-list">

                                <div class="composition-item">

                                    <div class="composition-name">

                                        <span class="composition-dot"></span>

                                        Besi

                                    </div>

                                    <span class="composition-value">
                                        2.850 kg
                                    </span>

                                </div>


                                <div class="composition-item">

                                    <div class="composition-name">

                                        <span class="composition-dot gray"></span>

                                        Baja

                                    </div>

                                    <span class="composition-value">
                                        1.120 kg
                                    </span>

                                </div>


                                <div class="composition-item">

                                    <div class="composition-name">

                                        <span class="composition-dot blue"></span>

                                        Kabel

                                    </div>

                                    <span class="composition-value">
                                        780 kg
                                    </span>

                                </div>


                                <div class="composition-item">

                                    <div class="composition-name">

                                        <span class="composition-dot green"></span>

                                        Plastik

                                    </div>

                                    <span class="composition-value">
                                        450 kg
                                    </span>

                                </div>


                                <div class="composition-item">

                                    <div class="composition-name">

                                        <span class="composition-dot yellow"></span>

                                        Lainnya

                                    </div>

                                    <span class="composition-value">
                                        220 kg
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

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


        /* =========================================
           KLIK MENU
           MOBILE → SIDEBAR LANGSUNG TUTUP
        ========================================= */

        document.querySelectorAll('.menu-item').forEach(function(menu) {

            menu.addEventListener('click', function() {

                if (window.innerWidth <= 1024) {
                    closeSidebar();
                }

            });

        });


        /* =========================================
           RESIZE
           DESKTOP → SIDEBAR KEMBALI NORMAL
        ========================================= */

        window.addEventListener('resize', function() {

            if (window.innerWidth > 1024) {
                closeSidebar();
            }

        });


        /* =========================================
           ESC → TUTUP SIDEBAR
        ========================================= */

        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {
                closeSidebar();
            }

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

</body>

</html>
