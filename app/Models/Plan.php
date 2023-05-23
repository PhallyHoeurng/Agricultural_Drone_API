<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'start_time',
        'end_time',
        'spray_density',
        'payload',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
