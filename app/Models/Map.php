<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'image_url',
        'date',
        'drone_id',
    ];

    public function drone()
    {
        return $this->belongsTo(Drone::class);
    }
    public function farms()
    {
        return $this->hasMany(Farm::class);
    }

    public static function store($request, $id = null)
    {
        $farm = $request->only(['address', 'image_url', 'date', 'drone_id']);
        $farm = self::updateOrCreate(["id" => $id], $farm);

        return $farm;
    }

}
