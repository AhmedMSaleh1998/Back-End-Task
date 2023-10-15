<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\userLoginRequest;
use App\Http\Requests\User\EditProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('user.auth.login');
    }
    public function handlelogin(userLoginRequest $request){
        {
            $remember_me = $request->has('remember_me') ? true : false;
            $credentials = $request->validated();

            if (Auth::attempt($credentials, $remember_me)) {
                $request->session()->regenerate();
                //return back()->with(['error' => 'Your data is right']);
                return redirect(route('user.index'));

            }
            return back()->with(['error' => 'Your data is wrong']);
        }
    }
    public function index(){
        $products  = Auth::user()->products;
        //dd($products);
        return view ('user.index',compact('products'));
    }

    public function profile(){
        $user  = auth()->user();
        //dd($products);
        return view ('user.profile',compact('user'));
    }


    public function editProfile(EditProfileRequest $request){
        return view('user.editprofile');
    }

    public function storeProfile(EditProfileRequest $request){
        $user = Auth::user();
        $newUser = $request->validated();
        $newUser['password'] = bycrypt($request->password);
        $user->update($newUser);
        return redirect(route('user.index'));
    }
}
