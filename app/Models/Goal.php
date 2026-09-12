<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'nama_goal',
        'deskripsi',
        'tipe',
        'target',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    protected $casts = [
        'target' => 'decimal:2',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
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
     * Relasi ke Monitoring
     */
    public function monitorings()
    {
        return $this->hasMany(
            Monitoring::class,
            'goal_id'
        );
    }

    /**
     * Relasi ke Evaluasi
     */
    public function evaluasis()
    {
        return $this->hasMany(
            Evaluasi::class,
            'goal_id'
        );
    }

    /**
     * Relasi ke KPI Goal
     */
    public function kpis()
    {
        return $this->hasMany(
            GoalKpi::class,
            'goal_id'
        )->orderBy('no');
    }
}