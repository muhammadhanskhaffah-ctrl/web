<x-app-layout>

    <style>
        .supervisor-container {
            padding: 30px 40px 50px;
            background: #f8fafc;
            min-height: calc(100vh - 80px);
        }

        /* =====================================================
           HEADER HALAMAN
        ===================================================== */

        .supervisor-page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .supervisor-title {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .supervisor-subtitle {
            margin-top: 7px;
            color: #64748b;
            font-size: 14px;
        }

        /* =====================================================
           TOMBOL
        ===================================================== */

        .supervisor-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-kembali {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #334155;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border: 1px solid #e2e8f0;
        }

        .btn-kembali:hover {
            background: #e2e8f0;
        }

        .btn-form {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #16a34a;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-form:hover {
            background: #15803d;
        }

        /* =====================================================
           INFORMASI TOTAL
        ===================================================== */

        .info-card {
            background: white;
            border-radius: 12px;
            padding: 22px 24px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.06);
            border: 1px solid #e2e8f0;
        }

        .info-card-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .info-title {
            margin: 0;
            font-size: 19px;
            font-weight: 700;
            color: #0f172a;
        }

        .info-description {
            margin-top: 6px;
            margin-bottom: 0;
            font-size: 14px;
            color: #64748b;
        }

        .total-box {
            text-align: right;
        }

        .total-label {
            display: block;
            color: #64748b;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .total-number {
            font-size: 28px;
            font-weight: 700;
            color: #16a34a;
        }

        /* =====================================================
           ALERT ERROR
        ===================================================== */

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .alert-error-title {
            font-weight: 700;
            margin-bottom: 4px;
        }

        /* =====================================================
           CARD REVIEW
        ===================================================== */

        .review-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.05);
        }

        .review-card-header {
            background: #f8fafc;
            padding: 18px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .review-number {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .review-date {
            color: #64748b;
            font-size: 13px;
            margin-top: 5px;
        }

        .review-card-body {
            padding: 24px;
        }

        /* =====================================================
           DATA GRID
        ===================================================== */

        .data-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .data-item {
            min-width: 0;
        }

        .data-label {
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 5px;
        }

        .data-value {
            font-size: 15px;
            color: #0f172a;
            line-height: 1.5;
            word-break: break-word;
        }

        /* =====================================================
           DETAIL
        ===================================================== */

        .detail-section {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .detail-title {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .detail-content {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 14px 16px;
            color: #334155;
            font-size: 14px;
            line-height: 1.7;
            white-space: pre-line;
            word-break: break-word;
        }

        /* =====================================================
           KOSONG
        ===================================================== */

        .empty-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 50px 30px;
            text-align: center;
        }

        .empty-title {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
        }

        .empty-text {
            color: #64748b;
            font-size: 14px;
            margin-top: 7px;
            margin-bottom: 20px;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .supervisor-container {
                padding: 25px 20px 40px;
            }

            .supervisor-page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .data-grid {
                grid-template-columns: 1fr;
            }

            .info-card-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .total-box {
                text-align: left;
            }

        }

        @media (max-width: 600px) {

            .supervisor-actions {
                width: 100%;
            }

            .btn-kembali,
            .btn-form {
                width: 100%;
            }

        }
    </style>


    <div class="supervisor-container">

        {{-- =====================================================
             HEADER HALAMAN
        ===================================================== --}}

        <div class="supervisor-page-header">

            <div>

                <h1 class="supervisor-title">
                    Supervisor Review
                </h1>

                <p class="supervisor-subtitle">
                    Data hasil Supervisor Review dari Google Forms
                </p>

            </div>


            {{-- TOMBOL AKSI --}}

            <div class="supervisor-actions">

                {{-- KEMBALI KE EVALUASI --}}

                <a
                    href="{{ route('evaluasi.index') }}"
                    class="btn-kembali"
                >
                    ← Kembali
                </a>


                {{-- BUKA GOOGLE FORM --}}

                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSdVDBg589GX591m8orhAj_o5TPFxkKFI1ieZM1LYwXKXD3F_w/viewform?usp=dialog"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-form"
                >
                    📝 Isi Supervisor Review
                </a>

            </div>

        </div>


        {{-- =====================================================
             PESAN ERROR
        ===================================================== --}}

        @if(!$success)

            <div class="alert-error">

                <div class="alert-error-title">
                    Data tidak dapat dimuat
                </div>

                <div>
                    {{ $message }}
                </div>

            </div>

        @endif


        {{-- =====================================================
             INFORMASI DATA
        ===================================================== --}}

        @if($success)

            <div class="info-card">

                <div class="info-card-content">

                    <div>

                        <h2 class="info-title">
                            Data Supervisor Review
                        </h2>

                        <p class="info-description">
                            Data diambil langsung dari Google Sheets.
                        </p>

                    </div>


                    <div class="total-box">

                        <span class="total-label">
                            Total Review
                        </span>

                        <span class="total-number">
                            {{ $total }}
                        </span>

                    </div>

                </div>

            </div>

        @endif


        {{-- =====================================================
             DATA SUPERVISOR REVIEW
        ===================================================== --}}

        @if($success && count($data) > 0)

            @foreach($data as $index => $row)

                <div class="review-card">

                    {{-- HEADER CARD --}}

                    <div class="review-card-header">

                        <h3 class="review-number">
                            Supervisor Review #{{ $index + 1 }}
                        </h3>

                        <div class="review-date">
                            {{ $row['Timestamp'] ?? '-' }}
                        </div>

                    </div>


                    {{-- BODY CARD --}}

                    <div class="review-card-body">


                        {{-- =================================================
                             DATA UTAMA
                        ================================================== --}}

                        <div class="data-grid">


                            {{-- NAMA SUPERVISOR --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Nama Supervisor
                                </div>

                                <div class="data-value">
                                    {{ $row['NAMA LENGKAP ANDA'] ?? '-' }}
                                </div>

                            </div>


                            {{-- POSISI --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Posisi
                                </div>

                                <div class="data-value">
                                    {{ $row["POSISI ANDA\n(Jika Anda bertugas di beberapa posisi sekaligus, silakan tuliskan semuanya)"] ?? '-' }}
                                </div>

                            </div>


                            {{-- NAMA ANGGOTA TIM --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Nama Anggota Tim
                                </div>

                                <div class="data-value">
                                    {{ $row['NAMA LENGKAP ANGGOTA TIM'] ?? '-' }}
                                </div>

                            </div>


                            {{-- LOKASI --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Lokasi Kerja Tim
                                </div>

                                <div class="data-value">
                                    {{ $row['LOKASI KERJA TIM'] ?? '-' }}
                                </div>

                            </div>


                            {{-- PERIODE --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Periode Review
                                </div>

                                <div class="data-value">
                                    {{ $row['PERIODE REVIEW'] ?? '-' }}
                                </div>

                            </div>


                            {{-- SKOR KINERJA --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Skor Kinerja
                                </div>

                                <div class="data-value">
                                    {{ $row['SKOR KINERJA'] ?? '-' }}
                                </div>

                            </div>


                            {{-- SKOR PERILAKU --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Skor Perilaku
                                </div>

                                <div class="data-value">
                                    {{ $row['SKOR PERILAKU'] ?? '-' }}
                                </div>

                            </div>


                            {{-- KEMAHIRAN --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Kemahiran untuk Kualitas Layanan
                                </div>

                                <div class="data-value">
                                    {{ $row['1. KEMAHIRAN UNTUK KUALITAS LAYANAN'] ?? '-' }}
                                </div>

                            </div>


                            {{-- KOLABORASI --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Kolaborasi Tim
                                </div>

                                <div class="data-value">
                                    {{ $row['2. KOLABORASI TIM'] ?? '-' }}
                                </div>

                            </div>


                            {{-- KEPUASAN PELANGGAN --}}

                            <div class="data-item">

                                <div class="data-label">
                                    Berorientasi pada Kepuasan Pelanggan
                                </div>

                                <div class="data-value">
                                    {{ $row['3. BERORIENTASI PADA KEPUASAN PELANGGAN'] ?? '-' }}
                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                             JUSTIFIKASI KINERJA
                        ================================================== --}}

                        <div class="detail-section">

                            <div class="detail-title">
                                Justifikasi Kinerja
                            </div>

                            <div class="detail-content">

                                {{ $row["JUSTIFIKASI\n(tuliskan penjelasan terkait skor kinerja diatas dan masukkan tautan dokumen yang menunjukkan pencapaian kinerja tim Anda)"] ?? '-' }}

                            </div>

                        </div>


                        {{-- =================================================
                             JUSTIFIKASI PERILAKU
                        ================================================== --}}

                        <div class="detail-section">

                            <div class="detail-title">
                                Justifikasi Perilaku
                            </div>

                            <div class="detail-content">

                                {{ $row['JUSTIFIKASI'] ?? '-' }}

                            </div>

                        </div>


                        {{-- =================================================
                             PENJELASAN KEMAHIRAN
                        ================================================== --}}

                        <div class="detail-section">

                            <div class="detail-title">
                                Penjelasan Kemahiran untuk Kualitas Layanan
                            </div>

                            <div class="detail-content">

                                {{ $row["PENJELASAN TERKAIT KEMAHIRAN UNTUK KUALITAS LAYANAN YANG TIM ANDA TUNJUKKAN\n"] ?? '-' }}

                            </div>

                        </div>


                        {{-- =================================================
                             PENJELASAN KOLABORASI
                        ================================================== --}}

                        <div class="detail-section">

                            <div class="detail-title">
                                Penjelasan Kolaborasi Tim
                            </div>

                            <div class="detail-content">

                                {{ $row['PENJELASAN TERKAIT PERILAKU KOLABORASI TIM YANG TIM ANDA TUNJUKKAN'] ?? '-' }}

                            </div>

                        </div>


                        {{-- =================================================
                             PENJELASAN KEPUASAN PELANGGAN
                        ================================================== --}}

                        <div class="detail-section">

                            <div class="detail-title">
                                Penjelasan Kepuasan Pelanggan
                            </div>

                            <div class="detail-content">

                                {{ $row['PENJELASAN TERKAIT PERILAKU BERORIENTASI PADA KEPUASAN PELANGGAN YANG TIM ANDA TUNJUKKAN'] ?? '-' }}

                            </div>

                        </div>


                        {{-- =================================================
                             REKOMENDASI
                        ================================================== --}}

                        <div class="detail-section">

                            <div class="detail-title">
                                Rekomendasi Pengembangan
                            </div>

                            <div class="detail-content">

                                {{ $row["D. REKOMENDASI\n\n(Diisi oleh atasan langsung sesuai kebutuhan pengembangan anggota tim)"] ?? '-' }}

                            </div>

                        </div>


                    </div>

                </div>

            @endforeach


        @elseif($success)

            {{-- =====================================================
                 BELUM ADA DATA
            ===================================================== --}}

            <div class="empty-card">

                <div class="empty-title">
                    Belum ada data Supervisor Review
                </div>

                <div class="empty-text">
                    Belum ada respon yang masuk dari Google Forms.
                </div>

                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSdVDBg589GX591m8orhAj_o5TPFxkKFI1ieZM1LYwXKXD3F_w/viewform?usp=dialog"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-form"
                >
                    📝 Isi Supervisor Review
                </a>

            </div>

        @endif

    </div>

</x-app-layout>