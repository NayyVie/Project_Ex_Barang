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

                <button class="btn btn-primary" type="button" id="btnBuatMutasi">
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

                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="7" />
                    <path d="M20 20l-4-4" />
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

    {{-- =========================================================
     MODAL BUAT MUTASI ANTAR GUDANG
========================================================= --}}
    <div class="mutasi-modal-overlay" id="mutasiModal">

        <div class="mutasi-modal">

            {{-- HEADER MODAL --}}
            <div class="mutasi-modal-header">

                <div>
                    <h2>Formulir Mutasi Stok Antar Gudang (Inter-Storeroom Transfer)</h2>

                    <p>
                        Pemindahan material suku cadang antar storeroom pembangkit
                        terhubung ke IBM Maximo
                    </p>
                </div>

                <button type="button" class="mutasi-modal-close" id="closeMutasiModal">
                    ×
                </button>

            </div>


            {{-- BODY MODAL --}}
            <div class="mutasi-modal-body">

                {{-- MAXIMO BANNER --}}
                <div class="mutasi-maximo-banner">

                    <div class="mutasi-banner-left">

                        <span class="mutasi-transfer-icon">⇄</span>

                        <strong>
                            Transfer Antar Storeroom IBM Maximo MIF
                        </strong>

                    </div>

                    <span class="mutasi-mif-status">
                        MIF STOREROOM
                    </span>

                </div>


                {{-- FORM --}}
                <form id="formMutasiGudang">

                    {{-- NOMOR REFERENSI --}}
                    <div class="mutasi-form-group">

                        <label>
                            Nomor Referensi Transfer Gudang *
                        </label>

                        <input type="text" id="mutasiReference" name="reference" value="TRF-UNIT-2026-0774" readonly>

                    </div>


                    {{-- GUDANG ASAL & TUJUAN --}}
                    <div class="mutasi-form-grid">

                        <div class="mutasi-form-group">

                            <label>
                                Gudang Asal (Pengirim) *
                            </label>

                            <select id="mutasiGudangAsal" name="gudang_asal">

                                <option selected>
                                    Gudang Utama Sentral (PLTU 1-2)
                                </option>

                                <option>
                                    Gudang Satelit PLTU Unit 3-4
                                </option>

                                <option>
                                    Gudang PLTU Unit 3-4
                                </option>

                                <option>
                                    Gudang BOP
                                </option>

                            </select>

                        </div>


                        <div class="mutasi-form-group">

                            <label>
                                Gudang Tujuan (Penerima) *
                            </label>

                            <select id="mutasiGudangTujuan" name="gudang_tujuan">

                                <option selected>
                                    Gudang Satelit PLTU Unit 3-4
                                </option>

                                <option>
                                    Gudang Utama Sentral (PLTU 1-2)
                                </option>

                                <option>
                                    Gudang PLTU Unit 3-4
                                </option>

                                <option>
                                    Gudang BOP
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- PETUGAS PENGIRIM & PENERIMA --}}
                    <div class="mutasi-form-grid">

                        <div class="mutasi-form-group">

                            <label>
                                Petugas Pengirim (Gudang Asal) *
                            </label>

                            <input type="text" id="mutasiPetugasPengirim" name="petugas_pengirim"
                                value="Bambang Supriyanto">

                        </div>


                        <div class="mutasi-form-group">

                            <label>
                                Petugas Penerima (Gudang Tujuan) *
                            </label>

                            <input type="text" id="mutasiPetugasPenerima" name="petugas_penerima"
                                value="Ahmad Fauzi (Logistik Unit 3)">

                        </div>

                    </div>


                    {{-- MATERIAL --}}
                    <div class="mutasi-form-group">

                        <label>
                            Pilih Material Spare Part *
                        </label>

                        <select id="mutasiMaterial" name="material">

                            <option selected>
                                MP-081201 - Mechanical Seal Cartridge Type D-65mm for Boiler Feed Pump (Stok Saat Ini: 6
                                SET)
                            </option>

                            <option>
                                CH-012903 - Turbine Lube Oil ISO VG 46 Extreme Pressure (Stok Saat Ini: 400 LTR)
                            </option>

                            <option>
                                BR-024781 - Bearing Industrial 6312 ZZ (Stok Saat Ini: 6 PCS)
                            </option>

                        </select>

                        <div class="mutasi-material-info">
                            Lokasi Rak Awal:
                            <strong>RAK-A-01-02</strong>
                            |
                            Stok Tersedia:
                            <strong>6 SET</strong>
                        </div>

                    </div>


                    {{-- JUMLAH --}}
                    <div class="mutasi-form-group">

                        <label>
                            Jumlah Kuantitas Dismutasi (SET) *
                        </label>

                        <input type="number" id="mutasiQuantity" name="quantity" value="2" min="1">

                    </div>


                    {{-- ALASAN --}}
                    <div class="mutasi-form-group">

                        <label>
                            Alasan Mutasi Antar Gudang
                        </label>

                        <input type="text" id="mutasiReason" name="reason"
                            value="Buffering stok suku cadang menghadapi jadwal overhaul berkala">

                    </div>


                    {{-- ACTION --}}
                    <div class="mutasi-modal-footer">

                        <button type="button" class="mutasi-btn-cancel" id="cancelMutasiModal">
                            Batal
                        </button>

                        <button type="submit" class="mutasi-btn-save">
                            Simpan Mutasi &amp; Update Maximo
                        </button>

                    </div>

                </form>

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
            height: 37px;

            flex: 1;

            min-width: 200px;

            position: relative;
        }

        .search-box svg {
            position: absolute;

            width: 17px;
            height: 17px;

            left: 13px;
            top: 10px;

            color: #6e7d96;
        }

        .search-box input {
            width: 100%;
            height: 100%;

            padding: 0 12px 0 39px;

            border: 1px solid #dfe5ec;
            border-radius: 7px;

            outline: none;

            background: #f8fafc;

            color: #95a1b2;

            font-family: inherit;
            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #738099;
        }

        .search-box input:focus {
            border-color: #2873d8;
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

        /* =========================================================
                                                                                                   MODAL MUTASI ANTAR GUDANG
                                                                                                ========================================================= */

        .mutasi-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;

            display: none;
            align-items: center;
            justify-content: center;

            padding: 20px;

            background: rgba(23, 43, 77, 0.55);

            backdrop-filter: blur(4px);
        }

        .mutasi-modal-overlay.show {
            display: flex;
        }


        .mutasi-modal {
            width: 100%;
            max-width: 670px;

            max-height: calc(100vh - 20px);

            background: #ffffff;

            border: 1px solid #dce6f0;

            border-radius: 16px;

            box-shadow:
                0 20px 60px rgba(23, 43, 77, 0.22);

            overflow: hidden;

            display: flex;
            flex-direction: column;
            animation: mutasiModalIn .2s ease;
        }

        @keyframes mutasiModalIn {
            from {
                opacity: 0;
                transform: translateY(10px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }


        /* =========================================================
                                                                                                   MODAL HEADER
                                                                                                ========================================================= */

        .mutasi-modal-header {
            min-height: 78px;

            padding: 17px 22px;

            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            gap: 15px;

            background: #fffff;

            border-bottom: 1px solid #e5edf5;
        }

        .mutasi-modal-header h2 {
            margin: 0;

            color: #172b4d;

            font-size: 18px;
            font-weight: 700;

            line-height: 1.35;
        }

        .mutasi-modal-header p {
            margin: 5px 0 0;

            color: #7890ae;

            font-size: 11px;

            line-height: 1.4;
        }

        .mutasi-modal-close {
            width: 28px;
            height: 28px;

            border: none;

            background: #f3f7fb;

            color: #7890ae;

            font-size: 21px;

            line-height: 1;

            cursor: pointer;

            flex-shrink: 0;

            padding: 0;
            transition: .2s ease;
        }

        .mutasi-modal-close:hover {
            background: #e8f1fa;
            color: #172b4d;
        }


        /* =========================================================
                                                                                                   MODAL BODY
                                                                                                ========================================================= */

        .mutasi-modal-body {
            padding: 23px;

            overflow-y: auto;
        }

        /* =========================================================
                                                                                                   MAXIMO BANNER
                                                                                                ========================================================= */

        .mutasi-maximo-banner {
            min-height: 46px;

            padding: 0 13px;

            margin-bottom: 18px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 10px;

            border-radius: 8px;

            background: #f0f7ff;

            border: 1px solid #cfe3fa;
        }

        .mutasi-banner-left {
            display: flex;
            align-items: center;

            gap: 9px;
        }

        .mutasi-transfer-icon {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            background: #dcecff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0874c9;
            font-size: 18px;
        }

        .mutasi-banner-left strong {
            color: #0758bd;

            font-size: 11px;

            font-weight: 700;
        }

        .mutasi-mif-status {
            color: #a6a4ac;

            font-size: 10px;

            font-weight: 700;
        }


        /* =========================================================
                                                                                                   FORM
                                                                                                ========================================================= */

        .mutasi-form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 16px;
        }

        .mutasi-form-group {
            margin-bottom: 15px;
        }

        .mutasi-form-group label {
            display: block;

            margin-bottom: 6px;

            color: #526b87;

            font-size: 11px;

            font-weight: 700;
        }

        .mutasi-form-group input,
        .mutasi-form-group select {
            width: 100%;

            height: 35px;

            box-sizing: border-box;

            border: 1px solid #d7e2ee;

            border-radius: 9px;

            outline: none;

            background: #f8fafc;

            color: #334f70;

            padding: 0 12px;

            font-family: inherit;

            font-size: 10px;
        }

        .mutasi-form-group input:focus,
        .mutasi-form-group select:focus {
            border-color: #0878c8;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(8, 116, 201, .08);
        }

        .mutasi-form-group input[readonly] {
            color: #0b87e0;

            font-weight: 700;
        }

        .mutasi-form-group select {
            cursor: pointer;

            appearance: auto;
        }

        .mutasi-form-group select option {
            background: #f8fafc;

            color: #334f70;
        }


        /* =========================================================
                                                                                                   MATERIAL INFO
                                                                                                ========================================================= */

        .mutasi-material-info {
            margin-top: 6px;

            color: #6f8097;

            font-size: 9px;

            line-height: 1.4;
        }

        .mutasi-material-info strong {
            color: #788ba2;

            font-weight: 600;
        }


        /* =========================================================
                                                                                                   FOOTER BUTTON
                                                                                                ========================================================= */

        .mutasi-modal-footer {
            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 9px;

            margin-top: 6px;

            padding-top: 12px;

            border-top: 1px solid #e5edf5;
        }

        .mutasi-btn-cancel {
            height: 30px;

            padding: 0 12px;

            border: 1px solid #d7e2ee;

            border-radius: 8px;

            background: #ffffff;

            color: #526b87;

            font-family: inherit;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;
        }

        .mutasi-btn-cancel:hover {
            background: #f3f7fb;
        }

        .mutasi-btn-save {
            height: 30px;

            padding: 0 14px;

            border: none;

            border-radius: 8px;

            background: linear-gradient(135deg,
                    #1653eb,
                    #0758dc);

            color: #ffffff;

            font-family: inherit;

            font-size: 10px;

            font-weight: 700;

            cursor: pointer;

            box-shadow: 0 4px 10px rgba(22, 83, 235, .20);
        }

        .mutasi-btn-save:hover {
            background: linear-gradient(135deg,
                    #2462f2,
                    #0864eb);
        }


        /* =========================================================
                                                                                                   RESPONSIVE MODAL
                                                                                                ========================================================= */

        @media (max-width: 768px) {

            .mutasi-modal-overlay {
                padding: 10px;
            }

            .mutasi-modal {
                max-height: calc(100vh - 20px);
            }

            .mutasi-modal-header {
                padding: 15px 17px;
            }

            .mutasi-modal-header h2 {
                font-size: 15px;
            }

            .mutasi-modal-body {
                padding: 17px;
            }

            .mutasi-form-grid {
                grid-template-columns: 1fr;

                gap: 0;
            }

            .mutasi-modal-footer {
                flex-direction: column-reverse;

                align-items: stretch;
            }

            .mutasi-btn-cancel,
            .mutasi-btn-save {
                width: 100%;
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const btnBuatMutasi =
                document.getElementById('btnBuatMutasi');

            const mutasiModal =
                document.getElementById('mutasiModal');

            const closeMutasiModal =
                document.getElementById('closeMutasiModal');

            const cancelMutasiModal =
                document.getElementById('cancelMutasiModal');

            const formMutasiGudang =
                document.getElementById('formMutasiGudang');


            /* =====================================================
               BUKA MODAL
            ===================================================== */

            if (btnBuatMutasi) {

                btnBuatMutasi.addEventListener('click', function() {

                    mutasiModal.classList.add('show');

                    document.body.style.overflow = 'hidden';

                });

            }


            /* =====================================================
               TUTUP MODAL
            ===================================================== */

            function closeModal() {

                if (mutasiModal) {

                    mutasiModal.classList.remove('show');

                }

                document.body.style.overflow = '';

            }


            if (closeMutasiModal) {

                closeMutasiModal.addEventListener(
                    'click',
                    closeModal
                );

            }


            if (cancelMutasiModal) {

                cancelMutasiModal.addEventListener(
                    'click',
                    closeModal
                );

            }


            /* =====================================================
               KLIK AREA LUAR MODAL
            ===================================================== */

            if (mutasiModal) {

                mutasiModal.addEventListener(
                    'click',
                    function(event) {

                        if (event.target === mutasiModal) {

                            closeModal();

                        }

                    }
                );

            }


            /* =====================================================
               ESCAPE
            ===================================================== */

            document.addEventListener(
                'keydown',
                function(event) {

                    if (
                        event.key === 'Escape' &&
                        mutasiModal &&
                        mutasiModal.classList.contains('show')
                    ) {

                        closeModal();

                    }

                }
            );


            /* =====================================================
               SUBMIT MUTASI
            ===================================================== */

            if (formMutasiGudang) {

                formMutasiGudang.addEventListener(
                    'submit',
                    function(event) {

                        event.preventDefault();

                        const gudangAsal =
                            document.getElementById(
                                'mutasiGudangAsal'
                            ).value;

                        const gudangTujuan =
                            document.getElementById(
                                'mutasiGudangTujuan'
                            ).value;

                        const quantity =
                            document.getElementById(
                                'mutasiQuantity'
                            ).value;


                        /* Validasi gudang */

                        if (gudangAsal === gudangTujuan) {

                            alert(
                                'Gudang asal dan gudang tujuan tidak boleh sama.'
                            );

                            return;

                        }


                        /* Validasi quantity */

                        if (
                            quantity === '' ||
                            Number(quantity) <= 0
                        ) {

                            alert(
                                'Jumlah kuantitas mutasi harus lebih dari 0.'
                            );

                            return;

                        }


                        /*
                         * Untuk sementara tampilkan konfirmasi.
                         * Nanti bagian ini bisa diganti dengan
                         * AJAX / Laravel Controller / Database.
                         */

                        alert(
                            'Mutasi antar gudang berhasil disimpan dan siap disinkronkan ke Maximo.'
                        );

                        closeModal();

                    }
                );

            }

        });
    </script>

@endsection
