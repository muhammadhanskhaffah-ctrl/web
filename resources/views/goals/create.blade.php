<x-app-layout>

    <div style="
        padding-top: 32px;
        padding-bottom: 32px;
        background-color: #f3f4f6;
        min-height: 100vh;
    ">

        <div style="
            max-width: 1250px;
            margin: 0 auto;
            padding: 0 24px;
        ">

            {{-- HEADER --}}
            <div style="margin-bottom: 24px;">

                <h2 style="
                    margin: 0;
                    font-size: 26px;
                    font-weight: 700;
                    color: #111827;
                ">
                    Goals Setting
                </h2>

                <p style="
                    margin-top: 6px;
                    font-size: 14px;
                    color: #6b7280;
                ">
                    Buat target kinerja baru untuk perusahaan, tim, atau individu.
                </p>

            </div>


            {{-- CARD --}}
            <div style="
                background-color: #ffffff;
                border-radius: 12px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.08);
                overflow: hidden;
            ">

                {{-- JUDUL FORM --}}
                <div style="
                    padding: 24px;
                    border-bottom: 1px solid #e5e7eb;
                ">

                    <h3 style="
                        margin: 0;
                        font-size: 20px;
                        font-weight: 700;
                        color: #111827;
                    ">
                        Form Goals Setting
                    </h3>

                    <p style="
                        margin-top: 6px;
                        margin-bottom: 0;
                        font-size: 14px;
                        color: #6b7280;
                    ">
                        Isi data goal dengan lengkap.
                    </p>

                </div>


                {{-- FORM --}}
                <form action="{{ route('goals.store') }}" method="POST">

                    @csrf

                    <div style="padding: 24px;">


                        {{-- KARYAWAN --}}
                        <div style="margin-bottom: 22px;">

                            <label for="karyawan_id"
                                   style="
                                       display: block;
                                       margin-bottom: 8px;
                                       font-size: 14px;
                                       font-weight: 600;
                                       color: #374151;
                                   ">
                                Karyawan
                            </label>

                            <select
                                id="karyawan_id"
                                name="karyawan_id"
                                required
                                style="
                                    width: 100%;
                                    box-sizing: border-box;
                                    padding: 12px 14px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                    color: #111827;
                                    background-color: #ffffff;
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
                                    margin-top: 6px;
                                    color: #dc2626;
                                    font-size: 13px;
                                ">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- NAMA GOAL --}}
                        <div style="margin-bottom: 22px;">

                            <label for="nama_goal"
                                   style="
                                       display: block;
                                       margin-bottom: 8px;
                                       font-size: 14px;
                                       font-weight: 600;
                                       color: #374151;
                                   ">
                                Nama Goal
                            </label>

                            <input
                                type="text"
                                id="nama_goal"
                                name="nama_goal"
                                value="{{ old('nama_goal') }}"
                                placeholder="Contoh: Meningkatkan Produktivitas Produksi"
                                required
                                style="
                                    width: 100%;
                                    box-sizing: border-box;
                                    padding: 12px 14px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                    color: #111827;
                                    background-color: #ffffff;
                                    outline: none;
                                "
                            >

                            @error('nama_goal')

                                <p style="
                                    margin-top: 6px;
                                    color: #dc2626;
                                    font-size: 13px;
                                ">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- DESKRIPSI --}}
                        <div style="margin-bottom: 22px;">

                            <label for="deskripsi"
                                   style="
                                       display: block;
                                       margin-bottom: 8px;
                                       font-size: 14px;
                                       font-weight: 600;
                                       color: #374151;
                                   ">
                                Deskripsi
                            </label>

                            <textarea
                                id="deskripsi"
                                name="deskripsi"
                                rows="4"
                                placeholder="Jelaskan tujuan atau target yang ingin dicapai..."
                                required
                                style="
                                    width: 100%;
                                    box-sizing: border-box;
                                    padding: 12px 14px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                    color: #111827;
                                    background-color: #ffffff;
                                    resize: vertical;
                                    outline: none;
                                "
                            >{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')

                                <p style="
                                    margin-top: 6px;
                                    color: #dc2626;
                                    font-size: 13px;
                                ">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TIPE GOAL --}}
                        <div style="margin-bottom: 22px;">

                            <label for="type"
                                   style="
                                       display: block;
                                       margin-bottom: 8px;
                                       font-size: 14px;
                                       font-weight: 600;
                                       color: #374151;
                                   ">
                                Tipe Goal
                            </label>

                            <select
                                id="type"
                                name="type"
                                required
                                style="
                                    width: 100%;
                                    box-sizing: border-box;
                                    padding: 12px 14px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                    color: #111827;
                                    background-color: #ffffff;
                                    outline: none;
                                "
                            >

                                <option value="">
                                    -- Pilih Tipe Goal --
                                </option>

                                <option value="Perusahaan"
                                    {{ old('type') == 'Perusahaan' ? 'selected' : '' }}>
                                    Perusahaan
                                </option>

                                <option value="Tim"
                                    {{ old('type') == 'Tim' ? 'selected' : '' }}>
                                    Tim
                                </option>

                                <option value="Individu"
                                    {{ old('type', 'Individu') == 'Individu' ? 'selected' : '' }}>
                                    Individu
                                </option>

                            </select>

                            @error('type')

                                <p style="
                                    margin-top: 6px;
                                    color: #dc2626;
                                    font-size: 13px;
                                ">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TARGET --}}
                        <div style="margin-bottom: 22px;">

                            <label for="target"
                                   style="
                                       display: block;
                                       margin-bottom: 8px;
                                       font-size: 14px;
                                       font-weight: 600;
                                       color: #374151;
                                   ">
                                Target
                            </label>

                            <input
                                type="number"
                                id="target"
                                name="target"
                                value="{{ old('target') }}"
                                placeholder="Contoh: 100"
                                min="0"
                                step="0.01"
                                required
                                style="
                                    width: 100%;
                                    box-sizing: border-box;
                                    padding: 12px 14px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                    color: #111827;
                                    background-color: #ffffff;
                                    outline: none;
                                "
                            >

                            @error('target')

                                <p style="
                                    margin-top: 6px;
                                    color: #dc2626;
                                    font-size: 13px;
                                ">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TANGGAL MULAI --}}
                        <div style="margin-bottom: 22px;">

                            <label for="tanggal_mulai"
                                   style="
                                       display: block;
                                       margin-bottom: 8px;
                                       font-size: 14px;
                                       font-weight: 600;
                                       color: #374151;
                                   ">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                id="tanggal_mulai"
                                name="tanggal_mulai"
                                value="{{ old('tanggal_mulai') }}"
                                required
                                style="
                                    width: 100%;
                                    box-sizing: border-box;
                                    padding: 12px 14px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                    color: #111827;
                                    background-color: #ffffff;
                                    outline: none;
                                "
                            >

                            @error('tanggal_mulai')

                                <p style="
                                    margin-top: 6px;
                                    color: #dc2626;
                                    font-size: 13px;
                                ">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- TANGGAL SELESAI --}}
                        <div style="margin-bottom: 22px;">

                            <label for="tanggal_selesai"
                                   style="
                                       display: block;
                                       margin-bottom: 8px;
                                       font-size: 14px;
                                       font-weight: 600;
                                       color: #374151;
                                   ">
                                Tanggal Selesai
                            </label>

                            <input
                                type="date"
                                id="tanggal_selesai"
                                name="tanggal_selesai"
                                value="{{ old('tanggal_selesai') }}"
                                required
                                style="
                                    width: 100%;
                                    box-sizing: border-box;
                                    padding: 12px 14px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                    color: #111827;
                                    background-color: #ffffff;
                                    outline: none;
                                "
                            >

                            @error('tanggal_selesai')

                                <p style="
                                    margin-top: 6px;
                                    color: #dc2626;
                                    font-size: 13px;
                                ">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- STATUS --}}
                        <div style="margin-bottom: 5px;">

                            <label for="status"
                                   style="
                                       display: block;
                                       margin-bottom: 8px;
                                       font-size: 14px;
                                       font-weight: 600;
                                       color: #374151;
                                   ">
                                Status
                            </label>

                            <select
                                id="status"
                                name="status"
                                required
                                style="
                                    width: 100%;
                                    box-sizing: border-box;
                                    padding: 12px 14px;
                                    border: 1px solid #d1d5db;
                                    border-radius: 8px;
                                    font-size: 14px;
                                    color: #111827;
                                    background-color: #ffffff;
                                    outline: none;
                                "
                            >

                                <option value="Aktif"
                                    {{ old('status', 'Aktif') == 'Aktif' ? 'selected' : '' }}>
                                    Aktif
                                </option>

                                <option value="Selesai"
                                    {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>

                                <option value="Nonaktif"
                                    {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>
                                    Nonaktif
                                </option>

                            </select>

                            @error('status')

                                <p style="
                                    margin-top: 6px;
                                    color: #dc2626;
                                    font-size: 13px;
                                ">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                    </div>


                    {{-- BAGIAN TOMBOL --}}
                    <div style="
                        padding: 20px 24px;
                        border-top: 1px solid #e5e7eb;
                        background-color: #f9fafb;
                    ">

                        <div style="
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            width: 100%;
                        ">


                            {{-- KEMBALI --}}
                            <a href="{{ route('goals.index') }}"
                               style="
                                   display: inline-flex;
                                   align-items: center;
                                   justify-content: center;
                                   padding: 12px 22px;
                                   background-color: #6b7280;
                                   color: #ffffff;
                                   font-size: 14px;
                                   font-weight: 600;
                                   border-radius: 8px;
                                   text-decoration: none;
                                   box-shadow: 0 2px 5px rgba(0,0,0,0.15);
                               ">

                                ←&nbsp; Kembali

                            </a>


                            {{-- SIMPAN GOAL --}}
                            <button
                                type="submit"
                                style="
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    padding: 12px 28px;
                                    background-color: #2563eb;
                                    color: #ffffff;
                                    font-size: 14px;
                                    font-weight: 700;
                                    border: none;
                                    border-radius: 8px;
                                    cursor: pointer;
                                    box-shadow: 0 3px 8px rgba(37,99,235,0.35);
                                "
                            >

                                ✓&nbsp; Simpan Goal

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>