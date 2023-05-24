<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'date',
        'drone_id',
        'farm_id',
    ];

    public function drone()
    {
        return $this->belongsTo(Drone::class);
    }
    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public static function store($request, $id = null)
    {
        $image = $request->only(['url', 'date', 'drone_id', 'farm_id']);
        $image = self::updateOrCreate(["id" => $id], $image);

        return $image;
    }
}
