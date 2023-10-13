<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Support\Facades\Mail;
use App\Services\UserService;
use App\Mail\Subscribe;
use Auth;
use Exception;

class UserRegisterController extends BaseController
{

    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        try {
            $data =  $this->service->register($request);
            return $this->sendResponse($data, 'تم تسجيل الحساب بنجاح و تم ارسال كود التحقق خلال البريد الإلكتروني');
        } catch (Exception $exception) {
            return $exception;
        }
    }
}

