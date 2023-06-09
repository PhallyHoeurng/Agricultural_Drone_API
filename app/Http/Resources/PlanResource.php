<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'plan_name' =>$this-> plan_name,
            'start_time' =>$this-> start_time,
            'end_time' =>$this-> end_time,
            'spray_density' =>$this-> spray_density,
            'payload' =>$this-> payload,
            'drones' => DroneResource::collection($this->drones)
        ];
    }
}
