<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\Api\Product\CreateProductRequest;
use App\Http\Requests\Api\Product\EditProductRequest;
use App\Http\Requests\Api\Product\AssignProductsToUserRequest;
use App\Http\Controllers\BaseController;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{

    public function __construct(ProductService $service)
    {
        parent::__construct($service);
    }
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        try{
            $data = $this->service->getAll();
            return $this->sendResponse($data, 'تم عرض جميع المنتجات بنجاح');

        } catch (Exception $exception) {
            return $exception;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $product = $request->all();
        try {
            if($request->has('image')){
                $name  = time() . '.' . $request['image']->extension();
                $product['image']->move(public_path('images/products'), $name);
                $product['image'] = $name;
            }
            $data = $this->service->store($product);
            return $this->sendResponse(new ProductResource($data), 'تم إنشاء منتج جديد بنجاح');
        } catch (Exception $exception) {
            return $exception;
        }
    }

    /**
     * Display the specified resource.
     */
    public function AssignProductsToUser(AssignProductsToUserRequest $request)
    {
        try{
            $data = $this->service->AssignProductsToUser($request->all());
            return $this->sendResponse($data, 'Products Assigned Successfully To User');

        } catch (Exception $exception) {
            return $exception;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProductRequest $request, $id)
    {
        try{
            $data = $this->service->update($request , $id);
            return $this->sendResponse($data, 'تم تعديل هذا المنتج بنجاح');

        } catch (Exception $exception) {
            return $exception;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try{
            $data = $this->service->destroy($id);
            return $this->sendResponse($data, 'تم حذف هذا المنتج بنجاح');

        } catch (Exception $exception) {
            return $exception;
        }
    }
}
