<x-app-layout>

    <style>
        .form-container {
            padding: 40px;
            background: #f8fafc;
            min-height: calc(100vh - 80px);
        }

        .form-card {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.06);
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .form-subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #334155;
            font-size: 14px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 11px 13px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error-text {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn-simpan {
            border: none;
            background: #2563eb;
            color: white;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-simpan:hover {
            background: #1d4ed8;
        }

        .btn-kembali {
            background: #f1f5f9;
            color: #334155;
            padding: 12px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .skor-info {
            margin-top: 8px;
            color: #64748b;
            font-size: 12px;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
        }
    </style>


    <div class="form-container">

        <div class="form-card">

            <h1 class="form-title">
                Tambah Evaluasi
            </h1>

            <p class="form-subtitle">
                Tambahkan penilaian kinerja karyawan.
            </p>


            <form
                method="POST"
                action="{{ route('evaluasi.store') }}"
            >

                @csrf


                {{-- KARYAWAN --}}
                <div class="form-group">

                    <label
                        for="karyawan_id"
                        class="form-label"
                    >
                        Karyawan
                    </label>

                    <select
                        name="karyawan_id"
                        id="karyawan_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Karyawan --
                        </option>

                        @foreach($karyawans as $karyawan)

                            <option
                                value="{{ $karyawan->id }}"
                                {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}
                            >
                                {{ $karyawan->nama }}
                                - NIK {{ $karyawan->nik }}
                            </option>

                        @endforeach

                    </select>

                    @error('karyawan_id')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- GOALS --}}
                <div class="form-group">

                    <label
                        for="goal_id"
                        class="form-label"
                    >
                        Goals
                    </label>

                    <select
                        name="goal_id"
                        id="goal_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Goals --
                        </option>

                        @foreach($goals as $goal)

                            <option
                                value="{{ $goal->id }}"
                                {{ old('goal_id') == $goal->id ? 'selected' : '' }}
                            >
                                {{ $goal->nama_goal }}
                                -
                                {{ $goal->karyawan->nama ?? '-' }}
                            </option>

                        @endforeach

                    </select>

                    @error('goal_id')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- JENIS EVALUASI --}}
                <div class="form-group">

                    <label
                        for="jenis_evaluasi"
                        class="form-label"
                    >
                        Jenis Evaluasi
                    </label>

                    <select
                        name="jenis_evaluasi"
                        id="jenis_evaluasi"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Jenis Evaluasi --
                        </option>

                        <option
                            value="self"
                            {{ old('jenis_evaluasi') == 'self' ? 'selected' : '' }}
                        >
                            Self Review
                        </option>

                        <option
                            value="peer"
                            {{ old('jenis_evaluasi') == 'peer' ? 'selected' : '' }}
                        >
                            Peer Review
                        </option>

                        <option
                            value="supervisor"
                            {{ old('jenis_evaluasi') == 'supervisor' ? 'selected' : '' }}
                        >
                            Supervisor Review
                        </option>

                    </select>

                    @error('jenis_evaluasi')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- SKOR --}}
                <div class="form-group">

                    <label
                        for="skor"
                        class="form-label"
                    >
                        Skor Evaluasi
                    </label>

                    <select
                        name="skor"
                        id="skor"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Skor --
                        </option>

                        <option
                            value="1"
                            {{ old('skor') == 1 ? 'selected' : '' }}
                        >
                            1 - Sangat Kurang
                        </option>

                        <option
                            value="2"
                            {{ old('skor') == 2 ? 'selected' : '' }}
                        >
                            2 - Kurang
                        </option>

                        <option
                            value="3"
                            {{ old('skor') == 3 ? 'selected' : '' }}
                        >
                            3 - Cukup
                        </option>

                        <option
                            value="4"
                            {{ old('skor') == 4 ? 'selected' : '' }}
                        >
                            4 - Baik
                        </option>

                        <option
                            value="5"
                            {{ old('skor') == 5 ? 'selected' : '' }}
                        >
                            5 - Sangat Baik
                        </option>

                    </select>

                    <div class="skor-info">
                        Gunakan skala penilaian 1 sampai 5.
                    </div>

                    @error('skor')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- TANGGAL --}}
                <div class="form-group">

                    <label
                        for="tanggal_evaluasi"
                        class="form-label"
                    >
                        Tanggal Evaluasi
                    </label>

                    <input
                        type="date"
                        name="tanggal_evaluasi"
                        id="tanggal_evaluasi"
                        class="form-input"
                        value="{{ old('tanggal_evaluasi', date('Y-m-d')) }}"
                        required
                    >

                    @error('tanggal_evaluasi')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- KOMENTAR --}}
                <div class="form-group">

                    <label
                        for="komentar"
                        class="form-label"
                    >
                        Komentar / Catatan
                    </label>

                    <textarea
                        name="komentar"
                        id="komentar"
                        class="form-textarea"
                        placeholder="Masukkan komentar atau catatan evaluasi..."
                    >{{ old('komentar') }}</textarea>

                    @error('komentar')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="form-actions">

                    <a
                        href="{{ route('evaluasi.index') }}"
                        class="btn-kembali"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn-simpan"
                    >
                        Simpan Evaluasi
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>