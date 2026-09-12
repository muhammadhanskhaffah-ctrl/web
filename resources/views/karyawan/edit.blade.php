<x-app-layout>

    <style>
        .edit-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .edit-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .edit-header {
            padding: 25px 30px;
            border-bottom: 1px solid #e5e7eb;
        }

        .edit-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
        }

        .edit-header p {
            margin-top: 6px;
            color: #6b7280;
            font-size: 14px;
        }

        .edit-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            color: #111827;
            background: #ffffff;
            outline: none;
            transition: 0.2s;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-textarea {
            min-height: 110px;
            resize: vertical;
        }

        .error-message {
            margin-top: 5px;
            color: #dc2626;
            font-size: 13px;
        }

        .button-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 25px;
            margin-top: 10px;
            border-top: 1px solid #e5e7eb;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 20px;
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-back:hover {
            background: #e5e7eb;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            background: #2563eb;
            color: #ffffff !important;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 3px 8px rgba(37, 99, 235, 0.25);
            transition: 0.2s;
        }

        .btn-save:hover {
            background: #1d4ed8;
            box-shadow: 0 5px 12px rgba(37, 99, 235, 0.3);
        }

        @media (max-width: 640px) {
            .edit-container {
                margin: 20px auto;
                padding: 0 12px;
            }

            .edit-body {
                padding: 20px;
            }

            .button-area {
                flex-direction: column-reverse;
                gap: 12px;
                align-items: stretch;
            }

            .btn-back,
            .btn-save {
                justify-content: center;
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>


    <div class="edit-container">

        <div class="edit-card">

            {{-- HEADER --}}
            <div class="edit-header">

                <h2>
                    Edit Data Karyawan
                </h2>

                <p>
                    Perbarui informasi data karyawan.
                </p>

            </div>


            {{-- FORM --}}
            <div class="edit-body">

                <form
                    method="POST"
                    action="{{ route('karyawan.update', $karyawan->id) }}"
                >

                    @csrf
                    @method('PUT')


                    {{-- NIK --}}
                    <div class="form-group">

                        <label class="form-label">
                            NIK
                        </label>

                        <input
                            type="text"
                            name="nik"
                            class="form-input"
                            value="{{ old('nik', $karyawan->nik) }}"
                            required
                        >

                        @error('nik')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- NAMA --}}
                    <div class="form-group">

                        <label class="form-label">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-input"
                            value="{{ old('nama', $karyawan->nama) }}"
                            required
                        >

                        @error('nama')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- JABATAN --}}
                    <div class="form-group">

                        <label class="form-label">
                            Jabatan
                        </label>

                        <input
                            type="text"
                            name="jabatan"
                            class="form-input"
                            value="{{ old('jabatan', $karyawan->jabatan) }}"
                            required
                        >

                        @error('jabatan')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- DEPARTEMEN --}}
                    <div class="form-group">

                        <label class="form-label">
                            Departemen
                        </label>

                        <input
                            type="text"
                            name="departemen"
                            class="form-input"
                            value="{{ old('departemen', $karyawan->departemen) }}"
                            required
                        >

                        @error('departemen')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- JENIS KELAMIN --}}
                    <div class="form-group">

                        <label class="form-label">
                            Jenis Kelamin
                        </label>

                        <select
                            name="jenis_kelamin"
                            class="form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Jenis Kelamin --
                            </option>

                            <option
                                value="L"
                                {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'L' ? 'selected' : '' }}
                            >
                                Laki-laki
                            </option>

                            <option
                                value="P"
                                {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'P' ? 'selected' : '' }}
                            >
                                Perempuan
                            </option>

                        </select>

                        @error('jenis_kelamin')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- TANGGAL LAHIR --}}
                    <div class="form-group">

                        <label class="form-label">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            class="form-input"
                            value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}"
                            required
                        >

                        @error('tanggal_lahir')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- ALAMAT --}}
                    <div class="form-group">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="form-textarea"
                            required
                        >{{ old('alamat', $karyawan->alamat) }}</textarea>

                        @error('alamat')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- NO HP --}}
                    <div class="form-group">

                        <label class="form-label">
                            No. HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-input"
                            value="{{ old('no_hp', $karyawan->no_hp) }}"
                            required
                        >

                        @error('no_hp')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- TANGGAL MASUK --}}
                    <div class="form-group">

                        <label class="form-label">
                            Tanggal Masuk
                        </label>

                        <input
                            type="date"
                            name="tanggal_masuk"
                            class="form-input"
                            value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk) }}"
                            required
                        >

                        @error('tanggal_masuk')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- TOMBOL --}}
                    <div class="button-area">

                        <a
                            href="{{ route('karyawan.index') }}"
                            class="btn-back"
                        >
                            ← Kembali
                        </a>

                        <button
                            type="submit"
                            class="btn-save"
                        >
                            ✓ &nbsp; Simpan Perubahan
                        </button>

                    </div>


                </form>

            </div>

        </div>

    </div>

</x-app-layout>