<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone ? $this->phone : "",
            "address" => $this->address ? $this->address : "",
            "country" => $this->country ? $this->country : "",
            "code_pos" => $this->code_pos ? $this->code_pos : "",
            "store_name" => $this->store_name ? $this->store_name : "",
        ];
    }
}
