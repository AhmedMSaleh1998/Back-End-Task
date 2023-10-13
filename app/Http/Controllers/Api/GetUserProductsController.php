<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\LoginRequest;
use App\Services\UserService;
use Auth;
use Exception;

class GetUserProductsController extends BaseController
{

    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        try {
            $data =  $this->service->getUserProducts();
            return $this->sendResponse( $data , 'تم عرض منتجات المستخدم بنجاح');
        } catch (Exception $exception) {
            return $exception;
        }
    }
}

