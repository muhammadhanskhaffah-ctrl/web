<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LaporanController extends Controller
{
    /**
     * ==========================================================
     * URL GOOGLE APPS SCRIPT
     * ==========================================================
     */

    private $peerReviewUrl =
        'https://script.google.com/macros/s/AKfycbw0ulu6GbWirg-pLdq4kLA0yg1Kr5WftCFMueryUwqQYrD3jFKjodmJw3K5gUn4X2mW/exec';

    private $supervisorReviewUrl =
        'https://script.google.com/macros/s/AKfycbxCEsX_-0Sc9NMHqzHflJbETmaXsp9g_NFhlh7tLmGs0z9Y2p-bnEwF-62wkML1vYF1cQ/exec';


    /**
     * ==========================================================
     * HALAMAN LAPORAN
     * ==========================================================
     */
    public function index(Request $request)
    {
        $karyawans = Karyawan::orderBy('nama')->get();

        $query = Monitoring::with([
            'karyawan',
            'goal'
        ]);

        if ($request->filled('karyawan_id')) {
            $query->where(
                'karyawan_id',
                $request->karyawan_id
            );
        }

        $monitorings = $query
            ->latest()
            ->get();

        $monitorings =
            $this->tambahkanEvaluasi360($monitorings);

        $totalMonitoring =
            $monitorings->count();

        $pencapaianBaik =
            $monitorings
                ->where('persentase', '>=', 80)
                ->count();

        $pencapaianSedang =
            $monitorings
                ->whereBetween(
                    'persentase',
                    [50, 79.99]
                )
                ->count();

        $pencapaianRendah =
            $monitorings
                ->where('persentase', '<', 50)
                ->count();

        $rataRata =
            $monitorings->avg('persentase') ?? 0;

        return view(
            'laporan.index',
            compact(
                'monitorings',
                'totalMonitoring',
                'pencapaianBaik',
                'pencapaianSedang',
                'pencapaianRendah',
                'rataRata',
                'karyawans'
            )
        );
    }


    /**
     * ==========================================================
     * HALAMAN CETAK LAPORAN
     * ==========================================================
     */
    public function cetak(Request $request)
    {
        $namaPenandatangan =
            $request->query(
                'nama_penandatangan',
                ''
            );

        $query = Monitoring::with([
            'karyawan',
            'goal'
        ]);

        if ($request->filled('karyawan_id')) {
            $query->where(
                'karyawan_id',
                $request->karyawan_id
            );
        }

        $monitorings =
            $query
                ->latest()
                ->get();

        $monitorings =
            $this->tambahkanEvaluasi360(
                $monitorings
            );

        $totalMonitoring =
            $monitorings->count();

        $pencapaianBaik =
            $monitorings
                ->where('persentase', '>=', 80)
                ->count();

        $pencapaianSedang =
            $monitorings
                ->whereBetween(
                    'persentase',
                    [50, 79.99]
                )
                ->count();

        $pencapaianRendah =
            $monitorings
                ->where('persentase', '<', 50)
                ->count();

        $rataRata =
            $monitorings->avg('persentase') ?? 0;

        return view(
            'laporan.cetak',
            compact(
                'monitorings',
                'totalMonitoring',
                'pencapaianBaik',
                'pencapaianSedang',
                'pencapaianRendah',
                'rataRata',
                'namaPenandatangan'
            )
        );
    }


    /**
     * ==========================================================
     * NORMALISASI NAMA
     * ==========================================================
     */
    private function normalisasiNama($nama)
    {
        return strtolower(
            trim(
                preg_replace(
                    '/\s+/',
                    ' ',
                    (string) $nama
                )
            )
        );
    }


    /**
     * ==========================================================
     * CARI KOLOM BERDASARKAN NAMA
     * ==========================================================
     *
     * Google Sheet kadang mengirim nama kolom dengan:
     *
     * - spasi berbeda
     * - line break
     * - tambahan karakter
     *
     * Jadi pencarian dibuat fleksibel.
     */
    private function ambilKolom($row, array $namaKolom)
    {
        /**
         * Coba exact match terlebih dahulu.
         */
        foreach ($namaKolom as $nama) {

            if (
                array_key_exists(
                    $nama,
                    $row
                )
            ) {
                return $row[$nama];
            }
        }


        /**
         * Normalisasi nama kolom.
         */
        $normalisasiKolom = function ($text) {

            return strtolower(
                trim(
                    preg_replace(
                        '/\s+/',
                        ' ',
                        (string) $text
                    )
                )
            );
        };


        /**
         * Coba cari berdasarkan nama
         * kolom yang sudah dinormalisasi.
         */
        foreach ($row as $key => $value) {

            $keyNormal =
                $normalisasiKolom($key);

            foreach ($namaKolom as $nama) {

                $namaNormal =
                    $normalisasiKolom($nama);

                if (
                    $keyNormal === $namaNormal
                ) {
                    return $value;
                }
            }
        }


        return null;
    }


    /**
     * ==========================================================
     * PARSE SKOR
     * ==========================================================
     */
    private function parseScore($value)
    {
        if ($value === null) {
            return null;
        }


        /**
         * Jika sudah berupa angka.
         */
        if (is_numeric($value)) {

            $number = (float) $value;

            if (
                $number >= 1 &&
                $number <= 5
            ) {
                return $number;
            }
        }


        $text =
            trim(
                (string) $value
            );


        /**
         * Contoh:
         *
         * 4 = pencapaian keseluruhan target
         */
        if (
            preg_match(
                '/(?:^|\s)([1-5])(?:\s|=|$)/',
                $text,
                $matches
            )
        ) {

            return (float) $matches[1];
        }


        /**
         * Contoh:
         *
         * 4.5
         * 3,5
         */
        if (
            preg_match(
                '/\b([1-5](?:[.,]\d+)?)\b/',
                $text,
                $matches
            )
        ) {

            $number =
                (float) str_replace(
                    ',',
                    '.',
                    $matches[1]
                );

            if (
                $number >= 1 &&
                $number <= 5
            ) {
                return $number;
            }
        }


        return null;
    }


    /**
     * ==========================================================
     * TAMBAHKAN DATA EVALUASI 360°
     * ==========================================================
     */
    private function tambahkanEvaluasi360($monitorings)
    {
        /**
         * ======================================================
         * AMBIL PEER REVIEW
         * ======================================================
         */

        $peerData = [];

        try {

            $responsePeer =
                Http::timeout(20)
                    ->get(
                        $this->peerReviewUrl
                    );

            if (
                $responsePeer->successful()
            ) {

                $jsonPeer =
                    $responsePeer->json();

                if (
                    isset(
                        $jsonPeer['success']
                    )
                    &&
                    $jsonPeer['success'] === true
                    &&
                    isset(
                        $jsonPeer['data']
                    )
                    &&
                    is_array(
                        $jsonPeer['data']
                    )
                ) {

                    $peerData =
                        $jsonPeer['data'];
                }
            }

        } catch (\Throwable $e) {

            $peerData = [];
        }


        /**
         * ======================================================
         * AMBIL SUPERVISOR REVIEW
         * ======================================================
         */

        $supervisorData = [];

        try {

            $responseSupervisor =
                Http::timeout(20)
                    ->get(
                        $this->supervisorReviewUrl
                    );

            if (
                $responseSupervisor->successful()
            ) {

                $jsonSupervisor =
                    $responseSupervisor->json();

                if (
                    isset(
                        $jsonSupervisor['success']
                    )
                    &&
                    $jsonSupervisor['success'] === true
                    &&
                    isset(
                        $jsonSupervisor['data']
                    )
                    &&
                    is_array(
                        $jsonSupervisor['data']
                    )
                ) {

                    $supervisorData =
                        $jsonSupervisor['data'];
                }
            }

        } catch (\Throwable $e) {

            $supervisorData = [];
        }


        /**
         * ======================================================
         * PROSES SETIAP MONITORING
         * ======================================================
         */

        foreach (
            $monitorings as $monitoring
        ) {

            /**
             * ==================================================
             * DEFAULT
             * ==================================================
             */

            $skorPeer = null;
            $skorSupervisor = null;

            $nilaiPeer = null;
            $nilaiSupervisor = null;

            $skor360 = null;
            $predikat360 = null;


            /**
             * ==================================================
             * DETAIL PEER
             * ==================================================
             */

            $kemahiranPeer = null;
            $kolaborasiPeer = null;
            $kepuasanPeer = null;


            /**
             * ==================================================
             * DETAIL SUPERVISOR
             * ==================================================
             */

            $skorKinerja = null;
            $kemahiranSupervisor = null;
            $kolaborasiSupervisor = null;
            $kepuasanSupervisor = null;
            $avgPerilakuSupervisor = null;


            /**
             * ==================================================
             * NAMA KARYAWAN
             * ==================================================
             */

            $namaKaryawan =
                $monitoring
                    ->karyawan
                    ->nama ?? '';

            $namaTarget =
                $this->normalisasiNama(
                    $namaKaryawan
                );


            /**
             * ==================================================
             * PEER REVIEW
             * ==================================================
             */

            $peerRows =
                collect($peerData)
                    ->filter(
                        function ($row)
                        use (
                            $namaTarget
                        ) {

                            /**
                             * Ambil nama reviewee.
                             *
                             * Nama kolom Google Form:
                             *
                             * NAMA LENGKAP REKAN KERJA
                             * YANG AKAN ANDA NILAI
                             */

                            $namaReviewee =
                                $this->ambilKolom(
                                    $row,
                                    [
                                        'NAMA LENGKAP REKAN KERJA YANG AKAN ANDA NILAI',
                                        'NAMA LENGKAP REKAN KERJA YANG AKAN ANDA NILAI '
                                    ]
                                );


                            /**
                             * Jika belum ketemu,
                             * cari berdasarkan key.
                             */
                            if (
                                $namaReviewee === null
                                ||
                                $namaReviewee === ''
                            ) {

                                foreach (
                                    $row as $key => $value
                                ) {

                                    $keyNormal =
                                        strtolower(
                                            trim(
                                                preg_replace(
                                                    '/\s+/',
                                                    ' ',
                                                    (string) $key
                                                )
                                            )
                                        );


                                    if (
                                        str_contains(
                                            $keyNormal,
                                            'nama lengkap rekan kerja'
                                        )
                                        &&
                                        str_contains(
                                            $keyNormal,
                                            'nilai'
                                        )
                                    ) {

                                        $namaReviewee =
                                            $value;

                                        break;
                                    }
                                }
                            }


                            return
                                $this->normalisasiNama(
                                    $namaReviewee
                                )
                                ===
                                $namaTarget;
                        }
                    )
                    ->values();


            /**
             * ==================================================
             * HITUNG PEER
             * ==================================================
             */

            if (
                $peerRows->count() > 0
            ) {

                $kemahiranValues = [];
                $kolaborasiValues = [];
                $kepuasanValues = [];


                foreach (
                    $peerRows as $row
                ) {

                    /**
                     * KEMAHIRAN
                     */
                    $nilai =
                        $this->parseScore(
                            $this->ambilKolom(
                                $row,
                                [
                                    '1. KEMAHIRAN UNTUK KUALITAS LAYANAN',
                                    'KEMAHIRAN UNTUK KUALITAS LAYANAN'
                                ]
                            )
                        );

                    if (
                        $nilai !== null
                    ) {

                        $kemahiranValues[] =
                            $nilai;
                    }


                    /**
                     * KOLABORASI
                     */
                    $nilai =
                        $this->parseScore(
                            $this->ambilKolom(
                                $row,
                                [
                                    '2. KOLABORASI TIM',
                                    'KOLABORASI TIM'
                                ]
                            )
                        );

                    if (
                        $nilai !== null
                    ) {

                        $kolaborasiValues[] =
                            $nilai;
                    }


                    /**
                     * KEPUASAN PELANGGAN
                     */
                    $nilai =
                        $this->parseScore(
                            $this->ambilKolom(
                                $row,
                                [
                                    '3. BERORIENTASI PADA KEPUASAN PELANGGAN',
                                    'BERORIENTASI PADA KEPUASAN PELANGGAN'
                                ]
                            )
                        );

                    if (
                        $nilai !== null
                    ) {

                        $kepuasanValues[] =
                            $nilai;
                    }
                }


                /**
                 * RATA-RATA KEMAHIRAN
                 */
                if (
                    count($kemahiranValues) > 0
                ) {

                    $kemahiranPeer =
                        array_sum(
                            $kemahiranValues
                        )
                        /
                        count(
                            $kemahiranValues
                        );
                }


                /**
                 * RATA-RATA KOLABORASI
                 */
                if (
                    count($kolaborasiValues) > 0
                ) {

                    $kolaborasiPeer =
                        array_sum(
                            $kolaborasiValues
                        )
                        /
                        count(
                            $kolaborasiValues
                        );
                }


                /**
                 * RATA-RATA KEPUASAN
                 */
                if (
                    count($kepuasanValues) > 0
                ) {

                    $kepuasanPeer =
                        array_sum(
                            $kepuasanValues
                        )
                        /
                        count(
                            $kepuasanValues
                        );
                }


                /**
                 * RATA-RATA PEER
                 */
                $peerIndicators =
                    array_filter(
                        [
                            $kemahiranPeer,
                            $kolaborasiPeer,
                            $kepuasanPeer
                        ],
                        fn ($value) =>
                            $value !== null
                    );


                if (
                    count($peerIndicators) > 0
                ) {

                    $skorPeer =
                        array_sum(
                            $peerIndicators
                        )
                        /
                        count(
                            $peerIndicators
                        );
                }
            }


            /**
             * ==================================================
             * NILAI PEER 30%
             * ==================================================
             */

            if (
                $skorPeer !== null
            ) {

                $nilaiPeer =
                    round(
                        $skorPeer * 0.30,
                        2
                    );
            }


            /**
             * ==================================================
             * SUPERVISOR REVIEW
             * ==================================================
             */

            $supervisorRows =
                collect(
                    $supervisorData
                )
                ->filter(
                    function ($row)
                    use (
                        $namaTarget
                    ) {

                        $namaAnggota =
                            $this->ambilKolom(
                                $row,
                                [
                                    'NAMA LENGKAP ANGGOTA TIM'
                                ]
                            );


                        return
                            $this->normalisasiNama(
                                $namaAnggota
                            )
                            ===
                            $namaTarget;
                    }
                )
                ->values();


            /**
             * ==================================================
             * HITUNG SUPERVISOR
             * ==================================================
             */

            if (
                $supervisorRows->count() > 0
            ) {

                $kinerjaValues = [];
                $kemahiranValues = [];
                $kolaborasiValues = [];
                $kepuasanValues = [];


                foreach (
                    $supervisorRows as $row
                ) {

                    /**
                     * SKOR KINERJA
                     */
                    $nilai =
                        $this->parseScore(
                            $this->ambilKolom(
                                $row,
                                [
                                    'SKOR KINERJA'
                                ]
                            )
                        );

                    if (
                        $nilai !== null
                    ) {

                        $kinerjaValues[] =
                            $nilai;
                    }


                    /**
                     * KEMAHIRAN
                     */
                    $nilai =
                        $this->parseScore(
                            $this->ambilKolom(
                                $row,
                                [
                                    '1. KEMAHIRAN UNTUK KUALITAS LAYANAN',
                                    'KEMAHIRAN UNTUK KUALITAS LAYANAN'
                                ]
                            )
                        );

                    if (
                        $nilai !== null
                    ) {

                        $kemahiranValues[] =
                            $nilai;
                    }


                    /**
                     * KOLABORASI
                     */
                    $nilai =
                        $this->parseScore(
                            $this->ambilKolom(
                                $row,
                                [
                                    '2. KOLABORASI TIM',
                                    'KOLABORASI TIM'
                                ]
                            )
                        );

                    if (
                        $nilai !== null
                    ) {

                        $kolaborasiValues[] =
                            $nilai;
                    }


                    /**
                     * KEPUASAN PELANGGAN
                     */
                    $nilai =
                        $this->parseScore(
                            $this->ambilKolom(
                                $row,
                                [
                                    '3. BERORIENTASI PADA KEPUASAN PELANGGAN',
                                    'BERORIENTASI PADA KEPUASAN PELANGGAN'
                                ]
                            )
                        );

                    if (
                        $nilai !== null
                    ) {

                        $kepuasanValues[] =
                            $nilai;
                    }
                }


                /**
                 * RATA-RATA SKOR KINERJA
                 */
                if (
                    count($kinerjaValues) > 0
                ) {

                    $skorKinerja =
                        array_sum(
                            $kinerjaValues
                        )
                        /
                        count(
                            $kinerjaValues
                        );
                }


                /**
                 * RATA-RATA KEMAHIRAN
                 */
                if (
                    count($kemahiranValues) > 0
                ) {

                    $kemahiranSupervisor =
                        array_sum(
                            $kemahiranValues
                        )
                        /
                        count(
                            $kemahiranValues
                        );
                }


                /**
                 * RATA-RATA KOLABORASI
                 */
                if (
                    count($kolaborasiValues) > 0
                ) {

                    $kolaborasiSupervisor =
                        array_sum(
                            $kolaborasiValues
                        )
                        /
                        count(
                            $kolaborasiValues
                        );
                }


                /**
                 * RATA-RATA KEPUASAN
                 */
                if (
                    count($kepuasanValues) > 0
                ) {

                    $kepuasanSupervisor =
                        array_sum(
                            $kepuasanValues
                        )
                        /
                        count(
                            $kepuasanValues
                        );
                }


                /**
                 * RATA-RATA PERILAKU
                 */
                $behaviorIndicators =
                    array_filter(
                        [
                            $kemahiranSupervisor,
                            $kolaborasiSupervisor,
                            $kepuasanSupervisor
                        ],
                        fn ($value) =>
                            $value !== null
                    );


                if (
                    count($behaviorIndicators) > 0
                ) {

                    $avgPerilakuSupervisor =
                        array_sum(
                            $behaviorIndicators
                        )
                        /
                        count(
                            $behaviorIndicators
                        );
                }


                /**
                 * ==================================================
                 * SKOR SUPERVISOR
                 * ==================================================
                 *
                 * 50% Kinerja
                 * 50% Perilaku
                 */

                if (
                    $skorKinerja !== null
                    &&
                    $avgPerilakuSupervisor !== null
                ) {

                    $skorSupervisor =
                        (
                            ($skorKinerja * 0.50)
                            +
                            ($avgPerilakuSupervisor * 0.50)
                        );
                }
            }


            /**
             * ==================================================
             * NILAI SUPERVISOR 70%
             * ==================================================
             */

            if (
                $skorSupervisor !== null
            ) {

                $nilaiSupervisor =
                    round(
                        $skorSupervisor * 0.70,
                        2
                    );
            }


            /**
             * ==================================================
             * FINAL SCORE 360°
             * ==================================================
             */

            if (
                $skorPeer !== null
                &&
                $skorSupervisor !== null
            ) {

                $skor360 =
                    round(
                        ($skorPeer * 0.30)
                        +
                        ($skorSupervisor * 0.70),
                        2
                    );


                /**
                 * KATEGORI
                 */
                if (
                    $skor360 >= 4.80
                ) {

                    $predikat360 =
                        'SUPERSTAR';

                } elseif (
                    $skor360 >= 4.25
                ) {

                    $predikat360 =
                        'ROCKSTAR';

                } elseif (
                    $skor360 >= 3.00
                ) {

                    $predikat360 =
                        'MEDIOCRE';

                } elseif (
                    $skor360 >= 2.00
                ) {

                    $predikat360 =
                        'LOW';

                } else {

                    $predikat360 =
                        'DEADWOOD';
                }
            }


            /**
             * ==================================================
             * SIMPAN KE OBJECT MONITORING
             * ==================================================
             */

            $monitoring->skor_peer =
                $skorPeer;

            $monitoring->skor_supervisor =
                $skorSupervisor;

            $monitoring->nilai_peer =
                $nilaiPeer;

            $monitoring->nilai_supervisor =
                $nilaiSupervisor;

            $monitoring->skor_360 =
                $skor360;

            $monitoring->predikat_360 =
                $predikat360;


            /**
             * ==================================================
             * DETAIL PEER
             * ==================================================
             */

            $monitoring->kemahiran_peer =
                $kemahiranPeer;

            $monitoring->kolaborasi_peer =
                $kolaborasiPeer;

            $monitoring->kepuasan_peer =
                $kepuasanPeer;


            /**
             * ==================================================
             * DETAIL SUPERVISOR
             * ==================================================
             */

            $monitoring->skor_kinerja =
                $skorKinerja;

            $monitoring->kemahiran_supervisor =
                $kemahiranSupervisor;

            $monitoring->kolaborasi_supervisor =
                $kolaborasiSupervisor;

            $monitoring->kepuasan_supervisor =
                $kepuasanSupervisor;

            $monitoring->avg_perilaku_supervisor =
                $avgPerilakuSupervisor;
        }


        return $monitorings;
    }
}