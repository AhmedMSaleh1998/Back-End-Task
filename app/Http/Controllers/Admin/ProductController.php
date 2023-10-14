<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AddproductRequest;
use App\Http\Requests\Admin\EditProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Services\ProductService;

class ProductController extends BaseController
{

    public function __construct(ProductService $service)
    {
        parent::__construct($service);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request()->ajax()){
            $data = Product::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = '<a href="edit/'.$row->id.'" class="edit btn btn-info btn-sm">Edit</a>';
                           $btn = $btn.'<a href="delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                            return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddproductRequest $request)
    {
        $this->service->store($request);
        return redirect(route('admin.products.index'))->with(['success' => 'Product Created successfully']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->service->find('id',$id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        try{
            $data = $this->service->update($request , $id);
            return redirect(route('admin.products.index'))->with(['success' => 'Product Updated Successfully']);

        } catch (Exception $exception) {
            return $exception;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try{
            $data = $this->service->destroy($id);
            return redirect(route('admin.products.index'))->with(['success' => 'Product Deleted Successfully']);

        } catch (Exception $exception) {
            return $exception;
        }
    }
}
