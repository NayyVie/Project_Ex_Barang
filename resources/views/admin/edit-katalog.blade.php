@extends('layouts.app-admin')

@section('title', 'Edit Katalog Spare Part')

@section('page-title', 'Edit Katalog Master')

@section('page-subtitle', 'PLN Nusantara Power Services')

@section('Profile', 'Admin')

@section('content')

    <style>
        /* =========================================
           EDIT KATALOG
           Mengikuti desain form katalog yang sudah ada
        ========================================= */

        .edit-page {
            background: #ffffff;
            border: 1px solid #e8edf3;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(15, 39, 70, .04);
            overflow: hidden;
        }

        .edit-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            padding: 22px 26px;

            border-bottom: 1px solid #e8edf3;

            background: #ffffff;
        }

        .edit-header h2 {
            margin: 0 0 5px;

            color: #123b68;

            font-size: 19px;
            font-weight: 700;
        }

        .edit-header p {
            margin: 0;

            color: #7b91a8;

            font-size: 11px;
            line-height: 1.5;
        }

        .edit-body {
            padding: 25px;
            background: #f7faff;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-row.three-column {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .form-row.four-column {
            grid-template-columns: repeat(4, 1fr);
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            color: #263d5b;

            font-size: 11px;
            font-weight: 600;
        }

        .form-group label span {
            color: #e53935;
        }

        .form-control {
            width: 100%;
            height: 38px;

            padding: 0 12px;

            border: 1px solid #dce4ef;
            border-radius: 7px;

            background: #ffffff;

            color: #263d5b;

            font-family: 'Poppins', sans-serif;
            font-size: 12px;

            outline: none;

            transition: .2s ease;

            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #0874c9;

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

        .edit-footer {
            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 8px;

            padding: 15px 22px;

            border-top: 1px solid #e8edf3;

            background: #ffffff;
        }

        .btn-edit-cancel {
            height: 34px;

            padding: 0 13px;

            border-radius: 6px;

            border: none;

            background: #185bd1;

            color: #ffffff;

            font-family: inherit;

            font-size: 11px;

            cursor: pointer;
        }

        .btn-edit-save {
            height: 34px;

            padding: 0 15px;

            border: none;

            border-radius: 6px;

            background: #185bd1;

            color: #ffffff;

            font-family: inherit;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;
        }

        @media (max-width: 900px) {

            .form-row,
            .form-row.three-column,
            .form-row.four-column {
                grid-template-columns: 1fr 1fr;
            }

        }

        @media (max-width: 600px) {

            .edit-body {
                padding: 18px;
            }

            .form-row,
            .form-row.three-column,
            .form-row.four-column {
                grid-template-columns: 1fr;
            }

            .edit-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-edit-cancel,
            .btn-edit-save {
                width: 100%;
            }

        }
    </style>


    <div class="edit-page">

        {{-- HEADER --}}
        <div class="edit-header">

            <div>

                <h2>Edit Data Spare Part</h2>

                <p>
                    Perbarui data katalog material pada sistem gudang dan Maximo
                </p>

            </div>

        </div>


        {{-- BODY --}}
        <div class="edit-body">

            {{-- BARIS 1 --}}
            <div class="form-row">

                <div class="form-group">

                    <label>
                        Item Number Maximo <span>*</span>
                    </label>

                    <input type="text" class="form-control" value="{{ $item['item_number'] }}" readonly>

                </div>


                <div class="form-group">

                    <label>
                        Kategori Material <span>*</span>
                    </label>

                    <select class="form-control">

                        <option {{ $item['kategori'] == 'Mekanikal' ? 'selected' : '' }}>
                            Mekanikal
                        </option>

                        <option {{ $item['kategori'] == 'Elektrikal' ? 'selected' : '' }}>
                            Elektrikal
                        </option>

                        <option {{ $item['kategori'] == 'C&I (Instrumen)' ? 'selected' : '' }}>
                            C&I (Instrumen)
                        </option>

                        <option {{ $item['kategori'] == 'Kimia & Pelumas' ? 'selected' : '' }}>
                            Kimia & Pelumas
                        </option>

                        <option {{ $item['kategori'] == 'Consumable & Fastener' ? 'selected' : '' }}>
                            Consumable & Fastener
                        </option>

                        <option {{ $item['kategori'] == 'Safety & K3' ? 'selected' : '' }}>
                            Safety & K3
                        </option>

                    </select>

                </div>

            </div>


            {{-- DESKRIPSI --}}
            <div class="form-group">

                <label>
                    Deskripsi Spare Part <span>*</span>
                </label>

                <input type="text" class="form-control" value="{{ $item['deskripsi'] }}">

            </div>


            {{-- SPESIFIKASI --}}
            <div class="form-group">

                <label>
                    Spesifikasi Teknis / Part Number Pabrikan
                </label>

                <textarea class="form-control">{{ $item['spesifikasi'] }}</textarea>

            </div>


            {{-- BARIS 2 --}}
            <div class="form-row three-column">

                <div class="form-group">

                    <label>
                        Lokasi Bin / Rak <span>*</span>
                    </label>

                    <input type="text" class="form-control" value="{{ $item['lokasi'] }}">

                </div>


                <div class="form-group">

                    <label>
                        Satuan Ukur (UoM) <span>*</span>
                    </label>

                    <select class="form-control">

                        <option {{ $item['satuan'] == 'PCS' ? 'selected' : '' }}>
                            PCS (Buah)
                        </option>

                        <option {{ $item['satuan'] == 'SET' ? 'selected' : '' }}>
                            SET
                        </option>

                        <option {{ $item['satuan'] == 'KG' ? 'selected' : '' }}>
                            KG
                        </option>

                        <option {{ $item['satuan'] == 'LTR' ? 'selected' : '' }}>
                            LTR
                        </option>

                        <option {{ $item['satuan'] == 'MTR' ? 'selected' : '' }}>
                            MTR
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>
                        Unit Pembangkit
                    </label>

                    <select class="form-control">

                        <option value="">
                            Pilih unit
                        </option>

                        <option>
                            PLTU Unit 1-2
                        </option>

                        <option>
                            PLTU Unit 3-4
                        </option>

                        <option>
                            PLTU Unit 5-6
                        </option>

                        <option>
                            PLTG
                        </option>

                        <option>
                            PLTS
                        </option>

                    </select>

                </div>

            </div>


            {{-- BARIS 3 --}}
            <div class="form-row four-column">

                <div class="form-group">

                    <label>
                        Stok Fisik
                    </label>

                    <input type="number" class="form-control" value="{{ $item['stok_fisik'] }}" min="0">

                </div>


                <div class="form-group">

                    <label>
                        Stok Maximo
                    </label>

                    <input type="number" class="form-control" value="{{ $item['stok_maximo'] }}" min="0">

                </div>


                <div class="form-group">

                    <label>
                        Reorder Point (ROP)
                    </label>

                    <input type="number" class="form-control" value="{{ $item['rop'] }}" min="0">

                </div>


                <div class="form-group">

                    <label>
                        Harga Satuan (IDR)
                    </label>

                    <input type="number" class="form-control" value="{{ $item['harga'] }}" min="0">

                </div>

            </div>

        </div>


        {{-- FOOTER --}}
        <div class="edit-footer">

            <a href="{{ route('katalogAdmin') }}" class="btn-edit-cancel"
                style="text-decoration:none; display:flex; align-items:center; justify-content:center;">
                Batal
            </a>

            <button type="button" class="btn-edit-save" onclick="alert('Data berhasil diperbarui')">
                Simpan Perubahan
            </button>

        </div>

    </div>

@endsection
