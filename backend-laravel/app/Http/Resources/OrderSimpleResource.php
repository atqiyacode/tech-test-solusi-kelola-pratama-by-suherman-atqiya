<?php

namespace App\Http\Resources;

use App\Models\ServiceHeader;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderSimpleResource extends JsonResource
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
      'number' => $this->number,
    ];
  }
}
