@extends('layouts.app-admin')

@section('title', 'Mutasi Antar Gudang')
@section('page-title', 'Mutasi Antar Gudang')
@section('page-subtitle', 'Pencatatan perpindahan material antar gudang')

@section('content')

    <div class="mutasi-page">

        {{-- =========================================
        HEADER
    ========================================== --}}
        <div class="mutasi-header">

            <div class="header-actions">

                <button class="btn btn-scan" type="button">
                    <img src="{{ asset('assets/images/scan-barcode.png') }}" alt="Icon Barcode">
                    Scan Barcode Mutasi
                </button>

                <button class="btn btn-primary" type="button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 5v14" />
                        <path d="M5 12h14" />
                    </svg>
                    Buat Mutasi Antar Gudang
                </button>

            </div>

        </div>


        {{-- =========================================
        STATISTICS
    ========================================== --}}
        <div class="stats-grid">

            {{-- TOTAL MUTASI --}}
            <div class="stat-card">
                <div class="stat-top">
                    <span>TOTAL MUTASI</span>

                    <div class="stat-icon blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 7h10" />
                            <path d="M17 7l-3-3" />
                            <path d="M17 7l-3 3" />
                            <path d="M17 17H7" />
                            <path d="M7 17l3-3" />
                            <path d="M7 17l3 3" />
                        </svg>
                    </div>
                </div>

                <div class="stat-value">2</div>

                <div class="stat-description">
                    kali transfer
                </div>

                <p>Total 406 unit material dipindahkan</p>
            </div>


            {{-- GUDANG TERHUBUNG --}}
            <div class="stat-card">
                <div class="stat-top">
                    <span>GUDANG TERHUBUNG</span>

                    <div class="stat-icon cyan">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21h18" />
                            <path d="M5 21V7l7-4 7 4v14" />
                            <path d="M9 21v-4h6v4" />
                            <path d="M9 10h6" />
                            <path d="M9 13h6" />
                        </svg>
                    </div>
                </div>

                <div class="stat-value">4</div>

                <div class="stat-description">
                    lokasi storeroom
                </div>

                <p>
                    Gudang Sentral, PLTU 1-2, PLTU 3-4, dan BOP
                </p>
            </div>


            {{-- SURAT JALAN --}}
            <div class="stat-card">
                <div class="stat-top">
                    <span>SURAT JALAN MUTASI</span>

                    <div class="stat-icon green">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <path d="M14 2v6h6" />
                            <path d="M9 15l2 2 4-4" />
                        </svg>
                    </div>
                </div>

                <div class="stat-value">2</div>

                <div class="stat-description">
                    dokumen BAST
                </div>

                <p>
                    Tercatat resmi dengan tanda tangan pengirim & penerima
                </p>
            </div>


            {{-- SYNC MAXIMO --}}
            <div class="stat-card">
                <div class="stat-top">
                    <span>SYNC MAXIMO MIF</span>

                    <div class="stat-icon blue">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 11a8.1 8.1 0 0 0-14.9-4L3 10" />
                            <path d="M3 4v6h6" />
                            <path d="M4 13a8.1 8.1 0 0 0 14.9 4L21 14" />
                            <path d="M21 20v-6h-6" />
                        </svg>
                    </div>
                </div>

                <div class="stat-value sync-value">100%</div>

                <div class="stat-description">
                    storeroom synced
                </div>

                <p>
                    Saldo antar Storeroom Maximo termutasi otomatis
                </p>
            </div>

        </div>


        {{-- =========================================
        FILTER BAR
    ========================================== --}}
        <div class="filter-card">

            <div class="search-box">

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="11" cy="11" r="7" />
                    <path d="m20 20-4-4" />
                </svg>

                <input type="text" id="searchMutasi"
                    placeholder="Cari Ref Mutasi, Gudang Asal, Gudang Tujuan, Spare Part, Petugas...">

            </div>


            <div class="filter-actions">

                <select class="warehouse-filter">
                    <option selected>Semua Gudang Terlibat</option>
                    <option>Gudang Sentral</option>
                    <option>PLTU 1-2</option>
                    <option>PLTU 3-4</option>
                    <option>BOP</option>
                </select>


                <button type="button" class="btn-print">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M6 9V2h12v7" />
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                        <path d="M6 14h12v8H6z" />
                    </svg>

                    Cetak Rekap Mutasi

                </button>

            </div>

        </div>


        {{-- =========================================
        TABLE
    ========================================== --}}
        <div class="table-card">

            <div class="table-wrapper">

                <table class="mutasi-table">

                    <thead>
                        <tr>
                            <th>No. Mutasi</th>
                            <th>Nomor Ref Transfer</th>
                            <th>Alur Gudang<br>(Asal → Tujuan)</th>
                            <th>Petugas<br>(Pengirim & Penerima)</th>
                            <th>Material Spare Part</th>
                            <th>Jumlah Dimutasi</th>
                            <th>Tanggal & Jam</th>
                            <th>Sync Maximo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody id="mutasiTableBody">

                        {{-- DATA 1 --}}
                        <tr>

                            <td>
                                <strong>TRX-2026-0809</strong>
                            </td>

                            <td>
                                <span class="ref-number">
                                    TRF-UNIT-2026-0952
                                </span>
                            </td>

                            <td>
                                <div class="warehouse-flow">
                                    <strong>Gudang Sentral</strong>

                                    <span class="flow-arrow">⇄</span>

                                    <strong>Gudang Satelit PLTU<br>Unit 3-4</strong>
                                </div>
                            </td>

                            <td>
                                <div class="officer-info">

                                    <strong>
                                        Pengirim:<br>
                                        Siti Nurhaliza
                                    </strong>

                                    <small>
                                        Penerima:<br>
                                        Ahmad Fauzi<br>
                                        (Logistik Unit 3)
                                    </small>

                                </div>
                            </td>

                            <td>

                                <div class="material-info">

                                    <span class="material-code">
                                        CH-012903
                                    </span>

                                    <strong>
                                        Turbine Lube Oil ISO VG 46
                                        Extreme Pressure
                                    </strong>

                                </div>

                            </td>

                            <td>
                                <strong class="quantity">
                                    400
                                </strong>

                                <span class="unit">
                                    LTR
                                </span>
                            </td>

                            <td>
                                <span class="date">
                                    13 Sep 2026, 14.45
                                </span>
                            </td>

                            <td>
                                <span class="sync-badge">

                                    <span class="sync-dot"></span>

                                    MIF SYNCED

                                </span>
                            </td>

                            <td>
                                <button class="detail-button">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z" />
                                        <circle cx="12" cy="12" r="2.5" />
                                    </svg>

                                    Detail & Cetak
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 2 --}}
                        <tr>

                            <td>
                                <strong>TRX-2026-0810</strong>
                            </td>

                            <td>
                                <span class="ref-number">
                                    TRF-UNIT-2026-0953
                                </span>
                            </td>

                            <td>
                                <div class="warehouse-flow">
                                    <strong>PLTU 1-2</strong>

                                    <span class="flow-arrow">→</span>

                                    <strong>Gudang Sentral</strong>
                                </div>
                            </td>

                            <td>
                                <div class="officer-info">

                                    <strong>
                                        Pengirim:<br>
                                        Budi Santoso
                                    </strong>

                                    <small>
                                        Penerima:<br>
                                        Andi Pratama<br>
                                        (Admin Gudang)
                                    </small>

                                </div>
                            </td>

                            <td>

                                <div class="material-info">

                                    <span class="material-code">
                                        BR-024781
                                    </span>

                                    <strong>
                                        Bearing Industrial
                                        6312 ZZ
                                    </strong>

                                </div>

                            </td>

                            <td>
                                <strong class="quantity">
                                    6
                                </strong>

                                <span class="unit">
                                    PCS
                                </span>
                            </td>

                            <td>
                                <span class="date">
                                    14 Sep 2026, 09.20
                                </span>
                            </td>

                            <td>
                                <span class="sync-badge">

                                    <span class="sync-dot"></span>

                                    MIF SYNCED

                                </span>
                            </td>

                            <td>
                                <button class="detail-button">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z" />
                                        <circle cx="12" cy="12" r="2.5" />
                                    </svg>

                                    Detail & Cetak
                                </button>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <style>
        /* =========================================================
                           MUTASI PAGE
                        ========================================================= */

        .mutasi-page {
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
        }


        /* =========================================================
                           HEADER
                        ========================================================= */

        .mutasi-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 25px;
            margin-bottom: 25px;
        }

        /* =========================================================
                           HEADER BUTTON
                        ========================================================= */

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .btn {
            height: 40px;
            border: 0;
            border-radius: 8px;
            padding: 0 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
            transition: .2s ease;
        }

        .btn svg {
            width: 17px;
            height: 17px;
        }

        .btn-scan {
            color: white;
            background: linear-gradient(135deg, #0874c9, #0b8fd4);
        }

        .btn-primary {
            color: white;
            background: linear-gradient(135deg, #0756a8, #125ed0);
        }

        .btn:hover {
            transform: translateY(-1px);
        }


        /* =========================================================
                           STATISTICS
                        ========================================================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #dce6f1;
            border-radius: 13px;
            padding: 19px 18px;
            min-height: 130px;
            box-shadow: 0 3px 12px rgba(20, 62, 100, .05);
        }

        .stat-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
        }

        .stat-top>span {
            color: #8193aa;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .stat-icon {
            width: 25px;
            height: 25px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-icon svg {
            width: 16px;
            height: 16px;
        }

        .stat-icon.blue {
            background: #dceeff;
            color: #0874c9;
        }

        .stat-icon.cyan {
            background: #dff7ff;
            color: #0b9ad1;
        }

        .stat-icon.green {
            background: #dff8ef;
            color: #16b887;
        }

        .stat-value {
            margin-top: 13px;
            color: #163d69;
            font-size: 24px;
            line-height: 1;
            font-weight: 800;
        }

        .stat-value.sync-value {
            color: #087dcc;
        }

        .stat-description {
            display: inline-block;
            margin-left: 7px;
            color: #8799ad;
            font-size: 10px;
        }

        .stat-value+.stat-description {
            margin-top: 0;
        }

        .stat-card p {
            margin: 10px 0 0;
            color: #758ba4;
            font-size: 10px;
            line-height: 1.45;
        }


        /* =========================================================
                           FILTER
                        ========================================================= */

        .filter-card {
            background: #ffffff;
            border: 1px solid #dce6f1;
            border-radius: 13px;
            padding: 16px;
            margin-bottom: 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

            box-shadow: 0 3px 12px rgba(20, 62, 100, .04);
        }

        .search-box {
            height: 38px;
            flex: 1;
            max-width: 500px;

            display: flex;
            align-items: center;
            gap: 9px;

            background: #f2f6fa;
            border: 1px solid #d9e4ef;
            border-radius: 8px;
            padding: 0 12px;
        }

        .search-box svg {
            width: 17px;
            height: 17px;
            color: #7890a8;
            flex-shrink: 0;
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;

            font-family: inherit;
            font-size: 11px;
            color: #24476b;
        }

        .search-box input::placeholder {
            color: #8799ac;
        }

        .filter-actions {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .warehouse-filter {
            height: 38px;
            border: 1px solid #d8e3ee;
            border-radius: 8px;
            background: #f2f6fa;
            color: #46627e;
            padding: 0 30px 0 12px;
            font-family: inherit;
            font-size: 11px;
            outline: none;
        }

        .btn-print {
            height: 35px;
            border: none;

            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 0 11px;

            border-radius: 9px;

            background: #1653eb;
            color: #ffffff;

            font-family: 'Poppins', sans-serif;
            font-size: 10px;
            font-weight: 600;

            cursor: pointer;
        }

        .btn-print:hover {
            background: #0785c0;
            color: #ffffff;
        }

        .btn-print svg {
            width: 15px;
            height: 15px;
        }


        /* =========================================================
                           TABLE
                        ========================================================= */

        .table-card {
            background: #ffffff;
            border: 1px solid #dce6f1;
            border-radius: 13px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(20, 62, 100, .05);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
        }

        .mutasi-table {
            width: 100%;
            min-width: 1150px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .mutasi-table th {
            background: #f2f6fb;
            color: #647c96;
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            padding: 16px 14px;
            line-height: 1.35;
            border-bottom: 1px solid #dce6f1;
        }

        .mutasi-table td {
            padding: 18px 14px;
            border-bottom: 1px solid #e7edf4;
            color: #294b6e;
            font-size: 10px;
            vertical-align: middle;
            line-height: 1.45;
        }

        .mutasi-table tbody tr:last-child td {
            border-bottom: none;
        }

        .mutasi-table tbody tr:hover {
            background: #f8fbfe;
        }


        /* column widths */

        .mutasi-table th:nth-child(1),
        .mutasi-table td:nth-child(1) {
            width: 8%;
        }

        .mutasi-table th:nth-child(2),
        .mutasi-table td:nth-child(2) {
            width: 10%;
        }

        .mutasi-table th:nth-child(3),
        .mutasi-table td:nth-child(3) {
            width: 14%;
        }

        .mutasi-table th:nth-child(4),
        .mutasi-table td:nth-child(4) {
            width: 15%;
        }

        .mutasi-table th:nth-child(5),
        .mutasi-table td:nth-child(5) {
            width: 20%;
        }

        .mutasi-table th:nth-child(6),
        .mutasi-table td:nth-child(6) {
            width: 8%;
        }

        .mutasi-table th:nth-child(7),
        .mutasi-table td:nth-child(7) {
            width: 10%;
        }

        .mutasi-table th:nth-child(8),
        .mutasi-table td:nth-child(8) {
            width: 8%;
        }

        .mutasi-table th:nth-child(9),
        .mutasi-table td:nth-child(9) {
            width: 12%;
        }


        /* =========================================================
                           TABLE CONTENT
                        ========================================================= */

        .mutasi-table strong {
            color: #173d66;
            font-weight: 700;
        }

        .ref-number {
            color: #0878c8;
            font-weight: 700;
        }

        .warehouse-flow {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .warehouse-flow strong {
            font-size: 10px;
            text-align: center;
        }

        .flow-arrow {
            color: #0878c8;
            font-size: 17px;
            font-weight: 700;
        }

        .officer-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .officer-info strong {
            font-size: 10px;
        }

        .officer-info small {
            color: #8193a7;
            font-size: 9px;
            line-height: 1.35;
        }

        .material-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .material-code {
            color: #0878c8;
            font-size: 9px;
            font-weight: 700;
        }

        .material-info strong {
            font-size: 10px;
            line-height: 1.4;
        }

        .quantity {
            color: #0878c8 !important;
            font-size: 14px;
        }

        .unit {
            margin-left: 3px;
            color: #7c90a6;
            font-size: 9px;
        }

        .date {
            color: #657d97;
            font-size: 9px;
            white-space: nowrap;
        }

        .sync-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            background: #e8f9f2;
            border: 1px solid #c4efdf;
            color: #159d70;

            border-radius: 20px;
            padding: 4px 8px;

            font-size: 8px;
            font-weight: 700;
            white-space: nowrap;
        }

        .sync-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #18b47e;
        }

        .detail-button {
            border: none;
            background: transparent;
            color: #47637f;

            display: inline-flex;
            align-items: center;
            gap: 6px;

            font-family: inherit;
            font-size: 10px;
            font-weight: 600;

            cursor: pointer;
            white-space: nowrap;
        }

        .detail-button svg {
            width: 15px;
            height: 15px;
        }

        .detail-button:hover {
            color: #0878c8;
        }


        /* =========================================================
                           TABLET
                        ========================================================= */

        @media (max-width: 1200px) {

            .mutasi-header {
                flex-direction: column;
            }

            .header-actions {
                width: 100%;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-card {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                max-width: none;
                width: 100%;
            }

            .filter-actions {
                justify-content: flex-end;
            }
        }


        /* =========================================================
                           MOBILE
                        ========================================================= */

        @media (max-width: 768px) {

            .mutasi-page {
                width: 100%;
                max-width: 100%;
            }

            .mutasi-header {
                gap: 16px;
                margin-bottom: 18px;
            }

            .header-actions {
                width: 100%;
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .btn {
                width: 100%;
                padding: 0 8px;
                font-size: 10px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 14px;
                min-height: 125px;
            }

            .stat-value {
                font-size: 21px;
            }

            .filter-actions {
                display: grid;
                grid-template-columns: 1fr 1fr;
                width: 100%;
            }

            .warehouse-filter,
            .btn-print {
                width: 100%;
            }

            .table-card {
                border-radius: 10px;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            .mutasi-table {
                min-width: 1100px;
            }
        }


        /* =========================================================
                           MOBILE KECIL
                        ========================================================= */

        @media (max-width: 480px) {

            .header-actions {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stat-card {
                padding: 13px 11px;
            }

            .stat-top>span {
                font-size: 9px;
            }

            .stat-value {
                font-size: 20px;
            }

            .stat-card p {
                font-size: 9px;
            }

            .filter-actions {
                grid-template-columns: 1fr;
            }

            .filter-card {
                padding: 12px;
            }

        }


        /* =========================================================
                           VERY SMALL PHONE
                        ========================================================= */

        @media (max-width: 360px) {

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                min-height: auto;
            }
        }
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const searchInput = document.getElementById('searchMutasi');
            const tableBody = document.getElementById('mutasiTableBody');

            if (!searchInput || !tableBody) {
                return;
            }

            searchInput.addEventListener('input', function() {

                const keyword = this.value.toLowerCase().trim();
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach(function(row) {

                    const text = row.textContent.toLowerCase();

                    if (text.includes(keyword)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }

                });

            });

        });
    </script>

@endsection
