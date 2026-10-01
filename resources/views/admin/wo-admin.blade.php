@extends('layouts.app-admin')

@section('title', 'Pengeluaran Barang')

@section('page-title', 'Pengeluaran Barang')
@section('page-subtitle', 'Pencatatan barang keluar untuk kebutuhan Work Order')

@section('content')

    <style>
        /* =========================================================
                                                           PENGELUARAN BARANG - ADMIN GUDANG
                                                           ========================================================= */

        .pengeluaran-page {
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
        }

        /* =========================
                                                           HEADER
                                                           ========================= */

        .pengeluaran-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 24px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .btn-primary {
            border: none;
            border-radius: 9px;
            height: 34px;
            padding: 0 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-family: inherit;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
            text-decoration: none;
        }

        .btn-primary {
            background: #0758bd;
            color: #ffff;
            border: 1px solid #155eef;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            filter: brightness(.96);
        }

        .btn-primary svg {
            width: 17px;
            height: 17px;
        }

        /* =========================
                                                           SUMMARY CARDS
                                                           ========================= */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }

        .summary-card {
            background: #fff;
            border: 1px solid #e1e9f2;
            border-radius: 14px;
            padding: 19px 20px;
            min-height: 112px;
            box-shadow: 0 3px 12px rgba(24, 67, 110, .05);
            position: relative;
            overflow: hidden;
        }

        .summary-card::after {
            content: "";
            position: absolute;
            width: 70px;
            height: 70px;
            right: -27px;
            bottom: -30px;
            border-radius: 50%;
            background: #f1f8ff;
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .summary-label {
            color: #7890ae;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .2px;
        }

        .summary-small-icon {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: #e8f4ff;
            color: #0786d1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .summary-small-icon svg {
            width: 17px;
            height: 17px;
        }

        .summary-value {
            margin-top: 10px;
            color: #172b4d;
            font-size: 25px;
            font-weight: 700;
            line-height: 1.1;
        }

        .summary-description {
            margin-top: 6px;
            color: #7890ae;
            font-size: 11px;
        }

        .summary-card.blue .summary-small-icon {
            background: #e4f3ff;
            color: #0786d1;
        }

        .summary-card.green .summary-small-icon {
            background: #e0faf2;
            color: #0cb98a;
        }

        .summary-card.orange .summary-small-icon {
            background: #fff3dc;
            color: #e89b00;
        }

        /* =========================
                                                           FILTER
                                                           ========================= */

        .filter-card {
            background: #fff;
            border: 1px solid #e1e9f2;
            border-radius: 14px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 3px 12px rgba(24, 67, 110, .04);
        }

        .filter-row {
            display: grid;
            grid-template-columns: minmax(250px, 1fr) 190px auto;
            gap: 10px;
            align-items: center;
        }

        .search-box {
            height: 42px;
            border: 1px solid #d7e2ee;
            border-radius: 9px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            padding: 0 13px;
        }

        .search-box svg {
            width: 17px;
            height: 17px;
            color: #7890ae;
            flex-shrink: 0;
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            padding-left: 9px;
            font-family: inherit;
            font-size: 12px;
            color: #172b4d;
        }

        .search-box input::placeholder {
            color: #9aabc0;
        }

        .filter-select {
            height: 42px;
            border: 1px solid #d7e2ee;
            border-radius: 9px;
            background: #f8fafc;
            color: #526b87;
            padding: 0 12px;
            font-family: inherit;
            font-size: 12px;
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
            width: 16px;
            height: 16px;
        }

        /* =========================
                                                           TABLE
                                                           ========================= */

        .table-card {
            background: #fff;
            border: 1px solid #e1e9f2;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(24, 67, 110, .05);
        }

        .table-header {
            padding: 18px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #edf1f6;
        }

        .table-header h3 {
            margin: 0;
            font-size: 15px;
            color: #172b4d;
            font-weight: 700;
        }

        .table-header span {
            font-size: 11px;
            color: #7890ae;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            scrollbar-width: thin;
        }

        .pengeluaran-table {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
        }

        .pengeluaran-table th {
            background: #f5f8fc;
            color: #667d98;
            font-size: 11px;
            font-weight: 700;
            text-align: left;
            padding: 14px 13px;
            border-bottom: 1px solid #e4ebf3;
            white-space: nowrap;
        }

        .pengeluaran-table td {
            padding: 15px 13px;
            border-bottom: 1px solid #edf1f5;
            color: #334f70;
            font-size: 12px;
            vertical-align: middle;
        }

        .pengeluaran-table tbody tr:hover {
            background: #f9fbfd;
        }

        .pengeluaran-table tbody tr:last-child td {
            border-bottom: none;
        }

        .wo-number {
            color: #0874c9;
            font-weight: 700;
            line-height: 1.4;
        }

        .transaction-number {
            color: #172b4d;
            font-weight: 600;
        }

        .material-name {
            color: #172b4d;
            font-weight: 600;
            line-height: 1.4;
        }

        .secondary-text {
            display: block;
            margin-top: 3px;
            color: #8ba0b8;
            font-size: 10px;
        }

        .quantity {
            font-weight: 700;
            color: #172b4d;
        }

        .rack-badge {
            color: #0874c9;
            font-size: 10px;
            font-weight: 600;
        }

        .sync-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 9px;
            border-radius: 20px;
            background: #e5faf2;
            color: #09986f;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .sync-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #0cb98a;
        }

        .action-link {
            border: none;
            background: #eef5ff;
            color: #1263cf;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.2s ease;
            padding: 7px 12px;
            border-radius: 8px;
        }

        .action-link:hover {
            background: #dcecff;

            color: #0758bd;
        }

        /* =========================
                                                           PAGINATION
                                                           ========================= */

        .table-footer {
            padding: 15px 20px;
            border-top: 1px solid #edf1f6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .table-info {
            color: #879ab0;
            font-size: 11px;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .page-btn {
            width: 31px;
            height: 31px;
            border-radius: 7px;
            border: 1px solid #dbe5ef;
            background: #fff;
            color: #526b87;
            font-family: inherit;
            font-size: 11px;
            cursor: pointer;
        }

        .page-btn.active {
            background: #0874c9;
            border-color: #0874c9;
            color: #fff;
        }

        .page-btn:hover:not(.active) {
            background: #f3f8fd;
        }

        /* =========================================================
                                                           RESPONSIVE
                                                           ========================================================= */

        @media (max-width: 1200px) {

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .filter-row {
                grid-template-columns: 1fr 180px auto;
            }
        }

        @media (max-width: 768px) {

            .pengeluaran-header {
                flex-direction: column;
                gap: 15px;
            }

            .header-actions {
                width: 100%;
            }

            .header-actions button {
                flex: 1;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .summary-card {
                padding: 15px;
                min-height: 105px;
            }

            .summary-value {
                font-size: 21px;
            }

            .filter-row {
                grid-template-columns: 1fr;
            }

            .filter-select,
            .btn-print {
                width: 100%;
            }

            .table-header {
                padding: 15px;
            }

            .table-footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 520px) {

            .header-actions {
                flex-direction: column;
            }

            .header-actions button {
                width: 100%;
            }

            .summary-grid {
                grid-template-columns: 1fr 1fr;
                gap: 9px;
            }

            .summary-card {
                padding: 13px;
            }

            .summary-label {
                font-size: 10px;
            }

            .summary-value {
                font-size: 19px;
            }

            .summary-description {
                font-size: 9px;
            }

            .table-header h3 {
                font-size: 13px;
            }

            .table-header span {
                display: none;
            }
        }
    </style>


    <div class="pengeluaran-page">

        {{-- =========================
         HEADER
    ========================== --}}
        <div class="pengeluaran-header">

            <div class="header-actions">

                <button type="button" class="btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                    Pengeluaran Barang Baru
                </button>

            </div>

        </div>


        {{-- =========================
         SUMMARY
    ========================== --}}
        <div class="summary-grid">

            <div class="summary-card blue">

                <div class="summary-top">
                    <span class="summary-label">Total Pengeluaran</span>

                    <div class="summary-small-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17 17 7"></path>
                            <path d="M7 7h10v10"></path>
                        </svg>
                    </div>
                </div>

                <div class="summary-value">3</div>

                <div class="summary-description">
                    transaksi WO
                </div>

            </div>


            <div class="summary-card orange">

                <div class="summary-top">
                    <span class="summary-label">WO Terlayani</span>

                    <div class="summary-small-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.7 6.3a4 4 0 0 0 5 5L13 18l-3-3 6.7-6.7a4 4 0 0 0-2-2z"></path>
                            <path d="M5 19l-2 2"></path>
                        </svg>
                    </div>
                </div>

                <div class="summary-value">3</div>

                <div class="summary-description">
                    paket WO aktif
                </div>

            </div>


            <div class="summary-card green">

                <div class="summary-top">
                    <span class="summary-label">Nilai Part Keluar</span>

                    <div class="summary-small-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3v18"></path>
                            <path d="M17 7H9.5a3.5 3.5 0 1 0 0 7H14a3.5 3.5 0 1 1 0 7H7"></path>
                        </svg>
                    </div>
                </div>

                <div class="summary-value">Rp 23,98 Jt</div>

                <div class="summary-description">
                    estimasi nilai material keluar
                </div>

            </div>


            <div class="summary-card blue">

                <div class="summary-top">
                    <span class="summary-label">Sinkronisasi Maximo</span>

                    <div class="summary-small-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 11a8.1 8.1 0 0 0-14.9-4"></path>
                            <path d="M4 4v4h4"></path>
                            <path d="M4 13a8.1 8.1 0 0 0 14.9 4"></path>
                            <path d="M20 20v-4h-4"></path>
                        </svg>
                    </div>
                </div>

                <div class="summary-value">100%</div>

                <div class="summary-description">
                    MIF connected
                </div>

            </div>

        </div>


        {{-- =========================
         FILTER
    ========================== --}}
        <div class="filter-card">

            <div class="filter-row">

                <div class="search-box">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m20 20-4-4"></path>
                    </svg>

                    <input type="text" placeholder="Cari No TRX, No WO Maximo, Teknisi, Item Part, Lokasi...">

                </div>


                <select class="filter-select">
                    <option>Semua Unit Pembangkit</option>
                    <option>Unit Surabaya</option>
                    <option>Unit Gresik</option>
                    <option>Unit Paiton</option>
                </select>


                <button type="button" class="btn-print">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M6 9V3h12v6"></path>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <path d="M6 14h12v7H6z"></path>
                    </svg>

                    Cetak Rekap Pengeluaran

                </button>

            </div>

        </div>


        {{-- =========================
         TABLE
    ========================== --}}
        <div class="table-card">

            <div class="table-header">

                <h3>Data Pengeluaran Barang</h3>

                <span>Data pengeluaran suku cadang berdasarkan Work Order</span>

            </div>


            <div class="table-wrapper">

                <table class="pengeluaran-table">

                    <thead>
                        <tr>
                            <th>No. Pengeluaran</th>
                            <th>Nomor Work Order (WO)</th>
                            <th>Unit & Lokasi Kerja</th>
                            <th>Teknisi / Pemohon</th>
                            <th>Material Spare Part</th>
                            <th>Jumlah Keluar</th>
                            <th>Rak Pengambilan</th>
                            <th>Tanggal & Jam</th>
                            <th>Sync Maximo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>

                        {{-- DATA 1 --}}
                        <tr>

                            <td>
                                <span class="transaction-number">
                                    TRX-2026-0810
                                </span>
                            </td>

                            <td>
                                <span class="wo-number">
                                    WO-MAX-2026-19401
                                </span>
                            </td>

                            <td>
                                Boiler Unit 1 - Main Steam Valve Line
                            </td>

                            <td>
                                <span class="material-name">
                                    Hendra Wijaya
                                </span>

                                <span class="secondary-text">
                                    Operator
                                </span>
                            </td>

                            <td>
                                <span class="material-name">
                                    Spiral Wound Gasket
                                </span>

                                <span class="secondary-text">
                                    4 Inch 300# ANSI B16.20
                                </span>
                            </td>

                            <td>
                                <span class="quantity">
                                    4 PCS
                                </span>
                            </td>

                            <td>
                                <span class="rack-badge">
                                    RAK-D-04-01
                                </span>
                            </td>

                            <td>
                                14 Sep 2026
                                <span class="secondary-text">
                                    08:15
                                </span>
                            </td>

                            <td>
                                <span class="sync-badge">
                                    <span class="sync-dot"></span>
                                    MIF SYNCED
                                </span>
                            </td>

                            <td>
                                <button class="action-link">
                                    Detail & Cetak
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 2 --}}
                        <tr>

                            <td>
                                <span class="transaction-number">
                                    TRX-2026-0809
                                </span>
                            </td>

                            <td>
                                <span class="wo-number">
                                    WO-MAX-2026-19387
                                </span>
                            </td>

                            <td>
                                Turbine Unit 2 - Cooling System
                            </td>

                            <td>
                                <span class="material-name">
                                    Ahmad Fauzan
                                </span>

                                <span class="secondary-text">
                                    Teknisi
                                </span>
                            </td>

                            <td>
                                <span class="material-name">
                                    Bearing SKF
                                </span>

                                <span class="secondary-text">
                                    6205-2RS
                                </span>
                            </td>

                            <td>
                                <span class="quantity">
                                    2 PCS
                                </span>
                            </td>

                            <td>
                                <span class="rack-badge">
                                    RAK-B-02-03
                                </span>
                            </td>

                            <td>
                                13 Sep 2026
                                <span class="secondary-text">
                                    13:42
                                </span>
                            </td>

                            <td>
                                <span class="sync-badge">
                                    <span class="sync-dot"></span>
                                    MIF SYNCED
                                </span>
                            </td>

                            <td>
                                <button class="action-link">
                                    Detail & Cetak
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 3 --}}
                        <tr>

                            <td>
                                <span class="transaction-number">
                                    TRX-2026-0808
                                </span>
                            </td>

                            <td>
                                <span class="wo-number">
                                    WO-MAX-2026-19321
                                </span>
                            </td>

                            <td>
                                Generator Unit 1 - Lubrication System
                            </td>

                            <td>
                                <span class="material-name">
                                    Rizky Pratama
                                </span>

                                <span class="secondary-text">
                                    Teknisi
                                </span>
                            </td>

                            <td>
                                <span class="material-name">
                                    Oil Filter
                                </span>

                                <span class="secondary-text">
                                    Industrial Filter
                                </span>
                            </td>

                            <td>
                                <span class="quantity">
                                    3 PCS
                                </span>
                            </td>

                            <td>
                                <span class="rack-badge">
                                    RAK-C-01-02
                                </span>
                            </td>

                            <td>
                                12 Sep 2026
                                <span class="secondary-text">
                                    09:27
                                </span>
                            </td>

                            <td>
                                <span class="sync-badge">
                                    <span class="sync-dot"></span>
                                    MIF SYNCED
                                </span>
                            </td>

                            <td>
                                <button class="action-link">
                                    Detail & Cetak
                                </button>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            {{-- FOOTER TABLE --}}
            <div class="table-footer">

                <div class="table-info">
                    Menampilkan 1–3 dari 3 transaksi pengeluaran
                </div>

                <div class="pagination">

                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>

                </div>

            </div>

        </div>

    </div>

@endsection
