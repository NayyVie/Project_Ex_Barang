@extends('layouts.app-admin')

@section('title', 'Input Ex Used')

@section('page-title', 'Input Ex Used')

@section('page-subtitle', 'Kondisi & Bukti')

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
                <div class="progress-step completed">

                    <div class="step-number">
                        ✓
                    </div>

                    <div class="step-label">
                        {{ __('Data Barang') }}
                    </div>

                </div>


                {{-- GARIS --}}
                <div class="progress-line active"></div>


                {{-- STEP 3 --}}
                <div class="progress-step active">

                    <div class="step-number">
                        3
                    </div>

                    <div class="step-label">
                        {{ __('Kondisi & Bukti') }}
                    </div>

                </div>

            </div>

        </div>


        {{-- =================================
         FORM STEP 3
    ================================== --}}

        <div class="step-card form-card">

            {{-- HEADER --}}
            <div class="form-title">

                <div class="title-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4 7H7L9 4H15L17 7H20C21.1 7 22 7.9 22 9V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V9C2 7.9 2.9 7 4 7Z"
                            stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />

                        <circle cx="12" cy="13.5" r="3.5" stroke="currentColor" stroke-width="1.8" />
                    </svg>
                </div>

                <div>

                    <h3>
                        {{ __('Kondisi & Bukti') }}
                    </h3>

                    <p>
                        {{ __('Lengkapi kondisi barang dan bukti pendukung pengembalian.') }}
                    </p>

                </div>

            </div>


            <form action="#" method="POST" enctype="multipart/form-data">

                @csrf


                <div class="form-grid">

                    {{-- =================================
                     KONDISI BARANG
                ================================== --}}

                    <div class="form-group full">

                        <label for="status_kondisi">

                            {{ __('Kondisi Barang') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <select id="status_kondisi" name="status_kondisi" class="form-control" required>

                            <option value="">
                                {{ __('Pilih kondisi barang...') }}
                            </option>

                            <option value="rusak">
                                {{ __('Rusak') }}
                            </option>

                            <option value="repairable">
                                Repairable
                            </option>

                            <option value="kehilangan_fungsi">
                                {{ __('Kehilangan Fungsi') }}
                            </option>

                        </select>

                        <small>
                            {{ __('Pilih kondisi barang sesuai keadaan barang saat dikembalikan.') }}
                        </small>

                    </div>


                    {{-- =================================
                     FOTO BUKTI
                ================================== --}}

                    <div class="form-group full">

                        <label for="foto_bukti">

                            {{ __('Foto Bukti') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <div class="upload-box">

                            <input type="file" id="foto_bukti" name="foto_bukti" accept="image/*" required>

                            <div class="upload-content">

                                <div class="upload-icon">

                                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">

                                        <path d="M4 17L8.5 12.5L11.5 15.5L14.5 12.5L20 18" stroke="currentColor"
                                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />

                                        <rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor"
                                            stroke-width="1.8" />

                                        <circle cx="8.5" cy="8.5" r="1.5" stroke="currentColor"
                                            stroke-width="1.5" />

                                    </svg>

                                </div>

                                <div>

                                    <strong>
                                        {{ __('Pilih foto bukti') }}
                                    </strong>

                                    <span>
                                        JPG, JPEG atau PNG • {{ __('Maks.') }} 5 MB
                                    </span>

                                </div>

                            </div>

                        </div>

                        <small>
                            {{ __('Upload foto yang menunjukkan kondisi barang sebelum dikembalikan.') }}
                        </small>

                    </div>


                    {{-- =================================
                     DESKRIPSI TAMBAHAN
                ================================== --}}

                    <div class="form-group full">

                        <label for="deskripsi">

                            {{ __('Deskripsi Tambahan') }}

                            <span class="optional">
                                (Opsional)
                            </span>

                        </label>

                        <textarea id="deskripsi" name="deskripsi" class="form-control textarea-control"
                            placeholder="Contoh: Kabel mengalami kerusakan pada bagian isolasi setelah digunakan dalam pekerjaan..."></textarea>

                        <small>
                            {{ __('Tambahkan informasi lain mengenai kondisi atau riwayat barang.') }}
                        </small>

                    </div>


                    {{-- =================================
                     TANDA TANGAN
                ================================== --}}

                    <div class="form-group full">

                        <label>

                            {{ __('Tanda Tangan') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <div class="signature-box">

                            <div class="signature-placeholder">

                                <span>
                                    ✎
                                </span>

                                <p>
                                    {{ __('Tanda tangan di area ini') }}
                                </p>

                            </div>

                        </div>

                        <small>
                            {{ __('Berikan tanda tangan sebagai bentuk konfirmasi pengembalian barang.') }}
                        </small>

                    </div>


                    {{-- =================================
                     PERNYATAAN
                ================================== --}}

                    <div class="form-group full">

                        <label class="agreement">

                            <input type="checkbox" id="pernyataan" name="pernyataan" required>

                            <span class="checkmark"></span>

                            <span class="agreement-text">
                                {{ __('Saya menyatakan bahwa informasi yang diberikan') }}
                                <strong>
                                    {{ __('benar dan akurat') }}
                                </strong>
                                {{ __('serta dapat dipertanggungjawabkan.') }}
                            </span>

                        </label>

                    </div>

                </div>


                {{-- =================================
                 BUTTON
            ================================== --}}

                <div class="form-actions">

                    {{-- KEMBALI --}}
                    <a href="{{ route('inputAdmin.Step2') }}" class="btn-back"
                        class="menu-item {{ request()->routeIs('inputAdmin.Step2') ? 'active' : '' }}">
                        <span>‹</span>
                        {{ __('Kembali') }}
                    </a>


                    {{-- KIRIM --}}
                    <button type="submit" class="btn-next">
                        {{ __('Kirim Laporan') }}
                    </button>

                </div>

            </form>

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
                                   PROGRESS
                                ========================================= */

        .progress-card {
            padding: 22px 40px 20px;
            margin-bottom: 24px;
        }

        .progress {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }

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


        /* STEP SELESAI */

        .progress-step.completed .step-number {
            background: #16ad55;
            color: #ffffff;
        }


        /* STEP AKTIF */

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
                                   TITLE
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
                                   GRID
                                ========================================= */

        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            column-gap: 18px;
            row-gap: 20px;
        }

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

        .optional {
            color: #9aa7b9;
            font-weight: 400;
            margin-left: 3px;
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
                                   SMALL
                                ========================================= */

        .form-group small {
            margin-top: 6px;

            font-size: 11px;
            line-height: 1.4;

            color: #9aa7b9;
        }


        /* =========================================
                                   UPLOAD
                                ========================================= */

        .upload-box {
            position: relative;

            min-height: 105px;

            border: 1.5px dashed #cbd7e6;
            border-radius: 10px;

            background: #fbfcfe;

            overflow: hidden;

            cursor: pointer;
        }

        .upload-box:hover {
            border-color: #4d8ee8;
            background: #f7faff;
        }

        .upload-box input[type="file"] {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            opacity: 0;

            cursor: pointer;

            z-index: 2;
        }

        .upload-content {
            min-height: 105px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 14px;
        }

        .upload-icon {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #edf5ff;
            color: #1769d1;
        }

        .upload-content strong {
            display: block;

            margin-bottom: 4px;

            font-size: 13px;
            color: #315071;
        }

        .upload-content span {
            display: block;

            font-size: 11px;
            color: #9aa7b9;
        }


        /* =========================================
                                   TEXTAREA
                                ========================================= */

        .textarea-control {
            height: 100px;

            padding-top: 12px;
            padding-bottom: 12px;

            resize: vertical;
        }


        /* =========================================
                                   SIGNATURE
                                ========================================= */

        .signature-box {
            width: 100%;
            height: 145px;

            border: 1px solid #d9e1ec;
            border-radius: 9px;

            background:
                repeating-linear-gradient(0deg,
                    transparent,
                    transparent 28px,
                    #f1f4f8 29px);

            position: relative;

            cursor: crosshair;
        }

        .signature-placeholder {
            position: absolute;

            inset: 0;

            display: flex;
            flex-direction: column;

            align-items: center;
            justify-content: center;

            color: #a1adbd;
        }

        .signature-placeholder span {
            font-size: 26px;
            margin-bottom: 4px;
        }

        .signature-placeholder p {
            margin: 0;

            font-size: 12px;
        }


        /* =========================================
                                   AGREEMENT
                                ========================================= */

        .agreement {
            display: flex !important;

            flex-direction: row !important;

            align-items: flex-start;

            gap: 10px;

            margin: 4px 0 0;

            cursor: pointer;
        }


        /* CHECKBOX */

        .agreement input {
            width: 17px;
            height: 17px;

            margin: 1px 0 0;

            accent-color: #1769d1;

            cursor: pointer;

            flex-shrink: 0;
        }


        /* TEXT */

        .agreement-text {
            font-size: 12px;

            line-height: 1.6;

            color: #64748b;

            font-weight: 400;
        }

        .agreement-text strong {
            color: #23395d;
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
                                   BACK BUTTON
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
                                   NEXT / SUBMIT
                                ========================================= */

        .btn-next {
            min-width: 130px;

            height: 42px;

            padding: 0 18px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 10px;

            border: none;
            border-radius: 9px;

            background: #075bb5;

            color: #ffffff;

            text-decoration: none;

            font-family: inherit;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            box-sizing: border-box;

            transition: all 0.2s ease;
        }

        .btn-next span {
            font-size: 16px;
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
                margin-top: 22px;
            }

        }
    </style>

@endsection
