<x-app-layout>

    <style>
        .laporan-container {
            padding: 40px;
            background: #f1f5f9;
            min-height: calc(100vh - 70px);
        }

        .laporan-wrapper {
            max-width: 1200px;
            margin: 0 auto;
        }

        .laporan-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
            gap: 20px;
        }

        .laporan-title {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #0f172a;
        }

        .laporan-subtitle {
            margin-top: 8px;
            font-size: 15px;
            color: #64748b;
        }

        .btn-cetak {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            background: #0f3b66;
            color: #ffffff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-cetak:hover {
            background: #092d4f;
        }

        /* FILTER */

        .filter-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .filter-title {
            margin-bottom: 12px;
            font-size: 16px;
            font-weight: 600;
            color: #0f172a;
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-select {
            min-width: 300px;
            padding: 12px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            background: #ffffff;
            color: #334155;
            font-size: 14px;
            outline: none;
        }

        .filter-select:focus {
            border-color: #0f3b66;
            box-shadow: 0 0 0 3px rgba(15, 59, 102, 0.10);
        }

        .btn-filter {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 12px 18px;
            border: none;
            background: #0f3b66;
            color: #ffffff;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-filter:hover {
            background: #092d4f;
        }

        .btn-reset {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 12px 18px;
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-reset:hover {
            background: #e2e8f0;
        }

        /* STATISTIK */

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .stat-card.blue {
            border-left: 5px solid #0f3b66;
        }

        .stat-card.green {
            border-left: 5px solid #0f3b66;
        }

        .stat-card.purple {
            border-left: 5px solid #0f3b66;
        }

        .stat-label {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 12px;
        }

        .stat-value {
            font-size: 30px;
            font-weight: 700;
        }

        .blue .stat-value {
            color: #0f3b66;
        }

        .green .stat-value {
            color: #0f3b66;
        }

        .purple .stat-value {
            color: #0f3b66;
        }

        .stat-info {
            margin-top: 8px;
            font-size: 12px;
            color: #64748b;
        }

        /* CARD */

        .laporan-card {
            background: #ffffff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .card-header {
            padding: 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-title {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            color: #0f172a;
        }

        .card-description {
            margin-top: 7px;
            font-size: 14px;
            color: #64748b;
        }

        /* TABLE */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .laporan-table {
            width: 100%;
            border-collapse: collapse;
        }

        .laporan-table th {
            padding: 15px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #0f3b66;
            white-space: nowrap;
        }

        .laporan-table td {
            padding: 17px 15px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            color: #334155;
            vertical-align: middle;
        }

        .laporan-table tbody tr:last-child td {
            border-bottom: none;
        }

        .laporan-table tbody tr:hover {
            background: #f8fafc;
        }

        .nama-karyawan {
            font-weight: 600;
            color: #0f172a;
        }

        .nik {
            margin-top: 4px;
            font-size: 12px;
            color: #94a3b8;
        }

        .goal-name {
            font-weight: 600;
            color: #0f172a;
        }

        .goal-type {
            margin-top: 4px;
            font-size: 12px;
            color: #94a3b8;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 70px;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-baik {
            background: #dbeafe;
            color: #0f3b66;
        }

        .badge-sedang {
            background: #dbeafe;
            color: #0f3b66;
        }

        .badge-rendah {
            background: #dbeafe;
            color: #0f3b66;
        }

        .tanggal {
            white-space: nowrap;
            color: #64748b;
        }

        .btn-cetak-karyawan {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 8px 12px;
            background: #0f3b66;
            color: #ffffff;
            text-decoration: none;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-cetak-karyawan:hover {
            background: #092d4f;
        }

        /* EMPTY */

        .empty-state {
            padding: 60px 20px;
            text-align: center;
            color: #64748b;
        }

        .empty-icon {
            font-size: 42px;
            margin-bottom: 12px;
        }

        .empty-title {
            font-size: 16px;
            font-weight: 600;
            color: #334155;
        }

        .empty-text {
            margin-top: 5px;
            font-size: 13px;
        }

        /* GRAFIK */

        .grafik-card {
            margin-top: 30px;
            background: #ffffff;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .grafik-header {
            margin-bottom: 25px;
        }

        .grafik-title {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            color: #0f172a;
        }

        .grafik-description {
            margin-top: 7px;
            font-size: 14px;
            color: #64748b;
        }

        .grafik-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .grafik-item {
            width: 100%;
        }

        .grafik-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .grafik-karyawan {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }

        .grafik-goal {
            margin-top: 3px;
            font-size: 12px;
            color: #64748b;
        }

        .grafik-persentase {
            font-size: 14px;
            font-weight: 700;
        }

        .persentase-baik {
            color: #0f3b66;
        }

        .persentase-sedang {
            color: #0f3b66;
        }

        .persentase-rendah {
            color: #0f3b66;
        }

        .progress-background {
            width: 100%;
            height: 18px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 999px;
            transition: width 0.5s ease;
        }

        .progress-baik {
            background: #0f3b66;
        }

        .progress-sedang {
            background: #0f3b66;
        }

        .progress-rendah {
            background: #0f3b66;
        }

        .grafik-detail {
            display: flex;
            justify-content: space-between;
            margin-top: 7px;
            font-size: 12px;
            color: #64748b;
        }

        .grafik-detail strong {
            color: #334155;
        }

        .footer-laporan {
            margin-top: 25px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }

        @media (max-width: 900px) {

            .laporan-container {
                padding: 25px 15px;
            }

            .stat-grid {
                grid-template-columns: 1fr;
            }

            .laporan-header {
                flex-direction: column;
                gap: 20px;
            }

            .laporan-title {
                font-size: 25px;
            }

            .filter-select {
                min-width: 100%;
            }

            .filter-form {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-filter,
            .btn-reset {
                width: 100%;
            }
        }

        @media print {

            .btn-cetak,
            .btn-cetak-karyawan,
            .filter-card {
                display: none;
            }

            .laporan-container {
                padding: 20px;
                background: #ffffff;
            }

            .stat-card,
            .laporan-card,
            .grafik-card {
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }
        }
    </style>


    @php

        $totalMonitoring = $monitorings->count();

        $pencapaianBaik = $monitorings
            ->where('persentase', '>=', 80)
            ->count();

        $pencapaianSedang = $monitorings
            ->filter(function ($monitoring) {
                return $monitoring->persentase >= 50
                    && $monitoring->persentase < 80;
            })
            ->count();

        $pencapaianRendah = $monitorings
            ->where('persentase', '<', 50)
            ->count();

        $rataRata = $monitorings->avg('persentase') ?? 0;

    @endphp


    <div class="laporan-container">

        <div class="laporan-wrapper">


            {{-- HEADER --}}

            <div class="laporan-header">

                <div>

                    <h1 class="laporan-title">
                        Laporan Kinerja
                    </h1>

                    <p class="laporan-subtitle">
                        Laporan hasil monitoring dan pencapaian kinerja karyawan.
                    </p>

                </div>


                {{-- FORM CETAK --}}

                <form
                    action="{{ route('laporan.cetak') }}"
                    method="GET"
                    target="_blank"
                    id="form-nama-penandatangan"
                    style="
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        flex-wrap: wrap;
                    "
                >

                    {{-- Pertahankan filter karyawan saat cetak --}}

                    @if(request('karyawan_id'))
                        <input
                            type="hidden"
                            name="karyawan_id"
                            value="{{ request('karyawan_id') }}"
                        >
                    @endif


                    <input
                        type="text"
                        name="nama_penandatangan"
                        id="nama_penandatangan"
                        placeholder="Nama penandatangan"
                        value="{{ request('nama_penandatangan') }}"
                        required
                        style="
                            padding: 12px 15px;
                            border: 1px solid #cbd5e1;
                            border-radius: 10px;
                            font-size: 14px;
                            outline: none;
                            min-width: 220px;
                        "
                    >


                    <button
                        type="submit"
                        class="btn-cetak"
                        style="
                            border: none;
                            cursor: pointer;
                        "
                    >
                        🖨️ Cetak Laporan
                    </button>

                </form>

            </div>


            {{-- ==========================================================
                 FILTER KARYAWAN
            =========================================================== --}}

            <div class="filter-card">

                <div class="filter-title">
                    🔎 Filter Laporan
                </div>


                <form
                    action="{{ route('laporan.index') }}"
                    method="GET"
                    class="filter-form"
                >

                    <select
                        name="karyawan_id"
                        class="filter-select"
                    >

                        <option value="">
                            -- Semua Karyawan --
                        </option>


                        @foreach($karyawans as $karyawan)

                            <option
                                value="{{ $karyawan->id }}"
                                {{ request('karyawan_id') == $karyawan->id ? 'selected' : '' }}
                            >
                                {{ $karyawan->nama }}
                                - {{ $karyawan->nik }}
                            </option>

                        @endforeach

                    </select>


                    <button
                        type="submit"
                        class="btn-filter"
                    >
                        🔎 Filter
                    </button>


                    @if(request('karyawan_id'))

                        <a
                            href="{{ route('laporan.index') }}"
                            class="btn-reset"
                        >
                            ↻ Reset
                        </a>

                    @endif

                </form>

            </div>


            {{-- ==========================================================
                 STATISTIK
            =========================================================== --}}

            <div class="stat-grid">


                {{-- TOTAL MONITORING --}}

                <div class="stat-card blue">

                    <div class="stat-label">
                        Total Monitoring
                    </div>

                    <div class="stat-value">
                        {{ $totalMonitoring }}
                    </div>

                    <div class="stat-info">
                        Seluruh data monitoring
                    </div>

                </div>


                {{-- PENCAPAIAN BAIK --}}

                <div class="stat-card green">

                    <div class="stat-label">
                        Pencapaian Baik
                    </div>

                    <div class="stat-value">
                        {{ $pencapaianBaik }}
                    </div>

                    <div class="stat-info">
                        ≥ 80%
                    </div>

                </div>


                {{-- RATA-RATA --}}

                <div class="stat-card purple">

                    <div class="stat-label">
                        Rata-rata Pencapaian
                    </div>

                    <div class="stat-value">
                        {{ number_format($rataRata, 2, ',', '.') }}%
                    </div>

                    <div class="stat-info">
                        Dari seluruh monitoring
                    </div>

                </div>

            </div>


            {{-- ==========================================================
                 DAFTAR LAPORAN
            =========================================================== --}}

            <div class="laporan-card">

                <div class="card-header">

                    <h2 class="card-title">
                        Daftar Laporan Kinerja
                    </h2>

                    <p class="card-description">
                        Rekap hasil monitoring kinerja karyawan.
                    </p>

                </div>


                @if($monitorings->count() > 0)

                    <div class="table-wrapper">

                        <table class="laporan-table">

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


                            <tbody>

                                @foreach($monitorings as $index => $monitoring)

                                    @php

                                        $persentase =
                                            (float) $monitoring->persentase;

                                        if ($persentase >= 80) {

                                            $badgeClass =
                                                'badge-baik';

                                            $persentaseClass =
                                                'persentase-baik';

                                            $progressClass =
                                                'progress-baik';

                                        } elseif ($persentase >= 50) {

                                            $badgeClass =
                                                'badge-sedang';

                                            $persentaseClass =
                                                'persentase-sedang';

                                            $progressClass =
                                                'progress-sedang';

                                        } else {

                                            $badgeClass =
                                                'badge-rendah';

                                            $persentaseClass =
                                                'persentase-rendah';

                                            $progressClass =
                                                'progress-rendah';

                                        }

                                        $namaKaryawan =
                                            $monitoring->karyawan->nama ?? '-';

                                        $nikKaryawan =
                                            $monitoring->karyawan->nik ?? '-';

                                        $namaGoal =
                                            $monitoring->goal->nama_goal ?? '-';

                                    @endphp


                                    <tr>

                                        {{-- NO --}}

                                        <td>
                                            {{ $index + 1 }}
                                        </td>


                                        {{-- KARYAWAN --}}

                                        <td>

                                            <div class="nama-karyawan">
                                                {{ $namaKaryawan }}
                                            </div>

                                            <div class="nik">
                                                NIK: {{ $nikKaryawan }}
                                            </div>

                                        </td>


                                        {{-- GOALS --}}

                                        <td>

                                            <div class="goal-name">
                                                {{ $namaGoal }}
                                            </div>

                                            <div class="goal-type">
                                                Individu
                                            </div>

                                        </td>


                                        {{-- TARGET --}}

                                        <td>

                                            {{ number_format(
                                                (float) $monitoring->target,
                                                2,
                                                ',',
                                                '.'
                                            ) }}

                                        </td>


                                        {{-- REALISASI --}}

                                        <td>

                                            {{ number_format(
                                                (float) $monitoring->realisasi,
                                                2,
                                                ',',
                                                '.'
                                            ) }}

                                        </td>


                                        {{-- PENCAPAIAN --}}

                                        <td>

                                            <span class="badge {{ $badgeClass }}">

                                                {{ number_format(
                                                    $persentase,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}%

                                            </span>

                                        </td>


                                        {{-- TANGGAL --}}

                                        <td class="tanggal">

                                            {{ \Carbon\Carbon::parse(
                                                $monitoring->tanggal_monitoring
                                            )->format('d/m/Y') }}

                                        </td>


                                        {{-- AKSI --}}

                                        <td>

                                            <a
                                                href="{{ route('laporan.cetak', [
                                                    'karyawan_id' => $monitoring->karyawan_id,
                                                    'nama_penandatangan' => request('nama_penandatangan')
                                                ]) }}"
                                                target="_blank"
                                                class="btn-cetak-karyawan"
                                                data-karyawan-id="{{ $monitoring->karyawan_id }}"
                                            >
                                                🖨️ Cetak
                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty-state">

                        <div class="empty-icon">
                            📋
                        </div>

                        <div class="empty-title">
                            Belum ada data laporan
                        </div>

                        <div class="empty-text">
                            Data laporan akan muncul setelah monitoring ditambahkan.
                        </div>

                    </div>

                @endif

            </div>


            {{-- ==========================================================
                 GRAFIK
            =========================================================== --}}

            <div class="grafik-card">

                <div class="grafik-header">

                    <h2 class="grafik-title">
                        Grafik Pencapaian Kinerja
                    </h2>

                    <p class="grafik-description">
                        Perbandingan target, realisasi, dan pencapaian monitoring.
                    </p>

                </div>


                @if($monitorings->count() > 0)

                    <div class="grafik-list">

                        @foreach($monitorings as $monitoring)

                            @php

                                $persentase =
                                    (float) $monitoring->persentase;

                                if ($persentase >= 80) {

                                    $persentaseClass =
                                        'persentase-baik';

                                    $progressClass =
                                        'progress-baik';

                                } elseif ($persentase >= 50) {

                                    $persentaseClass =
                                        'persentase-sedang';

                                    $progressClass =
                                        'progress-sedang';

                                } else {

                                    $persentaseClass =
                                        'persentase-rendah';

                                    $progressClass =
                                        'progress-rendah';

                                }

                                $namaKaryawan =
                                    $monitoring->karyawan->nama ?? '-';

                                $namaGoal =
                                    $monitoring->goal->nama_goal ?? '-';

                                $progressWidth =
                                    min(
                                        max(
                                            $persentase,
                                            0
                                        ),
                                        100
                                    );

                            @endphp


                            <div class="grafik-item">


                                <div class="grafik-info">

                                    <div>

                                        <div class="grafik-karyawan">
                                            {{ $namaKaryawan }}
                                        </div>

                                        <div class="grafik-goal">
                                            {{ $namaGoal }}
                                        </div>

                                    </div>


                                    <div class="grafik-persentase {{ $persentaseClass }}">

                                        {{ number_format(
                                            $persentase,
                                            2,
                                            ',',
                                            '.'
                                        ) }}%

                                    </div>

                                </div>


                                <div class="progress-background">

                                    <div
                                        class="progress-fill {{ $progressClass }}"
                                        data-progress="{{ $progressWidth }}"
                                    ></div>

                                </div>


                                <div class="grafik-detail">

                                    <span>

                                        Target:

                                        <strong>
                                            {{ number_format(
                                                (float) $monitoring->target,
                                                2,
                                                ',',
                                                '.'
                                            ) }}
                                        </strong>

                                    </span>


                                    <span>

                                        Realisasi:

                                        <strong>
                                            {{ number_format(
                                                (float) $monitoring->realisasi,
                                                2,
                                                ',',
                                                '.'
                                            ) }}
                                        </strong>

                                    </span>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-state">

                        <div class="empty-icon">
                            📊
                        </div>

                        <div class="empty-title">
                            Belum ada data untuk grafik
                        </div>

                        <div class="empty-text">
                            Grafik akan muncul setelah terdapat data monitoring.
                        </div>

                    </div>

                @endif

            </div>


            {{-- ==========================================================
                 RINGKASAN
            =========================================================== --}}

            <div
                class="laporan-card"
                style="margin-top: 30px;"
            >

                <div class="card-header">

                    <h2 class="card-title">
                        Ringkasan Pencapaian
                    </h2>

                    <p class="card-description">
                        Distribusi hasil pencapaian kinerja karyawan.
                    </p>

                </div>


                <div
                    style="
                        padding: 25px;
                        display: grid;
                        grid-template-columns: repeat(3, 1fr);
                        gap: 20px;
                    "
                >


                    {{-- BAIK --}}

                    <div
                        style="
                            padding: 20px;
                            border-radius: 12px;
                            background: #eff6ff;
                            border: 1px solid #bfdbfe;
                        "
                    >

                        <div
                            style="
                                color: #0f3b66;
                                font-size: 14px;
                                font-weight: 600;
                            "
                        >
                            Pencapaian Baik
                        </div>

                        <div
                            style="
                                margin-top: 10px;
                                color: #0f3b66;
                                font-size: 28px;
                                font-weight: 700;
                            "
                        >
                            {{ $pencapaianBaik }}
                        </div>

                        <div
                            style="
                                margin-top: 5px;
                                color: #0f3b66;
                                font-size: 12px;
                            "
                        >
                            ≥ 80%
                        </div>

                    </div>


                    {{-- SEDANG --}}

                    <div
                        style="
                            padding: 20px;
                            border-radius: 12px;
                            background: #eff6ff;
                            border: 1px solid #bfdbfe;
                        "
                    >

                        <div
                            style="
                                color: #0f3b66;
                                font-size: 14px;
                                font-weight: 600;
                            "
                        >
                            Pencapaian Sedang
                        </div>

                        <div
                            style="
                                margin-top: 10px;
                                color: #0f3b66;
                                font-size: 28px;
                                font-weight: 700;
                            "
                        >
                            {{ $pencapaianSedang }}
                        </div>

                        <div
                            style="
                                margin-top: 5px;
                                color: #0f3b66;
                                font-size: 12px;
                            "
                        >
                            50% - 79,99%
                        </div>

                    </div>


                    {{-- RENDAH --}}

                    <div
                        style="
                            padding: 20px;
                            border-radius: 12px;
                            background: #eff6ff;
                            border: 1px solid #bfdbfe;
                        "
                    >

                        <div
                            style="
                                color: #0f3b66;
                                font-size: 14px;
                                font-weight: 600;
                            "
                        >
                            Pencapaian Rendah
                        </div>

                        <div
                            style="
                                margin-top: 10px;
                                color: #0f3b66;
                                font-size: 28px;
                                font-weight: 700;
                            "
                        >
                            {{ $pencapaianRendah }}
                        </div>

                        <div
                            style="
                                margin-top: 5px;
                                color: #0f3b66;
                                font-size: 12px;
                            "
                        >
                            &lt; 50%
                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}

            <div class="footer-laporan">
                Sistem Informasi Kinerja Karyawan
            </div>


        </div>

    </div>


    {{-- ================================================================
         SCRIPT
    ================================================================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
            |--------------------------------------------------------------------------
            | Progress Bar
            |--------------------------------------------------------------------------
            */

            const progressBars =
                document.querySelectorAll('.progress-fill');


            progressBars.forEach(function (bar) {

                const progress =
                    parseFloat(
                        bar.dataset.progress
                    ) || 0;


                const safeProgress =
                    Math.min(
                        Math.max(
                            progress,
                            0
                        ),
                        100
                    );


                bar.style.width =
                    safeProgress + '%';

            });


            /*
            |--------------------------------------------------------------------------
            | Nama Penandatangan untuk Cetak Satu Karyawan
            |--------------------------------------------------------------------------
            */

            const inputNama =
                document.getElementById(
                    'nama_penandatangan'
                );


            const tombolCetakKaryawan =
                document.querySelectorAll(
                    '.btn-cetak-karyawan'
                );


            function updateLinkCetak() {

                const nama =
                    inputNama
                        ? inputNama.value.trim()
                        : '';


                tombolCetakKaryawan.forEach(
                    function (tombol) {

                        const karyawanId =
                            tombol.dataset.karyawanId;


                        const url =
                            new URL(
                                "{{ route('laporan.cetak') }}",
                                window.location.origin
                            );


                        url.searchParams.set(
                            'karyawan_id',
                            karyawanId
                        );


                        if (nama !== '') {

                            url.searchParams.set(
                                'nama_penandatangan',
                                nama
                            );

                        }


                        tombol.href =
                            url.toString();

                    }
                );

            }


            if (inputNama) {

                inputNama.addEventListener(
                    'input',
                    updateLinkCetak
                );


                updateLinkCetak();

            }

        });

    </script>

</x-app-layout>