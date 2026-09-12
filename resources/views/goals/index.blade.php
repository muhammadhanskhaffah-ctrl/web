<x-app-layout>

    <style>

        * {
            box-sizing: border-box;
        }

        /* ==============================
           CONTAINER
        ============================== */

        .goals-container {
            padding: 38px 40px;
            background: #f5f7fb;
            min-height: calc(100vh - 65px);
        }


        /* ==============================
           HEADER
        ============================== */

        .goals-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 28px;
            gap: 20px;
        }


        .goals-title {
            margin: 0;
            font-size: 30px;
            font-weight: 750;
            color: #0f172a;
            letter-spacing: -0.6px;
        }


        .goals-subtitle {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 14px;
        }


        /* ==============================
           BUTTON TAMBAH
        ============================== */

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            background: #2563eb;
            color: #ffffff;

            padding: 12px 20px;

            border-radius: 9px;

            text-decoration: none;

            font-size: 14px;
            font-weight: 650;

            border: none;
            cursor: pointer;

            box-shadow: 0 5px 12px rgba(37, 99, 235, 0.18);

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }


        .btn-tambah:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 7px 16px rgba(37, 99, 235, 0.23);
        }


        /* ==============================
           STATISTICS
        ============================== */

        .goals-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }


        .goal-stat-card {
            position: relative;
            overflow: hidden;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 14px;

            min-height: 112px;

            padding: 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-shadow: 0 5px 16px rgba(15, 23, 42, 0.045);
        }


        .goal-stat-card::after {
            content: "";
            position: absolute;

            width: 85px;
            height: 85px;

            right: -28px;
            top: -28px;

            border-radius: 50%;

            opacity: 0.65;
        }


        /* ==============================
           SEMUA STATISTIK MENGGUNAKAN
           WARNA BIRU / NAVY PT
        ============================== */

        .goal-stat-blue {
            border-top: 3px solid #0f3b66;
        }

        .goal-stat-blue::after {
            background: #dbeafe;
        }


        .goal-stat-purple {
            border-top: 3px solid #0f3b66;
        }

        .goal-stat-purple::after {
            background: #dbeafe;
        }


        .goal-stat-orange {
            border-top: 3px solid #0f3b66;
        }

        .goal-stat-orange::after {
            background: #dbeafe;
        }


        .goal-stat-green {
            border-top: 3px solid #0f3b66;
        }

        .goal-stat-green::after {
            background: #dbeafe;
        }


        .goal-stat-content {
            position: relative;
            z-index: 2;
        }


        .goal-stat-label {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 5px;
        }


        .goal-stat-number {
            font-size: 28px;
            line-height: 1;
            font-weight: 750;
        }


        /* ==============================
           SEMUA ANGKA STATISTIK BIRU
        ============================== */

        .stat-blue {
            color: #0f3b66;
        }


        .stat-purple {
            color: #0f3b66;
        }


        .stat-orange {
            color: #0f3b66;
        }


        .stat-green {
            color: #0f3b66;
        }


        .goal-stat-icon {
            position: relative;
            z-index: 2;

            width: 48px;
            height: 48px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
        }


        .goal-stat-icon svg {
            width: 25px;
            height: 25px;
        }


        /* ==============================
           SEMUA ICON STATISTIK BIRU
        ============================== */

        .icon-blue {
            background: #dbeafe;
            color: #0f3b66;
        }


        .icon-purple {
            background: #dbeafe;
            color: #0f3b66;
        }


        .icon-orange {
            background: #dbeafe;
            color: #0f3b66;
        }


        .icon-green {
            background: #dbeafe;
            color: #0f3b66;
        }


        /* ==============================
           PESAN
        ============================== */

        .success-message {
            background: #dcfce7;
            color: #166534;

            padding: 12px 16px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 14px;

            border: 1px solid #bbf7d0;
        }


        .error-message {
            background: #fee2e2;
            color: #991b1b;

            padding: 12px 16px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 14px;

            border: 1px solid #fecaca;
        }


        /* ==============================
           TABLE CARD
        ============================== */

        .table-card {
            background: #ffffff;

            border-radius: 14px;

            overflow: hidden;

            border: 1px solid #e2e8f0;

            box-shadow:
                0 5px 18px rgba(15, 23, 42, 0.05);
        }


        .table-header {
            padding: 23px 24px 20px;

            border-bottom: 1px solid #e2e8f0;

            background: #ffffff;
        }


        .table-header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }


        .table-title {
            margin: 0;

            font-size: 20px;

            font-weight: 700;

            color: #0f172a;
        }


        .table-description {
            margin: 6px 0 0;

            color: #64748b;

            font-size: 14px;
        }


        .total-badge {
            display: inline-flex;
            align-items: center;

            padding: 8px 14px;

            background: #eff6ff;

            color: #2563eb;

            border-radius: 999px;

            font-size: 12px;

            font-weight: 650;

            white-space: nowrap;
        }


        /* ==============================
           TABLE WRAPPER
        ============================== */

        .table-wrapper {
            overflow-x: auto;
        }


        /* ==============================
           TABLE
        ============================== */

        .goals-table {
            width: 100%;

            border-collapse: collapse;

            min-width: 1150px;
        }


        .goals-table th {
            background: #f8fafc;

            color: #1e40af;

            font-size: 12px;

            font-weight: 700;

            text-align: left;

            padding: 14px 17px;

            border-bottom: 1px solid #dbe4ef;

            white-space: nowrap;

            letter-spacing: 0.25px;
        }


        .goals-table td {
            padding: 15px 17px;

            border-bottom: 1px solid #e8edf3;

            color: #334155;

            font-size: 14px;

            vertical-align: middle;
        }


        .goals-table tr:last-child td {
            border-bottom: none;
        }


        .goals-table tbody tr {
            transition: background 0.15s ease;
        }


        .goals-table tbody tr:hover td {
            background: #f8fbff;
        }


        /* ==============================
           NOMOR
        ============================== */

        .nomor {
            color: #64748b;
            font-weight: 600;
        }


        /* ==============================
           KARYAWAN / GOAL
        ============================== */

        .nama-karyawan {
            display: block;

            font-weight: 650;

            color: #0f172a;

            line-height: 1.4;
        }


        .sub-text {
            display: block;

            margin-top: 4px;

            color: #64748b;

            font-size: 12px;

            line-height: 1.5;

            max-width: 300px;
        }


        /* ==============================
           BADGE TIPE
        ============================== */

        .badge {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 5px 11px;

            border-radius: 999px;

            font-size: 12px;

            font-weight: 650;

            white-space: nowrap;
        }


        .badge-individu {
            background: #dbeafe;
            color: #1d4ed8;
        }


        .badge-tim {
            background: #ede9fe;
            color: #6d28d9;
        }


        .badge-perusahaan {
            background: #dcfce7;
            color: #15803d;
        }


        /* ==============================
           STATUS
        ============================== */

        .status-badge {
            display: inline-flex;

            align-items: center;
            gap: 6px;

            padding: 5px 11px;

            border-radius: 999px;

            font-size: 12px;

            font-weight: 650;

            white-space: nowrap;
        }


        .status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: currentColor;
        }


        .status-aktif {
            background: #dcfce7;
            color: #15803d;
        }


        .status-selesai {
            background: #dbeafe;
            color: #1d4ed8;
        }


        .status-nonaktif {
            background: #f1f5f9;
            color: #64748b;
        }


        .status-default {
            background: #f1f5f9;
            color: #475569;
        }


        /* ==============================
           AKSI
        ============================== */

        .aksi {
            display: flex;

            gap: 6px;

            align-items: center;

            white-space: nowrap;
        }


        .btn-detail,
        .btn-edit,
        .btn-hapus {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 7px 10px;

            border-radius: 7px;

            font-size: 12px;

            font-weight: 650;

            text-decoration: none;

            transition:
                background 0.2s ease,
                transform 0.15s ease;
        }


        .btn-detail:hover,
        .btn-edit:hover,
        .btn-hapus:hover {
            transform: translateY(-1px);
        }


        .btn-detail {
            background: #f1f5f9;

            color: #334155;

            border: 1px solid #e2e8f0;
        }


        .btn-detail:hover {
            background: #e2e8f0;
        }


        .btn-edit {
            background: #fff7ed;

            color: #c2410c;

            border: 1px solid #fed7aa;
        }


        .btn-edit:hover {
            background: #ffedd5;
        }


        .btn-hapus {
            background: #fef2f2;

            color: #dc2626;

            border: 1px solid #fecaca;

            cursor: pointer;
        }


        .btn-hapus:hover {
            background: #fee2e2;
        }


        /* ==============================
           EMPTY DATA
        ============================== */

        .empty-data {
            text-align: center;

            padding: 65px 20px !important;

            color: #64748b;

            font-size: 14px;
        }


        .empty-icon {
            width: 58px;
            height: 58px;

            margin: 0 auto 13px;

            border-radius: 14px;

            background: #eff6ff;

            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 27px;
        }


        .empty-title {
            color: #334155;

            font-size: 15px;

            font-weight: 650;

            margin-bottom: 4px;
        }


        .empty-description {
            color: #94a3b8;

            font-size: 13px;
        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 1100px) {

            .goals-stats {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 768px) {

            .goals-container {
                padding: 22px 18px;
            }


            .goals-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }


            .goals-title {
                font-size: 25px;
            }


            .btn-tambah {
                width: 100%;
            }


            .goals-stats {
                grid-template-columns: 1fr;
            }


            .table-header {
                padding: 20px;
            }


            .table-header-top {
                flex-direction: column;
            }


            .total-badge {
                align-self: flex-start;
            }

        }

    </style>


    <div class="goals-container">


        {{-- ==========================================
             HITUNG STATISTIK
        =========================================== --}}

        @php

            $totalGoals = $goals->count();

            $totalIndividu = $goals->where('tipe', 'Individu')->count();

            $totalTim = $goals->where('tipe', 'Tim')->count();

            $totalPerusahaan = $goals->where('tipe', 'Perusahaan')->count();

        @endphp


        {{-- ==========================================
             HEADER
        =========================================== --}}

        <div class="goals-header">

            <div>

                <h1 class="goals-title">
                    Data Goals
                </h1>

                <p class="goals-subtitle">
                    Kelola target dan tujuan kinerja karyawan PT Petra Textima Mandiri.
                </p>

            </div>


            <a
                href="{{ route('goals.create') }}"
                class="btn-tambah"
            >
                <span>＋</span>
                Tambah Goals
            </a>

        </div>


        {{-- ==========================================
             PESAN SUKSES
        =========================================== --}}

        @if (session('success'))

            <div class="success-message">
                {{ session('success') }}
            </div>

        @endif


        {{-- ==========================================
             PESAN ERROR
        =========================================== --}}

        @if (session('error'))

            <div class="error-message">
                {{ session('error') }}
            </div>

        @endif


        {{-- ==========================================
             STATISTIK GOALS
        =========================================== --}}

        <div class="goals-stats">


            {{-- TOTAL GOALS --}}

            <div class="goal-stat-card goal-stat-blue">

                <div class="goal-stat-content">

                    <div class="goal-stat-label">
                        Total Goals
                    </div>

                    <div class="goal-stat-number stat-blue">
                        {{ $totalGoals }}
                    </div>

                </div>

                <div class="goal-stat-icon icon-blue">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <circle cx="12" cy="12" r="9"></circle>
                        <circle cx="12" cy="12" r="5"></circle>
                        <circle cx="12" cy="12" r="1"></circle>
                    </svg>

                </div>

            </div>


            {{-- INDIVIDU --}}

            <div class="goal-stat-card goal-stat-purple">

                <div class="goal-stat-content">

                    <div class="goal-stat-label">
                        Goals Individu
                    </div>

                    <div class="goal-stat-number stat-purple">
                        {{ $totalIndividu }}
                    </div>

                </div>

                <div class="goal-stat-icon icon-purple">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <circle cx="12" cy="8" r="3"></circle>
                        <path d="M6 20c0-3.3 2.7-6 6-6s6 2.7 6 6"></path>
                    </svg>

                </div>

            </div>


            {{-- TIM --}}

            <div class="goal-stat-card goal-stat-orange">

                <div class="goal-stat-content">

                    <div class="goal-stat-label">
                        Goals Tim
                    </div>

                    <div class="goal-stat-number stat-orange">
                        {{ $totalTim }}
                    </div>

                </div>

                <div class="goal-stat-icon icon-orange">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <circle cx="9" cy="8" r="3"></circle>
                        <circle cx="17" cy="9" r="2.5"></circle>
                        <path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"></path>
                        <path d="M15 15c2.8 0 5 2.2 5 5"></path>
                    </svg>

                </div>

            </div>


            {{-- PERUSAHAAN --}}

            <div class="goal-stat-card goal-stat-green">

                <div class="goal-stat-content">

                    <div class="goal-stat-label">
                        Goals Perusahaan
                    </div>

                    <div class="goal-stat-number stat-green">
                        {{ $totalPerusahaan }}
                    </div>

                </div>

                <div class="goal-stat-icon icon-green">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <rect x="4" y="3" width="16" height="18" rx="1"></rect>
                        <path d="M8 7h2"></path>
                        <path d="M14 7h2"></path>
                        <path d="M8 11h2"></path>
                        <path d="M14 11h2"></path>
                        <path d="M8 15h2"></path>
                        <path d="M14 15h2"></path>
                        <path d="M10 21v-3h4v3"></path>
                    </svg>

                </div>

            </div>

        </div>


        {{-- ==========================================
             TABLE CARD
        =========================================== --}}

        <div class="table-card">


            {{-- HEADER TABLE --}}

            <div class="table-header">

                <div class="table-header-top">

                    <div>

                        <h2 class="table-title">
                            Daftar Goals
                        </h2>

                        <p class="table-description">
                            Data seluruh target kinerja yang terdaftar dalam sistem.
                        </p>

                    </div>


                    <div class="total-badge">

                        {{ $totalGoals }} Goals

                    </div>

                </div>

            </div>


            {{-- ==========================================
                 TABLE
            =========================================== --}}

            <div class="table-wrapper">

                <table class="goals-table">


                    <thead>

                        <tr>

                            <th width="55">
                                NO
                            </th>

                            <th>
                                KARYAWAN
                            </th>

                            <th>
                                GOALS
                            </th>

                            <th>
                                TIPE
                            </th>

                            <th>
                                TARGET
                            </th>

                            <th>
                                PERIODE
                            </th>

                            <th>
                                STATUS
                            </th>

                            <th>
                                AKSI
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse ($goals as $goal)


                            <tr>


                                {{-- NO --}}

                                <td>

                                    <span class="nomor">
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                {{-- ==========================================
                                     KARYAWAN
                                =========================================== --}}

                                <td>

                                    @if ($goal->karyawan)

                                        <span class="nama-karyawan">
                                            {{ $goal->karyawan->nama }}
                                        </span>


                                        @if ($goal->karyawan->nik)

                                            <span class="sub-text">
                                                NIK: {{ $goal->karyawan->nik }}
                                            </span>

                                        @endif

                                    @else

                                        <span class="nama-karyawan">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- ==========================================
                                     GOALS
                                =========================================== --}}

                                <td>

                                    <span class="nama-karyawan">

                                        {{ $goal->nama_goal ?? $goal->goal ?? '-' }}

                                    </span>


                                    @if (!empty($goal->deskripsi))

                                        <span class="sub-text">

                                            {{ $goal->deskripsi }}

                                        </span>

                                    @endif

                                </td>


                                {{-- ==========================================
                                     TIPE
                                =========================================== --}}

                                <td>

                                    @if (($goal->tipe ?? '') === 'Perusahaan')

                                        <span class="badge badge-perusahaan">
                                            Perusahaan
                                        </span>


                                    @elseif (($goal->tipe ?? '') === 'Tim')

                                        <span class="badge badge-tim">
                                            Tim
                                        </span>


                                    @elseif (($goal->tipe ?? '') === 'Individu')

                                        <span class="badge badge-individu">
                                            Individu
                                        </span>


                                    @else

                                        <span class="badge badge-individu">
                                            {{ $goal->tipe ?? '-' }}
                                        </span>

                                    @endif

                                </td>


                                {{-- ==========================================
                                     TARGET
                                =========================================== --}}

                                <td>

                                    @if (is_numeric($goal->target ?? null))

                                        {{ number_format((float) $goal->target, 2, ',', '.') }}

                                    @else

                                        {{ $goal->target ?? '-' }}

                                    @endif

                                </td>


                                {{-- ==========================================
                                     PERIODE
                                =========================================== --}}

                                <td>

                                    @if (
                                        !empty($goal->tanggal_mulai) &&
                                        !empty($goal->tanggal_selesai)
                                    )

                                        {{ \Carbon\Carbon::parse($goal->tanggal_mulai)->format('d/m/Y') }}

                                        -

                                        {{ \Carbon\Carbon::parse($goal->tanggal_selesai)->format('d/m/Y') }}


                                    @elseif (!empty($goal->tanggal))

                                        {{ \Carbon\Carbon::parse($goal->tanggal)->format('d/m/Y') }}


                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- ==========================================
                                     STATUS
                                =========================================== --}}

                                <td>

                                    @if (($goal->status ?? '') === 'Aktif')

                                        <span class="status-badge status-aktif">

                                            <span class="status-dot"></span>

                                            Aktif

                                        </span>


                                    @elseif (($goal->status ?? '') === 'Selesai')

                                        <span class="status-badge status-selesai">

                                            <span class="status-dot"></span>

                                            Selesai

                                        </span>


                                    @elseif (($goal->status ?? '') === 'Nonaktif')

                                        <span class="status-badge status-nonaktif">

                                            <span class="status-dot"></span>

                                            Nonaktif

                                        </span>


                                    @else

                                        <span class="status-badge status-default">

                                            <span class="status-dot"></span>

                                            {{ $goal->status ?? '-' }}

                                        </span>

                                    @endif

                                </td>


                                {{-- ==========================================
                                     AKSI
                                =========================================== --}}

                                <td>

                                    <div class="aksi">


                                        {{-- DETAIL --}}

                                        <a
                                            href="{{ route('goals.show', $goal->id) }}"
                                            class="btn-detail"
                                        >
                                            👁 Detail
                                        </a>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('goals.edit', $goal->id) }}"
                                            class="btn-edit"
                                        >
                                            ✏ Edit
                                        </a>


                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('goals.destroy', $goal->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus goals ini?')"
                                            style="display: inline;"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="btn-hapus"
                                            >
                                                🗑 Hapus
                                            </button>

                                        </form>


                                    </div>

                                </td>


                            </tr>


                        @empty


                            {{-- ==========================================
                                 DATA KOSONG
                            =========================================== --}}

                            <tr>

                                <td
                                    colspan="8"
                                    class="empty-data"
                                >

                                    <div class="empty-icon">

                                        <svg
                                            width="27"
                                            height="27"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <circle cx="12" cy="12" r="1"></circle>
                                        </svg>

                                    </div>

                                    <div class="empty-title">
                                        Belum ada data Goals
                                    </div>

                                    <div class="empty-description">
                                        Silakan tambahkan goals untuk mulai mengelola target kinerja.
                                    </div>

                                </td>

                            </tr>


                        @endforelse


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>