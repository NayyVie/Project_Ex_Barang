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

        /* =========================================================
                                               MODAL PENGELUARAN BARANG BARU
                                               ========================================================= */

        .pengeluaran-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(23, 43, 77, 0.55);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 9999;
        }

        .pengeluaran-modal-overlay.show {
            display: flex;
        }

        .pengeluaran-modal {
            width: 100%;
            max-width: 900px;
            max-height: 92vh;
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #dce6f0;
            box-shadow: 0 20px 60px rgba(23, 43, 77, 0.22);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            animation: pengeluaranModalIn .2s ease;
        }

        @keyframes pengeluaranModalIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* HEADER MODAL */

        .pengeluaran-modal-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e5edf5;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 15px;
            background: #ffffff;
        }

        .pengeluaran-modal-header h2 {
            margin: 0;
            color: #172b4d;
            font-size: 18px;
            font-weight: 700;
        }

        .pengeluaran-modal-header p {
            margin: 5px 0 0;
            color: #7890ae;
            font-size: 11px;
        }

        .pengeluaran-modal-close {
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 8px;
            background: #f3f7fb;
            color: #7890ae;
            font-size: 21px;
            line-height: 1;
            cursor: pointer;
            transition: .2s ease;
        }

        .pengeluaran-modal-close:hover {
            background: #e8f1fa;
            color: #172b4d;
        }

        /* BODY */

        .pengeluaran-modal-body {
            padding: 22px 24px;
            overflow-y: auto;
        }

        /* INFO MAXIMO */

        .maximo-info-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 12px 14px;
            border-radius: 10px;
            background: #f0f7ff;
            border: 1px solid #cfe3fa;
            margin-bottom: 20px;
        }

        .maximo-info-left {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #0758bd;
            font-size: 11px;
            font-weight: 700;
        }

        .maximo-info-icon {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            background: #dcecff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0874c9;
            font-size: 14px;
        }

        .maximo-status {
            padding: 5px 10px;
            border-radius: 20px;
            background: #e5faf2;
            color: #09986f;
            border: 1px solid #bcefdc;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* FORM GRID */

        .pengeluaran-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 17px 16px;
        }

        .pengeluaran-form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .pengeluaran-form-group.full {
            grid-column: 1 / -1;
        }

        .pengeluaran-form-group label {
            color: #526b87;
            font-size: 11px;
            font-weight: 700;
        }

        .pengeluaran-required {
            color: #e5484d;
        }

        .pengeluaran-input,
        .pengeluaran-select,
        .pengeluaran-textarea {
            width: 100%;
            border: 1px solid #d7e2ee;
            border-radius: 9px;
            background: #f8fafc;
            color: #334f70;
            font-family: inherit;
            font-size: 11px;
            outline: none;
            transition: .2s ease;
            box-sizing: border-box;
        }

        .pengeluaran-input,
        .pengeluaran-select {
            height: 40px;
            padding: 0 12px;
        }

        .pengeluaran-textarea {
            min-height: 76px;
            padding: 11px 12px;
            resize: vertical;
        }

        .pengeluaran-input:focus,
        .pengeluaran-select:focus,
        .pengeluaran-textarea:focus {
            border-color: #0874c9;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(8, 116, 201, .08);
        }

        .pengeluaran-input::placeholder,
        .pengeluaran-textarea::placeholder {
            color: #9aabc0;
        }

        /* MATERIAL */

        .material-info {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 10px;
            margin-top: 8px;
        }

        .material-stock-info {
            padding: 9px 11px;
            border-radius: 8px;
            background: #eef5fb;
            color: #526b87;
            font-size: 10px;
        }

        .material-stock-info strong {
            color: #172b4d;
        }

        .material-price-info {
            padding: 9px 11px;
            border-radius: 8px;
            background: #eef7ff;
            color: #0874c9;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* FOOTER */

        .pengeluaran-modal-footer {
            padding: 15px 24px;
            border-top: 1px solid #e5edf5;
            background: #fbfcfe;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 9px;
        }

        .btn-modal-cancel {
            height: 36px;
            padding: 0 15px;
            border: 1px solid #d7e2ee;
            border-radius: 8px;
            background: #ffffff;
            color: #526b87;
            font-family: inherit;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-modal-cancel:hover {
            background: #f3f7fb;
        }

        .btn-modal-save {
            height: 36px;
            padding: 0 16px;
            border: 1px solid #155eef;
            border-radius: 8px;
            background: #0758bd;
            color: #ffffff;
            font-family: inherit;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: .2s ease;
        }

        .btn-modal-save:hover {
            background: #064da8;
            transform: translateY(-1px);
        }

        .btn-modal-save svg {
            width: 15px;
            height: 15px;
        }

        /* RESPONSIVE MODAL */

        @media (max-width: 700px) {
            .pengeluaran-modal {
                max-height: 95vh;
            }

            .pengeluaran-modal-header {
                padding: 17px;
            }

            .pengeluaran-modal-body {
                padding: 17px;
            }

            .pengeluaran-form-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .pengeluaran-form-group.full {
                grid-column: auto;
            }

            .material-info {
                grid-template-columns: 1fr;
            }

            .pengeluaran-modal-footer {
                padding: 13px 17px;
            }

            .btn-modal-cancel,
            .btn-modal-save {
                flex: 1;
                justify-content: center;
            }
        }

        /* =========================
                                   UKURAN GAMBAR DI TABEL
                                   ========================= */

        .pengeluaran-table td img {
            width: 130px;
            height: 100px;
            object-fit: contain;
            object-position: center;
            display: block;
            margin: 0 auto;
            border-radius: 8px;
        }

        /* Supaya kolom gambar tidak terlalu lebar */
        .pengeluaran-table td:has(img) {
            width: 150px;
            min-width: 150px;
        }
    </style>


    <div class="pengeluaran-page">

        {{-- =========================
         HEADER
    ========================== --}}
        <div class="pengeluaran-header">

            <div class="header-actions">

                <button type="button" class="btn-primary" id="btnPengeluaranBaru">
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
                            <th>Bukti/Foto</th>
                            <th>Sync Maximo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>

                        {{-- DATA 1 --}}
                        <tr data-maintenance="Preventive Maintenance (Rutin)" data-unit="PLTU Unit 1-2"
                            data-warehouse-officer="Bambang Supriyanto" data-material-code="MP-081201"
                            data-price="Rp 18.500.000"
                            data-note="Pengeluaran suku cadang untuk jadwal overhaul preventif berkala." data-signature="">

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

                            <td><img src="{{ asset('assets/images/trafo.png') }}" alt="Gambar Trafo"></td>

                            <td>
                                <span class="sync-badge">
                                    <span class="sync-dot"></span>
                                    MIF SYNCED
                                </span>
                            </td>

                            <td>
                                <button type="button" class="action-link" onclick="openPengeluaranDetail(this)">
                                    Detail & Cetak
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 2 --}}
                        <tr data-maintenance="Corrective Maintenance" data-unit="PLTU Unit 3-4"
                            data-warehouse-officer="Bambang Supriyanto" data-material-code="MP-081203"
                            data-price="Rp 8.750.000"
                            data-note="Pengeluaran bearing untuk penggantian komponen pada sistem pendingin Turbine Unit 2."
                            data-signature="">

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

                            <td>Foto</td>

                            <td>
                                <span class="sync-badge">
                                    <span class="sync-dot"></span>
                                    MIF SYNCED
                                </span>
                            </td>

                            <td>
                                <button type="button" class="action-link" onclick="openPengeluaranDetail(this)">
                                    Detail & Cetak
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 3 --}}
                        <tr data-maintenance="Preventive Maintenance (Rutin)" data-unit="PLTG Unit 1"
                            data-warehouse-officer="Bambang Supriyanto" data-material-code="MP-081204"
                            data-price="Rp 2.450.000"
                            data-note="Pengeluaran filter untuk pemeliharaan sistem pelumasan Generator Unit 1."
                            data-signature="">

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

                            <td>Foto</td>

                            <td>
                                <span class="sync-badge">
                                    <span class="sync-dot"></span>
                                    MIF SYNCED
                                </span>
                            </td>

                            <td>
                                <button type="button" class="action-link" onclick="openPengeluaranDetail(this)">
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

    </div>

    {{-- =====================================================
         MODAL PENGELUARAN BARANG BARU
         ===================================================== --}}

    <div class="pengeluaran-modal-overlay" id="pengeluaranModal">

        <div class="pengeluaran-modal">

            {{-- HEADER MODAL --}}
            <div class="pengeluaran-modal-header">

                <div>
                    <h2>Formulir Pengeluaran Barang</h2>

                    <p>
                        Pencatatan suku cadang keluar untuk kebutuhan
                        Work Order dan sinkronisasi IBM Maximo
                    </p>
                </div>

                <button type="button" class="pengeluaran-modal-close" id="closePengeluaranModal">
                    &times;
                </button>

            </div>


            {{-- BODY --}}
            <div class="pengeluaran-modal-body">

                {{-- MAXIMO --}}
                <div class="maximo-info-box">

                    <div class="maximo-info-left">

                        <div class="maximo-info-icon">
                            ↗
                        </div>

                        <span>
                            Pengeluaran Terhadap Work Order (WO) IBM Maximo
                        </span>

                    </div>

                    <span class="maximo-status">
                        REST MIF ACTIVE
                    </span>

                </div>


                {{-- FORM --}}
                <div class="pengeluaran-form-grid">

                    {{-- NOMOR WO --}}
                    <div class="pengeluaran-form-group">

                        <label>
                            Nomor Work Order (WO) Maximo
                            <span class="pengeluaran-required">*</span>
                        </label>

                        <input type="text" class="pengeluaran-input" value="WO-MAX-2026-19477"
                            placeholder="Masukkan nomor WO Maximo">

                    </div>


                    {{-- JENIS PEMELIHARAAN --}}
                    <div class="pengeluaran-form-group">

                        <label>
                            Jenis Pemeliharaan
                            <span class="pengeluaran-required">*</span>
                        </label>

                        <select class="pengeluaran-select">

                            <option>
                                Preventive Maintenance (Rutin)
                            </option>

                            <option>
                                Corrective Maintenance
                            </option>

                            <option>
                                Predictive Maintenance
                            </option>

                            <option>
                                Overhaul
                            </option>

                        </select>

                    </div>


                    {{-- UNIT --}}
                    <div class="pengeluaran-form-group">

                        <label>
                            Unit Pembangkit Pemohon
                            <span class="pengeluaran-required">*</span>
                        </label>

                        <select class="pengeluaran-select">

                            <option>PLTU Unit 1-2</option>
                            <option>PLTU Unit 3-4</option>
                            <option>PLTG Unit 1</option>
                            <option>PLTGU Unit 1-2</option>

                        </select>

                    </div>


                    {{-- LOKASI --}}
                    <div class="pengeluaran-form-group">

                        <label>
                            Lokasi / Titik Pekerjaan Spesifik
                            <span class="pengeluaran-required">*</span>
                        </label>

                        <input type="text" class="pengeluaran-input" value="Boiler Unit 1 - Main Steam Line"
                            placeholder="Masukkan lokasi pekerjaan">

                    </div>


                    {{-- TEKNISI --}}
                    <div class="pengeluaran-form-group">

                        <label>
                            Teknisi / Spv Pemohon
                            <span class="pengeluaran-required">*</span>
                        </label>

                        <input type="text" class="pengeluaran-input" value="Hendra Wijaya (Spv Mekanikal)"
                            placeholder="Nama teknisi / supervisor">

                    </div>


                    {{-- PETUGAS GUDANG --}}
                    <div class="pengeluaran-form-group">

                        <label>
                            Petugas Gudang yang Mengeluarkan
                            <span class="pengeluaran-required">*</span>
                        </label>

                        <input type="text" class="pengeluaran-input" value="Bambang Supriyanto"
                            placeholder="Nama petugas gudang">

                    </div>


                    {{-- MATERIAL --}}
                    <div class="pengeluaran-form-group full">

                        <label>
                            Pilih Material Spare Part
                            <span class="pengeluaran-required">*</span>
                        </label>

                        <select class="pengeluaran-select" id="materialPengeluaran">

                            <option value="MP-081201">
                                MP-081201 - Mechanical Seal Cartridge Type D-65mm for Boiler Feed Pump
                            </option>

                            <option value="MP-081202">
                                MP-081202 - Spiral Wound Gasket 4 Inch
                            </option>

                            <option value="MP-081203">
                                MP-081203 - Bearing SKF 6205-2RS
                            </option>

                            <option value="MP-081204">
                                MP-081204 - Industrial Oil Filter
                            </option>

                        </select>


                        <div class="material-info">

                            <div class="material-stock-info">
                                Lokasi Rak:
                                <strong>RAK-A-01-02</strong>
                                &nbsp; | &nbsp;
                                Stok Fisik:
                                <strong>6 SET</strong>
                            </div>

                            <div class="material-price-info">
                                Rp 18.500.000 / SET
                            </div>

                        </div>

                    </div>


                    {{-- QUANTITY --}}
                    <div class="pengeluaran-form-group full">

                        <label>
                            Kuantitas yang Dikeluarkan (SET)
                            <span class="pengeluaran-required">*</span>
                        </label>

                        <input type="number" class="pengeluaran-input" value="1" min="1"
                            placeholder="Masukkan jumlah">

                    </div>


                    {{-- CATATAN --}}
                    <div class="pengeluaran-form-group full">

                        <label>
                            Catatan Pekerjaan / Justifikasi Pengeluaran
                        </label>

                        <textarea class="pengeluaran-textarea" placeholder="Masukkan catatan atau alasan pengeluaran material...">Pengeluaran suku cadang untuk jadwal overhaul preventif berkala</textarea>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="pengeluaran-modal-footer">

                <button type="button" class="btn-modal-cancel" id="cancelPengeluaranModal">
                    Batal
                </button>

                <button type="button" class="btn-modal-save" id="savePengeluaranBarang">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">

                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>

                        <polyline points="17 21 17 13 7 13 7 21"></polyline>

                        <polyline points="7 3 7 8 15 8"></polyline>

                    </svg>

                    Simpan & Sinkronkan ke Maximo

                </button>

            </div>

        </div>

    </div>


    {{-- JAVASCRIPT MODAL --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('pengeluaranModal');
            const openButton = document.getElementById('btnPengeluaranBaru');
            const closeButton = document.getElementById('closePengeluaranModal');
            const cancelButton = document.getElementById('cancelPengeluaranModal');
            const saveButton = document.getElementById('savePengeluaranBarang');


            /* OPEN MODAL */

            if (openButton) {

                openButton.addEventListener('click', function() {

                    modal.classList.add('show');

                    document.body.style.overflow = 'hidden';

                });

            }


            /* CLOSE MODAL */

            function closeModal() {

                modal.classList.remove('show');

                document.body.style.overflow = '';

            }


            if (closeButton) {

                closeButton.addEventListener('click', closeModal);

            }


            if (cancelButton) {

                cancelButton.addEventListener('click', closeModal);

            }


            /* CLICK OUTSIDE */

            if (modal) {

                modal.addEventListener('click', function(event) {

                    if (event.target === modal) {

                        closeModal();

                    }

                });

            }


            /* ESCAPE */

            document.addEventListener('keydown', function(event) {

                if (event.key === 'Escape' && modal.classList.contains('show')) {

                    closeModal();

                }

            });


            /* SIMPAN */

            if (saveButton) {

                saveButton.addEventListener('click', function() {

                    alert(
                        'Data pengeluaran barang berhasil disimpan dan siap disinkronkan ke Maximo.'
                    );

                    closeModal();

                });

            }

        });
    </script>

    {{-- =====================================================
     MODAL DETAIL & CETAK LAPORAN PENGELUARAN
===================================================== --}}
    <div class="pengeluaran-detail-overlay" id="pengeluaranDetailModal">

        <div class="pengeluaran-detail-modal">

            {{-- HEADER --}}
            <div class="detail-report-header">

                <div class="detail-report-brand">
                    <div>
                        <strong>Laporan Pengeluaran Barang</strong>
                        <span>Goods Issue Work Order</span>
                    </div>
                </div>

                <button type="button" class="detail-report-close" onclick="closePengeluaranDetail()">
                    &times;
                </button>

            </div>


            {{-- BODY --}}
            <div class="detail-report-body">

                {{-- IDENTITAS LAPORAN --}}
                <div class="report-info-top">

                    <div class="report-number-box">
                        <span>No. Pengeluaran</span>
                        <strong id="detailTransaction">
                            TRX-2026-0810
                        </strong>
                    </div>

                    <div class="report-date-box">
                        <span>Tanggal Pengeluaran</span>
                        <strong id="detailDate">
                            14 Sep 2026
                        </strong>
                    </div>

                    <div class="report-status-box">
                        <span>Status Maximo</span>

                        <strong>
                            <span class="report-status-dot"></span>
                            MIF SYNCED
                        </strong>
                    </div>

                </div>


                {{-- SECTION 1 --}}
                <div class="report-section">

                    <div class="report-section-title">
                        <span class="report-step">
                            1
                        </span>

                        <div>
                            <h3>Informasi Work Order</h3>
                            <p>Informasi pekerjaan dan pemohon pengeluaran</p>
                        </div>
                    </div>


                    <div class="report-grid">

                        <div class="report-field">
                            <span>Nomor Work Order (WO)</span>
                            <strong id="detailWO">
                                WO-MAX-2026-19401
                            </strong>
                        </div>

                        <div class="report-field">
                            <span>Jenis Pemeliharaan</span>
                            <strong id="detailMaintenance">
                                Preventive Maintenance (Rutin)
                            </strong>
                        </div>

                        <div class="report-field">
                            <span>Unit Pembangkit</span>
                            <strong id="detailUnit">
                                PLTU Unit 1-2
                            </strong>
                        </div>

                        <div class="report-field">
                            <span>Lokasi / Titik Pekerjaan</span>
                            <strong id="detailLocation">
                                Boiler Unit 1 - Main Steam Line
                            </strong>
                        </div>

                        <div class="report-field">
                            <span>Teknisi / Pemohon</span>
                            <strong id="detailTechnician">
                                Hendra Wijaya
                            </strong>
                        </div>

                        <div class="report-field">
                            <span>Petugas Gudang</span>
                            <strong id="detailWarehouseOfficer">
                                Bambang Supriyanto
                            </strong>
                        </div>

                    </div>

                </div>


                {{-- SECTION 2 --}}
                <div class="report-section">

                    <div class="report-section-title">
                        <span class="report-step">
                            2
                        </span>

                        <div>
                            <h3>Detail Material Spare Part</h3>
                            <p>Material yang dikeluarkan dari gudang</p>
                        </div>
                    </div>


                    <div class="material-report-card">

                        <div class="material-report-main">

                            <span class="material-code" id="detailMaterialCode">
                                MP-081201
                            </span>

                            <h4 id="detailMaterial">
                                Mechanical Seal Cartridge Type D-65mm
                                for Boiler Feed Pump
                            </h4>

                            <p id="detailSpecification">
                                Mechanical Seal Cartridge
                            </p>

                        </div>


                        <div class="material-report-grid">

                            <div>
                                <span>Jumlah Keluar</span>
                                <strong id="detailQuantity">
                                    4 PCS
                                </strong>
                            </div>

                            <div>
                                <span>Rak Pengambilan</span>
                                <strong id="detailRack">
                                    RAK-D-04-01
                                </strong>
                            </div>

                            <div>
                                <span>Harga Satuan</span>
                                <strong id="detailPrice">
                                    Rp 18.500.000
                                </strong>
                            </div>

                            <div>
                                <span>Total Nilai</span>
                                <strong id="detailTotal">
                                    Rp 74.000.000
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- SECTION 3 --}}
                <div class="report-section">

                    <div class="report-section-title">
                        <span class="report-step">
                            3
                        </span>

                        <div>
                            <h3>Bukti & Catatan Pengeluaran</h3>
                            <p>Bukti material dan informasi tambahan</p>
                        </div>
                    </div>


                    <div class="evidence-report-grid">

                        <div>

                            <span class="report-label">
                                Foto / Bukti Material
                            </span>

                            <div class="report-photo-box">

                                <img id="detailEvidencePhoto" src="{{ asset('assets/images/trafo.png') }}"
                                    alt="Bukti material">

                                <div class="report-photo-placeholder">
                                    📷
                                    <span>Foto bukti tidak tersedia</span>
                                </div>

                            </div>

                        </div>


                        <div>

                            <span class="report-label">
                                Catatan Pekerjaan / Justifikasi
                            </span>

                            <div class="report-description" id="detailNote">
                                Pengeluaran suku cadang untuk jadwal
                                overhaul preventif berkala.
                            </div>

                        </div>

                    </div>

                </div>


                {{-- SECTION 4 --}}
                <div class="report-section">

                    <div class="report-section-title">
                        <span class="report-step">
                            4
                        </span>

                        <div>
                            <h3>Konfirmasi & Tanda Tangan</h3>
                            <p>Konfirmasi digital dari pemohon pengeluaran</p>
                        </div>
                    </div>


                    <div class="signature-report-wrapper">

                        <div class="signature-report-box">

                            <img id="detailSignature" src="{{ asset('assets/images/ttd.png') }}"
                                alt="Tanda tangan digital">

                            <div class="signature-report-placeholder">
                                ✍
                                <span>Tanda tangan belum tersedia</span>
                            </div>

                        </div>


                        <div class="signature-report-info">

                            <span>Tanda tangan digital</span>

                            <strong id="detailSigner">
                                Hendra Wijaya
                            </strong>

                            <small id="detailSignerRole">
                                Teknisi / Pemohon
                            </small>

                            <small id="detailSignatureDate">
                                Ditandatangani pada 14 Sep 2026, 08:15
                            </small>

                        </div>

                    </div>


                    <div class="report-agreement">

                        <div class="agreement-icon">
                            ✓
                        </div>

                        <p>
                            Saya menyatakan bahwa data pengeluaran barang
                            yang tercantum pada laporan ini telah diperiksa
                            dan dapat dipertanggungjawabkan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="detail-report-footer">

                <button type="button" class="report-btn-close" onclick="closePengeluaranDetail()">
                    Tutup
                </button>

                <button type="button" class="report-btn-print" onclick="printPengeluaranReport()">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9V3h12v6"></path>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <path d="M6 14h12v7H6z"></path>
                    </svg>

                    Cetak Laporan
                </button>

            </div>

        </div>

    </div>

    <style>
        /* =====================================================
                        DETAIL & CETAK LAPORAN
                        ===================================================== */

        .pengeluaran-detail-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 31, 55, .58);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 25px;
            z-index: 9999;
        }

        .pengeluaran-detail-overlay.show {
            display: flex;
        }

        .pengeluaran-detail-modal {
            width: 100%;
            max-width: 920px;
            max-height: 92vh;
            background: #f8fafc;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(15, 23, 42, .25);
            display: flex;
            flex-direction: column;
        }


        /* HEADER */

        .detail-report-header {
            min-height: 78px;
            background: #ffffff;
            border-bottom: 1px solid #e4ebf3;
            padding: 17px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .detail-report-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 210px;
        }

        .detail-report-brand strong {
            display: block;
            color: #172b4d;
            font-size: 16px;
            line-height: 1;
        }

        .detail-report-brand span {
            display: block;
            margin-top: 4px;
            color: #7890ae;
            font-size: 8px;
        }

        .detail-report-title {
            text-align: center;
            flex: 1;
        }

        .detail-report-title h2 {
            margin: 0;
            color: #172b4d;
            font-size: 17px;
            font-weight: 700;
        }

        .detail-report-title p {
            margin: 4px 0 0;
            color: #7890ae;
            font-size: 10px;
        }

        .detail-report-close {
            width: 34px;
            height: 34px;
            border: none;
            background: #f1f5f9;
            color: #68778c;
            border-radius: 8px;
            font-size: 22px;
            cursor: pointer;
        }


        /* BODY */

        .detail-report-body {
            padding: 22px;
            overflow-y: auto;
        }


        /* INFO TOP */

        .report-info-top {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .report-number-box,
        .report-date-box,
        .report-status-box {
            background: #ffffff;
            border: 1px solid #e1e9f2;
            border-radius: 10px;
            padding: 12px 14px;
        }

        .report-number-box span,
        .report-date-box span,
        .report-status-box span {
            display: block;
            color: #879ab0;
            font-size: 9px;
            margin-bottom: 5px;
        }

        .report-number-box strong {
            color: #0874c9;
            font-size: 11px;
        }

        .report-date-box strong {
            color: #172b4d;
            font-size: 11px;
        }

        .report-status-box strong {
            color: #09986f;
            font-size: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .report-status-dot {
            width: 6px;
            height: 6px;
            background: #0cb98a;
            border-radius: 50%;
        }


        /* SECTION */

        .report-section {
            background: #ffffff;
            border: 1px solid #e1e9f2;
            border-radius: 12px;
            padding: 17px;
            margin-bottom: 15px;
        }

        .report-section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 13px;
            margin-bottom: 15px;
            border-bottom: 1px solid #edf1f6;
        }

        .report-step {
            width: 27px;
            height: 27px;
            border-radius: 8px;
            background: #eaf4ff;
            color: #0874c9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
        }

        .report-section-title h3 {
            margin: 0;
            color: #172b4d;
            font-size: 13px;
            font-weight: 700;
        }

        .report-section-title p {
            margin: 3px 0 0;
            color: #879ab0;
            font-size: 9px;
        }


        /* REPORT GRID */

        .report-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 20px;
        }

        .report-field span {
            display: block;
            color: #879ab0;
            font-size: 9px;
            margin-bottom: 5px;
        }

        .report-field strong {
            color: #263b5b;
            font-size: 11px;
            font-weight: 600;
        }


        /* MATERIAL */

        .material-report-card {
            border: 1px solid #dce7f2;
            background: #f8fafc;
            border-radius: 10px;
            padding: 14px;
        }

        .material-report-main {
            margin-bottom: 15px;
        }

        .material-code {
            color: #0874c9;
            font-size: 9px;
            font-weight: 700;
        }

        .material-report-main h4 {
            margin: 5px 0 3px;
            color: #172b4d;
            font-size: 12px;
            font-weight: 700;
        }

        .material-report-main p {
            margin: 0;
            color: #879ab0;
            font-size: 9px;
        }

        .material-report-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            padding-top: 13px;
            border-top: 1px solid #e5ebf2;
        }

        .material-report-grid span {
            display: block;
            color: #879ab0;
            font-size: 9px;
            margin-bottom: 4px;
        }

        .material-report-grid strong {
            color: #172b4d;
            font-size: 10px;
        }


        /* EVIDENCE */

        .evidence-report-grid {
            display: grid;
            grid-template-columns: 230px 1fr;
            gap: 18px;
        }

        .report-label {
            display: block;
            color: #263b5b;
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .report-photo-box {
            width: 100%;
            height: 150px;
            border: 1px solid #e5eaf0;
            border-radius: 9px;
            background: #f6f8fa;
            overflow: hidden;
            position: relative;
        }

        .report-photo-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .report-photo-placeholder {
            display: none;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #8a98ad;
            font-size: 22px;
        }

        .report-photo-placeholder span {
            margin-top: 5px;
            font-size: 9px;
        }

        .report-description {
            min-height: 150px;
            padding: 12px 14px;
            border: 1px solid #e5eaf0;
            border-radius: 9px;
            background: #f8fafc;
            color: #5e7089;
            font-size: 10px;
            line-height: 1.7;
        }


        /* SIGNATURE */

        .signature-report-wrapper {
            display: flex;
            align-items: flex-end;
            gap: 18px;
        }

        .signature-report-box {
            width: 250px;
            height: 120px;
            border: 1px solid #e5eaf0;
            border-radius: 9px;
            background: #ffffff;
            overflow: hidden;
        }

        .signature-report-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .signature-report-placeholder {
            display: none;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #8a98ad;
            font-size: 25px;
        }

        .signature-report-placeholder span {
            font-size: 9px;
            margin-top: 5px;
        }

        .signature-report-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding-bottom: 4px;
        }

        .signature-report-info span {
            color: #879ab0;
            font-size: 9px;
        }

        .signature-report-info strong {
            color: #172b4d;
            font-size: 11px;
        }

        .signature-report-info small {
            color: #68778c;
            font-size: 9px;
        }


        /* AGREEMENT */

        .report-agreement {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin-top: 15px;
            padding: 11px 13px;
            background: #f2fbf5;
            border: 1px solid #d9eee2;
            border-radius: 8px;
        }

        .agreement-icon {
            width: 19px;
            height: 19px;
            border-radius: 5px;
            background: #18a957;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
        }

        .report-agreement p {
            margin: 1px 0 0;
            color: #41624f;
            font-size: 9px;
            line-height: 1.6;
        }


        /* FOOTER */

        .detail-report-footer {
            background: #ffffff;
            border-top: 1px solid #e4ebf3;
            padding: 13px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 9px;
        }

        .report-btn-close,
        .report-btn-print {
            height: 34px;
            padding: 0 14px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
        }

        .report-btn-close {
            border: 1px solid #dbe5ef;
            background: #ffffff;
            color: #526b87;
        }

        .report-btn-print {
            border: none;
            background: #1653eb;
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .report-btn-print svg {
            width: 15px;
            height: 15px;
        }


        /* RESPONSIVE */

        @media (max-width: 768px) {

            .pengeluaran-detail-overlay {
                padding: 10px;
            }

            .report-info-top {
                grid-template-columns: 1fr;
            }

            .report-grid {
                grid-template-columns: 1fr;
            }

            .material-report-grid {
                grid-template-columns: 1fr 1fr;
            }

            .evidence-report-grid {
                grid-template-columns: 1fr;
            }

            .signature-report-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }

        }


        /* PRINT */

        @media print {

            body * {
                visibility: hidden !important;
            }

            .pengeluaran-detail-overlay,
            .pengeluaran-detail-overlay * {
                visibility: visible !important;
            }

            .pengeluaran-detail-overlay {
                position: absolute;
                inset: 0;
                background: #ffffff;
                padding: 0;
                display: flex !important;
            }

            .pengeluaran-detail-modal {
                max-width: none;
                max-height: none;
                width: 100%;
                box-shadow: none;
                border-radius: 0;
            }

            .detail-report-body {
                overflow: visible;
            }

            .detail-report-close,
            .detail-report-footer {
                display: none !important;
            }

            @page {
                size: A4;
                margin: 12mm;
            }
        }
    </style>

    <script>
        let currentPengeluaranRow = null;


        function openPengeluaranDetail(button) {

            currentPengeluaranRow = button.closest('tr');

            if (!currentPengeluaranRow) {
                return;
            }

            const cells = currentPengeluaranRow.querySelectorAll('td');

            /*
            |--------------------------------------------------------------------------
            | DATA LAPORAN DIAMBIL DARI DATA PENGELUARAN WO
            |--------------------------------------------------------------------------
            | Field laporan disamakan dengan field pada Formulir Pengeluaran Barang:
            | Nomor WO, jenis pemeliharaan, unit, lokasi, teknisi/pemohon, petugas
            | gudang, material, kuantitas, serta catatan pekerjaan/justifikasi.
            | Data tambahan seperti kode material, harga, dan total berasal dari
            | informasi material yang sudah ditampilkan pada halaman pengeluaran.
            */

            const transaction = cells[0]?.innerText.trim() || '-';
            const wo = cells[1]?.innerText.trim() || '-';
            const location = cells[2]?.innerText.trim() || '-';
            const technician =
                cells[3]?.querySelector('.material-name')?.innerText.trim() ||
                cells[3]?.innerText.trim() ||
                '-';
            const technicianRole =
                cells[3]?.querySelector('.secondary-text')?.innerText.trim() ||
                'Teknisi / Pemohon';
            const material =
                cells[4]?.querySelector('.material-name')?.innerText.trim() ||
                '-';
            const specification =
                cells[4]?.querySelector('.secondary-text')?.innerText.trim() ||
                '-';
            const quantity = cells[5]?.innerText.trim() || '-';
            const rack = cells[6]?.innerText.trim() || '-';
            const date = cells[7]?.innerText.trim() || '-';

            const maintenance = currentPengeluaranRow.dataset.maintenance || 'Preventive Maintenance (Rutin)';
            const unit = currentPengeluaranRow.dataset.unit || '-';
            const warehouseOfficer = currentPengeluaranRow.dataset.warehouseOfficer || '-';
            const materialCode = currentPengeluaranRow.dataset.materialCode || '-';
            const price = currentPengeluaranRow.dataset.price || '-';
            const note = currentPengeluaranRow.dataset.note || '-';
            const evidenceImage = cells[8]?.querySelector('img')?.getAttribute('src') || '';

            /* HITUNG TOTAL BERDASARKAN JUMLAH DAN HARGA SATUAN */
            const quantityMatch = quantity.match(/\d+(?:[.,]\d+)?/);
            const priceMatch = price.replace(/[^0-9]/g, '');
            const quantityNumber = quantityMatch ? parseFloat(quantityMatch[0].replace(',', '.')) : 0;
            const priceNumber = priceMatch ? parseInt(priceMatch, 10) : 0;
            const total = quantityNumber * priceNumber;
            const formattedTotal = total > 0 ?
                'Rp ' + total.toLocaleString('id-ID') :
                '-';

            /* MASUKKAN DATA KE LAPORAN */
            document.getElementById('detailTransaction').textContent = transaction;
            document.getElementById('detailWO').textContent = wo;
            document.getElementById('detailMaintenance').textContent = maintenance;
            document.getElementById('detailUnit').textContent = unit;
            document.getElementById('detailLocation').textContent = location;
            document.getElementById('detailTechnician').textContent = technician;
            document.getElementById('detailWarehouseOfficer').textContent = warehouseOfficer;
            document.getElementById('detailMaterialCode').textContent = materialCode;
            document.getElementById('detailMaterial').textContent = material;
            document.getElementById('detailSpecification').textContent = specification;
            document.getElementById('detailQuantity').textContent = quantity;
            document.getElementById('detailRack').textContent = rack;
            document.getElementById('detailPrice').textContent = price;
            document.getElementById('detailTotal').textContent = formattedTotal;
            document.getElementById('detailDate').textContent = date;
            document.getElementById('detailNote').textContent = note;
            document.getElementById('detailSigner').textContent = technician;
            document.getElementById('detailSignerRole').textContent = technicianRole;
            document.getElementById('detailSignatureDate').textContent = 'Dicatat pada ' + date;

            /* FOTO BUKTI DIAMBIL DARI KOLOM BUKTI/FOTO PADA TABEL */
            const evidencePhoto = document.getElementById('detailEvidencePhoto');
            const evidencePlaceholder = document.querySelector('.report-photo-placeholder');

            if (evidencePhoto) {
                if (evidenceImage) {
                    evidencePhoto.src = evidenceImage;
                    evidencePhoto.style.display = 'block';
                    if (evidencePlaceholder) evidencePlaceholder.style.display = 'none';
                } else {
                    evidencePhoto.style.display = 'none';
                    if (evidencePlaceholder) evidencePlaceholder.style.display = 'flex';
                }
            }

            /* BUKA MODAL */
            document.getElementById('pengeluaranDetailModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }


        function closePengeluaranDetail() {

            document.getElementById('pengeluaranDetailModal').classList.remove('show');
            document.body.style.overflow = '';
            currentPengeluaranRow = null;
        }


        function printPengeluaranReport() {
            window.print();
        }


        document.getElementById('pengeluaranDetailModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closePengeluaranDetail();
            }
        });


        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closePengeluaranDetail();
            }
        });
    </script>

@endsection
