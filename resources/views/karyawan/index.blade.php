<x-app-layout>

    <style>
        * {
            box-sizing: border-box;
        }

        .karyawan-page {
            background: #f4f7fb;
            min-height: calc(100vh - 65px);
            padding: 32px 40px 45px;
        }

        /* =========================
           HEADER
        ========================== */

        .karyawan-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .karyawan-title {
            margin: 0;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 750;
            color: #0f2747;
            letter-spacing: -0.5px;
        }

        .karyawan-subtitle {
            margin: 8px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .btn-tambah-karyawan {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #0f3b66;
            color: #ffffff;
            padding: 12px 19px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 650;
            box-shadow: 0 5px 12px rgba(15, 59, 102, 0.20);
            transition: all .2s ease;
        }

        .btn-tambah-karyawan:hover {
            background: #092d4f;
            transform: translateY(-1px);
            box-shadow: 0 7px 16px rgba(15, 59, 102, 0.25);
        }

        .btn-tambah-icon {
            font-size: 19px;
            line-height: 1;
        }

        /* =========================
           STATISTIC CARDS
        ========================== */

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 26px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 20px;
            min-height: 116px;
            box-shadow: 0 5px 15px rgba(15, 23, 42, 0.045);
            transition: all .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 9px 22px rgba(15, 23, 42, 0.08);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            right: -35px;
            top: -38px;
            opacity: .7;
        }

        .stat-blue {
            border-top: 3px solid #0f3b66;
        }

        .stat-blue::after {
            background: #eff6ff;
        }

        .stat-green {
            border-top: 3px solid #0f3b66;
        }

        .stat-green::after {
            background: #eff6ff;
        }

        .stat-pink {
            border-top: 3px solid #0f3b66;
        }

        .stat-pink::after {
            background: #eff6ff;
        }

        .stat-orange {
            border-top: 3px solid #0f3b66;
        }

        .stat-orange::after {
            background: #eff6ff;
        }

        .stat-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            height: 100%;
        }

        .stat-label {
            color: #64748b;
            font-size: 13px;
            font-weight: 550;
            margin-bottom: 7px;
        }

        .stat-number {
            font-size: 30px;
            line-height: 1;
            font-weight: 750;
        }

        .number-blue {
            color: #0f3b66;
        }

        .number-green {
            color: #0f3b66;
        }

        .number-pink {
            color: #0f3b66;
        }

        .number-orange {
            color: #0f3b66;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-blue {
            background: #dbeafe;
            color: #0f3b66;
        }

        .icon-green {
            background: #dbeafe;
            color: #0f3b66;
        }

        .icon-pink {
            background: #dbeafe;
            color: #0f3b66;
        }

        .icon-orange {
            background: #dbeafe;
            color: #0f3b66;
        }

        /* =========================
           SUCCESS
        ========================== */

        .success-message {
            display: flex;
            align-items: center;
            gap: 11px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 13px 16px;
            border-radius: 11px;
            margin-bottom: 20px;
            font-size: 14px;
            box-shadow: 0 3px 8px rgba(22, 101, 52, 0.04);
        }

        .success-icon {
            width: 27px;
            height: 27px;
            border-radius: 50%;
            background: #dcfce7;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 750;
        }

        /* =========================
           TABLE CARD
        ========================== */

        .employee-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.055);
        }

        .employee-card-header {
            padding: 22px 24px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .employee-header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            flex-wrap: wrap;
        }

        .employee-card-title {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #0f2747;
        }

        .employee-card-description {
            margin: 7px 0 0;
            font-size: 13px;
            color: #64748b;
        }

        .employee-count {
            display: inline-flex;
            align-items: center;
            background: #eff6ff;
            color: #0f3b66;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* =========================
           SEARCH
        ========================== */

        .search-area {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 19px;
            flex-wrap: wrap;
        }

        .search-wrapper {
            position: relative;
            width: 380px;
            max-width: 100%;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            pointer-events: none;
            font-size: 16px;
        }

        .search-input {
            width: 100%;
            height: 45px;
            padding: 10px 15px 10px 40px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            font-size: 13px;
            color: #0f172a;
            background: #ffffff;
            transition: all .2s ease;
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .search-input:focus {
            border-color: #0f3b66;
            box-shadow: 0 0 0 3px rgba(15, 59, 102, .10);
        }

        .reset-button {
            height: 45px;
            padding: 0 16px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #475569;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 650;
            cursor: pointer;
            transition: all .2s ease;
        }

        .reset-button:hover {
            background: #f8fafc;
            border-color: #94a3b8;
        }

        .search-result-info {
            display: none;
            font-size: 13px;
            color: #64748b;
        }

        /* =========================
           TABLE
        ========================== */

        .table-wrapper {
            overflow-x: auto;
        }

        .employee-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1080px;
        }

        .employee-table thead tr {
            background: #f8fafc;
        }

        .employee-table th {
            padding: 14px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 750;
            color: #0f3b66;
            border-bottom: 1px solid #dbeafe;
            letter-spacing: .6px;
            white-space: nowrap;
        }

        .employee-table th:last-child {
            text-align: center;
        }

        .employee-table td {
            padding: 16px;
            border-bottom: 1px solid #eef2f7;
            font-size: 13px;
            vertical-align: middle;
        }

        .employee-row {
            transition: background .15s ease;
        }

        .employee-row:hover {
            background: #f8fbff;
        }

        .employee-row:last-child td {
            border-bottom: none;
        }

        .number-cell {
            color: #64748b;
            font-weight: 650;
            width: 55px;
        }

        .nik-cell {
            color: #475569;
            font-weight: 550;
            white-space: nowrap;
        }

        .name-cell {
            min-width: 210px;
        }

        .employee-name {
            color: #0f172a;
            font-size: 13px;
            font-weight: 750;
            line-height: 1.4;
        }

        .employee-role {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 11px;
        }

        .position-cell,
        .department-cell {
            color: #334155;
        }

        /* =========================
           GENDER BADGE
        ========================== */

        .gender-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 11px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .gender-male {
            background: #eff6ff;
            color: #0f3b66;
        }

        .gender-female {
            background: #fdf2f8;
            color: #be185d;
        }

        .gender-empty {
            background: #f8fafc;
            color: #64748b;
        }

        /* =========================
           ACTION BUTTONS
        ========================== */

        .action-cell {
            text-align: center;
            white-space: nowrap;
        }

        .action-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            min-width: 70px;
            padding: 8px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: all .2s ease;
        }

        .action-detail {
            background: #f8fafc;
            color: #334155;
            border: 1px solid #e2e8f0;
        }

        .action-detail:hover {
            background: #eff6ff;
            color: #0f3b66;
            border-color: #bfdbfe;
        }

        .action-edit {
            background: #fff7ed;
            color: #c2410c;
            border: 1px solid #fed7aa;
        }

        .action-edit:hover {
            background: #ffedd5;
            border-color: #fdba74;
        }

        .action-delete {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .action-delete:hover {
            background: #fee2e2;
            border-color: #fca5a5;
        }

        .delete-form {
            display: inline;
            margin: 0;
        }

        /* =========================
           EMPTY STATE
        ========================== */

        .empty-state {
            padding: 65px 20px;
            text-align: center;
            color: #64748b;
        }

        .empty-icon {
            width: 66px;
            height: 66px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 29px;
        }

        .empty-title {
            font-size: 16px;
            font-weight: 700;
            color: #334155;
        }

        .empty-description {
            margin-top: 6px;
            font-size: 13px;
            color: #64748b;
        }

        /* =========================
           NO SEARCH RESULT
        ========================== */

        .no-search-result {
            display: none;
        }

        .no-search-content {
            padding: 55px 20px;
            text-align: center;
        }

        .no-search-icon {
            font-size: 34px;
            margin-bottom: 10px;
        }

        .no-search-title {
            font-size: 15px;
            font-weight: 700;
            color: #334155;
        }

        .no-search-description {
            margin-top: 5px;
            font-size: 13px;
            color: #64748b;
        }

        /* =========================
           FOOTER
        ========================== */

        .employee-card-footer {
            padding: 14px 24px;
            border-top: 1px solid #e2e8f0;
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
        }

        .employee-card-footer strong {
            color: #334155;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 1100px) {
            .stat-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 700px) {
            .karyawan-page {
                padding: 24px 18px 35px;
            }

            .karyawan-title {
                font-size: 24px;
            }

            .stat-grid {
                grid-template-columns: 1fr;
            }

            .employee-card-header {
                padding: 18px;
            }

            .employee-card-footer {
                padding: 13px 18px;
            }

            .search-wrapper {
                width: 100%;
            }

            .reset-button {
                width: 100%;
            }

            .btn-tambah-karyawan {
                width: 100%;
                justify-content: center;
            }
        }
    </style>


    <div class="karyawan-page">

        {{-- =========================
             HEADER
        ========================== --}}

        <div class="karyawan-header">

            <div>
                <h1 class="karyawan-title">
                    Data Karyawan
                </h1>

                <p class="karyawan-subtitle">
                    Kelola data karyawan PT Petra Textima Mandiri.
                </p>
            </div>

            <a href="{{ route('karyawan.create') }}"
               class="btn-tambah-karyawan">

                <span class="btn-tambah-icon">+</span>

                Tambah Karyawan

            </a>

        </div>


        {{-- =========================
             DATA STATISTIK
        ========================== --}}

        @php

            $totalKaryawan = $karyawans->count();

            $jumlahLakiLaki = $karyawans->filter(function ($karyawan) {
                return strtoupper(trim($karyawan->jenis_kelamin ?? '')) === 'L';
            })->count();

            $jumlahPerempuan = $karyawans->filter(function ($karyawan) {
                return strtoupper(trim($karyawan->jenis_kelamin ?? '')) === 'P';
            })->count();

            $jumlahDepartemen = $karyawans
                ->filter(function ($karyawan) {
                    return !empty($karyawan->departemen);
                })
                ->groupBy(function ($karyawan) {
                    return strtolower(trim($karyawan->departemen));
                })
                ->count();

        @endphp


        <div class="stat-grid">

            {{-- TOTAL KARYAWAN --}}

            <div class="stat-card stat-blue">

                <div class="stat-content">

                    <div>
                        <div class="stat-label">
                            Total Karyawan
                        </div>

                        <div class="stat-number number-blue">
                            {{ $totalKaryawan }}
                        </div>
                    </div>

                    <div class="stat-icon icon-blue">

                        <svg width="27"
                             height="27"
                             viewBox="0 0 24 24"
                             fill="none">

                            <circle cx="9"
                                    cy="8"
                                    r="3"
                                    stroke="currentColor"
                                    stroke-width="1.8"/>

                            <circle cx="17"
                                    cy="9"
                                    r="2.5"
                                    stroke="currentColor"
                                    stroke-width="1.8"/>

                            <path d="M3.5 20C3.5 16.5 5.8 14.5 9 14.5C12.2 14.5 14.5 16.5 14.5 20"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                            <path d="M14.5 15.5C15.2 15.1 16 15 17 15C19.4 15 21 16.5 21 19"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                        </svg>

                    </div>

                </div>

            </div>


            {{-- LAKI-LAKI --}}

            <div class="stat-card stat-green">

                <div class="stat-content">

                    <div>
                        <div class="stat-label">
                            Laki-laki
                        </div>

                        <div class="stat-number number-green">
                            {{ $jumlahLakiLaki }}
                        </div>
                    </div>

                    <div class="stat-icon icon-green">

                        <svg width="28"
                             height="28"
                             viewBox="0 0 24 24"
                             fill="none">

                            <circle cx="12"
                                    cy="7"
                                    r="3.5"
                                    stroke="currentColor"
                                    stroke-width="1.8"/>

                            <path d="M5 21C5 16.8 7.8 14 12 14C16.2 14 19 16.8 19 21"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                        </svg>

                    </div>

                </div>

            </div>


            {{-- PEREMPUAN --}}

            <div class="stat-card stat-pink">

                <div class="stat-content">

                    <div>
                        <div class="stat-label">
                            Perempuan
                        </div>

                        <div class="stat-number number-pink">
                            {{ $jumlahPerempuan }}
                        </div>
                    </div>

                    <div class="stat-icon icon-pink">

                        <svg width="28"
                             height="28"
                             viewBox="0 0 24 24"
                             fill="none">

                            <circle cx="12"
                                    cy="7"
                                    r="3.5"
                                    stroke="currentColor"
                                    stroke-width="1.8"/>

                            <path d="M5 21C5 16.8 7.8 14 12 14C16.2 14 19 16.8 19 21"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                        </svg>

                    </div>

                </div>

            </div>


            {{-- DEPARTEMEN --}}

            <div class="stat-card stat-orange">

                <div class="stat-content">

                    <div>
                        <div class="stat-label">
                            Departemen
                        </div>

                        <div class="stat-number number-orange">
                            {{ $jumlahDepartemen }}
                        </div>
                    </div>

                    <div class="stat-icon icon-orange">

                        <svg width="28"
                             height="28"
                             viewBox="0 0 24 24"
                             fill="none">

                            <rect x="4"
                                  y="5"
                                  width="16"
                                  height="15"
                                  rx="2"
                                  stroke="currentColor"
                                  stroke-width="1.8"/>

                            <path d="M8 9H10"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                            <path d="M14 9H16"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                            <path d="M8 13H10"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                            <path d="M14 13H16"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                            <path d="M10 20V17H14V20"
                                  stroke="currentColor"
                                  stroke-width="1.8"
                                  stroke-linejoin="round"/>

                        </svg>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================
             PESAN SUKSES
        ========================== --}}

        @if(session('success'))

            <div class="success-message">

                <span class="success-icon">
                    ✓
                </span>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- =========================
             CARD DAFTAR KARYAWAN
        ========================== --}}

        <div class="employee-card">

            {{-- HEADER CARD --}}

            <div class="employee-card-header">

                <div class="employee-header-top">

                    <div>

                        <h2 class="employee-card-title">
                            Daftar Karyawan
                        </h2>

                        <p class="employee-card-description">
                            Data seluruh karyawan yang terdaftar dalam sistem.
                        </p>

                    </div>

                    <div class="employee-count">
                        {{ $totalKaryawan }} Karyawan
                    </div>

                </div>


                {{-- SEARCH --}}

                <div class="search-area">

                    <div class="search-wrapper">

                        <span class="search-icon">
                            🔍
                        </span>

                        <input
                            type="text"
                            id="searchKaryawan"
                            class="search-input"
                            placeholder="Cari nama, NIK, jabatan..."
                            autocomplete="off"
                        >

                    </div>


                    <button
                        type="button"
                        id="resetSearch"
                        class="reset-button"
                    >
                        Reset
                    </button>


                    <div
                        id="searchResultInfo"
                        class="search-result-info"
                    >
                    </div>

                </div>

            </div>


            {{-- =========================
                 TABEL
            ========================== --}}

            <div class="table-wrapper">

                <table class="employee-table">

                    <thead>

                        <tr>

                            <th style="width:55px;">
                                NO
                            </th>

                            <th>
                                NIK
                            </th>

                            <th>
                                NAMA
                            </th>

                            <th>
                                JABATAN
                            </th>

                            <th>
                                DEPARTEMEN
                            </th>

                            <th>
                                JENIS KELAMIN
                            </th>

                            <th>
                                AKSI
                            </th>

                        </tr>

                    </thead>


                    <tbody id="tabelKaryawan">

                        @forelse($karyawans as $key => $karyawan)

                            <tr class="karyawan-row employee-row">

                                {{-- NO --}}

                                <td class="number-cell">
                                    {{ $key + 1 }}
                                </td>


                                {{-- NIK --}}

                                <td class="nik-cell">
                                    {{ $karyawan->nik }}
                                </td>


                                {{-- NAMA --}}

                                <td class="name-cell">

                                    <div class="employee-name">
                                        {{ $karyawan->nama }}
                                    </div>

                                    <div class="employee-role">
                                        Karyawan
                                    </div>

                                </td>


                                {{-- JABATAN --}}

                                <td class="position-cell">
                                    {{ $karyawan->jabatan ?? '-' }}
                                </td>


                                {{-- DEPARTEMEN --}}

                                <td class="department-cell">
                                    {{ $karyawan->departemen ?? '-' }}
                                </td>


                                {{-- JENIS KELAMIN --}}

                                <td>

                                    @if(strtoupper(trim($karyawan->jenis_kelamin ?? '')) === 'L')

                                        <span class="gender-badge gender-male">
                                            Laki-laki
                                        </span>

                                    @elseif(strtoupper(trim($karyawan->jenis_kelamin ?? '')) === 'P')

                                        <span class="gender-badge gender-female">
                                            Perempuan
                                        </span>

                                    @else

                                        <span class="gender-badge gender-empty">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}

                                <td class="action-cell">

                                    <div class="action-wrapper">

                                        {{-- DETAIL --}}

                                        <a
                                            href="{{ route('karyawan.show', $karyawan->id) }}"
                                            class="action-button action-detail"
                                        >
                                            👁 Detail
                                        </a>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('karyawan.edit', $karyawan->id) }}"
                                            class="action-button action-edit"
                                        >
                                            ✏ Edit
                                        </a>


                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('karyawan.destroy', $karyawan->id) }}"
                                            method="POST"
                                            class="delete-form"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-button action-delete"
                                                onclick="return confirm('Apakah kamu yakin ingin menghapus data karyawan ini?')"
                                            >
                                                🗑 Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7">

                                    <div class="empty-state">

                                        <div class="empty-icon">
                                            👤
                                        </div>

                                        <div class="empty-title">
                                            Belum ada data karyawan
                                        </div>

                                        <div class="empty-description">
                                            Silakan tambahkan karyawan baru.
                                        </div>

                                    </div>

                                </td>

                            </tr>

                        @endforelse


                        {{-- HASIL PENCARIAN KOSONG --}}

                        @if($karyawans->count() > 0)

                            <tr
                                id="noSearchResult"
                                class="no-search-result"
                            >

                                <td colspan="7">

                                    <div class="no-search-content">

                                        <div class="no-search-icon">
                                            🔍
                                        </div>

                                        <div class="no-search-title">
                                            Karyawan tidak ditemukan
                                        </div>

                                        <div class="no-search-description">
                                            Coba gunakan nama, NIK, atau jabatan yang berbeda.
                                        </div>

                                    </div>

                                </td>

                            </tr>

                        @endif

                    </tbody>

                </table>

            </div>


            {{-- FOOTER --}}

            @if($karyawans->count() > 0)

                <div class="employee-card-footer">

                    Menampilkan

                    <strong id="jumlahDataTampil">
                        {{ $totalKaryawan }}
                    </strong>

                    dari

                    <strong>
                        {{ $totalKaryawan }}
                    </strong>

                    karyawan

                </div>

            @endif

        </div>

    </div>


    {{-- =========================
         JAVASCRIPT SEARCH
    ========================== --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const searchInput =
                document.getElementById('searchKaryawan');

            const resetButton =
                document.getElementById('resetSearch');

            const rows =
                document.querySelectorAll('.karyawan-row');

            const noSearchResult =
                document.getElementById('noSearchResult');

            const searchResultInfo =
                document.getElementById('searchResultInfo');

            const jumlahDataTampil =
                document.getElementById('jumlahDataTampil');


            if (!searchInput) {
                return;
            }


            function filterKaryawan() {

                const keyword =
                    searchInput.value.toLowerCase().trim();

                let jumlahTampil = 0;


                rows.forEach(function (row) {

                    const text =
                        row.innerText.toLowerCase();


                    if (text.includes(keyword)) {

                        row.style.display = '';

                        jumlahTampil++;

                    } else {

                        row.style.display = 'none';

                    }

                });


                if (noSearchResult) {

                    if (
                        jumlahTampil === 0 &&
                        keyword !== ''
                    ) {

                        noSearchResult.style.display = 'table-row';

                    } else {

                        noSearchResult.style.display = 'none';

                    }

                }


                if (jumlahDataTampil) {

                    jumlahDataTampil.textContent =
                        jumlahTampil;

                }


                if (searchResultInfo) {

                    if (keyword !== '') {

                        searchResultInfo.style.display =
                            'block';

                        searchResultInfo.textContent =
                            jumlahTampil +
                            ' hasil ditemukan';

                    } else {

                        searchResultInfo.style.display =
                            'none';

                    }

                }

            }


            searchInput.addEventListener(
                'input',
                filterKaryawan
            );


            resetButton.addEventListener(
                'click',
                function () {

                    searchInput.value = '';

                    filterKaryawan();

                    searchInput.focus();

                }
            );

        });

    </script>

</x-app-layout>