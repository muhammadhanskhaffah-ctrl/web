<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'monitorings';

    protected $fillable = [
        'karyawan_id',
        'goal_id',
        'target',
        'realisasi',
        'persentase',
        'tanggal_monitoring',
        'catatan',
    ];

    protected $casts = [
        'target' => 'float',
        'realisasi' => 'float',
        'persentase' => 'float',
        'tanggal_monitoring' => 'date',
    ];

    /**
     * Relasi ke Karyawan
     */
    public function karyawan()
    {
        return $this->belongsTo(
            Karyawan::class,
            'karyawan_id'
        );
    }

    /**
     * Relasi ke Goal
     */
    public function goal()
    {
        return $this->belongsTo(
            Goal::class,
            'goal_id'
        );
    }

    /**
     * Relasi ke detail KPI monitoring
     */
    public function monitoringKpis()
    {
        return $this->hasMany(
            MonitoringKpi::class,
            'monitoring_id'
        )->orderBy('id');
    }
}