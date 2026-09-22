<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Karyawan;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EvaluasiController extends Controller
{
    /**
     * ==========================================================
     * INDEX
     * ==========================================================
     */
    public function index()
    {
        $evaluasis = Evaluasi::with([
            'karyawan',
            'goal'
        ])
        ->latest('tanggal_evaluasi')
        ->get();

        return view('evaluasis.index', compact('evaluasis'));
    }


    /**
     * ==========================================================
     * CREATE
     * ==========================================================
     */
    public function create()
    {
        $karyawans = Karyawan::orderBy('nama')->get();

        $goals = Goal::with('karyawan')
            ->orderBy('nama_goal')
            ->get();

        return view('evaluasis.create', compact(
            'karyawans',
            'goals'
        ));
    }


    /**
     * ==========================================================
     * STORE
     * ==========================================================
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'goal_id' => 'required|exists:goals,id',
            'jenis_evaluasi' => 'required|in:self,peer,supervisor',
            'skor' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
            'tanggal_evaluasi' => 'required|date',
        ]);

        Evaluasi::create($validated);

        return redirect()
            ->route('evaluasi.index')
            ->with('success', 'Evaluasi berhasil ditambahkan.');
    }


    /**
     * ==========================================================
     * SHOW
     * ==========================================================
     */
    public function show(Evaluasi $evaluasi)
    {
        $evaluasi->load([
            'karyawan',
            'goal'
        ]);

        return view('evaluasis.show', compact('evaluasi'));
    }


    /**
     * ==========================================================
     * EDIT
     * ==========================================================
     */
    public function edit(Evaluasi $evaluasi)
    {
        $karyawans = Karyawan::orderBy('nama')->get();

        $goals = Goal::with('karyawan')
            ->orderBy('nama_goal')
            ->get();

        return view('evaluasis.edit', compact(
            'evaluasi',
            'karyawans',
            'goals'
        ));
    }


    /**
     * ==========================================================
     * UPDATE
     * ==========================================================
     */
    public function update(Request $request, Evaluasi $evaluasi)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'goal_id' => 'required|exists:goals,id',
            'jenis_evaluasi' => 'required|in:self,peer,supervisor',
            'skor' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
            'tanggal_evaluasi' => 'required|date',
        ]);

        $evaluasi->update($validated);

        return redirect()
            ->route('evaluasi.index')
            ->with('success', 'Evaluasi berhasil diperbarui.');
    }


    /**
     * ==========================================================
     * DESTROY
     * ==========================================================
     */
    public function destroy(Evaluasi $evaluasi)
    {
        $evaluasi->delete();

        return redirect()
            ->route('evaluasi.index')
            ->with('success', 'Evaluasi berhasil dihapus.');
    }


    /**
     * ==========================================================
     * SELF REVIEW
     * ==========================================================
     */
    public function selfReview()
    {
        $url = 'https://script.google.com/macros/s/AKfycbxjbaun7T4kaQGJ0nX8azxCFWTno_FZuPSx_2gWdDPWv3tLRHgV_KC0ZtP8hhvkBhMX/exec';

        try {

            $response = Http::timeout(20)->get($url);

            if (!$response->successful()) {

                return view('evaluasis.self-review', [
                    'success' => false,
                    'total' => 0,
                    'data' => [],
                    'message' => 'Gagal mengambil data dari Google Sheets.'
                ]);
            }

            $result = $response->json();

            if (!isset($result['success']) || !$result['success']) {

                return view('evaluasis.self-review', [
                    'success' => false,
                    'total' => 0,
                    'data' => [],
                    'message' =>
                        $result['message']
                        ?? 'Data Google Sheets tidak dapat diambil.'
                ]);
            }

            $data = $result['data'] ?? [];

            $total = $result['total']
                ?? count($data);

            return view('evaluasis.self-review', [
                'success' => true,
                'total' => $total,
                'data' => $data,
                'message' => null
            ]);

        } catch (\Exception $e) {

            return view('evaluasis.self-review', [
                'success' => false,
                'total' => 0,
                'data' => [],
                'message' =>
                    'Terjadi kesalahan saat menghubungkan ke Google Sheets: '
                    . $e->getMessage()
            ]);
        }
    }


    /**
     * ==========================================================
     * PEER REVIEW
     * ==========================================================
     */
    public function peerReview()
    {
        $url = 'https://script.google.com/macros/s/AKfycbw0ulu6GbWirg-pLdq4kLA0yg1Kr5WftCFMueryUwqQYrD3jFKjodmJw3K5gUn4X2mW/exec';

        try {

            $response = Http::timeout(20)->get($url);

            if (!$response->successful()) {

                return view('evaluasis.peer-review', [
                    'success' => false,
                    'total' => 0,
                    'data' => [],
                    'message' =>
                        'Gagal mengambil data Peer Review dari Google Sheets.'
                ]);
            }

            $result = $response->json();

            if (!isset($result['success']) || !$result['success']) {

                return view('evaluasis.peer-review', [
                    'success' => false,
                    'total' => 0,
                    'data' => [],
                    'message' =>
                        $result['message']
                        ?? 'Data Peer Review tidak dapat diambil.'
                ]);
            }

            $data = $result['data'] ?? [];

            $total = $result['total']
                ?? count($data);

            return view('evaluasis.peer-review', [
                'success' => true,
                'total' => $total,
                'data' => $data,
                'message' => null
            ]);

        } catch (\Exception $e) {

            return view('evaluasis.peer-review', [
                'success' => false,
                'total' => 0,
                'data' => [],
                'message' =>
                    'Terjadi kesalahan saat menghubungkan ke Google Sheets Peer Review: '
                    . $e->getMessage()
            ]);
        }
    }


    /**
     * ==========================================================
     * SUPERVISOR REVIEW
     * ==========================================================
     */
    public function supervisorReview()
    {
        $url = 'https://script.google.com/macros/s/AKfycbxCEsX_-0Sc9NMHqzHflJbETmaXsp9g_NFhlh7tLmGs0z9Y2p-bnEwF-62wkML1vYF1cQ/exec';

        try {

            $response = Http::timeout(20)->get($url);

            if (!$response->successful()) {

                return view('evaluasis.supervisor-review', [
                    'success' => false,
                    'total' => 0,
                    'data' => [],
                    'message' =>
                        'Gagal mengambil data Supervisor Review dari Google Sheets.'
                ]);
            }

            $result = $response->json();

            if (!isset($result['success']) || !$result['success']) {

                return view('evaluasis.supervisor-review', [
                    'success' => false,
                    'total' => 0,
                    'data' => [],
                    'message' =>
                        $result['message']
                        ?? 'Data Supervisor Review tidak dapat diambil.'
                ]);
            }

            $data = $result['data'] ?? [];

            $total = $result['total']
                ?? count($data);

            return view('evaluasis.supervisor-review', [
                'success' => true,
                'total' => $total,
                'data' => $data,
                'message' => null
            ]);

        } catch (\Exception $e) {

            return view('evaluasis.supervisor-review', [
                'success' => false,
                'total' => 0,
                'data' => [],
                'message' =>
                    'Terjadi kesalahan saat menghubungkan ke Google Sheets Supervisor Review: '
                    . $e->getMessage()
            ]);
        }
    }


    /**
     * ==========================================================
     * HASIL EVALUASI 360°
     * ==========================================================
     *
     * Rumus:
     *
     * PEER REVIEW
     * ------------------------------------------
     * (Kemahiran + Kolaborasi + Kepuasan) / 3
     *
     * SUPERVISOR REVIEW
     * ------------------------------------------
     * (Skor Kinerja × 50%)
     * +
     * (Rata-rata Perilaku × 50%)
     *
     * FINAL 360
     * ------------------------------------------
     * (Peer × 30%)
     * +
     * (Supervisor × 70%)
     */
    public function hasil360(int $karyawanId, int $goalId)
    {
        /*
        |--------------------------------------------------------------------------
        | KARYAWAN DAN GOAL
        |--------------------------------------------------------------------------
        */

        $karyawan = Karyawan::findOrFail($karyawanId);

        $goal = Goal::findOrFail($goalId);


        /*
        |--------------------------------------------------------------------------
        | URL GOOGLE APPS SCRIPT
        |--------------------------------------------------------------------------
        */

        $peerUrl =
            'https://script.google.com/macros/s/AKfycbw0ulu6GbWirg-pLdq4kLA0yg1Kr5WftCFMueryUwqQYrD3jFKjodmJw3K5gUn4X2mW/exec';

        $supervisorUrl =
            'https://script.google.com/macros/s/AKfycbxCEsX_-0Sc9NMHqzHflJbETmaXsp9g_NFhlh7tLmGs0z9Y2p-bnEwF-62wkML1vYF1cQ/exec';


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA PEER DAN SUPERVISOR
        |--------------------------------------------------------------------------
        */

        try {

            $peerResponse = Http::timeout(20)->get($peerUrl);

            $supervisorResponse =
                Http::timeout(20)->get($supervisorUrl);

        } catch (\Exception $e) {

            return view('evaluasis.hasil360', [

                'lengkap' => false,

                'karyawan' => $karyawan,

                'goal' => $goal,

                'peer' => null,

                'supervisor' => null,

                'nilaiPeer' => null,

                'nilaiSupervisor' => null,

                'skorPeer' => null,

                'skorSupervisor' => null,

                'skor360' => null,

                'kategori' => null,

                'message' =>
                    'Gagal mengambil data Google Sheets: '
                    . $e->getMessage()
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CEK RESPONSE
        |--------------------------------------------------------------------------
        */

        if (
            !$peerResponse->successful()
            ||
            !$supervisorResponse->successful()
        ) {

            return view('evaluasis.hasil360', [

                'lengkap' => false,

                'karyawan' => $karyawan,

                'goal' => $goal,

                'peer' => null,

                'supervisor' => null,

                'nilaiPeer' => null,

                'nilaiSupervisor' => null,

                'skorPeer' => null,

                'skorSupervisor' => null,

                'skor360' => null,

                'kategori' => null,

                'message' =>
                    'Google Sheets tidak dapat diakses.'
            ]);
        }


        $peerResult = $peerResponse->json();

        $supervisorResult =
            $supervisorResponse->json();


        /*
        |--------------------------------------------------------------------------
        | CEK STATUS API
        |--------------------------------------------------------------------------
        */

        if (
            !($peerResult['success'] ?? false)
            ||
            !($supervisorResult['success'] ?? false)
        ) {

            return view('evaluasis.hasil360', [

                'lengkap' => false,

                'karyawan' => $karyawan,

                'goal' => $goal,

                'peer' => null,

                'supervisor' => null,

                'nilaiPeer' => null,

                'nilaiSupervisor' => null,

                'skorPeer' => null,

                'skorSupervisor' => null,

                'skor360' => null,

                'kategori' => null,

                'message' =>
                    'Data Peer atau Supervisor belum tersedia.'
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $peerData =
            collect($peerResult['data'] ?? []);

        $supervisorData =
            collect($supervisorResult['data'] ?? []);


        /*
        |--------------------------------------------------------------------------
        | NORMALISASI NAMA
        |--------------------------------------------------------------------------
        */

        $normalizeName = function ($name) {

            $name = strtolower(
                trim((string) $name)
            );

            /*
            | Hapus karakter yang tidak diperlukan
            */

            $name = preg_replace(
                '/[^\pL\pN\s]/u',
                ' ',
                $name
            );

            /*
            | Rapikan spasi
            */

            $name = preg_replace(
                '/\s+/',
                ' ',
                $name
            );

            return trim($name);
        };


        /*
        |--------------------------------------------------------------------------
        | NORMALISASI NAMA KOLOM
        |--------------------------------------------------------------------------
        |
        | Ini penting karena Google Sheets kadang mengirim nama kolom
        | dengan spasi/newline tersembunyi.
        |
        */

        $normalizeKey = function ($key) {

            $key = strtolower(
                trim((string) $key)
            );

            return preg_replace(
                '/[^a-z0-9]/',
                '',
                $key
            );
        };


        /*
        |--------------------------------------------------------------------------
        | MENCARI NILAI BERDASARKAN NAMA KOLOM
        |--------------------------------------------------------------------------
        |
        | Tidak lagi bergantung pada nama kolom yang harus 100% sama.
        |
        */

        $getField = function ($row, $wantedKey) use ($normalizeKey) {

            $wanted = $normalizeKey($wantedKey);

            foreach ($row as $key => $value) {

                if (
                    $normalizeKey($key)
                    ===
                    $wanted
                ) {

                    return $value;
                }
            }

            return null;
        };


        /*
        |--------------------------------------------------------------------------
        | MENCARI KOLOM REVIEWEE PEER
        |--------------------------------------------------------------------------
        */

        $getPeerReviewee = function ($row) use (
            $normalizeKey
        ) {

            foreach ($row as $key => $value) {

                $keyNormalized =
                    $normalizeKey($key);

                /*
                | Cari kolom yang mengandung:
                | REKAN KERJA
                | dan
                | NILAI
                */

                if (
                    str_contains(
                        $keyNormalized,
                        'namalengkaprekankerja'
                    )
                    &&
                    str_contains(
                        $keyNormalized,
                        'nilai'
                    )
                ) {

                    return $value;
                }
            }

            return null;
        };


        /*
        |--------------------------------------------------------------------------
        | MENCARI KOLOM REVIEWEE SUPERVISOR
        |--------------------------------------------------------------------------
        */

        $getSupervisorReviewee = function ($row) use (
            $normalizeKey
        ) {

            foreach ($row as $key => $value) {

                $keyNormalized =
                    $normalizeKey($key);

                if (
                    str_contains(
                        $keyNormalized,
                        'namalengkapanggotatim'
                    )
                ) {

                    return $value;
                }
            }

            return null;
        };


        $namaKaryawan =
            $normalizeName($karyawan->nama);


        /*
        |--------------------------------------------------------------------------
        | CARI PEER REVIEW
        |--------------------------------------------------------------------------
        */

        $peerRows = $peerData
            ->filter(function ($row) use (
                $normalizeName,
                $namaKaryawan,
                $getPeerReviewee
            ) {

                $namaYangDinilai =
                    $getPeerReviewee($row);

                return
                    $normalizeName($namaYangDinilai)
                    ===
                    $namaKaryawan;
            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | CARI SUPERVISOR REVIEW
        |--------------------------------------------------------------------------
        */

        $supervisorRows = $supervisorData
            ->filter(function ($row) use (
                $normalizeName,
                $namaKaryawan,
                $getSupervisorReviewee
            ) {

                $namaAnggota =
                    $getSupervisorReviewee($row);

                return
                    $normalizeName($namaAnggota)
                    ===
                    $namaKaryawan;
            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | CEK DATA
        |--------------------------------------------------------------------------
        */

        if (
            $peerRows->isEmpty()
            ||
            $supervisorRows->isEmpty()
        ) {

            return view('evaluasis.hasil360', [

                'lengkap' => false,

                'karyawan' => $karyawan,

                'goal' => $goal,

                'peer' =>
                    $peerRows->first(),

                'supervisor' =>
                    $supervisorRows->first(),

                'nilaiPeer' => null,

                'nilaiSupervisor' => null,

                'skorPeer' => null,

                'skorSupervisor' => null,

                'skor360' => null,

                'kategori' => null,

                'message' =>
                    'Data Peer Review atau Supervisor Review untuk '
                    . $karyawan->nama
                    . ' belum lengkap.'
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | FUNGSI PARSE NILAI
        |--------------------------------------------------------------------------
        */

        $parseScore = function ($value) {

            if (
                $value === null
                ||
                $value === ''
            ) {

                return null;
            }


            if (is_numeric($value)) {

                return (float) $value;
            }


            /*
            | Contoh:
            | 4 = pencapaian keseluruhan target...
            */

            if (
                preg_match(
                    '/(?:^|\s)([1-5])(?:\s*=|\s|$)/',
                    (string) $value,
                    $matches
                )
            ) {

                return (float) $matches[1];
            }


            return null;
        };


        /*
        |--------------------------------------------------------------------------
        | PEER REVIEW
        |--------------------------------------------------------------------------
        */

        $peerKemahiran = [];

        $peerKolaborasi = [];

        $peerKepuasan = [];


        foreach ($peerRows as $row) {

            $kemahiran =
                $parseScore(
                    $getField(
                        $row,
                        '1. KEMAHIRAN UNTUK KUALITAS LAYANAN'
                    )
                );


            $kolaborasi =
                $parseScore(
                    $getField(
                        $row,
                        '2. KOLABORASI TIM'
                    )
                );


            $kepuasan =
                $parseScore(
                    $getField(
                        $row,
                        '3. BERORIENTASI PADA KEPUASAN PELANGGAN'
                    )
                );


            if ($kemahiran !== null) {

                $peerKemahiran[] =
                    $kemahiran;
            }


            if ($kolaborasi !== null) {

                $peerKolaborasi[] =
                    $kolaborasi;
            }


            if ($kepuasan !== null) {

                $peerKepuasan[] =
                    $kepuasan;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | RATA-RATA PEER
        |--------------------------------------------------------------------------
        */

        $avgPeerKemahiran =
            count($peerKemahiran) > 0
            ? array_sum($peerKemahiran)
                / count($peerKemahiran)
            : 0;


        $avgPeerKolaborasi =
            count($peerKolaborasi) > 0
            ? array_sum($peerKolaborasi)
                / count($peerKolaborasi)
            : 0;


        $avgPeerKepuasan =
            count($peerKepuasan) > 0
            ? array_sum($peerKepuasan)
                / count($peerKepuasan)
            : 0;


        /*
        |--------------------------------------------------------------------------
        | SKOR PEER
        |--------------------------------------------------------------------------
        */

        $skorPeer =
            (
                $avgPeerKemahiran
                +
                $avgPeerKolaborasi
                +
                $avgPeerKepuasan
            ) / 3;


        /*
        |--------------------------------------------------------------------------
        | SUPERVISOR REVIEW
        |--------------------------------------------------------------------------
        */

        $skorKinerja = [];

        $supervisorKemahiran = [];

        $supervisorKolaborasi = [];

        $supervisorKepuasan = [];


        foreach ($supervisorRows as $row) {

            /*
            | SKOR KINERJA
            */

            $kinerja =
                $parseScore(
                    $getField(
                        $row,
                        'SKOR KINERJA'
                    )
                );


            /*
            | KEMAHIRAN
            */

            $kemahiran =
                $parseScore(
                    $getField(
                        $row,
                        '1. KEMAHIRAN UNTUK KUALITAS LAYANAN'
                    )
                );


            /*
            | KOLABORASI
            */

            $kolaborasi =
                $parseScore(
                    $getField(
                        $row,
                        '2. KOLABORASI TIM'
                    )
                );


            /*
            | KEPUASAN
            */

            $kepuasan =
                $parseScore(
                    $getField(
                        $row,
                        '3. BERORIENTASI PADA KEPUASAN PELANGGAN'
                    )
                );


            if ($kinerja !== null) {

                $skorKinerja[] =
                    $kinerja;
            }


            if ($kemahiran !== null) {

                $supervisorKemahiran[] =
                    $kemahiran;
            }


            if ($kolaborasi !== null) {

                $supervisorKolaborasi[] =
                    $kolaborasi;
            }


            if ($kepuasan !== null) {

                $supervisorKepuasan[] =
                    $kepuasan;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | RATA-RATA SUPERVISOR
        |--------------------------------------------------------------------------
        */

        $avgSkorKinerja =
            count($skorKinerja) > 0
            ? array_sum($skorKinerja)
                / count($skorKinerja)
            : 0;


        $avgSupervisorKemahiran =
            count($supervisorKemahiran) > 0
            ? array_sum($supervisorKemahiran)
                / count($supervisorKemahiran)
            : 0;


        $avgSupervisorKolaborasi =
            count($supervisorKolaborasi) > 0
            ? array_sum($supervisorKolaborasi)
                / count($supervisorKolaborasi)
            : 0;


        $avgSupervisorKepuasan =
            count($supervisorKepuasan) > 0
            ? array_sum($supervisorKepuasan)
                / count($supervisorKepuasan)
            : 0;


        /*
        |--------------------------------------------------------------------------
        | RATA-RATA PERILAKU SUPERVISOR
        |--------------------------------------------------------------------------
        */

        $avgPerilakuSupervisor =
            (
                $avgSupervisorKemahiran
                +
                $avgSupervisorKolaborasi
                +
                $avgSupervisorKepuasan
            ) / 3;


        /*
        |--------------------------------------------------------------------------
        | SKOR SUPERVISOR
        |--------------------------------------------------------------------------
        |
        | 50% Kinerja
        | 50% Perilaku
        |
        */

        $skorSupervisor =
            (
                $avgSkorKinerja * 0.50
            )
            +
            (
                $avgPerilakuSupervisor * 0.50
            );


        /*
        |--------------------------------------------------------------------------
        | BOBOT FINAL
        |--------------------------------------------------------------------------
        */

        $bobotPeer = 0.30;

        $bobotSupervisor = 0.70;


        /*
        |--------------------------------------------------------------------------
        | NILAI BERBOBOT
        |--------------------------------------------------------------------------
        */

        $nilaiPeer =
            $skorPeer * $bobotPeer;


        $nilaiSupervisor =
            $skorSupervisor * $bobotSupervisor;


        /*
        |--------------------------------------------------------------------------
        | FINAL SCORE
        |--------------------------------------------------------------------------
        */

        $skor360 =
            $nilaiPeer
            +
            $nilaiSupervisor;


        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        if ($skor360 >= 4.80) {

            $kategori = 'SUPERSTAR';

        } elseif ($skor360 >= 4.25) {

            $kategori = 'ROCKSTAR';

        } elseif ($skor360 >= 3.00) {

            $kategori = 'MEDIOCRE';

        } elseif ($skor360 >= 2.00) {

            $kategori = 'LOW';

        } else {

            $kategori = 'DEADWOOD';
        }


        /*
        |--------------------------------------------------------------------------
        | PEMBULATAN
        |--------------------------------------------------------------------------
        */

        $avgPeerKemahiran =
            round($avgPeerKemahiran, 2);

        $avgPeerKolaborasi =
            round($avgPeerKolaborasi, 2);

        $avgPeerKepuasan =
            round($avgPeerKepuasan, 2);

        $skorPeer =
            round($skorPeer, 1);

        $avgSkorKinerja =
            round($avgSkorKinerja, 2);

        $avgSupervisorKemahiran =
            round($avgSupervisorKemahiran, 2);

        $avgSupervisorKolaborasi =
            round($avgSupervisorKolaborasi, 2);

        $avgSupervisorKepuasan =
            round($avgSupervisorKepuasan, 2);

        $avgPerilakuSupervisor =
            round($avgPerilakuSupervisor, 2);

        $skorSupervisor =
    round($skorSupervisor, 1);

        $nilaiPeer =
            round($nilaiPeer, 2);

        $nilaiSupervisor =
            round($nilaiSupervisor, 2);

        $skor360 =
            round($skor360, 2);


        /*
        |--------------------------------------------------------------------------
        | KIRIM KE VIEW
        |--------------------------------------------------------------------------
        */

        return view('evaluasis.hasil360', [

            'lengkap' => true,

            'karyawan' => $karyawan,

            'goal' => $goal,

            'peer' =>
                $peerRows->first(),

            'supervisor' =>
                $supervisorRows->first(),


            /*
            | PEER
            */

            'kemahiranPeer' =>
                $avgPeerKemahiran,

            'kolaborasiPeer' =>
                $avgPeerKolaborasi,

            'kepuasanPeer' =>
                $avgPeerKepuasan,

            'skorPeer' =>
                $skorPeer,

            'nilaiPeer' =>
                $nilaiPeer,


            /*
            | SUPERVISOR
            */

            'skorKinerja' =>
                $avgSkorKinerja,

            'kemahiranSupervisor' =>
                $avgSupervisorKemahiran,

            'kolaborasiSupervisor' =>
                $avgSupervisorKolaborasi,

            'kepuasanSupervisor' =>
                $avgSupervisorKepuasan,

            'avgPerilakuSupervisor' =>
                $avgPerilakuSupervisor,

            'skorSupervisor' =>
                $skorSupervisor,

            'nilaiSupervisor' =>
                $nilaiSupervisor,


            /*
            | FINAL
            */

            'skor360' =>
                $skor360,

            'kategori' =>
                $kategori,


            /*
            | BOBOT
            */

            'bobotPeer' =>
                30,

            'bobotSupervisor' =>
                70,

            'message' =>
                null
        ]);
    }
}