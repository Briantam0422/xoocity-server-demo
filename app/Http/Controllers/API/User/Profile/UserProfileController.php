<?php

namespace App\Http\Controllers\API\User\Profile;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\User\Profile\UserProfileCreateRequest;
use App\Http\Requests\User\Profile\UserProfileUpdateRequest;
use App\Http\Requests\User\Profile\UserProfileUploadAvatarRequest;
use Illuminate\Http\Request;
class UserProfileController extends BaseController
{
    public function getProfile(Request $request){
        $user_id = $request->get('user_id');
    }

    public function postCreateProfile(UserProfileCreateRequest $request){
    }

    public function postUpdateProfile(UserProfileUpdateRequest $request){
    }

    public function postUploadAvatar(UserProfileUploadAvatarRequest $request){
    }
}
