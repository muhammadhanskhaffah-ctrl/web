<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\MonitoringKpi;
use App\Models\Karyawan;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    /**
     * Menampilkan semua monitoring.
     */
    public function index()
    {
        $monitorings = Monitoring::with([
            'karyawan',
            'goal',
            'monitoringKpis.goalKpi'
        ])
            ->latest()
            ->get();

        return view(
            'monitorings.index',
            compact('monitorings')
        );
    }

    /**
     * Menampilkan form tambah monitoring.
     */
    public function create()
    {
        $karyawans = Karyawan::orderBy(
            'nama',
            'asc'
        )->get();

        /*
        |--------------------------------------------------------------------------
        | Ambil Goal beserta Karyawan dan KPI
        |--------------------------------------------------------------------------
        */
        $goals = Goal::with([
            'karyawan',
            'kpis'
        ])
            ->latest()
            ->get();

        return view(
            'monitorings.create',
            compact(
                'karyawans',
                'goals'
            )
        );
    }

    /**
     * Menyimpan monitoring baru.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'goal_id' => 'required|exists:goals,id',
            'tanggal_monitoring' => 'required|date',
            'catatan' => 'nullable|string',

            'kpis' => 'nullable|array',

            'kpis.*.goal_kpi_id' => [
                'required',
                'exists:goal_kpis,id'
            ],

            /*
            |--------------------------------------------------------------------------
            | Pencapaian BOLEH KOSONG
            |--------------------------------------------------------------------------
            */
            'kpis.*.pencapaian' => [
                'nullable'
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Ambil Goal beserta KPI
        |--------------------------------------------------------------------------
        */
        $goal = Goal::with('kpis')
            ->findOrFail(
                $validated['goal_id']
            );

        /*
        |--------------------------------------------------------------------------
        | Pastikan Goal milik Karyawan yang dipilih
        |--------------------------------------------------------------------------
        */
        if (
            (int) $goal->karyawan_id !==
            (int) $validated['karyawan_id']
        ) {
            return back()
                ->withErrors([
                    'goal_id' =>
                        'Goal yang dipilih bukan milik karyawan tersebut.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Pastikan KPI berasal dari Goal yang dipilih
        |--------------------------------------------------------------------------
        */
        $goalKpiIds = $goal->kpis
            ->pluck('id')
            ->map(function ($id) {
                return (int) $id;
            })
            ->toArray();

        foreach (
            ($validated['kpis'] ?? []) as $index => $kpiData
        ) {
            if (
                !in_array(
                    (int) $kpiData['goal_kpi_id'],
                    $goalKpiIds,
                    true
                )
            ) {
                return back()
                    ->withErrors([
                        'kpis' =>
                            'Terdapat KPI yang tidak sesuai dengan Goal yang dipilih.'
                    ])
                    ->withInput();
            }

            /*
            |--------------------------------------------------------------------------
            | Validasi Pencapaian
            |
            | Jika kosong, lewati validasi angka.
            |--------------------------------------------------------------------------
            */
            if (
                !array_key_exists('pencapaian', $kpiData) ||
                $kpiData['pencapaian'] === null ||
                trim((string) $kpiData['pencapaian']) === ''
            ) {
                continue;
            }

            $nilaiPencapaian =
                $this->extractNumericValue(
                    $kpiData['pencapaian']
                );

            if (
                $nilaiPencapaian === null ||
                $nilaiPencapaian < 0
            ) {
                return back()
                    ->withErrors([
                        "kpis.$index.pencapaian" =>
                            'Pencapaian pada KPI nomor ' .
                            ($index + 1) .
                            ' harus berisi angka yang valid.'
                    ])
                    ->withInput();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | CEK APAKAH KARYAWAN SUDAH MEMILIKI MONITORING
        |--------------------------------------------------------------------------
        |
        | Jika belum ada monitoring untuk karyawan + goal tersebut,
        | monitoring baru menggunakan bobot rata berdasarkan jumlah KPI.
        |
        | 2 KPI  = 1 / 2
        | 4 KPI  = 1 / 4
        | 9 KPI  = 1 / 9
        | 10 KPI = 1 / 10
        | 11 KPI = 1 / 11
        | 12 KPI = 1 / 12
        | 13 KPI = 1 / 13
        |
        | Jika sudah ada monitoring, bobot monitoring lama tetap digunakan.
        |--------------------------------------------------------------------------
        */
        $belumAdaMonitoring =
            !Monitoring::where(
                'karyawan_id',
                $validated['karyawan_id']
            )
            ->where(
                'goal_id',
                $validated['goal_id']
            )
            ->exists();

        /*
        |--------------------------------------------------------------------------
        | Simpan menggunakan Transaction
        |--------------------------------------------------------------------------
        */
        DB::transaction(function () use (
            $validated,
            $goal,
            $belumAdaMonitoring
        ) {
            $totalBobotTercapai = 0;

            /*
            |--------------------------------------------------------------------------
            | Jumlah KPI
            |--------------------------------------------------------------------------
            */
            $jumlahKpi = count(
                ($validated['kpis'] ?? [])
            );

            $hasilKpi = [];

            /*
            |--------------------------------------------------------------------------
            | Bobot otomatis berdasarkan jumlah KPI
            |--------------------------------------------------------------------------
            |
            | Monitoring baru:
            |
            | Bobot = 1 / jumlah KPI
            |--------------------------------------------------------------------------
            */
            $bobotPerKpi =
                $jumlahKpi > 0
                    ? 1 / $jumlahKpi
                    : 0;

            /*
            |--------------------------------------------------------------------------
            | Hitung setiap KPI
            |--------------------------------------------------------------------------
            */
            foreach (
                ($validated['kpis'] ?? []) as $kpiData
            ) {
                $goalKpi = $goal->kpis
                    ->firstWhere(
                        'id',
                        (int) $kpiData['goal_kpi_id']
                    );

                if (!$goalKpi) {
                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Cek apakah Pencapaian kosong
                |--------------------------------------------------------------------------
                */
                $pencapaianInput =
                    $kpiData['pencapaian'] ?? null;

                if (
                    $pencapaianInput === null ||
                    trim((string) $pencapaianInput) === ''
                ) {
                    /*
                    |--------------------------------------------------------------------------
                    | KPI kosong
                    |--------------------------------------------------------------------------
                    | Bobot Target tetap disimpan karena bobot KPI
                    | sudah ditentukan berdasarkan jumlah KPI.
                    |
                    | Pencapaian, Persentase, dan Bobot Tercapai
                    | tetap NULL.
                    |--------------------------------------------------------------------------
                    */

                    $hasilKpi[] = [
                        'goal_kpi_id' =>
                            $goalKpi->id,

                        'pencapaian' =>
                            null,

                        'persentase' =>
                            null,

                        'bobot_target' =>
                            $belumAdaMonitoring
                                ? $bobotPerKpi
                                : (
                                    $goalKpi->bobot_target !== null
                                        ? (float) $goalKpi->bobot_target
                                        : 0
                                ),

                        'bobot_tercapai' =>
                            null,
                    ];

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Pencapaian
                |--------------------------------------------------------------------------
                |
                | Contoh yang dapat dibaca:
                |
                | 4,1
                | 4.1
                | 41%
                | 1.716.153.740,00
                | Rp 1.716.153.740,00
                | 24
                |--------------------------------------------------------------------------
                */
                $pencapaian =
                    $this->extractNumericValue(
                        $pencapaianInput
                    );

                if ($pencapaian === null) {
                    $pencapaian = 0;
                }

                /*
                |--------------------------------------------------------------------------
                | Target KPI
                |--------------------------------------------------------------------------
                */
                $target =
                    $this->extractNumericValue(
                        $goalKpi->target_2026
                    );

                $persentase = 0;

                /*
                |--------------------------------------------------------------------------
                | Hitung persentase
                |--------------------------------------------------------------------------
                */
                if (
                    $target !== null &&
                    $target > 0
                ) {
                    $persentase =
                        ($pencapaian / $target) * 100;
                }

                /*
                |--------------------------------------------------------------------------
                | Bobot
                |--------------------------------------------------------------------------
                |
                | Monitoring BARU:
                | gunakan 1 / jumlah KPI.
                |
                | Monitoring berikutnya:
                | pertahankan bobot lama dari goal_kpis.
                |--------------------------------------------------------------------------
                */
                if ($belumAdaMonitoring) {
                    $bobot = $bobotPerKpi;
                } else {
                    $bobot =
                        $goalKpi->bobot_target !== null
                            ? (float) $goalKpi->bobot_target
                            : 0;
                }

                /*
                |--------------------------------------------------------------------------
                | Bobot tercapai
                |--------------------------------------------------------------------------
                |
                | Bobot Tercapai =
                | Pencapaian / Target x Bobot
                |--------------------------------------------------------------------------
                */
                $bobotTercapai = 0;

                if (
                    $target !== null &&
                    $target > 0 &&
                    $bobot > 0
                ) {
                    $bobotTercapai =
                        ($pencapaian / $target)
                        * $bobot;
                }

                /*
                |--------------------------------------------------------------------------
                | Total
                |--------------------------------------------------------------------------
                */
                $totalBobotTercapai +=
                    $bobotTercapai;

                /*
                |--------------------------------------------------------------------------
                | Simpan hasil sementara
                |--------------------------------------------------------------------------
                */
                $hasilKpi[] = [
                    'goal_kpi_id' =>
                        $goalKpi->id,

                    'pencapaian' =>
                        $pencapaian,

                    'persentase' =>
                        $persentase,

                    'bobot_target' =>
                        $bobot,

                    'bobot_tercapai' =>
                        $bobotTercapai,
                ];
            }

            /*
            |--------------------------------------------------------------------------
            | Persentase keseluruhan
            |--------------------------------------------------------------------------
            |
            | Total Bobot Tercapai berupa pecahan.
            |
            | Contoh:
            |
            | 0.2708 x 100 = 27.08%
            |--------------------------------------------------------------------------
            */
            $persentaseKeseluruhan =
                $totalBobotTercapai * 100;

            /*
            |--------------------------------------------------------------------------
            | Simpan Monitoring Utama
            |--------------------------------------------------------------------------
            */
            $monitoring =
                new Monitoring();

            $monitoring->karyawan_id =
                $validated['karyawan_id'];

            $monitoring->goal_id =
                $validated['goal_id'];

            $monitoring->target = 100;

            $monitoring->realisasi =
                $persentaseKeseluruhan;

            $monitoring->persentase =
                $persentaseKeseluruhan;

            $monitoring->tanggal_monitoring =
                $validated['tanggal_monitoring'];

            $monitoring->catatan =
                $validated['catatan'] ?? null;

            $monitoring->save();

            /*
            |--------------------------------------------------------------------------
            | Simpan Detail KPI
            |--------------------------------------------------------------------------
            */
            foreach (
                $hasilKpi as $kpiData
            ) {
                MonitoringKpi::create([
                    'monitoring_id' =>
                        $monitoring->id,

                    'goal_kpi_id' =>
                        $kpiData['goal_kpi_id'],

                    'pencapaian' =>
                        $kpiData['pencapaian'],

                    'persentase' =>
                        $kpiData['persentase'],

                    'bobot_target' =>
                        $kpiData['bobot_target'],

                    'bobot_tercapai' =>
                        $kpiData['bobot_tercapai'],
                ]);
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */
        return redirect()
            ->route('monitorings.index')
            ->with(
                'success',
                'Monitoring dan pencapaian KPI berhasil disimpan.'
            );
    }

    /**
     * Menampilkan detail monitoring.
     */
    public function show(
        Monitoring $monitoring
    ) {
        $monitoring->load([
            'karyawan',
            'goal',
            'monitoringKpis.goalKpi'
        ]);

        return view(
            'monitorings.show',
            compact('monitoring')
        );
    }

    /**
     * Menampilkan form edit monitoring.
     */
    public function edit(
        Monitoring $monitoring
    ) {
        $monitoring->load([
            'karyawan',
            'goal',
            'monitoringKpis.goalKpi'
        ]);

        $karyawans =
            Karyawan::orderBy(
                'nama',
                'asc'
            )->get();

        $goals =
            Goal::with([
                'karyawan',
                'kpis'
            ])
                ->latest()
                ->get();

        return view(
            'monitorings.edit',
            compact(
                'monitoring',
                'karyawans',
                'goals'
            )
        );
    }

    /**
     * Memperbarui monitoring.
     */
    public function update(
        Request $request,
        Monitoring $monitoring
    ) {
        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'goal_id' => 'required|exists:goals,id',
            'tanggal_monitoring' => 'required|date',
            'catatan' => 'nullable|string',

            'kpis' => 'nullable|array',

            'kpis.*.goal_kpi_id' => [
                'required',
                'exists:goal_kpis,id'
            ],

            /*
            |--------------------------------------------------------------------------
            | Pencapaian BOLEH KOSONG
            |--------------------------------------------------------------------------
            */
            'kpis.*.pencapaian' => [
                'nullable'
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Ambil Goal
        |--------------------------------------------------------------------------
        */
        $goal =
            Goal::with('kpis')
                ->findOrFail(
                    $validated['goal_id']
                );

        /*
        |--------------------------------------------------------------------------
        | Pastikan Goal milik Karyawan
        |--------------------------------------------------------------------------
        */
        if (
            (int) $goal->karyawan_id !==
            (int) $validated['karyawan_id']
        ) {
            return back()
                ->withErrors([
                    'goal_id' =>
                        'Goal yang dipilih bukan milik karyawan tersebut.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Jika form edit tidak mengirim kpis,
        | gunakan data KPI lama
        |--------------------------------------------------------------------------
        */
        if (
            !isset($validated['kpis']) ||
            empty($validated['kpis'])
        ) {
            $validated['kpis'] =
                MonitoringKpi::where(
                    'monitoring_id',
                    $monitoring->id
                )
                ->get()
                ->map(function ($kpi) {
                    return [
                        'goal_kpi_id' =>
                            $kpi->goal_kpi_id,

                        'pencapaian' =>
                            $kpi->pencapaian,
                    ];
                })
                ->toArray();
        }

        /*
        |--------------------------------------------------------------------------
        | Validasi KPI
        |--------------------------------------------------------------------------
        */
        $goalKpiIds =
            $goal->kpis
                ->pluck('id')
                ->map(function ($id) {
                    return (int) $id;
                })
                ->toArray();

        foreach (
            ($validated['kpis'] ?? []) as $index => $kpiData
        ) {
            if (
                !in_array(
                    (int) $kpiData['goal_kpi_id'],
                    $goalKpiIds,
                    true
                )
            ) {
                return back()
                    ->withErrors([
                        'kpis' =>
                            'Terdapat KPI yang tidak sesuai dengan Goal yang dipilih.'
                    ])
                    ->withInput();
            }

            /*
            |--------------------------------------------------------------------------
            | Jika Pencapaian kosong, lewati validasi angka
            |--------------------------------------------------------------------------
            */
            if (
                !array_key_exists('pencapaian', $kpiData) ||
                $kpiData['pencapaian'] === null ||
                trim((string) $kpiData['pencapaian']) === ''
            ) {
                continue;
            }

            $nilaiPencapaian =
                $this->extractNumericValue(
                    $kpiData['pencapaian']
                );

            if (
                $nilaiPencapaian === null ||
                $nilaiPencapaian < 0
            ) {
                return back()
                    ->withErrors([
                        "kpis.$index.pencapaian" =>
                            'Pencapaian pada KPI nomor ' .
                            ($index + 1) .
                            ' harus berisi angka yang valid.'
                    ])
                    ->withInput();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Transaction Update
        |--------------------------------------------------------------------------
        */
        DB::transaction(function () use (
            $validated,
            $goal,
            $monitoring
        ) {
            $totalBobotTercapai = 0;

            $jumlahKpi = count(
                ($validated['kpis'] ?? [])
            );

            $hasilKpi = [];

            /*
            |--------------------------------------------------------------------------
            | Ambil bobot yang sudah tersimpan pada monitoring ini
            |--------------------------------------------------------------------------
            |
            | Ini penting supaya monitoring lama tidak dihitung ulang
            | menggunakan bobot baru.
            |--------------------------------------------------------------------------
            */
            $bobotTersimpan = MonitoringKpi::where(
                'monitoring_id',
                $monitoring->id
            )
                ->get()
                ->keyBy('goal_kpi_id');

            /*
            |--------------------------------------------------------------------------
            | Hitung ulang KPI
            |--------------------------------------------------------------------------
            */
            foreach (
                ($validated['kpis'] ?? []) as $kpiData
            ) {
                $goalKpi =
                    $goal->kpis
                        ->firstWhere(
                            'id',
                            (int) $kpiData['goal_kpi_id']
                        );

                if (!$goalKpi) {
                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Cek apakah Pencapaian kosong
                |--------------------------------------------------------------------------
                */
                $pencapaianInput =
                    $kpiData['pencapaian'] ?? null;

                /*
                |--------------------------------------------------------------------------
                | Tentukan bobot KPI
                |--------------------------------------------------------------------------
                |
                | Jika monitoring ini sudah mempunyai bobot_target
                | yang tersimpan, gunakan bobot tersebut.
                |
                | Ini menjaga monitoring lama tetap menggunakan
                | bobot yang sudah ada.
                |
                | Jika belum ada bobot_target sama sekali,
                | gunakan 1 / jumlah KPI.
                |--------------------------------------------------------------------------
                */
                $monitoringKpiLama =
                    $bobotTersimpan->get(
                        $goalKpi->id
                    );

                if (
                    $monitoringKpiLama &&
                    $monitoringKpiLama->bobot_target !== null
                ) {
                    $bobot =
                        (float) $monitoringKpiLama->bobot_target;
                } else {
                    $bobot =
                        $jumlahKpi > 0
                            ? 1 / $jumlahKpi
                            : 0;
                }

                if (
                    $pencapaianInput === null ||
                    trim((string) $pencapaianInput) === ''
                ) {
                    /*
                    |--------------------------------------------------------------------------
                    | KPI kosong
                    |--------------------------------------------------------------------------
                    */
                    $hasilKpi[] = [
                        'goal_kpi_id' =>
                            $goalKpi->id,

                        'pencapaian' =>
                            null,

                        'persentase' =>
                            null,

                        'bobot_target' =>
                            $bobot,

                        'bobot_tercapai' =>
                            null,
                    ];

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Pencapaian
                |--------------------------------------------------------------------------
                */
                $pencapaian =
                    $this->extractNumericValue(
                        $pencapaianInput
                    );

                if ($pencapaian === null) {
                    $pencapaian = 0;
                }

                /*
                |--------------------------------------------------------------------------
                | Target
                |--------------------------------------------------------------------------
                */
                $target =
                    $this->extractNumericValue(
                        $goalKpi->target_2026
                    );

                $persentase = 0;

                /*
                |--------------------------------------------------------------------------
                | Hitung persentase
                |--------------------------------------------------------------------------
                */
                if (
                    $target !== null &&
                    $target > 0
                ) {
                    $persentase =
                        ($pencapaian / $target) * 100;
                }

                /*
                |--------------------------------------------------------------------------
                | Bobot Tercapai
                |--------------------------------------------------------------------------
                |
                | Pencapaian / Target x Bobot
                |--------------------------------------------------------------------------
                */
                $bobotTercapai = 0;

                if (
                    $target !== null &&
                    $target > 0 &&
                    $bobot > 0
                ) {
                    $bobotTercapai =
                        ($pencapaian / $target)
                        * $bobot;
                }

                /*
                |--------------------------------------------------------------------------
                | Total
                |--------------------------------------------------------------------------
                */
                $totalBobotTercapai +=
                    $bobotTercapai;

                $hasilKpi[] = [
                    'goal_kpi_id' =>
                        $goalKpi->id,

                    'pencapaian' =>
                        $pencapaian,

                    'persentase' =>
                        $persentase,

                    'bobot_target' =>
                        $bobot,

                    'bobot_tercapai' =>
                        $bobotTercapai,
                ];
            }

            /*
            |--------------------------------------------------------------------------
            | Persentase keseluruhan
            |--------------------------------------------------------------------------
            */
            $persentaseKeseluruhan =
                $totalBobotTercapai * 100;

            /*
            |--------------------------------------------------------------------------
            | Update Monitoring
            |--------------------------------------------------------------------------
            */
            $monitoring->karyawan_id =
                $validated['karyawan_id'];

            $monitoring->goal_id =
                $validated['goal_id'];

            $monitoring->target = 100;

            $monitoring->realisasi =
                $persentaseKeseluruhan;

            $monitoring->persentase =
                $persentaseKeseluruhan;

            $monitoring->tanggal_monitoring =
                $validated['tanggal_monitoring'];

            $monitoring->catatan =
                $validated['catatan'] ?? null;

            $monitoring->save();

            /*
            |--------------------------------------------------------------------------
            | Hapus KPI lama
            |--------------------------------------------------------------------------
            */
            MonitoringKpi::where(
                'monitoring_id',
                $monitoring->id
            )->delete();

            /*
            |--------------------------------------------------------------------------
            | Simpan KPI baru
            |--------------------------------------------------------------------------
            */
            foreach (
                $hasilKpi as $kpiData
            ) {
                MonitoringKpi::create([
                    'monitoring_id' =>
                        $monitoring->id,

                    'goal_kpi_id' =>
                        $kpiData['goal_kpi_id'],

                    'pencapaian' =>
                        $kpiData['pencapaian'],

                    'persentase' =>
                        $kpiData['persentase'],

                    'bobot_target' =>
                        $kpiData['bobot_target'],

                    'bobot_tercapai' =>
                        $kpiData['bobot_tercapai'],
                ]);
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */
        return redirect()
            ->route(
                'monitorings.show',
                $monitoring->id
            )
            ->with(
                'success',
                'Monitoring berhasil diperbarui.'
            );
    }

    /**
     * Menghapus monitoring.
     */
    public function destroy(
        Monitoring $monitoring
    ) {
        $monitoring->delete();

        return redirect()
            ->route('monitorings.index')
            ->with(
                'success',
                'Monitoring berhasil dihapus.'
            );
    }

    /**
     * Mengambil angka dari nilai.
     *
     * Fungsi ini mendukung format:
     *
     * 4
     * 4.1
     * 4,1
     * 41%
     * 100 %
     * 1.716.153.740
     * 1.716.153.740,00
     * Rp 1.716.153.740,00
     * 4 dari skala 5
     */
    private function extractNumericValue(
        $value
    ): ?float {
        if (
            $value === null ||
            $value === ''
        ) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Jika sudah berupa angka
        |--------------------------------------------------------------------------
        */
        if (
            is_int($value) ||
            is_float($value)
        ) {
            return (float) $value;
        }

        /*
        |--------------------------------------------------------------------------
        | Ubah menjadi string
        |--------------------------------------------------------------------------
        */
        $value = trim(
            (string) $value
        );

        if ($value === '') {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Cek apakah nilai menggunakan tanda persen
        |--------------------------------------------------------------------------
        |
        | Contoh:
        |
        | 40%      -> 0.40
        | 38,46%   -> 0.3846
        | 85%      -> 0.85
        | 100%     -> 1.00
        |--------------------------------------------------------------------------
        */
        $isPercentage = str_contains(
            $value,
            '%'
        );

        /*
        |--------------------------------------------------------------------------
        | Ambil bagian angka saja
        |--------------------------------------------------------------------------
        */
        if (
            !preg_match(
                '/-?\d[\d.,]*/',
                $value,
                $matches
            )
        ) {
            return null;
        }

        $angka = $matches[0];

        /*
        |--------------------------------------------------------------------------
        | Format Indonesia:
        |
        | 1.716.153.740,00
        |
        | Titik = pemisah ribuan
        | Koma = desimal
        |--------------------------------------------------------------------------
        */
        if (
            str_contains($angka, '.') &&
            str_contains($angka, ',')
        ) {
            $angka = str_replace(
                '.',
                '',
                $angka
            );

            $angka = str_replace(
                ',',
                '.',
                $angka
            );

            if (!is_numeric($angka)) {
                return null;
            }

            $hasil = (float) $angka;

            return $isPercentage
                ? $hasil / 100
                : $hasil;
        }

        /*
        |--------------------------------------------------------------------------
        | Hanya koma
        |
        | 4,1
        | 41,5
        |--------------------------------------------------------------------------
        */
        if (
            str_contains($angka, ',')
        ) {
            $angka = str_replace(
                ',',
                '.',
                $angka
            );

            if (!is_numeric($angka)) {
                return null;
            }

            $hasil = (float) $angka;

            return $isPercentage
                ? $hasil / 100
                : $hasil;
        }

        /*
        |--------------------------------------------------------------------------
        | Hanya titik
        |
        | 1.716.153.740
        | -> 1716153740
        |
        | 4.1
        | -> 4.1
        |
        | 100.00
        | -> 100.00
        |--------------------------------------------------------------------------
        */
        if (
            substr_count($angka, '.') > 1
        ) {
            $angka = str_replace(
                '.',
                '',
                $angka
            );

            if (!is_numeric($angka)) {
                return null;
            }

            $hasil = (float) $angka;

            return $isPercentage
                ? $hasil / 100
                : $hasil;
        }

        /*
        |--------------------------------------------------------------------------
        | Satu titik
        |
        | Jika angka setelah titik terdiri dari 3 digit,
        | anggap sebagai pemisah ribuan.
        |
        | 1.000 -> 1000
        |
        | Jika bukan, anggap sebagai desimal.
        |
        | 4.1 -> 4.1
        | 100.00 -> 100.00
        |--------------------------------------------------------------------------
        */
        if (
            substr_count($angka, '.') === 1
        ) {
            $bagian =
                explode('.', $angka);

            $setelahTitik =
                $bagian[1] ?? '';

            if (
                strlen($setelahTitik) === 3
            ) {
                $angka = str_replace(
                    '.',
                    '',
                    $angka
                );
            }

            if (!is_numeric($angka)) {
                return null;
            }

            $hasil = (float) $angka;

            return $isPercentage
                ? $hasil / 100
                : $hasil;
        }

        /*
        |--------------------------------------------------------------------------
        | Angka biasa
        |--------------------------------------------------------------------------
        */
        if (!is_numeric($angka)) {
            return null;
        }

        $hasil = (float) $angka;

        return $isPercentage
            ? $hasil / 100
            : $hasil;
    }
}