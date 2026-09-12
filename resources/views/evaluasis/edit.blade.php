<x-app-layout>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    {{-- HEADER --}}
                    <div class="flex justify-between items-center mb-6">

                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">
                                Edit Evaluasi Kinerja
                            </h2>

                            <p class="text-gray-500 mt-1">
                                Perbarui data evaluasi kinerja karyawan.
                            </p>
                        </div>

                        <a href="{{ route('evaluasi.index') }}"
                           style="
                                display: inline-block;
                                padding: 10px 18px;
                                background-color: #e5e7eb;
                                color: #374151;
                                border-radius: 8px;
                                text-decoration: none;
                                font-weight: 600;
                           ">
                            ← Kembali
                        </a>

                    </div>


                    {{-- PESAN ERROR --}}
                    @if ($errors->any())

                        <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">

                            <strong>Terjadi kesalahan:</strong>

                            <ul class="mt-2 list-disc list-inside">

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- FORM --}}
                    <form action="{{ route('evaluasi.update', $evaluasi->id) }}"
                          method="POST">

                        @csrf

                        @method('PUT')


                        {{-- KARYAWAN --}}
                        <div class="mb-5">

                            <label for="karyawan_id"
                                   class="block text-sm font-medium text-gray-700 mb-2">

                                Karyawan

                            </label>


                            <select name="karyawan_id"
                                    id="karyawan_id"
                                    required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    -- Pilih Karyawan --
                                </option>


                                @foreach ($karyawans as $karyawan)

                                    <option value="{{ $karyawan->id }}"
                                        {{ old('karyawan_id', $evaluasi->karyawan_id) == $karyawan->id ? 'selected' : '' }}>

                                        {{ $karyawan->nama }}
                                        - NIK: {{ $karyawan->nik }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- GOALS --}}
                        <div class="mb-5">

                            <label for="goal_id"
                                   class="block text-sm font-medium text-gray-700 mb-2">

                                Goals

                            </label>


                            <select name="goal_id"
                                    id="goal_id"
                                    required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    -- Pilih Goals --
                                </option>


                                @foreach ($goals as $goal)

                                    <option value="{{ $goal->id }}"
                                        {{ old('goal_id', $evaluasi->goal_id) == $goal->id ? 'selected' : '' }}>

                                        {{ $goal->nama_goal }}

                                        @if ($goal->karyawan)

                                            - {{ $goal->karyawan->nama }}

                                        @endif

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- JENIS EVALUASI --}}
                        <div class="mb-5">

                            <label for="jenis_evaluasi"
                                   class="block text-sm font-medium text-gray-700 mb-2">

                                Jenis Evaluasi

                            </label>


                            <select name="jenis_evaluasi"
                                    id="jenis_evaluasi"
                                    required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    -- Pilih Jenis Evaluasi --
                                </option>


                                <option value="self"
                                    {{ old('jenis_evaluasi', $evaluasi->jenis_evaluasi) == 'self' ? 'selected' : '' }}>

                                    Self Evaluation

                                </option>


                                <option value="peer"
                                    {{ old('jenis_evaluasi', $evaluasi->jenis_evaluasi) == 'peer' ? 'selected' : '' }}>

                                    Peer Review

                                </option>


                                <option value="supervisor"
                                    {{ old('jenis_evaluasi', $evaluasi->jenis_evaluasi) == 'supervisor' ? 'selected' : '' }}>

                                    Supervisor Review

                                </option>

                            </select>

                        </div>


                        {{-- SKOR --}}
                        <div class="mb-5">

                            <label for="skor"
                                   class="block text-sm font-medium text-gray-700 mb-2">

                                Skor Evaluasi

                            </label>


                            <select name="skor"
                                    id="skor"
                                    required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    -- Pilih Skor --
                                </option>


                                @for ($i = 1; $i <= 5; $i++)

                                    <option value="{{ $i }}"
                                        {{ old('skor', $evaluasi->skor) == $i ? 'selected' : '' }}>

                                        {{ $i }} / 5

                                    </option>

                                @endfor

                            </select>

                        </div>


                        {{-- KOMENTAR --}}
                        <div class="mb-5">

                            <label for="komentar"
                                   class="block text-sm font-medium text-gray-700 mb-2">

                                Komentar

                            </label>


                            <textarea name="komentar"
                                      id="komentar"
                                      rows="5"
                                      placeholder="Masukkan komentar evaluasi..."
                                      class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('komentar', $evaluasi->komentar) }}</textarea>

                        </div>


                        {{-- TANGGAL --}}
                        <div class="mb-6">

                            <label for="tanggal_evaluasi"
                                   class="block text-sm font-medium text-gray-700 mb-2">

                                Tanggal Evaluasi

                            </label>


                            <input type="date"
                                   name="tanggal_evaluasi"
                                   id="tanggal_evaluasi"
                                   value="{{ old('tanggal_evaluasi', $evaluasi->tanggal_evaluasi ? $evaluasi->tanggal_evaluasi->format('Y-m-d') : '') }}"
                                   required
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- BUTTON --}}
                        <div style="
                            display: flex;
                            justify-content: flex-end;
                            align-items: center;
                            gap: 12px;
                            margin-top: 25px;
                            padding-top: 10px;
                        ">


                            {{-- TOMBOL BATAL --}}
                            <a href="{{ route('evaluasi.index') }}"
                               style="
                                    display: inline-block;
                                    padding: 12px 22px;
                                    background-color: #e5e7eb;
                                    color: #374151;
                                    border-radius: 8px;
                                    text-decoration: none;
                                    font-weight: 600;
                                    cursor: pointer;
                               ">

                                Batal

                            </a>


                            {{-- TOMBOL UPDATE --}}
                            <button type="submit"
                                    style="
                                        display: inline-block;
                                        padding: 12px 22px;
                                        background-color: #2563eb;
                                        color: #ffffff;
                                        border: none;
                                        border-radius: 8px;
                                        font-weight: 600;
                                        cursor: pointer;
                                        font-size: 14px;
                                    ">

                                💾 Update Evaluasi

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>