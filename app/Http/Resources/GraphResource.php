<?php

namespace App\Http\Resources;

use App\Http\Resources\NodeResource;
use App\Http\Resources\RelationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GraphResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'relations' => RelationResource::collection($this->whenLoaded('relations')),
            'nodes' => NodeResource::collection($this->whenLoaded('nodes')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
