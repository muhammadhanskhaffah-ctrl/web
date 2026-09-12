<x-app-layout>

    <style>
        * {
            box-sizing: border-box;
        }

        .monitoring-page {
            min-height: calc(100vh - 70px);
            padding: 38px 0 60px;
            background: #f5f7fb;
        }

        .monitoring-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ==============================
           HEADER
        ============================== */

        .monitoring-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 30px;
        }

        .monitoring-title {
            margin: 0;
            color: #0f172a;
            font-size: 30px;
            font-weight: 750;
            letter-spacing: -0.5px;
        }

        .monitoring-subtitle {
            margin: 8px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 185px;
            padding: 13px 20px;
            background: #0f3b66;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 5px 12px rgba(15, 59, 102, 0.20);
            transition: 0.2s ease;
        }

        .btn-add:hover {
            background: #092d4f;
            transform: translateY(-1px);
            box-shadow: 0 7px 16px rgba(15, 59, 102, 0.25);
        }

        .btn-add-icon {
            font-size: 18px;
            line-height: 1;
        }


        /* ==============================
           ALERT
        ============================== */

        .alert-success {
            margin-bottom: 22px;
            padding: 13px 17px;
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
        }


        /* ==============================
           STATISTICS
        ============================== */

        .monitoring-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            min-height: 122px;
            padding: 22px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 75px;
            height: 75px;
            right: -25px;
            top: -25px;
            border-radius: 50%;
            opacity: 0.55;
        }

        .stat-blue {
            border-top: 3px solid #0f3b66;
        }

        .stat-blue::after {
            background: #dbeafe;
        }

        .stat-green {
            border-top: 3px solid #0f3b66;
        }

        .stat-green::after {
            background: #dbeafe;
        }

        .stat-orange {
            border-top: 3px solid #0f3b66;
        }

        .stat-orange::after {
            background: #dbeafe;
        }

        .stat-red {
            border-top: 3px solid #0f3b66;
        }

        .stat-red::after {
            background: #dbeafe;
        }

        .stat-content {
            position: relative;
            z-index: 2;
        }

        .stat-label {
            margin-bottom: 8px;
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
        }

        .stat-number {
            color: #0f3b66;
            font-size: 29px;
            font-weight: 750;
            line-height: 1;
        }

        .stat-blue .stat-number {
            color: #0f3b66;
        }

        .stat-green .stat-number {
            color: #0f3b66;
        }

        .stat-orange .stat-number {
            color: #0f3b66;
        }

        .stat-red .stat-number {
            color: #0f3b66;
        }

        .stat-icon {
            position: absolute;
            z-index: 2;
            right: 18px;
            bottom: 18px;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            font-size: 20px;
        }

        .stat-blue .stat-icon {
            background: #dbeafe;
            color: #0f3b66;
        }

        .stat-green .stat-icon {
            background: #dbeafe;
            color: #0f3b66;
        }

        .stat-orange .stat-icon {
            background: #dbeafe;
            color: #0f3b66;
        }

        .stat-red .stat-icon {
            background: #dbeafe;
            color: #0f3b66;
        }


        /* ==============================
           MAIN CARD
        ============================== */

        .monitoring-card {
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.06);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-title {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
            font-weight: 700;
        }

        .card-description {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .total-badge {
            padding: 8px 13px;
            background: #eff6ff;
            color: #0f3b66;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }


        /* ==============================
           SEARCH
        ============================== */

        .search-section {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 24px;
            border-bottom: 1px solid #e2e8f0;
            background: #ffffff;
        }

        .search-box {
            position: relative;
            width: 360px;
        }

        .search-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            height: 43px;
            padding: 0 15px 0 40px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            outline: none;
            color: #0f172a;
            font-size: 13px;
        }

        .search-input:focus {
            border-color: #0f3b66;
            box-shadow: 0 0 0 3px rgba(15, 59, 102, 0.10);
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .btn-reset {
            height: 43px;
            padding: 0 16px;
            background: #ffffff;
            color: #334155;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-reset:hover {
            background: #f8fafc;
        }


        /* ==============================
           TABLE
        ============================== */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .monitoring-table {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
        }

        .monitoring-table th {
            padding: 15px 14px;
            background: #f8fafc;
            color: #0f3b66;
            font-size: 11px;
            font-weight: 750;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .monitoring-table td {
            padding: 17px 14px;
            color: #334155;
            font-size: 13px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
        }

        .monitoring-table tbody tr {
            transition: background 0.15s ease;
        }

        .monitoring-table tbody tr:hover {
            background: #f8fbff;
        }

        .monitoring-table tbody tr:last-child td {
            border-bottom: none;
        }

        .number-no {
            color: #64748b;
            font-weight: 600;
        }

        .employee-name {
            color: #0f172a;
            font-weight: 700;
            white-space: nowrap;
        }

        .employee-nik {
            margin-top: 5px;
            color: #94a3b8;
            font-size: 11px;
        }

        .goal-name {
            color: #0f172a;
            font-weight: 650;
        }

        .goal-type {
            margin-top: 5px;
            color: #94a3b8;
            font-size: 11px;
        }

        .number-value {
            color: #0f172a;
            font-weight: 650;
        }

        .date-value {
            color: #64748b;
            white-space: nowrap;
        }


        /* ==============================
           BADGE
        ============================== */

        .badge-success,
        .badge-warning,
        .badge-danger {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            min-width: 82px;
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 750;
        }

        .badge-success {
            background: #dbeafe;
            color: #0f3b66;
        }

        .badge-warning {
            background: #dbeafe;
            color: #0f3b66;
        }

        .badge-danger {
            background: #dbeafe;
            color: #0f3b66;
        }

        .badge-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: currentColor;
        }


        /* ==============================
           ACTION
        ============================== */

        .action-wrapper {
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .btn-detail,
        .btn-edit,
        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            min-width: 62px;
            padding: 8px 10px;
            border-radius: 8px;
            border: 1px solid transparent;
            text-decoration: none;
            font-size: 11px;
            font-weight: 650;
            cursor: pointer;
            transition: 0.15s ease;
        }

        .btn-detail {
            background: #f1f5f9;
            color: #334155;
            border-color: #e2e8f0;
        }

        .btn-detail:hover {
            background: #e2e8f0;
        }

        .btn-edit {
            background: #eff6ff;
            color: #0f3b66;
            border-color: #dbeafe;
        }

        .btn-edit:hover {
            background: #dbeafe;
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
            border-color: #fee2e2;
        }

        .btn-delete:hover {
            background: #fee2e2;
        }


        /* ==============================
           EMPTY STATE
        ============================== */

        .empty-state {
            text-align: center;
            padding: 75px 20px;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            background: #eff6ff;
            border-radius: 18px;
            font-size: 28px;
        }

        .empty-title {
            margin: 0;
            color: #334155;
            font-size: 17px;
            font-weight: 700;
        }

        .empty-description {
            margin: 8px 0 0;
            color: #94a3b8;
            font-size: 13px;
        }

        .empty-button {
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
            padding: 11px 18px;
            background: #0f3b66;
            color: #ffffff;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .empty-button:hover {
            background: #092d4f;
        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 1000px) {

            .monitoring-stats {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 768px) {

            .monitoring-page {
                padding-top: 25px;
            }

            .monitoring-container {
                padding: 0 15px;
            }

            .monitoring-header {
                flex-direction: column;
                align-items: stretch;
            }

            .monitoring-title {
                font-size: 25px;
            }

            .btn-add {
                width: 100%;
            }

            .monitoring-stats {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

            .stat-card {
                padding: 18px;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-section {
                align-items: stretch;
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .btn-reset {
                width: 100%;
            }

        }

        @media (max-width: 480px) {

            .monitoring-stats {
                grid-template-columns: 1fr;
            }

        }
    </style>


    <div class="monitoring-page">

        <div class="monitoring-container">


            {{-- ==============================
                 HEADER
            ============================== --}}

            <div class="monitoring-header">

                <div>

                    <h1 class="monitoring-title">
                        Monitoring Kinerja
                    </h1>

                    <p class="monitoring-subtitle">
                        Pantau pencapaian kinerja karyawan terhadap target yang telah ditetapkan.
                    </p>

                </div>

                {{-- SUPERVISOR DAN ADMIN BOLEH TAMBAH --}}
                <a
                    href="{{ route('monitorings.create') }}"
                    class="btn-add"
                >
                    <span class="btn-add-icon">+</span>
                    Tambah Monitoring
                </a>

            </div>


            {{-- ==============================
                 PESAN SUKSES
            ============================== --}}

            @if(session('success'))

                <div class="alert-success">
                    ✓ {{ session('success') }}
                </div>

            @endif


            {{-- ==============================
                 HITUNG STATISTIK
            ============================== --}}

            @php

                $totalMonitoring = $monitorings->count();

                $pencapaianBaik = $monitorings
                    ->filter(function ($monitoring) {
                        return (float) $monitoring->persentase >= 80;
                    })
                    ->count();

                $pencapaianSedang = $monitorings
                    ->filter(function ($monitoring) {
                        return (float) $monitoring->persentase >= 50
                            && (float) $monitoring->persentase < 80;
                    })
                    ->count();

                $pencapaianRendah = $monitorings
                    ->filter(function ($monitoring) {
                        return (float) $monitoring->persentase < 50;
                    })
                    ->count();

            @endphp


            {{-- ==============================
                 STATISTIK
            ============================== --}}

            <div class="monitoring-stats">

                {{-- TOTAL --}}
                <div class="stat-card stat-blue">

                    <div class="stat-content">

                        <div class="stat-label">
                            Total Monitoring
                        </div>

                        <div class="stat-number">
                            {{ $totalMonitoring }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        📋
                    </div>

                </div>


                {{-- BAIK --}}
                <div class="stat-card stat-green">

                    <div class="stat-content">

                        <div class="stat-label">
                            Pencapaian Baik
                        </div>

                        <div class="stat-number">
                            {{ $pencapaianBaik }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        ✓
                    </div>

                </div>


                {{-- SEDANG --}}
                <div class="stat-card stat-orange">

                    <div class="stat-content">

                        <div class="stat-label">
                            Pencapaian Sedang
                        </div>

                        <div class="stat-number">
                            {{ $pencapaianSedang }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        !
                    </div>

                </div>


                {{-- RENDAH --}}
                <div class="stat-card stat-red">

                    <div class="stat-content">

                        <div class="stat-label">
                            Pencapaian Rendah
                        </div>

                        <div class="stat-number">
                            {{ $pencapaianRendah }}
                        </div>

                    </div>

                    <div class="stat-icon">
                        !
                    </div>

                </div>

            </div>


            {{-- ==============================
                 CARD DATA
            ============================== --}}

            <div class="monitoring-card">


                {{-- CARD HEADER --}}
                <div class="card-header">

                    <div>

                        <h2 class="card-title">
                            Daftar Monitoring
                        </h2>

                        <p class="card-description">
                            Data pencapaian kinerja karyawan.
                        </p>

                    </div>

                    <div class="total-badge">
                        {{ $totalMonitoring }} Monitoring
                    </div>

                </div>


                {{-- ==============================
                     SEARCH
                ============================== --}}

                <div class="search-section">

                    <div class="search-box">

                        <span class="search-icon">
                            🔍
                        </span>

                        <input
                            type="text"
                            id="monitoringSearch"
                            class="search-input"
                            placeholder="Cari karyawan, NIK, atau goals..."
                            autocomplete="off"
                        >

                    </div>

                    <button
                        type="button"
                        class="btn-reset"
                        onclick="resetMonitoringSearch()"
                    >
                        Reset
                    </button>

                </div>


                {{-- ==============================
                     JIKA ADA DATA
                ============================== --}}

                @if($monitorings->count() > 0)

                    <div class="table-wrapper">

                        <table class="monitoring-table">

                            <thead>

                                <tr>

                                    <th>No</th>

                                    <th>Karyawan</th>

                                    <th>Goals</th>

                                    <th>Target</th>

                                    <th>Realisasi</th>

                                    <th>Pencapaian</th>

                                    <th>Tanggal</th>

                                    <th>Aksi</th>

                                </tr>

                            </thead>


                            <tbody id="monitoringTableBody">

                                @foreach($monitorings as $monitoring)

                                    @php

                                        $persentase = (float) $monitoring->persentase;

                                        if ($persentase >= 80) {
                                            $badgeClass = 'badge-success';
                                        } elseif ($persentase >= 50) {
                                            $badgeClass = 'badge-warning';
                                        } else {
                                            $badgeClass = 'badge-danger';
                                        }

                                    @endphp


                                    <tr class="monitoring-row">


                                        {{-- NO --}}
                                        <td>

                                            <span class="number-no">
                                                {{ $loop->iteration }}
                                            </span>

                                        </td>


                                        {{-- KARYAWAN --}}
                                        <td>

                                            <div class="employee-name">
                                                {{ $monitoring->karyawan->nama ?? '-' }}
                                            </div>

                                            @if(isset($monitoring->karyawan->nik))

                                                <div class="employee-nik">
                                                    NIK: {{ $monitoring->karyawan->nik }}
                                                </div>

                                            @endif

                                        </td>


                                        {{-- GOALS --}}
                                        <td>

                                            <div class="goal-name">
                                                {{ $monitoring->goal->nama_goal ?? '-' }}
                                            </div>

                                            @if(isset($monitoring->goal->type))

                                                <div class="goal-type">
                                                    {{ $monitoring->goal->type }}
                                                </div>

                                            @endif

                                        </td>


                                        {{-- TARGET --}}
                                        <td>

                                            <span class="number-value">
                                                {{ number_format((float) $monitoring->target, 2, ',', '.') }}
                                            </span>

                                        </td>


                                        {{-- REALISASI --}}
                                        <td>

                                            <span class="number-value">
                                                {{ number_format((float) $monitoring->realisasi, 2, ',', '.') }}
                                            </span>

                                        </td>


                                        {{-- PENCAPAIAN --}}
                                        <td>

                                            <div class="{{ $badgeClass }}">

                                                <span class="badge-dot"></span>

                                                {{ number_format($persentase, 2, ',', '.') }}%

                                            </div>

                                        </td>


                                        {{-- TANGGAL --}}
                                        <td>

                                            <span class="date-value">

                                                {{ \Carbon\Carbon::parse($monitoring->tanggal_monitoring)->format('d/m/Y') }}

                                            </span>

                                        </td>


                                        {{-- AKSI --}}
                                        <td>

                                            <div class="action-wrapper">


                                                {{-- DETAIL --}}
                                                <a
                                                    href="{{ route('monitorings.show', $monitoring->id) }}"
                                                    class="btn-detail"
                                                >
                                                    👁 Detail
                                                </a>


                                                {{-- EDIT DAN HAPUS HANYA UNTUK ADMINISTRATOR/HR --}}
                                                @if(auth()->user()->role === 'admin')

                                                    {{-- EDIT --}}
                                                    <a
                                                        href="{{ route('monitorings.edit', $monitoring->id) }}"
                                                        class="btn-edit"
                                                    >
                                                        ✎ Edit
                                                    </a>


                                                    {{-- HAPUS --}}
                                                    <form
                                                        action="{{ route('monitorings.destroy', $monitoring->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data monitoring ini?')"
                                                    >

                                                        @csrf

                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="btn-delete"
                                                        >
                                                            🗑 Hapus
                                                        </button>

                                                    </form>

                                                @endif

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                    {{-- HASIL PENCARIAN KOSONG --}}

                    <div
                        id="searchEmpty"
                        class="empty-state"
                        style="display: none;"
                    >

                        <div class="empty-icon">
                            🔍
                        </div>

                        <h3 class="empty-title">
                            Data tidak ditemukan
                        </h3>

                        <p class="empty-description">
                            Tidak ada monitoring yang sesuai dengan pencarian.
                        </p>

                    </div>


                {{-- ==============================
                     BELUM ADA DATA
                ============================== --}}

                @else

                    <div class="empty-state">

                        <div class="empty-icon">
                            📊
                        </div>

                        <h3 class="empty-title">
                            Belum ada data monitoring
                        </h3>

                        <p class="empty-description">
                            Silakan tambahkan monitoring kinerja pertama.
                        </p>

                        <a
                            href="{{ route('monitorings.create') }}"
                            class="empty-button"
                        >
                            + Tambah Monitoring
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- ==============================
         SEARCH JAVASCRIPT
    ============================== --}}

    <script>

        const monitoringSearch = document.getElementById('monitoringSearch');

        if (monitoringSearch) {

            monitoringSearch.addEventListener('input', function () {

                const keyword = this.value.toLowerCase().trim();

                const rows = document.querySelectorAll('.monitoring-row');

                let visibleRows = 0;

                rows.forEach(function (row) {

                    const rowText = row.innerText.toLowerCase();

                    if (rowText.includes(keyword)) {

                        row.style.display = '';

                        visibleRows++;

                    } else {

                        row.style.display = 'none';

                    }

                });


                const searchEmpty = document.getElementById('searchEmpty');

                if (searchEmpty) {

                    if (visibleRows === 0 && keyword !== '') {

                        searchEmpty.style.display = 'block';

                    } else {

                        searchEmpty.style.display = 'none';

                    }

                }

            });

        }


        function resetMonitoringSearch() {

            if (monitoringSearch) {

                monitoringSearch.value = '';

                monitoringSearch.dispatchEvent(new Event('input'));

                monitoringSearch.focus();

            }

        }

    </script>

</x-app-layout>