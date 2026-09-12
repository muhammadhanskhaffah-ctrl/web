<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hasil Evaluasi 360°</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #0f172a;
        }

        .container {
            max-width: 1120px;
            margin: 35px auto;
            padding: 0 22px 50px;
        }


        /* =====================================================
           HEADER
        ====================================================== */

        .header {
            margin-bottom: 25px;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
        }

        .header-left {
            flex: 1;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 32px;
            font-weight: 800;
            color: #0b1f44;
            letter-spacing: -0.5px;
        }

        .header p {
            margin: 0;
            color: #64748b;
            font-size: 15px;
        }

        .period-badge {
            min-width: 190px;
            background: #ffffff;
            border: 1px solid #dbe4f0;
            border-radius: 14px;
            padding: 14px 18px;
            color: #64748b;
            font-size: 12px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
        }

        .period-label {
            display: block;
            font-size: 11px;
            letter-spacing: .7px;
            margin-bottom: 5px;
            color: #94a3b8;
            font-weight: 700;
        }

        .period-badge strong {
            display: block;
            color: #0b1f44;
            font-size: 14px;
        }


        /* =====================================================
           CARD
        ====================================================== */

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 17px;
            padding: 26px;
            margin-bottom: 20px;
            box-shadow: 0 7px 25px rgba(15, 23, 42, 0.055);
        }

        .card h2 {
            margin: 0 0 20px;
            font-size: 21px;
            font-weight: 800;
            color: #0b1f44;
        }


        /* =====================================================
           DATA KARYAWAN
        ====================================================== */

        .employee-card {
            border-top: 4px solid #2563eb;
        }

        .employee-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .title-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 21px;
        }

        .employee-title h2 {
            margin: 0;
        }

        .employee-title p {
            margin: 3px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-item {
            padding: 18px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            transition: .2s ease;
        }

        .info-item:hover {
            border-color: #bfdbfe;
            background: #f8fbff;
        }

        .label {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .value {
            display: block;
            font-weight: 750;
            font-size: 16px;
            color: #0f172a;
        }


        /* =====================================================
           SECTION TITLE
        ====================================================== */

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-title h2 {
            margin: 0;
        }

        .section-badge {
            padding: 7px 12px;
            border-radius: 20px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 12px;
            font-weight: 700;
        }


        /* =====================================================
           TABLE
        ====================================================== */

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th {
            background: #eff6ff;
            color: #1d4ed8;
            text-align: left;
            padding: 15px;
            font-size: 12px;
            font-weight: 800;
            border-bottom: 1px solid #dbeafe;
        }

        td {
            padding: 17px 15px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .score {
            font-weight: 800;
            font-size: 16px;
            color: #0b1f44;
        }

        .status-belum {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 8px;
            background: #fee2e2;
            color: #dc2626;
            font-weight: 700;
            font-size: 12px;
        }

        .status-tersedia {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 8px;
            background: #dcfce7;
            color: #15803d;
            font-weight: 700;
            font-size: 12px;
        }


        /* =====================================================
           WARNING
        ====================================================== */

        .warning {
            margin-top: 18px;
            padding: 17px 20px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-left: 4px solid #f97316;
            border-radius: 11px;
            color: #9a3412;
            font-size: 14px;
            line-height: 1.6;
        }

        .warning strong {
            font-size: 15px;
        }


        /* =====================================================
           DETAIL PENILAIAN
        ====================================================== */

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .detail-box {
            border: 1px solid #dbe4f0;
            border-radius: 15px;
            overflow: hidden;
            background: #ffffff;
        }

        .peer-box {
            border-top: 4px solid #2563eb;
        }

        .supervisor-box {
            border-top: 4px solid #16a34a;
        }

        .detail-header {
            padding: 18px 19px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .detail-header h3 {
            margin: 0;
            font-size: 17px;
            color: #0b1f44;
        }

        .detail-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .weight-badge {
            padding: 7px 11px;
            border-radius: 8px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 800;
        }

        .supervisor-box .weight-badge {
            background: #dcfce7;
            color: #15803d;
        }

        .detail-content {
            padding: 15px 19px 18px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 14px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-name {
            color: #475569;
            font-size: 14px;
            line-height: 1.45;
        }

        .detail-score {
            min-width: 60px;
            text-align: center;
            padding: 7px 10px;
            background: #eff6ff;
            color: #1d4ed8;
            border-radius: 8px;
            font-weight: 800;
        }

        .supervisor-box .detail-score {
            background: #ecfdf5;
            color: #15803d;
        }

        .detail-average {
            margin-top: 14px;
            padding: 15px;
            background: #eef2ff;
            border-radius: 11px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .supervisor-box .detail-average {
            background: #ecfdf5;
        }

        .detail-average span {
            color: #4338ca;
            font-weight: 800;
            font-size: 13px;
        }

        .supervisor-box .detail-average span {
            color: #15803d;
        }

        .detail-average strong {
            color: #3730a3;
            font-size: 18px;
        }

        .supervisor-box .detail-average strong {
            color: #15803d;
        }


        /* =====================================================
           HASIL AKHIR
        ====================================================== */

        .result-card {
            padding: 0;
            overflow: hidden;
        }

        .result {
            position: relative;
            text-align: center;
            padding: 42px 30px 38px;
            background: linear-gradient(135deg, #ecfdf5, #f0fdf4);
            border-bottom: 1px solid #bbf7d0;
        }

        .result::before {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            background: rgba(255,255,255,.5);
            top: -80px;
            left: -50px;
        }

        .result::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255,255,255,.4);
            bottom: -90px;
            right: -40px;
        }

        .result-title {
            position: relative;
            z-index: 1;
            color: #166534;
            font-size: 18px;
            margin-bottom: 7px;
            font-weight: 800;
        }

        .result-score {
            position: relative;
            z-index: 1;
            color: #16a34a;
            font-size: 64px;
            font-weight: 850;
            line-height: 1.05;
            letter-spacing: -2px;
        }

        .result-max {
            position: relative;
            z-index: 1;
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }

        .predikat {
            position: relative;
            z-index: 1;
            margin: 18px auto 0;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            background: #ffffff;
            border: 1px solid #bbf7d0;
            border-radius: 22px;
            font-size: 14px;
            color: #166534;
            box-shadow: 0 4px 12px rgba(22, 101, 52, 0.06);
        }

        .predikat strong {
            font-weight: 850;
        }


        /* =====================================================
           RINGKASAN PERHITUNGAN
        ====================================================== */

        .calculation {
            margin: 20px;
            padding: 21px;
            background: #f8fafc;
            border-radius: 13px;
            border: 1px solid #e2e8f0;
        }

        .calculation h3 {
            margin: 0 0 16px;
            font-size: 17px;
            color: #0b1f44;
        }

        .formula-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 13px 0;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        .formula-row:last-child {
            border-bottom: none;
        }

        .formula-name {
            color: #475569;
        }

        .formula-value {
            font-weight: 800;
            color: #0f172a;
            text-align: right;
        }

        .formula-final {
            margin-top: 9px;
            padding: 16px;
            border-top: 2px solid #cbd5e1;
            background: #ffffff;
            border-radius: 10px;
        }

        .formula-final .formula-name {
            color: #0b1f44;
            font-weight: 800;
        }

        .formula-final .formula-value {
            color: #16a34a;
            font-size: 19px;
        }


        /* =====================================================
           KOMPOSISI PENILAIAN
        ====================================================== */

        .composition-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .composition-box {
            position: relative;
            padding: 21px;
            border: 1px solid #dbe4f0;
            border-radius: 14px;
            background: #f8fafc;
            overflow: hidden;
        }

        .composition-box::after {
            content: "";
            position: absolute;
            right: -25px;
            top: -25px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: #dbeafe;
        }

        .composition-box.supervisor::after {
            background: #dcfce7;
        }

        .composition-title {
            position: relative;
            z-index: 1;
            color: #64748b;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .composition-value {
            position: relative;
            z-index: 1;
            font-size: 30px;
            font-weight: 850;
            color: #2563eb;
        }

        .composition-box.supervisor .composition-value {
            color: #16a34a;
        }


        /* =====================================================
           BUTTON
        ====================================================== */

        .buttons {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 5px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 750;
            font-size: 14px;
            transition: all .2s ease;
        }

        .btn-back {
            background: #ffffff;
            color: #334155;
            border: 1px solid #cbd5e1;
            box-shadow: 0 4px 12px rgba(15, 23, 42, .04);
        }

        .btn-back:hover {
            background: #f8fafc;
            border-color: #94a3b8;
            transform: translateY(-1px);
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 800px) {

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .header-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .period-badge {
                width: 100%;
            }

        }


        @media (max-width: 700px) {

            .container {
                margin: 25px auto;
                padding: 0 15px 35px;
            }

            .header h1 {
                font-size: 26px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .composition-grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 18px;
            }

            .result {
                padding: 32px 18px;
            }

            .result-score {
                font-size: 48px;
            }

            .calculation {
                margin: 15px 0 0;
            }

            .formula-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .formula-value {
                text-align: left;
            }

            .detail-header-flex {
                align-items: flex-start;
                flex-direction: column;
            }

            .section-title {
                align-items: flex-start;
                flex-direction: column;
            }

        }

    </style>

</head>


<body>

<div class="container">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="header">

        <div class="header-top">

            <div class="header-left">

                <h1>
                    Hasil Evaluasi 360°
                </h1>

                <p>
                    Hasil penilaian kinerja karyawan berdasarkan
                    Peer Review dan Supervisor Review.
                </p>

            </div>

            <div class="period-badge">

                <span class="period-label">
                    PERIODE EVALUASI
                </span>

                <strong>
                    Semester 1 · 2026
                </strong>

            </div>

        </div>

    </div>


    {{-- =========================================================
         DATA KARYAWAN
    ========================================================== --}}

    <div class="card employee-card">

        <div class="employee-title">

            <div class="title-icon">
                👤
            </div>

            <div>

                <h2>
                    Data Karyawan
                </h2>

                <p>
                    Informasi karyawan yang sedang dievaluasi.
                </p>

            </div>

        </div>


        <div class="info-grid">


            <div class="info-item">

                <span class="label">
                    Nama Karyawan
                </span>

                <span class="value">
                    {{ $karyawan->nama }}
                </span>

            </div>


            <div class="info-item">

                <span class="label">
                    NIK
                </span>

                <span class="value">
                    {{ $karyawan->nik }}
                </span>

            </div>


            <div class="info-item">

                <span class="label">
                    Jabatan
                </span>

                <span class="value">
                    {{ $karyawan->jabatan }}
                </span>

            </div>


            <div class="info-item">

                <span class="label">
                    Goals
                </span>

                <span class="value">
                    {{ $goal->nama_goal }}
                </span>

            </div>

        </div>

    </div>


    {{-- =========================================================
         HASIL PENILAIAN
    ========================================================== --}}

    <div class="card">

        <div class="section-title">

            <h2>
                Hasil Penilaian
            </h2>

            <span class="section-badge">
                Evaluasi 360°
            </span>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>
                            Jenis Evaluasi
                        </th>

                        <th>
                            Skor
                        </th>

                        <th>
                            Bobot
                        </th>

                        <th>
                            Nilai
                        </th>

                    </tr>

                </thead>

                <tbody>


                    {{-- PEER REVIEW --}}

                    <tr>

                        <td>
                            <strong>Peer Review</strong>
                        </td>

                        <td class="score">

                            @if($lengkap && isset($skorPeer))

                                {{ number_format($skorPeer, 2, ',', '.') }}/5

                            @elseif($peer)

                                <span class="status-tersedia">
                                    Tersedia
                                </span>

                            @else

                                <span class="status-belum">
                                    -/5
                                </span>

                            @endif

                        </td>

                        <td>
                            <strong>30%</strong>
                        </td>

                        <td>

                            @if($nilaiPeer !== null)

                                <strong>
                                    {{ number_format($nilaiPeer, 2, ',', '.') }}
                                </strong>

                            @else

                                -

                            @endif

                        </td>

                    </tr>


                    {{-- SUPERVISOR REVIEW --}}

                    <tr>

                        <td>
                            <strong>Supervisor Review</strong>
                        </td>

                        <td class="score">

                            @if($lengkap && isset($skorSupervisor))

                                {{ number_format($skorSupervisor, 2, ',', '.') }}/5

                            @elseif($supervisor)

                                <span class="status-tersedia">
                                    Tersedia
                                </span>

                            @else

                                <span class="status-belum">
                                    -/5
                                </span>

                            @endif

                        </td>

                        <td>
                            <strong>70%</strong>
                        </td>

                        <td>

                            @if($nilaiSupervisor !== null)

                                <strong>
                                    {{ number_format($nilaiSupervisor, 2, ',', '.') }}
                                </strong>

                            @else

                                -

                            @endif

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        {{-- WARNING --}}

        @if(!$lengkap)

            <div class="warning">

                <strong>
                    Penilaian belum lengkap
                </strong>

                <br>

                @if(!$peer && !$supervisor)

                    Peer Review dan Supervisor Review belum tersedia.

                @elseif(!$peer)

                    Peer Review belum tersedia.

                @elseif(!$supervisor)

                    Supervisor Review belum tersedia.

                @endif

                <br>

                <small>
                    Skor Evaluasi 360° akan dihitung setelah
                    kedua penilaian tersedia.
                </small>

            </div>

        @endif

    </div>


    {{-- =========================================================
         DETAIL PENILAIAN
    ========================================================== --}}

    @if($lengkap)

    <div class="card">

        <div class="section-title">

            <h2>
                Detail Penilaian
            </h2>

            <span class="section-badge">
                Rincian Skor
            </span>

        </div>


        <div class="detail-grid">


            {{-- PEER REVIEW --}}

            <div class="detail-box peer-box">

                <div class="detail-header">

                    <div class="detail-header-flex">

                        <div>

                            <h3>
                                Peer Review
                            </h3>

                            <p>
                                Penilaian dari rekan kerja
                            </p>

                        </div>

                        <span class="weight-badge">
                            Bobot 30%
                        </span>

                    </div>

                </div>


                <div class="detail-content">


                    <div class="detail-row">

                        <span class="detail-name">
                            Kemahiran untuk Kualitas Layanan
                        </span>

                        <span class="detail-score">
                            {{ number_format($kemahiranPeer ?? 0, 2, ',', '.') }}
                        </span>

                    </div>


                    <div class="detail-row">

                        <span class="detail-name">
                            Kolaborasi Tim
                        </span>

                        <span class="detail-score">
                            {{ number_format($kolaborasiPeer ?? 0, 2, ',', '.') }}
                        </span>

                    </div>


                    <div class="detail-row">

                        <span class="detail-name">
                            Berorientasi pada Kepuasan Pelanggan
                        </span>

                        <span class="detail-score">
                            {{ number_format($kepuasanPeer ?? 0, 2, ',', '.') }}
                        </span>

                    </div>


                    <div class="detail-average">

                        <span>
                            Rata-rata Peer Review
                        </span>

                        <strong>
                            {{ number_format($skorPeer ?? 0, 2, ',', '.') }}/5
                        </strong>

                    </div>

                </div>

            </div>


            {{-- SUPERVISOR REVIEW --}}

            <div class="detail-box supervisor-box">

                <div class="detail-header">

                    <div class="detail-header-flex">

                        <div>

                            <h3>
                                Supervisor Review
                            </h3>

                            <p>
                                Penilaian dari supervisor
                            </p>

                        </div>

                        <span class="weight-badge">
                            Bobot 70%
                        </span>

                    </div>

                </div>


                <div class="detail-content">


                    <div class="detail-row">

                        <span class="detail-name">
                            Skor Kinerja
                        </span>

                        <span class="detail-score">
                            {{ number_format($skorKinerja ?? 0, 2, ',', '.') }}
                        </span>

                    </div>


                    <div class="detail-row">

                        <span class="detail-name">
                            Kemahiran untuk Kualitas Layanan
                        </span>

                        <span class="detail-score">
                            {{ number_format($kemahiranSupervisor ?? 0, 2, ',', '.') }}
                        </span>

                    </div>


                    <div class="detail-row">

                        <span class="detail-name">
                            Kolaborasi Tim
                        </span>

                        <span class="detail-score">
                            {{ number_format($kolaborasiSupervisor ?? 0, 2, ',', '.') }}
                        </span>

                    </div>


                    <div class="detail-row">

                        <span class="detail-name">
                            Berorientasi pada Kepuasan Pelanggan
                        </span>

                        <span class="detail-score">
                            {{ number_format($kepuasanSupervisor ?? 0, 2, ',', '.') }}
                        </span>

                    </div>


                    <div class="detail-average">

                        <span>
                            Rata-rata Perilaku
                        </span>

                        <strong>
                            {{ number_format($avgPerilakuSupervisor ?? 0, 2, ',', '.') }}/5
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

    @endif


    {{-- =========================================================
         HASIL AKHIR 360°
    ========================================================== --}}

    <div class="card result-card">

        <div class="result">

            <div class="result-title">
                Skor Evaluasi 360°
            </div>


            @if($lengkap && $skor360 !== null)

                <div class="result-score">

                    {{ number_format($skor360, 2, ',', '.') }}

                </div>

                <div class="result-max">
                    dari 5
                </div>

                <div class="predikat">

                    <span>
                        Kategori Kinerja:
                    </span>

                    <strong>
                        {{ $kategori ?? '-' }}
                    </strong>

                </div>

            @else

                <div class="result-score">
                    -
                </div>

                <div class="result-max">
                    Menunggu Peer Review dan Supervisor Review
                </div>

            @endif

        </div>


        {{-- RINGKASAN PERHITUNGAN --}}

        @if($lengkap)

            <div class="calculation">

                <h3>
                    Ringkasan Perhitungan
                </h3>


                <div class="formula-row">

                    <span class="formula-name">
                        Peer Review × 30%
                    </span>

                    <span class="formula-value">

                        {{ number_format($skorPeer ?? 0, 2, ',', '.') }}
                        × 30%
                        =
                        {{ number_format($nilaiPeer ?? 0, 2, ',', '.') }}

                    </span>

                </div>


                <div class="formula-row">

                    <span class="formula-name">
                        Supervisor Review × 70%
                    </span>

                    <span class="formula-value">

                        {{ number_format($skorSupervisor ?? 0, 2, ',', '.') }}
                        × 70%
                        =
                        {{ number_format($nilaiSupervisor ?? 0, 2, ',', '.') }}

                    </span>

                </div>


                <div class="formula-row formula-final">

                    <span class="formula-name">
                        Final Score 360°
                    </span>

                    <span class="formula-value">

                        {{ number_format($skor360 ?? 0, 2, ',', '.') }}/5

                    </span>

                </div>

            </div>

        @endif

    </div>


    {{-- =========================================================
         KOMPOSISI PENILAIAN
    ========================================================== --}}

    <div class="card">

        <div class="section-title">

            <h2>
                Komposisi Penilaian
            </h2>

            <span class="section-badge">
                Bobot Evaluasi
            </span>

        </div>


        <div class="composition-grid">


            <div class="composition-box">

                <div class="composition-title">
                    Peer Review
                </div>

                <div class="composition-value">
                    30%
                </div>

            </div>


            <div class="composition-box supervisor">

                <div class="composition-title">
                    Supervisor Review
                </div>

                <div class="composition-value">
                    70%
                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         TOMBOL KEMBALI
    ========================================================== --}}

    <div class="buttons">

        <a
            href="{{ route('evaluasi.index') }}"
            class="btn btn-back"
        >

            <span>
                ←
            </span>

            <span>
                Kembali ke Evaluasi
            </span>

        </a>

    </div>


</div>

</body>

</html>