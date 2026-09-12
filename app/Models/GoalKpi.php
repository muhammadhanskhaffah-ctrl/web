<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalKpi extends Model
{
    use HasFactory;

    protected $table = 'goal_kpis';

    protected $fillable = [
        'goal_id',
        'no',
        'indikator_kinerja_perusahaan',
        'indikator_kinerja_individu',
        'baseline_2025',
        'target_2026',
        'bobot_target',
    ];

    protected $casts = [
        'no' => 'integer',
        'bobot_target' => 'float',
    ];

    /**
     * KPI ini dimiliki oleh satu Goal.
     */
    public function goal()
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
}