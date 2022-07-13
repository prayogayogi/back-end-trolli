<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "type" => $this->type,
            "heavy" => $this->heavy,
            "condition" => $this->condition,
            "price" => $this->price,
            "quantity" => $this->quantity,
            "description" => $this->description,
            "photo_product" => GalleryResource::collection($this->GalleryProduct),
            "product_category" => new CategoryResource($this->ProductCategory),
            "user_id" => new UserResource($this->User),
        ];
    }
}
