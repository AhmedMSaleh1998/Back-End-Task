<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\VerifyRequest;
use App\Services\UserService;
use Auth;
use Exception;

class UserVerifyController extends BaseController
{

    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke(VerifyRequest $request)
    {
        try {
            $data =  $this->service->verify($request);
            return $this->sendResponse(is_string($data)?'':$data , is_string($data)? $data:'تم تفعيل البريد الالكتروني بنجاح برجاء الذهاب لتسجيل الدخول');
        } catch (Exception $exception) {
            return $exception;
        }
    }
}

