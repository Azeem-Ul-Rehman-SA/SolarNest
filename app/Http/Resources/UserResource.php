<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if ((!is_null(auth()->user()->profile_pic))) {
            $profile_pic = auth()->user()->profile_pic;
        } else {
            $profile_pic = 'default.png';
        }
        return [
            "id" => $this->id,
            "name" => $this->first_name . " " . $this->last_name,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "phone_number" => $this->phone_number,
            "emergency_number" => $this->emergency_number,
            "cnic" => $this->cnic,
            "address" => $this->address,
            "user_type" => $this->user_type,
            "status" => $this->status,
            "profile_pic" => asset("/uploads/user_profiles/" . $profile_pic),


        ];
    }
}
