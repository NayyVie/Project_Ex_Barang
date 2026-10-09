@extends('layouts.app-admin')

@section('title', 'Penerimaan Barang')

@section('page-title', 'Penerimaan Barang (PO)')

@section('content')

    <style>
        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   PENERIMAAN BARANG
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        .receipt-page {
            width: 100%;
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   PAGE HEADER
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        .receipt-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .btn-receipt {
            height: 34px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;

            padding: 0 13px;

            border-radius: 6px;

            font-family: inherit;
            font-size: 10px;
            font-weight: 600;

            text-decoration: none;
            cursor: pointer;

            transition: .2s;
        }

        .btn-new-receipt {
            color: #ffffff;
            background: #155eef;
            border: 1px solid #155eef;
        }

        /* .btn-new-receipt span {
                                                                                    font-size: 20px;
                                                                                                                                                                                                                                                                                margin-right: 7px;
                                                                                                                                                                                                                                                                                font-weight: 400;
                                                                                                                                                                                                                                                                            } */


        .btn-new-receipt:hover {
            background: #0f4dcc;
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   SUMMARY CARDS
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        .receipt-summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;

            margin-bottom: 16px;
        }

        .receipt-card {
            min-height: 145px;

            padding: 20px;

            border-radius: 14px;

            background: #ffffff;
            border: 1px solid #e7edf3;

            position: relative;
            overflow: hidden;
        }

        .receipt-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 10px;
        }

        .receipt-card-label {
            color: #64748b;

            font-size: 12px;
            font-weight: 600;

            text-transform: uppercase;
            letter-spacing: .3px;
        }

        .receipt-card-icon {
            width: 26px;
            height: 26px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 6px;

            font-size: 13px;
        }

        .receipt-icon-green {
            color: #00c896;
            background: rgba(0, 200, 150, .10);
        }

        .receipt-icon-blue {
            color: #00a8e8;
            background: rgba(0, 168, 232, .10);
        }

        .receipt-icon-purple {
            color: #a78bfa;
            background: rgba(139, 92, 246, .10);
        }

        .receipt-icon-violet {
            color: #c084fc;
            background: rgba(168, 85, 247, .10);
        }

        .receipt-card-value {
            color: #000000;

            font-size: 27px;
            font-weight: 700;

            line-height: 1.1;

            margin-bottom: 5px;
        }

        .receipt-card-sub {
            color: #a0aabb;

            font-size: 11px;
        }

        .receipt-card-sub strong {
            color: #aab6c7;
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   FILTER BAR
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        .receipt-filter {
            min-height: 70px;

            padding: 13px 16px;

            display: flex;
            align-items: center;
            gap: 10px;

            background: #ffff;

            border: 1px solid #e8edf3;

            border-radius: 16px;

            margin-bottom: 18px;
            box-shadow: 0 2px 5px rgba(15, 23, 42, 0.06);
        }

        .receipt-search {
            height: 37px;

            flex: 1;

            min-width: 200px;

            position: relative;
        }

        .receipt-search svg {
            position: absolute;

            width: 17px;
            height: 17px;

            left: 13px;
            top: 10px;

            color: #6e7d96;
        }

        .receipt-search input {
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

        .receipt-search input::placeholder {
            color: #738099;
        }

        .receipt-search input:focus {
            border-color: #2873d8;
        }

        .receipt-select {
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

        .receipt-select:focus {
            border-color: #2873d8;
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



        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   TABLE
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        .receipt-table-wrapper {
            /* width: 100%;
                                                                                                                                                        overflow-x: auto; */
            background: #ffffff;

            border: 1px solid #e8edf5;
            box-shadow: 0 3px 12px rgba(15, 39, 70, 0.04);

            border-radius: 18px;

            overflow-x: auto;
        }

        .receipt-table {
            width: 100%;
            min-width: 1100px;

            border-collapse: collapse;
        }

        .receipt-table thead th {
            padding: 12px 11px;

            background: #fafbfd;

            color: #8795aa;

            border-bottom: 1px solid #edf1f6;

            text-align: left;

            font-size: 10px;
            font-weight: 600;

            white-space: nowrap;
        }

        .receipt-table tbody td {
            padding: 13px 11px;

            color: #526680;

            border-bottom: 1px solid #f0f3f7;

            font-size: 11px;
            white-space: nowrap;

            /* vertical-align: middle; */
        }

        .receipt-table tr:last-child td {
            border-bottom: none;
        }

        .receipt-table tbody tr:hover {
            background: rgba(255, 255, 255, .015);
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   TABLE CONTENT
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        .receipt-number {
            color: #075dcc;

            font-weight: 700;

            line-height: 1.4;
        }

        .receipt-number small {
            display: block;

            color: #70819b;

            margin-top: 2px;

            font-size: 8px;
            font-weight: 400;
        }

        .document-number {
            color: #00a8e8;

            font-weight: 700;

            line-height: 1.4;
        }

        .vendor-name {
            color: #1e2227e3;

            font-weight: 600;

            line-height: 1.4;
        }

        .vendor-name small {
            display: block;

            color: #74839a;

            font-size: 8px;

            font-weight: 400;
        }

        .material-number {
            color: #00a8e8;

            font-size: 10px;

            font-weight: 600;

            margin-bottom: 3px;
        }

        .material-name {
            color: #70819b;

            line-height: 1.4;
        }

        .location-main {
            color: #1b304d;

            font-weight: 600;
        }

        .location-sub {
            color: #70819b;

            font-size: 11px;

            margin-top: 2px;
        }

        .quantity-positive {
            color: #00d39b;

            font-weight: 700;
        }

        .quantity-unit {
            color: #7d8ba0;

            margin-left: 2px;
        }

        .date-time {
            color: #526680;

            white-space: nowrap;
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   STATUS BADGES
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;

            padding: 4px 7px;

            border-radius: 20px;

            font-size: 8px;
            font-weight: 600;

            white-space: nowrap;
        }

        .status-ok {
            color: #16d39a;

            background: rgba(16, 185, 129, .09);

            border: 1px solid rgba(16, 185, 129, .22);
        }

        .status-sync {
            color: #00d39b;

            background: rgba(16, 185, 129, .08);

            border: 1px solid rgba(16, 185, 129, .20);
        }

        .status-process {
            color: #fbbf24;

            background: rgba(245, 158, 11, .08);

            border: 1px solid rgba(245, 158, 11, .20);
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   ACTION BUTTON
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        .btn-detail {

            /* padding: 0 9px; */

            padding: 7px 12px;
            border-radius: 8px;

            border: none;

            background: #eef5ff;

            color: #1263cf;

            font-family: inherit;
            font-size: 11px;
            font-weight: 600;

            cursor: pointer;

            white-space: nowrap;
            transition: all 0.2s ease;
        }

        .btn-detail:hover {
            background: #dcecff;
            color: #0758bd;
        }


        /* =========================================================
                                                                                                                                                                                                                                                                                                                                   RESPONSIVE
                                                                                                                                                                                                                                                                                                                                   ========================================================= */

        @media (max-width: 1150px) {

            .receipt-summary {
                grid-template-columns: repeat(2, 1fr);
            }

            .receipt-actions {
                width: 100%;
            }

        }

        @media (max-width: 700px) {

            .receipt-summary {
                grid-template-columns: 1fr;
            }

            .receipt-filter {
                flex-wrap: wrap;
            }

            .receipt-search {
                width: 100%;
                flex-basis: 100%;
            }

            .receipt-select {
                flex: 1;
            }


        }
    </style>


    <div class="receipt-page">

        {{-- =====================================================
         PAGE HEADER
         ===================================================== --}}

        <div class="receipt-actions">
            <button type="button" class="btn-receipt btn-new-receipt" onclick="openPenerimaanModal()">
                + Penerimaan Barang Baru
            </button>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY CARDS
         ===================================================== --}}

    <div class="receipt-summary">


        {{-- TOTAL PENERIMAAN --}}

        <div class="receipt-card">

            <div class="receipt-card-top">

                <span class="receipt-card-label">
                    Total Penerimaan
                </span>

                <span class="receipt-card-icon receipt-icon-green">
                    ▣
                </span>

            </div>

            <div class="receipt-card-value">
                3
            </div>

            <div class="receipt-card-sub">
                transaksi batch
            </div>

            <div class="receipt-card-sub">
                Total 8 unit fisik material diterima
            </div>

        </div>


        {{-- VERIFIKASI QC --}}

        <div class="receipt-card">

            <div class="receipt-card-top">

                <span class="receipt-card-label">
                    Verifikasi QC Fisik
                </span>

                <span class="receipt-card-icon receipt-icon-blue">
                    ◇
                </span>

            </div>

            <div class="receipt-card-value">
                100%
            </div>

            <div class="receipt-card-sub">
                lolos inspeksi
            </div>

            <div class="receipt-card-sub">
                Semua dokumen Surat Jalan & Sertifikat COA lengkap
            </div>

        </div>


        {{-- MAXIMO --}}

        <div class="receipt-card">

            <div class="receipt-card-top">

                <span class="receipt-card-label">
                    Integrasi Maximo MIF
                </span>

                <span class="receipt-card-icon receipt-icon-blue">
                    ⟳
                </span>

            </div>

            <div class="receipt-card-value">
                3 / 3
            </div>

            <div class="receipt-card-sub">
                synced
            </div>

            <div class="receipt-card-sub">
                Stok saldo Maximo otomatis bertambah real-time
            </div>

        </div>


        {{-- VENDOR --}}

        <div class="receipt-card">

            <div class="receipt-card-top">

                <span class="receipt-card-label">
                    Vendor Aktif
                </span>

                <span class="receipt-card-icon receipt-icon-purple">
                    ♧
                </span>

            </div>

            <div class="receipt-card-value">
                3
            </div>

            <div class="receipt-card-sub">
                mitra supplier
            </div>

            <div class="receipt-card-sub">
                Penerimaan pengadaan mekanikal, C&I, dan pelumas
            </div>

        </div>

    </div>


    {{-- =====================================================
         SEARCH + FILTER
         ===================================================== --}}

    <div class="receipt-filter">


        <div class="receipt-search">

            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7" />
                <path d="M20 20l-4-4" />
            </svg>

            <input type="text" placeholder="Cari No TRX, No PO Maximo, No Surat Jalan, Vendor, Item...">

        </div>


        <select class="receipt-select" id="statusFilter">

            <option value="all">
                Semua Status Maximo
            </option>

            <option value="synced">
                MIF Synced
            </option>

            <option value="process">
                Dalam Proses
            </option>

        </select>


        <button type="button" class="btn-print" onclick="window.print()">
            <img src="{{ asset('assets/images/icon-print2.png') }}" alt="Icon Print" style="width: 20px; height: 20px">
            Cetak Rekap Penerimaan
        </button>

    </div>


    {{-- =====================================================
         TABLE
         ===================================================== --}}

    <div class="receipt-table-wrapper">

        <table class="receipt-table">

            <thead>

                <tr>

                    <th>
                        No. Penerimaan
                    </th>

                    <th>
                        Ref Dokumen PO & DO
                    </th>

                    <th>
                        Vendor / Supplier
                    </th>

                    <th>
                        Material Spare Part
                    </th>

                    <th>
                        Jumlah Diterima
                    </th>

                    <th>
                        Lokasi Rak Masuk
                    </th>

                    <th>
                        Tanggal & Jam
                    </th>

                    <th>
                        Status QC
                    </th>

                    <th>
                        Sync Maximo
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>


                {{-- =================================================
                         DATA 1
                         ================================================= --}}

                <tr>

                    <td>

                        <div class="receipt-number">
                            TRX-2026-0811
                        </div>

                        <small>
                            14 Sep 2026
                        </small>

                    </td>


                    <td>

                        <div class="document-number">
                            PO-MAX-2026-8812
                        </div>

                        <small>
                            SJ-2026-8812
                        </small>

                    </td>


                    <td>

                        <div class="vendor-name">
                            PT Eade Engineering
                        </div>

                        <small>
                            Indonesia
                        </small>

                    </td>


                    <td>

                        <div class="material-number">
                            MP-081201
                        </div>

                        <div class="material-name">
                            Mechanical Seal Cartridge Type D-65mm for Boiler...
                        </div>

                    </td>


                    <td>

                        <span class="quantity-positive">
                            +2
                        </span>

                        <span class="quantity-unit">
                            SET
                        </span>

                    </td>


                    <td>

                        <div class="location-main">
                            Gudang Utama
                        </div>

                        <div class="location-sub">
                            RAK-A-01-02
                        </div>

                    </td>


                    <td>

                        <span class="date-time">
                            14 Sep 2026, 09:30
                        </span>

                    </td>


                    <td>

                        <span class="status-badge status-ok">
                            LOLOS QC
                        </span>

                    </td>


                    <td>

                        <span class="status-badge status-sync">
                            MIF SYNCED
                        </span>

                    </td>


                    <td>

                        <button type="button" class="btn-detail">
                            Lihat Detail
                        </button>

                    </td>

                </tr>


                {{-- =================================================
                         DATA 2
                         ================================================= --}}

                <tr>

                    <td>

                        <div class="receipt-number">
                            TRX-2026-0812
                        </div>

                        <small>
                            15 Sep 2026
                        </small>

                    </td>


                    <td>

                        <div class="document-number">
                            PO-MAX-2026-8830
                        </div>

                        <small>
                            SJ-2026-8830
                        </small>

                    </td>


                    <td>

                        <div class="vendor-name">
                            PT Safety Indonesia
                        </div>

                        <small>
                            Surabaya
                        </small>

                    </td>


                    <td>

                        <div class="material-number">
                            SE-031844
                        </div>

                        <div class="material-name">
                            Safety Equipment & Protective Material...
                        </div>

                    </td>


                    <td>

                        <span class="quantity-positive">
                            +3
                        </span>

                        <span class="quantity-unit">
                            PCS
                        </span>

                    </td>


                    <td>

                        <div class="location-main">
                            Gudang Sentral
                        </div>

                        <div class="location-sub">
                            RAK-B-02-03
                        </div>

                    </td>


                    <td>

                        <span class="date-time">
                            15 Sep 2026, 10:15
                        </span>

                    </td>


                    <td>

                        <span class="status-badge status-ok">
                            LOLOS QC
                        </span>

                    </td>


                    <td>

                        <span class="status-badge status-sync">
                            MIF SYNCED
                        </span>

                    </td>


                    <td>

                        <button type="button" class="btn-detail">
                            Lihat Detail
                        </button>

                    </td>

                </tr>


                {{-- =================================================
                         DATA 3
                         ================================================= --}}

                <tr>

                    <td>

                        <div class="receipt-number">
                            TRX-2026-0813
                        </div>

                        <small>
                            16 Sep 2026
                        </small>

                    </td>


                    <td>

                        <div class="document-number">
                            PO-MAX-2026-8842
                        </div>

                        <small>
                            SJ-2026-8842
                        </small>

                    </td>


                    <td>

                        <div class="vendor-name">
                            PT Petro Lubricants
                        </div>

                        <small>
                            Jakarta
                        </small>

                    </td>


                    <td>

                        <div class="material-number">
                            CH-012903
                        </div>

                        <div class="material-name">
                            Turbine Lube Oil ISO VG 46 Extreme Pressure
                        </div>

                    </td>


                    <td>

                        <span class="quantity-positive">
                            +3
                        </span>

                        <span class="quantity-unit">
                            DRUM
                        </span>

                    </td>


                    <td>

                        <div class="location-main">
                            Gudang Utama
                        </div>

                        <div class="location-sub">
                            RAK-C-01-01
                        </div>

                    </td>


                    <td>

                        <span class="date-time">
                            16 Sep 2026, 13:45
                        </span>

                    </td>


                    <td>

                        <span class="status-badge status-ok">
                            LOLOS QC
                        </span>

                    </td>


                    <td>

                        <span class="status-badge status-sync">
                            MIF SYNCED
                        </span>

                    </td>


                    <td>

                        <button type="button" class="btn-detail">
                            Lihat Detail
                        </button>

                    </td>

                </tr>


            </tbody>

        </table>

    </div>



    </div>


    <script>
        /* =====================================================
                                                                                                                                                                                                                                                                                                                                   SEARCH TABLE
                                                                                                                                                                                                                                                                                                                                   ===================================================== */

        const receiptSearch = document.getElementById('receiptSearch');

        if (receiptSearch) {

            receiptSearch.addEventListener('input', function() {

                const keyword = this.value.toLowerCase();

                document
                    .querySelectorAll('.receipt-table tbody tr')
                    .forEach(row => {

                        const rowText =
                            row.innerText.toLowerCase();

                        row.style.display =
                            rowText.includes(keyword) ?
                            '' :
                            'none';

                    });

            });

        }


        /* =====================================================
           STATUS FILTER
           ===================================================== */

        const statusFilter =
            document.getElementById('statusFilter');

        if (statusFilter) {

            statusFilter.addEventListener('change', function() {

                const value = this.value;

                document
                    .querySelectorAll('.receipt-table tbody tr')
                    .forEach(row => {

                        const text =
                            row.innerText.toLowerCase();

                        if (value === 'all') {

                            row.style.display = '';

                        } else if (value === 'synced') {

                            row.style.display =
                                text.includes('synced') ?
                                '' :
                                'none';

                        } else if (value === 'process') {

                            row.style.display =
                                text.includes('proses') ?
                                '' :
                                'none';

                        }

                    });

            });

        }
    </script>

    {{-- =========================================================
     MODAL FORMULIR PENERIMAAN BARANG
========================================================= --}}

    <div class="penerimaan-modal-overlay" id="penerimaanModal">

        <div class="penerimaan-modal">

            {{-- HEADER --}}
            <div class="penerimaan-modal-header">

                <div>
                    <h2>Formulir Penerimaan Barang Masuk (Goods Receipt PO)</h2>

                    <p>
                        Pencatatan material suku cadang masuk dari vendor
                        terhubung langsung ke IBM Maximo
                    </p>
                </div>

                <button type="button" class="penerimaan-close" onclick="closePenerimaanModal()">
                    ×
                </button>

            </div>


            {{-- BODY --}}
            <div class="penerimaan-modal-body">

                {{-- MAXIMO INFO --}}
                <div class="maximo-info">

                    <div class="maximo-info-left">

                        <span class="maximo-arrow">↙</span>

                        <strong>
                            Penerimaan Purchase Order (PO) IBM Maximo MIF
                        </strong>

                    </div>

                    <span class="maximo-status">
                        REST MIF ACTIVE
                    </span>

                </div>


                {{-- FORM --}}
                <form id="formPenerimaanBarang">

                    {{-- ROW 1 --}}
                    <div class="form-grid">

                        <div class="form-group">

                            <label>
                                Nomor Purchase Order (PO) Maximo *
                            </label>

                            <input type="text" value="PO-MAX-2026-8809" class="form-input input-green">

                        </div>


                        <div class="form-group">

                            <label>
                                Nomor Surat Jalan (Delivery Order) Supplier *
                            </label>

                            <input type="text" value="DO-VEN-2026/09/577" class="form-input">

                        </div>

                    </div>


                    {{-- ROW 2 --}}
                    <div class="form-grid">

                        <div class="form-group">

                            <label>
                                Nama Vendor / Rekanan Supplier *
                            </label>

                            <input type="text" value="PT Mitra Teknik Nusantara" class="form-input">

                        </div>


                        <div class="form-group">

                            <label>
                                Operator / Petugas Penerima Gudang *
                            </label>

                            <input type="text" value="Bambang Supriyanto" class="form-input">

                        </div>

                    </div>


                    {{-- MATERIAL --}}
                    <div class="form-group">

                        <label>
                            Pilih Material Spare Part *
                        </label>

                        <select class="form-input">

                            <option selected>
                                MP-081201 - Mechanical Seal Cartridge Type D-65mm for Boiler Feed Pump (Stok Saat Ini 12
                                SET)
                            </option>

                            <option>
                                SE-031844 - Safety Equipment & Protective Material
                            </option>

                            <option>
                                CH-012903 - Turbine Lube Oil ISO VG 46 Extreme Pressure
                            </option>

                        </select>

                        <div class="material-info">
                            Spesifikasi: SiC/SiC/Viton, Shaft 65mm, Max Temp 180°C, 40 Bar |
                            Kategori: Mekanikal |
                            Rak Rekomendasi: RAK-A-01-02
                        </div>

                    </div>


                    {{-- ROW 3 --}}
                    <div class="form-grid">

                        <div class="form-group">

                            <label>
                                Kuantitas Diterima (SET) *
                            </label>

                            <input type="number" value="5" min="1" class="form-input input-green">

                        </div>


                        <div class="form-group">

                            <label>
                                Lokasi Rak Penyimpanan Masuk (Bin Location) *
                            </label>

                            <input type="text" value="RAK-A-01-02" class="form-input">

                        </div>

                    </div>


                    {{-- QC --}}
                    <div class="form-group">

                        <label>
                            Hasil Inspeksi Fisik & Quality Control (QC) *
                        </label>


                        <div class="qc-options">

                            <button type="button" class="qc-option active" onclick="selectQC(this)">
                                <span>✓</span>
                                Lolos QC 100%
                            </button>


                            <button type="button" class="qc-option" onclick="selectQC(this)">
                                <span>◷</span>
                                Lolos Bersyarat
                            </button>


                            <button type="button" class="qc-option" onclick="selectQC(this)">
                                <span>♢</span>
                                Karantina Inspeksi
                            </button>

                        </div>

                    </div>


                    {{-- CATATAN --}}
                    <div class="form-group">

                        <label>
                            Catatan Pemeriksaan Fisik & Kesesuaian Sertifikat
                        </label>

                        <textarea class="form-input textarea-input" rows="2">Penerimaan pengadaan spare part PO Maximo, lolos uji visual & verifikasi sertifikat material</textarea>

                    </div>

                </form>

            </div>


            {{-- FOOTER --}}
            <div class="penerimaan-modal-footer">

                <button type="button" class="btn-cancel-penerimaan" onclick="closePenerimaanModal()">
                    Batal
                </button>


                <button type="button" class="btn-save-penerimaan" onclick="savePenerimaan()">
                    Simpan & Sinkronkan ke Maximo
                </button>

            </div>

        </div>

    </div>


    <style>
        /* =========================================================
                                                               OVERLAY
                                                            ========================================================= */

        .penerimaan-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(4, 12, 30, 0.72);
            backdrop-filter: blur(4px);

            /* PENTING: modal tidak tampil saat halaman pertama dibuka */
            display: none;

            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 24px;
        }

        .penerimaan-modal-overlay.show {
            display: flex;
            opacity: 1;
            visibility: visible;
        }


        /* =========================================================
                                                               MODAL
                                                            ========================================================= */

        .penerimaan-modal {

            width: min(672px, 100%);

            max-height: 94vh;

            background: #ffff;

            border: 1px solid #e3eaf2;

            border-radius: 10px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, .45);

            display: flex;

            flex-direction: column;

            overflow: hidden;
        }


        /* =========================================================
                                                               HEADER
                                                            ========================================================= */

        .penerimaan-modal-header {

            padding: 20px 23px 17px;

            background: #ffff;

            border-bottom: 1px solid #e3eaf2;

            display: flex;

            justify-content: space-between;

            align-items: flex-start;
        }

        .penerimaan-modal-header h2 {

            margin: 0;

            color: #161515;

            font-size: 18px;

            font-weight: 700;
        }

        .penerimaan-modal-header p {

            margin: 5px 0 0;

            color: #94a3b8;

            font-size: 12px;
        }


        .penerimaan-close {

            background: transparent;

            border: none;

            color: #94a3b8;

            font-size: 29px;

            line-height: 1;

            cursor: pointer;

            padding: 0;

            margin-left: 15px;
        }

        .penerimaan-close:hover {

            color: #94a3b8b7;
        }


        /* =========================================================
                                                               BODY
                                                            ========================================================= */

        .penerimaan-modal-body {

            padding: 23px;

            overflow-y: auto;
        }


        /* =========================================================
                                                               MAXIMO INFO
                                                            ========================================================= */

        .maximo-info {

            border: 1px solid #087f70;

            background: rgba(0, 116, 103, 0.08);

            border-radius: 8px;

            padding: 12px 14px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 17px;
        }

        .maximo-info-left {

            display: flex;

            align-items: center;

            gap: 10px;

            color: #75d9cb;

            font-size: 12px;
        }

        .maximo-arrow {

            font-size: 20px;

            color: #00b894;
        }

        .maximo-status {

            border: 1px solid #009f87;

            border-radius: 20px;

            padding: 4px 10px;

            color: #37d6bd;

            font-size: 10px;

            font-weight: 700;
        }


        /* =========================================================
                                                               FORM
                                                            ========================================================= */

        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;

            margin-bottom: 15px;
        }

        .form-group {

            margin-bottom: 15px;
        }

        .form-group label {

            display: block;

            margin-bottom: 6px;

            color: #161515;

            font-size: 12px;

            font-weight: 600;
        }

        .form-input {

            width: 100%;

            box-sizing: border-box;

            height: 35px;

            padding: 0 12px;

            background: #ffff;

            border: 1px solid #2a3b5733;

            border-radius: 7px;

            color: #161515;

            font-family: inherit;

            font-size: 12px;

            outline: none;
        }

        .form-input:focus {

            border-color: #177bd1;

            box-shadow: 0 0 0 2px rgba(23, 123, 209, .12);
        }

        .input-green {

            color: #00d09c;

            font-weight: 700;
        }

        select.form-input {

            cursor: pointer;
        }

        .material-info {

            margin-top: 5px;

            color: #77869d;

            font-size: 10px;

            line-height: 1.5;
        }

        .textarea-input {

            height: auto;

            padding: 9px 12px;

            resize: vertical;
        }


        /* =========================================================
                                                               QC
                                                            ========================================================= */

        .qc-options {

            display: grid;

            grid-template-columns: 1fr 1fr 1fr;

            gap: 8px;
        }

        .qc-option {

            height: 34px;

            border: 1px solid #a4abb4;

            border-radius: 7px;

            background: #ffff;

            color: #161515;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 6px;
        }

        .qc-option:hover {

            border-color: #cad7e6;
        }

        .qc-option.active {

            background: #00a878;

            border-color: #00c28d;

            color: white;
        }


        /* =========================================================
                                                               FOOTER
                                                            ========================================================= */

        .penerimaan-modal-footer {

            padding: 12px 23px;

            border-top: 1px solid #c2c8d3be;

            background: #ffff;

            display: flex;

            justify-content: flex-end;

            gap: 8px;
        }

        .btn-cancel-penerimaan,
        .btn-save-penerimaan {

            height: 31px;

            padding: 0 14px;

            border-radius: 7px;

            font-family: inherit;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;
        }

        .btn-cancel-penerimaan {

            background: #185bd1;

            border: none;

            color: #ffff;
        }

        .btn-save-penerimaan {

            background: #185bd1;

            border: none;

            color: white;
        }

        .btn-save-penerimaan:hover {

            background: #1c64d1de;
        }

        .btn-cancel-penerimaan:hover {
            background: #1c64d1de;
        }


        /* =========================================================
                                                               RESPONSIVE
                                                            ========================================================= */

        @media (max-width: 700px) {

            .penerimaan-modal {

                max-height: 96vh;
            }

            .form-grid {

                grid-template-columns: 1fr;

                gap: 0;
            }

            .qc-options {

                grid-template-columns: 1fr;
            }

            .maximo-info {

                align-items: flex-start;

                gap: 10px;

                flex-direction: column;
            }

            .penerimaan-modal-footer {

                flex-direction: column-reverse;
            }

            .btn-cancel-penerimaan,
            .btn-save-penerimaan {

                width: 100%;
            }
        }
    </style>


    <script>
        function openPenerimaanModal() {
            const modal = document.getElementById('penerimaanModal');

            if (!modal) {
                return;
            }

            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }


        function closePenerimaanModal() {
            const modal = document.getElementById('penerimaanModal');

            if (!modal) {
                return;
            }

            modal.classList.remove('show');
            document.body.style.overflow = '';
        }


        /* =====================================================
           KLIK AREA DI LUAR MODAL
        ===================================================== */

        const penerimaanModal = document.getElementById('penerimaanModal');

        if (penerimaanModal) {
            penerimaanModal.addEventListener('click', function(event) {

                if (event.target === this) {
                    closePenerimaanModal();
                }

            });
        }


        /* =====================================================
           TOMBOL ESC
        ===================================================== */

        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {
                closePenerimaanModal();
            }

        });


        /* =====================================================
           PILIHAN QC
        ===================================================== */

        function selectQC(button) {

            document.querySelectorAll('.qc-option').forEach(function(item) {

                item.classList.remove('active');

            });

            button.classList.add('active');
        }


        /* =====================================================
           SIMPAN PENERIMAAN
        ===================================================== */

        function savePenerimaan() {

            const form = document.getElementById('formPenerimaanBarang');

            if (!form) {
                return;
            }

            alert(
                'Data penerimaan barang berhasil disimpan dan disinkronkan ke Maximo.'
            );

            closePenerimaanModal();
        }
    </script>
@endsection
