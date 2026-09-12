<x-app-layout>

    <style>
        .self-review-container {
            padding: 40px;
            background: #f8fafc;
            min-height: calc(100vh - 80px);
        }

        .self-review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .self-review-title {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .self-review-subtitle {
            margin-top: 8px;
            color: #64748b;
            font-size: 14px;
        }

        /* =====================================================
           TOMBOL HEADER
        ===================================================== */

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-isi-review {
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-isi-review:hover {
            background: #1d4ed8;
        }

        .btn-kembali {
            background: #64748b;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-kembali:hover {
            background: #475569;
        }

        /* =====================================================
           STATISTIK
        ===================================================== */

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.06);
        }

        .stat-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .stat-label {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .stat-number {
            color: #0f172a;
            font-size: 28px;
            font-weight: 700;
        }

        /* =====================================================
           CARD DATA
        ===================================================== */

        .data-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.06);
        }

        .data-card-header {
            padding: 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .data-card-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
        }

        .data-card-header p {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {
            overflow-x: auto;
        }

        .self-review-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .self-review-table th {
            background: #eff6ff;
            color: #1e3a8a;
            padding: 15px;
            text-align: left;
            font-size: 13px;
            white-space: nowrap;
        }

        .self-review-table td {
            padding: 15px;
            border-top: 1px solid #e2e8f0;
            color: #334155;
            font-size: 14px;
            vertical-align: top;
        }

        .self-review-table tbody tr:hover {
            background: #f8fafc;
        }

        .nama-karyawan {
            font-weight: 600;
            color: #0f172a;
        }

        .nik-text {
            color: #64748b;
            font-size: 12px;
            margin-top: 3px;
        }

        .periode-badge {
            display: inline-block;
            padding: 6px 10px;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .dokumen-link {
            display: inline-block;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .dokumen-link:hover {
            text-decoration: underline;
        }

        .text-muted {
            color: #94a3b8;
        }

        /* =====================================================
           ERROR
        ===================================================== */

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 16px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #fecaca;
        }

        /* =====================================================
           KOSONG
        ===================================================== */

        .kosong {
            text-align: center;
            padding: 50px 20px;
            color: #64748b;
        }

        .kosong-icon {
            font-size: 45px;
            margin-bottom: 12px;
        }

        .kosong h3 {
            margin: 0 0 8px;
            color: #334155;
        }

        .kosong p {
            margin: 0;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .self-review-container {
                padding: 20px;
            }

            .self-review-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-actions {
                width: 100%;
                flex-direction: column;
                align-items: stretch;
            }

            .btn-isi-review,
            .btn-kembali {
                text-align: center;
            }

            .self-review-title {
                font-size: 24px;
            }

        }
    </style>


    <div class="self-review-container">

        {{-- =====================================================
             HEADER
        ===================================================== --}}

        <div class="self-review-header">

            <div>

                <h1 class="self-review-title">
                    Self Review
                </h1>

                <p class="self-review-subtitle">
                    Data penilaian Self Review dari Google Forms.
                </p>

            </div>


            <div class="header-actions">

                {{-- =================================================
                     TOMBOL ISI SELF REVIEW
                ================================================== --}}

                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSfnzH0CQJg0YlgtwNpfvsYBuApUHhjPyVy7x_C2XdmzcZFmzQ/viewform?usp=dialog"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-isi-review"
                >
                    📝 Isi Self Review
                </a>


                {{-- =================================================
                     TOMBOL KEMBALI
                ================================================== --}}

                <a
                    href="{{ route('evaluasi.index') }}"
                    class="btn-kembali"
                >
                    ← Kembali ke Evaluasi
                </a>

            </div>

        </div>


        {{-- =====================================================
             ERROR
        ===================================================== --}}

        @if(isset($success) && !$success)

            <div class="alert-error">

                <strong>
                    Gagal mengambil data Self Review
                </strong>

                <br>

                {{ $message ?? 'Terjadi kesalahan saat mengambil data.' }}

            </div>

        @endif


        {{-- =====================================================
             DATA BERHASIL
        ===================================================== --}}

        @if(isset($success) && $success)


            {{-- =================================================
                 TOTAL DATA
            ================================================== --}}

            <div class="stat-card">

                <div class="stat-content">

                    <div class="stat-icon">
                        📝
                    </div>

                    <div>

                        <div class="stat-label">
                            Total Self Review
                        </div>

                        <div class="stat-number">
                            {{ $total }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 DATA SELF REVIEW
            ================================================== --}}

            <div class="data-card">


                <div class="data-card-header">

                    <h2>
                        Data Self Review
                    </h2>

                    <p>
                        Data diambil secara langsung dari Google Sheets.
                    </p>

                </div>


                @if(count($data) > 0)


                    <div class="table-wrapper">

                        <table class="self-review-table">

                            <thead>

                                <tr>

                                    <th>
                                        No
                                    </th>

                                    <th>
                                        Timestamp
                                    </th>

                                    <th>
                                        Nama Lengkap
                                    </th>

                                    <th>
                                        Posisi
                                    </th>

                                    <th>
                                        Nama Atasan Langsung
                                    </th>

                                    <th>
                                        Lokasi Kerja
                                    </th>

                                    <th>
                                        Periode Review
                                    </th>

                                    <th>
                                        Dokumen Pencapaian
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($data as $index => $item)

                                    <tr>

                                        {{-- NO --}}

                                        <td>
                                            {{ $index + 1 }}
                                        </td>


                                        {{-- TIMESTAMP --}}

                                        <td>
                                            {{ $item['Timestamp'] ?? '-' }}
                                        </td>


                                        {{-- NAMA --}}

                                        <td>

                                            <div class="nama-karyawan">

                                                {{ $item['NAMA LENGKAP'] ?? '-' }}

                                            </div>

                                        </td>


                                        {{-- POSISI --}}

                                        <td>

                                            {{ $item['POSISI'] ?? '-' }}

                                        </td>


                                        {{-- ATASAN --}}

                                        <td>

                                            {{ $item['NAMA ATASAN LANGSUNG'] ?? '-' }}

                                        </td>


                                        {{-- LOKASI --}}

                                        <td>

                                            {{ $item['LOKASI KERJA'] ?? '-' }}

                                        </td>


                                        {{-- PERIODE --}}

                                        <td>

                                            @if(!empty($item['PERIODE REVIEW']))

                                                <span class="periode-badge">

                                                    {{ $item['PERIODE REVIEW'] }}

                                                </span>

                                            @else

                                                <span class="text-muted">
                                                    -
                                                </span>

                                            @endif

                                        </td>


                                        {{-- DOKUMEN --}}

                                        <td>

                                            @php

                                                $dokumen = $item['Tautan dokumen terkait pencapaian kerja:']
                                                    ?? null;

                                            @endphp


                                            @if($dokumen)

                                                <a
                                                    href="{{ $dokumen }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="dokumen-link"
                                                >
                                                    📎 Lihat Dokumen
                                                </a>

                                            @else

                                                <span class="text-muted">
                                                    -
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                @else


                    <div class="kosong">

                        <div class="kosong-icon">
                            📭
                        </div>

                        <h3>
                            Belum ada data Self Review
                        </h3>

                        <p>
                            Belum terdapat respons dari Google Forms.
                        </p>

                    </div>


                @endif


            </div>

        @endif

    </div>

</x-app-layout>