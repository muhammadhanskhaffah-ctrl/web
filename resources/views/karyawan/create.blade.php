<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Karyawan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-semibold mb-6">
                        Form Data Karyawan
                    </h3>

                    <form action="{{ route('karyawan.store') }}" method="POST">
                        @csrf

                        {{-- NIK --}}
                        <div class="mb-4">
                            <label for="nik" class="block font-medium text-sm text-gray-700">
                                NIK
                            </label>

                            <input
                                type="text"
                                name="nik"
                                id="nik"
                                value="{{ old('nik') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >

                            @error('nik')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Nama --}}
                        <div class="mb-4">
                            <label for="nama" class="block font-medium text-sm text-gray-700">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="nama"
                                id="nama"
                                value="{{ old('nama') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >

                            @error('nama')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Jabatan --}}
                        <div class="mb-4">
                            <label for="jabatan" class="block font-medium text-sm text-gray-700">
                                Jabatan
                            </label>

                            <input
                                type="text"
                                name="jabatan"
                                id="jabatan"
                                value="{{ old('jabatan') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >

                            @error('jabatan')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Departemen --}}
                        <div class="mb-4">
                            <label for="departemen" class="block font-medium text-sm text-gray-700">
                                Departemen
                            </label>

                            <input
                                type="text"
                                name="departemen"
                                id="departemen"
                                value="{{ old('departemen') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >

                            @error('departemen')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="mb-4">
                            <label for="jenis_kelamin" class="block font-medium text-sm text-gray-700">
                                Jenis Kelamin
                            </label>

                            <select
                                name="jenis_kelamin"
                                id="jenis_kelamin"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >
                                <option value="">-- Pilih Jenis Kelamin --</option>

                                <option
                                    value="Laki-laki"
                                    {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}
                                >
                                    Laki-laki
                                </option>

                                <option
                                    value="Perempuan"
                                    {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}
                                >
                                    Perempuan
                                </option>
                            </select>

                            @error('jenis_kelamin')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block font-medium text-sm text-gray-700">
                                Tanggal Lahir
                            </label>

                            <input
                                type="date"
                                name="tanggal_lahir"
                                id="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('tanggal_lahir')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-4">
                            <label for="alamat" class="block font-medium text-sm text-gray-700">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                id="alamat"
                                rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >{{ old('alamat') }}</textarea>

                            @error('alamat')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- No HP --}}
                        <div class="mb-4">
                            <label for="no_hp" class="block font-medium text-sm text-gray-700">
                                No. HP
                            </label>

                            <input
                                type="text"
                                name="no_hp"
                                id="no_hp"
                                value="{{ old('no_hp') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('no_hp')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Tanggal Masuk --}}
                        <div class="mb-6">
                            <label for="tanggal_masuk" class="block font-medium text-sm text-gray-700">
                                Tanggal Masuk
                            </label>

                            <input
                                type="date"
                                name="tanggal_masuk"
                                id="tanggal_masuk"
                                value="{{ old('tanggal_masuk') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('tanggal_masuk')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div style="display: flex; gap: 10px; margin-top: 20px;">

                            <button
                                type="submit"
                                style="
                                    background-color: #2563eb;
                                    color: white;
                                    padding: 10px 20px;
                                    border-radius: 6px;
                                    border: none;
                                    cursor: pointer;
                                    font-weight: 600;
                                "
                            >
                                Simpan
                            </button>

                            <a
                                href="{{ route('karyawan.index') }}"
                                style="
                                    background-color: #6b7280;
                                    color: white;
                                    padding: 10px 20px;
                                    border-radius: 6px;
                                    text-decoration: none;
                                    display: inline-block;
                                "
                            >
                                Kembali
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>