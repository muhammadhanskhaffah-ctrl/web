<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasis';

    protected $fillable = [
        'karyawan_id',
        'goal_id',
        'jenis_evaluasi',
        'skor',
        'komentar',
        'tanggal_evaluasi',
    ];

    protected $casts = [
        'skor' => 'integer',
        'tanggal_evaluasi' => 'date',
    ];

    /**
     * Relasi Evaluasi ke Karyawan
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    /**
     * Relasi Evaluasi ke Goal
     */
    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
}