<?php

namespace App\Services;

use App\Models\User;

class UserService{
    protected User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function getUser(){}

    public function createUser(){}

    public function updateUser(){}

    public function uploadAvatar(){}
}
