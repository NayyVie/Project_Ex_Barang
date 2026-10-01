@extends('layouts.app-admin')

@section('title', 'Material Bekas & Limbah')

@section('page-title', 'Material Bekas & Limbah')
@section('page-subtitle', 'Pengelolaan material bekas penggantian pemeliharaan pembangkit')

@section('content')

    <div class="material-page">

        {{-- ================================
        HEADER
    ================================= --}}
        <div class="material-header">

            <div class="material-header-left">
                <div class="material-title">
                    <div class="material-title-icon">
                        ♻
                    </div>

                    <div>
                        <h1>Pengelolaan Material Bekas & Limbah</h1>
                        <p>
                            Kategorisasi material bekas penggantian pemeliharaan pembangkit
                        </p>
                    </div>
                </div>
            </div>

            {{-- <button class="btn-primary-material"> clss=btn-terima-limbah
                <span>＋</span>
                Terima Material Limbah
            </button> --}}
            <button type="button" class="btn-primary-material" id="btnTerimaLimbah">
                <span>+</span>
                Terima Material Limbah Part
            </button>

        </div>


        {{-- ================================
        SUMMARY CARDS
    ================================= --}}
        <div class="material-summary">

            {{-- BESI --}}
            <div class="material-card">
                <div class="material-card-top">
                    <span> Besi & Baja </span>

                    <span class="material-badge badge-ferrous">
                        Ferrous
                    </span>
                </div>

                <div class="material-value">
                    2.850
                    <small>kg</small>
                </div>

                <div class="material-price">
                    Rp 17.670.000
                </div>
            </div>


            {{-- TEMBAGA --}}
            <div class="material-card">
                <div class="material-card-top">
                    <span>Tembaga</span>

                    <span class="material-badge badge-high">
                        High Value
                    </span>
                </div>

                <div class="material-value">
                    630
                    <small>kg</small>
                </div>

                <div class="material-price">
                    Rp 67.410.000
                </div>
            </div>


            {{-- ALUMINIUM --}}
            <div class="material-card">
                <div class="material-card-top">
                    <span>Aluminium</span>

                    <span class="material-badge badge-alloy">
                        Alloy
                    </span>
                </div>

                <div class="material-value">
                    780
                    <small>kg</small>
                </div>

                <div class="material-price">
                    Rp 20.670.000
                </div>
            </div>


            {{-- PLASTIK --}}
            <div class="material-card">
                <div class="material-card-top">
                    <span>Plastik & Polimer</span>

                    <span class="material-badge badge-polymer">
                        Polymer
                    </span>
                </div>

                <div class="material-value">
                    640
                    <small>kg</small>
                </div>

                <div class="material-price">
                    Rp 2.880.000
                </div>
            </div>


            {{-- CAMPURAN --}}
            <div class="material-card">
                <div class="material-card-top">
                    <span>Campuran</span>

                    <span class="material-badge badge-mixed">
                        Mixed
                    </span>
                </div>

                <div class="material-value">
                    520
                    <small>kg</small>
                </div>

                <div class="material-price">
                    Rp 4.420.000
                </div>
            </div>

        </div>


        {{-- ================================
        FILTER BAR
    ================================= --}}
        <div class="material-filter">

            <div class="category-tabs">

                <button class="category-tab active">
                    Semua Bahan
                </button>

                <button class="category-tab">
                    Besi
                </button>

                <button class="category-tab">
                    Tembaga
                </button>

                <button class="category-tab">
                    Aluminium
                </button>

                <button class="category-tab">
                    Plastik
                </button>

                <button class="category-tab">
                    Campuran
                </button>

            </div>


            <div class="filter-right">

                <div class="search-material">
                    <span class="search-icon">⌕</span>

                    <input type="text" placeholder="Cari BA Limbah, Part, WO...">
                </div>

                <select class="status-filter">
                    <option>Semua Status</option>
                    <option>Siap Lelang</option>
                    <option>Verifikasi K3</option>
                    <option>Menunggu Pemeriksaan</option>
                    <option>Selesai</option>
                </select>

            </div>

        </div>


        {{-- ================================
        TABLE
    ================================= --}}
        <div class="material-table-wrapper">

            <table class="material-table">

                <thead>
                    <tr>

                        <th>No. BA Limbah</th>

                        <th>Jenis Bahan</th>

                        <th>Deskripsi Material Bekas</th>

                        <th>Asal WO & Unit</th>

                        <th>Berat Timbang</th>

                        <th>Taksiran Lelang</th>

                        <th>Lokasi Yard</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>
                </thead>


                <tbody>

                    {{-- DATA 1 --}}
                    <tr>

                        <td>
                            <div class="transaction-number">
                                LMB-2026-0091
                            </div>

                            <span class="date-small">
                                10 Sep 2026
                            </span>
                        </td>


                        <td>
                            <span class="type-badge type-besi">
                                Besi
                            </span>
                        </td>


                        <td>
                            <div class="material-description">
                                Potongan Pipa Boiler T22 & Casing Header Korosi ...
                            </div>

                            <div class="receiver">
                                Penerima: Siti Nurhaliza
                                (Petugas Timbang)
                            </div>
                        </td>


                        <td>

                            <a href="#" class="wo-link">
                                WO-MAX-2026-18910
                            </a>

                            <div class="unit-text">
                                Boiler PLTU
                            </div>

                        </td>


                        <td>
                            <div class="weight">
                                2.850
                            </div>

                            <span class="unit">
                                kg
                            </span>
                        </td>


                        <td>

                            <div class="auction-price">
                                Rp 17.670.000
                            </div>

                            <div class="price-small">
                                @ Rp 6.200/kg
                            </div>

                        </td>


                        <td>
                            <div class="yard-location">
                                Yard A
                                <br>
                                <span>
                                    (Besi & Baja Scrap)
                                </span>
                            </div>
                        </td>


                        <td>
                            <span class="status-badge status-ready">
                                SIAP LELANG
                            </span>
                        </td>


                        <td>
                            <div class="action-buttons">

                                <button class="action-btn" title="Lihat Detail">
                                    ◉
                                </button>

                                <button class="action-btn" title="Edit">
                                    ♢
                                </button>

                                <button class="action-btn delete" title="Hapus">
                                    ♙
                                </button>

                            </div>
                        </td>

                    </tr>


                    {{-- DATA 2 --}}
                    <tr>

                        <td>
                            <div class="transaction-number">
                                LMB-2026-0090
                            </div>

                            <span class="date-small">
                                8 Sep 2026
                            </span>
                        </td>


                        <td>
                            <span class="type-badge type-tembaga">
                                Tembaga
                            </span>
                        </td>


                        <td>

                            <div class="material-description">
                                Kabel Tembaga Cu-XLPE 240mm² & Sisa Spool Win...
                            </div>

                            <div class="receiver">
                                Penerima: Bambang Supriyanto
                            </div>

                        </td>


                        <td>

                            <a href="#" class="wo-link">
                                WO-MAX-2026-18754
                            </a>

                            <div class="unit-text">
                                Generator
                            </div>

                        </td>


                        <td>

                            <div class="weight">
                                630
                            </div>

                            <span class="unit">
                                kg
                            </span>

                        </td>


                        <td>

                            <div class="auction-price">
                                Rp 45.360.000
                            </div>

                            <div class="price-small">
                                @ Rp 108.000/kg
                            </div>

                        </td>


                        <td>

                            <div class="yard-location">
                                Yard B
                                <br>
                                <span>
                                    (Non-Ferrous Berharga /
                                    Terkunci)
                                </span>
                            </div>

                        </td>


                        <td>

                            <span class="status-badge status-verification">
                                VERIFIKASI K3
                            </span>

                        </td>


                        <td>

                            <div class="action-buttons">

                                <button class="action-btn" title="Lihat Detail">
                                    ◉
                                </button>

                                <button class="action-btn" title="Edit">
                                    ♢
                                </button>

                                <button class="action-btn delete" title="Hapus">
                                    ♙
                                </button>

                            </div>

                        </td>

                    </tr>


                    {{-- DATA 3 --}}
                    <tr>

                        <td>
                            <div class="transaction-number">
                                LMB-2026-0089
                            </div>

                            <span class="date-small">
                                7 Sep 2026
                            </span>
                        </td>


                        <td>

                            <span class="type-badge type-aluminium">
                                Aluminium
                            </span>

                        </td>


                        <td>

                            <div class="material-description">
                                Frame aluminium panel bekas dan komponen
                                pendingin ...
                            </div>

                            <div class="receiver">
                                Penerima: Ahmad Fauzi
                            </div>

                        </td>


                        <td>

                            <a href="#" class="wo-link">
                                WO-MAX-2026-18632
                            </a>

                            <div class="unit-text">
                                PLTU Unit 3
                            </div>

                        </td>


                        <td>

                            <div class="weight">
                                780
                            </div>

                            <span class="unit">
                                kg
                            </span>

                        </td>


                        <td>

                            <div class="auction-price">
                                Rp 20.670.000
                            </div>

                            <div class="price-small">
                                @ Rp 26.500/kg
                            </div>

                        </td>


                        <td>

                            <div class="yard-location">
                                Yard C
                                <br>
                                <span>
                                    Aluminium Scrap
                                </span>
                            </div>

                        </td>


                        <td>

                            <span class="status-badge status-process">
                                PEMERIKSAAN
                            </span>

                        </td>


                        <td>

                            <div class="action-buttons">

                                <button class="action-btn">
                                    ◉
                                </button>

                                <button class="action-btn">
                                    ♢
                                </button>

                                <button class="action-btn delete">
                                    ♙
                                </button>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>


    {{-- =====================================================
    STYLE
===================================================== --}}
    <style>
        /* =========================================
                                                                                                       MATERIAL PAGE
                                                                                                    ========================================= */

        .material-page {
            width: 100%;
            max-width: 100%;
            color: #17365d;
        }


        /* =========================================
                                                                                                       HEADER
                                                                                                    ========================================= */

        .material-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }


        .material-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }


        .material-title-icon {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: linear-gradient(135deg,
                    #0878d1,
                    #0b58a8);

            color: white;

            font-size: 21px;
            font-weight: 700;

            flex-shrink: 0;
        }


        .material-title h1 {
            margin: 0;

            color: #17365d;

            font-size: 22px;
            font-weight: 700;

            line-height: 1.25;
        }


        .material-title p {
            margin: 5px 0 0;

            color: #7d91a9;

            font-size: 12px;
        }


        /* =========================================
                                                                                                       BUTTON
                                                                                                    ========================================= */

        .btn-primary-material {
            border: none;

            background: linear-gradient(135deg,
                    #0784d8,
                    #0755c7);

            color: white;

            padding: 11px 17px;

            border-radius: 8px;

            font-family: inherit;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            display: flex;
            align-items: center;
            gap: 6px;

            white-space: nowrap;

            box-shadow: 0 4px 10px rgba(7, 105, 190, .15);

            transition: .2s ease;
        }


        .btn-primary-material:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(7, 105, 190, .2);
        }


        /* =========================================
                                                                                                       SUMMARY
                                                                                                    ========================================= */

        .material-summary {
            display: grid;

            grid-template-columns:
                repeat(5, minmax(0, 1fr));

            gap: 14px;

            margin-bottom: 20px;
        }


        .material-card {
            background: white;

            border: 1px solid #dce7f2;

            border-radius: 9px;

            padding: 15px;

            min-width: 0;

            box-shadow:
                0 2px 7px rgba(25, 70, 110, .04);
        }


        .material-card-top {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 8px;

            margin-bottom: 12px;

            color: #506781;

            font-size: 11px;
            font-weight: 600;
        }


        .material-card-top>span:first-child {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .material-badge {
            padding: 4px 7px;

            border-radius: 6px;

            font-size: 9px;
            font-weight: 600;

            white-space: nowrap;
        }


        .badge-ferrous {
            background: #eef3f8;
            color: #526d89;
        }


        .badge-high {
            background: #fff2df;
            color: #dc8a00;
        }


        .badge-alloy {
            background: #e9f1f8;
            color: #55718d;
        }


        .badge-polymer {
            background: #dff8f1;
            color: #069c78;
        }


        .badge-mixed {
            background: #f0e3ff;
            color: #7b25c8;
        }


        .material-value {
            color: #173e6d;

            font-size: 20px;
            font-weight: 700;

            line-height: 1.1;

            white-space: nowrap;
        }


        .material-value small {
            font-size: 10px;
            color: #71869d;
            font-weight: 500;
        }


        .material-price {
            margin-top: 7px;

            color: #1685cf;

            font-size: 9px;
            font-weight: 600;
        }


        /* =========================================
                                                                                                       FILTER
                                                                                                    ========================================= */

        .material-filter {
            background: white;

            border: 1px solid #dce7f2;

            border-radius: 9px;

            padding: 11px;

            margin-bottom: 16px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            box-shadow:
                0 2px 7px rgba(25, 70, 110, .04);
        }


        .category-tabs {
            display: flex;
            align-items: center;

            background: #edf3f9;

            border-radius: 7px;

            padding: 3px;

            overflow-x: auto;
        }


        .category-tab {
            border: none;

            background: transparent;

            color: #71869c;

            padding: 8px 13px;

            border-radius: 5px;

            font-family: inherit;

            font-size: 10px;
            font-weight: 500;

            cursor: pointer;

            white-space: nowrap;
        }


        .category-tab.active {
            background: white;

            color: #173e6d;

            font-weight: 600;

            box-shadow:
                0 1px 4px rgba(30, 70, 110, .12);
        }


        .filter-right {
            display: flex;

            align-items: center;

            gap: 8px;

            flex-shrink: 0;
        }


        .search-material {
            height: 34px;

            width: 220px;

            display: flex;
            align-items: center;

            gap: 6px;

            padding: 0 10px;

            border-radius: 7px;

            background: #f6f9fc;

            border: 1px solid #dbe6f1;
        }


        .search-icon {
            color: #7790a9;

            font-size: 17px;
        }


        .search-material input {
            width: 100%;

            border: none;
            outline: none;

            background: transparent;

            color: #17365d;

            font-family: inherit;

            font-size: 10px;
        }


        .search-material input::placeholder {
            color: #92a4b8;
        }


        .status-filter {
            height: 34px;

            min-width: 125px;

            border: 1px solid #dbe6f1;

            background: #f6f9fc;

            color: #506781;

            border-radius: 7px;

            padding: 0 9px;

            font-family: inherit;

            font-size: 10px;

            outline: none;

            cursor: pointer;
        }


        /* =========================================
                                                                                                       TABLE
                                                                                                    ========================================= */

        .material-table-wrapper {
            width: 100%;

            overflow-x: auto;

            background: white;

            border: 1px solid #dce7f2;

            border-radius: 9px;

            box-shadow:
                0 2px 7px rgba(25, 70, 110, .04);
        }


        .material-table {
            width: 100%;

            min-width: 1050px;

            border-collapse: collapse;

            table-layout: fixed;
        }


        .material-table th {
            background: #edf4fa;

            color: #536b84;

            font-size: 10px;

            font-weight: 600;

            text-align: left;

            padding: 14px 12px;

            border-bottom: 1px solid #dce7f2;

            line-height: 1.35;
        }


        .material-table td {
            padding: 15px 12px;

            border-bottom: 1px solid #e7eef5;

            color: #304b68;

            font-size: 10px;

            vertical-align: middle;
        }


        .material-table tbody tr:last-child td {
            border-bottom: none;
        }


        .material-table tbody tr:hover {
            background: #f9fbfd;
        }


        /* COLUMN WIDTH */

        .material-table th:nth-child(1),
        .material-table td:nth-child(1) {
            width: 9%;
        }

        .material-table th:nth-child(2),
        .material-table td:nth-child(2) {
            width: 9%;
        }

        .material-table th:nth-child(3),
        .material-table td:nth-child(3) {
            width: 25%;
        }

        .material-table th:nth-child(4),
        .material-table td:nth-child(4) {
            width: 13%;
        }

        .material-table th:nth-child(5),
        .material-table td:nth-child(5) {
            width: 9%;
        }

        .material-table th:nth-child(6),
        .material-table td:nth-child(6) {
            width: 12%;
        }

        .material-table th:nth-child(7),
        .material-table td:nth-child(7) {
            width: 11%;
        }

        .material-table th:nth-child(8),
        .material-table td:nth-child(8) {
            width: 8%;
        }

        .material-table th:nth-child(9),
        .material-table td:nth-child(9) {
            width: 8%;
        }


        /* =========================================
                                                                                                       TABLE CONTENT
                                                                                                    ========================================= */

        .transaction-number {
            color: #173e6d;

            font-weight: 700;

            line-height: 1.35;
        }


        .date-small {
            display: inline-block;

            margin-top: 4px;

            color: #91a1b1;

            font-size: 8px;

            line-height: 1.4;
        }


        .type-badge {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 4px 8px;

            border-radius: 10px;

            font-size: 8px;
            font-weight: 600;

            white-space: nowrap;
        }


        .type-besi {
            background: #edf2f7;
            color: #52687d;
        }


        .type-tembaga {
            background: #fff0dc;
            color: #c77700;
        }


        .type-aluminium {
            background: #e8f1f8;
            color: #4380aa;
        }


        .material-description {
            color: #304b68;

            font-weight: 600;

            line-height: 1.45;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .receiver {
            margin-top: 5px;

            color: #8a9bad;

            font-size: 8px;

            line-height: 1.35;
        }


        .wo-link {
            color: #0787d4;

            font-weight: 700;

            text-decoration: none;

            font-size: 9px;

            line-height: 1.35;
        }


        .unit-text {
            margin-top: 4px;

            color: #7c8fa4;

            font-size: 8px;
        }


        .weight {
            color: #173e6d;

            font-weight: 700;

            font-size: 12px;
        }


        .unit {
            color: #8497aa;

            font-size: 8px;
        }


        .auction-price {
            color: #079a75;

            font-weight: 700;

            font-size: 9px;

            white-space: nowrap;
        }


        .price-small {
            color: #8b9cad;

            font-size: 7px;

            margin-top: 3px;
        }


        .yard-location {
            color: #435b73;

            font-size: 9px;

            line-height: 1.4;
        }


        .yard-location span {
            color: #8a9aaa;
            font-size: 8px;
        }


        /* =========================================
                                                                                                       STATUS
                                                                                                    ========================================= */

        .status-badge {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 5px 8px;

            border-radius: 10px;

            font-size: 7px;

            font-weight: 700;

            white-space: nowrap;
        }


        .status-ready {
            color: #04966f;

            background: #e3f8f1;

            border: 1px solid #b9eadc;
        }


        .status-verification {
            color: #ca7800;

            background: #fff1dc;

            border: 1px solid #f0d4a2;
        }


        .status-process {
            color: #0875c1;

            background: #e5f2fb;

            border: 1px solid #c3e1f5;
        }


        /* =========================================
                                                                                                       ACTION
                                                                                                    ========================================= */

        .action-buttons {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 6px;
        }


        .action-btn {
            border: none;

            background: transparent;

            color: #7b91a8;

            cursor: pointer;

            font-size: 13px;

            padding: 3px;
        }


        .action-btn:hover {
            color: #087dcc;
        }


        .action-btn.delete:hover {
            color: #e34d59;
        }


        /* =========================================
                                                                                                       RESPONSIVE
                                                                                                    ========================================= */

        @media (max-width: 1200px) {

            .material-summary {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }

            .material-filter {
                align-items: stretch;
                flex-direction: column;
            }

            .category-tabs {
                width: 100%;
            }

            .filter-right {
                width: 100%;
            }

            .search-material {
                flex: 1;
                width: auto;
            }

            .status-filter {
                width: 160px;
            }
        }


        @media (max-width: 768px) {

            .material-header {
                align-items: flex-start;

                flex-direction: column;

                gap: 12px;
            }


            .material-header-left {
                width: 100%;
            }


            .material-title h1 {
                font-size: 18px;
            }


            .material-title p {
                font-size: 10px;
            }


            .btn-primary-material {
                width: 100%;

                justify-content: center;
            }


            .material-summary {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                gap: 10px;
            }


            .material-card {
                padding: 13px;
            }


            .material-card-top {
                align-items: flex-start;
                flex-direction: column;
            }


            .material-filter {
                padding: 9px;
            }


            .category-tabs {
                width: 100%;

                overflow-x: auto;

                scrollbar-width: none;
            }


            .category-tabs::-webkit-scrollbar {
                display: none;
            }


            .filter-right {
                display: grid;

                grid-template-columns: 1fr 130px;

                width: 100%;
            }


            .search-material {
                width: 100%;
            }


            .status-filter {
                width: 100%;
                min-width: 0;
            }


            .material-table-wrapper {
                border-radius: 8px;
            }
        }


        @media (max-width: 520px) {

            .material-summary {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }


            .material-title {
                align-items: flex-start;
            }


            .material-title-icon {
                width: 34px;
                height: 34px;
                font-size: 18px;
            }


            .material-title h1 {
                font-size: 16px;
            }


            .material-title p {
                font-size: 9px;
            }


            .material-value {
                font-size: 18px;
            }


            .filter-right {
                grid-template-columns: 1fr;
            }


            .search-material {
                height: 36px;
            }


            .status-filter {
                height: 36px;
            }
        }


        @media (max-width: 360px) {

            .material-summary {
                grid-template-columns: 1fr;
            }


            .material-card-top {
                flex-direction: row;
                align-items: center;
            }


            .material-title h1 {
                font-size: 15px;
            }


            .material-title p {
                display: none;
            }
        }

        /* CARD UNTUK TOMBOL TERIMA LIMBAH */
        /* =========================================
                                                                                               MODAL PENERIMAAN MATERIAL LIMBAH
                                                                                            ========================================= */

        .limbah-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(4, 12, 30, 0.72);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 24px;

            z-index: 9999;

            opacity: 0;
            visibility: hidden;

            transition: opacity .2s ease,
                visibility .2s ease;
        }

        .limbah-modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }


        /* CARD */

        .limbah-modal-card {
            width: 100%;
            max-width: 900px;

            max-height: 92vh;

            background: #ffffff;

            border: 1px solid #e3eaf2;

            border-radius: 10px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, .45);

            overflow: hidden;

            transform: translateY(10px) scale(.98);

            transition: transform .2s ease;
        }

        .limbah-modal-overlay.show .limbah-modal-card {
            transform: translateY(0) scale(1);
        }


        /* =========================================
                                                                                               HEADER
                                                                                            ========================================= */

        .limbah-modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            padding: 18px 22px;

            background: #ffffff;

            border-bottom: 1px solid #e3eaf2;
        }

        .limbah-modal-header h3 {
            margin: 0;

            color: #161515;

            font-size: 18px;

            font-weight: 700;
        }

        .limbah-modal-header p {
            margin: 5px 0 0;

            color: #94a3b8;

            font-size: 11px;

            line-height: 1.5;
        }

        .limbah-modal-close {
            width: 30px;
            height: 30px;

            border: none;
            background: transparent;

            color: #94a3b8;

            font-size: 26px;

            line-height: 1;

            cursor: pointer;

            transition: .2s ease;
        }

        .limbah-modal-close:hover {
            color: #94a3b8b7;
        }


        /* =========================================
                                                                                               BODY
                                                                                            ========================================= */

        .limbah-modal-body {
            padding: 20px 22px;

            max-height: calc(92vh - 150px);

            overflow-y: auto;
        }


        /* =========================================
                                                                                               FORM
                                                                                            ========================================= */

        .limbah-form-row {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 12px;

            margin-bottom: 14px;
        }

        .limbah-form-row:nth-of-type(2) {
            grid-template-columns:
                1fr 1fr 1fr;
        }

        .limbah-form-group {
            min-width: 0;
        }

        .limbah-form-group.full {
            margin-bottom: 14px;
        }

        .limbah-form-group label {
            display: block;

            margin-bottom: 6px;

            color: #161515;

            font-size: 10px;

            font-weight: 600;
        }

        .limbah-form-group label span {
            color: #e53935;
        }


        /* INPUT */

        .limbah-input {
            width: 100%;

            height: 38px;

            padding: 0 12px;

            border: 1px solid #2a3b5733;

            border-radius: 6px;

            outline: none;

            background: #ffffff;

            color: #161515;

            font-family: inherit;

            font-size: 11px;

            transition: border-color .2s ease,
                box-shadow .2s ease;
        }

        .limbah-input::placeholder {
            color: #6f7e94;
        }

        .limbah-input:focus {
            border-color: #177bd1;

            box-shadow:
                0 0 0 2px rgba(23, 123, 209, .12);
        }

        .limbah-input option {
            background: #ffffff;
            color: #161515;
        }


        /* NOMOR WO */

        .input-blue {
            color: #00a7ff;

            font-weight: 700;
        }


        /* HARGA */

        .input-green {
            color: #06a880;

            font-weight: 700;
        }


        /* =========================================
                                                                                               JENIS BAHAN
                                                                                            ========================================= */

        .jenis-bahan-options {
            display: grid;

            grid-template-columns:
                repeat(5, 1fr);

            gap: 7px;
        }

        .jenis-bahan-btn {
            height: 34px;

            border: 1px solid #c2c8d3;

            border-radius: 6px;

            background: #e6ecf7;

            color: #21262c;

            font-family: inherit;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .jenis-bahan-btn:hover {
            border-color: #247fd0;
        }

        .jenis-bahan-btn.active {
            background: #185bd1;

            border-color: #185bd1;

            color: #ffffff;
        }


        /* =========================================
                                                                                               TOTAL
                                                                                            ========================================= */

        .limbah-total-value {
            height: 38px;

            display: flex;

            align-items: center;

            padding: 0 12px;

            border-radius: 6px;

            border: 1px solid #c2cbd3;

            background: #ffffff;

            color: #06a880;

            font-size: 12px;

            font-weight: 700;
        }


        /* =========================================
                                                                                               FOOTER
                                                                                            ========================================= */

        .limbah-modal-footer {
            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 8px;

            padding: 13px 22px;

            border-top: 1px solid #c2c8d3be;

            background: #ffffff;
        }

        .btn-limbah-batal {
            height: 34px;

            padding: 0 13px;

            border-radius: 6px;

            border: none;

            background: #185bd1;

            color: #ffffff;

            font-family: inherit;

            font-size: 11px;

            cursor: pointer;
        }

        .btn-limbah-simpan {
            height: 34px;

            padding: 0 15px;

            border: none;

            border-radius: 6px;

            background: #185bd1;

            color: #ffffff;

            font-family: inherit;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .btn-limbah-batal:hover {
            background: #1c64d1de;
        }

        .btn-limbah-simpan:hover {
            background: #1c64d1de;
        }


        /* =========================================
                                                                                               RESPONSIVE
                                                                                            ========================================= */

        @media (max-width: 768px) {

            .limbah-modal-overlay {
                padding: 12px;
            }

            .limbah-modal-card {
                max-height: 95vh;
            }

            .limbah-modal-header {
                padding: 15px 16px;
            }

            .limbah-modal-header h3 {
                font-size: 15px;
            }

            .limbah-modal-body {
                padding: 16px;
            }

            .limbah-form-row,
            .limbah-form-row:nth-of-type(2) {
                grid-template-columns: 1fr;
            }

            .jenis-bahan-options {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .limbah-modal-footer {
                padding: 12px 16px;
            }
        }


        @media (max-width: 480px) {

            .jenis-bahan-options {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .limbah-modal-header h3 {
                font-size: 14px;
            }

            .limbah-modal-header p {
                font-size: 9px;
            }

            .limbah-modal-footer {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn-limbah-batal,
            .btn-limbah-simpan {
                width: 100%;
            }
        }
    </style>

    {{-- CARD UNTUK TOMBOL TERIMA LIMBAH --}}
    <!-- =========================================
                                                                                                 MODAL PENERIMAAN MATERIAL BEKAS / LIMBAH
                                                                                            ========================================= -->

    <div class="limbah-modal-overlay" id="limbahModal">

        <div class="limbah-modal-card">

            <!-- HEADER -->
            <div class="limbah-modal-header">

                <div>
                    <h3>Penerimaan Material Bekas / Limbah Part (Scrap Yard)</h3>

                    <p>
                        Formulir serah terima material bekas hasil pembongkaran unit
                        pembangkit terintegrasi WO Maximo
                    </p>
                </div>

                <button type="button" class="limbah-modal-close" id="closeLimbahModal">
                    ×
                </button>

            </div>


            <!-- BODY -->
            <div class="limbah-modal-body">

                <!-- JENIS BAHAN -->
                <div class="limbah-form-group full">

                    <label>
                        Jenis Bahan Material Bekas
                        <span class="Required">*</span>
                    </label>

                    <div class="jenis-bahan-options">

                        <button type="button" class="jenis-bahan-btn active" data-value="Besi">
                            Besi
                        </button>

                        <button type="button" class="jenis-bahan-btn" data-value="Tembaga">
                            Tembaga
                        </button>

                        <button type="button" class="jenis-bahan-btn" data-value="Aluminium">
                            Aluminium
                        </button>

                        <button type="button" class="jenis-bahan-btn" data-value="Plastik">
                            Plastik
                        </button>

                        <button type="button" class="jenis-bahan-btn" data-value="Campuran">
                            Campuran
                        </button>

                    </div>

                    <input type="hidden" id="jenisBahan" name="jenis_bahan" value="Besi">

                </div>


                <!-- DESKRIPSI -->
                <div class="limbah-form-group full">

                    <label>
                        Deskripsi Material Bekas / Part Eks-Pemeliharaan
                        <span class="Required">*</span>
                    </label>

                    <input type="text" class="limbah-input" name="deskripsi"
                        placeholder="Contoh Potongan pipa boiler SA-213 T22 korosi, kabel tembaga exis, dll">

                </div>


                <!-- ROW 1 -->
                <div class="limbah-form-row">

                    <!-- NOMOR WO -->
                    <div class="limbah-form-group">

                        <label>
                            Nomor Work Order (WO) Asal
                            <span class="Required">*</span>
                        </label>

                        <input type="text" class="limbah-input input-blue" name="nomor_wo" value="WO-MAX-2026-18683">

                    </div>


                    <!-- UNIT PEMBANGKIT -->
                    <div class="limbah-form-group">

                        <label>
                            Asal Unit Pembangkit
                            <span class="Required">*</span>
                        </label>

                        <select class="limbah-input" name="unit_pembangkit">

                            <option value="Boiler PLTU Unit 1">
                                Boiler PLTU Unit 1
                            </option>

                            <option value="Boiler PLTU Unit 2">
                                Boiler PLTU Unit 2
                            </option>

                            <option value="Generator Unit 1">
                                Generator Unit 1
                            </option>

                            <option value="Generator Unit 2">
                                Generator Unit 2
                            </option>

                        </select>

                    </div>

                </div>


                <!-- ROW 2 -->
                <div class="limbah-form-row">

                    <!-- BERAT -->
                    <div class="limbah-form-group">

                        <label>
                            Berat Timbang (Kg)
                            <span class="Required">*</span>
                        </label>

                        <input type="number" class="limbah-input" id="beratLimbah" name="berat" value="250"
                            min="0">

                    </div>


                    <!-- HARGA -->
                    <div class="limbah-form-group">

                        <label>
                            Taksiran Harga Lelang / Kg (IDR)
                            <span class="Required">*</span>
                        </label>

                        <input type="number" class="limbah-input input-green" id="hargaLimbah" name="harga"
                            value="6200" min="0">

                    </div>


                    <!-- TOTAL -->
                    <div class="limbah-form-group">

                        <label>
                            Total Estimasi Nilai
                        </label>

                        <div class="limbah-total-value" id="totalEstimasi">
                            Rp 1.550.000
                        </div>

                    </div>

                </div>


                <!-- ROW 3 -->
                <div class="limbah-form-row">

                    <!-- LOKASI -->
                    <div class="limbah-form-group">

                        <label>
                            Lokasi Penyimpanan di Yard
                            <span class="Required">*</span>
                        </label>

                        <select class="limbah-input" name="lokasi">

                            <option value="Yard A">
                                Yard A (Besi & Baja Scrap)
                            </option>

                            <option value="Yard B">
                                Yard B (Non-Ferrous / Berharga)
                            </option>

                            <option value="Yard C">
                                Yard C (Material Campuran)
                            </option>

                        </select>

                    </div>


                    <!-- STATUS -->
                    <div class="limbah-form-group">

                        <label>
                            Status Pengelolaan
                            <span class="Required">*</span>
                        </label>

                        <select class="limbah-input" name="status">

                            <option value="Tersimpan di Yard">
                                Tersimpan di Yard
                            </option>

                            <option value="Verifikasi K3">
                                Verifikasi K3
                            </option>

                            <option value="Siap Lelang">
                                Siap Lelang
                            </option>

                        </select>

                    </div>

                </div>


                <!-- CATATAN -->
                <div class="limbah-form-group full">

                    <label>
                        Catatan Penimbangan / Verifikasi K3 Bebas Kontaminan
                    </label>

                    <input type="text" class="limbah-input" name="catatan"
                        placeholder="Hasil penggantian part pemeliharaan rutin">

                </div>

            </div>


            <!-- FOOTER -->
            <div class="limbah-modal-footer">

                <button type="button" class="btn-limbah-batal" id="cancelLimbahModal">
                    Batal
                </button>

                <button type="button" class="btn-limbah-simpan" id="saveLimbah">
                    Simpan Penerimaan Limbah
                </button>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('limbahModal');

            const openButton =
                document.getElementById('btnTerimaLimbah');

            const closeButton =
                document.getElementById('closeLimbahModal');

            const cancelButton =
                document.getElementById('cancelLimbahModal');

            const saveButton =
                document.getElementById('saveLimbah');


            /* =========================================
               BUKA MODAL
            ========================================= */

            if (openButton) {
                openButton.addEventListener('click', function() {

                    modal.classList.add('show');

                    document.body.style.overflow = 'hidden';

                });
            }


            /* =========================================
               TUTUP MODAL
            ========================================= */

            function closeLimbahModal() {

                modal.classList.remove('show');

                document.body.style.overflow = '';

            }


            if (closeButton) {
                closeButton.addEventListener(
                    'click',
                    closeLimbahModal
                );
            }


            if (cancelButton) {
                cancelButton.addEventListener(
                    'click',
                    closeLimbahModal
                );
            }


            /* Klik area luar card */

            modal.addEventListener('click', function(event) {

                if (event.target === modal) {
                    closeLimbahModal();
                }

            });


            /* ESC */

            document.addEventListener('keydown', function(event) {

                if (event.key === 'Escape') {
                    closeLimbahModal();
                }

            });


            /* =========================================
               PILIH JENIS BAHAN
            ========================================= */

            const jenisButtons =
                document.querySelectorAll('.jenis-bahan-btn');

            const jenisInput =
                document.getElementById('jenisBahan');


            jenisButtons.forEach(function(button) {

                button.addEventListener('click', function() {

                    jenisButtons.forEach(function(btn) {
                        btn.classList.remove('active');
                    });

                    this.classList.add('active');

                    jenisInput.value =
                        this.dataset.value;

                });

            });


            /* =========================================
               HITUNG TOTAL ESTIMASI
            ========================================= */

            const beratInput =
                document.getElementById('beratLimbah');

            const hargaInput =
                document.getElementById('hargaLimbah');

            const totalElement =
                document.getElementById('totalEstimasi');


            function updateTotalEstimasi() {

                const berat =
                    parseFloat(beratInput.value) || 0;

                const harga =
                    parseFloat(hargaInput.value) || 0;

                const total =
                    berat * harga;


                totalElement.textContent =
                    'Rp ' +
                    total.toLocaleString('id-ID');

            }


            beratInput.addEventListener(
                'input',
                updateTotalEstimasi
            );

            hargaInput.addEventListener(
                'input',
                updateTotalEstimasi
            );


            /* =========================================
               SIMPAN
            ========================================= */

            saveButton.addEventListener('click', function() {

                alert('Penerimaan material limbah berhasil disimpan.');

                closeLimbahModal();

            });

        });
    </script>

@endsection
