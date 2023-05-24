<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'drone_id',
    ];

    public function farms()
    {
        return $this->hasMany(Farm::class);
    }
    
    public function drone()
    {
        return $this->belongsTo(Drone::class);
    }

    public static function store($request, $id = null)
    {
        $drone = $request->only(['adress', 'drone_id']);
        $drone = self::updateOrCreate(["id" => $id], $drone);

        return $drone;
    }
}
