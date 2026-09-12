<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'umur',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'jabatan',
        'departemen',
    ];

    /**
     * Relasi Karyawan ke Goal
     */
    public function goals()
    {
        return $this->hasMany(Goal::class, 'karyawan_id');
    }

    /**
     * Relasi Karyawan ke Monitoring
     */
    public function monitorings()
    {
        return $this->hasMany(Monitoring::class, 'karyawan_id');
    }
    /**
 * Relasi Karyawan ke Evaluasi
 */
public function evaluasis()
{
    return $this->hasMany(Evaluasi::class, 'karyawan_id');
}
}
