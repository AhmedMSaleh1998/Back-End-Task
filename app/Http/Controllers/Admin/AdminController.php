<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\adminLoginRequest;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Services\ProductService;

class AdminController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }
    public function handlelogin(adminLoginRequest $request){
        {
            $remember_me = $request->has('remember_me') ? true : false;
            $credentials = $request->validated();

            if (auth('admin')->attempt($credentials, $remember_me)) {
                $request->session()->regenerate();
                return redirect(route('admin.index'));

            }
            return back()->with(['error' => 'Your data is wrong']);
        }
    }
    public function index(){
        $users         = User::count();
        $products         = Product::count();
        return view ('admin.index',compact('users','products'));
    }
}
