<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceDetailResource extends JsonResource
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
            'service_id' => $this->service_id,
            'group' => $this->group,
            'description' => $this->description,
            'mandatory' => $this->mandatory,
            'sequence' => $this->sequence,
            'parent' => $this->parent,
            'type' => $this->type,
            'is_multiple' => $this->is_multiple,
            'remark' => $this->remark,
            'child' => ChildrenResource::collection($this->children),
        ];
    }
}
