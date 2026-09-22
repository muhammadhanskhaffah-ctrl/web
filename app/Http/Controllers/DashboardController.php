<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    /**
     * Menampilkan Dashboard
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | DATA DASHBOARD
        |--------------------------------------------------------------------------
        */

        $totalKaryawan = 21;

        $totalGoal = 21;

        $rataRataPencapaian = 85.00;


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA MONITORING DARI DATABASE
        |--------------------------------------------------------------------------
        */

        $monitoringDatabase = Monitoring::with([
            'karyawan',
            'goal'
        ])
            ->orderBy('tanggal_monitoring', 'desc')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TOTAL KARYAWAN YANG SUDAH DIMONITORING
        |--------------------------------------------------------------------------
        */

        $totalMonitoring = $monitoringDatabase
            ->pluck('karyawan_id')
            ->filter()
            ->unique()
            ->count();


        /*
        |--------------------------------------------------------------------------
        | DISTRIBUSI PENCAPAIAN KINERJA
        |--------------------------------------------------------------------------
        */

        $pencapaianBaik = $monitoringDatabase
            ->filter(function ($monitoring) {
                return $monitoring->persentase >= 80;
            })
            ->count();


        $pencapaianSedang = $monitoringDatabase
            ->filter(function ($monitoring) {
                return $monitoring->persentase >= 60
                    && $monitoring->persentase < 80;
            })
            ->count();


        $pencapaianRendah = $monitoringDatabase
            ->filter(function ($monitoring) {
                return $monitoring->persentase < 60;
            })
            ->count();


        /*
        |--------------------------------------------------------------------------
        | DATA TREN PENCAPAIAN KINERJA
        |--------------------------------------------------------------------------
        */

        $bulan = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];


        /*
        |--------------------------------------------------------------------------
        | HITUNG RATA-RATA PENCAPAIAN SETIAP BULAN
        |--------------------------------------------------------------------------
        */

        $trendPencapaian = collect();

        foreach ($bulan as $nomorBulan => $namaBulan) {

            $dataBulan = $monitoringDatabase->filter(function ($monitoring) use ($nomorBulan) {

                if (!$monitoring->tanggal_monitoring) {
                    return false;
                }

                /*
                |--------------------------------------------------------------------------
                | Ubah tanggal database menjadi objek Carbon
                |--------------------------------------------------------------------------
                */

                $tanggal = \Carbon\Carbon::parse(
                    $monitoring->tanggal_monitoring
                );

                return $tanggal->month == $nomorBulan
                    && $tanggal->year == now()->year;
            });


            /*
            |--------------------------------------------------------------------------
            | Hitung rata-rata persentase
            |--------------------------------------------------------------------------
            */

            $rataRata = $dataBulan->avg('persentase') ?? 0;


            $trendPencapaian->push([
                'label' => $namaBulan,
                'rata_rata' => round($rataRata, 2),
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | MONITORING TERBARU
        |--------------------------------------------------------------------------
        */

        $monitoringTerbaru = $monitoringDatabase->take(5);


        /*
        |--------------------------------------------------------------------------
        | SEMUA DATA MONITORING
        |--------------------------------------------------------------------------
        */

        $monitorings = $monitoringDatabase;


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view('dashboard', compact(
            'totalKaryawan',
            'totalGoal',
            'totalMonitoring',
            'rataRataPencapaian',
            'pencapaianBaik',
            'pencapaianSedang',
            'pencapaianRendah',
            'trendPencapaian',
            'monitorings',
            'monitoringTerbaru'
        ));
    }
}