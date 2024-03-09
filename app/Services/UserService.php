<?php

namespace App\Services;

use App\Http\Requests\User\Profile\UserProfileUpdateRequest;
use App\Models\User;

class UserService{
    protected User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function getUser($user_id, array $with = []){
        return $this->userModel->getUser($user_id, $with);
    }

    public function updateUser($user, UserProfileUpdateRequest $request){
        $input = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'county' => $request->county,
            'address' => $request->address,
            'profile_intro' => $request->profile_intro
        ];
        $user->update($input);
        return $user;
    }

    public function uploadAvatar(){}
}
