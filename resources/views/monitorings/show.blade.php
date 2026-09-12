<x-app-layout>

    <div style="
        min-height: 100vh;
        background: #f3f6fa;
        padding: 40px 20px;
    ">

        <div style="
            max-width: 1250px;
            margin: auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        ">

            {{-- HEADER --}}
            <div style="
                padding: 30px;
                border-bottom: 1px solid #e5e7eb;
            ">

                <h1 style="
                    margin: 0;
                    font-size: 28px;
                    font-weight: 700;
                    color: #0f172a;
                ">
                    Detail Monitoring Kinerja
                </h1>

                <p style="
                    margin-top: 8px;
                    color: #64748b;
                    font-size: 14px;
                ">
                    Detail hasil monitoring kinerja karyawan.
                </p>

            </div>


            {{-- ISI --}}
            <div style="padding: 30px;">

                {{-- KARYAWAN --}}
                <div style="
                    background: #f8fafc;
                    border: 1px solid #dbe4ef;
                    border-radius: 10px;
                    padding: 20px;
                    margin-bottom: 20px;
                ">

                    <div style="
                        color: #64748b;
                        font-size: 14px;
                        margin-bottom: 8px;
                    ">
                        Karyawan
                    </div>

                    <div style="
                        font-size: 20px;
                        font-weight: 600;
                        color: #0f172a;
                    ">
                        {{ $monitoring->karyawan->nama ?? '-' }}
                    </div>

                    <div style="
                        margin-top: 5px;
                        color: #64748b;
                        font-size: 14px;
                    ">
                        NIK:
                        {{ $monitoring->karyawan->nik ?? '-' }}
                    </div>

                </div>


                {{-- GOAL --}}
                <div style="
                    background: #eff6ff;
                    border: 1px solid #bfdbfe;
                    border-radius: 10px;
                    padding: 20px;
                    margin-bottom: 20px;
                ">

                    <div style="
                        color: #64748b;
                        font-size: 14px;
                        margin-bottom: 8px;
                    ">
                        Goal
                    </div>

                    <div style="
                        font-size: 18px;
                        font-weight: 600;
                        color: #1d4ed8;
                    ">
                        {{ $monitoring->goal->nama_goal ?? '-' }}
                    </div>

                    <div style="
                        margin-top: 5px;
                        color: #64748b;
                        font-size: 14px;
                    ">
                        Tipe Goal:
                        {{ $monitoring->goal->tipe ?? '-' }}
                    </div>

                </div>


                {{-- INFORMASI MONITORING --}}
                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 20px;
                    margin-bottom: 20px;
                ">

                    {{-- TANGGAL --}}
                    <div style="
                        background: #f8fafc;
                        border: 1px solid #dbe4ef;
                        border-radius: 10px;
                        padding: 20px;
                    ">

                        <div style="
                            color: #64748b;
                            font-size: 14px;
                            margin-bottom: 8px;
                        ">
                            Tanggal Monitoring
                        </div>

                        <div style="
                            font-size: 18px;
                            font-weight: 600;
                            color: #0f172a;
                        ">
                            {{ $monitoring->tanggal_monitoring
                                ? \Carbon\Carbon::parse($monitoring->tanggal_monitoring)->format('d/m/Y')
                                : '-' }}
                        </div>

                    </div>


                    {{-- PERSENTASE --}}
                    <div style="
                        background: #f8fafc;
                        border: 1px solid #dbe4ef;
                        border-radius: 10px;
                        padding: 20px;
                    ">

                        <div style="
                            color: #64748b;
                            font-size: 14px;
                            margin-bottom: 8px;
                        ">
                            Persentase Pencapaian
                        </div>

                        <div style="
                            font-size: 28px;
                            font-weight: 700;
                            color: #16a34a;
                        ">
                            {{ number_format($monitoring->persentase ?? 0, 2, ',', '.') }}%
                        </div>

                    </div>

                </div>


                {{-- TARGET & REALISASI --}}
                <div style="
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 20px;
                    margin-bottom: 25px;
                ">

                    <div style="
                        background: #f8fafc;
                        border: 1px solid #dbe4ef;
                        border-radius: 10px;
                        padding: 20px;
                    ">

                        <div style="
                            color: #64748b;
                            font-size: 14px;
                            margin-bottom: 8px;
                        ">
                            Target Keseluruhan
                        </div>

                        <div style="
                            font-size: 22px;
                            font-weight: 600;
                            color: #0f172a;
                        ">
                            {{ number_format($monitoring->target ?? 0, 2, ',', '.') }}%
                        </div>

                    </div>


                    <div style="
                        background: #f8fafc;
                        border: 1px solid #dbe4ef;
                        border-radius: 10px;
                        padding: 20px;
                    ">

                        <div style="
                            color: #64748b;
                            font-size: 14px;
                            margin-bottom: 8px;
                        ">
                            Realisasi Keseluruhan
                        </div>

                        <div style="
                            font-size: 22px;
                            font-weight: 600;
                            color: #0f172a;
                        ">
                            {{ number_format($monitoring->realisasi ?? 0, 2, ',', '.') }}%
                        </div>

                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- DETAIL KPI --}}
                {{-- ========================================================= --}}

                <div style="
                    margin-bottom: 25px;
                ">

                    <div style="
                        margin-bottom: 15px;
                    ">

                        <h2 style="
                            margin: 0;
                            font-size: 20px;
                            font-weight: 700;
                            color: #0f172a;
                        ">
                            Detail KPI
                        </h2>

                        <p style="
                            margin: 6px 0 0;
                            color: #64748b;
                            font-size: 14px;
                        ">
                            Rincian pencapaian KPI berdasarkan Goal yang dipilih.
                        </p>

                    </div>


                    {{-- TABEL KPI --}}
                    <div style="
                        width: 100%;
                        overflow-x: auto;
                        border: 1px solid #dbe4ef;
                        border-radius: 10px;
                    ">

                        <table style="
                            width: 100%;
                            min-width: 1100px;
                            border-collapse: collapse;
                            background: white;
                        ">

                            <thead>

                                <tr style="
                                    background: #1e3a8a;
                                    color: white;
                                ">

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: center;
                                        font-size: 13px;
                                        font-weight: 700;
                                        border-right: 1px solid rgba(255,255,255,0.2);
                                        width: 55px;
                                    ">
                                        No
                                    </th>

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: left;
                                        font-size: 13px;
                                        font-weight: 700;
                                        border-right: 1px solid rgba(255,255,255,0.2);
                                        min-width: 190px;
                                    ">
                                        Indikator Kinerja Perusahaan
                                    </th>

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: left;
                                        font-size: 13px;
                                        font-weight: 700;
                                        border-right: 1px solid rgba(255,255,255,0.2);
                                        min-width: 280px;
                                    ">
                                        Indikator Kinerja Individu
                                    </th>

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: center;
                                        font-size: 13px;
                                        font-weight: 700;
                                        border-right: 1px solid rgba(255,255,255,0.2);
                                        min-width: 130px;
                                    ">
                                        Baseline 2025
                                    </th>

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: center;
                                        font-size: 13px;
                                        font-weight: 700;
                                        border-right: 1px solid rgba(255,255,255,0.2);
                                        min-width: 130px;
                                    ">
                                        Target 2026
                                    </th>

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: center;
                                        font-size: 13px;
                                        font-weight: 700;
                                        border-right: 1px solid rgba(255,255,255,0.2);
                                        min-width: 120px;
                                    ">
                                        Pencapaian
                                    </th>

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: center;
                                        font-size: 13px;
                                        font-weight: 700;
                                        border-right: 1px solid rgba(255,255,255,0.2);
                                        min-width: 110px;
                                    ">
                                        Bobot Target
                                    </th>

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: center;
                                        font-size: 13px;
                                        font-weight: 700;
                                        border-right: 1px solid rgba(255,255,255,0.2);
                                        min-width: 110px;
                                    ">
                                        Persentase
                                    </th>

                                    <th style="
                                        padding: 13px 12px;
                                        text-align: center;
                                        font-size: 13px;
                                        font-weight: 700;
                                        min-width: 120px;
                                    ">
                                        Bobot Tercapai
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($monitoring->monitoringKpis as $item)

                                    <tr style="
                                        border-bottom: 1px solid #e5e7eb;
                                    ">

                                        {{-- NO --}}
                                        <td style="
                                            padding: 14px 12px;
                                            text-align: center;
                                            color: #334155;
                                            font-size: 13px;
                                            font-weight: 600;
                                            vertical-align: top;
                                        ">
                                            {{ $item->goalKpi->no ?? '-' }}
                                        </td>


                                        {{-- INDIKATOR PERUSAHAAN --}}
                                        <td style="
                                            padding: 14px 12px;
                                            color: #334155;
                                            font-size: 13px;
                                            vertical-align: top;
                                            line-height: 1.5;
                                        ">
                                            {{ $item->goalKpi->indikator_kinerja_perusahaan ?? '-' }}
                                        </td>


                                        {{-- INDIKATOR INDIVIDU --}}
                                        <td style="
                                            padding: 14px 12px;
                                            color: #0f172a;
                                            font-size: 13px;
                                            font-weight: 600;
                                            vertical-align: top;
                                            line-height: 1.5;
                                        ">
                                            {{ $item->goalKpi->indikator_kinerja_individu ?? '-' }}
                                        </td>


                                        {{-- BASELINE --}}
                                        <td style="
                                            padding: 14px 12px;
                                            text-align: center;
                                            color: #475569;
                                            font-size: 13px;
                                            vertical-align: top;
                                            line-height: 1.5;
                                        ">
                                            {{ $item->goalKpi->baseline_2025 ?? '-' }}
                                        </td>


                                        {{-- TARGET --}}
                                        <td style="
                                            padding: 14px 12px;
                                            text-align: center;
                                            color: #1e3a8a;
                                            font-size: 13px;
                                            font-weight: 600;
                                            vertical-align: top;
                                            line-height: 1.5;
                                        ">
                                            {{ $item->goalKpi->target_2026 ?? '-' }}
                                        </td>


                                        {{-- PENCAPAIAN --}}
                                        <td style="
                                            padding: 14px 12px;
                                            text-align: center;
                                            color: #0f172a;
                                            font-size: 13px;
                                            font-weight: 700;
                                            vertical-align: top;
                                        ">
                                            {{ $item->pencapaian !== null
                                                ? number_format($item->pencapaian, 2, ',', '.')
                                                : '-' }}
                                        </td>


                                        {{-- BOBOT TARGET --}}
                                        <td style="
                                            padding: 14px 12px;
                                            text-align: center;
                                            color: #475569;
                                            font-size: 13px;
                                            vertical-align: top;
                                        ">
                                            {{ $item->goalKpi->bobot_target !== null
                                                ? number_format($item->goalKpi->bobot_target * 100, 2, ',', '.') . '%'
                                                : '-' }}
                                        </td>


                                        {{-- PERSENTASE --}}
                                        <td style="
                                            padding: 14px 12px;
                                            text-align: center;
                                            color: #2563eb;
                                            font-size: 13px;
                                            font-weight: 700;
                                            vertical-align: top;
                                        ">
                                            {{ $item->persentase !== null
                                                ? number_format($item->persentase, 2, ',', '.') . '%'
                                                : '-' }}
                                        </td>


                                        {{-- BOBOT TERCAPAI --}}
                                        <td style="
                                            padding: 14px 12px;
                                            text-align: center;
                                            color: #16a34a;
                                            font-size: 13px;
                                            font-weight: 700;
                                            vertical-align: top;
                                        ">
                                            {{ $item->bobot_tercapai !== null
                                                ? number_format($item->bobot_tercapai * 100, 2, ',', '.') . '%'
                                                : '-' }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="9" style="
                                            padding: 35px 20px;
                                            text-align: center;
                                            color: #64748b;
                                            font-size: 14px;
                                        ">
                                            Belum ada data KPI pada monitoring ini.
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>


                            {{-- TOTAL --}}
                            @if($monitoring->monitoringKpis->count() > 0)

                                <tfoot>

                                    <tr style="
                                        background: #f8fafc;
                                        border-top: 2px solid #cbd5e1;
                                    ">

                                        <td colspan="6" style="
                                            padding: 15px 12px;
                                            text-align: right;
                                            color: #0f172a;
                                            font-size: 13px;
                                            font-weight: 700;
                                        ">
                                            TOTAL
                                        </td>


                                        <td style="
                                            padding: 15px 12px;
                                            text-align: center;
                                            color: #0f172a;
                                            font-size: 13px;
                                            font-weight: 700;
                                        ">
                                            {{
                                                number_format(
                                                    $monitoring->monitoringKpis->sum(function ($item) {
                                                        return (float) ($item->goalKpi->bobot_target ?? 0);
                                                    }) * 100,
                                                    2,
                                                    ',',
                                                    '.'
                                                )
                                            }}%
                                        </td>


                                        <td style="
                                            padding: 15px 12px;
                                            text-align: center;
                                            color: #2563eb;
                                            font-size: 13px;
                                            font-weight: 700;
                                        ">
                                            {{
                                                number_format(
                                                    $monitoring->persentase ?? 0,
                                                    2,
                                                    ',',
                                                    '.'
                                                )
                                            }}%
                                        </td>


                                        <td style="
                                            padding: 15px 12px;
                                            text-align: center;
                                            color: #16a34a;
                                            font-size: 13px;
                                            font-weight: 700;
                                        ">
                                            {{
                                                number_format(
                                                    $monitoring->monitoringKpis->sum('bobot_tercapai') * 100,
                                                    2,
                                                    ',',
                                                    '.'
                                                )
                                            }}%
                                        </td>

                                    </tr>

                                </tfoot>

                            @endif

                        </table>

                    </div>

                </div>


                {{-- CATATAN --}}
                <div style="
                    background: #f8fafc;
                    border: 1px solid #dbe4ef;
                    border-radius: 10px;
                    padding: 20px;
                    margin-bottom: 25px;
                ">

                    <div style="
                        color: #64748b;
                        font-size: 14px;
                        margin-bottom: 10px;
                    ">
                        Catatan Monitoring
                    </div>

                    <div style="
                        font-size: 16px;
                        color: #0f172a;
                        line-height: 1.6;
                    ">
                        {{ $monitoring->catatan ?? '-' }}
                    </div>

                </div>


                {{-- TOMBOL --}}
                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    gap: 10px;
                ">

                    <a href="{{ route('monitorings.index') }}"
                       style="
                           display: inline-block;
                           padding: 11px 18px;
                           background: #f1f5f9;
                           color: #334155;
                           text-decoration: none;
                           border-radius: 8px;
                           font-size: 14px;
                           font-weight: 600;
                       ">
                        ← Kembali
                    </a>


                    <a href="{{ route('monitorings.edit', $monitoring) }}"
                       style="
                           display: inline-block;
                           padding: 11px 18px;
                           background: #2563eb;
                           color: white;
                           text-decoration: none;
                           border-radius: 8px;
                           font-size: 14px;
                           font-weight: 600;
                       ">
                        ✏️ Edit Monitoring
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>