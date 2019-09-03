<?php

namespace IntelGUA\PMT\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    =>  $this->id,
            'date'  =>  $this->created_at,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,

        ];
    }
}
