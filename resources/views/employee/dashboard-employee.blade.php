<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Ex Used System</title>

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

        a {

            font-family: inherit;

        }

        /* * LAYOUT * */
        .dashboard {

            min-height: 100vh;

        }

        /* * SIDEBAR * */
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

        /* Logo */
        /* * SIDEBAR BRAND * */
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

            letter-spacing: 0.2px;

        }

        .brand-text span {

            margin-top: 4px;

            font-size: 9px;

            font-weight: 400;

            color: rgba(255, 255, 255, 0.82);

            white-space: nowrap;

        }

        .system-name {

            margin-top: 12px;

            font-size: 10px;

            font-weight: 400;

            color: rgba(255, 255, 255, 0.68);

        }

        /* Menu */
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

            transition:

                background 0.2s ease,

                color 0.2s ease,

                transform 0.2s ease;

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

            font-size: 16px;

        }

        .menu-icon img {

            width: 17px !important;

            height: 17px !important;

            object-fit: contain;

        }

        /* Divider */
        .menu-divider {

            height: 1px;

            background: rgba(255, 255, 255, 0.12);

            margin:

                16px 10px;

        }

        /* * SIDEBAR PROFILE * */
        .sidebar-profile {

            margin-top: auto;

            padding:

                16px 18px;

            border-top:

                1px solid rgba(255, 255, 255, 0.12);

        }

        .profile-mini {

            display: flex;

            align-items: center;

            gap: 11px;

        }

        .profile-avatar {

            width: 34px;

            height: 34px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            border-radius: 50%;

            background: #075eae;

            color: white;

            font-size: 11px;

            font-weight: 600;

        }

        .profile-infoo strong {

            display: block;

            font-size: 12px;

            font-weight: 600;

        }

        .profile-infoo span {

            display: block;

            margin-top: 2px;

            font-size: 10px;

            color:

                rgba(255, 255, 255, 0.68);

        }

        /* * MAIN * */
        .main {

            margin-left: 245px;

            width:

                calc(100% - 245px);

            min-height: 100vh;

            background: #f5f7fa;

        }

        /* * TOPBAR * */
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

        /* Page title */
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

        /* * TOPBAR RIGHT * */
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
            width: 20px;
            height: 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #52647c;
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

        /* * CONTENT * */
        .content {

            width: 100%;

            max-width: 1500px;

            margin: 0 auto;

            padding:

                30px 38px 45px;

        }

        /* * WELCOME CARD * */
        .welcome-card {

            width: 100%;

            min-height: 145px;

            position: relative;

            overflow: hidden;

            padding:

                27px 25px;

            border-radius: 16px;

            color: white;

            background: linear-gradient(115deg,

                    #06458f 0%,

                    #0864bb 48%,

                    #1283d8 100%);

            box-shadow:

                0 9px 28px rgba(4, 91, 170, 0.18);

        }

        /* Decorative circle */
        .welcome-card::before {

            content: "";

            position: absolute;

            width: 280px;

            height: 280px;

            right: -90px;

            top: -150px;

            border-radius: 50%;

            background:

                rgba(255, 255, 255, 0.07);

        }

        .welcome-card::after {

            content: "";

            position: absolute;

            width: 190px;

            height: 190px;

            right: 100px;

            bottom: -140px;

            border-radius: 50%;

            background:

                rgba(255, 255, 255, 0.04);

        }

        /* Welcome text */
        .welcome-card h3 {

            position: relative;

            z-index: 2;

            margin-bottom: 5px;

            font-size: 13px;

            font-weight: 400;

        }

        .welcome-card h2 {

            position: relative;

            z-index: 2;

            font-size: 25px;

            line-height: 1.2;

            font-weight: 700;

        }

        .welcome-card p {

            position: relative;

            z-index: 2;

            margin-top: 5px;

            font-size: 11px;

            color:

                rgba(255, 255, 255, 0.82);

        }

        .location-status {

            position: relative;

            z-index: 2;

            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-top: 13px;

            font-size: 10px;

            color:

                rgba(255, 255, 255, 0.94);

        }

        .location-dot {

            width: 8px;

            height: 8px;

            border-radius: 50%;

            background: #2be08d;

            box-shadow:

                0 0 0 3px rgba(43, 224, 141, 0.12);

        }

        /* * STATISTICS * */
        .stat-grid {

            display: grid;

            grid-template-columns:

                repeat(4, 1fr);

            gap: 15px;

            margin-top: 17px;

        }

        .stat-card {

            min-height: 140px;

            position: relative;

            padding: 19px;

            background: #ffffff;

            border:

                1px solid #e7edf3;

            border-radius: 14px;

            box-shadow:

                0 4px 15px rgba(30, 60, 90, 0.045);

            transition:

                transform 0.2s ease,

                box-shadow 0.2s ease;

        }

        .stat-card:hover {

            transform:

                translateY(-2px);

            box-shadow:

                0 9px 25px rgba(30, 60, 90, 0.08);

        }

        /* Stat icon */
        .stat-icon {

            width: 36px;

            height: 36px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 9px;

            background: #edf6ff;

            color: #176bc0;

            font-size: 17px;

            font-weight: 500;

        }

        .stat-card:nth-child(2) .stat-icon {

            background: #eafaf2;

            color: #28a66b;

        }

        .stat-card:nth-child(3) .stat-icon {

            background: #fff8e8;

            color: #d99818;

        }

        .stat-card:nth-child(4) .stat-icon {

            background: #f9edff;

            color: #9b55c7;

        }

        /* Number */
        .stat-number {

            margin-top: 15px;

            font-size: 27px;

            line-height: 1;

            font-weight: 700;

            color: #172b4d;

        }

        .stat-name {

            margin-top: 7px;

            font-size: 11px;

            font-weight: 500;

            color: #64748b;

        }

        .stat-sub {

            margin-top: 3px;

            font-size: 9px;

            color: #a0aabb;

        }

        /* Trend */
        .stat-trend {

            position: absolute;

            top: 20px;

            right: 18px;

            font-size: 9px;

            font-weight: 500;

            color: #36a879;

        }

        /* =========================================================
   QUICK ACTION
========================================================= */

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
            margin-top: 17px;
            width: 100%;
            box-sizing: border-box;
        }

        .quick-card {
            min-height: 82px;
            width: 100%;
            box-sizing: border-box;

            display: flex;
            align-items: center;

            padding: 16px 19px;

            text-decoration: none;
            color: inherit;

            background: #ffffff;

            border: 1px solid #e7edf3;
            border-radius: 14px;

            box-shadow: 0 4px 15px rgba(30, 60, 90, 0.04);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }

        .quick-card:hover {
            transform: translateY(-2px);

            border-color: #d8e6f4;

            box-shadow: 0 9px 24px rgba(30, 60, 90, 0.08);
        }

        .quick-icon {
            width: 38px;
            height: 38px;

            flex: 0 0 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 12px;

            border-radius: 9px;

            background: #edf6ff;
            color: #1474c4;

            font-size: 20px;
        }

        .quick-iconn {
            width: 38px;
            height: 38px;

            flex: 0 0 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 12px;

            border-radius: 9px;

            background: #fff7e6;
            color: #d99818;

            font-size: 20px;
        }

        .quick-text {
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .quick-text h3 {
            margin: 0;

            font-size: 13px;
            font-weight: 600;

            color: #172b4d;

            line-height: 1.4;
        }

        .quick-text p {
            margin: 3px 0 0;

            font-size: 9px;

            color: #94a3b8;

            line-height: 1.4;
        }

        .quick-arrow {
            margin-left: auto;
            padding-left: 10px;

            flex-shrink: 0;

            font-size: 19px;

            color: #a4afbd;

            transition:
                transform 0.2s ease,
                color 0.2s ease;
        }

        .quick-card:hover .quick-arrow {
            transform: translateX(3px);
            color: #176bc0;
        }


        /* =========================================================
   RESPONSIVE
========================================================= */

        @media (max-width: 850px) {

            .quick-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 520px) {

            .quick-grid {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-top: 13px;
            }

            .quick-card {
                min-height: 70px;
                padding: 13px 14px;
                border-radius: 12px;
            }

            .quick-icon {
                width: 34px;
                height: 34px;
                flex-basis: 34px;
                margin-right: 10px;
                font-size: 18px;
            }

            .quick-iconn {
                width: 34px;
                height: 34px;
                flex-basis: 34px;
                margin-right: 10px;
                font-size: 18px;
            }

            .quick-text h3 {
                font-size: 11px;
            }

            .quick-text p {
                font-size: 8px;
            }

            .quick-arrow {
                font-size: 17px;
            }
        }


        /* =================================
   RESPONSIVE
================================= */

        @media (max-width: 850px) {

            .quick-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 520px) {

            .quick-grid {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-top: 13px;
            }

            .quick-card {
                min-height: 70px;
                padding: 13px 14px;
                border-radius: 12px;
            }

            .quick-icon {
                width: 34px;
                height: 34px;
                flex-basis: 34px;
                margin-right: 10px;
                font-size: 18px;
            }

            .quick-iconn {
                width: 34px;
                height: 34px;
                flex-basis: 34px;
                margin-right: 10px;
                font-size: 18px;
            }

            .quick-text h3 {
                font-size: 11px;
            }

            .quick-text p {
                font-size: 8px;
            }
        }


        /* * ACTIVITY * */
        .activity-card {

            margin-top: 18px;

            overflow: hidden;

            background: #ffffff;

            border:

                1px solid #e7edf3;

            border-radius: 14px;

            box-shadow:

                0 4px 15px rgba(30, 60, 90, 0.04);

        }

        /* Header */
        .activity-header {

            min-height: 62px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:

                0 20px;

            border-bottom:

                1px solid #edf1f5;

        }

        .activity-header h3 {

            font-size: 14px;

            font-weight: 600;

            color: #172b4d;

        }

        .activity-header a {

            font-size: 10px;

            font-weight: 600;

            color: #176bc0;

            text-decoration: none;

        }

        .activity-header a:hover {

            text-decoration: underline;

        }

        /* Table */
        .table-wrapper {

            width: 100%;

            overflow-x: auto;

            -webkit-overflow-scrolling: touch;

        }

        table {

            width: 100%;

            min-width: 700px;

            border-collapse: collapse;

        }

        thead {

            background: #fafbfd;

        }

        th {

            padding:

                13px 20px;

            text-align: left;

            font-size: 9px;

            font-weight: 600;

            color: #8b99aa;

            white-space: nowrap;

            border-bottom:

                1px solid #edf1f5;

        }

        td {

            padding:

                15px 20px;

            font-size: 10px;

            color: #5e7085;

            white-space: nowrap;

            border-bottom:

                1px solid #f0f3f6;

        }

        tbody tr {

            transition:

                background 0.15s ease;

        }

        tbody tr:hover {

            background: #fafcff;

        }

        tbody tr:last-child td {

            border-bottom: none;

        }

        .report-id {

            color: #176bc0;

            font-weight: 600;

        }

        /* * BADGES * */
        .badge {

            display: inline-flex;

            align-items: center;

            min-height: 24px;

            padding:

                4px 10px;

            border-radius: 20px;

            font-size: 8px;

            font-weight: 600;

        }

        .badge-investasi {

            background: #eaf4ff;

            color: #2877c1;

        }

        .badge-operasi {

            background: #fff3d6;

            color: #ce941c;

        }

        .badge-approved {

            background: #dcf8e9;

            color: #31a76e;

        }

        /* * SIDEBAR OVERLAY * */
        .sidebar-overlay {

            display: none;

        }

        /* * LAPTOP * */
        @media (max-width: 1200px) {

            .sidebar {

                width: 225px;

            }

            .main {

                margin-left: 225px;

                width:

                    calc(100% - 225px);

            }

            .content {

                padding:

                    27px 28px 40px;

            }

            .topbar {

                padding:

                    0 28px;

            }

            .stat-grid {

                gap: 12px;

            }

            .stat-card {

                padding: 17px;

            }

            .stat-number {

                font-size: 24px;

            }

        }

        /* * TABLET LANDSCAPE * */
        @media (max-width: 1000px) {

            .sidebar {

                width: 215px;

            }

            .main {

                margin-left: 215px;

                width:

                    calc(100% - 215px);

            }

            .content {

                padding:

                    24px 21px 35px;

            }

            .stat-grid {

                grid-template-columns:

                    repeat(2, 1fr);

                gap: 12px;

            }

            .welcome-card {

                min-height: 140px;

            }

        }

        /* * TABLET / MOBILE * */
        @media (max-width: 768px) {

            body {

                overflow-x: hidden;

            }

            /* Sidebar */
            .sidebar {

                width: 250px;

                transform:

                    translateX(-100%);

                transition:

                    transform 0.25s ease;

                box-shadow:

                    7px 0 25px rgba(0, 0, 0, 0.16);

            }

            .sidebar.open {

                transform:

                    translateX(0);

            }

            /* Overlay */
            .sidebar-overlay {

                display: block;

                position: fixed;

                inset: 0;

                z-index: 90;

                background:

                    rgba(8, 25, 45, 0.42);

                opacity: 0;

                visibility: hidden;

                transition:

                    opacity 0.25s ease,

                    visibility 0.25s ease;

            }

            .sidebar-overlay.show {

                opacity: 1;

                visibility: visible;

            }

            /* Main */
            .main {

                margin-left: 0;

                width: 100%;

            }

            /* Topbar */
            .topbar {

                height: 64px;

                padding:

                    0 18px;

            }

            .mobile-header {

                display: flex;

                align-items: center;

            }

            .hamburger {

                display: flex;

            }

            /* Content */
            .content {

                padding:

                    22px 18px 32px;

            }

            /* Quick */
            .quick-grid {

                grid-template-columns: 1fr;

            }

        }

        /* * MOBILE * */
        @media (max-width: 520px) {

            .topbar {

                height: 62px;

                padding:

                    0 14px;

            }

            .page-title h2 {

                font-size: 16px;

            }

            .page-title p {

                font-size: 9px;

            }

            .topbar-right {

                gap: 5px;

            }

            .user-top {

                padding: 3px;

            }

            .user-top-info,

            .arrow {

                display: none;

            }

            .user-top-avatar {

                width: 32px;

                height: 32px;

            }

            /* Content */
            .content {

                padding:

                    17px 13px 28px;

            }

            /* Welcome */
            .welcome-card {

                min-height: 135px;

                padding:

                    21px 18px;

                border-radius: 14px;

            }

            .welcome-card h3 {

                font-size: 12px;

            }

            .welcome-card h2 {

                font-size: 21px;

            }

            .welcome-card p {

                font-size: 10px;

            }

            .location-status {

                margin-top: 12px;

                font-size: 9px;

            }

            /* Statistics */
            .stat-grid {

                grid-template-columns:

                    repeat(2, 1fr);

                gap: 10px;

                margin-top: 13px;

            }

            .stat-card {

                min-height: 122px;

                padding:

                    14px;

                border-radius: 12px;

            }

            .stat-icon {

                width: 33px;

                height: 33px;

                font-size: 15px;

            }

            .stat-number {

                margin-top: 12px;

                font-size: 21px;

            }

            .stat-name {

                margin-top: 6px;

                font-size: 9px;

            }

            .stat-sub {

                font-size: 8px;

            }

            .stat-trend {

                top: 15px;

                right: 12px;

                font-size: 7px;

            }

            /* Quick action */
            .quick-grid {

                gap: 10px;

                margin-top: 13px;

            }

            .quick-card {

                min-height: 70px;

                padding:

                    13px 14px;

                border-radius: 12px;

            }

            .quick-icon {

                width: 34px;

                height: 34px;

                margin-right: 10px;

            }

            .quick-iconn {

                width: 34px;

                height: 34px;

                margin-right: 10px;

            }

            .quick-text h3 {

                font-size: 11px;

            }

            .quick-text p {

                font-size: 8px;

            }

            /* Activity */
            .activity-card {

                margin-top: 13px;

                border-radius: 12px;

            }

            .activity-header {

                min-height: 54px;

                padding:

                    0 14px;

            }

            .activity-header h3 {

                font-size: 11px;

            }

            .activity-header a {

                font-size: 8px;

            }

            table {

                min-width: 700px;

            }

            th {

                padding:

                    11px 14px;

                font-size: 8px;

            }

            td {

                padding:

                    13px 14px;

                font-size: 9px;

            }

        }

        /* * SMALL PHONE * */
        @media (max-width: 360px) {

            .sidebar {

                width: 235px;

            }

            .content {

                padding:

                    14px 10px 24px;

            }

            .welcome-card {

                padding:

                    19px 16px;

            }

            .welcome-card h2 {

                font-size: 19px;

            }

            .stat-grid {

                gap: 8px;

            }

            .stat-card {

                min-height: 115px;

                padding: 12px;

            }

            .stat-number {

                font-size: 19px;

            }

            .stat-name {

                font-size: 8px;

            }

            .stat-sub {

                font-size: 7px;

            }

        }


        /* =========================================================
   FINAL TOPBAR / PROFILE FIX
========================================================= */
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .notification {
            position: relative;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: none;
            border-radius: 10px;
            background: transparent;
            color: #315a82;
            cursor: pointer;
            transition: background .2s ease, color .2s ease;
        }

        .notification:hover {
            background: #f1f6fb;
            color: #176bc0;
        }

        .notification svg {
            width: 22px;
            height: 22px;
            display: block;
        }

        .notification-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            top: 6px;
            right: 6px;
            border-radius: 50%;
            background: #e5394f;
            border: 2px solid #fff;
        }

        .profile-wrapper {
            position: relative;
        }

        .user-top {
            min-height: 52px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 5px 10px;
            border: none;
            border-radius: 11px;
            background: transparent;
            cursor: pointer;
            font-family: inherit;
            transition: background .2s ease;
        }

        .user-top:hover {
            background: #f4f7fa;
        }

        .user-top-avatar {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: linear-gradient(135deg, #1768b3, #0b559a);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
        }

        .user-top-info {
            text-align: left;
        }

        .user-top-info strong {
            display: block;
            font-size: 13px;
            line-height: 1.3;
            color: #243b53;
            font-weight: 600;
        }

        .user-top-info span {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            line-height: 1.2;
            color: #8b9aaa;
        }

        .arrow {
            margin-left: 3px;
            font-size: 13px;
            color: #8291a3;
            transition: transform .2s ease;
        }

        .profile-wrapper.active .arrow {
            transform: rotate(180deg);
        }

        .profile-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 245px;
            padding: 8px;
            background: #fff;
            border: 1px solid #e5ebf1;
            border-radius: 13px;
            box-shadow: 0 14px 35px rgba(24, 50, 78, .14);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-6px);
            pointer-events: none;
            transition: opacity .18s ease, transform .18s ease, visibility .18s ease;
            z-index: 300;
        }

        .profile-wrapper.active .profile-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: auto;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #172b4d;
            transition: background .18s ease;
        }

        .dropdown-item:hover {
            background: #f5f8fb;
        }

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

        .dropdown-icon svg {
            display: block;
        }

        .notification-icon {
            background: #f4edff;
            color: #9554c5;
        }

        .dropdown-item strong {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #243b53;
        }

        .dropdown-item small {
            display: block;
            margin-top: 3px;
            font-size: 9px;
            color: #91a0b1;
        }

        @media (max-width: 520px) {
            .topbar-right {
                gap: 4px;
                justify-content: space-between;
            }

            .notification {
                width: 36px;
                height: 36px;
            }

            .notification svg {
                width: 19px;
                height: 19px;
            }

            .notification-dot {
                width: 7px;
                height: 7px;
                top: 5px;
                right: 5px;
            }

            .user-top {
                gap: 7px;
                padding: 4px 6px;
            }

            .user-top-avatar {
                width: 35px;
                height: 35px;
                font-size: 11px;
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

            .arrow {
                display: inline-block;
                font-size: 11px;
            }

            .profile-dropdown {
                width: 220px;
            }
        }

        @media (max-width: 360px) {
            .user-top-info {
                display: none;
            }

            .arrow {
                display: none;
            }
        }
    </style>

</head>



<body>

    {{-- Overlay untuk menutup sidebar --}}

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div class="dashboard">

        <!-- =================================

         SIDEBAR

    ================================= -->

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

                <a href="{{ route('dashboardEmployee') }}" class="menu-item active">

                    <span class="menu-icon">

                        <img src="{{ asset('assets/images/icon-home.png') }}" alt="Home Icon"
                            style="width: 16px; height: 16px;">

                    </span>

                    <span>Dashboard</span>

                </a>



                <a href="{{ route('inputExBarang') }}" class="menu-item">

                    <span class="menu-icon">

                        <img src="{{ asset('assets/images/icon-input.png') }}" alt="Input Icon"
                            style="width: 16px; height: 16px;">

                    </span>

                    <span>{{ __('Input Ex Used') }}</span>

                </a>



                <a href="{{ route('riwayatEmployee') }}" class="menu-item">

                    <span class="menu-icon">

                        <img src="{{ asset('assets/images/icon-history.png') }}" alt="History Icon"
                            style="width: 17px; height: 17px;">

                    </span>

                    <span>{{ __('Riwayat') }}</span>

                </a>



                <a href="{{ route('laporanEmployee') }}" class="menu-item">

                    <span class="menu-icon">
                        <img src="{{ asset('assets/images/icon-laporan.png') }}" alt="Report Icon"
                            style="width: 17px; height: 17px;">
                    </span>

                    <span>{{ __('Laporan') }}</span>

                </a>



                <div class="menu-divider"></div>



                <a href="{{ route('notifikasiEmployee') }}" class="menu-item">

                    <span class="menu-icon">

                        <img src="{{ asset('assets/images/icon-notification.png') }}" alt="Notification Icon"
                            style="width: 17px; height: 17px;">

                    </span>

                    <span>{{ __('Notifikasi') }}</span>

                </a>



                <a href="{{ route('profileEmployee') }}" class="menu-item"
                    {{ request()->routeIs('profileEmployee') ? 'active' : '' }}>

                    <span class="menu-icon">

                        <img src="{{ asset('assets/images/icon-profile.png') }}" alt="Profile Icon"
                            style="width: 17px; height: 17px;">

                    </span>

                    <span>{{ __('Profil') }}</span>

                </a>

            </nav>



            <!-- Profile -->

            <div class="sidebar-profile">

                <div class="profile-mini">

                    <div class="profile-avatar">

                        B

                    </div>

                    <div class="profile-infoo">

                        <strong>Budi Santoso</strong>

                        <span>{{ __('Pekerja') }}</span>

                    </div>

                </div>

            </div>

        </aside>



        <!-- =================================

         MAIN

    ================================= -->

        <main class="main">



            <!-- TOPBAR -->

            <header class="topbar">

                <div class="mobile-header">

                    <button class="hamburger" onclick="toggleSidebar()">

                        ☰

                    </button>

                </div>



                <div class="page-title">

                    <h2>Dashboard</h2>

                    <p>

                        PLN Nusantara Power Services

                    </p>

                </div>



                <div class="topbar-right">

                    <!-- NOTIFICATION -->
                    <button type="button" class="notification" onclick="toggleNotification(event)"
                        aria-label="Notifikasi">
                        <img src="{{ asset('assets/images/icon-notificationT.png') }}" alt="Notification Icon"
                            style="width: 20px; height: 20px;">
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
                                <span>{{ __('Pekerja') }}</span>
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
                                    {{ __('Profil') }}
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
                                        {{ __('Keluar') }}
                                    </span>

                                </button>

                            </form>

                        </div>

                    </div>

            </header>



            <!-- =================================

             CONTENT

        ================================= -->

            <div class="content">



                <!-- WELCOME -->

                <section class="welcome-card">

                    <h3>

                        Selamat Siang,

                    </h3>

                    <h2>

                        Budi Santoso

                    </h2>

                    <p>

                        PLN Unit Surabaya

                    </p>

                    <div class="location-status">

                        <span class="location-dot"></span>

                        Lokasi terverifikasi

                    </div>

                </section>



                <!-- =================================

                 STATISTICS

            ================================= -->

                <section class="stat-grid">



                    <div class="stat-card">

                        <div class="stat-icon">

                            ◇

                        </div>

                        <span class="stat-trend">

                            ↗ +12%

                        </span>

                        <div class="stat-number">

                            24

                        </div>

                        <div class="stat-name">

                            {{ __('Total Ex Used') }}

                        </div>

                        <div class="stat-sub">

                            {{ __('Total Laporan Anda') }}

                        </div>

                    </div>



                    <div class="stat-card">

                        <div class="stat-icon">

                            ✓

                        </div>

                        <div class="stat-number">

                            10

                        </div>

                        <div class="stat-name">

                            {{ __('Investasi') }}

                        </div>

                    </div>



                    <div class="stat-card">

                        <div class="stat-icon">

                            ↗

                        </div>

                        <div class="stat-number">

                            8

                        </div>

                        <div class="stat-name">

                            {{ __('Operasi') }}

                        </div>

                    </div>



                    <div class="stat-card">

                        <div class="stat-icon">

                            ♧

                        </div>

                        <div class="stat-number">

                            6

                        </div>

                        <div class="stat-name">

                            {{ __('Tertunda') }}

                        </div>

                    </div>



                </section>



                {{-- =================================
     QUICK ACTION
================================= --}}
                <section class="quick-grid">

                    {{-- INPUT EX BARANG --}}
                    <a href="{{ route('inputExBarang') }}" class="quick-card"
                        {{ request()->routeIs('inputExBarang') ? 'active' : '' }}>

                        <div class="quick-icon">
                            +
                        </div>

                        <div class="quick-text">
                            <h3>{{ __('Input Ex Used') }}</h3>
                            <p>{{ __('Buat Laporan Baru') }}</p>
                        </div>

                        <div class="quick-arrow">
                            ›
                        </div>

                    </a>


                    {{-- RIWAYAT --}}
                    <a href="{{ route('riwayatEmployee') }}" class="quick-card"
                        {{ request()->routeIs('riwayatEmployee') ? 'active' : '' }}>

                        <div class="quick-iconn">
                            <img src="{{ asset('assets/images/icon-history3.png') }}" alt="Historyy Icon"
                                style="width: 17px; height: 17px;">
                        </div>

                        <div class="quick-text">
                            <h3>{{ __('Riwayat') }}</h3>
                            <p>{{ __('Lihat Riwayat Laporan') }}</p>
                        </div>

                        <div class="quick-arrow">
                            ›
                        </div>

                    </a>

                </section>



                <!-- =================================

                 ACTIVITY

            ================================= -->

                <section class="activity-card">

                    <div class="activity-header">

                        <h3>

                            {{ __('Aktivitas Baru') }}

                        </h3>

                        <a href="#">

                            {{ __('Lihat Semua') }}

                        </a>

                    </div>



                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>

                                        {{ __('ID Laporan') }}

                                    </th>

                                    <th>

                                        {{ __('Nama Barang') }}

                                    </th>

                                    <th>

                                        {{ __('Kondisi') }}

                                    </th>

                                    <th>

                                        {{ __('Tanggal') }}

                                    </th>

                                    <th>

                                        {{ __('Status') }}

                                    </th>

                                </tr>

                            </thead>



                            <tbody>



                                <tr>

                                    <td class="report-id">

                                        RPT-2024-001

                                    </td>

                                    <td>

                                        Trafo 100 kVA

                                    </td>

                                    <td>

                                        <span class="badge badge-investasi">

                                            Investasi

                                        </span>

                                    </td>

                                    <td>

                                        09 Sep 2024

                                    </td>

                                    <td>

                                        <span class="badge badge-approved">

                                            Disetujui

                                        </span>

                                    </td>

                                </tr>



                                <tr>

                                    <td class="report-id">

                                        RPT-2024-003

                                    </td>

                                    <td>

                                        Kabel XLPE 150mm

                                    </td>

                                    <td>

                                        <span class="badge badge-operasi">

                                            Operasi

                                        </span>

                                    </td>

                                    <td>

                                        08 Sep 2024

                                    </td>

                                    <td>

                                        <span class="badge badge-approved">

                                            Disetujui

                                        </span>

                                    </td>

                                </tr>



                                <tr>

                                    <td class="report-id">

                                        RPT-2024-006

                                    </td>

                                    <td>

                                        MCB 3 Phase 63A

                                    </td>

                                    <td>

                                        <span class="badge badge-investasi">

                                            Investasi

                                        </span>

                                    </td>

                                    <td>

                                        06 Sep 2024

                                    </td>

                                    <td>

                                        <span class="badge badge-approved">

                                            Disetujui

                                        </span>

                                    </td>

                                </tr>



                            </tbody>

                        </table>

                    </div>

                </section>



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

        // NOTIFICATION

        function toggleNotification(event) {
            event.preventDefault();
            event.stopPropagation();
            alert('Belum ada notifikasi baru.');
        }
    </script>

</body>

</html>
