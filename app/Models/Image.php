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
        'farm',
    ];
        
    public function drone()
    {
        return $this->belongsTo(Drone::class);
    }
    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
