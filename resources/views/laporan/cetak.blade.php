<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Kinerja Karyawan</title>

    <style>

        * {
            box-sizing: border-box;
        }

        /* =========================================================
           HALAMAN
        ========================================================= */

        @page {
            size: A4 portrait;
            margin: 10mm;
        }

        body {
            margin: 0;
            padding: 25px;
            background: #f1f5f9;
            font-family: Arial, Helvetica, sans-serif;
            color: #0f172a;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            text-align: center;
            border-bottom: 2px solid #0f172a;
            padding-bottom: 12px;
            margin-bottom: 18px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 16px;
            font-weight: 600;
        }

        .header p {
            margin: 4px 0 0;
            font-size: 11px;
            color: #64748b;
        }


        /* =========================================================
           RINGKASAN
        ========================================================= */

        .summary {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .summary-box {
            flex: 1;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            padding: 10px;
            text-align: center;
        }

        .summary-title {
            font-size: 10px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .summary-value {
            font-size: 19px;
            font-weight: 700;
        }

        .green {
            color: #16a34a;
        }

        .purple {
            color: #7c3aed;
        }

        .blue {
            color: #2563eb;
        }


        /* =========================================================
           JUDUL SECTION
        ========================================================= */

        .section-title {
            margin-bottom: 8px;
        }

        .section-title h3 {
            margin: 0;
            font-size: 16px;
        }

        .section-title p {
            margin: 3px 0 0;
            color: #64748b;
            font-size: 11px;
        }


        /* =========================================================
           TABLE MONITORING
        ========================================================= */

        .table-wrapper {
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th {
            background: #f1f5f9;
            color: #0f172a;
            border: 1px solid #cbd5e1;
            padding: 7px 6px;
            font-size: 10px;
            text-align: center;
        }

        td {
            border: 1px solid #cbd5e1;
            padding: 7px 6px;
            font-size: 10px;
            vertical-align: middle;
        }

        .center {
            text-align: center;
        }

        .employee-name {
            font-weight: 700;
            margin-bottom: 2px;
        }

        .nik {
            font-size: 8px;
            color: #64748b;
        }

        .goal-name {
            font-weight: 600;
        }

        .goal-type {
            margin-top: 2px;
            font-size: 8px;
            color: #64748b;
        }


        /* =========================================================
           STATUS PENCAPAIAN
        ========================================================= */

        .achievement {
            display: inline-block;
            padding: 3px 6px;
            border-radius: 15px;
            font-weight: 700;
            font-size: 9px;
        }

        .achievement-good {
            background: #dcfce7;
            color: #166534;
        }

        .achievement-medium {
            background: #fef3c7;
            color: #92400e;
        }

        .achievement-low {
            background: #fee2e2;
            color: #991b1b;
        }


        /* =========================================================
           EVALUASI 360
        ========================================================= */

        .evaluation-section {
            margin-top: 18px;
        }

        .evaluation-title {
            margin-bottom: 8px;
        }

        .evaluation-title h3 {
            margin: 0;
            font-size: 16px;
        }

        .evaluation-title p {
            margin: 3px 0 0;
            color: #64748b;
            font-size: 11px;
        }

        .evaluation-card {
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            padding: 10px;
            margin-bottom: 10px;

            page-break-inside: avoid;
            break-inside: avoid;
        }

        .evaluation-employee {
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .evaluation-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0;
        }

        .evaluation-table th {
            background: #eff6ff;
            color: #1e40af;
        }

        .evaluation-table td,
        .evaluation-table th {
            border: 1px solid #cbd5e1;
            padding: 6px;
            font-size: 9px;
        }

        .score-360 {
            font-size: 16px;
            font-weight: 700;
            color: #16a34a;
        }


        /* =========================================================
           DETAIL PENILAIAN
        ========================================================= */

        .detail-360 {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .detail-box {
            flex: 1;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            overflow: hidden;
        }

        .detail-header {
            background: #f8fafc;
            border-bottom: 1px solid #cbd5e1;
            padding: 7px 9px;
        }

        .detail-header-title {
            font-size: 10px;
            font-weight: 700;
            color: #0f172a;
        }

        .detail-header-subtitle {
            margin-top: 2px;
            font-size: 8px;
            color: #64748b;
        }

        .detail-body {
            padding: 5px 9px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
            border-bottom: 1px solid #e2e8f0;
            font-size: 8.5px;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #475569;
            padding-right: 8px;
        }

        .detail-score {
            font-weight: 700;
            color: #1d4ed8;
            white-space: nowrap;
        }

        .detail-average {
            margin-top: 5px;
            padding: 6px 8px;
            background: #eff6ff;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            font-size: 9px;
            font-weight: 700;
            color: #1e40af;
        }


        /* =========================================================
           RINGKASAN PERHITUNGAN
        ========================================================= */

        .calculation-box {
            margin-top: 10px;
            padding: 9px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            background: #f8fafc;
        }

        .calculation-title {
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .calculation-row {
            display: flex;
            justify-content: space-between;
            padding: 4px 0;
            font-size: 9px;
            color: #475569;
        }

        .calculation-result {
            font-weight: 700;
            color: #0f172a;
        }

        .calculation-final {
            border-top: 1px solid #cbd5e1;
            margin-top: 4px;
            padding-top: 6px;
            display: flex;
            justify-content: space-between;
            font-size: 10px;
            font-weight: 700;
        }

        .calculation-final-value {
            color: #16a34a;
            font-size: 12px;
        }


        /* =========================================================
           PREDIKAT KINERJA 360
        ========================================================= */

        .predicate {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 15px;
            font-weight: 700;
        }

        .predicate-superstar {
            background: #dcfce7;
            color: #166534;
        }

        .predicate-rockstar {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .predicate-mediocre {
            background: #fef3c7;
            color: #92400e;
        }

        .predicate-low {
            background: #fee2e2;
            color: #991b1b;
        }

        .predicate-deadwood {
            background: #e5e7eb;
            color: #374151;
        }

        .not-available {
            color: #94a3b8;
            font-style: italic;
        }


        /* =========================================================
           TANDA TANGAN
        ========================================================= */

        .signature {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;

            page-break-inside: avoid;
            break-inside: avoid;
        }

        .signature-box {
            width: 220px;
            text-align: center;
            font-size: 10px;
            color: #0f172a;
        }

        .signature-space {
            height: 40px;
        }

        .signature-line {
            font-weight: 600;
        }

        .signature-name {
            margin-top: 4px;
            font-size: 9px;
            color: #64748b;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            font-size: 8px;
            color: #64748b;

            page-break-inside: avoid;
        }


        /* =========================================================
           TOMBOL CETAK
        ========================================================= */

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;

            border: none;
            background: #2563eb;
            color: white;

            padding: 11px 17px;

            border-radius: 8px;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;
        }

        .print-button:hover {
            background: #1d4ed8;
        }


        /* =========================================================
           PRINT
        ========================================================= */

        @media print {

            @page {
                size: A4 portrait;
                margin: 10mm;
            }

            html,
            body {
                width: 210mm;
                min-height: 297mm;
                margin: 0;
                padding: 0;
                background: white;
            }

            body {
                font-size: 10px;
            }

            .container {
                width: 100%;
                max-width: none;
                margin: 0;
                padding: 0;
                background: white;
            }

            .print-button {
                display: none !important;
            }

            .header {
                margin-bottom: 15px;
                padding-bottom: 10px;
            }

            .summary {
                margin-bottom: 15px;
            }

            .summary-box {
                padding: 8px;
            }

            .section-title {
                margin-bottom: 6px;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }

            .evaluation-section {
                margin-top: 14px;
            }

            .evaluation-card {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }

            .detail-360 {
                display: flex;
            }

            .detail-box {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .calculation-box {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .signature {
                margin-top: 15px;
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .footer {
                margin-top: 12px;
                page-break-inside: avoid;
                break-inside: avoid;
            }

        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 700px) {

            body {
                padding: 10px;
            }

            .container {
                padding: 15px;
            }

            .summary {
                flex-direction: column;
            }

            .detail-360 {
                flex-direction: column;
            }

            .evaluation-card {
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================================================
         TOMBOL PRINT
    ========================================================= --}}

    <button
        class="print-button"
        onclick="window.print()"
    >
        🖨 Cetak / Simpan PDF
    </button>


    <div class="container">


        {{-- =========================================================
             HEADER
        ========================================================= --}}

        <div class="header">

            <h1>
                LAPORAN KINERJA KARYAWAN
            </h1>

            <h2>
                PT. PETRA TEXTIMA MANDIRI
            </h2>

            <p>
                Laporan hasil monitoring dan pencapaian kinerja karyawan
            </p>

        </div>


        {{-- =========================================================
             RINGKASAN
        ========================================================= --}}

        <div class="summary">

            <div class="summary-box">

                <div class="summary-title">
                    TOTAL MONITORING
                </div>

                <div class="summary-value blue">
                    {{ $totalMonitoring }}
                </div>

            </div>


            <div class="summary-box">

                <div class="summary-title">
                    PENCAPAIAN BAIK
                </div>

                <div class="summary-value green">
                    {{ $pencapaianBaik }}
                </div>

            </div>


            <div class="summary-box">

                <div class="summary-title">
                    RATA-RATA PENCAPAIAN
                </div>

                <div class="summary-value purple">
                    {{ number_format($rataRata, 2, ',', '.') }}%
                </div>

            </div>

        </div>


        {{-- =========================================================
             JUDUL LAPORAN
        ========================================================= --}}

        <div class="section-title">

            <h3>
                Daftar Laporan Kinerja
            </h3>

            <p>
                Rekap hasil monitoring kinerja karyawan.
            </p>

        </div>


        {{-- =========================================================
             TABEL MONITORING
        ========================================================= --}}

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th style="width: 5%;">
                            No
                        </th>

                        <th style="width: 18%;">
                            Karyawan
                        </th>

                        <th style="width: 25%;">
                            Goal
                        </th>

                        <th style="width: 10%;">
                            Target
                        </th>

                        <th style="width: 10%;">
                            Realisasi
                        </th>

                        <th style="width: 12%;">
                            Pencapaian
                        </th>

                        <th style="width: 12%;">
                            Tanggal
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($monitorings as $index => $monitoring)

                        @php

                            $persentase = (float) $monitoring->persentase;

                            if ($persentase >= 80) {

                                $achievementClass = 'achievement-good';

                            } elseif ($persentase >= 50) {

                                $achievementClass = 'achievement-medium';

                            } else {

                                $achievementClass = 'achievement-low';

                            }

                        @endphp


                        <tr>

                            <td class="center">
                                {{ $index + 1 }}
                            </td>


                            <td>

                                <div class="employee-name">
                                    {{ $monitoring->karyawan->nama ?? '-' }}
                                </div>

                                <div class="nik">
                                    NIK:
                                    {{ $monitoring->karyawan->nik ?? '-' }}
                                </div>

                            </td>


                            <td>

                                <div class="goal-name">
                                    {{ $monitoring->goal->nama_goal ?? '-' }}
                                </div>

                                <div class="goal-type">
                                    {{ $monitoring->goal->tipe ?? '-' }}
                                </div>

                            </td>


                            <td class="center">

                                {{ number_format(
                                    (float) $monitoring->target,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            <td class="center">

                                {{ number_format(
                                    (float) $monitoring->realisasi,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            <td class="center">

                                <span class="achievement {{ $achievementClass }}">

                                    {{ number_format(
                                        $persentase,
                                        2,
                                        ',',
                                        '.'
                                    ) }}%

                                </span>

                            </td>


                            <td class="center">

                                {{ \Carbon\Carbon::parse(
                                    $monitoring->tanggal_monitoring
                                )->format('d/m/Y') }}

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="center"
                            >

                                Belum ada data monitoring.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =========================================================
             HASIL EVALUASI 360°
        ========================================================= --}}

        <div class="evaluation-section">


            <div class="evaluation-title">

                <h3>
                    Hasil Evaluasi 360°
                </h3>

                <p>
                    Hasil penilaian berdasarkan Peer Review dan Supervisor Review.
                </p>

            </div>


            @forelse($monitorings as $monitoring)


                <div class="evaluation-card">


                    {{-- NAMA KARYAWAN --}}

                    <div class="evaluation-employee">

                        {{ $monitoring->karyawan->nama ?? '-' }}

                        &nbsp; - &nbsp;

                        {{ $monitoring->goal->nama_goal ?? '-' }}

                    </div>


                    {{-- =================================================
                         RINGKASAN SKOR
                    ================================================== --}}

                    <table class="evaluation-table">

                        <thead>

                            <tr>

                                <th style="width: 35%;">
                                    Jenis Evaluasi
                                </th>

                                <th style="width: 15%;">
                                    Skor
                                </th>

                                <th style="width: 15%;">
                                    Bobot
                                </th>

                                <th style="width: 20%;">
                                    Nilai
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            {{-- PEER REVIEW --}}

                            <tr>

                                <td>
                                    Peer Review
                                </td>

                                <td class="center">

                                    @if($monitoring->skor_peer !== null)

                                        <strong>
                                            {{ number_format(
                                                $monitoring->skor_peer,
                                                2,
                                                ',',
                                                '.'
                                            ) }}/5
                                        </strong>

                                    @else

                                        <span class="not-available">
                                            Belum ada
                                        </span>

                                    @endif

                                </td>


                                <td class="center">
                                    30%
                                </td>


                                <td class="center">

                                    @if($monitoring->nilai_peer !== null)

                                        {{ number_format(
                                            $monitoring->nilai_peer,
                                            2,
                                            ',',
                                            '.'
                                        ) }}

                                    @else

                                        <span class="not-available">
                                            -
                                        </span>

                                    @endif

                                </td>

                            </tr>


                            {{-- SUPERVISOR REVIEW --}}

                            <tr>

                                <td>
                                    Supervisor Review
                                </td>


                                <td class="center">

                                    @if($monitoring->skor_supervisor !== null)

                                        <strong>
                                            {{ number_format(
                                                $monitoring->skor_supervisor,
                                                2,
                                                ',',
                                                '.'
                                            ) }}/5
                                        </strong>

                                    @else

                                        <span class="not-available">
                                            Belum ada
                                        </span>

                                    @endif

                                </td>


                                <td class="center">
                                    70%
                                </td>


                                <td class="center">

                                    @if($monitoring->nilai_supervisor !== null)

                                        {{ number_format(
                                            $monitoring->nilai_supervisor,
                                            2,
                                            ',',
                                            '.'
                                        ) }}

                                    @else

                                        <span class="not-available">
                                            -
                                        </span>

                                    @endif

                                </td>

                            </tr>


                            {{-- HASIL 360 --}}

                            @if($monitoring->skor_360 !== null)

                                <tr>

                                    <td>
                                        <strong>
                                            Skor Evaluasi 360°
                                        </strong>
                                    </td>


                                    <td class="center">

                                        <span class="score-360">

                                            {{ number_format(
                                                $monitoring->skor_360,
                                                2,
                                                ',',
                                                '.'
                                            ) }}

                                            / 5

                                        </span>

                                    </td>


                                    <td class="center">
                                        -
                                    </td>


                                    <td class="center">
                                        -
                                    </td>

                                </tr>

                            @endif


                        </tbody>

                    </table>


                    {{-- =================================================
                         DETAIL PENILAIAN 360°
                    ================================================== --}}

                    @if(
                        $monitoring->skor_peer !== null ||
                        $monitoring->skor_supervisor !== null
                    )

                        <div class="detail-360">


                            {{-- =================================================
                                 DETAIL PEER
                            ================================================== --}}

                            <div class="detail-box">

                                <div class="detail-header">

                                    <div class="detail-header-title">
                                        Peer Review
                                    </div>

                                    <div class="detail-header-subtitle">
                                        Bobot penilaian: 30%
                                    </div>

                                </div>


                                <div class="detail-body">


                                    {{-- KEMAHIRAN --}}

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Kemahiran untuk Kualitas Layanan
                                        </span>

                                        <span class="detail-score">

                                            @if($monitoring->kemahiran_peer !== null)

                                                {{ number_format(
                                                    $monitoring->kemahiran_peer,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                    {{-- KOLABORASI --}}

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Kolaborasi Tim
                                        </span>

                                        <span class="detail-score">

                                            @if($monitoring->kolaborasi_peer !== null)

                                                {{ number_format(
                                                    $monitoring->kolaborasi_peer,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                    {{-- KEPUASAN --}}

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Berorientasi pada Kepuasan Pelanggan
                                        </span>

                                        <span class="detail-score">

                                            @if($monitoring->kepuasan_peer !== null)

                                                {{ number_format(
                                                    $monitoring->kepuasan_peer,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                    {{-- RATA-RATA PEER --}}

                                    <div class="detail-average">

                                        <span>
                                            Rata-rata Peer Review
                                        </span>

                                        <span>

                                            @if($monitoring->skor_peer !== null)

                                                {{ number_format(
                                                    $monitoring->skor_peer,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}/5

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                </div>

                            </div>


                            {{-- =================================================
                                 DETAIL SUPERVISOR
                            ================================================== --}}

                            <div class="detail-box">

                                <div class="detail-header">

                                    <div class="detail-header-title">
                                        Supervisor Review
                                    </div>

                                    <div class="detail-header-subtitle">
                                        Bobot penilaian: 70%
                                    </div>

                                </div>


                                <div class="detail-body">


                                    {{-- SKOR KINERJA --}}

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Skor Kinerja
                                        </span>

                                        <span class="detail-score">

                                            @if($monitoring->skor_kinerja !== null)

                                                {{ number_format(
                                                    $monitoring->skor_kinerja,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                    {{-- KEMAHIRAN --}}

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Kemahiran untuk Kualitas Layanan
                                        </span>

                                        <span class="detail-score">

                                            @if($monitoring->kemahiran_supervisor !== null)

                                                {{ number_format(
                                                    $monitoring->kemahiran_supervisor,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                    {{-- KOLABORASI --}}

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Kolaborasi Tim
                                        </span>

                                        <span class="detail-score">

                                            @if($monitoring->kolaborasi_supervisor !== null)

                                                {{ number_format(
                                                    $monitoring->kolaborasi_supervisor,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                    {{-- KEPUASAN --}}

                                    <div class="detail-row">

                                        <span class="detail-label">
                                            Berorientasi pada Kepuasan Pelanggan
                                        </span>

                                        <span class="detail-score">

                                            @if($monitoring->kepuasan_supervisor !== null)

                                                {{ number_format(
                                                    $monitoring->kepuasan_supervisor,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                    {{-- RATA-RATA PERILAKU --}}

                                    <div class="detail-average">

                                        <span>
                                            Rata-rata Perilaku
                                        </span>

                                        <span>

                                            @if($monitoring->avg_perilaku_supervisor !== null)

                                                {{ number_format(
                                                    $monitoring->avg_perilaku_supervisor,
                                                    2,
                                                    ',',
                                                    '.'
                                                ) }}/5

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>


                                </div>

                            </div>


                        </div>

                    @endif


                    {{-- =================================================
                         RINGKASAN PERHITUNGAN
                    ================================================== --}}

                    @if(
                        $monitoring->skor_peer !== null &&
                        $monitoring->skor_supervisor !== null
                    )

                        <div class="calculation-box">

                            <div class="calculation-title">
                                Ringkasan Perhitungan
                            </div>


                            <div class="calculation-row">

                                <span>
                                    Peer Review × 30%
                                </span>

                                <span class="calculation-result">

                                    {{ number_format(
                                        $monitoring->skor_peer,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                    × 30% =

                                    {{ number_format(
                                        $monitoring->nilai_peer,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </div>


                            <div class="calculation-row">

                                <span>
                                    Supervisor Review × 70%
                                </span>

                                <span class="calculation-result">

                                    {{ number_format(
                                        $monitoring->skor_supervisor,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                    × 70% =

                                    {{ number_format(
                                        $monitoring->nilai_supervisor,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </div>


                            <div class="calculation-final">

                                <span>
                                    Final Score 360°
                                </span>

                                <span class="calculation-final-value">

                                    {{ number_format(
                                        $monitoring->skor_360,
                                        2,
                                        ',',
                                        '.'
                                    ) }}/5

                                </span>

                            </div>

                        </div>

                    @endif


                    {{-- =================================================
                         PREDIKAT KINERJA
                    ================================================== --}}

                    @if($monitoring->predikat_360 !== null)

                        @php

                            $predikat = strtoupper(
                                trim($monitoring->predikat_360)
                            );

                            switch ($predikat) {

                                case 'SUPERSTAR':
                                    $predicateClass = 'predicate-superstar';
                                    break;

                                case 'ROCKSTAR':
                                    $predicateClass = 'predicate-rockstar';
                                    break;

                                case 'MEDIOCRE':
                                    $predicateClass = 'predicate-mediocre';
                                    break;

                                case 'LOW':
                                    $predicateClass = 'predicate-low';
                                    break;

                                case 'DEADWOOD':
                                    $predicateClass = 'predicate-deadwood';
                                    break;

                                default:
                                    $predicateClass = 'predicate-deadwood';
                                    break;
                            }

                        @endphp


                        <div
                            style="
                                margin-top: 8px;
                                text-align: center;
                                padding: 7px;
                                background: #f8fafc;
                                border-radius: 7px;
                            "
                        >

                            <strong>
                                Predikat Kinerja:
                            </strong>

                            <span class="predicate {{ $predicateClass }}">
                                {{ $predikat }}
                            </span>

                        </div>


                    @else


                        <div
                            style="
                                margin-top: 8px;
                                text-align: center;
                                color: #94a3b8;
                                font-size: 10px;
                            "
                        >

                            Peer Review dan Supervisor Review belum lengkap.

                        </div>


                    @endif


                </div>


            @empty


                <div class="evaluation-card">

                    <div class="center">

                        Belum ada data evaluasi.

                    </div>

                </div>


            @endforelse


        </div>


        {{-- =========================================================
             TANDA TANGAN
        ========================================================= --}}

        <div class="signature">


            <div class="signature-box">


                <div>
                    Mengetahui,
                </div>


                <div>
                    Supervisor / Pimpinan
                </div>


                <div class="signature-space">
                </div>


                <div class="signature-line">

                    ______________________________

                </div>


                <div class="signature-name">

                    {{ $namaPenandatangan ?: '.................................' }}

                </div>


            </div>


        </div>


        {{-- =========================================================
             FOOTER
        ========================================================= --}}

        <div class="footer">


            <div>
                Sistem Informasi Kinerja Karyawan
            </div>


            <div>

                Dicetak pada:

                {{ now()->format('d/m/Y H:i') }}

            </div>


        </div>


    </div>


</body>

</html>