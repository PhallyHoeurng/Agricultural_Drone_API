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
        'end_date',
    ];

    public function map()
    {
        return $this->hasMany(Map::class);
    }
    public function mapImage()
    {
        return $this->hasMany(MapImage::class);
    }
    
}