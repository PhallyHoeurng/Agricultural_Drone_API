<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'drone_type' => $this->drone_type,
            'battery'=>$this->battery,
            'speed' => $this->speed,
            'start_date' =>$this->start_date,
            'location' =>$this->locations,
            'images' =>$this->images,
        ];
    }
}
