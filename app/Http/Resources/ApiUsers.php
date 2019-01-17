<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class ApiUsers extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->ID,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_on,
            'updated_at' => $this->updated_on,
        ];
    }
}