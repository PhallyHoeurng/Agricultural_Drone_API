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
        'payload',
        'start_date',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function maps()
    {
        return $this->hasMany(Map::class);
    }
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'drone_plans') -> withTimestamps();
    }
    
    public static function store($request, $id = null)
    {
        $drone = $request->only(['name', 'drone_type', 'battery', 'speed', 'payload', 'start_date']);
        $drone = self::updateOrCreate(["id" => $id], $drone);
        
        $dronplan =  request('plans');
        $drone->plans()->sync($dronplan);
        return $drone;
    }


}
