<?php

namespace App\Services;

use App\Enums\SystemMessageEnum;
use App\Http\Requests\User\Profile\UserProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserService{
    protected User $userModel;
    protected UploadFilesService $uploadFilesService;

    public function __construct(UploadFilesService $uploadFilesService)
    {
        $this->userModel = new User();
        $this->uploadFilesService = $uploadFilesService;
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

    public function uploadAvatar($request, $user){
        if ($request->file('files')[0] != null){
            $o_path = $user->avatar_path;
            $path = $this->uploadFilesService->handleEditPublicFile($o_path ,'users/avatar/'.$user->id, $request->file('files')[0]);
            $user->update(['avatar_path' => $path ?? '']);
        }
        return $path ?? '';
    }
}
