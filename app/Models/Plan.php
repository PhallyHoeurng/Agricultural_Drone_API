<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_name',
        'start_time',
        'end_time',
        'spray_density',
        'payload',
    ];

    public static function store($reques, $id = null)
    {
        $plan = $reques->only(['user_id', 'plan_name', 'start_time', 'end_time', 'spray_density', 'payload']);
        $plan = self::updateOrCreate(['id' => $id], $plan);
        return $plan;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
