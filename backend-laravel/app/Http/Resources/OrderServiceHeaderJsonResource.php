<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderServiceHeaderJsonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'service_id' => [
                'id' => $this->id,
                'service_name' => $this->service_name,
                'mandatory' => $this->mandatory,
                'icon' => $this->logoIcon,
                'value' => null,
            ],
            'json' => ServiceDetailResource::collection($this->details),
        ];
    }
}
