<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceHeaderResource extends JsonResource
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
            'id' => $this->id,
            'service_name' => $this->service_name,
            'mandatory' => $this->mandatory,
            'package_id' => $this->package_id,
            'debitur_type_id' => $this->debitur_type_id,
            'service_price_amount' => $this->service_price_amount,
            'service_discount_amount' => $this->service_discount_amount,
            'details_count' => $this->details_count,
            'details' => ServiceDetailResource::collection($this->details),
        ];
    }
}
