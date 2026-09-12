<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Jalankan seeder database karyawan.
     */
    public function run(): void
    {
        $karyawans = [

            [
                'nik' => 'KRY001',
                'nama' => 'AANG NURDIAMAN ANSHORI',
                'jabatan' => 'PRESIDENT DIRECTOR',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1978-03-23',
                'alamat' => 'Jl. Aria Timur III No 12 Bandung',
                'no_hp' => null,
                'tanggal_masuk' => null,
            ],

            [
                'nik' => 'KRY002',
                'nama' => 'CUCU SUPARTINI',
                'jabatan' => 'BUSINNES UNIT',
                'departemen' => '-',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1976-02-22',
                'alamat' => 'Jl. Cihampelas Cimaung no. 168 / 25 RT 06 RW O7 Bandung 40116',
                'no_hp' => null,
                'tanggal_masuk' => '2017-07-16',
            ],

            [
                'nik' => 'KRY003',
                'nama' => 'M SABIQ HASANUDDIN',
                'jabatan' => 'BUSINNES UNIT',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1976-05-12',
                'alamat' => 'Lingkungan Karangtengah Dusun Manggung RT01 RW09, Kelurahan Cangakan 57712, Kecamatan Karanganyar, Kabupaten Karanganyar, Propinsi Jawa Tengah, Indonesia',
                'no_hp' => null,
                'tanggal_masuk' => '2018-08-01',
            ],

            [
                'nik' => 'KRY004',
                'nama' => 'DEWI DARMILA NINGRUM',
                'jabatan' => 'OFFICE MANAGER',
                'departemen' => '-',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1981-01-29',
                'alamat' => 'Pasadena Residence Jl. Seruni E1 No.2 . Kota Bandung 40224.',
                'no_hp' => null,
                'tanggal_masuk' => '2013-04-29',
            ],

            [
                'nik' => 'KRY005',
                'nama' => 'MEGA AYU LESTARI',
                'jabatan' => 'HRD, GA',
                'departemen' => '-',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1999-06-06',
                'alamat' => 'Jl.Cipoondoh RT 06 RW 06 Desa Cinunuk Kecamatan Cileunyi Kabupaten Bandung',
                'no_hp' => null,
                'tanggal_masuk' => '2018-05-06',
            ],

            [
                'nik' => 'KRY006',
                'nama' => 'YOGA FIRMANSYAH',
                'jabatan' => 'UMUM K3',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1994-01-02',
                'alamat' => 'Dsn. Gudang RT 01/02, Ds. Gudang, Kec. Tanjungsari, Kab. Sumedang',
                'no_hp' => null,
                'tanggal_masuk' => '2016-12-01',
            ],

            [
                'nik' => 'KRY007',
                'nama' => 'ADI KURNIAWAN',
                'jabatan' => 'AFTER SALES MANAGER',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1979-05-30',
                'alamat' => 'komplek Jakapurwa Blok H no 7, kelurahan kujang sari, kecamatan Bandung kidul',
                'no_hp' => null,
                'tanggal_masuk' => '2017-02-05',
            ],

            [
                'nik' => 'KRY008',
                'nama' => 'CUN CUN SAFA’AT',
                'jabatan' => 'AFTER SALES',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1979-10-15',
                'alamat' => 'Kp.panjalu rt.02/04 Ds.parungseah kec.sukabumi kab.sukabumi',
                'no_hp' => null,
                'tanggal_masuk' => '2019-03-11',
            ],

            [
                'nik' => 'KRY009',
                'nama' => 'PIPING SANTOSA',
                'jabatan' => 'AFTER SALES',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1974-06-14',
                'alamat' => 'Kp.sukasirna RW.04/RT 02. Desa Sukaluyu kec.sukawening.kb. Garut.',
                'no_hp' => null,
                'tanggal_masuk' => '2016-06-14',
            ],

            [
                'nik' => 'KRY010',
                'nama' => 'ASEP GIRI ARISANDI',
                'jabatan' => 'AFTER SALES',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1986-12-09',
                'alamat' => 'Kp lio rt 01 rw 08 kec baleendah kel jelekong kab bandung',
                'no_hp' => null,
                'tanggal_masuk' => '2020-02-01',
            ],

            [
                'nik' => 'KRY011',
                'nama' => 'DEDI ROHIMAT',
                'jabatan' => 'AFTER SALES',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1976-10-14',
                'alamat' => 'Jl. Halteu Selatan RT 002 RW 003 Dungus Cariang Andir Kota Bandung Jawa Barat 40183',
                'no_hp' => null,
                'tanggal_masuk' => '2020-12-07',
            ],

            [
                'nik' => 'KRY012',
                'nama' => 'SUKEMI',
                'jabatan' => 'AFTER SALES',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1977-05-17',
                'alamat' => 'Perum. Linggar Jaya Baru Blok H no.8, Rt.06 / Rw.08, Desa Jelegong Kec.Racaekek, Kab Bandung',
                'no_hp' => null,
                'tanggal_masuk' => '2023-07-05',
            ],

            [
                'nik' => 'KRY013',
                'nama' => 'DODO ISWANTO',
                'jabatan' => 'AFTER SALES',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1980-07-06',
                'alamat' => 'Dukuh Duwet,Kel.andong kec andong kab Boyolali',
                'no_hp' => null,
                'tanggal_masuk' => '2022-01-10',
            ],

            [
                'nik' => 'KRY014',
                'nama' => 'ASEP DODIH',
                'jabatan' => 'SECURITY',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1995-04-03',
                'alamat' => 'Jl. Karasak Lama gg Ngampar',
                'no_hp' => null,
                'tanggal_masuk' => '2024-01-01',
            ],

            [
                'nik' => 'KRY015',
                'nama' => 'AJI TRIYANTO',
                'jabatan' => 'DRIVER',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1986-01-11',
                'alamat' => 'Jl. Gagak Dalam Cikapayang',
                'no_hp' => null,
                'tanggal_masuk' => '2024-05-02',
            ],

            [
                'nik' => 'KRY016',
                'nama' => 'INTAN ROHMAWANTI',
                'jabatan' => 'ADM',
                'departemen' => '-',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1989-09-12',
                'alamat' => 'Gayam Sukoharjo Jawa Tengah',
                'no_hp' => null,
                'tanggal_masuk' => '2024-12-02',
            ],

            [
                'nik' => 'KRY017',
                'nama' => 'RITA',
                'jabatan' => 'PURCHASING',
                'departemen' => '-',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1976-01-10',
                'alamat' => 'Jl. Aria Timur 4 No. 4',
                'no_hp' => null,
                'tanggal_masuk' => '2024-12-11',
            ],

            [
                'nik' => 'KRY018',
                'nama' => 'ENDE SUGANDI',
                'jabatan' => 'BUSINNES UNIT',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1970-08-29',
                'alamat' => 'Jl. Cemara Blok. H No. 51',
                'no_hp' => null,
                'tanggal_masuk' => '2026-04-01',
            ],

            [
                'nik' => 'KRY019',
                'nama' => 'ARI FAZRIN FITRIAN',
                'jabatan' => 'BUSINNES UNIT',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2026-05-06',
                'alamat' => 'Kiwari Residence Blok 9X',
                'no_hp' => null,
                'tanggal_masuk' => '2026-06-02',
            ],

            [
                'nik' => 'KRY020',
                'nama' => 'HANIF MUKTIADI',
                'jabatan' => 'BUSINNES UNIT',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1967-11-12',
                'alamat' => 'Jl. Baturaden VI No. 6',
                'no_hp' => null,
                'tanggal_masuk' => '2026-05-04',
            ],

            [
                'nik' => 'KRY021',
                'nama' => 'ROHMAT',
                'jabatan' => 'DRIVER',
                'departemen' => '-',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2026-05-12',
                'alamat' => 'Rusunawa Rancacili Tower 8 Blok 2 Lantai 3 No. 2',
                'no_hp' => null,
                'tanggal_masuk' => null,
            ],
        ];

        foreach ($karyawans as $karyawan) {
            Karyawan::updateOrCreate(
                ['nik' => $karyawan['nik']],
                $karyawan
            );
        }
    }
}