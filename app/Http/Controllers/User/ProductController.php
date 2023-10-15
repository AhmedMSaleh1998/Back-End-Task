<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if(\request()->ajax()){
            $data = Auth::user()->products;
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('user.product.index');
    }
}
