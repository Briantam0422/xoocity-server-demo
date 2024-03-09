<?php

namespace App\Http\Controllers\API\User\Profile;

use App\Enums\SystemMessageEnum;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\User\Profile\UserProfileUpdateRequest;
use App\Http\Requests\User\Profile\UserProfileUploadAvatarRequest;
use App\Services\UploadFilesService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserProfileController extends BaseController
{
    protected UserService $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function getProfile(Request $request){
        $user_id = $request->user_id;
        $user = $this->userService->getUser($user_id);
        if ( is_null($user) ) {
            return $this->sendError(SystemMessageEnum::UserNotFound->value);
        }
        return $this->sendResponse([
            'user' => $user
        ]);
    }

    public function postUpdateProfile(UserProfileUpdateRequest $request){
        $user_id = $request->user_id;
        DB::beginTransaction();
        try {
            $user = $this->userService->getUser($user_id);
            if ( is_null($user) ) {
                return $this->sendError(SystemMessageEnum::UserNotFound->value);
            }
            $user = $this->userService->updateUser($user, $request);
            DB::commit();
            return $this->sendResponse([
                'user' => $user
            ], SystemMessageEnum::UpdateSuccess->value);
        } catch (\Exception $e) {
            return $this->sendError( $e );
        }
    }

    public function postUploadAvatar(UserProfileUploadAvatarRequest $request){
        $user_id = $request->user_id;
        DB::beginTransaction();
        try {
            $user = $this->userService->getUser($user_id);
            $path = $this->userService->uploadAvatar($request, $user);
            DB::commit();
            $files = [ 'url' => env('APP_URL') . 'api/storage?path=' . $path ];
            return $this->sendResponse($files, SystemMessageEnum::UploadFileSuccessfully->value);
        } catch (\ErrorException $e){
            return $this->logError($e);
        }
    }
}
