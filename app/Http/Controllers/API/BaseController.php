<?php

namespace App\Http\Controllers\API;

use App\Enums\RespondStatus;
use App\Enums\SystemMessageEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    public function sendResponse($result, $message = null){

        $response = [
            'success' => true,
            'data' => $result
        ];

        if (!is_null($message)){
            $response['message'] = $message;
        }

        return response()->json($response, RespondStatus::ok->value);
    }

    public function sendError($error, $errorMessages = [], $code = 404){
        $response = [
            'success' => false,
            'message' => $error
        ];

        if (!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function logError($e){
        Log::error($e->getMessage() . ' File: ' . $e->getFile() . ' Line: ' . $e->getLine());
        return $this->sendError(SystemMessageEnum::SystemError->value, $e->getTrace(), RespondStatus::SystemError->value);
    }
}
