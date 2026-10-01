@extends('layouts.app')

@section('title', 'Laporan Ex Barang')

@section('page-title', 'Laporan Ex Barang')

@section('page-subtitle', 'PLN Nusantara Power Services')

@section('content')

    <div class="laporan-container">

        {{-- ================================
     HEADER FILTER
================================= --}}
        <div class="laporan-header">

            {{-- JUDUL --}}
            <div class="header-title">
                <h2>{{ __('Laporan Ex Barang') }}</h2>

                <p>
                    {{ __('Lihat dan ekspor laporan pengembalian barang berdasarkan periode.') }}
                </p>
            </div>


            {{-- BARIS FILTER --}}
            <div class="filter-row">

                {{-- TAB FILTER --}}
                <div class="filter-tabs">

                    <button type="button" class="filter-tab active" data-filter="all" onclick="ubahFilter('all')">
                        {{ __('Semua Data') }}
                    </button>

                    <button type="button" class="filter-tab" data-filter="month" onclick="ubahFilter('month')">
                        {{ __('Bulan') }}
                    </button>

                    <button type="button" class="filter-tab" data-filter="year" onclick="ubahFilter('year')">
                        {{ __('Tahun') }}
                    </button>

                </div>


                {{-- FILTER PERIODE DI KANAN --}}
                <div class="filter-right">

                    {{-- PILIH BULAN --}}
                    <div class="periode-filter" id="filterMonth" style="display: none;">

                        <div class="select-group">

                            <label for="bulan">{{ __('Bulan') }}</label>

                            <select id="bulan" class="form-control">

                                <option value="01">{{ __('Januari') }}</option>
                                <option value="02">{{ __('Februari') }}</option>
                                <option value="03">{{ __('Maret') }}</option>
                                <option value="04">{{ __('April') }}</option>
                                <option value="05">{{ __('Mei') }}</option>
                                <option value="06">{{ __('Juni') }}</option>
                                <option value="07">{{ __('Juli') }}</option>
                                <option value="08">{{ __('Agustus') }}</option>
                                <option value="09" selected>{{ __('September') }}</option>
                                <option value="10">{{ __('OKtober') }}</option>
                                <option value="11">{{ __('November') }}r</option>
                                <option value="12">{{ __('Desember') }}</option>

                            </select>

                        </div>


                        <div class="select-group">

                            <label for="tahun-bulan">{{ __('Tahun') }}</label>

                            <input type="number" id="tahun-bulan" class="form-control" value="2026" {{-- min="2000"
        max="2100" --}}
                                placeholder="Masukkan tahun">

                        </div>


                        <button type="button" class="btn-tampilkan">
                            {{ __('Tampilkan') }}
                        </button>

                    </div>


                    {{-- PILIH TAHUN --}}
                    <div class="periode-filter" id="filterYear" style="display: none;">

                        <div class="select-group">

                            <label for="tahun">{{ __('Tahun') }}</label>

                            <input type="number" id="tahun" class="form-control" value="2026"
                                placeholder="Masukkan tahun">

                        </div>


                        <button type="button" class="btn-tampilkan">
                            {{ __('Tampilkan') }}
                        </button>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================================
         RINGKASAN
    ================================= --}}
        <div class="summary-grid">

            <div class="summary-card">

                <div class="summary-icon blue">
                    <span>▣</span>
                </div>

                <div class="summary-content">
                    <h3>24</h3>
                    <p>{{ __('Total Laporan') }}</p>
                </div>

            </div>


            <div class="summary-card">

                <div class="summary-icon green">
                    <span>✓</span>
                </div>

                <div class="summary-content">
                    <h3>10</h3>
                    <p>{{ __('Investasi') }}</p>
                </div>

            </div>


            <div class="summary-card">

                <div class="summary-icon orange">
                    <span>〽</span>
                </div>

                <div class="summary-content">
                    <h3>8</h3>
                    <p>{{ __('Operasi') }}</p>
                </div>

            </div>


            <div class="summary-card">

                <div class="summary-icon purple">
                    <span>✓</span>
                </div>

                <div class="summary-content">
                    <h3>6</h3>
                    <p>{{ __('Disetujui') }}</p>
                </div>

            </div>

        </div>


        {{-- ================================
         TABEL LAPORAN
    ================================= --}}
        <div class="laporan-card">

            <div class="table-header">

                <div>
                    <h3>{{ __('Data Laporan') }}</h3>
                    <p>
                        {{ __('Daftar laporan berdasarkan periode yang dipilih.') }}
                    </p>
                </div>

                <div class="export-buttons">

                    <button type="button" class="btn-export excel">
                        Export Excel
                    </button>
                </div>

            </div>


            <div class="table-responsive">

                <table class="laporan-table">

                    <thead>
                        <tr>
                            <th>{{ __('ID Laporan') }}</th>
                            <th>{{ __('Tanggal') }}</th>
                            <th>{{ __('Nama Barang') }}</th>
                            <th>Item Number</th>
                            <th>{{ __('Jenis') }}</th>
                            <th>{{ __('Kondisi') }}</th>
                            <th>{{ __('Bidang') }}</th>
                            <th>{{ __('No. WO') }}</th>
                            <th>{{ __('Foto') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- DATA 1 --}}
                        <tr>

                            <td>
                                <span class="report-id">
                                    RPT-2026-001
                                </span>
                            </td>

                            <td>
                                05 Sep 2026
                            </td>

                            <td>
                                <strong>Kabel NYY 4 x 16 mm</strong>
                            </td>

                            <td>
                                1000123456
                            </td>

                            <td>
                                <span class="badge operasi">
                                    {{ __('Pasca Pakai') }}
                                </span>
                            </td>

                            <td>
                                <span class="badge repairable">
                                    Repairable
                                </span>
                            </td>

                            <td>
                                {{ __('Listrik') }}
                            </td>

                            <td>
                                WO-001
                            </td>

                            <td>
                                <button type="button" class="btn-photo" title="Lihat foto">
                                    📷
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 2 --}}
                        <tr>

                            <td>
                                <span class="report-id">
                                    RPT-2026-002
                                </span>
                            </td>

                            <td>
                                09 Sep 2026
                            </td>

                            <td>
                                <strong>Pompa Air</strong>
                            </td>

                            <td>
                                1000123457
                            </td>

                            <td>
                                <span class="badge investasi">
                                    {{ __('Lebihan') }}
                                </span>
                            </td>

                            <td>
                                <span class="badge rusak">
                                    {{ __('Rusak') }}
                                </span>
                            </td>

                            <td>
                                {{ __('Mekanik') }}
                            </td>

                            <td>
                                WO-002
                            </td>

                            <td>
                                <button type="button" class="btn-photo" title="Lihat foto">
                                    📷
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 3 --}}
                        <tr>

                            <td>
                                <span class="report-id">
                                    RPT-2026-003
                                </span>
                            </td>

                            <td>
                                12 Sep 2026
                            </td>

                            <td>
                                <strong>Trafo 100 KVA</strong>
                            </td>

                            <td>
                                1000123458
                            </td>

                            <td>
                                <span class="badge operasi">
                                    {{ __('Pasca Pakai') }}
                                </span>
                            </td>

                            <td>
                                <span class="badge fungsi">
                                    {{ __('Kehilangan Fungsi') }}
                                </span>
                            </td>

                            <td>
                                {{ __('Listrik') }}
                            </td>

                            <td>
                                WO-003
                            </td>

                            <td>
                                <button type="button" class="btn-photo" title="Lihat foto">
                                    📷
                                </button>
                            </td>

                        </tr>


                        {{-- DATA 4 --}}
                        <tr>

                            <td>
                                <span class="report-id">
                                    RPT-2026-004
                                </span>
                            </td>

                            <td>
                                14 Sep 2026
                            </td>

                            <td>
                                <strong>MCB 3 Phase 63A</strong>
                            </td>

                            <td>
                                1000123459
                            </td>

                            <td>
                                <span class="badge investasi">
                                    {{ __('Lebihan') }}
                                </span>
                            </td>

                            <td>
                                <span class="badge repairable">
                                    Repairable
                                </span>
                            </td>

                            <td>
                                {{ __('Mekanik') }}
                            </td>

                            <td>
                                WO-004
                            </td>

                            <td>
                                <button type="button" class="btn-photo" title="Lihat foto">
                                    📷
                                </button>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- ================================
     CSS
