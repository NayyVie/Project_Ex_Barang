@extends('layouts.app-admin')

@section('title', 'Katalog Spare Part')

@section('page-title', 'Katalog Master')

@section('page-subtitle', 'PLN Nusantara Power Services')

@section('Profile', 'Admin')

@section('content')

    <style>
        /* Tambah */

        .btn-add {
            height: 38px;

            padding: 0 17px;
            margin-bottom: 10px;

            display: flex;
            align-items: center;

            border: none;
            border-radius: 7px;

            background: linear-gradient(90deg,
                    #1655ee,
                    #174ee1);

            color: white;

            font-family: inherit;
            font-size: 11px;
            font-weight: 600;

            cursor: pointer;

            box-shadow: 0 5px 14px rgba(24, 83, 230, .25);
        }

        .btn-add span {
            font-size: 20px;
            margin-right: 7px;
            font-weight: 400;
        }


        /* =====================================================
                                                                                                                                                                                                                                                                                                           FILTER
                                                                                                                                                                                                                                                                                                        ===================================================== */

        .catalog-filter {
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

        .filter-select:focus {
            border-color: #2873d8;
        }


        .sort-button {
            width: 37px;
            height: 37px;

            border: none;

            background: #1653eb;

            color: white;

            border-radius: 9px;

            font-size: 17px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;

            cursor: pointer;
            transition: 0.2s;
            white-space: nowrap;
        }


        /* =====================================================
                                                                                                                                                                                                                                                                                                           TABLE
                                                                                                                                                                                                                                                                                                        ===================================================== */

        .catalog-table-wrapper {
            background: #ffffff;

            border: 1px solid #e8edf5;
            box-shadow: 0 3px 12px rgba(15, 39, 70, 0.04);

            border-radius: 18px;

            overflow-x: auto;
        }

        .catalog-table {
            width: 100%;

            border-collapse: collapse;

            min-width: 1100px;
        }

        .catalog-table th {

            padding: 15px 17px;

            text-align: left;

            background: #fafbfd;

            color: #8494aa;

            font-size: 10px;
            font-weight: 600;

            border-bottom: 1px solid #edf1f6;
            white-space: nowrap;
        }

        .catalog-table td {
            padding: 16px 17px;

            border-bottom: 1px solid #f0f3f7;

            color: #526680;

            font-size: 11px;
            white-space: nowrap;
        }

        .catalog-table tr:last-child td {
            border-bottom: none;
        }

        /* Item Number */

        .item-number {
            color: #075dcc;
            font-weight: 600;
        }


        /* Description */

        .item-description strong {
            display: block;

            color: #1b304d;

            font-weight: 600;

            margin-bottom: 3px;
        }

        .item-description span {
            color: #526680;

            font-size: 10px;
        }


        /* Category */

        .category-badge {
            display: inline-flex;
            align-items: center;

            padding: 5px 9px;

            border-radius: 14px;

            background: #075eaec4;

            color: #ffffff;

            font-size: 10px;
            white-space: nowrap;
        }


        /* Location */

        .location-badge {
            display: inline-block;

            padding: 5px 7px;

            border-radius: 4px;

            /* background: #27364b; */

            color: #526680;

            font-size: 9px;
            font-weight: 600;

            line-height: 1.25;
        }


        /* Stock */

        .stock-value {
            display: flex;
            align-items: center;
            gap: 4px;

            white-space: nowrap;
        }

        .stock-main {
            color: ##526680;

            font-weight: 700;
            font-size: 10px;
        }

        .stock-maximo {
            color: #526680;
            font-size: 9px;
        }


        .stock-status {
            display: inline-flex;

            margin-top: 5px;

            padding: 3px 8px;

            border-radius: 10px;

            font-size: 9px;
            font-weight: 600;
        }

        .stock-status.match {
            color: #0b9d50;
            background: #ecfaf2;
            border: 1px solid #c9efd9;
        }

        .stock-status.warning {
            color: #cc8b12;
            background: #faf5ec;
            border: 1px solid #efe5c9;
        }


        /* Price */

        .price {
            color: #526680;

            font-size: 10px;
            white-space: nowrap;
        }


        /* Print */

        .btn-print {
            height: 30px;

            padding: 0 10px;

            display: inline-flex;
            align-items: center;

            border: 1px solid #d8e5f8;
            border-radius: 7px;

            background: #e5ecf3d7;

            color: #616974;

            font-family: 'Poppins' sans-serif;
            font-size: 9px;
            font-weight: 600;

            cursor: pointer;
        }

        .btn-print:hover {
            background: #a6cbfc98;
            border-color: #e1edfc;
        }

        .btn-print img {
            margin-right: 5px;
        }


        /* Action */

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .table-icon-button {
            width: 24px;
            height: 24px;

            border: none;
            background: transparent;

            color: #6e7e98;

            cursor: pointer;
            font-size: 15px;
        }

        .table-icon-button:hover {
            color: #ffffff;
        }

        /* TOMBOL TAMBAH SPARE PART BARU  */
        /* =========================================================
       BUTTON TAMBAH SPARE PART
    ========================================================= */

        .btn-add-spare-part {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            height: 42px;
            padding: 0 18px;

            border: none;
            border-radius: 9px;

            background: linear-gradient(135deg,
                    #0874c9,
                    #0756a8);

            color: #ffffff;

            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            box-shadow: 0 4px 12px rgba(7, 86, 168, .18);

            transition: .2s ease;
        }

        .btn-add-spare-part:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(7, 86, 168, .24);
        }

        .btn-add-icon {
            width: 22px;
            height: 22px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 6px;

            background: rgba(255, 255, 255, .18);

            font-size: 17px;
            line-height: 1;
        }


        /* =========================================================
       MODAL OVERLAY
    ========================================================= */

        .spare-part-modal-overlay {
            position: fixed;

            inset: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 20px;

            background: rgba(7, 32, 61, .48);

            backdrop-filter: blur(3px);

            z-index: 9999;

            opacity: 0;
            visibility: hidden;

            transition: opacity .2s ease,
                visibility .2s ease;
        }

        .spare-part-modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }


        /* =========================================================
       MODAL
    ========================================================= */

        .spare-part-modal {
            width: 100%;
            max-width: 850px;

            max-height: 92vh;

            background: #ffffff;

            border-radius: 16px;

            box-shadow:
                0 20px 50px rgba(0, 31, 63, .22);

            overflow: hidden;

            transform: translateY(15px) scale(.98);

            transition: transform .2s ease;
        }

        .spare-part-modal-overlay.show .spare-part-modal {
            transform: translateY(0) scale(1);
        }


        /* =========================================================
       MODAL HEADER
    ========================================================= */

        .spare-part-modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            padding: 22px 26px;

            border-bottom: 1px solid #e8edf3;

            background: #ffffff;
        }

        .spare-part-modal-header h2 {
            margin: 0 0 5px;

            color: #123b68;

            font-size: 19px;
            font-weight: 700;
        }

        .spare-part-modal-header p {
            margin: 0;

            color: #7b91a8;

            font-size: 11px;
            line-height: 1.5;
        }

        .spare-part-close {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: none;
            border-radius: 8px;

            background: transparent;

            color: #7890a7;

            font-size: 26px;
            line-height: 1;

            cursor: pointer;

            transition: .2s ease;
        }

        .spare-part-close:hover {
            background: #f0f5fa;
            color: #164e82;
        }


        /* =========================================================
       BODY
    ========================================================= */

        .spare-part-modal-body {
            padding: 24px 26px;

            max-height: calc(92vh - 145px);

            overflow-y: auto;
        }


        /* =========================================================
       FORM
    ========================================================= */

        .form-row {
            display: grid;

            grid-template-columns: repeat(2, minmax(0, 1fr));

            gap: 16px;

            margin-bottom: 16px;
        }

        .form-row.three-column {
            grid-template-columns:
                1fr 1fr 1.1fr;
        }

        .form-row.four-column {
            grid-template-columns:
                repeat(4, minmax(0, 1fr));
        }

        .form-group {
            min-width: 0;

            margin-bottom: 16px;
        }

        .form-row .form-group {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            color: #49647f;

            font-size: 11px;
            font-weight: 600;
        }

        .form-group label span {
            color: #e53935;
        }


        /* =========================================================
       INPUT
    ========================================================= */

        .form-control {
            width: 100%;
            height: 42px;

            padding: 0 13px;

            border: 1px solid #d8e2ec;
            border-radius: 8px;

            background: #f8fafc;

            color: #173f68;

            font-family: 'Poppins', sans-serif;
            font-size: 12px;

            outline: none;

            transition: .2s ease;

            box-sizing: border-box;
        }

        .form-control::placeholder {
            color: #a1b1c1;
        }

        .form-control:focus {
            border-color: #0874c9;

            background: #ffffff;

            box-shadow: 0 0 0 3px rgba(8, 116, 201, .09);
        }

        textarea.form-control {
            height: auto;

            min-height: 82px;

            padding: 11px 13px;

            resize: vertical;

            line-height: 1.5;
        }

        select.form-control {
            cursor: pointer;
        }


        /* =========================================================
       FOOTER
    ========================================================= */

        .spare-part-modal-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;

            gap: 10px;

            padding: 16px 26px;

            border-top: 1px solid #e8edf3;

            background: #ffffff;
        }


        /* BATAL */

        .btn-modal-cancel {
            height: 40px;

            padding: 0 18px;

            border: 1px solid #d4e0eb;

            border-radius: 8px;

            background: #ffffff;

            color: #526b83;

            font-family: 'Poppins', sans-serif;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .btn-modal-cancel:hover {
            background: #f4f7fa;
        }


        /* SIMPAN */

        .btn-modal-save {
            height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            padding: 0 18px;

            border: none;

            border-radius: 8px;

            background: linear-gradient(135deg,
                    #0874c9,
                    #0756a8);

            color: #ffffff;

            font-family: 'Poppins', sans-serif;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .btn-modal-save:hover {
            box-shadow: 0 5px 14px rgba(7, 86, 168, .2);
        }

        .btn-modal-save span {
            font-size: 14px;
        }


        /* =====================================================
                                                                                                                                                                                                                                                                                                           RESPONSIVE
                                                                                                                                                                                                                                                                                                        ===================================================== */

        @media (max-width: 900px) {

            .catalog-filter {
                flex-wrap: balance;
            }

            .search-box {
                flex-basis: 100%;
            }

            .filter-select {
                flex: 1;
                min-width: 140px;
            }

        }

        @media (max-width: 600px) {

            .btn-add {
                width: 100%;
                justify-content: center;
            }

        }

        /* RESPONSIVE UNTUK TOMBOL TAMBAH SPARE PART BARU */
        /* =========================================================
       RESPONSIVE MODAL
    ========================================================= */

        @media (max-width: 768px) {

            .spare-part-modal-overlay {
                padding: 12px;
                align-items: center;
            }

            .spare-part-modal {
                max-height: 94vh;
                border-radius: 13px;
            }

            .spare-part-modal-header {
                padding: 18px 18px;
            }

            .spare-part-modal-header h2 {
                font-size: 16px;
            }

            .spare-part-modal-header p {
                font-size: 10px;
                max-width: 90%;
            }

            .spare-part-modal-body {
                padding: 18px;
                max-height: calc(94vh - 135px);
            }

            .form-row,
            .form-row.three-column,
            .form-row.four-column {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-row .form-group {
                margin-bottom: 16px;
            }

            .spare-part-modal-footer {
                padding: 14px 18px;
            }

            .btn-modal-cancel,
            .btn-modal-save {
                flex: 1;
            }

            .btn-add-spare-part {
                padding: 0 13px;
                font-size: 11px;
            }
        }


        @media (max-width: 480px) {

            .spare-part-modal-overlay {
                padding: 8px;
            }

            .spare-part-modal {
                max-height: 96vh;
                border-radius: 12px;
            }

            .spare-part-modal-header {
                padding: 16px;
            }

            .spare-part-modal-body {
                padding: 16px;
                max-height: calc(96vh - 130px);
            }

            .spare-part-modal-footer {
                padding: 12px 16px;
                gap: 7px;
            }

            .btn-modal-cancel,
            .btn-modal-save {
                height: 38px;
                padding: 0 10px;
                font-size: 11px;
            }
        }
    </style>


    <button type="button" class="btn-add" id="openSparePartModal">

        <span>+</span>

        Tambah Spare Part Baru

    </button>

    {{-- <button type="button" class="btn-add-spare-part" id="openSparePartModal">
    <span class="btn-add-icon">+</span>
    Tambah Spare Part Baru
</button> --}}


    {{-- =====================================================
     FILTER
====================================================== --}}

    <div class="catalog-filter">

        {{-- SEARCH --}}

        <div class="search-box">

            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7" />
                <path d="M20 20l-4-4" />
            </svg>

            <input type="text" placeholder="Cari Item Number, Deskripsi, Rak, atau Barcode...">

        </div>


        {{-- KATEGORI --}}

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


        {{-- STATUS --}}

        <select class="filter-select">

            <option>
                Semua Status Stok
            </option>

            <option>
                Match
            </option>

            <option>
                Selisih
            </option>

        </select>


        {{-- SORT --}}

        <select class="filter-select">

            <option>
                Urutkan: Item Number
            </option>

            <option>
                Urutkan: Nama
            </option>

            <option>
                Urutkan: Harga
            </option>

            <option>
                Urutkan: Stok
            </option>

        </select>


        <button class="sort-button">
            ⇅
        </button>

    </div>


    {{-- =====================================================
     TABLE
====================================================== --}}

    <div class="catalog-table-wrapper">

        <table class="catalog-table">

            <thead>

                <tr>

                    <th>
                        Item Number
                    </th>

                    <th>
                        Deskripsi & Spesifikasi
                    </th>

                    <th>
                        Kategori
                    </th>

                    <th>
                        Lokasi Bin / Rak
                    </th>

                    <th>
                        Fisik vs Maximo
                    </th>

                    <th>
                        Harga Satuan
                    </th>

                    <th>
                        Label / Barcode
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>


                {{-- =================================================
                 DATA 1
            ================================================== --}}

                <tr>

                    <td>
                        <div class="item-number">
                            CF-077421
                        </div>
                    </td>


                    <td>

                        <div class="item-description">

                            <strong>
                                Spiral Wound Gasket 4 Inch 300# ANSI B16.20 SS316 Graphite
                            </strong>

                            <span>
                                Inner Ring SS316, Centering Ring Carbon Steel, 150-300 LB
                            </span>

                        </div>

                    </td>


                    <td>

                        <span class="category-badge">
                            Consumable & Fastener
                        </span>

                    </td>


                    <td>

                        <span class="location-badge">
                            RAK D-4.01
                        </span>

                    </td>


                    <td>

                        <div class="stock-value">

                            <span class="stock-main">
                                18
                            </span>

                            <span class="stock-maximo">
                                / 18 PCS
                            </span>

                        </div>

                        <span class="stock-status match">
                            Match
                        </span>

                    </td>


                    <td>

                        <span class="price">
                            Rp 320.000
                        </span>

                    </td>


                    <td>

                        <button class="btn-print">

                            <span>
                                <img src="{{ asset('assets/images/icon-barcode2.png') }}" alt="Icon Barcode"
                                    style="width: 20px; height:20px">
                            </span>

                            Cetak Label

                        </button>

                    </td>


                    <td>

                        <div class="action-buttons">

                            <button class="table-icon-button">
                                ◉
                            </button>

                            <button class="table-icon-button">
                                ♢
                            </button>

                        </div>

                    </td>

                </tr>


                {{-- =================================================
                 DATA 2
            ================================================== --}}

                <tr>

                    <td>
                        <div class="item-number">
                            CH-012903
                        </div>
                    </td>


                    <td>

                        <div class="item-description">

                            <strong>
                                Turbine Lube Oil ISO VG 46 Extreme Pressure
                            </strong>

                            <span>
                                Shell Turbo T 46, Drum @ 209 Liter, Oxidation Stability ASTM D943
                            </span>

                        </div>

                    </td>


                    <td>

                        <span class="category-badge">
                            Kimia & Pelumas
                        </span>

                    </td>


                    <td>

                        <span class="location-badge">
                            GUDANG B3-02
                        </span>

                    </td>


                    <td>

                        <div class="stock-value">

                            <span class="stock-main">
                                1450
                            </span>

                            <span class="stock-maximo">
                                / 1250 LTR
                            </span>

                        </div>

                        <span class="stock-status warning">
                            -200
                        </span>

                    </td>


                    <td>

                        <span class="price">
                            Rp 58.000
                        </span>

                    </td>


                    <td>

                        <button class="btn-print">

                            <span>
                                <img src="{{ asset('assets/images/icon-barcode2.png') }}" alt="Icon Barcode"
                                    style="width: 20px" height="20px">
                            </span>

                            Cetak Label

                        </button>

                    </td>


                    <td>

                        <div class="action-buttons">

                            <button class="table-icon-button">
                                ◉
                            </button>

                            <button class="table-icon-button">
                                ♢
                            </button>

                        </div>

                    </td>

                </tr>


                {{-- =================================================
                 DATA 3
            ================================================== --}}

                <tr>

                    <td>
                        <div class="item-number">
                            EP-042219
                        </div>
                    </td>


                    <td>

                        <div class="item-description">

                            <strong>
                                Circuit Breaker Vacuum 6.6kV 1250A 25kA Drawout
                            </strong>

                            <span>
                                ABB VD4, 3-Phase, 50Hz, Motorized Mechanism 110VDC
                            </span>

                        </div>

                    </td>


                    <td>

                        <span class="category-badge">
                            Elektrikal
                        </span>

                    </td>


                    <td>

                        <span class="location-badge">
                            RAK B-03.01
                        </span>

                    </td>


                    <td>

                        <div class="stock-value">

                            <span class="stock-main">
                                3
                            </span>

                            <span class="stock-maximo">
                                / 3 PCS
                            </span>

                        </div>

                        <span class="stock-status match">
                            Match
                        </span>

                    </td>


                    <td>

                        <span class="price">
                            Rp 94.000.000
                        </span>

                    </td>


                    <td>

                        <button class="btn-print">

                            <span>
                                <img src="{{ asset('assets/images/icon-barcode2.png') }}" alt="Icon Barcode"
                                    style="width: 20px" height="20px">
                            </span>

                            Cetak Label

                        </button>

                    </td>


                    <td>

                        <div class="action-buttons">

                            <button class="table-icon-button">
                                ◉
                            </button>

                            <button class="table-icon-button">
                                ♢
                            </button>

                        </div>

                    </td>

                </tr>


                {{-- =================================================
                 DATA 4
            ================================================== --}}

                <tr>

                    <td>
                        <div class="item-number">
                            EP-061902
                        </div>
                    </td>


                    <td>

                        <div class="item-description">

                            <strong>
                                Tembaga Busbar Elektrikal 10mm x 100mm Pure Copper 99.9%
                            </strong>

                            <span>
                                ASTM B187 Cu-ETP, High Conductivity, L=4000mm
                            </span>

                        </div>

                    </td>


                    <td>

                        <span class="category-badge">
                            Elektrikal
                        </span>

                    </td>


                    <td>

                        <span class="location-badge">
                            RAK B-01.03
                        </span>

                    </td>


                    <td>

                        <div class="stock-value">

                            <span class="stock-main">
                                16
                            </span>

                            <span class="stock-maximo">
                                / 20 MTR
                            </span>

                        </div>

                        <span class="stock-status warning">
                            -4
                        </span>

                    </td>


                    <td>

                        <span class="price">
                            Rp 1.450.000
                        </span>

                    </td>


                    <td>

                        <button class="btn-print">

                            <span>
                                <img src="{{ asset('assets/images/icon-barcode2.png') }}" alt="Icon Barcode"
                                    style="width: 20px" height="20px">
                            </span>

                            Cetak Label

                        </button>

                    </td>


                    <td>

                        <div class="action-buttons">

                            <button class="table-icon-button">
                                ◉
                            </button>

                            <button class="table-icon-button">
                                ♢
                            </button>

                        </div>

                    </td>

                </tr>


                {{-- =================================================
                 DATA 5
            ================================================== --}}

                <tr>

                    <td>
                        <div class="item-number">
                            IC-088190
                        </div>
                    </td>


                    <td>

                        <div class="item-description">

                            <strong>
                                Thermocouple Type K Duplex Inconel 600 Sheathed L=800mm
                            </strong>

                            <span>
                                Class 1, Temp up to 1100°C, Flange Mount 1" ANSI 300#
                            </span>

                        </div>

                    </td>


                    <td>

                        <span class="category-badge">
                            C&I (Instrumen)
                        </span>

                    </td>


                    <td>

                        <span class="location-badge">
                            RAK C-01.02
                        </span>

                    </td>


                    <td>

                        <div class="stock-value">

                            <span class="stock-main">
                                12
                            </span>

                            <span class="stock-maximo">
                                / 12 PCS
                            </span>

                        </div>

                        <span class="stock-status match">
                            Match
                        </span>

                    </td>


                    <td>

                        <span class="price">
                            Rp 4.250.000
                        </span>

                    </td>


                    <td>

                        <button class="btn-print">

                            <span>
                                ▦
                            </span>

                            Cetak Label

                        </button>

                    </td>


                    <td>

                        <div class="action-buttons">

                            <button class="table-icon-button">
                                ◉
                            </button>

                            <button class="table-icon-button">
                                ♢
                            </button>

                        </div>

                    </td>

                </tr>


                {{-- =================================================
                 DATA 6
            ================================================== --}}

                <tr>

                    <td>
                        <div class="item-number">
                            IC-027526
                        </div>
                    </td>


                    <td>

                        <div class="item-description">

                            <strong>
                                Pressure Transmitter Differential 4-20mA HART High Range
                            </strong>

                            <span>
                                Industrial pressure transmitter untuk sistem monitoring
                            </span>

                        </div>

                    </td>


                    <td>

                        <span class="category-badge">
                            C&I (Instrumen)
                        </span>

                    </td>


                    <td>

                        <span class="location-badge">
                            RAK C-02.03
                        </span>

                    </td>


                    <td>

                        <div class="stock-value">

                            <span class="stock-main">
                                4
                            </span>

                            <span class="stock-maximo">
                                / 5 PCS
                            </span>

                        </div>

                        <span class="stock-status warning">
                            -1
                        </span>

                    </td>


                    <td>

                        <span class="price">
                            Rp 14.200.000
                        </span>

                    </td>


                    <td>

                        <button class="btn-print">

                            <span>
                                ▦
                            </span>

                            Cetak Label

                        </button>

                    </td>


                    <td>

                        <div class="action-buttons">

                            <button class="table-icon-button">
                                ◉
                            </button>

                            <button class="table-icon-button">
                                ♢
                            </button>

                        </div>

                    </td>

                </tr>


            </tbody>

        </table>

    </div>

    <!-- =========================================================
         MODAL TAMBAH SPARE PART BARU
    ========================================================= -->
    <div class="spare-part-modal-overlay" id="sparePartModal">

        <div class="spare-part-modal">

            <!-- HEADER MODAL -->
            <div class="spare-part-modal-header">
                <div>
                    <h2>Registrasi Spare Part Baru</h2>
                    <p>
                        Masukkan data katalog material untuk diintegrasikan
                        ke sistem gudang dan Maximo
                    </p>
                </div>

                <button type="button" class="spare-part-close" id="closeSparePartModal">
                    &times;
                </button>
            </div>


            <!-- FORM -->
            <form id="sparePartForm">

                <div class="spare-part-modal-body">

                    <!-- BARIS 1 -->
                    <div class="form-row">

                        <div class="form-group">
                            <label for="item_number">
                                Item Number Maximo <span>*</span>
                            </label>

                            <input type="text" id="item_number" name="item_number" class="form-control"
                                placeholder="Contoh: MP-033181">
                        </div>


                        <div class="form-group">
                            <label for="kategori_material">
                                Kategori Material <span>*</span>
                            </label>

                            <select id="kategori_material" name="kategori_material" class="form-control">

                                <option value="">Pilih kategori material</option>
                                <option value="mekanikal">Mekanikal</option>
                                <option value="elektrikal">Elektrikal</option>
                                <option value="instrumentasi">Instrumentasi</option>
                                <option value="sipil">Sipil</option>
                                <option value="lainnya">Lainnya</option>

                            </select>
                        </div>

                    </div>


                    <!-- DESKRIPSI -->
                    <div class="form-group">
                        <label for="deskripsi_spare_part">
                            Deskripsi Spare Part <span>*</span>
                        </label>

                        <input type="text" id="deskripsi_spare_part" name="deskripsi_spare_part" class="form-control"
                            placeholder="Misal: High Pressure Boiler Tube SA-213 T22 OD 50.8mm">
                    </div>


                    <!-- SPESIFIKASI -->
                    <div class="form-group">
                        <label for="spesifikasi_teknis">
                            Spesifikasi Teknis / Part Number Pabrikan
                        </label>

                        <textarea id="spesifikasi_teknis" name="spesifikasi_teknis" class="form-control textarea" rows="3"
                            placeholder="Material, toleransi tekanan/suhu, standar ASTM, manufaktur..."></textarea>
                    </div>


                    <!-- BARIS 2 -->
                    <div class="form-row three-column">

                        <div class="form-group">
                            <label for="lokasi_bin">
                                Lokasi Bin / Rak <span>*</span>
                            </label>

                            <input type="text" id="lokasi_bin" name="lokasi_bin" class="form-control"
                                placeholder="RAK-A-01-01">
                        </div>


                        <div class="form-group">
                            <label for="satuan_ukur">
                                Satuan Ukur (UoM) <span>*</span>
                            </label>

                            <select id="satuan_ukur" name="satuan_ukur" class="form-control">

                                <option value="">Pilih satuan</option>
                                <option value="pcs">PCS (Buah)</option>
                                <option value="set">SET</option>
                                <option value="kg">KG</option>
                                <option value="ltr">LTR</option>
                                <option value="mtr">MTR</option>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="unit_pembangkit">
                                Unit Pembangkit
                            </label>

                            <select id="unit_pembangkit" name="unit_pembangkit" class="form-control">

                                <option value="">Pilih unit</option>
                                <option value="pltu_unit_1_2">
                                    PLTU Unit 1-2
                                </option>

                                <option value="pltu_unit_3_4">
                                    PLTU Unit 3-4
                                </option>

                                <option value="pltu_unit_5_6">
                                    PLTU Unit 5-6
                                </option>

                                <option value="pltg">
                                    PLTG
                                </option>

                                <option value="plts">
                                    PLTS
                                </option>

                            </select>
                        </div>

                    </div>


                    <!-- BARIS 3 -->
                    <div class="form-row four-column">

                        <div class="form-group">
                            <label for="stok_fisik">
                                Stok Fisik
                            </label>

                            <input type="number" id="stok_fisik" name="stok_fisik" class="form-control" value="0"
                                min="0">
                        </div>


                        <div class="form-group">
                            <label for="stok_maximo">
                                Stok Maximo
                            </label>

                            <input type="number" id="stok_maximo" name="stok_maximo" class="form-control"
                                value="0" min="0">
                        </div>


                        <div class="form-group">
                            <label for="reorder_point">
                                Reorder Point (ROP)
                            </label>

                            <input type="number" id="reorder_point" name="reorder_point" class="form-control"
                                value="0" min="0">
                        </div>


                        <div class="form-group">
                            <label for="harga_satuan">
                                Harga Satuan (IDR)
                            </label>

                            <input type="number" id="harga_satuan" name="harga_satuan" class="form-control"
                                value="0" min="0" placeholder="1500000">
                        </div>

                    </div>

                </div>


                <!-- FOOTER -->
                <div class="spare-part-modal-footer">

                    <button type="button" class="btn-modal-cancel" id="cancelSparePartModal">
                        Batal
                    </button>

                    <button type="submit" class="btn-modal-save">
                        <span>✓</span>
                        Simpan & Sinkronkan
                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('sparePartModal');

            const openButton =
                document.getElementById('openSparePartModal');

            const closeButton =
                document.getElementById('closeSparePartModal');

            const cancelButton =
                document.getElementById('cancelSparePartModal');


            /* ==============================
               BUKA MODAL
            ============================== */

            function openSparePartModal() {

                if (!modal) return;

                modal.classList.add('show');

                document.body.style.overflow = 'hidden';
            }


            /* ==============================
               TUTUP MODAL
            ============================== */

            function closeSparePartModal() {

                if (!modal) return;

                modal.classList.remove('show');

                document.body.style.overflow = '';
            }


            /* ==============================
               EVENT BUTTON
            ============================== */

            if (openButton) {
                openButton.addEventListener(
                    'click',
                    openSparePartModal
                );
            }


            if (closeButton) {
                closeButton.addEventListener(
                    'click',
                    closeSparePartModal
                );
            }


            if (cancelButton) {
                cancelButton.addEventListener(
                    'click',
                    closeSparePartModal
                );
            }


            /* ==============================
               KLIK AREA LUAR MODAL
            ============================== */

            if (modal) {

                modal.addEventListener('click', function(event) {

                    if (event.target === modal) {
                        closeSparePartModal();
                    }

                });

            }


            /* ==============================
               ESC UNTUK MENUTUP
            ============================== */

            document.addEventListener('keydown', function(event) {

                if (
                    event.key === 'Escape' &&
                    modal &&
                    modal.classList.contains('show')
                ) {
                    closeSparePartModal();
                }

            });

        });
    </script>

@endsection
