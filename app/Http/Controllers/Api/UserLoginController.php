<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\LoginRequest;
use App\Services\UserService;
use Auth;
use Exception;

class UserLoginController extends BaseController
{

    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        try {
            $data =  $this->service->login($request);
            return $this->sendResponse(is_string($data)? '' : $data, is_string($data)? $data : 'تم تسجيل الدخول بنجاح');
        } catch (Exception $exception) {
            return $exception;
        }
    }
}

