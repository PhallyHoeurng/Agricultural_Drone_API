<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'area',
        'drone_id',
    ];

    public function drone()
    {
        return $this->belongsTo(Drone::class);
    }

    public static function store($request, $id = null)
    {
        $drone = $request->only(['latitude', 'longitude', 'area', 'drone_id']);
        $drone = self::updateOrCreate(["id" => $id], $drone);

        return $drone;
    }
}
