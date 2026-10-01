@extends('layouts.app')

@section('title', 'Riwayat')

@section('page-title', 'Riwayat')

@section('page-subtitle', 'PLN Nusantara Power Services')

@section('content')

    <div class="history-container">

        {{-- ================================
         HISTORY CARD
    ================================= --}}
        <div class="history-card">

            {{-- ================================
             FILTER & SEARCH
        ================================= --}}
            <div class="history-toolbar">

                {{-- FILTER --}}
                <div class="history-filter">

                    <button type="button" class="filter-btn active" data-filter="semua">
                        Semua
                    </button>

                    <button type="button" class="filter-btn" data-filter="investasi">
                        Investasi
                    </button>

                    <button type="button" class="filter-btn" data-filter="operasi">
                        Operasi
                    </button>

                </div>


                {{-- SEARCH --}}
                <div class="history-search">

                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.7" />

                        <path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                    </svg>

                    <input type="text" id="historySearch" placeholder="Cari...">

                </div>

            </div>


            {{-- ================================
             TABLE
        ================================= --}}
            <div class="history-table-wrapper">

                <table class="history-table">

                    <thead>
                        <tr>

                            <th>ID Laporan</th>

                            <th>Nama Barang</th>

                            <th>No. Asset</th>

                            <th>Kondisi</th>

                            <th>Bidang</th>

                            <th>Tanggal</th>

                            <th>Detail</th>

                        </tr>
                    </thead>


                    <tbody id="historyTableBody">

                        {{-- DATA 1 --}}
                        <tr data-category="investasi">

                            <td>
                                <a href="#" class="report-id">
                                    RPT-2024-089
                                </a>
                            </td>

                            <td class="item-name">
                                Trafo 100 KVA
                            </td>

                            <td>
                                <span class="asset-number">
                                    PLN-TRF-0042
                                </span>
                            </td>

                            <td>
                                <span class="condition-badge investasi">
                                    Investasi
                                </span>
                            </td>

                            <td>
                                Listrik
                            </td>

                            <td>
                                09 Sep 2024
                            </td>

                            <td>
                                <button type="button" class="btn-detail" onclick="openDetail('RPT-2024-089')">
                                    Lihat Detail
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 2 --}}
                        <tr data-category="operasi">

                            <td>
                                <a href="#" class="report-id">
                                    RPT-2024-088
                                </a>
                            </td>

                            <td class="item-name">
                                Kabel XLPE 150mm
                            </td>

                            <td>
                                <span class="asset-number">
                                    PLN-KBL-0123
                                </span>
                            </td>

                            <td>
                                <span class="condition-badge operasi">
                                    Operasi
                                </span>
                            </td>

                            <td>
                                Listrik
                            </td>

                            <td>
                                08 Sep 2024
                            </td>

                            <td>
                                <button type="button" class="btn-detail" onclick="openDetail('RPT-2024-088')">
                                    Lihat Detail
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 3 --}}
                        <tr data-category="investasi">

                            <td>
                                <a href="#" class="report-id">
                                    RPT-2024-086
                                </a>
                            </td>

                            <td class="item-name">
                                MCB 3 Phase 63A
                            </td>

                            <td>
                                <span class="asset-number">
                                    PLN-MCB-0201
                                </span>
                            </td>

                            <td>
                                <span class="condition-badge investasi">
                                    Investasi
                                </span>
                            </td>

                            <td>
                                Mekanik
                            </td>

                            <td>
                                06 Sep 2024
                            </td>

                            <td>
                                <button type="button" class="btn-detail" onclick="openDetail('RPT-2024-086')">
                                    Lihat Detail
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 4 --}}
                        <tr data-category="operasi">

                            <td>
                                <a href="#" class="report-id">
                                    RPT-2024-085
                                </a>
                            </td>

                            <td class="item-name">
                                Pompa Sentrifugal
                            </td>

                            <td>
                                <span class="asset-number">
                                    PLN-PMP-0034
                                </span>
                            </td>

                            <td>
                                <span class="condition-badge operasi">
                                    Operasi
                                </span>
                            </td>

                            <td>
                                Mekanik
                            </td>

                            <td>
                                05 Sep 2024
                            </td>

                            <td>
                                <button type="button" class="btn-detail" onclick="openDetail('RPT-2024-085')">
                                    Lihat Detail
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 5 --}}
                        <tr data-category="investasi">

                            <td>
                                <a href="#" class="report-id">
                                    RPT-2024-084
                                </a>
                            </td>

                            <td class="item-name">
                                Genset 500 kVA
                            </td>

                            <td>
                                <span class="asset-number">
                                    PLN-GEN-0015
                                </span>
                            </td>

                            <td>
                                <span class="condition-badge investasi">
                                    Investasi
                                </span>
                            </td>

                            <td>
                                Listrik
                            </td>

                            <td>
                                04 Sep 2024
                            </td>

                            <td>
                                <button type="button" class="btn-detail" onclick="openDetail('RPT-2024-084')">
                                    Lihat Detail
                                </button>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            {{-- EMPTY STATE --}}
            <div class="history-empty" id="historyEmpty" style="display: none;">

                <div class="empty-icon">

                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.7" />

                        <path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                    </svg>

                </div>

                <h4>Data tidak ditemukan</h4>

                <p>
                    Tidak ada riwayat yang sesuai dengan pencarian.
                </p>

            </div>

        </div>

    </div>


    {{-- ========================================
     CSS
======================================== --}}
    <style>
        .history-container {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
        }


        /* ========================================
                                                           HISTORY CARD
                                                        ======================================== */

        .history-card {
            background: #ffffff;

            border: 1px solid #e8edf3;

            border-radius: 16px;

            box-shadow:
                0 2px 5px rgba(15, 23, 42, 0.06);

            overflow: hidden;
        }


        /* ========================================
                                                           TOOLBAR
                                                        ======================================== */

        .history-toolbar {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 18px 18px 16px;

            border-bottom: 1px solid #edf0f4;
        }


        /* ========================================
                                                           FILTER
                                                        ======================================== */

        .history-filter {
            display: flex;

            align-items: center;

            background: #f1f3f6;

            border-radius: 12px;

            padding: 3px;

            flex-shrink: 0;
        }

        .filter-btn {
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

        .filter-btn:hover {
            color: #075eae;
        }

        .filter-btn.active {
            background: #ffffff;

            color: #075eae;

            font-weight: 600;

            box-shadow:
                0 1px 4px rgba(15, 23, 42, 0.10);
        }


        /* ========================================
                                                           SEARCH
                                                        ======================================== */

        .history-search {
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

        .history-search:focus-within {
            border-color: #2d73d5;

            background: #ffffff;

            box-shadow:
                0 0 0 3px rgba(45, 115, 213, 0.08);
        }

        .history-search input {
            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            font-family: inherit;

            font-size: 13px;

            color: #263b5b;
        }

        .history-search input::placeholder {
            color: #98a4b5;
        }


        /* ========================================
                                                           TABLE
                                                        ======================================== */

        .history-table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        .history-table {
            width: 100%;

            border-collapse: collapse;

            min-width: 760px;
        }


        /* HEADER */

        .history-table thead th {
            padding: 13px 24px;

            text-align: left;

            font-size: 11px;

            font-weight: 600;

            color: #8a98ad;

            background: #ffffff;

            border-bottom: 1px solid #edf0f4;

            white-space: nowrap;
        }


        /* BODY */

        .history-table tbody td {
            padding: 17px 24px;

            font-size: 12px;

            color: #5e7089;

            border-bottom: 1px solid #f0f2f5;

            white-space: nowrap;
        }

        .history-table tbody tr:last-child td {
            border-bottom: none;
        }

        .history-table tbody tr {
            transition: background 0.2s ease;
        }

        .history-table tbody tr:hover {
            background: #fafcff;
        }


        /* ========================================
                                                           REPORT ID
                                                        ======================================== */

        .report-id {
            color: #005eff;

            font-size: 11px;

            font-weight: 500;

            text-decoration: none;
        }

        .report-id:hover {
            text-decoration: underline;
        }


        /* ========================================
                                                           ITEM NAME
                                                        ======================================== */

        .item-name {
            color: #172b4d !important;

            font-size: 13px !important;

            font-weight: 500;
        }


        /* ========================================
                                                           ASSET NUMBER
                                                        ======================================== */

        .asset-number {
            color: #617089;

            font-size: 11px;
        }


        /* ========================================
                                                           CONDITION BADGE
                                                        ======================================== */

        .condition-badge {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 4px 11px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 500;
        }


        /* INVESTASI */

        .condition-badge.investasi {
            background: #e2efff;

            border: 1px solid #b9d7ff;

            color: #1263cf;
        }


        /* OPERASI */

        .condition-badge.operasi {
            background: #fff2cf;

            border: 1px solid #ffd66b;

            color: #e79a00;
        }


        /* ========================================
                                                           EMPTY STATE
                                                        ======================================== */

        .history-empty {
            padding: 55px 20px;

            text-align: center;
        }

        .empty-icon {
            width: 58px;
            height: 58px;

            margin: 0 auto 13px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 14px;

            background: #eef5ff;

            color: #1769d2;
        }

        .history-empty h4 {
            margin: 0;

            font-size: 15px;

            color: #263b5b;
        }

        .history-empty p {
            margin: 7px 0 0;

            font-size: 12px;

            color: #8c99ab;
        }

        /* ========================================
                                                   DETAIL BUTTON
                                                ======================================== */

        .btn-detail {
            border: none;

            background: #eef5ff;

            color: #1263cf;

            padding: 7px 12px;

            border-radius: 8px;

            font-family: inherit;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            transition: all 0.2s ease;

            white-space: nowrap;
        }

        .btn-detail:hover {
            background: #dcecff;

            color: #0758bd;
        }

        /* ========================================
                       DETAIL SECTION TITLE
                    ======================================== */

        .detail-section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .detail-section-title h4 {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
            color: #172b4d;
        }

        .detail-section-title p {
            margin: 3px 0 0;
            font-size: 10px;
            color: #8a98ad;
        }

        .detail-step-number {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: #edf5ff;
            color: #1263cf;

            font-size: 12px;
            font-weight: 700;
        }


        /* ========================================
                       DETAIL GRID
                    ======================================== */

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .detail-item.full {
            grid-column: 1 / -1;
        }

        .detail-item {
            padding: 12px 14px;

            background: #f8fafc;

            border: 1px solid #e8edf3;

            border-radius: 9px;
        }

        .detail-item span:first-child {
            display: block;

            margin-bottom: 5px;

            font-size: 10px;

            color: #8a98ad;
        }

        .detail-item strong {
            display: block;

            font-size: 12px;

            font-weight: 600;

            color: #263b5b;
        }


        /* ========================================
                       VERIFIED
                    ======================================== */

        .verified-text {
            color: #179447 !important;
        }


        /* ========================================
                       CONDITION
                    ======================================== */

        .condition-result {
            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 13px 15px;

            margin-bottom: 16px;

            background: #fff8e6;

            border: 1px solid #f8df9a;

            border-radius: 9px;
        }

        .condition-label {
            font-size: 11px;

            color: #68778c;
        }

        .condition-status {
            padding: 6px 12px;

            border-radius: 20px;

            background: #fff0b8;

            color: #9a6b00;

            font-size: 11px;

            font-weight: 600;
        }


        /* ========================================
                       EVIDENCE
                    ======================================== */

        .evidence-section,
        .description-section,
        .signature-section {
            margin-top: 18px;
        }

        .evidence-label {
            display: block;

            margin-bottom: 8px;

            font-size: 11px;

            font-weight: 600;

            color: #263b5b;
        }


        /* FOTO */

        .evidence-image {
            width: 100%;
            height: 220px;

            overflow: hidden;

            border: 1px solid #e5eaf0;

            border-radius: 10px;

            background: #f6f8fa;
        }

        .evidence-image img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            display: block;
        }

        .image-placeholder {
            width: 100%;
            height: 100%;

            display: none;

            align-items: center;
            justify-content: center;

            flex-direction: column;

            color: #8a98ad;
        }

        .image-placeholder span {
            font-size: 30px;
        }

        .image-placeholder p {
            margin: 5px 0 0;

            font-size: 10px;
        }


        /* ========================================
                       DESCRIPTION
                    ======================================== */

        .description-box {
            padding: 13px 15px;

            border: 1px solid #e5eaf0;

            border-radius: 9px;

            background: #f8fafc;

            color: #5e7089;

            font-size: 11px;

            line-height: 1.7;
        }


        /* ========================================
                       SIGNATURE
                    ======================================== */

        .signature-box {
            width: 100%;
            height: 140px;

            overflow: hidden;

            border: 1px solid #e5eaf0;

            border-radius: 10px;

            background: #fff;
        }

        .signature-box img {
            width: 100%;
            height: 100%;

            object-fit: contain;
        }

        .signature-placeholder {
            width: 100%;
            height: 100%;

            display: none;

            align-items: center;
            justify-content: center;

            flex-direction: column;

            color: #8a98ad;
        }

        .signature-placeholder span {
            font-size: 28px;
        }

        .signature-placeholder p {
            margin: 5px 0 0;

            font-size: 10px;
        }

        .signature-name {
            margin: 6px 0 0;

            font-size: 10px;

            color: #68778c;
        }


        /* ========================================
                       STATEMENT
                    ======================================== */

        .statement-box {
            display: flex;

            align-items: flex-start;

            gap: 10px;

            margin-top: 18px;

            padding: 13px 15px;

            border: 1px solid #d9eee2;

            border-radius: 9px;

            background: #f2fbf5;
        }

        .statement-check {
            width: 20px;
            height: 20px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 5px;

            background: #18a957;

            color: white;

            font-size: 12px;
            font-weight: 700;
        }

        .statement-box p {
            margin: 1px 0 0;

            font-size: 10px;

            line-height: 1.6;

            color: #41624f;
        }


        /* ========================================
                       STATUS
                    ======================================== */

        .report-status-section {
            padding-top: 4px;
        }

        .status-submitted {
            display: inline-flex;

            align-items: center;

            padding: 7px 12px;

            border-radius: 20px;

            background: #e9f9ef;

            color: #179447;

            font-size: 11px;

            font-weight: 600;
        }

        /* ========================================
               MODAL DETAIL LAPORAN
            ======================================== */

        .detail-modal {
            position: fixed;
            inset: 0;

            width: 100%;
            height: 100%;

            display: none;

            align-items: center;
            justify-content: center;

            padding: 24px;

            box-sizing: border-box;

            background: rgba(15, 32, 55, 0.55);

            z-index: 99999;

            overflow-y: auto;
        }

        /* MODAL AKTIF */
        .detail-modal.show {
            display: flex;
        }


        /* ========================================
               BACKGROUND / OVERLAY
            ======================================== */

        .detail-modal-overlay {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            background: transparent;
        }


        /* ========================================
               BOX MODAL
            ======================================== */

        .detail-modal-content {
            position: relative;

            width: min(850px, 100%);

            max-height: 90vh;

            display: flex;
            flex-direction: column;

            background: #ffffff;

            border-radius: 16px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.20);

            overflow: hidden;

            z-index: 2;

            animation: modalShow 0.2s ease-out;
        }


        /* ANIMASI */

        @keyframes modalShow {

            from {
                opacity: 0;
                transform: translateY(15px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }

        }


        /* ========================================
               HEADER MODAL
            ======================================== */

        .detail-modal-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 20px 24px;

            border-bottom: 1px solid #e8edf3;

            background: #ffffff;
        }


        .detail-modal-header h3 {

            margin: 0;

            font-size: 18px;

            font-weight: 700;

            color: #172b4d;

        }


        .detail-modal-header p {

            margin: 4px 0 0;

            font-size: 12px;

            color: #6f8097;

        }


        /* ========================================
               CLOSE BUTTON
            ======================================== */

        .modal-close {

            width: 34px;
            height: 34px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: none;

            border-radius: 8px;

            background: #f3f6f9;

            color: #63748a;

            font-size: 22px;

            line-height: 1;

            cursor: pointer;

            transition: all 0.2s ease;
        }


        .modal-close:hover {

            background: #e9eef4;

            color: #172b4d;

        }


        /* ========================================
               BODY MODAL
            ======================================== */

        .detail-modal-body {

            flex: 1;

            padding: 22px 24px;

            overflow-y: auto;

            background: #ffffff;
        }


        /* scrollbar */

        .detail-modal-body::-webkit-scrollbar {

            width: 6px;

        }

        .detail-modal-body::-webkit-scrollbar-track {

            background: #f5f7fa;

        }

        .detail-modal-body::-webkit-scrollbar-thumb {

            background: #cbd5e1;

            border-radius: 10px;

        }


        /* ========================================
               DETAIL SECTION
            ======================================== */

        .detail-section {

            padding-bottom: 22px;

            margin-bottom: 22px;

            border-bottom: 1px solid #edf0f4;
        }


        .detail-section:last-child {

            margin-bottom: 0;

            padding-bottom: 0;

            border-bottom: none;

        }


        /* ========================================
               FOOTER
            ======================================== */

        .detail-modal-footer {

            display: flex;

            justify-content: flex-end;

            padding: 14px 24px;

            border-top: 1px solid #e8edf3;

            background: #ffffff;
        }


        .btn-close-detail {

            padding: 9px 20px;

            border: none;

            border-radius: 8px;

            background: #0b5db7;

            color: white;

            font-family: inherit;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s ease;
        }


        .btn-close-detail:hover {

            background: #084d98;

        }


        /* ========================================
               MOBILE
            ======================================== */

        @media (max-width: 600px) {

            .detail-modal {

                padding: 12px;

                align-items: center;

            }


            .detail-modal-content {

                width: 100%;

                max-height: 94vh;

                border-radius: 14px;

            }


            .detail-modal-header {

                padding: 16px 18px;

            }


            .detail-modal-header h3 {

                font-size: 16px;

            }


            .detail-modal-body {

                padding: 18px;

            }


            .detail-modal-footer {

                padding: 12px 18px;

            }

        }

        /* ========================================
                                                           RESPONSIVE
                                                        ======================================== */

        @media (max-width: 900px) {

            .history-toolbar {
                flex-direction: column;

                align-items: stretch;
            }

            .history-filter {
                width: fit-content;
            }

            .history-search {
                width: 100%;

                box-sizing: border-box;
            }

        }

        @media (max-width: 600px) {

            .detail-modal {
                padding: 10px;
            }

            .detail-modal-content {
                max-height: 94vh;

                border-radius: 13px;
            }

            .detail-modal-header {
                padding: 16px;
            }

            .detail-modal-body {
                padding: 18px 16px;
            }

            .detail-modal-footer {
                padding: 12px 16px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .evidence-image {
                height: 190px;
            }

        }
    </style>

    {{-- ========================================
     MODAL DETAIL LAPORAN
======================================== --}}

    <div class="detail-modal" id="detailModal">

        <div class="detail-modal-overlay" onclick="closeDetail()"></div>

        <div class="detail-modal-content">

            {{-- HEADER --}}
            <div class="detail-modal-header">

                <div>
                    <h3>Detail Laporan</h3>

                    <p id="detailReportId">
                        RPT-2024-089
                    </p>
                </div>

                <button type="button" class="modal-close" onclick="closeDetail()">
                    &times;
                </button>

            </div>


            {{-- BODY --}}
            <div class="detail-modal-body">

                {{-- ========================================
                 STEP 1
                 INFORMASI PELAPOR
            ======================================== --}}

                <div class="detail-section">

                    <div class="detail-section-title">

                        <div class="detail-step-number">
                            1
                        </div>

                        <div>
                            <h4>Informasi Pelapor</h4>
                            <p>Data pelapor laporan</p>
                        </div>

                    </div>


                    <div class="detail-grid">

                        <div class="detail-item">
                            <span>Nama Pelapor</span>
                            <strong>Budi Santoso</strong>
                        </div>

                        <div class="detail-item">
                            <span>ID Karyawan</span>
                            <strong>EMP001</strong>
                        </div>

                        <div class="detail-item">
                            <span>Tanggal Pengembalian</span>
                            <strong>09 Desember 2026</strong>
                        </div>

                        <div class="detail-item">
                            <span>Status Lokasi</span>
                            <strong class="verified-text">
                                ● Lokasi Terverifikasi
                            </strong>
                        </div>

                        <div class="detail-item full">
                            <span>Bidang</span>
                            <strong>Listrik</strong>
                        </div>

                    </div>

                </div>


                {{-- ========================================
                 STEP 2
                 DATA BARANG
            ======================================== --}}

                <div class="detail-section">

                    <div class="detail-section-title">

                        <div class="detail-step-number">
                            2
                        </div>

                        <div>
                            <h4>Data Barang</h4>
                            <p>Informasi barang yang dikembalikan</p>
                        </div>

                    </div>


                    <div class="detail-grid">

                        {{-- NAMA PEKERJAAN --}}
                        <div class="detail-item full">
                            <span>Nama Pekerjaan</span>

                            <strong>
                                Pemeliharaan Jaringan Distribusi
                            </strong>
                        </div>


                        {{-- NAMA BARANG --}}
                        <div class="detail-item">
                            <span>Nama Barang</span>

                            <strong>
                                Kabel NYY 4 x 16 mm
                            </strong>
                        </div>


                        {{-- ITEM NUMBER --}}
                        <div class="detail-item">
                            <span>Item Number</span>

                            <strong>
                                1000123456
                            </strong>
                        </div>


                        {{-- JENIS PENGEMBALIAN --}}
                        <div class="detail-item">
                            <span>Jenis Pengembalian</span>

                            <strong>
                                Barang Pasca Pakai
                            </strong>
                        </div>


                        {{-- KONDISI BARANG INVESTASI / OPERASI --}}
                        <div class="detail-item">
                            <span>Kondisi Barang</span>

                            <span class="condition-badge investasi">
                                Operasi
                            </span>
                        </div>


                        {{-- JUMLAH --}}
                        <div class="detail-item">
                            <span>Jumlah Barang</span>

                            <strong>
                                5
                            </strong>
                        </div>


                        {{-- SATUAN --}}
                        <div class="detail-item">
                            <span>Satuan</span>

                            <strong>
                                Meter
                            </strong>
                        </div>


                        {{-- LOKASI GUDANG --}}
                        <div class="detail-item">
                            <span>Lokasi Gudang</span>

                            <strong>
                                Gudang PLN NPS Surabaya
                            </strong>
                        </div>


                        {{-- NOMOR WO --}}
                        <div class="detail-item">
                            <span>Nomor Work Order (WO)</span>

                            <strong>
                                WO-2026-00125
                            </strong>
                        </div>

                    </div>

                </div>


                {{-- ========================================
                 STEP 3
                 KONDISI & BUKTI
            ======================================== --}}

                <div class="detail-section">

                    <div class="detail-section-title">

                        <div class="detail-step-number">
                            3
                        </div>

                        <div>
                            <h4>Kondisi & Bukti</h4>
                            <p>Kondisi barang dan bukti pengembalian</p>
                        </div>

                    </div>


                    {{-- KONDISI --}}
                    <div class="condition-result">

                        <span class="condition-label">
                            Kondisi Barang
                        </span>

                        <span class="condition-status">
                            Rusak
                        </span>

                    </div>


                    {{-- FOTO BUKTI --}}
                    <div class="evidence-section">

                        <span class="evidence-label">
                            Foto Bukti
                        </span>

                        <div class="evidence-image">

                            <img src="{{ asset('assets/images/trafo.png') }}" alt="Foto bukti barang"
                                onerror="
                                this.style.display='none';
                                this.nextElementSibling.style.display='flex';
                            ">

                            <div class="image-placeholder">

                                <span>📷</span>

                                <p>
                                    Foto bukti barang
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="description-section">

                        <span class="evidence-label">
                            Deskripsi Tambahan
                        </span>

                        <div class="description-box">

                            Barang mengalami kerusakan pada bagian
                            luar setelah digunakan dalam pekerjaan.
                            Kondisi barang akan dikembalikan ke gudang
                            untuk dilakukan pemeriksaan lebih lanjut.

                        </div>

                    </div>


                    {{-- TANDA TANGAN --}}
                    <div class="signature-section">

                        <span class="evidence-label">
                            Tanda Tangan
                        </span>

                        <div class="signature-box">

                            <img src="{{ asset('assets/images/ttd.png') }}" alt="Tanda tangan pelapor"
                                onerror="
                                this.style.display='none';
                                this.nextElementSibling.style.display='flex';
                            ">

                            <div class="signature-placeholder">

                                <span>✍</span>

                                <p>
                                    Tanda tangan pelapor
                                </p>

                            </div>

                        </div>

                        <p class="signature-name">
                            Budi Santoso
                        </p>

                    </div>


                    {{-- PERNYATAAN --}}
                    <div class="statement-box">

                        <div class="statement-check">
                            ✓
                        </div>

                        <p>
                            Saya menyatakan bahwa informasi yang
                            diberikan benar dan akurat.
                        </p>

                    </div>

                </div>


                {{-- ========================================
                 STATUS
            ======================================== --}}

                <div class="detail-section report-status-section">

                    <span class="evidence-label">
                        Status Laporan
                    </span>

                    <div class="status-submitted">

                        ✓ Laporan Sudah Disubmit

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="detail-modal-footer">

                <button type="button" class="btn-close-detail" onclick="closeDetail()">
                    Tutup
                </button>

            </div>

        </div>

    </div>

    {{-- ========================================
     JAVASCRIPT
======================================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const filterButtons =
                document.querySelectorAll('.filter-btn');

            const rows =
                document.querySelectorAll('#historyTableBody tr');

            const searchInput =
                document.getElementById('historySearch');

            const emptyState =
                document.getElementById('historyEmpty');


            let currentFilter = 'semua';


            /* ========================================
               FILTER
            ======================================== */

            function filterHistory() {

                const searchValue =
                    searchInput.value.toLowerCase().trim();

                let visibleCount = 0;


                rows.forEach(function(row) {

                    const category =
                        row.dataset.category;

                    const text =
                        row.textContent.toLowerCase();


                    const matchesFilter =
                        currentFilter === 'semua' ||
                        category === currentFilter;

                    const matchesSearch =
                        text.includes(searchValue);


                    if (matchesFilter && matchesSearch) {

                        row.style.display = '';

                        visibleCount++;

                    } else {

                        row.style.display = 'none';

                    }

                });


                /* EMPTY STATE */

                if (visibleCount === 0) {

                    emptyState.style.display = 'block';

                } else {

                    emptyState.style.display = 'none';

                }

            }


            /* ========================================
               FILTER BUTTON
            ======================================== */

            filterButtons.forEach(function(button) {

                button.addEventListener('click', function() {

                    filterButtons.forEach(function(btn) {

                        btn.classList.remove('active');

                    });


                    this.classList.add('active');


                    currentFilter =
                        this.dataset.filter;


                    filterHistory();

                });

            });


            /* ========================================
               SEARCH
            ======================================== */

            searchInput.addEventListener(
                'input',
                filterHistory
            );

        });

        /* ========================================
           DETAIL MODAL
        ======================================== */

        function openDetail(reportId) {

            const modal = document.getElementById('detailModal');

            const reportIdElement =
                document.getElementById('detailReportId');


            // Ubah ID laporan pada header modal
            if (reportIdElement) {
                reportIdElement.textContent = reportId;
            }


            // Tampilkan modal
            modal.classList.add('show');


            // Kunci scroll halaman belakang
            document.body.style.overflow = 'hidden';

        }


        function closeDetail() {

            const modal =
                document.getElementById('detailModal');

            modal.classList.remove('show');

            document.body.style.overflow = '';
        }


        /* CLOSE DENGAN ESC */

        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {

                closeDetail();

            }

        });
    </script>

@endsection
