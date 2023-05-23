<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DronPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'drone_id',
    ];

    public function drone()
    {
        return $this->belongsToMany(Drone::class);
    }
    public function plan()
    {
        return $this->belongsToMany(Plan::class);
    }
}
