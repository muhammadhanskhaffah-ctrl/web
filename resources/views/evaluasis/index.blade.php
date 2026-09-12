<x-app-layout>

    <style>
        /* =====================================================
           EVALUASI - PROFESSIONAL DESIGN
        ===================================================== */

        .evaluasi-container {
            padding: 38px 40px;
            background: #f4f7fb;
            min-height: calc(100vh - 80px);
        }

        /* =====================================================
           HEADER
        ===================================================== */

        .evaluasi-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            gap: 20px;
        }

        .evaluasi-title {
            margin: 0;
            font-size: 30px;
            line-height: 1.2;
            font-weight: 750;
            color: #0b2a4a;
            letter-spacing: -0.5px;
        }

        .evaluasi-subtitle {
            margin: 8px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #0f3b66;
            color: white;
            padding: 12px 20px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 650;
            box-shadow: 0 5px 12px rgba(15, 59, 102, 0.20);
            transition: 0.2s ease;
            white-space: nowrap;
        }

        .btn-tambah:hover {
            background: #092d4f;
            transform: translateY(-1px);
            box-shadow: 0 7px 16px rgba(15, 59, 102, 0.25);
        }

        /* =====================================================
           STATISTIK EVALUASI
        ===================================================== */

        .evaluasi-stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .evaluasi-stat {
            position: relative;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 21px;
            min-height: 105px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.045);
        }

        .evaluasi-stat::after {
            content: "";
            position: absolute;
            width: 85px;
            height: 85px;
            border-radius: 50%;
            right: -25px;
            top: -28px;
            opacity: 0.65;
        }

        .stat-blue {
            border-top: 3px solid #0f3b66;
        }

        .stat-blue::after {
            background: #dbeafe;
        }

        .stat-purple {
            border-top: 3px solid #0f3b66;
        }

        .stat-purple::after {
            background: #dbeafe;
        }

        .stat-orange {
            border-top: 3px solid #0f3b66;
        }

        .stat-orange::after {
            background: #dbeafe;
        }

        .stat-green {
            border-top: 3px solid #0f3b66;
        }

        .stat-green::after {
            background: #dbeafe;
        }

        .stat-content {
            position: relative;
            z-index: 2;
        }

        .stat-label {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 750;
            color: #0f3b66;
        }

        .stat-blue .stat-number {
            color: #0f3b66;
        }

        .stat-purple .stat-number {
            color: #0f3b66;
        }

        .stat-orange .stat-number {
            color: #0f3b66;
        }

        .stat-green .stat-number {
            color: #0f3b66;
        }

        /* =====================================================
           GOOGLE FORM SECTION
        ===================================================== */

        .google-form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 28px;
            box-shadow: 0 5px 16px rgba(15, 23, 42, 0.05);
        }

        .google-form-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 21px;
            gap: 20px;
        }

        .section-title {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
        }

        .section-subtitle {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .section-badge {
            background: #eff6ff;
            color: #0f3b66;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 650;
            white-space: nowrap;
        }

        .google-form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .google-form-item {
            position: relative;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            padding: 22px;
            transition: 0.2s ease;
        }

        .google-form-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.07);
            border-color: #cbd5e1;
        }

        .google-form-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .icon-self {
            background: #dbeafe;
        }

        .icon-peer {
            background: #dbeafe;
        }

        .icon-supervisor {
            background: #dbeafe;
        }

        .google-form-item h3 {
            margin: 0 0 7px;
            font-size: 18px;
            color: #0f172a;
        }

        .google-form-item p {
            margin: 0 0 20px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.65;
            min-height: 64px;
        }

        .form-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 13px;
            font-size: 11px;
            font-weight: 650;
            padding: 5px 9px;
            border-radius: 20px;
        }

        .status-blue {
            background: #eff6ff;
            color: #0f3b66;
        }

        .status-orange {
            background: #eff6ff;
            color: #0f3b66;
        }

        .status-green {
            background: #eff6ff;
            color: #0f3b66;
        }

        .btn-google-form {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 11px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 650;
            box-sizing: border-box;
            transition: 0.2s ease;
        }

        .btn-self {
            background: #0f3b66;
            color: white;
        }

        .btn-self:hover {
            background: #092d4f;
        }

        .btn-peer {
            background: #0f3b66;
            color: white;
        }

        .btn-peer:hover {
            background: #092d4f;
        }

        .btn-supervisor {
            background: #0f3b66;
            color: white;
        }

        .btn-supervisor:hover {
            background: #092d4f;
        }

        /* =====================================================
           DAFTAR EVALUASI
        ===================================================== */

        .evaluasi-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 16px rgba(15, 23, 42, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 23px 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header-left h2 {
            margin: 0;
            font-size: 20px;
            color: #0f172a;
        }

        .card-header-left p {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .jumlah-evaluasi {
            background: #eff6ff;
            color: #0f3b66;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 650;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .evaluasi-table {
            width: 100%;
            border-collapse: collapse;
        }

        .evaluasi-table th {
            background: #f8fafc;
            color: #0f3b66;
            padding: 14px 15px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .evaluasi-table td {
            padding: 16px 15px;
            border-bottom: 1px solid #eef2f7;
            color: #334155;
            font-size: 13px;
            vertical-align: middle;
        }

        .evaluasi-table tbody tr:hover {
            background: #f8fafc;
        }

        .nomor {
            color: #64748b;
            font-weight: 600;
        }

        .nama-karyawan {
            font-weight: 650;
            color: #0f172a;
            margin-bottom: 3px;
        }

        .nik-karyawan {
            color: #94a3b8;
            font-size: 11px;
        }

        .goal-name {
            color: #334155;
            font-weight: 550;
        }

        /* =====================================================
           BADGE JENIS
        ===================================================== */

        .jenis-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 650;
            white-space: nowrap;
        }

        .self {
            background: #dbeafe;
            color: #0f3b66;
        }

        .peer {
            background: #dbeafe;
            color: #0f3b66;
        }

        .supervisor {
            background: #dbeafe;
            color: #0f3b66;
        }

        /* =====================================================
           SKOR
        ===================================================== */

        .skor {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #eff6ff;
            color: #0f3b66;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 700;
        }

        /* =====================================================
           AKSI
        ===================================================== */

        .aksi-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            min-width: 250px;
        }

        .btn-detail,
        .btn-edit,
        .btn-360,
        .btn-hapus {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 10px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 650;
            transition: 0.15s ease;
            box-sizing: border-box;
        }

        .btn-detail {
            background: #f1f5f9;
            color: #334155;
        }

        .btn-detail:hover {
            background: #e2e8f0;
        }

        .btn-edit {
            background: #eff6ff;
            color: #0f3b66;
        }

        .btn-edit:hover {
            background: #dbeafe;
        }

        .btn-360 {
            background: #eff6ff;
            color: #0f3b66;
        }

        .btn-360:hover {
            background: #dbeafe;
        }

        .btn-hapus {
            border: none;
            background: #fef2f2;
            color: #dc2626;
            cursor: pointer;
        }

        .btn-hapus:hover {
            background: #fee2e2;
        }

        /* =====================================================
           ALERT
        ===================================================== */

        .alert-success {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ecfdf5;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 13px 17px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 550;
        }

        .alert-icon {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dcfce7;
            border-radius: 50%;
        }

        /* =====================================================
           KOSONG
        ===================================================== */

        .kosong {
            text-align: center;
            padding: 55px 30px !important;
            color: #64748b;
        }

        .kosong-icon {
            font-size: 35px;
            margin-bottom: 10px;
            opacity: 0.7;
        }

        .kosong-title {
            color: #334155;
            font-size: 15px;
            font-weight: 650;
            margin-bottom: 4px;
        }

        .kosong-text {
            color: #94a3b8;
            font-size: 13px;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1100px) {

            .evaluasi-stat-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .google-form-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 768px) {

            .evaluasi-container {
                padding: 22px 18px;
            }

            .evaluasi-header {
                flex-direction: column;
            }

            .btn-tambah {
                width: 100%;
            }

            .evaluasi-stat-grid {
                grid-template-columns: 1fr;
            }

            .google-form-card {
                padding: 18px;
            }

            .google-form-header {
                flex-direction: column;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

        }
    </style>


    <div class="evaluasi-container">

        {{-- =====================================================
             HEADER
        ===================================================== --}}

        <div class="evaluasi-header">

            <div>
                <h1 class="evaluasi-title">
                    Evaluasi Kinerja
                </h1>

                <p class="evaluasi-subtitle">
                    Kelola proses penilaian dan evaluasi kinerja karyawan.
                </p>
            </div>

            <a
                href="{{ route('evaluasi.create') }}"
                class="btn-tambah"
            >
                ＋ Tambah Evaluasi
            </a>

        </div>


        {{-- =====================================================
             STATISTIK
        ===================================================== --}}

        @php

            $totalEvaluasi = $evaluasis->count();

            $totalSelf = $evaluasis->where('jenis_evaluasi', 'self')->count();

            $totalPeer = $evaluasis->where('jenis_evaluasi', 'peer')->count();

            $totalSupervisor = $evaluasis->where('jenis_evaluasi', 'supervisor')->count();

        @endphp


        <div class="evaluasi-stat-grid">

            <div class="evaluasi-stat stat-blue">

                <div class="stat-content">

                    <div class="stat-label">
                        Total Evaluasi
                    </div>

                    <div class="stat-number">
                        {{ $totalEvaluasi }}
                    </div>

                </div>

            </div>


            <div class="evaluasi-stat stat-purple">

                <div class="stat-content">

                    <div class="stat-label">
                        Self Review
                    </div>

                    <div class="stat-number">
                        {{ $totalSelf }}
                    </div>

                </div>

            </div>


            <div class="evaluasi-stat stat-orange">

                <div class="stat-content">

                    <div class="stat-label">
                        Peer Review
                    </div>

                    <div class="stat-number">
                        {{ $totalPeer }}
                    </div>

                </div>

            </div>


            <div class="evaluasi-stat stat-green">

                <div class="stat-content">

                    <div class="stat-label">
                        Supervisor Review
                    </div>

                    <div class="stat-number">
                        {{ $totalSupervisor }}
                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             ALERT SUCCESS
        ===================================================== --}}

        @if(session('success'))

            <div class="alert-success">

                <div class="alert-icon">
                    ✓
                </div>

                {{ session('success') }}

            </div>

        @endif


        {{-- =====================================================
             FORM EVALUASI
        ===================================================== --}}

        <div class="google-form-card">

            <div class="google-form-header">

                <div>

                    <h2 class="section-title">
                        Form Evaluasi Kinerja
                    </h2>

                    <p class="section-subtitle">
                        Pilih jenis penilaian yang ingin dilakukan.
                    </p>

                </div>

                <div class="section-badge">
                    3 Jenis Penilaian
                </div>

            </div>


            <div class="google-form-grid">


                {{-- =================================================
                     SELF REVIEW
                ================================================== --}}

                <div class="google-form-item">

                    <div class="google-form-icon icon-self">
                        👤
                    </div>

                    <h3>
                        Self Review
                    </h3>

                    <p>
                        Penilaian yang dilakukan oleh karyawan
                        terhadap kinerja dirinya sendiri.
                    </p>

                    <div class="form-status status-blue">
                        ● Penilaian Mandiri
                    </div>

                    <a
                        href="{{ route('evaluasi.selfReview') }}"
                        class="btn-google-form btn-self"
                    >
                        📊 Lihat Self Review
                    </a>

                </div>


                {{-- =================================================
                     PEER REVIEW
                ================================================== --}}

                <div class="google-form-item">

                    <div class="google-form-icon icon-peer">
                        👥
                    </div>

                    <h3>
                        Peer Review
                    </h3>

                    <p>
                        Penilaian yang dilakukan oleh rekan kerja
                        terhadap kinerja karyawan.
                    </p>

                    <div class="form-status status-orange">
                        ● Penilaian Rekan Kerja
                    </div>

                    <a
                        href="{{ route('evaluasi.peerReview') }}"
                        class="btn-google-form btn-peer"
                    >
                        📊 Lihat Peer Review
                    </a>

                </div>


                {{-- =================================================
                     SUPERVISOR REVIEW
                ================================================== --}}

                <div class="google-form-item">

                    <div class="google-form-icon icon-supervisor">
                        👔
                    </div>

                    <h3>
                        Supervisor Review
                    </h3>

                    <p>
                        Penilaian yang dilakukan oleh supervisor
                        atau pimpinan terhadap anggota tim.
                    </p>

                    <div class="form-status status-green">
                        ● Penilaian Supervisor
                    </div>

                    <a
                        href="{{ route('evaluasi.supervisorReview') }}"
                        class="btn-google-form btn-supervisor"
                    >
                        📊 Lihat Supervisor Review
                    </a>

                </div>


            </div>

        </div>


        {{-- =====================================================
             DAFTAR EVALUASI
        ===================================================== --}}

        <div class="evaluasi-card">

            <div class="card-header">

                <div class="card-header-left">

                    <h2>
                        Daftar Evaluasi
                    </h2>

                    <p>
                        Data evaluasi kinerja karyawan yang tersimpan dalam sistem.
                    </p>

                </div>

                <div class="jumlah-evaluasi">
                    {{ $totalEvaluasi }} Evaluasi
                </div>

            </div>


            <div class="table-wrapper">

                <table class="evaluasi-table">

                    <thead>

                        <tr>

                            <th>
                                NO
                            </th>

                            <th>
                                KARYAWAN
                            </th>

                            <th>
                                GOALS
                            </th>

                            <th>
                                JENIS EVALUASI
                            </th>

                            <th>
                                SKOR
                            </th>

                            <th>
                                TANGGAL
                            </th>

                            <th>
                                AKSI
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($evaluasis as $evaluasi)

                            <tr>

                                {{-- NO --}}

                                <td>

                                    <span class="nomor">
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                {{-- KARYAWAN --}}

                                <td>

                                    <div class="nama-karyawan">

                                        {{ $evaluasi->karyawan->nama ?? '-' }}

                                    </div>

                                    <div class="nik-karyawan">

                                        NIK:
                                        {{ $evaluasi->karyawan->nik ?? '-' }}

                                    </div>

                                </td>


                                {{-- GOALS --}}

                                <td>

                                    <div class="goal-name">

                                        {{ $evaluasi->goal->nama_goal ?? '-' }}

                                    </div>

                                </td>


                                {{-- JENIS EVALUASI --}}

                                <td>

                                    <span
                                        class="jenis-badge {{ $evaluasi->jenis_evaluasi }}"
                                    >

                                        @if($evaluasi->jenis_evaluasi === 'self')

                                            Self Review

                                        @elseif($evaluasi->jenis_evaluasi === 'peer')

                                            Peer Review

                                        @else

                                            Supervisor Review

                                        @endif

                                    </span>

                                </td>


                                {{-- SKOR --}}

                                <td>

                                    <span class="skor">

                                        ★ {{ number_format($evaluasi->skor, 2) }}/5

                                    </span>

                                </td>


                                {{-- TANGGAL --}}

                                <td>

                                    {{ $evaluasi->tanggal_evaluasi?->format('d/m/Y') ?? '-' }}

                                </td>


                                {{-- AKSI --}}

                                <td>

                                    <div class="aksi-wrapper">


                                        {{-- DETAIL --}}

                                        <a
                                            href="{{ route('evaluasi.show', $evaluasi->id) }}"
                                            class="btn-detail"
                                        >
                                            👁 Detail
                                        </a>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('evaluasi.edit', $evaluasi->id) }}"
                                            class="btn-edit"
                                        >
                                            ✎ Edit
                                        </a>


                                        @php

                                            $adaPeer = $evaluasis->contains(
                                                function ($item) use ($evaluasi) {

                                                    return
                                                        $item->karyawan_id == $evaluasi->karyawan_id
                                                        &&
                                                        $item->goal_id == $evaluasi->goal_id
                                                        &&
                                                        $item->jenis_evaluasi === 'peer';

                                                }
                                            );


                                            $adaSupervisor = $evaluasis->contains(
                                                function ($item) use ($evaluasi) {

                                                    return
                                                        $item->karyawan_id == $evaluasi->karyawan_id
                                                        &&
                                                        $item->goal_id == $evaluasi->goal_id
                                                        &&
                                                        $item->jenis_evaluasi === 'supervisor';

                                                }
                                            );

                                        @endphp


                                        {{-- HASIL 360 --}}

                                        @if(
                                            $evaluasi->jenis_evaluasi === 'supervisor'
                                            &&
                                            $adaPeer
                                            &&
                                            $adaSupervisor
                                        )

                                            <a
                                                href="{{ route(
                                                    'evaluasi.hasil360',
                                                    [
                                                        'karyawanId' => $evaluasi->karyawan_id,
                                                        'goalId' => $evaluasi->goal_id
                                                    ]
                                                ) }}"
                                                class="btn-360"
                                            >
                                                360° Hasil
                                            </a>

                                        @endif


                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('evaluasi.destroy', $evaluasi->id) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus evaluasi ini?')"
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

                            <tr>

                                <td
                                    colspan="7"
                                    class="kosong"
                                >

                                    <div class="kosong-icon">
                                        📋
                                    </div>

                                    <div class="kosong-title">
                                        Belum ada data evaluasi
                                    </div>

                                    <div class="kosong-text">
                                        Data evaluasi karyawan akan tampil di sini.
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