<x-app-layout>

    {{-- ============================================================
        DATA GOAL + KPI
    ============================================================ --}}
    <div
        id="goalsData"
        data-goals="{{ base64_encode($goals->toJson()) }}"
        data-old-karyawan="{{ old('karyawan_id', '') }}"
        data-old-goal="{{ old('goal_id', '') }}"
        data-old-kpis="{{ base64_encode(json_encode(old('kpis', []))) }}"
        style="display: none;"
    ></div>


    <div style="
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 20px;
    ">

        {{-- ========================================================
            HEADER
        ========================================================= --}}
        <div style="
            margin-bottom: 25px;
        ">

            <h1 style="
                font-size: 28px;
                font-weight: 700;
                color: #0f172a;
                margin: 0 0 8px 0;
            ">
                Tambah Monitoring Kinerja
            </h1>

            <p style="
                color: #64748b;
                font-size: 15px;
                margin: 0;
            ">
                Tambahkan pencapaian KPI karyawan berdasarkan Goal yang dipilih.
            </p>

        </div>


        {{-- ========================================================
            ERROR VALIDASI
        ========================================================= --}}
        @if ($errors->any())

            <div style="
                background: #fee2e2;
                border: 1px solid #fecaca;
                color: #b91c1c;
                padding: 15px 18px;
                border-radius: 10px;
                margin-bottom: 20px;
            ">

                <strong>
                    Terjadi kesalahan:
                </strong>

                <ul style="
                    margin-top: 8px;
                    margin-bottom: 0;
                    padding-left: 20px;
                ">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- ========================================================
            FORM
        ========================================================= --}}
        <form
            action="{{ route('monitorings.store') }}"
            method="POST"
            style="
                background: #ffffff;
                border-radius: 16px;
                padding: 30px;
                box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            "
        >

            @csrf


            {{-- ====================================================
                KARYAWAN
            ===================================================== --}}
            <div style="
                margin-bottom: 22px;
            ">

                <label
                    for="karyawan_id"
                    style="
                        display: block;
                        font-weight: 600;
                        color: #0f172a;
                        margin-bottom: 8px;
                    "
                >
                    Karyawan
                </label>

                <select
                    name="karyawan_id"
                    id="karyawan_id"
                    required
                    style="
                        width: 100%;
                        padding: 13px 15px;
                        border: 1px solid #cbd5e1;
                        border-radius: 10px;
                        font-size: 15px;
                        background: #ffffff;
                        color: #0f172a;
                        outline: none;
                    "
                >

                    <option value="">
                        -- Pilih Karyawan --
                    </option>

                    @foreach ($karyawans as $karyawan)

                        <option
                            value="{{ $karyawan->id }}"
                            {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}
                        >
                            {{ $karyawan->nama }}
                        </option>

                    @endforeach

                </select>

                @error('karyawan_id')

                    <p style="
                        color: #dc2626;
                        margin: 6px 0 0 0;
                        font-size: 14px;
                    ">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ====================================================
                GOAL
            ===================================================== --}}
            <div style="
                margin-bottom: 25px;
            ">

                <label
                    for="goal_id"
                    style="
                        display: block;
                        font-weight: 600;
                        color: #0f172a;
                        margin-bottom: 8px;
                    "
                >
                    Goal / Target
                </label>

                <select
                    name="goal_id"
                    id="goal_id"
                    required
                    disabled
                    style="
                        width: 100%;
                        padding: 13px 15px;
                        border: 1px solid #cbd5e1;
                        border-radius: 10px;
                        font-size: 15px;
                        background: #ffffff;
                        color: #0f172a;
                        outline: none;
                    "
                >

                    <option value="">
                        -- Pilih Karyawan Terlebih Dahulu --
                    </option>

                </select>

                @error('goal_id')

                    <p style="
                        color: #dc2626;
                        margin: 6px 0 0 0;
                        font-size: 14px;
                    ">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ====================================================
                INFORMASI GOAL
            ===================================================== --}}
            <div
                id="goalInfo"
                style="
                    display: none;
                    background: #eff6ff;
                    border: 1px solid #bfdbfe;
                    border-radius: 12px;
                    padding: 18px;
                    margin-bottom: 25px;
                "
            >

                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                    gap: 15px;
                ">

                    <div>

                        <div style="
                            font-size: 12px;
                            color: #64748b;
                            margin-bottom: 4px;
                        ">
                            Karyawan
                        </div>

                        <div
                            id="infoKaryawan"
                            style="
                                font-weight: 600;
                                color: #0f172a;
                            "
                        >
                            -
                        </div>

                    </div>


                    <div>

                        <div style="
                            font-size: 12px;
                            color: #64748b;
                            margin-bottom: 4px;
                        ">
                            Goal
                        </div>

                        <div
                            id="infoGoal"
                            style="
                                font-weight: 600;
                                color: #0f172a;
                            "
                        >
                            -
                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                TANGGAL MONITORING
            ===================================================== --}}
            <div style="
                margin-bottom: 25px;
            ">

                <label
                    for="tanggal_monitoring"
                    style="
                        display: block;
                        font-weight: 600;
                        color: #0f172a;
                        margin-bottom: 8px;
                    "
                >
                    Tanggal Monitoring
                </label>

                <input
                    type="date"
                    name="tanggal_monitoring"
                    id="tanggal_monitoring"
                    value="{{ old('tanggal_monitoring', date('Y-m-d')) }}"
                    required
                    style="
                        width: 100%;
                        padding: 13px 15px;
                        border: 1px solid #cbd5e1;
                        border-radius: 10px;
                        font-size: 15px;
                        background: #ffffff;
                        color: #0f172a;
                        outline: none;
                    "
                >

                @error('tanggal_monitoring')

                    <p style="
                        color: #dc2626;
                        margin: 6px 0 0 0;
                        font-size: 14px;
                    ">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ====================================================
                KPI SECTION
            ===================================================== --}}
            <div
                id="kpiSection"
                style="
                    display: none;
                    margin-bottom: 25px;
                "
            >

                <div style="
                    margin-bottom: 15px;
                ">

                    <h2 style="
                        font-size: 19px;
                        font-weight: 700;
                        color: #0f172a;
                        margin: 0 0 5px 0;
                    ">
                        Daftar KPI
                    </h2>

                    <p style="
                        font-size: 13px;
                        color: #64748b;
                        margin: 0;
                    ">
                        Masukkan nilai pencapaian untuk setiap KPI.
                    </p>

                </div>


                {{-- =================================================
                    TABLE KPI
                ================================================== --}}
                <div style="
                    width: 100%;
                    overflow-x: auto;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                ">

                    <table style="
                        width: 100%;
                        border-collapse: collapse;
                        min-width: 1250px;
                    ">

                        <thead>

                            <tr style="
                                background: #f8fafc;
                            ">

                                <th style="
                                    padding: 13px 12px;
                                    border-bottom: 1px solid #e2e8f0;
                                    text-align: center;
                                    font-size: 13px;
                                    color: #334155;
                                    width: 60px;
                                ">
                                    No
                                </th>


                                <th style="
                                    padding: 13px 12px;
                                    border-bottom: 1px solid #e2e8f0;
                                    text-align: left;
                                    font-size: 13px;
                                    color: #334155;
                                    min-width: 320px;
                                ">
                                    Indikator Kinerja
                                </th>


                                <th style="
                                    padding: 13px 12px;
                                    border-bottom: 1px solid #e2e8f0;
                                    text-align: left;
                                    font-size: 13px;
                                    color: #334155;
                                    min-width: 180px;
                                ">
                                    Baseline 2025
                                </th>


                                <th style="
                                    padding: 13px 12px;
                                    border-bottom: 1px solid #e2e8f0;
                                    text-align: left;
                                    font-size: 13px;
                                    color: #334155;
                                    min-width: 180px;
                                ">
                                    Target 2026
                                </th>


                                <th style="
                                    padding: 13px 12px;
                                    border-bottom: 1px solid #e2e8f0;
                                    text-align: center;
                                    font-size: 13px;
                                    color: #334155;
                                    width: 120px;
                                ">
                                    Bobot Target
                                </th>


                                <th style="
                                    padding: 13px 12px;
                                    border-bottom: 1px solid #e2e8f0;
                                    text-align: left;
                                    font-size: 13px;
                                    color: #334155;
                                    min-width: 220px;
                                ">
                                    Pencapaian
                                </th>


                                <th style="
                                    padding: 13px 12px;
                                    border-bottom: 1px solid #e2e8f0;
                                    text-align: center;
                                    font-size: 13px;
                                    color: #334155;
                                    width: 130px;
                                ">
                                    Persentase
                                </th>

                            </tr>

                        </thead>


                        <tbody id="kpiTableBody">

                        </tbody>


                        <tfoot id="kpiTableFooter" style="display: none;">

                            <tr style="
                                background: #eff6ff;
                            ">

                                <td
                                    colspan="4"
                                    style="
                                        padding: 15px 12px;
                                        text-align: right;
                                        font-weight: 700;
                                        color: #0f172a;
                                        border-top: 2px solid #bfdbfe;
                                    "
                                >
                                    Total Bobot
                                </td>

                                <td
                                    id="totalBobot"
                                    style="
                                        padding: 15px 12px;
                                        text-align: center;
                                        font-weight: 700;
                                        color: #2563eb;
                                        border-top: 2px solid #bfdbfe;
                                    "
                                >
                                    0.00%
                                </td>

                                <td
                                    style="
                                        padding: 15px 12px;
                                        border-top: 2px solid #bfdbfe;
                                    "
                                >
                                </td>

                                <td
                                    id="totalPersentase"
                                    style="
                                        padding: 15px 12px;
                                        text-align: center;
                                        font-weight: 700;
                                        color: #2563eb;
                                        border-top: 2px solid #bfdbfe;
                                    "
                                >
                                    0.00%
                                </td>

                            </tr>

                        </tfoot>

                    </table>

                </div>

            </div>


            {{-- ====================================================
                CATATAN
            ===================================================== --}}
            <div style="
                margin-bottom: 25px;
            ">

                <label
                    for="catatan"
                    style="
                        display: block;
                        font-weight: 600;
                        color: #0f172a;
                        margin-bottom: 8px;
                    "
                >
                    Catatan
                </label>

                <textarea
                    name="catatan"
                    id="catatan"
                    rows="5"
                    placeholder="Masukkan catatan monitoring..."
                    style="
                        width: 100%;
                        padding: 13px 15px;
                        border: 1px solid #cbd5e1;
                        border-radius: 10px;
                        font-size: 15px;
                        resize: vertical;
                        outline: none;
                    "
                >{{ old('catatan') }}</textarea>

                @error('catatan')

                    <p style="
                        color: #dc2626;
                        margin: 6px 0 0 0;
                        font-size: 14px;
                    ">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ====================================================
                GARIS
            ===================================================== --}}
            <div style="
                border-top: 1px solid #e2e8f0;
                margin: 25px 0;
            ">
            </div>


            {{-- ====================================================
                TOMBOL
            ===================================================== --}}
            <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 15px;
            ">

                <a
                    href="{{ route('monitorings.index') }}"
                    style="
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                        padding: 12px 20px;
                        background: #f1f5f9;
                        color: #334155;
                        border: 1px solid #cbd5e1;
                        border-radius: 10px;
                        text-decoration: none;
                        font-size: 14px;
                        font-weight: 600;
                    "
                >
                    ← Kembali
                </a>


                <button
                    type="submit"
                    id="submitButton"
                    style="
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                        padding: 13px 25px;
                        background: #2563eb;
                        color: #ffffff;
                        border: none;
                        border-radius: 10px;
                        font-size: 14px;
                        font-weight: 600;
                        cursor: pointer;
                        box-shadow: 0 4px 10px rgba(37,99,235,0.25);
                    "
                >
                    ✓ Simpan Monitoring
                </button>

            </div>

        </form>

    </div>


    {{-- ============================================================
        JAVASCRIPT
    ============================================================ --}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
            |--------------------------------------------------------------------------
            | DATA GOAL
            |--------------------------------------------------------------------------
            */

            const goalsElement =
                document.getElementById('goalsData');

            const goalsData =
                JSON.parse(
                    atob(
                        goalsElement.dataset.goals
                    )
                );


            /*
            |--------------------------------------------------------------------------
            | ELEMENT
            |--------------------------------------------------------------------------
            */

            const karyawanSelect =
                document.getElementById('karyawan_id');

            const goalSelect =
                document.getElementById('goal_id');

            const goalInfo =
                document.getElementById('goalInfo');

            const kpiSection =
                document.getElementById('kpiSection');

            const kpiTableBody =
                document.getElementById('kpiTableBody');

            const kpiTableFooter =
                document.getElementById('kpiTableFooter');

            const infoKaryawan =
                document.getElementById('infoKaryawan');

            const infoGoal =
                document.getElementById('infoGoal');

            const totalBobot =
                document.getElementById('totalBobot');

            const totalPersentase =
                document.getElementById('totalPersentase');


            /*
            |--------------------------------------------------------------------------
            | SIMPAN DATA OLD
            |--------------------------------------------------------------------------
            */

            const oldKaryawan =
                goalsElement.dataset.oldKaryawan;

            const oldGoal =
                goalsElement.dataset.oldGoal;

            const oldKpisBase64 =
                goalsElement.dataset.oldKpis || '';

            const oldKpis =
                oldKpisBase64
                    ? JSON.parse(atob(oldKpisBase64))
                    : [];


            /*
            |--------------------------------------------------------------------------
            | ESCAPE HTML
            |--------------------------------------------------------------------------
            */

            function escapeHtml(value) {

                if (
                    value === null ||
                    value === undefined
                ) {
                    return '';
                }

                return String(value)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');

            }


            /*
            |--------------------------------------------------------------------------
            | FORMAT BOBOT
            |--------------------------------------------------------------------------
            */

            function formatBobot(value) {

                if (
                    value === null ||
                    value === undefined ||
                    value === ''
                ) {
                    return '-';
                }

                const angka =
                    parseFloat(value);

                if (isNaN(angka)) {
                    return '-';
                }

                return (angka * 100).toFixed(2) + '%';

            }


            /*
            |--------------------------------------------------------------------------
            | RESET GOAL
            |--------------------------------------------------------------------------
            */

            function resetGoal() {

                goalSelect.innerHTML = `
                    <option value="">
                        -- Pilih Goal --
                    </option>
                `;

                goalSelect.disabled = true;

                goalInfo.style.display = 'none';

                kpiSection.style.display = 'none';

                kpiTableBody.innerHTML = '';

                kpiTableFooter.style.display = 'none';

            }


            /*
            |--------------------------------------------------------------------------
            | FILTER GOAL
            |--------------------------------------------------------------------------
            */

            function filterGoals() {

                const karyawanId =
                    karyawanSelect.value;

                resetGoal();

                if (!karyawanId) {

                    goalSelect.innerHTML = `
                        <option value="">
                            -- Pilih Karyawan Terlebih Dahulu --
                        </option>
                    `;

                    return;

                }


                goalSelect.innerHTML = `
                    <option value="">
                        -- Pilih Goal --
                    </option>
                `;


                let jumlahGoal = 0;


                goalsData.forEach(function (goal) {

                    if (
                        String(goal.karyawan_id) ===
                        String(karyawanId)
                    ) {

                        const option =
                            document.createElement('option');

                        option.value =
                            goal.id;

                        option.textContent =
                            goal.nama_goal || 'Goal';

                        goalSelect.appendChild(
                            option
                        );

                        jumlahGoal++;

                    }

                });


                if (jumlahGoal === 0) {

                    goalSelect.innerHTML = `
                        <option value="">
                            -- Belum ada Goal untuk Karyawan ini --
                        </option>
                    `;

                    goalSelect.disabled = true;

                    return;

                }


                goalSelect.disabled = false;

            }


            /*
            |--------------------------------------------------------------------------
            | TAMPILKAN KPI
            |--------------------------------------------------------------------------
            */

            function tampilkanKpi(goalId) {

                kpiTableBody.innerHTML = '';

                kpiTableFooter.style.display = 'none';

                goalInfo.style.display = 'none';

                kpiSection.style.display = 'none';


                if (!goalId) {
                    return;
                }


                const goal =
                    goalsData.find(function (item) {

                        return String(item.id) ===
                            String(goalId);

                    });


                if (!goal) {
                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | INFORMASI GOAL
                |--------------------------------------------------------------------------
                */

                goalInfo.style.display = 'block';


                if (
                    goal.karyawan &&
                    goal.karyawan.nama
                ) {

                    infoKaryawan.textContent =
                        goal.karyawan.nama;

                } else {

                    const selectedOption =
                        goalSelect.options[
                            goalSelect.selectedIndex
                        ];

                    infoKaryawan.textContent =
                        selectedOption
                            ? '-'
                            : '-';

                }


                infoGoal.textContent =
                    goal.nama_goal || '-';


                /*
                |--------------------------------------------------------------------------
                | AMBIL KPI
                |--------------------------------------------------------------------------
                */

                const kpis =
                    Array.isArray(goal.kpis)
                        ? goal.kpis
                        : [];


                kpiSection.style.display = 'block';


                /*
                |--------------------------------------------------------------------------
                | TIDAK ADA KPI
                |--------------------------------------------------------------------------
                */

                if (kpis.length === 0) {

                    kpiTableBody.innerHTML = `
                        <tr>
                            <td
                                colspan="7"
                                style="
                                    padding: 30px;
                                    text-align: center;
                                    color: #64748b;
                                "
                            >
                                Belum ada KPI untuk Goal ini.
                            </td>
                        </tr>
                    `;

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | BUAT BARIS KPI
                |--------------------------------------------------------------------------
                */

                kpis.forEach(function (kpi, index) {

                    const row =
                        document.createElement('tr');


                    row.style.background =
                        index % 2 === 0
                            ? '#ffffff'
                            : '#f8fafc';


                    const oldValue =
                        oldKpis[index] &&
                        oldKpis[index].pencapaian !== undefined
                            ? oldKpis[index].pencapaian
                            : '';


                    row.innerHTML = `

                        <td style="
                            padding: 14px 12px;
                            border-bottom: 1px solid #e2e8f0;
                            text-align: center;
                            color: #334155;
                            font-size: 13px;
                            vertical-align: top;
                        ">
                            ${escapeHtml(kpi.no)}
                        </td>


                        <td style="
                            padding: 14px 12px;
                            border-bottom: 1px solid #e2e8f0;
                            color: #0f172a;
                            font-size: 13px;
                            vertical-align: top;
                        ">

                            <strong>
                                ${escapeHtml(
                                    kpi.indikator_kinerja_individu
                                )}
                            </strong>

                            <div style="
                                color: #64748b;
                                font-size: 12px;
                                margin-top: 6px;
                            ">
                                ${escapeHtml(
                                    kpi.indikator_kinerja_perusahaan ||
                                    '-'
                                )}
                            </div>

                            <input
                                type="hidden"
                                name="kpis[${index}][goal_kpi_id]"
                                value="${escapeHtml(kpi.id)}"
                            >

                        </td>


                        <td style="
                            padding: 14px 12px;
                            border-bottom: 1px solid #e2e8f0;
                            color: #475569;
                            font-size: 13px;
                            vertical-align: top;
                        ">
                            ${escapeHtml(
                                kpi.baseline_2025 || '-'
                            )}
                        </td>


                        <td style="
                            padding: 14px 12px;
                            border-bottom: 1px solid #e2e8f0;
                            color: #475569;
                            font-size: 13px;
                            vertical-align: top;
                        ">
                            ${escapeHtml(
                                kpi.target_2026 || '-'
                            )}
                        </td>


                        <td style="
                            padding: 14px 12px;
                            border-bottom: 1px solid #e2e8f0;
                            text-align: center;
                            color: #0f172a;
                            font-weight: 600;
                            font-size: 13px;
                            vertical-align: top;
                        ">
                            ${formatBobot(kpi.bobot_target)}
                        </td>


                        <td style="
                            padding: 10px 12px;
                            border-bottom: 1px solid #e2e8f0;
                            vertical-align: top;
                        ">

                            <input
                                type="text"
                                name="kpis[${index}][pencapaian]"
                                class="pencapaian-input"
                                data-index="${index}"
                                value="${escapeHtml(oldValue)}"
                                placeholder="Contoh: 4,1 / 41% / Rp 1.716.153.740,00"
                                autocomplete="off"
                                style="
                                    width: 100%;
                                    padding: 10px 12px;
                                    border: 1px solid #cbd5e1;
                                    border-radius: 8px;
                                    font-size: 13px;
                                    background: #ffffff;
                                    outline: none;
                                "
                            >

                        </td>


                        <td
                            id="persentase-${index}"
                            style="
                                padding: 14px 12px;
                                border-bottom: 1px solid #e2e8f0;
                                text-align: center;
                                font-weight: 600;
                                color: #2563eb;
                                font-size: 13px;
                                vertical-align: top;
                            "
                        >
                            -
                        </td>

                    `;


                    kpiTableBody.appendChild(row);


                    /*
                    |--------------------------------------------------------------------------
                    | INPUT
                    |--------------------------------------------------------------------------
                    */

                    const input =
                        row.querySelector(
                            '.pencapaian-input'
                        );


                    input.addEventListener(
                        'input',
                        function () {

                            hitungSemua();

                        }
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | HITUNG OLD VALUE
                    |--------------------------------------------------------------------------
                    */

                    if (oldValue !== '') {

                        hitungSemua();

                    }

                });


                kpiTableFooter.style.display = 'table-footer-group';


                hitungSemua();

            }


            /*
            |--------------------------------------------------------------------------
            | HITUNG SEMUA KPI
            |--------------------------------------------------------------------------
            */

            function parseAngka(value) {

                if (value === null || value === undefined || value === '') {
                    return NaN;
                }

                let teks = String(value).trim();
                const isPersentase = teks.includes('%');

                teks = teks
                    .replace(/rp/gi, '')
                    .replace(/%/g, '')
                    .replace(/\s/g, '')
                    .replace(/[^\d.,-]/g, '');

                if (teks === '') {
                    return NaN;
                }

                let angka;

                if (teks.includes('.') && teks.includes(',')) {
                    teks = teks.replace(/\./g, '');
                    teks = teks.replace(',', '.');
                    angka = parseFloat(teks);
                } else if (teks.includes(',')) {
                    teks = teks.replace(',', '.');
                    angka = parseFloat(teks);
                } else if ((teks.match(/\./g) || []).length > 1) {
                    teks = teks.replace(/\./g, '');
                    angka = parseFloat(teks);
                } else {
                    angka = parseFloat(teks);
                }

                if (isNaN(angka)) {
                    return NaN;
                }

                return isPersentase ? angka / 100 : angka;
            }

            /*
            |--------------------------------------------------------------------------
            | HITUNG SEMUA KPI
            |--------------------------------------------------------------------------
            */
            function hitungSemua() {

                let jumlahBobot = 0;
                let totalBobotTercapai = 0;

                const rows =
                    kpiTableBody.querySelectorAll('tr');

                rows.forEach(function (row, index) {

                    const input =
                        row.querySelector('.pencapaian-input');

                    if (!input) {
                        return;
                    }

                    const goalId = goalSelect.value;
                    const goal = goalsData.find(function (item) {
                        return String(item.id) === String(goalId);
                    });

                    if (!goal) {
                        return;
                    }

                    const kpis = Array.isArray(goal.kpis) ? goal.kpis : [];
                    const kpi = kpis[index];

                    if (!kpi) {
                        return;
                    }

                    const pencapaian = parseAngka(input.value);
                    const target = parseAngka(kpi.target_2026);
                    const persentaseElement = document.getElementById('persentase-' + index);
                    const bobot = parseFloat(kpi.bobot_target);

                    if (!isNaN(bobot)) {
                        jumlahBobot += bobot;
                    }

                    if (isNaN(pencapaian) || isNaN(target) || target <= 0) {
                        persentaseElement.textContent = '-';
                        return;
                    }

                    const persentase = (pencapaian / target) * 100;
                    persentaseElement.textContent = persentase.toFixed(2) + '%';

                    if (!isNaN(bobot)) {
                        const bobotTercapai = (pencapaian / target) * bobot;
                        totalBobotTercapai += bobotTercapai;
                    }
                });

                totalBobot.textContent =
                    (jumlahBobot * 100).toFixed(2) + '%';

                totalPersentase.textContent =
                    (totalBobotTercapai * 100).toFixed(2) + '%';

            }

            /*
            |--------------------------------------------------------------------------
            | EVENT KARYAWAN
            |--------------------------------------------------------------------------
            */

            karyawanSelect.addEventListener(
                'change',
                function () {

                    filterGoals();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | EVENT GOAL
            |--------------------------------------------------------------------------
            */

            goalSelect.addEventListener(
                'change',
                function () {

                    tampilkanKpi(
                        this.value
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | RESTORE DATA
            |--------------------------------------------------------------------------
            */

            if (oldKaryawan) {

                karyawanSelect.value =
                    oldKaryawan;

                filterGoals();


                if (oldGoal) {

                    goalSelect.value =
                        oldGoal;

                    tampilkanKpi(
                        oldGoal
                    );

                }

            }

        });

    </script>

</x-app-layout>p