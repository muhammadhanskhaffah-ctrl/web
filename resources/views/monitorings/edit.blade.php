<x-app-layout>

    <style>

        .edit-page {
            min-height: calc(100vh - 70px);
            background-color: #f3f4f6;
            padding: 40px 0 60px;
        }

        .edit-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .edit-header {
            margin-bottom: 30px;
        }

        .edit-title {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
        }

        .edit-subtitle {
            margin-top: 8px;
            color: #64748b;
            font-size: 15px;
        }

        .edit-card {
            background-color: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.08);
        }

        .edit-card-header {
            padding: 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .edit-card-title {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
        }

        .edit-card-description {
            margin-top: 8px;
            color: #64748b;
            font-size: 14px;
        }

        .edit-form {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 700;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 13px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            background-color: white;
            color: #0f172a;
            font-size: 15px;
            outline: none;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-textarea {
            min-height: 130px;
            resize: vertical;
        }

        .form-error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        .info-box {
            margin-bottom: 25px;
            padding: 16px;
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
            color: #1e40af;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding-top: 10px;
            border-top: 1px solid #e2e8f0;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            padding: 11px 18px;
            background-color: #f1f5f9;
            color: #334155;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-back:hover {
            background-color: #e2e8f0;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 20px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-save:hover {
            background-color: #1d4ed8;
        }

        @media (max-width: 700px) {

            .edit-container {
                padding: 0 15px;
            }

            .edit-form {
                padding: 18px;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn-back,
            .btn-save {
                width: 100%;
                justify-content: center;
            }

        }

    </style>


    <div class="edit-page">

        <div class="edit-container">


            {{-- HEADER --}}

            <div class="edit-header">

                <h1 class="edit-title">
                    Edit Monitoring Kinerja
                </h1>

                <p class="edit-subtitle">
                    Perbarui data pencapaian kinerja karyawan.
                </p>

            </div>


            {{-- CARD --}}

            <div class="edit-card">


                <div class="edit-card-header">

                    <h2 class="edit-card-title">
                        Form Edit Monitoring
                    </h2>

                    <p class="edit-card-description">
                        Ubah data monitoring sesuai hasil terbaru.
                    </p>

                </div>


                {{-- ERROR --}}

                @if($errors->any())

                    <div style="
                        margin: 20px 25px 0;
                        padding: 15px;
                        background-color: #fef2f2;
                        border: 1px solid #fecaca;
                        border-radius: 10px;
                        color: #991b1b;
                    ">

                        <strong>
                            Terdapat kesalahan:
                        </strong>

                        <ul style="
                            margin-top: 8px;
                            padding-left: 20px;
                        ">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- FORM --}}

                <form
                    action="{{ route('monitorings.update', $monitoring->id) }}"
                    method="POST"
                    class="edit-form"
                >

                    @csrf

                    @method('PUT')


                    {{-- INFO --}}

                    <div class="info-box">

                        Data monitoring yang sedang diedit:

                        <strong>
                            {{ $monitoring->karyawan->nama ?? '-' }}
                        </strong>

                    </div>


                    {{-- KARYAWAN --}}

                    <div class="form-group">

                        <label class="form-label">
                            Karyawan
                        </label>

                        <select
                            name="karyawan_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Karyawan --
                            </option>

                            @foreach($karyawans as $karyawan)

                                <option
                                    value="{{ $karyawan->id }}"
                                    {{ old(
                                        'karyawan_id',
                                        $monitoring->karyawan_id
                                    ) == $karyawan->id
                                        ? 'selected'
                                        : '' }}
                                >

                                    {{ $karyawan->nama }}

                                    @if($karyawan->nik)

                                        - NIK:
                                        {{ $karyawan->nik }}

                                    @endif

                                </option>

                            @endforeach

                        </select>


                        @error('karyawan_id')

                            <div class="form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- GOAL --}}

                    <div class="form-group">

                        <label class="form-label">
                            Goal / Target
                        </label>

                        <select
                            name="goal_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Goal --
                            </option>

                            @foreach($goals as $goal)

                                <option
                                    value="{{ $goal->id }}"
                                    {{ old(
                                        'goal_id',
                                        $monitoring->goal_id
                                    ) == $goal->id
                                        ? 'selected'
                                        : '' }}
                                >

                                    {{ $goal->nama_goal }}

                                    - Target:

                                    {{ number_format(
                                        (float) $goal->target,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                </option>

                            @endforeach

                        </select>


                        @error('goal_id')

                            <div class="form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- TARGET --}}

                    <div class="form-group">

                        <label class="form-label">
                            Target
                        </label>

                        <input
                            type="number"
                            name="target"
                            class="form-input"
                            step="0.01"
                            min="0"
                            value="{{ old(
                                'target',
                                $monitoring->target
                            ) }}"
                            placeholder="Contoh: 100"
                            required
                        >


                        @error('target')

                            <div class="form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- REALISASI --}}

                    <div class="form-group">

                        <label class="form-label">
                            Realisasi
                        </label>

                        <input
                            type="number"
                            name="realisasi"
                            class="form-input"
                            step="0.01"
                            min="0"
                            value="{{ old(
                                'realisasi',
                                $monitoring->realisasi
                            ) }}"
                            placeholder="Contoh: 85"
                            required
                        >


                        @error('realisasi')

                            <div class="form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- TANGGAL --}}

                    <div class="form-group">

                        <label class="form-label">
                            Tanggal Monitoring
                        </label>

                        <input
                            type="date"
                            name="tanggal_monitoring"
                            class="form-input"
                            value="{{ old(
                                'tanggal_monitoring',
                                \Carbon\Carbon::parse(
                                    $monitoring->tanggal_monitoring
                                )->format('Y-m-d')
                            ) }}"
                            required
                        >


                        @error('tanggal_monitoring')

                            <div class="form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- CATATAN --}}

                    <div class="form-group">

                        <label class="form-label">
                            Catatan Monitoring
                        </label>

                        <textarea
                            name="catatan"
                            class="form-textarea"
                            placeholder="Masukkan catatan monitoring..."
                        >{{ old(
                            'catatan',
                            $monitoring->catatan
                        ) }}</textarea>


                        @error('catatan')

                            <div class="form-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- BUTTON --}}

                    <div class="form-actions">

                        <a
                            href="{{ route(
                                'monitorings.index'
                            ) }}"
                            class="btn-back"
                        >
                            ← Kembali
                        </a>


                        <button
                            type="submit"
                            class="btn-save"
                        >
                            ✓ Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>