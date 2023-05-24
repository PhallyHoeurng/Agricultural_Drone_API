<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_type',
        'map_id',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    public function maps()
    {
        return $this->belongsTo(Map::class);
    }

    public static function store($request, $id = null)
    {
        $farm = $request->only(['farm_type', 'map_id']);
        $farm = self::updateOrCreate(["id" => $id], $farm);

        return $farm;
    }
}
