<x-app-layout>

    <style>
        .peer-review-container {
            padding: 40px;
            background: #f8fafc;
            min-height: calc(100vh - 80px);
        }

        .peer-review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .peer-review-title {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .peer-review-subtitle {
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
            background: #f59e0b;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-isi-review:hover {
            background: #d97706;
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
            background: #fef3c7;
            color: #d97706;
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

        .peer-review-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px;
        }

        .peer-review-table th {
            background: #fff7ed;
            color: #9a3412;
            padding: 15px;
            text-align: left;
            font-size: 13px;
            white-space: nowrap;
        }

        .peer-review-table td {
            padding: 15px;
            border-top: 1px solid #e2e8f0;
            color: #334155;
            font-size: 14px;
            vertical-align: top;
        }

        .peer-review-table tbody tr:hover {
            background: #fffaf5;
        }

        .nama-karyawan {
            font-weight: 600;
            color: #0f172a;
        }

        .periode-badge {
            display: inline-block;
            padding: 6px 10px;
            background: #fef3c7;
            color: #b45309;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .text-muted {
            color: #94a3b8;
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

        /* =====================================================
           ALERT ERROR
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

            .peer-review-container {
                padding: 20px;
            }

            .peer-review-header {
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

            .peer-review-title {
                font-size: 24px;
            }

        }
    </style>


    <div class="peer-review-container">


        {{-- =====================================================
             HEADER
        ===================================================== --}}

        <div class="peer-review-header">

            <div>

                <h1 class="peer-review-title">
                    Peer Review
                </h1>

                <p class="peer-review-subtitle">
                    Data penilaian Peer Review dari Google Forms.
                </p>

            </div>


            <div class="header-actions">

                {{-- =================================================
                     TOMBOL ISI PEER REVIEW
                ================================================== --}}

                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSdaBQ_bpXtqr6XQ79SRSnhfcl_P3Ldue-x36YA5mqV1enftFg/viewform?usp=dialog"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-isi-review"
                >
                    📝 Isi Peer Review
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
                    Gagal mengambil data Peer Review
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
                        👥
                    </div>

                    <div>

                        <div class="stat-label">
                            Total Peer Review
                        </div>

                        <div class="stat-number">
                            {{ $total }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 DATA PEER REVIEW
            ================================================== --}}

            <div class="data-card">


                <div class="data-card-header">

                    <h2>
                        Data Peer Review
                    </h2>

                    <p>
                        Data diambil secara langsung dari Google Sheets.
                    </p>

                </div>


                @if(count($data) > 0)


                    <div class="table-wrapper">

                        <table class="peer-review-table">

                            <thead>

                                <tr>

                                    <th>
                                        No
                                    </th>

                                    <th>
                                        Timestamp
                                    </th>

                                    <th>
                                        Nama Penilai
                                    </th>

                                    <th>
                                        Posisi Penilai
                                    </th>

                                    <th>
                                        Nama Rekan Kerja
                                    </th>

                                    <th>
                                        Periode Review
                                    </th>

                                    <th>
                                        Kemahiran Kualitas Layanan
                                    </th>

                                    <th>
                                        Kolaborasi Tim
                                    </th>

                                    <th>
                                        Orientasi Kepuasan Pelanggan
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($data as $index => $item)

                                    <tr>

                                        {{-- =================================================
                                             NO
                                        ================================================== --}}

                                        <td>
                                            {{ $index + 1 }}
                                        </td>


                                        {{-- =================================================
                                             TIMESTAMP
                                        ================================================== --}}

                                        <td>
                                            {{ $item['Timestamp'] ?? '-' }}
                                        </td>


                                        {{-- =================================================
                                             NAMA PENILAI
                                        ================================================== --}}

                                        <td>

                                            <div class="nama-karyawan">

                                                {{ $item['NAMA LENGKAP ANDA'] ?? '-' }}

                                            </div>

                                        </td>


                                        {{-- =================================================
                                             POSISI PENILAI
                                        ================================================== --}}

                                        <td>

                                            {{ $item['POSISI ANDA'] ?? '-' }}

                                        </td>


                                        {{-- =================================================
                                             NAMA REKAN KERJA
                                        ================================================== --}}

                                        <td>

                                            <div class="nama-karyawan">

                                                {{ $item['TULISKAN NAMA LENGKAP REKAN KERJA YANG AKAN ANDA NILAI'] ?? '-' }}

                                            </div>

                                        </td>


                                        {{-- =================================================
                                             PERIODE REVIEW
                                        ================================================== --}}

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


                                        {{-- =================================================
                                             KEMAHIRAN KUALITAS LAYANAN
                                        ================================================== --}}

                                        <td>

                                            {{ $item['1. KEMAHIRAN UNTUK KUALITAS LAYANAN'] ?? '-' }}

                                        </td>


                                        {{-- =================================================
                                             KOLABORASI TIM
                                        ================================================== --}}

                                        <td>

                                            {{ $item['2. KOLABORASI TIM'] ?? '-' }}

                                        </td>


                                        {{-- =================================================
                                             KEPUASAN PELANGGAN
                                        ================================================== --}}

                                        <td>

                                            {{ $item['3. BERORIENTASI PADA KEPUASAN PELANGGAN'] ?? '-' }}

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
                            Belum ada data Peer Review
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