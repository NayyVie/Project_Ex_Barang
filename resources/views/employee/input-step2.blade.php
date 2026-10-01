@extends('layouts.app')

@section('title', 'Input Ex Barang')

@section('page-title', 'Input Ex Barang')

@section('page-subtitle', 'Data Barang')

@section('content')

    <div class="form-container">

        {{-- =================================
         PROGRESS STEP
    ================================== --}}

        <div class="step-card progress-card">

            <div class="progress">

                {{-- STEP 1 --}}
                <div class="progress-step completed">

                    <div class="step-number">
                        ✓
                    </div>

                    <div class="step-label">
                        {{ __('Informasi Pengguna') }}
                    </div>

                </div>


                {{-- GARIS --}}
                <div class="progress-line active"></div>


                {{-- STEP 2 --}}
                <div class="progress-step active">

                    <div class="step-number">
                        2
                    </div>

                    <div class="step-label">
                        {{ __('Data Barang') }}
                    </div>

                </div>


                {{-- GARIS --}}
                <div class="progress-line"></div>


                {{-- STEP 3 --}}
                <div class="progress-step">

                    <div class="step-number">
                        3
                    </div>

                    <div class="step-label">
                        {{ __('Bukti & TTD') }}
                    </div>

                </div>

            </div>

        </div>


        {{-- =================================
         FORM STEP 2
    ================================== --}}

        <div class="step-card form-card">

            {{-- HEADER FORM --}}
            <div class="form-title">

                <div class="title-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 16V8L12 3L3 8V16L12 21L21 16Z" stroke="currentColor" stroke-width="1.8"
                            stroke-linejoin="round" />

                        <path d="M3 8L12 13L21 8" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />

                        <path d="M12 13V21" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                    </svg>
                </div>

                <div>

                    <h3>
                        {{ __('Data Barang') }}
                    </h3>

                    <p>
                        {{ __('Masukkan informasi barang yang akan dikembalikan ke gudang.') }}
                    </p>

                </div>

            </div>


            <form action="#" method="POST">

                @csrf

                <div class="form-grid">

                    {{-- =================================
                     NOMOR WO
                ================================== --}}

                    <div class="form-group">

                        <label for="nomor_wo">

                            {{ __('Nomor Work Order') }} (WO)

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="text" id="nomor_wo" name="nomor_wo" class="form-control"
                            placeholder="Contoh: WO-2026-00125">

                        <small>
                            {{ __('Masukkan nomor Work Order terkait pekerjaan.') }}
                        </small>

                    </div>

                    {{-- =================================
                     NAMA PEKERJAAN
                ================================== --}}

                    <div class="form-group full">

                        <label for="nama_pekerjaan">

                            {{ __('Nama Pekerjaan') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control"
                            placeholder="Contoh: Pemeliharaan Jaringan Distribusi">

                        <small>
                            {{ __('Masukkan nama pekerjaan atau kegiatan yang menggunakan barang.') }}
                        </small>

                    </div>

                    {{-- =================================
                     ITEM NUMBER
                ================================== --}}

                    <div class="form-group">

                        <label for="item_number">

                            Item Number

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="text" id="item_number" name="item_number" class="form-control"
                            placeholder="Contoh: 1000123456">

                        <small>
                            {{ __('Masukkan kode item barang.') }}
                        </small>

                    </div>

                    {{-- =================================
                     NAMA BARANG
                ================================== --}}

                    <div class="form-group">

                        <label for="nama_barang">

                            {{ __('Nama Barang') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="text" id="nama_barang" name="nama_barang" class="form-control"
                            placeholder="Contoh: Kabel NYY 4 x 16 mm">

                        <small>
                            {{ __('Masukkan nama barang yang akan dikembalikan.') }}
                        </small>

                    </div>


                    {{-- =================================
                     JENIS PENGEMBALIAN
                ================================== --}}

                    <div class="form-group">

                        <label for="jenis_pengembalian">

                            {{ __('Jenis Pengembalian') }}

                            <span class="required">

                                *

                            </span>

                        </label>

                        <select id="jenis_pengembalian" name="jenis_pengembalian" class="form-control">

                            <option value="">

                                {{ __('Pilih jenis pengembalian...') }}

                            </option>

                            <option value="barang_lebihan">

                                {{ __('Barang Lebihan') }}

                            </option>

                            <option value="barang_pasca_pakai">

                                {{ __('Barang Pasca Pakai') }}

                            </option>

                        </select>

                        <small>

                            {{ __('Pilih alasan atau jenis barang yang dikembalikan.') }}

                        </small>

                    </div>


                    {{-- =================================
                     JENIS PEROLEHAN BARANG
                ================================== --}}
                    <div class="form-group">

                        <label for="kondisi_barang">

                            {{ __('Jenis Perolehan Barang') }}

                            <span class="required">

                                *

                            </span>

                        </label>

                        <select id="kondisi_barang" name="kondisi_barang" class="form-control">

                            <option value="">

                                {{ __('Pilih Jenis Perolehan Barang...') }}

                            </option>

                            <option value="investasi">

                                {{ __('Investasi') }}

                            </option>

                            <option value="operasi">

                                {{ __('Operasi') }}

                            </option>

                        </select>

                        <small>

                            {{ __('Pilih klasifikasi barang / peruntukan barang.') }}

                        </small>

                    </div>


                    {{-- =================================
                     MATERIAL BASE
                ================================== --}}

                    <div class="form-group">

                        <label for="material_base">

                            Material Base

                            <span class="required">
                                *
                            </span>

                        </label>

                        <select id="material_base" name="material_base" class="form-control">

                            <option value="">
                                {{ __('Pilih jenis material barang...') }}
                            </option>

                            <option value="besi/baja">
                                {{ __('Besi/Baja') }}
                            </option>

                            <option value="aluminium">
                                {{ __('Aluminium') }}
                            </option>

                            <option value="tembaga">
                                {{ __('Tembaga') }}
                            </option>

                            <option value="plastik">
                                {{ __('Plastik') }}
                            </option>

                            <option value="campuran">
                                {{ __('Campuran') }}
                            </option>

                        </select>

                        <small>
                            {{ __('Pilih material barang.') }}
                        </small>

                    </div>


                    {{-- =================================
                     LOKASI GUDANG
                ================================== --}}

                    <div class="form-group">

                        <label for="lokasi_gudang">

                            {{ __('Lokasi Gudang') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="text" id="lokasi_gudang" name="lokasi_gudang" class="form-control"
                            placeholder="Masukkan lokasi gudang">
                        <small>
                            {{ __('Pilih lokasi gudang tujuan pengembalian barang.') }}
                        </small>



                    </div>


                    {{-- =================================
     KUANTITAS + SATUAN
================================== --}}
                    <div class="quantity-unit-group">

                        <div class="quantity-field">
                            <label for="jumlah_barang">
                                {{ __('Kuantitas') }}
                                <span class="required">*</span>
                            </label>

                            <input type="number" id="jumlah_barang" name="jumlah_barang" class="form-control"
                                placeholder="Contoh: 10" min="1">

                            <small>
                                {{ __('Masukkan jumlah barang yang dikembalikan.') }}
                            </small>
                        </div>

                        <div class="unit-field">
                            <label for="satuan">
                                {{ __('Satuan') }}
                                <span class="required">*</span>
                            </label>

                            <select id="satuan" name="satuan" class="form-control">
                                <option value="">
                                    {{ __('Pilih satuan...') }}
                                </option>

                                <option value="pcs">
                                    Pcs
                                </option>

                                <option value="unit">
                                    Unit
                                </option>

                                <option value="meter">
                                    Meter
                                </option>

                                <option value="set">
                                    Set
                                </option>

                                <option value="buah">
                                    Buah
                                </option>
                            </select>

                            <small>
                                {{ __('Pilih satuan jumlah barang.') }}
                            </small>
                        </div>

                    </div>


                    {{-- =================================
                     ESTIMASI (KG)
                ================================== --}}

                    <div class="form-group">

                        <label for="estimasi">

                            {{ __('Estimasi') }} (Kg)

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="number" id="estimasi" name="estimasi" class="form-control"
                            placeholder="Contoh: 1">

                        <small>
                            {{ __('Masukkan estimasi berat barang') }}(Kg).
                        </small>

                    </div>

                </div>

            </form>


            {{-- =================================
                 BUTTON
            ================================== --}}

            <div class="form-actions">

                {{-- KEMBALI --}}
                <a href="{{ route('inputExBarang') }}" class="btn-back">
                    <span>‹</span>
                    {{ __('Kembali') }}
                </a>


                {{-- LANJUT --}}
                <a href="{{ route('inputExBarang.step3') }}" class="btn-next">
                    {{ __('Lanjut') }}
                    <span>›</span>
                </a>

            </div>

        </div>

    </div>


    <style>
        /* =========================================
                                                                                                                                                                                                                   CONTAINER
                                                                                                                                                                                                                ========================================= */

        .form-container {

            width: 100%;

            max-width: 1200px;

            margin: 0 auto;

            padding: 28px 24px 40px;

            box-sizing: border-box;

        }


        /* =========================================
                                                                                                                                                                                                                   CARD
                                                                                                                                                                                                                ========================================= */

        .step-card {

            background: #ffffff;

            border-radius: 16px;

            border: 1px solid #edf0f5;

            box-shadow:
                0 4px 20px rgba(15, 23, 42, 0.05);

            box-sizing: border-box;

        }


        /* =========================================
                                                                                                                                                                                                                   PROGRESS CARD
                                                                                                                                                                                                                ========================================= */

        .progress-card {

            padding: 22px 40px 20px;

            margin-bottom: 24px;

        }


        /* =========================================
                                                                                                                                                                                                                   PROGRESS
                                                                                                                                                                                                                ========================================= */

        .progress {

            width: 100%;

            max-width: 900px;

            margin: 0 auto;

            display: flex;

            align-items: flex-start;

            justify-content: center;

        }


        /* =========================================
                                                                                                                                                                                                                   STEP
                                                                                                                                                                                                                ========================================= */

        .progress-step {

            min-width: 150px;

            display: flex;

            flex-direction: column;

            align-items: center;

            position: relative;

            z-index: 2;

        }


        /* =========================================
                                                                                                                                                                                                                   STEP NUMBER
                                                                                                                                                                                                                ========================================= */

        .step-number {

            width: 36px;

            height: 36px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #edf1f6;

            color: #7b8798;

            font-size: 14px;

            font-weight: 600;

        }


        /* STEP 1 SELESAI */

        .progress-step.completed .step-number {

            background: #16ad55;

            color: #ffffff;

        }


        /* STEP 2 AKTIF */

        .progress-step.active .step-number {

            background: #1769d1;

            color: #ffffff;

            box-shadow:
                0 4px 10px rgba(23, 105, 209, 0.20);

        }


        /* =========================================
                                                                                                                                                                                                                   LABEL
                                                                                                                                                                                                                ========================================= */

        .step-label {

            margin-top: 8px;

            font-size: 12px;

            font-weight: 500;

            color: #8a96a8;

            text-align: center;

            white-space: nowrap;

        }


        .progress-step.active .step-label {

            color: #1769d1;

            font-weight: 600;

        }


        .progress-step.completed .step-label {

            color: #172b4d;

            font-weight: 600;

        }


        /* =========================================
                                                                                                                                                                                                                   LINE
                                                                                                                                                                                                                ========================================= */

        .progress-line {

            flex: 1;

            height: 2px;

            min-width: 90px;

            max-width: 180px;

            background: #dfe5ec;

            margin-top: 18px;

        }


        .progress-line.active {

            background: #1769d1;

        }


        /* =========================================
                                                                                                                                                                                                                   FORM CARD
                                                                                                                                                                                                                ========================================= */

        .form-card {

            padding: 28px 36px 22px;

        }


        /* =========================================
                                                                                                                                                                                                                   FORM TITLE
                                                                                                                                                                                                                ========================================= */

        .form-title {

            display: flex;

            align-items: center;

            gap: 14px;

            padding-bottom: 20px;

            margin-bottom: 26px;

            border-bottom: 1px solid #edf0f4;

        }


        /* =========================================
                                                                                                                                                                                                                   ICON
                                                                                                                                                                                                                ========================================= */

        .title-icon {

            width: 46px;

            height: 46px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            background: #edf5ff;

            color: #1769d1;

        }


        /* =========================================
                                                                                                                            TITLE TEXT
                                                                                                            ========================================= */

        .form-title h3 {

            margin: 0 0 4px;

            font-size: 20px;

            line-height: 1.3;

            font-weight: 700;

            color: #172b4d;

        }


        .form-title p {

            margin: 0;

            font-size: 13px;

            color: #91a0b5;

        }


        /* =========================================
                                                                                                            FORM GRID
                                                                                              ========================================= */

        .form-grid {

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            column-gap: 18px;

            row-gap: 20px;

        }


        /* FULL WIDTH */

        .form-group.full {

            grid-column: 1 / -1;

        }


        /* =========================================
                                                                                                          FORM GROUP
                                                                                             ========================================= */

        .form-group {

            display: flex;

            flex-direction: column;

            min-width: 0;

        }

        /* =========================================
                                                                                       KUANTITAS + SATUAN DALAM 1 BARIS
                                                                                    ========================================= */

        .quantity-unit-group {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            min-width: 0;
        }

        .quantity-field,
        .unit-field {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .quantity-field label,
        .unit-field label {
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #23395d;
        }

        .quantity-field small,
        .unit-field small {
            margin-top: 6px;
            font-size: 11px;
            line-height: 1.4;
            color: #9aa7b9;
        }







        /* =========================================
                                                                                                              LABEL
                                                                                                ========================================= */

        .form-group label {

            margin-bottom: 8px;

            font-size: 13px;

            font-weight: 600;

            color: #23395d;

        }


        .required {

            color: #e53935;

            margin-left: 2px;

        }


        /* =========================================
                                                                                                             INPUT
                                                                                               ========================================= */

        .form-control {

            width: 100%;

            height: 46px;

            padding: 0 14px;

            box-sizing: border-box;

            border: 1px solid #d9e1ec;

            border-radius: 9px;

            background: #ffffff;

            color: #253858;

            font-family: inherit;

            font-size: 13px;

            outline: none;

            transition: all 0.2s ease;

        }


        .form-control::placeholder {

            color: #9ba8ba;

        }


        .form-control:focus {

            border-color: #4d8ee8;

            box-shadow:
                0 0 0 3px rgba(77, 142, 232, 0.10);

        }


        select.form-control {

            cursor: pointer;

        }


        /* =========================================
                                                                                                                                                                                                                   SMALL TEXT
                                                                                                                                                                                                                ========================================= */

        .form-group small {

            margin-top: 6px;

            font-size: 11px;

            line-height: 1.4;

            color: #9aa7b9;

        }


        /* =========================================
                                                                                                                ACTIONS
                                                                                                   ========================================= */

        .form-actions {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 26px;

            padding-top: 20px;

            border-top: 1px solid #edf0f4;

        }



        /* =========================================
                                                                                                            BUTTON KEMBALI
                                                                                                 ========================================= */

        .btn-back {

            height: 42px;

            padding: 0 18px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            border: 1px solid #d7dfeb;

            border-radius: 9px;

            background: #ffffff;

            color: #52647c;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            box-sizing: border-box;

            transition: all 0.2s ease;

        }


        .btn-back span {

            font-size: 20px;

            line-height: 1;

        }


        .btn-back:hover {

            background: #f7f9fc;

            border-color: #bfcbdc;

        }


        /* =========================================
                                                                                                               BUTTON NEXT
                                                                                                  ========================================= */

        .btn-next {

            min-width: 104px;

            height: 42px;

            padding: 0 18px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            border-radius: 9px;

            background: #075bb5;

            color: #ffffff;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            box-sizing: border-box;

            transition: all 0.2s ease;

        }


        .btn-next span {

            font-size: 20px;

            line-height: 1;

        }


        .btn-next:hover {

            background: #064e9b;

            transform: translateY(-1px);

            box-shadow:
                0 4px 10px rgba(7, 91, 181, 0.18);

        }


        /* =========================================
                                                                                                                                                                                                                   TABLET
                                                                                                                                                                                                                ========================================= */

        @media (max-width: 900px) {

            .form-container {

                padding: 22px 18px 32px;

            }

            .progress-card {

                padding-left: 20px;

                padding-right: 20px;

            }

            .progress-step {

                min-width: 110px;

            }

            .progress-line {

                min-width: 60px;

            }

            .form-card {

                padding: 26px 24px 22px;

            }

        }


        /* =========================================
                                                                                                                                                                                                                   MOBILE
                                                                                                                                                                                                                ========================================= */

        @media (max-width: 650px) {

            .form-container {

                padding: 16px 12px 28px;

            }

            .quantity-unit-group {
                grid-template-columns: 1fr;
                gap: 18px;
            }


            .progress-card {

                padding: 18px 12px 16px;

                overflow-x: auto;

            }


            .progress {

                min-width: 430px;

            }


            .progress-step {

                min-width: 100px;

            }


            .progress-line {

                min-width: 45px;

                max-width: 80px;

            }


            .form-card {

                padding: 22px 18px 20px;

            }


            .form-grid {

                grid-template-columns: 1fr;

                row-gap: 18px;

            }


            .form-group.full {

                grid-column: auto;

            }


            .form-title {

                align-items: flex-start;

            }


            .form-title h3 {

                font-size: 18px;

            }


            .form-title p {

                font-size: 12px;

            }


            .form-actions {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
            }


            .btn-back,
            .btn-next {

                min-width: 0;

            }

        }


        /* =========================================
                                                                                                                                                                                                                   SMALL MOBILE
                                                                                                                                                                                                                ========================================= */

        @media (max-width: 420px) {

            .progress {

                min-width: 380px;

            }

            .progress-step {

                min-width: 85px;

            }

            .step-label {

                font-size: 10px;

            }

            .step-number {

                width: 34px;

                height: 34px;

            }

        }
    </style>

@endsection
