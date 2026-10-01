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
            <button class="btn-receipt btn-new-receipt">
                ＋

                Penerimaan Barang Baru

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

@endsection
