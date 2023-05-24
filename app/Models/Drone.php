<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'drone_type',
        'battery',
        'speed',
        'start_date',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function maps()
    {
        return $this->hasMany(Map::class);
    }
    
    public static function store($request, $id = null)
    {
        $drone = $request->only(['name', 'drone_type', 'battery', 'speed', 'start_date']);
        $drone = self::updateOrCreate(["id" => $id], $drone);

        return $drone;
    }
}
