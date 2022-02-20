<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class AuthResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (isset($this->error)) {
            return [
                "error" => $this->error,
                "message" => $this->message
            ];
        }
        return [
            "token" => $this->token,
            "message" => "Successfully Sign-In",
            "data" => new UserResource(User::find($this->id))
        ];
    }
}
