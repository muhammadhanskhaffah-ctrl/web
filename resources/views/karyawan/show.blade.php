<x-app-layout>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Detail Karyawan
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Informasi lengkap data karyawan.
                </p>
            </div>

            {{-- Card --}}
            <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">

                {{-- Header Card --}}
                <div class="border-b border-gray-200 bg-gray-50 px-6 py-5">
                    <div class="flex items-center justify-between">

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $karyawan->nama }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                NIK: {{ $karyawan->nik }}
                            </p>
                        </div>

                        <div class="rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">
                            {{ $karyawan->departemen }}
                        </div>

                    </div>
                </div>

                {{-- Data Karyawan --}}
                <div class="px-6 py-6">

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- NIK --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                NIK
                            </p>

                            <p class="mt-1 text-base font-semibold text-gray-800">
                                {{ $karyawan->nik }}
                            </p>
                        </div>

                        {{-- Nama --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Nama Lengkap
                            </p>

                            <p class="mt-1 text-base font-semibold text-gray-800">
                                {{ $karyawan->nama }}
                            </p>
                        </div>

                        {{-- Jabatan --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Jabatan
                            </p>

                            <p class="mt-1 text-base text-gray-800">
                                {{ $karyawan->jabatan }}
                            </p>
                        </div>

                        {{-- Departemen --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Departemen
                            </p>

                            <p class="mt-1 text-base text-gray-800">
                                {{ $karyawan->departemen }}
                            </p>
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Jenis Kelamin
                            </p>

                            <p class="mt-1 text-base text-gray-800">
                                {{ $karyawan->jenis_kelamin }}
                            </p>
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Tanggal Lahir
                            </p>

                            <p class="mt-1 text-base text-gray-800">
                                {{ \Carbon\Carbon::parse($karyawan->tanggal_lahir)->format('d/m/Y') }}
                            </p>
                        </div>

                        {{-- No HP --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                No. HP
                            </p>

                            <p class="mt-1 text-base text-gray-800">
                                {{ $karyawan->no_hp }}
                            </p>
                        </div>

                        {{-- Tanggal Masuk --}}
                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Tanggal Masuk
                            </p>

                            <p class="mt-1 text-base text-gray-800">
                                {{ \Carbon\Carbon::parse($karyawan->tanggal_masuk)->format('d/m/Y') }}
                            </p>
                        </div>

                        {{-- Alamat --}}
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-500">
                                Alamat
                            </p>

                            <p class="mt-1 rounded-lg bg-gray-50 p-4 text-base text-gray-800">
                                {{ $karyawan->alamat }}
                            </p>
                        </div>

                    </div>

                </div>

                {{-- Tombol --}}
                <div class="flex items-center justify-between border-t border-gray-200 bg-gray-50 px-6 py-5">

                    <a href="{{ route('karyawan.index') }}"
                       class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-100">

                        ← Kembali

                    </a>

                    <a href="{{ route('karyawan.edit', $karyawan) }}"
                       class="inline-flex items-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                        ✎ Edit Data

                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>