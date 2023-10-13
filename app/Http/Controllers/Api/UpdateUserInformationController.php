<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\UpdateUserInfoRequest;
use App\Http\Requests\Api\ChangeUserPasswordRequest;
use App\Http\Requests\Api\UpdateUserPasswordRequest;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Services\UserService;
use Auth;
use Exception;

class UpdateUserInformationController extends BaseController
{

    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }


    /**
     * Handle the incoming request.
     */
    public function UpdateUserInfo(UpdateUserInfoRequest $request)
    {
        try {
            $data =  $this->service->UpdateUserInfo($request);
            return $this->sendResponse(is_string($data)? '' : $data, is_string($data)? $data : 'تم تعديل بيانات المستخدم بنجاح');
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function ChangeUserPassword(ChangeUserPasswordRequest $request)
    {
        try {
            $data =  $this->service->ChangeUserPassword($request);
            return $this->sendResponse(is_string($data)? '' : $data, is_string($data)? $data : 'تم تعديل كلمة المرور بنجاح');
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function forgetUserPassword(ForgetPasswordRequest $request)
    {
        try {
            $data =  $this->service->ForgetUserPassword($request);
            return $this->sendResponse(is_string($data)? '' : $data, is_string($data)? $data : 'تم إرسال رمز التحقق علي البريد الإلكتروني');
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function updateUserPassword(UpdateUserPasswordRequest $request)
    {
        try {
            $data =  $this->service->updateUserPassword($request);
            return $this->sendResponse(is_string($data)? '' : $data, is_string($data)? $data : 'تم تعديل كلمة السر بنجاح');
        } catch (Exception $exception) {
            return $exception;
        }
    }
}

