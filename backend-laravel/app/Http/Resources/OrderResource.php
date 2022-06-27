<?php

namespace App\Http\Resources;

use App\Models\ServiceHeader;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $services = ServiceHeader::active()->with(['details', 'logoIcon'])
            ->withCount(['details'])
            ->get();
        return [
            'order_id' => $this->id,
            'order_number' => $this->number,
            'services' => OrderServiceHeaderResource::collection($services),
            'services_json' => OrderServiceHeaderJsonResource::collection($services),
        ];
    }
}
