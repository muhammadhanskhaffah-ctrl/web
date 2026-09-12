<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringKpi extends Model
{
    use HasFactory;

    protected $table = 'monitoring_kpis';

    protected $fillable = [
        'monitoring_id',
        'goal_kpi_id',
        'pencapaian',
        'persentase',
        'bobot_tercapai',
    ];

    protected $casts = [
        'pencapaian' => 'float',
        'persentase' => 'float',
        'bobot_tercapai' => 'float',
    ];

    public function monitoring()
    {
        return $this->belongsTo(Monitoring::class, 'monitoring_id');
    }

    public function goalKpi()
    {
        return $this->belongsTo(GoalKpi::class, 'goal_kpi_id');
    }
}   