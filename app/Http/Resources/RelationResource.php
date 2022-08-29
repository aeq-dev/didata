<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RelationResource extends JsonResource
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
            //'graph' => new GraphResource($this->graph),
            'parent_id' =>  $this->parent_id,
            'child_id' => $this->child_id,
        ];
    }
}
