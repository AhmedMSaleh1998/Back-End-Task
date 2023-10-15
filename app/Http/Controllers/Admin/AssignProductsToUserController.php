<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AssignProductToUserRequest;
use App\Services\ProductService;
use App\Models\User;
use App\Models\Product;
use Auth;
use Exception;

class AssignProductsToUserController extends BaseController
{

    public function __construct(ProductService $service)
    {
        parent::__construct($service);
    }


    /**
     * Handle the incoming request.
     */

    public function create()
    {
        try {
            $users = User::all();
            $products = Product::all();
            return view('admin.assign',compact('users','products'));
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function store(AssignProductToUserRequest $request)
    {
        try {
            $this->service->AssignProductsToUser($request);
            return redirect()->back()->with(['success' => 'Products Assigned successfully to this user']);
        } catch (Exception $exception) {
            return $exception;
        }
    }
}

