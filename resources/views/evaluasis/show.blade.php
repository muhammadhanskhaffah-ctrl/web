<x-app-layout>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    {{-- Header --}}
                    <div class="flex justify-between items-center mb-6">

                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">
                                Detail Evaluasi Kinerja
                            </h2>

                            <p class="text-gray-500 mt-1">
                                Informasi lengkap hasil evaluasi karyawan.
                            </p>
                        </div>

                        <a href="{{ route('evaluasi.index') }}"
                           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg">
                            ← Kembali
                        </a>

                    </div>


                    {{-- Data Karyawan --}}
                    <div class="border rounded-lg p-5 mb-5">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            Data Karyawan
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <p class="text-sm text-gray-500">
                                    Nama Karyawan
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $evaluasi->karyawan->nama ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    NIK
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $evaluasi->karyawan->nik ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Jabatan
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $evaluasi->karyawan->jabatan ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Departemen
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $evaluasi->karyawan->departemen ?? '-' }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Data Evaluasi --}}
                    <div class="border rounded-lg p-5">

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            Hasil Evaluasi
                        </h3>

                        <div class="space-y-5">

                            {{-- Goal --}}
                            <div>

                                <p class="text-sm text-gray-500">
                                    Goal
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $evaluasi->goal->nama_goal ?? '-' }}
                                </p>

                            </div>


                            {{-- Jenis Evaluasi --}}
                            <div>

                                <p class="text-sm text-gray-500">
                                    Jenis Evaluasi
                                </p>

                                @if($evaluasi->jenis_evaluasi == 'self')

                                    <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-medium">
                                        Self Evaluation
                                    </span>

                                @elseif($evaluasi->jenis_evaluasi == 'peer')

                                    <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-medium">
                                        Peer Review
                                    </span>

                                @else

                                    <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-medium">
                                        Supervisor Review
                                    </span>

                                @endif

                            </div>


                            {{-- Skor --}}
                            <div>

                                <p class="text-sm text-gray-500 mb-1">
                                    Skor Evaluasi
                                </p>

                                <div class="text-3xl font-bold text-blue-600">
                                    {{ $evaluasi->skor }}/5
                                </div>

                            </div>


                            {{-- Komentar --}}
                            <div>

                                <p class="text-sm text-gray-500 mb-1">
                                    Komentar
                                </p>

                                <div class="bg-gray-50 border rounded-lg p-4">

                                    @if($evaluasi->komentar)

                                        <p class="text-gray-700">
                                            {{ $evaluasi->komentar }}
                                        </p>

                                    @else

                                        <p class="text-gray-400 italic">
                                            Tidak ada komentar.
                                        </p>

                                    @endif

                                </div>

                            </div>


                            {{-- Tanggal --}}
                            <div>

                                <p class="text-sm text-gray-500">
                                    Tanggal Evaluasi
                                </p>

                                <p class="font-semibold text-gray-800">

                                    {{ $evaluasi->tanggal_evaluasi
                                        ? $evaluasi->tanggal_evaluasi->format('d/m/Y')
                                        : '-'
                                    }}

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Tombol Aksi --}}
                    <div class="flex justify-end gap-3 mt-6">

                        <a href="{{ route('evaluasi.edit', $evaluasi->id) }}"
                           class="px-5 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 rounded-lg font-medium">
                            ✏ Edit
                        </a>

                        <form action="{{ route('evaluasi.destroy', $evaluasi->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus evaluasi ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="px-5 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-medium">
                                🗑 Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>