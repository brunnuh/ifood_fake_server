<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            "image" => url("storage/{$this->image}"),
            "name" => $this->name,
            "phone" => $this->phone,
            "status_operating" => $this->status_operating,
            "note" => $this->note,
        ];
        if($this->category_restaurant != null)
            $data["category_restaurant"] = $this->category_restaurant;

        return $data;
    }
}
