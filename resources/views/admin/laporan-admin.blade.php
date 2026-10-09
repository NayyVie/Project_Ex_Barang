@extends('layouts.app-admin')

@section('title', 'Laporan & BAST')
@section('page-title', 'Laporan & BAST')
@section('page-subtitle', 'Laporan pergudangan dan berita acara rekonsiliasi')

@section('content')

    <style>
        /* =========================================================
                   LAPORAN & BAST
                ========================================================= */

        .report-page {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
        }

        /* =========================
                   HEADER
                ========================= */

        .report-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
        }

        .report-heading {
            min-width: 0;
        }

        .report-heading h3 {
            margin: 0;
            color: #17365d;
            font-size: 23px;
            font-weight: 700;
            line-height: 1.3;
        }

        .report-heading p {
            margin: 6px 0 0;
            color: #7b91ad;
            font-size: 13px;
            line-height: 1.5;
        }

        .report-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .report-btn {
            height: 42px;
            padding: 0 16px;
            border-radius: 9px;
            border: 1px solid #d8e3ef;
            background: #ffffff;
            color: #21466f;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: .2s ease;
        }

        .report-btn:hover {
            background: #f3f8fd;
        }

        .report-btn.primary {
            background: #086bc5;
            border-color: #086bc5;
            color: #ffffff;
        }

        .report-btn.primary:hover {
            background: #075ca9;
        }

        .report-btn svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }


        /* =========================
                   SUMMARY CARD
                ========================= */

        .report-summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .summary-card {
            background: #ffffff;
            border: 1px solid #dce6f0;
            border-radius: 13px;
            padding: 19px 20px;
            min-height: 108px;
            box-shadow: 0 3px 12px rgba(20, 57, 92, .05);
            position: relative;
            overflow: hidden;
        }

        .summary-card::after {
            content: "";
            position: absolute;
            width: 45px;
            height: 45px;
            right: -18px;
            bottom: -18px;
            border-radius: 50%;
            background: rgba(8, 107, 197, .06);
        }

        .summary-label {
            color: #8295ac;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .summary-value {
            color: #17365d;
            font-size: 25px;
            font-weight: 700;
            line-height: 1.2;
        }

        .summary-description {
            color: #8a9bb0;
            font-size: 11px;
            margin-top: 6px;
        }

        .summary-card.match .summary-value {
            color: #0c9b67;
        }

        .summary-card.warning .summary-value {
            color: #e2a400;
        }

        .summary-card.danger .summary-value {
            color: #e24b62;
        }


        /* =========================
                   FILTER
                ========================= */

        .report-filter {
            background: #ffffff;
            border: 1px solid #dce6f0;
            border-radius: 13px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 3px 12px rgba(20, 57, 92, .04);
        }

        .filter-row {
            display: grid;
            grid-template-columns: 1.4fr .75fr .75fr .75fr auto;
            gap: 10px;
            align-items: end;
        }

        .filter-group {
            min-width: 0;
        }

        .filter-group label {
            display: block;
            color: #71869e;
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .filter-control {
            width: 100%;
            height: 40px;
            padding: 0 12px;
            border-radius: 8px;
            border: 1px solid #d6e1ec;
            background: #f8fafc;
            color: #27496e;
            font-family: inherit;
            font-size: 11px;
            outline: none;
        }

        .filter-control:focus {
            border-color: #1685d8;
            background: #ffffff;
        }

        .filter-search {
            position: relative;
        }

        .filter-search svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            color: #8aa0b8;
            pointer-events: none;
        }

        .filter-search input {
            padding-left: 35px;
        }

        .filter-button {
            height: 40px;
            padding: 0 16px;
            border: none;
            border-radius: 8px;
            background: #086bc5;
            color: #ffffff;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        .filter-button:hover {
            background: #075ca9;
        }


        /* =========================
                   REPORT CARD
                ========================= */

        .report-card {
            background: #ffffff;
            border: 1px solid #dce6f0;
            border-radius: 13px;
            box-shadow: 0 3px 12px rgba(20, 57, 92, .05);
            overflow: hidden;
        }

        .report-card-header {
            min-height: 66px;
            padding: 15px 18px;
            border-bottom: 1px solid #e4ebf2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .report-card-title {
            min-width: 0;
        }

        .report-card-title h4 {
            margin: 0;
            color: #17365d;
            font-size: 15px;
            font-weight: 700;
        }

        .report-card-title p {
            margin: 4px 0 0;
            color: #8a9bb0;
            font-size: 10px;
        }

        .report-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            background: #e8f8f1;
            color: #0a9763;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .report-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #0aa36a;
        }


        /* =========================
                   TABLE
                ========================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .report-table {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
        }

        .report-table th {
            background: #f4f7fa;
            color: #637993;
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            padding: 14px 13px;
            border-bottom: 1px solid #dfe7ef;
            white-space: nowrap;
        }

        .report-table td {
            padding: 14px 13px;
            color: #36526f;
            font-size: 10px;
            border-bottom: 1px solid #edf1f5;
            vertical-align: middle;
        }

        .report-table tbody tr:hover {
            background: #f9fbfd;
        }

        .number-cell {
            color: #8093a8;
            font-weight: 600;
            width: 45px;
        }

        .item-code {
            color: #0877cf;
            font-weight: 700;
            white-space: nowrap;
        }

        .item-name {
            color: #254766;
            font-weight: 600;
            line-height: 1.4;
            min-width: 170px;
        }

        .rack-code {
            color: #566f8c;
            font-weight: 500;
            white-space: nowrap;
        }

        .quantity {
            color: #17365d;
            font-weight: 700;
            white-space: nowrap;
        }

        .deviation-zero {
            color: #0b9b67;
            font-weight: 700;
        }

        .deviation-minus {
            color: #e04d62;
            font-weight: 700;
        }

        .deviation-plus {
            color: #d89b00;
            font-weight: 700;
        }

        .currency {
            color: #254766;
            font-weight: 600;
            white-space: nowrap;
        }

        .currency-danger {
            color: #e04d62;
            font-weight: 700;
            white-space: nowrap;
        }


        /* =========================
                   STATUS
                ========================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-match {
            background: #e7f8f0;
            color: #07945e;
        }

        .status-short {
            background: #fff1e8;
            color: #e17b19;
        }

        .status-over {
            background: #fff0df;
            color: #d47c00;
        }


        /* =========================
                   ACTION
                ========================= */

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .table-action {
            width: 30px;
            height: 30px;
            border: 1px solid #dce6ef;
            border-radius: 7px;
            background: #ffffff;
            color: #6c829a;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s ease;
        }

        .table-action:hover {
            color: #0877cf;
            border-color: #a9cde8;
            background: #f2f8fd;
        }

        .table-action.primary {
            background: #0877cf;
            border-color: #0877cf;
            color: #ffffff;
        }

        .table-action svg {
            width: 14px;
            height: 14px;
        }


        /* =========================
                   PAGINATION
                ========================= */

        .report-footer {
            min-height: 60px;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            border-top: 1px solid #edf1f5;
        }

        .report-total {
            color: #8395a9;
            font-size: 10px;
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
            border: 1px solid #dce6ef;
            background: #ffffff;
            color: #627993;
            font-family: inherit;
            font-size: 10px;
            cursor: pointer;
        }

        .page-btn:hover {
            background: #f2f7fb;
        }

        .page-btn.active {
            background: #0877cf;
            border-color: #0877cf;
            color: #ffffff;
            font-weight: 700;
        }


        /* =========================
                   BAST SECTION
                ========================= */

        .bast-section {
            margin-top: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .bast-card {
            background: #ffffff;
            border: 1px solid #dce6f0;
            border-radius: 13px;
            padding: 18px;
            box-shadow: 0 3px 12px rgba(20, 57, 92, .04);
        }

        .bast-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .bast-icon {
            width: 40px;
            height: 40px;
            border-radius: 9px;
            background: #e7f3fd;
            color: #0877cf;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .bast-icon svg {
            width: 20px;
            height: 20px;
        }

        .bast-card-header h4 {
            margin: 0;
            color: #17365d;
            font-size: 14px;
        }

        .bast-card-header p {
            margin: 4px 0 0;
            color: #8799ad;
            font-size: 10px;
        }

        .bast-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 13px;
            margin-bottom: 16px;
        }

        .bast-info-item span {
            display: block;
            color: #8295aa;
            font-size: 9px;
            margin-bottom: 4px;
        }

        .bast-info-item strong {
            color: #31506f;
            font-size: 11px;
        }

        .bast-card-actions {
            display: flex;
            gap: 8px;
        }

        .bast-card-actions button {
            height: 36px;
            padding: 0 13px;
            border-radius: 7px;
            border: 1px solid #d8e3ed;
            background: #ffffff;
            color: #315270;
            font-family: inherit;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
        }

        .bast-card-actions button.primary {
            background: #0877cf;
            color: #ffffff;
            border-color: #0877cf;
        }


        /* =========================================================
                   RESPONSIVE
                ========================================================= */

        @media (max-width: 1200px) {

            .report-summary {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-row {
                grid-template-columns: 1fr 1fr;
            }

            .filter-search {
                grid-column: span 2;
            }

            .filter-button {
                width: 100%;
            }
        }


        /* =========================================================
           MOBILE RESPONSIVE - LAPORAN & BAST
           Tidak mengubah desain desktop
        ========================================================= */

        @media (max-width: 768px) {

            /* Mencegah halaman melebar ke kanan */
            .report-page {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                overflow-x: hidden;
            }

            /* HEADER */
            .report-header {
                width: 100%;
                box-sizing: border-box;
                margin-top: 8px;
                align-items: flex-start;
                flex-direction: column;
            }

            .report-heading {
                width: 100%;
                min-width: 0;
            }

            .report-heading h3 {
                max-width: 100%;
                word-break: normal;
                overflow-wrap: break-word;
            }

            .report-heading p {
                max-width: 100%;
                overflow-wrap: break-word;
            }

            /* Tombol header tetap dua kolom */
            .report-actions {
                width: 100%;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .report-btn {
                width: 100%;
                min-width: 0;
                padding: 0 8px;
                white-space: nowrap;
            }


            /* =====================================================
               SUMMARY CARD
            ===================================================== */

            .report-summary {
                width: 100%;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .summary-card {
                width: 100%;
                min-width: 0;
                box-sizing: border-box;
                overflow: hidden;
            }

            .summary-label,
            .summary-value,
            .summary-description {
                max-width: 100%;
                overflow-wrap: break-word;
            }


            /* =====================================================
               FILTER
            ===================================================== */

            .report-filter {
                width: 100%;
                box-sizing: border-box;
                overflow: hidden;
            }

            .filter-row {
                width: 100%;
                display: grid;
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .filter-group {
                width: 100%;
                min-width: 0;
            }

            .filter-control {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
            }

            .filter-search {
                width: 100%;
                grid-column: auto;
            }

            .filter-search input {
                width: 100%;
                box-sizing: border-box;
            }

            .filter-button {
                width: 100%;
                box-sizing: border-box;
            }


            /* =====================================================
               REPORT CARD
            ===================================================== */

            .report-card {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                overflow: hidden;
            }

            .report-card-header {
                width: 100%;
                box-sizing: border-box;
            }

            .report-card-title {
                width: 100%;
                min-width: 0;
            }

            .report-card-title h4 {
                line-height: 1.4;
                overflow-wrap: break-word;
            }

            .report-card-title p {
                line-height: 1.5;
                overflow-wrap: break-word;
            }

            .report-status {
                max-width: 100%;
                box-sizing: border-box;
            }


            /* =====================================================
               TABLE
            ===================================================== */

            .table-wrapper {
                width: 100%;
                max-width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
                box-sizing: border-box;
            }

            .report-table {
                min-width: 1050px;
                width: 1050px;
                table-layout: auto;
            }

            /*
               Tabel tetap menggunakan desain desktop,
               tetapi hanya tabelnya yang bisa digeser horizontal.
            */
            .report-table th,
            .report-table td {
                white-space: nowrap;
            }

            .report-table .item-name {
                white-space: normal;
                min-width: 170px;
                max-width: 230px;
            }


            /* =====================================================
               FOOTER TABLE
            ===================================================== */

            .report-footer {
                width: 100%;
                box-sizing: border-box;
                gap: 12px;
            }

            .report-total {
                width: 100%;
            }

            .pagination {
                width: 100%;
                display: flex;
                justify-content: flex-end;
                flex-wrap: wrap;
            }


            /* =====================================================
               BAST
            ===================================================== */

            .bast-section {
                width: 100%;
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .bast-card {
                width: 100%;
                box-sizing: border-box;
                min-width: 0;
            }

            .bast-info {
                width: 100%;
                grid-template-columns: 1fr;
            }

            .bast-info-item {
                min-width: 0;
            }

            .bast-info-item strong {
                overflow-wrap: break-word;
            }

            .bast-card-actions {
                width: 100%;
            }

            .bast-card-actions button {
                min-width: 0;
            }
        }


        /* =========================================================
           HP KECIL
        ========================================================= */

        @media (max-width: 520px) {

            /* Memberikan sedikit jarak dari topbar mobile */
            .report-page {
                margin-top: 6px;
            }

            /* Header */
            .report-heading h3 {
                font-size: 19px;
                line-height: 1.35;
            }

            .report-heading p {
                font-size: 11px;
                line-height: 1.5;
            }


            /* Tombol */
            .report-actions {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .report-btn {
                height: 40px;
                font-size: 10px;
                padding: 0 7px;
                gap: 5px;
            }

            .report-btn svg {
                width: 14px;
                height: 14px;
            }


            /* Summary */
            .report-summary {
                grid-template-columns: 1fr 1fr;
                gap: 9px;
            }

            .summary-card {
                padding: 13px;
                min-height: 100px;
            }

            .summary-label {
                font-size: 9px;
                line-height: 1.35;
            }

            .summary-value {
                font-size: 18px;
                line-height: 1.25;
            }

            .summary-description {
                font-size: 9px;
                line-height: 1.4;
            }


            /* Filter */
            .report-filter {
                padding: 14px;
            }

            .filter-row {
                gap: 11px;
            }

            .filter-control {
                height: 44px;
                font-size: 11px;
            }

            .filter-button {
                height: 44px;
            }


            /* Report card */
            .report-card-header {
                padding: 14px;
                gap: 12px;
            }

            .report-card-title h4 {
                font-size: 14px;
            }

            .report-card-title p {
                font-size: 10px;
            }

            .report-status {
                font-size: 9px;
                padding: 6px 9px;
            }


            /* Table */
            .table-wrapper {
                overflow-x: auto;
                width: 100%;
            }

            .report-table {
                min-width: 1050px;
            }


            /* Footer */
            .report-footer {
                padding: 12px 14px;
            }

            .pagination {
                justify-content: flex-start;
            }


            /* BAST */
            .bast-card {
                padding: 15px;
            }

            .bast-info {
                grid-template-columns: 1fr;
                gap: 11px;
            }

            .bast-card-actions {
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .bast-card-actions button {
                width: 100%;
                padding: 0 8px;
                font-size: 9px;
            }
        }
    </style>


    <div class="report-page">

        <!-- HEADER -->
        <div class="report-header">

            <div class="report-heading">
                <h3>Laporan Pergudangan &amp; BAST</h3>
                <p>
                    Cetak laporan rekonsiliasi stok, kartu stok, dan Berita Acara Serah Terima
                </p>
            </div>

            <div class="report-actions">

                <button type="button" class="report-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2h9l5 5v15H6z" />
                        <path d="M14 2v6h6" />
                        <path d="M9 13h6" />
                        <path d="M9 17h6" />
                    </svg>
                    Preview Laporan
                </button>

                <button type="button" class="report-btn primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 3v12" />
                        <path d="m7 10 5 5 5-5" />
                        <path d="M5 21h14" />
                    </svg>
                    Cetak Laporan
                </button>

            </div>

        </div>


        <!-- SUMMARY -->
        <div class="report-summary">

            <div class="summary-card">
                <div class="summary-label">TOTAL MATERIAL DIPANTAU</div>
                <div class="summary-value">10 Item</div>
                <div class="summary-description">
                    Data material yang telah direkonsiliasi
                </div>
            </div>

            <div class="summary-card match">
                <div class="summary-label">MATERIAL SESUAI</div>
                <div class="summary-value">7 Item</div>
                <div class="summary-description">
                    Kondisi fisik sesuai dengan data Maximo
                </div>
            </div>

            <div class="summary-card warning">
                <div class="summary-label">MATERIAL BERSELISIH</div>
                <div class="summary-value">3 Item</div>
                <div class="summary-description">
                    Membutuhkan verifikasi dan rekonsiliasi
                </div>
            </div>

            <div class="summary-card danger">
                <div class="summary-label">TOTAL DEVIASI</div>
                <div class="summary-value">Rp 17,6 Jt</div>
                <div class="summary-description">
                    Nilai estimasi material berselisih
                </div>
            </div>

        </div>


        <!-- FILTER -->
        <div class="report-filter">

            <div class="filter-row">

                <div class="filter-group filter-search">

                    <label>Cari Material</label>

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7" />
                        <path d="m20 20-4-4" />
                    </svg>

                    <input type="text" class="filter-control" placeholder="Cari Item Number, deskripsi material, rak...">

                </div>


                <div class="filter-group">

                    <label>Periode</label>

                    <select class="filter-control">
                        <option>September 2026</option>
                        <option>Agustus 2026</option>
                        <option>Juli 2026</option>
                        <option>Juni 2026</option>
                    </select>

                </div>


                <div class="filter-group">

                    <label>Status</label>

                    <select class="filter-control">
                        <option>Semua Status</option>
                        <option>Match</option>
                        <option>Discrepancy Short</option>
                        <option>Discrepancy Over</option>
                    </select>

                </div>


                <div class="filter-group">

                    <label>Unit</label>

                    <select class="filter-control">
                        <option>Semua Unit</option>
                        <option>PLN Surabaya Unit</option>
                        <option>PLTU Unit 1</option>
                        <option>PLTU Unit 2</option>
                    </select>

                </div>


                <button type="button" class="filter-button">
                    Terapkan
                </button>

            </div>

        </div>


        <!-- REPORT TABLE -->
        <div class="report-card">

            <div class="report-card-header">

                <div class="report-card-title">

                    <h4>Rekonsiliasi Stok Fisik vs Data Sistem</h4>

                    <p>
                        Hasil pencocokan material fisik dengan data inventaris IBM Maximo
                    </p>

                </div>

                <div class="report-status">
                    <span class="report-status-dot"></span>
                    Data Terakhir Diperbarui
                </div>

            </div>


            <div class="table-wrapper">

                <table class="report-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item Number</th>
                            <th>Deskripsi Material</th>
                            <th>Rak Bin</th>
                            <th>Fisik</th>
                            <th>Maximo</th>
                            <th>Selisih</th>
                            <th>Harga Satuan</th>
                            <th>Deviasi (IDR)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>

                            <td class="number-cell">1</td>

                            <td>
                                <span class="item-code">
                                    MP-081201
                                </span>
                            </td>

                            <td>
                                <div class="item-name">
                                    Mechanical Seal Cartridge Type D-65mm
                                    for Boiler Feed Pump
                                </div>
                            </td>

                            <td>
                                <span class="rack-code">
                                    RAK-A-01-02
                                </span>
                            </td>

                            <td class="quantity">6</td>

                            <td>6</td>

                            <td class="deviation-zero">
                                0 SET
                            </td>

                            <td class="currency">
                                Rp 18.500.000
                            </td>

                            <td class="currency">
                                Rp 0
                            </td>

                            <td>
                                <span class="status-badge status-match">
                                    MATCH
                                </span>
                            </td>

                            <td>
                                <div class="action-group">

                                    <button class="table-action" title="Lihat detail">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z" />
                                            <circle cx="12" cy="12" r="2.5" />
                                        </svg>
                                    </button>

                                    <button class="table-action primary" title="BAST">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M6 2h9l5 5v15H6z" />
                                            <path d="M14 2v6h6" />
                                            <path d="M9 13h6" />
                                            <path d="M9 17h4" />
                                        </svg>
                                    </button>

                                </div>
                            </td>

                        </tr>


                        <tr>

                            <td class="number-cell">2</td>

                            <td>
                                <span class="item-code">
                                    EP-042219
                                </span>
                            </td>

                            <td>
                                <div class="item-name">
                                    Circuit Breaker Vacuum 6.6kV
                                    1250A 25kA Drawout
                                </div>
                            </td>

                            <td>
                                <span class="rack-code">
                                    RAK-B-03-01
                                </span>
                            </td>

                            <td class="quantity">3</td>

                            <td>3</td>

                            <td class="deviation-zero">
                                0 PCS
                            </td>

                            <td class="currency">
                                Rp 94.000.000
                            </td>

                            <td class="currency">
                                Rp 0
                            </td>

                            <td>
                                <span class="status-badge status-match">
                                    MATCH
                                </span>
                            </td>

                            <td>
                                <div class="action-group">

                                    <button class="table-action">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z" />
                                            <circle cx="12" cy="12" r="2.5" />
                                        </svg>
                                    </button>

                                    <button class="table-action primary">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M6 2h9l5 5v15H6z" />
                                            <path d="M14 2v6h6" />
                                            <path d="M9 13h6" />
                                            <path d="M9 17h4" />
                                        </svg>
                                    </button>

                                </div>
                            </td>

                        </tr>


                        <tr>

                            <td class="number-cell">3</td>

                            <td>
                                <span class="item-code">
                                    IC-093104
                                </span>
                            </td>

                            <td>
                                <div class="item-name">
                                    Pressure Transmitter Differential
                                    4-20mA HART High Range
                                </div>
                            </td>

                            <td>
                                <span class="rack-code">
                                    RAK-C-02-05
                                </span>
                            </td>

                            <td class="quantity">4</td>

                            <td>5</td>

                            <td class="deviation-minus">
                                -1 PCS
                            </td>

                            <td class="currency">
                                Rp 14.200.000
                            </td>

                            <td class="currency-danger">
                                Rp 14.200.000
                            </td>

                            <td>
                                <span class="status-badge status-short">
                                    DISCREPANCY SHORT
                                </span>
                            </td>

                            <td>
                                <div class="action-group">

                                    <button class="table-action">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z" />
                                            <circle cx="12" cy="12" r="2.5" />
                                        </svg>
                                    </button>

                                    <button class="table-action primary">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M6 2h9l5 5v15H6z" />
                                            <path d="M14 2v6h6" />
                                            <path d="M9 13h6" />
                                            <path d="M9 17h4" />
                                        </svg>
                                    </button>

                                </div>
                            </td>

                        </tr>


                        <tr>

                            <td class="number-cell">4</td>

                            <td>
                                <span class="item-code">
                                    MP-055198
                                </span>
                            </td>

                            <td>
                                <div class="item-name">
                                    High Pressure Boiler Tube SA-213
                                    T22 Seamless OD 50.8mm
                                </div>
                            </td>

                            <td>
                                <span class="rack-code">
                                    YARD-PIPE-04
                                </span>
                            </td>

                            <td class="quantity">84</td>

                            <td>84</td>

                            <td class="deviation-zero">
                                0 MTR
                            </td>

                            <td class="currency">
                                Rp 1.650.000
                            </td>

                            <td class="currency">
                                Rp 0
                            </td>

                            <td>
                                <span class="status-badge status-match">
                                    MATCH
                                </span>
                            </td>

                            <td>
                                <div class="action-group">

                                    <button class="table-action">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z" />
                                            <circle cx="12" cy="12" r="2.5" />
                                        </svg>
                                    </button>

                                    <button class="table-action primary">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M6 2h9l5 5v15H6z" />
                                            <path d="M14 2v6h6" />
                                            <path d="M9 13h6" />
                                            <path d="M9 17h4" />
                                        </svg>
                                    </button>

                                </div>
                            </td>

                        </tr>


                        <tr>

                            <td class="number-cell">5</td>

                            <td>
                                <span class="item-code">
                                    CH-012903
                                </span>
                            </td>

                            <td>
                                <div class="item-name">
                                    Turbine Lube Oil ISO VG 46
                                    Extreme Pressure
                                </div>
                            </td>

                            <td>
                                <span class="rack-code">
                                    GUDANG-B3-02
                                </span>
                            </td>

                            <td class="quantity">1450</td>

                            <td>1250</td>

                            <td class="deviation-plus">
                                +200 LTR
                            </td>

                            <td class="currency">
                                Rp 58.000
                            </td>

                            <td class="currency-danger">
                                Rp 11.600.000
                            </td>

                            <td>
                                <span class="status-badge status-over">
                                    DISCREPANCY OVER
                                </span>
                            </td>

                            <td>
                                <div class="action-group">

                                    <button class="table-action">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z" />
                                            <circle cx="12" cy="12" r="2.5" />
                                        </svg>
                                    </button>

                                    <button class="table-action primary">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M6 2h9l5 5v15H6z" />
                                            <path d="M14 2v6h6" />
                                            <path d="M9 13h6" />
                                            <path d="M9 17h4" />
                                        </svg>
                                    </button>

                                </div>
                            </td>

                        </tr>


                        <tr>

                            <td class="number-cell">6</td>

                            <td>
                                <span class="item-code">
                                    CF-077421
                                </span>
                            </td>

                            <td>
                                <div class="item-name">
                                    Spiral Wound Gasket 4 Inch 300#
                                    ANSI B16.20 SS316 Graphite
                                </div>
                            </td>

                            <td>
                                <span class="rack-code">
                                    RAK-D-04-01
                                </span>
                            </td>

                            <td class="quantity">18</td>

                            <td>18</td>

                            <td class="deviation-zero">
                                0 PCS
                            </td>

                            <td class="currency">
                                Rp 320.000
                            </td>

                            <td class="currency">
                                Rp 0
                            </td>

                            <td>
                                <span class="status-badge status-match">
                                    MATCH
                                </span>
                            </td>

                            <td>
                                <div class="action-group">

                                    <button class="table-action">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z" />
                                            <circle cx="12" cy="12" r="2.5" />
                                        </svg>
                                    </button>

                                    <button class="table-action primary">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M6 2h9l5 5v15H6z" />
                                            <path d="M14 2v6h6" />
                                            <path d="M9 13h6" />
                                            <path d="M9 17h4" />
                                        </svg>
                                    </button>

                                </div>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- FOOTER -->
            <div class="report-footer">

                <div class="report-total">
                    Menampilkan 1–6 dari 10 material
                </div>

                <div class="pagination">

                    <button class="page-btn">‹</button>

                    <button class="page-btn active">1</button>

                    <button class="page-btn">2</button>

                    <button class="page-btn">›</button>

                </div>

            </div>

        </div>


        <!-- BAST -->
        <div class="bast-section">

            <div class="bast-card">

                <div class="bast-card-header">

                    <div class="bast-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 2h9l5 5v15H6z" />
                            <path d="M14 2v6h6" />
                            <path d="M9 13h6" />
                            <path d="M9 17h6" />
                        </svg>
                    </div>

                    <div>
                        <h4>Berita Acara Rekonsiliasi</h4>
                        <p>Dokumen hasil pemeriksaan dan pencocokan stok</p>
                    </div>

                </div>


                <div class="bast-info">

                    <div class="bast-info-item">
                        <span>Nomor BAST</span>
                        <strong>BAST-2026-0912-001</strong>
                    </div>

                    <div class="bast-info-item">
                        <span>Tanggal</span>
                        <strong>12 September 2026</strong>
                    </div>

                    <div class="bast-info-item">
                        <span>Unit</span>
                        <strong>PLN Surabaya Unit</strong>
                    </div>

                    <div class="bast-info-item">
                        <span>Status</span>
                        <strong style="color:#07945e;">Siap Dicetak</strong>
                    </div>

                </div>


                <div class="bast-card-actions">

                    <button type="button">
                        Lihat Detail
                    </button>

                    <button type="button" class="primary">
                        Cetak BAST
                    </button>

                </div>

            </div>


            <div class="bast-card">

                <div class="bast-card-header">

                    <div class="bast-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16v16H4z" />
                            <path d="M8 8h8" />
                            <path d="M8 12h8" />
                            <path d="M8 16h5" />
                        </svg>
                    </div>

                    <div>
                        <h4>Laporan Rekonsiliasi</h4>
                        <p>Ringkasan hasil pemeriksaan material gudang</p>
                    </div>

                </div>


                <div class="bast-info">

                    <div class="bast-info-item">
                        <span>Periode</span>
                        <strong>September 2026</strong>
                    </div>

                    <div class="bast-info-item">
                        <span>Total Item</span>
                        <strong>10 Item</strong>
                    </div>

                    <div class="bast-info-item">
                        <span>Sesuai</span>
                        <strong style="color:#07945e;">7 Item</strong>
                    </div>

                    <div class="bast-info-item">
                        <span>Berselisih</span>
                        <strong style="color:#e2a400;">3 Item</strong>
                    </div>

                </div>


                <div class="bast-card-actions">

                    <button type="button">
                        Lihat Laporan
                    </button>

                    <button type="button" class="primary">
                        Download PDF
                    </button>

                </div>

            </div>

        </div>

    </div>

@endsection
