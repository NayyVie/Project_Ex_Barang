@extends('layouts.app-admin')

@section('title', 'Riwayat Transaksi')

@section('page-title', 'Riwayat Transaksi')

@section('page-subtitle', 'Pencatatan real-time penerimaan PO, pengeluaran WO, dan transfer terintegrasi IBM Maximo')

@section('content')

    <style>
        /* =========================================================
               RIWAYAT TRANSAKSI ADMIN
               Warna utama: putih + biru
            ========================================================= */

        .transaction-page {
            width: 100%;
            max-width: 100%;
            color: #17345f;
        }

        /* =========================
               HEADER
            ========================= */

        .transaction-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 18px;
        }

        .transaction-header-left {
            min-width: 0;
        }

        .transaction-title {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #17345f;
        }

        .transaction-subtitle {
            margin: 5px 0 0;
            font-size: 12px;
            color: #8293aa;
        }

        .transaction-header-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .btn-scan {
            border: none;
            border-radius: 7px;
            padding: 9px 13px;
            background: #0b9bd7;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: .2s ease;
        }

        .btn-scan:hover {
            background: #078bc2;
        }

        .btn-new-transaction {
            border: none;
            border-radius: 7px;
            padding: 9px 13px;
            background: #1559d6;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: .2s ease;
        }

        .btn-new-transaction:hover {
            background: #104dbb;
        }

        /* =========================
               FILTER / TAB AREA
            ========================= */

        .transaction-filter {
            background: #ffffff;
            border: 1px solid #dce5ef;
            border-radius: 9px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 18px;
            box-shadow: 0 2px 7px rgba(25, 65, 110, .04);
        }

        .transaction-tabs {
            display: flex;
            align-items: center;
            gap: 5px;
            min-width: 0;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .transaction-tabs::-webkit-scrollbar {
            display: none;
        }

        .transaction-tab {
            border: none;
            background: transparent;
            border-radius: 6px;
            padding: 9px 12px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
            cursor: pointer;
            color: #6f8198;
            transition: .2s ease;
        }

        .transaction-tab:hover {
            background: #f1f6fc;
            color: #1559d6;
        }

        .transaction-tab.active {
            background: #e8f1fb;
            color: #17345f;
        }

        .transaction-tab.receipt {
            color: #16a77a;
        }

        .transaction-tab.issue {
            color: #1689d4;
        }

        .transaction-tab.mutation {
            color: #7d45cf;
        }

        .transaction-filter-right {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-shrink: 0;
        }

        .transaction-search {
            position: relative;
            width: 220px;
        }

        .transaction-search input {
            width: 100%;
            height: 35px;
            border: 1px solid #d9e3ef;
            background: #f7faff;
            border-radius: 7px;
            outline: none;
            padding: 0 11px 0 32px;
            color: #17345f;
            font-size: 10px;
            box-sizing: border-box;
        }

        .transaction-search input::placeholder {
            color: #91a0b4;
        }

        .transaction-search input:focus {
            border-color: #3c8edc;
            background: #fff;
        }

        .transaction-search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #7890a9;
            font-size: 13px;
            pointer-events: none;
        }

        .transaction-status {
            height: 35px;
            border: 1px solid #d9e3ef;
            background: #f7faff;
            color: #536b86;
            border-radius: 7px;
            padding: 0 10px;
            font-size: 10px;
            font-weight: 600;
            outline: none;
            cursor: pointer;
        }

        /* =========================
               TABLE
            ========================= */

        .transaction-table-card {
            background: #ffffff;
            border: 1px solid #dce5ef;
            border-radius: 9px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(25, 65, 110, .04);
        }

        .transaction-table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .transaction-table {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .transaction-table thead {
            background: #f4f7fb;
        }

        .transaction-table th {
            padding: 13px 10px;
            text-align: left;
            color: #5e7188;
            font-size: 10px;
            font-weight: 700;
            border-bottom: 1px solid #e1e8f0;
            vertical-align: middle;
        }

        .transaction-table td {
            padding: 14px 10px;
            color: #4d6078;
            font-size: 10px;
            font-weight: 500;
            border-bottom: 1px solid #edf1f5;
            vertical-align: middle;
        }

        .transaction-table tbody tr:last-child td {
            border-bottom: none;
        }

        .transaction-table tbody tr:hover {
            background: #f9fbfd;
        }

        /* Column widths */

        .col-no {
            width: 75px;
        }

        .col-type {
            width: 105px;
        }

        .col-ref {
            width: 100px;
        }

        .col-item {
            width: 220px;
        }

        .col-location {
            width: 210px;
        }

        .col-recipient {
            width: 145px;
        }

        .col-status {
            width: 90px;
        }

        .col-action {
            width: 75px;
        }

        /* =========================
               TRANSACTION NUMBER
            ========================= */

        .transaction-number {
            color: #203c64;
            font-weight: 700;
            line-height: 1.35;
        }

        .transaction-date {
            margin-top: 3px;
            color: #93a2b5;
            font-size: 8px;
            line-height: 1.3;
        }

        /* =========================
               TYPE BADGE
            ========================= */

        .transaction-type {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            padding: 5px 8px;
            font-size: 8px;
            font-weight: 700;
            white-space: nowrap;
        }

        .type-receipt {
            background: #dff7ed;
            color: #11946c;
        }

        .type-issue {
            background: #dceefe;
            color: #1674bd;
        }

        .type-mutation {
            background: #f0ddff;
            color: #7739b8;
        }

        /* =========================
               REF
            ========================= */

        .transaction-ref {
            color: #1572ce;
            font-size: 9px;
            font-weight: 700;
            line-height: 1.35;
        }

        /* =========================
               ITEM
            ========================= */

        .item-name {
            color: #344e6f;
            font-weight: 600;
            line-height: 1.4;
        }

        .item-code {
            margin-top: 3px;
            color: #94a2b3;
            font-size: 8px;
        }

        /* =========================
               LOCATION
            ========================= */

        .location-main {
            color: #4b6078;
            line-height: 1.35;
        }

        .location-sub {
            margin-top: 3px;
            color: #8998aa;
            font-size: 8px;
            line-height: 1.35;
        }

        /* =========================
               RECIPIENT
            ========================= */

        .recipient-name {
            color: #40566f;
            font-weight: 600;
            line-height: 1.35;
        }

        .recipient-role {
            margin-top: 3px;
            color: #8998aa;
            font-size: 8px;
        }

        /* =========================
               STATUS
            ========================= */

        .sync-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 7px;
            border-radius: 12px;
            background: #e3f8ef;
            color: #11946c;
            font-size: 7px;
            font-weight: 700;
            white-space: nowrap;
        }

        .sync-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #14ad78;
        }

        /* =========================
               ACTION
            ========================= */

        .transaction-action {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .action-btn {
            border: none;
            background: transparent;
            color: #6f8197;
            cursor: pointer;
            padding: 2px;
            font-size: 12px;
            transition: .2s ease;
        }

        .action-btn:hover {
            color: #1265c4;
        }

        /* =========================
               EMPTY STATE
            ========================= */

        .transaction-empty {
            text-align: center;
            padding: 40px 20px;
            color: #8a9aae;
            font-size: 11px;
        }

        /* =========================================================
               RESPONSIVE
            ========================================================= */

        @media (max-width: 1200px) {

            .transaction-header {
                align-items: flex-start;
            }

            .transaction-filter {
                flex-wrap: wrap;
            }

            .transaction-filter-right {
                width: 100%;
                justify-content: flex-end;
            }

            .transaction-search {
                flex: 1;
                max-width: 300px;
            }
        }

        @media (max-width: 768px) {

            .transaction-header {
                display: block;
            }

            .transaction-header-actions {
                margin-top: 12px;
                width: 100%;
            }

            .btn-scan,
            .btn-new-transaction {
                flex: 1;
                justify-content: center;
            }

            .transaction-filter {
                padding: 8px;
            }

            .transaction-tabs {
                width: 100%;
            }

            .transaction-filter-right {
                width: 100%;
                display: grid;
                grid-template-columns: 1fr auto;
            }

            .transaction-search {
                width: 100%;
                max-width: none;
            }

            .transaction-status {
                width: 100%;
            }

            .transaction-table-card {
                border-radius: 8px;
            }

            .transaction-table-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .transaction-table {
                min-width: 1000px;
            }
        }

        @media (max-width: 520px) {

            .transaction-title {
                font-size: 18px;
            }

            .transaction-subtitle {
                font-size: 10px;
                line-height: 1.4;
            }

            .transaction-header-actions {
                gap: 6px;
            }

            .btn-scan,
            .btn-new-transaction {
                font-size: 9px;
                padding: 9px 8px;
            }

            .transaction-filter-right {
                grid-template-columns: 1fr;
            }

            .transaction-tabs {
                padding-bottom: 2px;
            }

            .transaction-tab {
                padding: 8px 9px;
                font-size: 9px;
            }
        }
    </style>


    <div class="transaction-page">

        <!-- =========================================
                 HEADER
            ========================================== -->

        <div class="transaction-header">

            <div class="transaction-header-left">
                <h1 class="transaction-title">
                    Transaksi Keluar, Masuk & Mutasi Antar Unit
                </h1>

                <p class="transaction-subtitle">
                    Pencatatan real-time penerimaan PO, pengeluaran WO,
                    dan transfer terintegrasi IBM Maximo
                </p>
            </div>

            <div class="transaction-header-actions">

                <button type="button" class="btn-scan">
                    <span>▦</span>
                    Scan Barcode Transaksi
                </button>

                <button type="button" class="btn-new-transaction">
                    <span>＋</span>
                    Buat Transaksi Baru
                </button>

            </div>

        </div>


        <!-- =========================================
                 FILTER
            ========================================== -->

        <div class="transaction-filter">

            <div class="transaction-tabs">

                <button type="button" class="transaction-tab active">
                    Semua Transaksi (8)
                </button>

                <button type="button" class="transaction-tab receipt">
                    ↙ &nbsp; Penerimaan PO (Goods Receipt)
                </button>

                <button type="button" class="transaction-tab issue">
                    ↗ &nbsp; Pengeluaran WO (Goods Issue)
                </button>

                <button type="button" class="transaction-tab mutation">
                    ⇄ &nbsp; Mutasi Antar Unit
                </button>

            </div>


            <div class="transaction-filter-right">

                <div class="transaction-search">

                    <span class="transaction-search-icon">
                        🔍
                    </span>

                    <input type="text" id="transactionSearch" placeholder="Cari No TRX, PO/WO, Item...">

                </div>

                <select class="transaction-status" id="transactionStatus">

                    <option value="all">
                        Semua Status Sync
                    </option>

                    <option value="synced">
                        Synced
                    </option>

                    <option value="pending">
                        Pending
                    </option>

                </select>

            </div>

        </div>


        <!-- =========================================
                 TABLE
            ========================================== -->

        <div class="transaction-table-card">

            <div class="transaction-table-wrapper">

                <table class="transaction-table">

                    <thead>

                        <tr>

                            <th class="col-no">
                                No.<br>
                                Transaksi
                            </th>

                            <th class="col-type">
                                Tipe Transaksi
                            </th>

                            <th class="col-ref">
                                Ref<br>
                                Dokumen<br>
                                (PO / WO)
                            </th>

                            <th class="col-item">
                                Item & Kuantitas
                            </th>

                            <th class="col-location">
                                Asal → Tujuan
                            </th>

                            <th class="col-recipient">
                                Penerima /<br>
                                Vendor
                            </th>

                            <th class="col-status">
                                Status<br>
                                Maximo
                            </th>

                            <th class="col-action">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="transactionTableBody">

                        <!-- =====================================
                                 DATA 1
                            ====================================== -->

                        <tr>

                            <td>

                                <div class="transaction-number">
                                    TRX-2026-0811
                                </div>

                                <div class="transaction-date">
                                    14 Sep 2026,<br>
                                    01:30
                                </div>

                            </td>


                            <td>

                                <span class="transaction-type type-receipt">
                                    Penerimaan PO
                                </span>

                            </td>


                            <td>

                                <div class="transaction-ref">
                                    PO-MAX-2026-8812
                                </div>

                            </td>


                            <td>

                                <div class="item-name">
                                    Mechanical Seal Cartridge Type D-65mm for Boiler...
                                </div>

                                <div class="item-code">
                                    MP-082101 • 2 SET
                                </div>

                            </td>


                            <td>

                                <div class="location-main">
                                    Dari: PT EagleBurgmann Indonesia
                                </div>

                                <div class="location-sub">
                                    Ke: Gudang Utama - RAK-A-01-02
                                </div>

                            </td>


                            <td>

                                <div class="recipient-name">
                                    PT EagleBurgmann Indonesia
                                </div>

                            </td>


                            <td>

                                <span class="sync-status">
                                    <span class="sync-dot"></span>
                                    SYNCED
                                </span>

                            </td>


                            <td>

                                <div class="transaction-action">

                                    <button type="button" class="action-btn" title="Lihat">
                                        ◉
                                    </button>

                                    <button type="button" class="action-btn" title="Detail">
                                        ⧉
                                    </button>

                                </div>

                            </td>

                        </tr>


                        <!-- =====================================
                                 DATA 2
                            ====================================== -->

                        <tr>

                            <td>

                                <div class="transaction-number">
                                    TRX-2026-0810
                                </div>

                                <div class="transaction-date">
                                    13 Sep 2026,<br>
                                    08:15
                                </div>

                            </td>


                            <td>

                                <span class="transaction-type type-issue">
                                    Pengeluaran WO
                                </span>

                            </td>


                            <td>

                                <div class="transaction-ref">
                                    WO-MAX-2026-19401
                                </div>

                            </td>


                            <td>

                                <div class="item-name">
                                    Spiral Wound Gasket 4 Inch 300# ANSI B16.20 SS31...
                                </div>

                                <div class="item-code">
                                    CF-077421 • 4 PCS
                                </div>

                            </td>


                            <td>

                                <div class="location-main">
                                    Dari: Gudang Utama
                                </div>

                                <div class="location-sub">
                                    Ke: Boiler Unit 1 - Main Steam Valve Line
                                </div>

                            </td>


                            <td>

                                <div class="recipient-name">
                                    Hendra Wijaya
                                </div>

                                <div class="recipient-role">
                                    (Spv Mekanik Boiler)
                                </div>

                            </td>


                            <td>

                                <span class="sync-status">
                                    <span class="sync-dot"></span>
                                    SYNCED
                                </span>

                            </td>


                            <td>

                                <div class="transaction-action">

                                    <button type="button" class="action-btn" title="Lihat">
                                        ◉
                                    </button>

                                    <button type="button" class="action-btn" title="Detail">
                                        ⧉
                                    </button>

                                </div>

                            </td>

                        </tr>


                        <!-- =====================================
                                 DATA 3
                            ====================================== -->

                        <tr>

                            <td>

                                <div class="transaction-number">
                                    TRX-2026-0809
                                </div>

                                <div class="transaction-date">
                                    13 Sep 2026,<br>
                                    14:45
                                </div>

                            </td>


                            <td>

                                <span class="transaction-type type-mutation">
                                    Mutasi Unit
                                </span>

                            </td>


                            <td>

                                <div class="transaction-ref">
                                    TRF-UNIT-2026-052
                                </div>

                            </td>


                            <td>

                                <div class="item-name">
                                    Turbine Lube Oil ISO VG 46 Extreme Pressure
                                </div>

                                <div class="item-code">
                                    CF-012903 • 400 LTR
                                </div>

                            </td>


                            <td>

                                <div class="location-main">
                                    Dari: Gudang Sentral B3
                                </div>

                                <div class="location-sub">
                                    Ke: Gudang Satelit PLTU Unit 3-4
                                </div>

                            </td>


                            <td>

                                <div class="recipient-name">
                                    Ahmad Fauzi
                                </div>

                                <div class="recipient-role">
                                    (Logistik Unit 3)
                                </div>

                            </td>


                            <td>

                                <span class="sync-status">
                                    <span class="sync-dot"></span>
                                    SYNCED
                                </span>

                            </td>


                            <td>

                                <div class="transaction-action">

                                    <button type="button" class="action-btn" title="Lihat">
                                        ◉
                                    </button>

                                    <button type="button" class="action-btn" title="Detail">
                                        ⧉
                                    </button>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <script>
        /* =========================================
               SEARCH TRANSAKSI
            ========================================== */

        document.addEventListener('DOMContentLoaded', function() {

            const searchInput =
                document.getElementById('transactionSearch');

            const statusSelect =
                document.getElementById('transactionStatus');

            const tableBody =
                document.getElementById('transactionTableBody');

            function filterTransactions() {

                const keyword =
                    searchInput.value.toLowerCase().trim();

                const status =
                    statusSelect.value;

                const rows =
                    tableBody.querySelectorAll('tr');

                rows.forEach(function(row) {

                    const rowText =
                        row.innerText.toLowerCase();

                    const isSynced =
                        row.querySelector('.sync-status') !== null;

                    let showRow = true;

                    /* SEARCH */

                    if (
                        keyword &&
                        !rowText.includes(keyword)
                    ) {
                        showRow = false;
                    }

                    /* STATUS */

                    if (
                        status === 'synced' &&
                        !isSynced
                    ) {
                        showRow = false;
                    }

                    row.style.display =
                        showRow ? '' : 'none';

                });

            }

            searchInput.addEventListener(
                'input',
                filterTransactions
            );

            statusSelect.addEventListener(
                'change',
                filterTransactions
            );

        });


        /* =========================================
           TAB TRANSAKSI
        ========================================== */

        document.addEventListener('DOMContentLoaded', function() {

            const tabs =
                document.querySelectorAll(
                    '.transaction-tab'
                );

            tabs.forEach(function(tab) {

                tab.addEventListener(
                    'click',
                    function() {

                        tabs.forEach(function(item) {
                            item.classList.remove('active');
                        });

                        this.classList.add('active');

                    }
                );

            });

        });
    </script>

@endsection
