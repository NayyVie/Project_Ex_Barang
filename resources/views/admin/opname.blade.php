@extends('layouts.app-admin')

@section('title', 'Persediaan & Opname')

@section('page-title', 'Persediaan & Opname')

@section('page-subtitle', 'Real-time stok fisik vs catatan sistem')

@section('Profile', 'Admin')

@section('content')

    <style>
        /* =====================================================
                                                                                                                                                                                           STOK & OPNAME
                                                                                                                                                                                           ===================================================== */

        .stock-page {
            width: 100%;
        }

        /* ================================
                                                                                                                                                                                           SUMMARY CARDS
                                                                                                                                                                                           ================================ */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 18px;
        }

        .summary-card {
            background: #ffff;
            border: 1px solid #e7edf3;
            border-radius: 14px;
            padding: 20px;
            min-height: 145px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(30, 60, 90, 0.045);
            transition: transform 0.2s ease, box-shadow 0.2s ease;

        }

        .summary-card:hover {
            transform:

                translateY(-2px);

            box-shadow:

                0 9px 25px rgba(30, 60, 90, 0.08);
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .summary-title {
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .3px;
        }

        .summary-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: 500;
        }

        .icon-blue {
            color: #00a8e8;
            background: rgba(0, 168, 232, .12);
        }

        .icon-orange {
            color: #f59e0b;
            background: rgba(245, 158, 11, .12);
        }

        .icon-red {
            color: #ef4444;
            background: rgba(239, 68, 68, .12);
        }

        .icon-green {
            color: #10b981;
            background: rgba(16, 185, 129, .12);
        }

        .summary-value {
            font-size: 27px;
            font-weight: 700;
            color: #172b4d;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .summary-value.orange {
            color: #ffa857;
        }

        .summary-value.red {
            color: #ff5757;
        }

        .summary-value.green {
            color: #20c997;
        }

        .summary-info {
            font-size: 11px;
            color: #a0aabb;
            line-height: 1.5;
        }

        .summary-info strong {
            color: #747a83;
        }

        .summary-link {
            display: inline-block;
            margin-top: 9px;
            color: #00a8e8;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }

        .summary-link:hover {
            color: #32c4ff;
        }

        /* ================================
                                                                                                                                                                                           FILTER AREA
                                                                                                                                                                                           ================================ */

        .filter-card {
            background: #ffffff;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            padding: 13px;
            margin-bottom: 18px;
        }

        .filter-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-tabs {
            display: flex;
            align-items: center;
            background: #f1f3f6;
            border-radius: 12px;
            padding: 3px;
            flex-shrink: 0
        }

        .filter-tab {
            border: none;

            background: transparent;

            padding: 9px 15px;

            border-radius: 9px;

            font-family: inherit;

            font-size: 12px;

            font-weight: 500;

            color: #617089;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .filter-tab:hover {
            color: #075eae;
        }

        .filter-tab.active {
            background: #ffffff;

            color: #075eae;

            font-weight: 600;

            box-shadow:
                0 1px 4px rgba(15, 23, 42, 0.10);
        }

        .filter-spacer {
            flex: 1;
        }

        .search-box {
            flex: 1;

            height: 40px;

            display: flex;

            align-items: center;

            gap: 9px;

            padding: 0 13px;

            background: #f8fafc;

            border: 1px solid #dfe5ec;

            border-radius: 11px;

            color: #95a1b2;
        }

        .search-box:focus-within {
            border-color: #2d73d5;

            background: #ffffff;

            box-shadow:
                0 0 0 3px rgba(45, 115, 213, 0.08);
        }


        .search-box input {
            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            font-family: inherit;

            font-size: 13px;

            color: #263b5b;
        }

        .search-box input::placeholder {
            color: #718098;
        }

        .filter-select {
            height: 37px;
            width: 175px;
            padding: 0 11px;
            border-radius: 9px;
            border: 1px solid #dce4ef;
            background: #ffffff;
            color: #263d5b;
            outline: none;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s;
        }

        /* ================================
                                                                                                                                                                                           TABLE
                                                                                                                                                                                           ================================ */

        .table-card {
            background: #ffffff;
            border: 1px solid #e8edf5;
            border-radius: 18px;
            box-shadow: 0 3px 12px rgba(15, 39, 70, 0.04);
            overflow: hidden;
        }

        .table-header {
            padding: 18px 20px 15px;
            border-bottom: 1px solid #e8edf5;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-title-area h3 {
            margin: 0 0 4px;
            color: #102a4c;
            font-size: 15px;
            font-weight: 700;
        }

        .table-title-area p {
            margin: 4px 0 0;
            color: #8a9ab1;
            font-size: 10px;
        }

        .table-wrapper {
            overflow-x: auto;
            width: 100%;
        }

        .stock-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        .stock-table thead th {
            background: #fafbfd;
            color: #8494aa;
            text-align: left;
            padding: 15px 17px;
            font-size: 10px;
            font-weight: 600;
            border-bottom: 1px solid #edf1f6;
            white-space: nowrap;
        }

        .stock-table tbody td {
            padding: 16px 17px;
            border-bottom: 1px solid #f0f3f7;
            color: #526680;
            font-size: 11px;
            /* vertical-align: middle; */
            white-space: nowrap;
        }

        .stock-table tbody tr:hover {
            background: rgba(255, 255, 255, .015);
        }

        .item-number {
            color: #075dcc;
            font-weight: 700;
            line-height: 1.4;
        }

        .item-description {
            color: #1b304d;
            font-weight: 600;
            margin-bottom: 3px;
            white-space: nowrap;
            max-width: 220px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-location {
            color: #526680;
            font-size: 9px;
        }

        .stock-number {
            color: #526680;
            font-weight: 700;
        }

        .stock-unit {
            color: #526680;
            margin-left: 3px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 7px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-match {
            color: #22c997;
            background: rgba(16, 185, 129, .10);
            border: 1px solid rgba(16, 185, 129, .25);
        }

        .badge-short {
            color: #ff5b66;
            background: rgba(239, 68, 68, .10);
            border: 1px solid rgba(239, 68, 68, .25);
        }

        .badge-warning {
            color: #fbbf24;
            background: rgba(245, 158, 11, .10);
            border: 1px solid rgba(245, 158, 11, .25);
        }

        .action-group {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .btn-opname,
        .btn-sync {
            border-radius: 6px;
            padding: 7px 10px;
            font-size: 9px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-opname {
            color: #ffff;
            font-weight: 600;
            font-size: 10px;
            background: #0f3b91;
            border: 1px solid #fafafa5e;
        }

        .btn-opname:hover {
            background: #203858da;
        }

        .btn-sync {
            color: #ffffff;
            font-weight: 600;
            font-size: 10px;
            background: #155eef;
            border: 1px solid #155eef;
        }

        .btn-sync:hover {
            background: #0f4dcc;
        }

        /* ================================
                                                                                                                                                                                           RESPONSIVE
                                                                                                                                                                                           ================================ */

        @media (max-width: 1100px) {
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-row {
                flex-wrap: wrap;
            }

            .filter-spacer {
                display: none;
            }

            .search-box {
                flex: 1;
                min-width: 220px;
            }
        }

        @media (max-width: 700px) {
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .filter-tabs {
                width: 100%;
                overflow-x: auto;
            }

            .filter-tab {
                white-space: nowrap;
            }

            .search-box {
                width: 100%;
                flex: none;
            }

            .filter-select {
                flex: 1;
            }

            .table-header {
                align-items: flex-start;
                gap: 10px;
            }
        }

        /* =========================================================
                           MODAL OPNAME FISIK
                        ========================================================= */

        .opname-modal-overlay,
        .sync-modal-overlay {

            position: fixed;

            inset: 0;

            background: rgba(15, 31, 55, .45);

            display: none;

            align-items: center;
            justify-content: center;

            z-index: 9999;
        }

        .opname-modal-overlay.show,
        .sync-modal-overlay.show {

            display: flex;
        }


        /* =========================================================
                           MODAL OPNAME
                        ========================================================= */

        .opname-modal {

            width: 470px;

            max-width: calc(100% - 40px);

            background: #ffffff;

            border-radius: 10px;

            overflow: hidden;

            box-shadow:
                0 20px 50px rgba(15, 39, 70, .20);

            animation: opnameModalShow .18s ease-out;
        }

        @keyframes opnameModalShow {

            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        .opname-modal-header {

            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            padding: 20px 22px;

            border-bottom: 1px solid #e8edf3;
        }

        .opname-modal-header h2 {

            margin: 0 0 4px;

            color: #173b69;

            font-size: 17px;

            font-weight: 700;
        }

        .opname-modal-header p {

            margin: 0;

            color: #8294a9;

            font-size: 10px;
        }

        .opname-modal-close {

            width: 28px;
            height: 28px;

            border: none;

            background: transparent;

            color: #7d91a7;

            font-size: 22px;

            cursor: pointer;
        }


        /* BODY */

        .opname-modal-body {

            padding: 20px 22px;

            background: #f8faff;
        }


        /* INFO */

        .opname-info {

            display: grid;

            grid-template-columns:
                1.4fr 1fr 1fr;

            gap: 10px;

            margin-bottom: 18px;
        }

        .opname-info-item {

            padding: 11px;

            background: #ffffff;

            border: 1px solid #e3eaf3;

            border-radius: 7px;
        }

        .opname-info-item span {

            display: block;

            margin-bottom: 4px;

            color: #8a9bad;

            font-size: 9px;
        }

        .opname-info-item strong {

            display: block;

            color: #23466f;

            font-size: 11px;

            font-weight: 600;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        /* FORM */

        .opname-form-group {

            margin-bottom: 15px;
        }

        .opname-form-group label {

            display: block;

            margin-bottom: 7px;

            color: #294462;

            font-size: 10px;

            font-weight: 600;
        }

        .opname-input-wrapper {

            position: relative;
        }

        .opname-input-wrapper input {

            width: 100%;

            height: 39px;

            box-sizing: border-box;

            padding: 0 55px 0 12px;

            border: 1px solid #dce4ef;

            border-radius: 7px;

            background: #ffffff;

            color: #263d5b;

            font-family: inherit;

            font-size: 11px;

            outline: none;
        }

        .opname-input-wrapper input:focus {

            border-color: #0874c9;

            box-shadow:
                0 0 0 3px rgba(8, 116, 201, .08);
        }

        .opname-input-wrapper span {

            position: absolute;

            right: 12px;

            top: 50%;

            transform: translateY(-50%);

            color: #8294a9;

            font-size: 10px;

            font-weight: 600;
        }

        .opname-form-group textarea {

            width: 100%;

            box-sizing: border-box;

            padding: 10px 12px;

            border: 1px solid #dce4ef;

            border-radius: 7px;

            background: #ffffff;

            color: #263d5b;

            font-family: inherit;

            font-size: 11px;

            resize: vertical;

            outline: none;
        }

        .opname-form-group textarea:focus {

            border-color: #0874c9;

            box-shadow:
                0 0 0 3px rgba(8, 116, 201, .08);
        }


        /* FOOTER */

        .opname-modal-footer {

            display: flex;

            justify-content: flex-end;

            gap: 8px;

            padding: 14px 22px;

            border-top: 1px solid #e8edf3;

            background: #ffffff;
        }

        .opname-btn-cancel,
        .opname-btn-save {

            height: 34px;

            padding: 0 15px;

            border-radius: 6px;

            font-family: inherit;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;
        }

        .opname-btn-cancel {

            border: 1px solid #dce4ef;

            background: #ffffff;

            color: #61758d;
        }

        .opname-btn-save {

            border: none;

            background: #185bd1;

            color: #ffffff;
        }


        /* =========================================================
                           MODAL SINKRONKAN
                        ========================================================= */

        .sync-modal {

            width: 400px;

            max-width: calc(100% - 40px);

            padding: 28px;

            box-sizing: border-box;

            background: #ffffff;

            border-radius: 10px;

            text-align: center;

            box-shadow:
                0 20px 50px rgba(15, 39, 70, .20);
        }

        .sync-modal-icon {

            width: 48px;
            height: 48px;

            margin: 0 auto 14px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #edf5ff;

            color: #1765d1;

            font-size: 24px;

            font-weight: 600;
        }

        .sync-modal h3 {

            margin: 0 0 8px;

            color: #173b69;

            font-size: 17px;
        }

        .sync-modal>p {

            margin: 0 auto;

            max-width: 300px;

            color: #8193a7;

            font-size: 10px;

            line-height: 1.6;
        }


        /* PERBANDINGAN */

        .sync-comparison {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            margin: 20px 0;
        }

        .sync-stock {

            min-width: 105px;

            padding: 12px 10px;

            background: #f7faff;

            border: 1px solid #e1e9f3;

            border-radius: 7px;
        }

        .sync-stock span {

            display: block;

            margin-bottom: 5px;

            color: #8294a9;

            font-size: 9px;
        }

        .sync-stock strong {

            color: #173b69;

            font-size: 15px;
        }

        .sync-arrow {

            color: #1765d1;

            font-size: 18px;

            font-weight: 600;
        }


        /* BUTTON */

        .sync-modal-buttons {

            display: flex;

            justify-content: center;

            gap: 8px;
        }

        .sync-btn-cancel,
        .sync-btn-confirm {

            height: 34px;

            min-width: 85px;

            padding: 0 15px;

            border-radius: 6px;

            font-family: inherit;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;
        }

        .sync-btn-cancel {

            border: 1px solid #dce4ef;

            background: #ffffff;

            color: #61758d;
        }

        .sync-btn-confirm {

            border: none;

            background: #185bd1;

            color: #ffffff;
        }
    </style>


    <div class="stock-page">

        {{-- =====================================================
         SUMMARY
         ===================================================== --}}
        <div class="summary-grid">

            {{-- AKURASI --}}
            <div class="summary-card">

                <div class="summary-top">
                    <span class="summary-title">
                        Akurasi Stok Fisik vs Maximo
                    </span>

                    <span class="summary-icon icon-blue">
                        ⚖
                    </span>
                </div>

                <div class="summary-value">
                    70.0%
                </div>

                <div class="summary-info">
                    Target KPI Pembangkitan:
                    <strong>≥ 98.0%</strong>
                </div>

            </div>


            {{-- ITEM BERSELISIH --}}
            <div class="summary-card">

                <div class="summary-top">
                    <span class="summary-title">
                        Item Berselisih
                    </span>

                    <span class="summary-icon icon-orange">
                        ⚠
                    </span>
                </div>

                <div class="summary-value orange">
                    3
                </div>

                <div class="summary-info">
                    dari <strong>10</strong> item
                </div>

                <a href="#" class="summary-link">
                    Memerlukan investigasi fisik atau BA
                </a>

            </div>


            {{-- NILAI SELISIH --}}
            <div class="summary-card">

                <div class="summary-top">
                    <span class="summary-title">
                        Nilai Perselisih
                    </span>

                    <span class="summary-icon icon-red">
                        ↘
                    </span>
                </div>

                <div class="summary-value red">
                    Rp 31.560.000
                </div>

                <div class="summary-info">
                    Total deviasi nilai persediaan
                </div>

            </div>


            {{-- REKONSILIASI --}}
            <div class="summary-card">

                <div class="summary-top">
                    <span class="summary-title">
                        Status Rekonsiliasi
                    </span>

                    <span class="summary-icon icon-green">
                        ↪
                    </span>
                </div>

                <div class="summary-value green">
                    5
                </div>

                <div class="summary-info">
                    Catatan Opname Belum Terproses
                </div>

                <a href="#" class="summary-link">
                    Lihat Rekonsiliasi
                </a>

            </div>

        </div>


        {{-- =====================================================
         FILTER
         ===================================================== --}}
        <div class="filter-card">

            <div class="filter-row">

                <div class="filter-tabs">

                    <button type="button" class="filter-tab active" data-filter="semua">
                        Semua Persediaan
                        {{-- <span>(10)</span> --}}
                    </button>

                    <button type="button" class="filter-tab" data-filter="selisih">
                        Selisih
                        {{-- <span>(3)</span> --}}
                    </button>

                    <button type="button" class="filter-tab" data-filter="match">
                        Sesuai
                        {{-- <span>(7)</span> --}}
                    </button>

                </div>

                <div class="filter-spacer"></div>

                <div class="search-box">

                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.7" />

                        <path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                    </svg>

                    <input type="text" placeholder="Cari Item, Rak, atau Deskripsi...">

                </div>

                <select class="filter-select">

                    <option>
                        Semua Kategori
                    </option>

                    <option>
                        Mekanikal
                    </option>

                    <option>
                        Elektrikal
                    </option>

                    <option>
                        C&I (Instrumen)
                    </option>

                    <option>
                        Kimia & Pelumas
                    </option>

                    <option>
                        Consumable & Fastener
                    </option>

                    <option>
                        Safety & K3
                    </option>

                </select>

            </div>

        </div>


        {{-- =====================================================
         TABLE
         ===================================================== --}}
        <div class="table-card">

            <div class="table-header">

                <div class="table-title-area">

                    <h3>
                        Tabel Komparasi Stok Fisik Lapangan vs Catatan IBM Maximo
                    </h3>

                    <p>
                        Gunakan tombol "Sinkronkan ke Maximo" untuk menyamakan stok fisik jika telah diverifikasi.
                    </p>

                </div>

            </div>


            <div class="table-wrapper">

                <table class="stock-table">

                    <thead>

                        <tr>

                            <th>
                                Item Number
                            </th>

                            <th>
                                Deskripsi Material
                            </th>

                            <th>
                                Bin / Lokasi Rak
                            </th>

                            <th>
                                Stok Fisik
                            </th>

                            <th>
                                Stok Maximo
                            </th>

                            <th>
                                Selisih (Delta)
                            </th>

                            <th>
                                Nilai Deviasi
                            </th>

                            <th>
                                Opname Terakhir
                            </th>

                            <th>
                                Aksi Rekonsiliasi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        {{-- DATA 1 --}}
                        <tr>

                            <td>
                                <div class="item-number">
                                    MP-081201
                                </div>
                            </td>

                            <td>

                                <div class="item-description">
                                    Mechanical Seal Cartridge Type D-65mm for Boiler
                                </div>

                                <div class="item-location">
                                    PLTU Unit 1-2
                                </div>

                            </td>

                            <td>
                                RAK-A-01-02
                            </td>

                            <td>
                                <span class="stock-number">
                                    6
                                </span>

                                <span class="stock-unit">
                                    SET
                                </span>
                            </td>

                            <td>
                                <span class="stock-number">
                                    6
                                </span>

                                <span class="stock-unit">
                                    SET
                                </span>
                            </td>

                            <td>
                                <span class="badge badge-match">
                                    Match
                                </span>
                            </td>

                            <td>
                                Rp 0
                            </td>

                            <td>
                                10 Sep 2026
                            </td>

                            <td>

                                <div class="action-group">

                                    <button type="button" class="btn-opname" onclick="openOpnameModal(this)">
                                        Opname Fisik
                                    </button>

                                    <button type="button" class="btn-sync" onclick="openSyncModal(this)">
                                        Sinkronkan
                                    </button>

                                </div>

                            </td>

                        </tr>


                        {{-- DATA 2 --}}
                        <tr>

                            <td>
                                <div class="item-number">
                                    EP-042219
                                </div>
                            </td>

                            <td>

                                <div class="item-description">
                                    Circuit Breaker Vacuum 6.6kV 1250A 25kA Drawout
                                </div>

                                <div class="item-location">
                                    ABB VDB
                                </div>

                            </td>

                            <td>
                                RAK-B-03-01
                            </td>

                            <td>
                                <span class="stock-number">
                                    3
                                </span>

                                <span class="stock-unit">
                                    PCS
                                </span>
                            </td>

                            <td>
                                <span class="stock-number">
                                    3
                                </span>

                                <span class="stock-unit">
                                    PCS
                                </span>
                            </td>

                            <td>
                                <span class="badge badge-match">
                                    Match
                                </span>
                            </td>

                            <td>
                                Rp 0
                            </td>

                            <td>
                                08 Sep 2026
                            </td>

                            <td>

                                <div class="action-group">

                                    <button type="button" class="btn-opname" onclick="openOpnameModal(this)">
                                        Opname Fisik
                                    </button>

                                    <button type="button" class="btn-sync" onclick="openSyncModal(this)">
                                        Sinkronkan
                                    </button>

                                </div>

                            </td>

                        </tr>


                        {{-- DATA 3 --}}
                        <tr>

                            <td>
                                <div class="item-number">
                                    IC-093104
                                </div>
                            </td>

                            <td>

                                <div class="item-description">
                                    Pressure Transmitter Differential 4-20mA HART
                                </div>

                                <div class="item-location">
                                    PLTU Unit 1-2
                                </div>

                            </td>

                            <td>
                                RAK-C-02-05
                            </td>

                            <td>
                                <span class="stock-number">
                                    4
                                </span>

                                <span class="stock-unit">
                                    PCS
                                </span>
                            </td>

                            <td>
                                <span class="stock-number">
                                    5
                                </span>

                                <span class="stock-unit">
                                    PCS
                                </span>
                            </td>

                            <td>
                                <span class="badge badge-short">
                                    -1 PCS (Short)
                                </span>
                            </td>

                            <td>
                                Rp 14.200.000
                            </td>

                            <td>
                                12 Sep 2026
                            </td>

                            <td>

                                <div class="action-group">

                                    <button type="button" class="btn-opname" onclick="openOpnameModal(this)">
                                        Opname Fisik
                                    </button>

                                    <button type="button" class="btn-sync" onclick="openSyncModal(this)">
                                        Sinkronkan
                                    </button>

                                </div>

                            </td>

                        </tr>


                        {{-- DATA 4 --}}
                        <tr>

                            <td>
                                <div class="item-number">
                                    EX-031115
                                </div>
                            </td>

                            <td>

                                <div class="item-description">
                                    Motor Fan Industrial
                                </div>

                                <div class="item-location">
                                    PLTU Unit 3
                                </div>

                            </td>

                            <td>
                                RAK-C-02-04
                            </td>

                            <td>
                                <span class="stock-number">
                                    4
                                </span>

                                <span class="stock-unit">
                                    PCS
                                </span>
                            </td>

                            <td>
                                <span class="stock-number">
                                    5
                                </span>

                                <span class="stock-unit">
                                    PCS
                                </span>
                            </td>

                            <td>
                                <span class="badge badge-short">
                                    -1 PCS (Short)
                                </span>
                            </td>

                            <td>
                                Rp 8.450.000
                            </td>

                            <td>
                                11 Sep 2026
                            </td>

                            <td>

                                <div class="action-group">

                                    <button type="button" class="btn-opname" onclick="openOpnameModal(this)">
                                        Opname Fisik
                                    </button>

                                    <button type="button" class="btn-sync" onclick="openSyncModal(this)">
                                        Sinkronkan
                                    </button>

                                </div>

                            </td>

                        </tr>


                        {{-- DATA 5 --}}
                        <tr>

                            <td>
                                <div class="item-number">
                                    EX-021022
                                </div>
                            </td>

                            <td>

                                <div class="item-description">
                                    Kabel Power 20kV
                                </div>

                                <div class="item-location">
                                    PLTU Unit 1
                                </div>

                            </td>

                            <td>
                                RAK-D-01-05
                            </td>

                            <td>
                                <span class="stock-number">
                                    16
                                </span>

                                <span class="stock-unit">
                                    MTR
                                </span>
                            </td>

                            <td>
                                <span class="stock-number">
                                    20
                                </span>

                                <span class="stock-unit">
                                    MTR
                                </span>
                            </td>

                            <td>
                                <span class="badge badge-warning">
                                    -4 MTR
                                </span>
                            </td>

                            <td>
                                Rp 5.200.000
                            </td>

                            <td>
                                09 Sep 2026
                            </td>

                            <td>

                                <div class="action-group">

                                    <button type="button" class="btn-opname" onclick="openOpnameModal(this)">
                                        Opname Fisik
                                    </button>

                                    <button type="button" class="btn-sync" onclick="openSyncModal(this)">
                                        Sinkronkan
                                    </button>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- =========================================================
     MODAL OPNAME FISIK
========================================================= --}}
    <div class="opname-modal-overlay" id="opnameModal">

        <div class="opname-modal">

            {{-- HEADER --}}
            <div class="opname-modal-header">

                <div>
                    <h2>Opname Fisik</h2>

                    <p>
                        Masukkan jumlah stok aktual hasil pemeriksaan fisik
                    </p>
                </div>

                <button type="button" class="opname-modal-close" onclick="closeOpnameModal()">
                    &times;
                </button>

            </div>


            {{-- BODY --}}
            <div class="opname-modal-body">

                <div class="opname-info">

                    <div class="opname-info-item">

                        <span>Material</span>

                        <strong id="opnameMaterial">
                            -
                        </strong>

                    </div>


                    <div class="opname-info-item">

                        <span>Bin / Lokasi Rak</span>

                        <strong id="opnameLocation">
                            -
                        </strong>

                    </div>


                    <div class="opname-info-item">

                        <span>Stok Sistem</span>

                        <strong id="opnameSystemStock">
                            -
                        </strong>

                    </div>

                </div>


                <div class="opname-form-group">

                    <label for="physicalStock">
                        Jumlah Stok Fisik
                    </label>

                    <div class="opname-input-wrapper">

                        <input type="number" id="physicalStock" min="0" placeholder="Masukkan jumlah stok">

                        <span id="opnameUnit">
                            PCS
                        </span>

                    </div>

                </div>


                <div class="opname-form-group">

                    <label for="opnameNote">
                        Catatan Opname
                    </label>

                    <textarea id="opnameNote" rows="3" placeholder="Contoh: Stok telah diperiksa secara fisik di gudang..."></textarea>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="opname-modal-footer">

                <button type="button" class="opname-btn-cancel" onclick="closeOpnameModal()">
                    Batal
                </button>

                <button type="button" class="opname-btn-save" onclick="savePhysicalStock()">
                    Simpan Opname
                </button>

            </div>

        </div>

    </div>

    {{-- =========================================================
     MODAL SINKRONKAN
========================================================= --}}
    <div class="sync-modal-overlay" id="syncModal">

        <div class="sync-modal">

            <div class="sync-modal-icon">
                ↻
            </div>


            <h3>
                Sinkronkan Stok?
            </h3>


            <p>
                Data stok Maximo akan disesuaikan dengan hasil
                opname fisik yang telah diverifikasi.
            </p>


            <div class="sync-comparison">

                <div class="sync-stock">

                    <span>
                        Stok Fisik
                    </span>

                    <strong id="syncPhysicalStock">
                        -
                    </strong>

                </div>


                <div class="sync-arrow">
                    →
                </div>


                <div class="sync-stock">

                    <span>
                        Stok Maximo
                    </span>

                    <strong id="syncMaximoStock">
                        -
                    </strong>

                </div>

            </div>


            <div class="sync-modal-buttons">

                <button type="button" class="sync-btn-cancel" onclick="closeSyncModal()">
                    Batal
                </button>

                <button type="button" class="sync-btn-confirm" onclick="confirmSync()">
                    Sinkronkan
                </button>

            </div>

        </div>

    </div>


    <script>
        // ============================================
        // FILTER TAB
        // ============================================

        document.querySelectorAll('.filter-tab').forEach(button => {

            button.addEventListener('click', function() {

                document
                    .querySelectorAll('.filter-tab')
                    .forEach(btn => btn.classList.remove('active'));

                this.classList.add('active');

            });

        });


        // ============================================
        // SEARCH
        // ============================================

        const searchInput = document.querySelector('.search-box input');

        if (searchInput) {

            searchInput.addEventListener('input', function() {

                const keyword = this.value.toLowerCase();

                document
                    .querySelectorAll('.stock-table tbody tr')
                    .forEach(row => {

                        const text = row.innerText.toLowerCase();

                        row.style.display =
                            text.includes(keyword) ?
                            '' :
                            'none';

                    });

            });

        }
    </script>

    <script>
        // ============================================
        // FILTER TAB
        // ============================================
        document.querySelectorAll('.filter-tab').forEach(button => {
            button.addEventListener('click', function() {

                document.querySelectorAll('.filter-tab')
                    .forEach(btn => btn.classList.remove('active'));

                this.classList.add('active');
            });
        });


        // ============================================
        // SEARCH
        // ============================================
        const searchInput = document.querySelector('.search-box input');

        if (searchInput) {

            searchInput.addEventListener('input', function() {

                const keyword = this.value.toLowerCase();

                document
                    .querySelectorAll('.stock-table tbody tr')
                    .forEach(row => {

                        const text = row.innerText.toLowerCase();

                        row.style.display =
                            text.includes(keyword) ?
                            '' :
                            'none';
                    });
            });
        }
    </script>


    <script>
        // ============================================
        // VARIABLE GLOBAL
        // ============================================
        let currentOpnameRow = null;
        let currentSyncRow = null;


        // ============================================
        // OPNAME FISIK
        // ============================================
        function openOpnameModal(button) {

            currentOpnameRow = button.closest('tr');

            if (!currentOpnameRow) {
                return;
            }

            const cells = currentOpnameRow.querySelectorAll('td');


            // ========================================
            // SESUAIKAN DENGAN STRUKTUR TABEL
            // ========================================
            // cells[0] = Item Number
            // cells[1] = Deskripsi Material
            // cells[2] = Bin / Lokasi Rak
            // cells[3] = Stok Fisik
            // cells[4] = Stok Maximo
            // cells[5] = Selisih
            // cells[6] = Nilai Deviasi
            // cells[7] = Opname Terakhir
            // cells[8] = Aksi


            const material =
                cells[0]?.textContent.trim() || '-';

            const location =
                cells[2]?.textContent.trim() || '-';

            const physicalStock =
                cells[3]?.textContent.trim() || '-';

            const maximoStock =
                cells[4]?.textContent.trim() || '-';


            // ========================================
            // MASUKKAN DATA KE MODAL
            // ========================================

            document.getElementById('opnameMaterial').textContent =
                material;

            document.getElementById('opnameLocation').textContent =
                location;

            document.getElementById('opnameSystemStock').textContent =
                maximoStock;


            // ========================================
            // MASUKKAN STOK FISIK SAAT INI
            // ========================================

            const numberMatch =
                physicalStock.match(/\d+(?:\.\d+)?/);

            if (numberMatch) {

                document.getElementById('physicalStock').value =
                    numberMatch[0];

            } else {

                document.getElementById('physicalStock').value = '';

            }


            // ========================================
            // TAMPILKAN MODAL
            // ========================================

            document.getElementById('opnameModal')
                .classList.add('show');

            document.body.style.overflow = 'hidden';
        }



        // ============================================
        // TUTUP MODAL OPNAME
        // ============================================
        function closeOpnameModal() {

            document.getElementById('opnameModal')
                .classList.remove('show');

            document.body.style.overflow = '';

            currentOpnameRow = null;
        }



        // ============================================
        // SIMPAN HASIL OPNAME
        // ============================================
        function savePhysicalStock() {

            if (!currentOpnameRow) {
                return;
            }

            const input =
                document.getElementById('physicalStock');

            const value = input.value;


            // Validasi
            if (value === '' || Number(value) < 0) {

                alert('Silakan masukkan jumlah stok fisik.');

                return;
            }


            const cells =
                currentOpnameRow.querySelectorAll('td');


            // ========================================
            // UPDATE KOLOM STOK FISIK
            // ========================================
            if (cells[3]) {

                const oldText =
                    cells[3].textContent.trim();

                const unitMatch =
                    oldText.match(/[A-Za-z]+/);

                const unit =
                    unitMatch ?
                    unitMatch[0] :
                    'PCS';


                cells[3].innerHTML =
                    `<span class="stock-number">${value}</span>
                 <span class="stock-unit">${unit}</span>`;
            }


            // ========================================
            // TUTUP MODAL
            // ========================================
            closeOpnameModal();
        }



        // ============================================
        // SINKRONKAN
        // ============================================
        function openSyncModal(button) {

            currentSyncRow = button.closest('tr');

            if (!currentSyncRow) {
                return;
            }

            const cells =
                currentSyncRow.querySelectorAll('td');


            // ========================================
            // AMBIL DATA YANG BENAR
            // ========================================

            const physicalStock =
                cells[3]?.textContent.trim() || '-';

            const maximoStock =
                cells[4]?.textContent.trim() || '-';


            // ========================================
            // TAMPILKAN KE MODAL
            // ========================================

            document.getElementById('syncPhysicalStock')
                .textContent = physicalStock;

            document.getElementById('syncMaximoStock')
                .textContent = maximoStock;


            // ========================================
            // TAMPILKAN MODAL
            // ========================================

            document.getElementById('syncModal')
                .classList.add('show');

            document.body.style.overflow = 'hidden';
        }



        // ============================================
        // TUTUP MODAL SINKRONKAN
        // ============================================
        function closeSyncModal() {

            document.getElementById('syncModal')
                .classList.remove('show');

            document.body.style.overflow = '';

            currentSyncRow = null;
        }



        // ============================================
        // KONFIRMASI SINKRONKAN
        // ============================================
        function confirmSync() {

            if (!currentSyncRow) {
                return;
            }

            const cells =
                currentSyncRow.querySelectorAll('td');


            // ========================================
            // AMBIL STOK FISIK
            // ========================================

            const physicalText =
                cells[3]?.textContent.trim() || '0';

            const physicalMatch =
                physicalText.match(/\d+(?:\.\d+)?/);

            const physicalValue =
                physicalMatch ?
                physicalMatch[0] :
                '0';


            // ========================================
            // AMBIL SATUAN
            // ========================================

            const unitMatch =
                physicalText.match(/[A-Za-z]+/);

            const unit =
                unitMatch ?
                unitMatch[0] :
                'PCS';


            // ========================================
            // UBAH STOK MAXIMO
            // MENJADI SAMA DENGAN STOK FISIK
            // ========================================

            if (cells[4]) {

                cells[4].innerHTML =
                    `<span class="stock-number">${physicalValue}</span>
                 <span class="stock-unit">${unit}</span>`;
            }


            // ========================================
            // UBAH STATUS MENJADI MATCH
            // ========================================

            if (cells[5]) {

                cells[5].innerHTML =
                    `<span class="badge badge-match">
                    Match
                 </span>`;
            }


            // ========================================
            // NILAI DEVIASI MENJADI RP 0
            // ========================================

            if (cells[6]) {

                cells[6].textContent =
                    'Rp 0';
            }


            // ========================================
            // TUTUP MODAL
            // ========================================

            closeSyncModal();
        }



        // ============================================
        // KLIK AREA LUAR MODAL
        // ============================================

        const opnameModal =
            document.getElementById('opnameModal');

        if (opnameModal) {

            opnameModal.addEventListener('click', function(event) {

                if (event.target === this) {

                    closeOpnameModal();
                }
            });
        }


        const syncModal =
            document.getElementById('syncModal');

        if (syncModal) {

            syncModal.addEventListener('click', function(event) {

                if (event.target === this) {

                    closeSyncModal();
                }
            });
        }



        // ============================================
        // ESC
        // ============================================

        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {

                closeOpnameModal();

                closeSyncModal();
            }
        });
    </script>

@endsection
