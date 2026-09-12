<x-app-layout>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Detail Goals
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Informasi lengkap target kinerja.
                </p>
            </div>


            {{-- Card Detail --}}
            <div class="bg-white shadow-sm rounded-xl overflow-hidden">

                {{-- Judul --}}
                <div class="px-6 py-5 border-b border-gray-200">

                    <div class="flex items-center justify-between">

                        <div>

                            <h3 class="text-xl font-bold text-gray-800">
                                🎯 {{ $goal->nama_goal }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                {{ $goal->deskripsi }}
                            </p>

                        </div>


                        {{-- Status --}}
                        @if($goal->status === 'Aktif')

                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-700">
                                Aktif
                            </span>

                        @elseif($goal->status === 'Selesai')

                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-700">
                                Selesai
                            </span>

                        @else

                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-gray-100 text-gray-700">
                                Nonaktif
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Informasi --}}
                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                        {{-- Tipe --}}
                        <div class="p-5 bg-gray-50 rounded-lg">

                            <p class="text-sm text-gray-500">
                                Tipe Goal
                            </p>

                            <p class="mt-1 text-lg font-semibold text-gray-800">
                                {{ $goal->tipe }}
                            </p>

                        </div>


                        {{-- Target --}}
                        <div class="p-5 bg-blue-50 rounded-lg">

                            <p class="text-sm text-gray-500">
                                Target
                            </p>

                            <p class="mt-1 text-2xl font-bold text-blue-600">
                                {{ number_format($goal->target, 2, ',', '.') }}
                            </p>

                        </div>


                        {{-- Tanggal Mulai --}}
                        <div class="p-5 bg-gray-50 rounded-lg">

                            <p class="text-sm text-gray-500">
                                Tanggal Mulai
                            </p>

                            <p class="mt-1 text-lg font-semibold text-gray-800">
                                {{ \Carbon\Carbon::parse($goal->tanggal_mulai)->format('d/m/Y') }}
                            </p>

                        </div>


                        {{-- Tanggal Selesai --}}
                        <div class="p-5 bg-gray-50 rounded-lg">

                            <p class="text-sm text-gray-500">
                                Tanggal Selesai
                            </p>

                            <p class="mt-1 text-lg font-semibold text-gray-800">
                                {{ \Carbon\Carbon::parse($goal->tanggal_selesai)->format('d/m/Y') }}
                            </p>

                        </div>

                    </div>


                    {{-- Deskripsi --}}
                    <div class="mt-6">

                        <p class="text-sm font-semibold text-gray-600 mb-2">
                            Deskripsi Goal
                        </p>

                        <div class="p-4 bg-gray-50 rounded-lg text-gray-700">

                            {{ $goal->deskripsi ?: 'Tidak ada deskripsi.' }}

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                     TOMBOL AKSI
                ====================================================== --}}

                <div
                    style="
                        padding: 20px 24px;
                        border-top: 1px solid #e5e7eb;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        gap: 15px;
                    "
                >

                    {{-- =================================================
                         TOMBOL KEMBALI
                    ================================================== --}}

                    <a
                        href="{{ route('goals.index') }}"
                        style="
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            gap: 8px;
                            padding: 11px 18px;
                            background: #f1f5f9;
                            color: #334155;
                            border: 1px solid #e2e8f0;
                            border-radius: 10px;
                            text-decoration: none;
                            font-size: 14px;
                            font-weight: 600;
                            white-space: nowrap;
                            transition: all 0.2s ease;
                        "
                        onmouseover="this.style.background='#e2e8f0'"
                        onmouseout="this.style.background='#f1f5f9'"
                    >

                        <span
                            style="
                                width: 26px;
                                height: 26px;
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                background: #e2e8f0;
                                border-radius: 7px;
                                font-size: 15px;
                            "
                        >
                            ←
                        </span>

                        <span>
                            Kembali
                        </span>

                    </a>


                    {{-- =================================================
                         TOMBOL KANAN
                    ================================================== --}}

                    <div
                        style="
                            display: flex;
                            align-items: center;
                            gap: 12px;
                        "
                    >


                        {{-- =================================================
                             TOMBOL HASIL EVALUASI 360°
                        ================================================== --}}

                        <a
                            href="{{ route('evaluasi.hasil360', [$goal->karyawan_id, $goal->id]) }}"
                            style="
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                gap: 9px;
                                padding: 11px 20px;
                                background: #4f46e5;
                                color: #ffffff;
                                border-radius: 10px;
                                text-decoration: none;
                                font-size: 14px;
                                font-weight: 600;
                                white-space: nowrap;
                                box-shadow: 0 3px 8px rgba(79, 70, 229, 0.25);
                                transition: all 0.2s ease;
                            "
                            onmouseover="
                                this.style.background='#4338ca';
                                this.style.transform='translateY(-1px)';
                            "
                            onmouseout="
                                this.style.background='#4f46e5';
                                this.style.transform='translateY(0)';
                            "
                        >

                            <span
                                style="
                                    width: 28px;
                                    height: 28px;
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    background: rgba(255,255,255,0.18);
                                    border-radius: 7px;
                                    font-size: 15px;
                                "
                            >
                                📊
                            </span>

                            <span>
                                Lihat Hasil 360°
                            </span>

                        </a>


                        {{-- =================================================
                             TOMBOL EDIT
                        ================================================== --}}

                        <a
                            href="{{ route('goals.edit', $goal->id) }}"
                            style="
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                gap: 9px;
                                padding: 11px 20px;
                                background: #2563eb;
                                color: #ffffff;
                                border-radius: 10px;
                                text-decoration: none;
                                font-size: 14px;
                                font-weight: 600;
                                white-space: nowrap;
                                box-shadow: 0 3px 8px rgba(37, 99, 235, 0.20);
                                transition: all 0.2s ease;
                            "
                            onmouseover="
                                this.style.background='#1d4ed8';
                                this.style.transform='translateY(-1px)';
                            "
                            onmouseout="
                                this.style.background='#2563eb';
                                this.style.transform='translateY(0)';
                            "
                        >

                            <span
                                style="
                                    width: 28px;
                                    height: 28px;
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    background: rgba(255,255,255,0.18);
                                    border-radius: 7px;
                                    font-size: 15px;
                                "
                            >
                                ✏️
                            </span>

                            <span>
                                Edit Goal
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- =====================================================
         RESPONSIVE
    ====================================================== --}}

    <style>

        @media (max-width: 700px) {

            div[style*="justify-content: space-between"] {
                flex-direction: column !important;
                align-items: stretch !important;
            }

            div[style*="justify-content: space-between"] > div {
                flex-direction: column !important;
                width: 100% !important;
            }

            div[style*="justify-content: space-between"] > a,
            div[style*="justify-content: space-between"] > div > a {
                width: 100% !important;
            }

        }

    </style>

</x-app-layout>