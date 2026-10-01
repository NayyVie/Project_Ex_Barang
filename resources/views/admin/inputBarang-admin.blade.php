@extends('layouts.app-admin')

@section('title', 'Input Ex Barang')

@section('page-title', 'Input Ex Barang')

@section('page-subtitle', 'PLN Nusantara Power Services')

@section('content')

    <div class="form-container">

        {{-- ================================
         PROGRESS STEP
    ================================= --}}

        <div class="step-card progress-card">

            <div class="progress">

                {{-- STEP 1 --}}
                <div class="progress-step active">

                    <div class="step-number">
                        1
                    </div>

                    <div class="step-label">
                        {{ __('Informasi Pengguna') }}
                    </div>

                </div>


                {{-- GARIS --}}
                <div class="progress-line"></div>


                {{-- STEP 2 --}}
                <div class="progress-step">

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


        {{-- ================================
         FORM STEP 1
    ================================= --}}

        <div class="step-card">

            {{-- FORM HEADER --}}
            <div class="form-title">

                <div class="title-icon">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">

                        <path d="M20 21V19C20 16.7909 18.2091 15 16 15H8C5.79086 15 4 16.7909 4 19V21" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" />

                        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2" />

                    </svg>

                </div>


                <div>

                    <h3>
                        Informasi Pengguna
                    </h3>

                    <p>
                        {{ __('Lengkapi informasi pengguna sebelum melanjutkan.') }}
                    </p>

                </div>

            </div>


            <form action="#" method="POST">

                @csrf


                <div class="form-grid">

                    {{-- ================================
                     NAMA PELAPOR
                ================================= --}}

                    <div class="form-group">

                        <label for="nama_pelapor">

                            {{ __('Nama Pengguna') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="text" id="nama_pelapor" name="nama_pelapor" class="form-control"
                            value="Budi Santoso" readonly>

                        <small>
                            {{ __('Nama pengguna berdasarkan akun yang sedang digunakan.') }}
                        </small>

                    </div>


                    {{-- ================================
                     ID KARYAWAN
                ================================= --}}

                    <div class="form-group">

                        <label for="id_karyawan">

                            {{ __('Karyawan ID') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="text" id="id_karyawan" name="id_karyawan" class="form-control" value="EMP001"
                            readonly>

                        <small>
                            {{ __('ID Karyawan pengguna.') }}
                        </small>

                    </div>


                    {{-- ================================
                     TANGGAL PENGEMBALIAN
                ================================= --}}

                    <div class="form-group">

                        <label for="tanggal_laporan">

                            {{ __('Tanggal Pengembalian') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="date" id="tanggal_laporan" name="tanggal_laporan" class="form-control"
                            value="{{ date('Y-m-d') }}">

                        <small>
                            {{ __('Tanggal barang dikembalikan.') }}
                        </small>

                    </div>


                    {{-- ================================
                     STATUS LOKASI
                ================================= --}}

                    <div class="form-group">

                        <label for="status_lokasi">

                            {{ __('Status Lokasi') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input type="text" id="status_lokasi" name="status_lokasi" class="form-control"
                            value="PLN Unit Surabaya" readonly>

                        <small>
                            {{ __('Status lokasi pengguna saat membuat laporan.') }}
                        </small>

                    </div>


                    {{-- ================================
                     BIDANG
                ================================= --}}

                    <div class="form-group full">

                        <label for="bidang">

                            {{ __('Bidang') }}

                            <span class="required">
                                *
                            </span>

                        </label>

                        <select id="bidang" name="bidang" class="form-control">

                            <option value="">
                                {{ __('Pilih Bidang...') }}
                            </option>

                            <option value="mekanik">
                                {{ __('Mekanik') }}
                            </option>

                            <option value="listrik">
                                {{ __('Listrik') }}
                            </option>

                            <option value="controlling_instrumen">
                                Controlling Instrumen
                            </option>

                            <option value="gudang">
                                {{ __('Gudang') }}
                            </option>

                        </select>

                        <small>
                            {{ __('Pilih bidang tempat pengguna bekerja.') }}
                        </small>

                    </div>

                </div>


                {{-- ================================
                 BUTTON
            ================================= --}}

                <div class="form-actions">

                    <a href="{{ route('inputAdmin.Step2') }}" class="btn-next">

                        {{ __('Lanjut') }}

                        <span>›</span>

                    </a>

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
                                               PROGRESS STEP
                                            ========================================= */

        .progress-step {

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            min-width: 140px;

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

            transition: 0.2s;
        }


        /* STEP AKTIF */

        .progress-step.active .step-number {

            background: #1769d1;

            color: #ffffff;

            box-shadow:
                0 4px 10px rgba(23, 105, 209, 0.20);
        }


        /* =========================================
                                               STEP LABEL
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


        /* =========================================
                                               PROGRESS LINE
                                            ========================================= */

        .progress-line {

            flex: 1;

            height: 2px;

            min-width: 100px;

            max-width: 220px;

            background: #dfe5ec;

            margin-top: 18px;

        }


        /* =========================================
                                               FORM CARD
                                            ========================================= */

        .step-card:not(.progress-card) {

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
                                               TITLE ICON
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


        /* PLACEHOLDER */

        .form-control::placeholder {

            color: #9ba8ba;
        }


        /* FOCUS */

        .form-control:focus {

            border-color: #4d8ee8;

            box-shadow:
                0 0 0 3px rgba(77, 142, 232, 0.10);
        }


        /* READONLY */

        .form-control[readonly] {

            background: #fbfcfe;

            color: #50627a;

        }


        /* SELECT */

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
                                               FORM ACTIONS
                                            ========================================= */

        .form-actions {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            margin-top: 26px;

            padding-top: 20px;

            border-top: 1px solid #edf0f4;
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

            font-size: 18px;

            line-height: 1;

            margin-top: -1px;
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

            .step-card:not(.progress-card) {

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


            /* PROGRESS */

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


            /* FORM */

            .step-card:not(.progress-card) {

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


            .btn-next {

                width: 100%;
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