================================= --}}
    <style>
        .laporan-container {
            padding: 22px 38px 50px;
            max-width: 1500px;
            margin: 0 auto;
        }

        /* ================================
                                                                           HEADER
                                                                        ================================= */

        /* ================================
                                                           HEADER
                                                        ================================= */

        .laporan-header {
            background: #ffffff;
            border: 2px solid #e8edf5;
            border-radius: 18px;

            padding: 24px 26px;
            margin-bottom: 22px;

            box-shadow: 0 3px 12px rgba(15, 39, 70, 0.04);
        }


        /* ================================
                                                           JUDUL
                                                        ================================= */

        .header-title h2 {
            margin: 0;

            color: #102a4c;
            font-size: 22px;
            font-weight: 700;
        }

        .header-title p {
            margin: 6px 0 18px;

            color: #8a9ab1;
            font-size: 13px;
            line-height: 1.6;
        }


        /* ================================
                                                           BARIS FILTER
                                                        ================================= */

        .filter-row {
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }


        /* ================================
                                                           TAB FILTER
                                                        ================================= */

        .filter-tabs {
            display: flex;
            align-items: center;
            gap: 5px;

            padding: 4px;

            background: #f2f5f9;
            border-radius: 11px;

            flex-shrink: 0;
        }

        .filter-tab {
            border: none;
            background: transparent;

            padding: 10px 18px;

            border-radius: 8px;

            color: #667890;

            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 500;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .filter-tab:hover {
            color: #0758b5;
        }

        .filter-tab.active {
            background: #ffffff;
            color: #0758b5;

            font-weight: 600;

            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }


        /* ================================
                                                           FILTER KANAN
                                                        ================================= */

        .filter-right {
            margin-left: auto;

            display: flex;
            align-items: center;
            justify-content: flex-end;

            min-width: 0;
        }


        /* ================================
                                                           PERIODE FILTER
                                                        ================================= */

        .periode-filter {
            display: flex;

            align-items: flex-end;
            justify-content: flex-end;

            gap: 10px;

            flex-wrap: nowrap;
        }

        .select-group {
            display: flex;
            flex-direction: column;

            gap: 5px;
        }

        .select-group label {
            color: #667890;

            font-size: 11px;
            font-weight: 500;
        }


        /* ================================
                                                           SELECT
                                                        ================================= */

        .form-control {
            width: 150px;
            height: 42px;

            padding: 0 13px;

            border: 1px solid #dce4ef;
            border-radius: 9px;

            background: #ffffff;

            color: #263d5b;

            font-family: 'Poppins', sans-serif;
            font-size: 12px;

            outline: none;

            cursor: pointer;

            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #1266c4;

            box-shadow:
                0 0 0 3px rgba(18, 102, 196, 0.08);
        }


        /* ================================
                                                           TOMBOL TAMPILKAN
                                                        ================================= */

        .btn-tampilkan {
            height: 42px;

            padding: 0 20px;

            border: none;
            border-radius: 9px;

            background: #0758b5;
            color: white;

            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;

            white-space: nowrap;
        }

        .btn-tampilkan:hover {
            background: #064b9c;

            transform: translateY(-1px);
        }

        /* SUMMARY */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 22px;
        }


        .summary-card {
            background: #ffffff;
            border: 1px solid #e8edf5;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 3px 12px rgba(15, 39, 70, 0.04);
        }


        .summary-icon {
            width: 47px;
            height: 47px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: 600;
        }


        .summary-icon.blue {
            background: #edf5ff;
            color: #1769e0;
        }


        .summary-icon.green {
            background: #ecfbf2;
            color: #09a854;
        }


        .summary-icon.orange {
            background: #fff8e8;
            color: #ef9d00;
        }


        .summary-icon.purple {
            background: #f7efff;
            color: #9146e6;
        }


        .summary-content h3 {
            margin: 0;
            color: #10233e;
            font-size: 24px;
            font-weight: 700;
        }


        .summary-content p {
            margin: 3px 0 0;
            color: #74859d;
            font-size: 12px;
        }


        /* TABLE CARD */

        .laporan-card {
            background: #ffffff;
            border: 1px solid #e8edf5;
            border-radius: 18px;
            box-shadow: 0 3px 12px rgba(15, 39, 70, 0.04);
            overflow: hidden;
        }


        .table-header {
            padding: 22px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid #edf1f6;
        }


        .table-header h3 {
            margin: 0;
            color: #102a4c;
            font-size: 17px;
            font-weight: 700;
        }


        .table-header p {
            margin: 4px 0 0;
            color: #8a9ab1;
            font-size: 11px;
        }


        .export-buttons {
            display: flex;
            gap: 9px;
        }


        .btn-export {
            height: 39px;
            padding: 0 15px;
            border-radius: 9px;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }


        .btn-export.excel {
            background: #ecfaf2;
            color: #0b9d50;
            border: 1px solid #c9efd9;
        }

        .btn-export:hover {
            transform: translateY(-1px);
        }


        /* TABLE */

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }


        .laporan-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }


        .laporan-table th {
            background: #fafbfd;
            color: #8494aa;
            font-size: 10px;
            font-weight: 600;
            text-align: left;
            padding: 15px 17px;
            border-bottom: 1px solid #edf1f6;
            white-space: nowrap;
        }


        .laporan-table td {
            padding: 16px 17px;
            color: #526680;
            font-size: 11px;
            border-bottom: 1px solid #f0f3f7;
            white-space: nowrap;
        }


        .laporan-table tbody tr:hover {
            background: #fafcff;
        }


        .report-id {
            color: #075dcc;
            font-weight: 600;
        }


        .laporan-table td strong {
            color: #1b304d;
            font-weight: 600;
        }


        /* BADGE */

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 600;
        }


        .badge.investasi {
            background: #eaf3ff;
            color: #1264ce;
            border: 1px solid #c8ddfb;
        }


        .badge.operasi {
            background: #fff5d9;
            color: #c98a00;
            border: 1px solid #f6dc8c;
        }


        .badge.rusak {
            background: #fff0f0;
            color: #df3c3c;
            border: 1px solid #ffd0d0;
        }


        .badge.repairable {
            background: #fff7e8;
            color: #dc9200;
            border: 1px solid #f8dfa9;
        }


        .badge.fungsi {
            background: #f4edff;
            color: #8144d3;
            border: 1px solid #dfcfff;
        }


        /* FOTO */

        .btn-photo {
            width: 32px;
            height: 32px;
            border: 1px solid #dce7f4;
            border-radius: 8px;
            background: #f4f8fd;
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s;
        }


        .btn-photo:hover {
            background: #e7f1ff;
            transform: scale(1.05);
        }


        /* ================================
                                                           RESPONSIVE HEADER
                                                        ================================= */

        /* ================================
                           TABLET / LAPTOP KECIL
                        ================================= */
        @media (max-width: 1100px) {

            .laporan-container {
                padding-left: 28px;
                padding-right: 28px;
            }

            /* Header filter */
            .filter-row {
                align-items: flex-start;
                gap: 18px;
            }

            .filter-tabs {
                flex-shrink: 0;
            }

            .filter-right {
                min-width: 0;
                flex: 1;
            }

            .periode-filter {
                flex-wrap: wrap;
                justify-content: flex-end;
            }

            .form-control {
                width: 135px;
            }

            /* Summary */
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            /* Table */
            .table-responsive {
                overflow-x: auto;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
            }

            .laporan-table {
                min-width: 1050px;
            }
        }


        /* ================================
                           TABLET
                        ================================= */
        @media (max-width: 850px) {

            .laporan-container {
                padding-left: 22px;
                padding-right: 22px;
            }

            /* Header filter menjadi vertikal */
            .filter-row {
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }

            /* Tab filter */
            .filter-tabs {
                width: 100%;
                display: flex;
            }

            .filter-tab {
                flex: 1;
                text-align: center;
                white-space: nowrap;
            }

            /* Area filter kanan */
            .filter-right {
                width: 100%;
                margin-left: 0;
                display: flex;
                justify-content: flex-start;
            }

            .periode-filter {
                width: 100%;
                justify-content: flex-start;
                flex-wrap: nowrap;
            }

            .select-group {
                flex: 1;
                min-width: 0;
            }

            .form-control {
                width: 100%;
            }

            .btn-tampilkan {
                flex-shrink: 0;
            }

            /* Summary */
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
            }

            /* Header tabel */
            .table-header {
                align-items: flex-start;
            }
        }


        /* ================================
                           MOBILE
                        ================================= */
        @media (max-width: 768px) {

            .laporan-container {
                padding: 20px 16px 40px;
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
            }

            /* Header */
            .laporan-header {
                padding: 20px;
                margin-bottom: 18px;
            }

            .header-title h2 {
                font-size: 21px;
            }

            .header-title p {
                font-size: 12px;
                margin-bottom: 16px;
            }

            /* Filter */
            .filter-row {
                width: 100%;
                gap: 14px;
            }

            .filter-tabs {
                width: 100%;
                box-sizing: border-box;
                gap: 3px;
            }

            .filter-tab {
                flex: 1;
                padding: 9px 6px;
                font-size: 12px;
                min-width: 0;
            }

            /* Filter periode */
            .filter-right {
                width: 100%;
            }

            .periode-filter {
                width: 100%;
                gap: 9px;
                align-items: flex-end;
            }

            .select-group {
                flex: 1;
                min-width: 0;
            }

            .select-group label {
                font-size: 10px;
            }

            .form-control {
                width: 100%;
                height: 42px;
                padding: 0 10px;
                font-size: 11px;
                box-sizing: border-box;
            }

            .btn-tampilkan {
                height: 42px;
                padding: 0 15px;
                font-size: 11px;
            }

            /* Summary */
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
                margin-bottom: 18px;
            }

            .summary-card {
                padding: 16px;
                gap: 12px;
                min-width: 0;
            }

            .summary-icon {
                width: 42px;
                height: 42px;
                min-width: 42px;
                font-size: 18px;
            }

            .summary-content {
                min-width: 0;
            }

            .summary-content h3 {
                font-size: 21px;
            }

            .summary-content p {
                font-size: 11px;
                line-height: 1.4;
            }

            /* Card tabel */
            .laporan-card {
                border-radius: 16px;
            }

            /* Header tabel */
            .table-header {
                padding: 18px;
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .table-header h3 {
                font-size: 16px;
            }

            .table-header p {
                font-size: 11px;
                line-height: 1.5;
            }

            .export-buttons {
                width: 100%;
                display: flex;
            }

            .btn-export {
                flex: 1;
                height: 38px;
                font-size: 11px;
            }

            /* Tabel tetap lebar, tetapi scroll horizontal */
            .table-responsive {
                width: 100%;
                max-width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
            }

            .laporan-table {
                min-width: 1050px;
                width: 1050px;
            }
        }


        /* ================================
                           MOBILE KECIL
                        ================================= */
        @media (max-width: 560px) {

            .laporan-container {
                padding: 16px 12px 35px;
            }

            .laporan-header {
                padding: 17px;
                border-radius: 15px;
            }

            .header-title h2 {
                font-size: 19px;
            }

            .header-title p {
                font-size: 11px;
                line-height: 1.5;
            }

            /* Tab tetap satu baris */
            .filter-tabs {
                width: 100%;
            }

            .filter-tab {
                padding: 9px 4px;
                font-size: 11px;
            }

            /* Filter bulan/tahun */
            .periode-filter {
                gap: 8px;
            }

            .select-group {
                min-width: 0;
            }

            .form-control {
                font-size: 10px;
                padding: 0 8px;
            }

            .btn-tampilkan {
                padding: 0 12px;
                font-size: 10px;
            }

            /* Summary tetap 2 kolom */
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .summary-card {
                padding: 13px;
                gap: 9px;
                border-radius: 13px;
            }

            .summary-icon {
                width: 37px;
                height: 37px;
                min-width: 37px;
                border-radius: 10px;
                font-size: 16px;
            }

            .summary-content h3 {
                font-size: 19px;
            }

            .summary-content p {
                font-size: 10px;
            }

            /* Header data laporan */
            .table-header {
                padding: 17px;
            }

            .export-buttons {
                gap: 7px;
            }

            .btn-export {
                font-size: 10px;
                padding: 0 10px;
            }

        }


        /* ================================
                           HP SANGAT KECIL
                        ================================= */
        @media (max-width: 400px) {

            .laporan-container {
                padding-left: 10px;
                padding-right: 10px;
            }

            .laporan-header {
                padding: 15px;
            }

            .header-title h2 {
                font-size: 18px;
            }

            .header-title p {
                font-size: 10px;
            }

            /* Tab tetap satu baris */
            .filter-tab {
                padding: 8px 3px;
                font-size: 10px;
            }

            /* Filter periode dibuat vertikal */
            .periode-filter {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
            }

            .select-group {
                width: 100%;
            }

            .form-control {
                width: 100%;
            }

            .btn-tampilkan {
                width: 100%;
            }

            /* Summary menjadi satu kolom */
            .summary-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .summary-card {
                padding: 14px;
            }

            /* Export */
            .export-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn-export {
                width: 100%;
            }

            /* Tabel */
            .laporan-table {
                min-width: 1050px;
                width: 1050px;
            }
        }
    </style>


    {{-- ================================
     JAVASCRIPT FILTER
================================= --}}
    <script>
        function ubahFilter(filter) {

            // Semua tombol kembali normal
            document.querySelectorAll('.filter-tab').forEach(function(button) {
                button.classList.remove('active');
            });

            // Aktifkan tombol yang dipilih
            document
                .querySelector('[data-filter="' + filter + '"]')
                .classList.add('active');


            // Sembunyikan semua filter
            document.getElementById('filterMonth').style.display = 'none';
            document.getElementById('filterYear').style.display = 'none';


            // Tampilkan filter sesuai pilihan
            if (filter === 'month') {
                document.getElementById('filterMonth').style.display = 'flex';
            }

            if (filter === 'year') {
                document.getElementById('filterYear').style.display = 'flex';
            }
        }
    </script>

@endsection
