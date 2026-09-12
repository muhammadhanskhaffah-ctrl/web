<x-app-layout>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    {{-- HEADER --}}
                    <div class="flex justify-between items-center mb-6">

                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">
                                Edit Goal
                            </h2>

                            <p class="text-gray-500 mt-1">
                                Ubah target kinerja goal.
                            </p>
                        </div>

                        <a href="{{ route('goals.index') }}"
                           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg">
                            ← Kembali
                        </a>

                    </div>


                    {{-- PESAN ERROR --}}
                    @if ($errors->any())

                        <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">

                            <strong>Terjadi kesalahan:</strong>

                            <ul class="mt-2 list-disc list-inside">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- FORM --}}
                    <form action="{{ route('goals.update', $goal->id) }}"
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
                                        {{ old('karyawan_id', $goal->karyawan_id) == $karyawan->id ? 'selected' : '' }}>

                                        {{ $karyawan->nama }}
                                        - NIK: {{ $karyawan->nik }}

                                    </option>

                                @endforeach

                            </select>

                            @error('karyawan_id')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- NAMA GOAL --}}
                        <div class="mb-5">

                            <label for="nama_goal"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Goal
                            </label>

                            <input type="text"
                                   name="nama_goal"
                                   id="nama_goal"
                                   value="{{ old('nama_goal', $goal->nama_goal) }}"
                                   required
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('nama_goal')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- DESKRIPSI --}}
                        <div class="mb-5">

                            <label for="deskripsi"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi"
                                      id="deskripsi"
                                      rows="4"
                                      placeholder="Masukkan deskripsi goal..."
                                      class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('deskripsi', $goal->deskripsi) }}</textarea>

                            @error('deskripsi')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TYPE --}}
                        <div class="mb-5">

                            <label for="type"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Tipe Goal
                            </label>

                            <select name="type"
                                    id="type"
                                    required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    -- Pilih Tipe Goal --
                                </option>

                                <option value="Perusahaan"
                                    {{ old('type', $goal->tipe) == 'Perusahaan' ? 'selected' : '' }}>
                                    Perusahaan
                                </option>

                                <option value="Tim"
                                    {{ old('type', $goal->tipe) == 'Tim' ? 'selected' : '' }}>
                                    Tim
                                </option>

                                <option value="Individu"
                                    {{ old('type', $goal->tipe) == 'Individu' ? 'selected' : '' }}>
                                    Individu
                                </option>

                            </select>

                            @error('type')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TARGET --}}
                        <div class="mb-5">

                            <label for="target"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Target
                            </label>

                            <input type="number"
                                   name="target"
                                   id="target"
                                   value="{{ old('target', $goal->target) }}"
                                   min="0"
                                   step="0.01"
                                   required
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('target')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TANGGAL MULAI --}}
                        <div class="mb-5">

                            <label for="tanggal_mulai"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Mulai
                            </label>

                            <input type="date"
                                   name="tanggal_mulai"
                                   id="tanggal_mulai"
                                   value="{{ old(
                                       'tanggal_mulai',
                                       $goal->tanggal_mulai
                                           ? \Carbon\Carbon::parse($goal->tanggal_mulai)->format('Y-m-d')
                                           : ''
                                   ) }}"
                                   required
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('tanggal_mulai')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TANGGAL SELESAI --}}
                        <div class="mb-5">

                            <label for="tanggal_selesai"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Selesai
                            </label>

                            <input type="date"
                                   name="tanggal_selesai"
                                   id="tanggal_selesai"
                                   value="{{ old(
                                       'tanggal_selesai',
                                       $goal->tanggal_selesai
                                           ? \Carbon\Carbon::parse($goal->tanggal_selesai)->format('Y-m-d')
                                           : ''
                                   ) }}"
                                   required
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('tanggal_selesai')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- STATUS --}}
                        <div class="mb-6">

                            <label for="status"
                                   class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>

                            <select name="status"
                                    id="status"
                                    required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    -- Pilih Status --
                                </option>

                                <option value="Aktif"
                                    {{ old('status', $goal->status) == 'Aktif' ? 'selected' : '' }}>
                                    Aktif
                                </option>

                                <option value="Selesai"
                                    {{ old('status', $goal->status) == 'Selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>

                                <option value="Nonaktif"
                                    {{ old('status', $goal->status) == 'Nonaktif' ? 'selected' : '' }}>
                                    Nonaktif
                                </option>

                            </select>

                            @error('status')

                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- BUTTON --}}
                        <div class="flex justify-end items-center gap-3 mt-6">

                            <a href="{{ route('goals.index') }}"
                               style="
                                   display: inline-block;
                                   padding: 12px 20px;
                                   background-color: #e5e7eb;
                                   color: #374151;
                                   border-radius: 8px;
                                   text-decoration: none;
                                   font-weight: 500;
                               ">
                                ← Kembali
                            </a>

                            <button type="submit"
                                    style="
                                        display: inline-block;
                                        padding: 12px 20px;
                                        background-color: #2563eb;
                                        color: white;
                                        border: none;
                                        border-radius: 8px;
                                        font-weight: 600;
                                        cursor: pointer;
                                    ">
                                💾 Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout> 