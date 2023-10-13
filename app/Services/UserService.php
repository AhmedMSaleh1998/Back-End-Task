<?php


namespace App\Services;

use App\Http\Resources\UserResource;
use App\Http\Resources\ProductResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Subscribe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class UserService extends BaseService
{

    public function __construct(UserRepository $repository, Request $request)
    {
        parent::__construct($repository, $request);
    }

    public function login($request)
    {

        if ($request->phone && $request->password) {
            $credentials = request(['phone','password']);
            Auth::attempt($credentials);
            $user        = $this->repository->find('phone',$request->phone);
            $user->token = $user->createToken("API TOKEN")->plainTextToken;
            $user->save();
            return new UserResource($user);
        }elseif($request->email && $request->password){
            $credentials = request(['email','password']);
            Auth::attempt($credentials);
            $user        = $this->repository->find('email',$request->email);
            $user->token = $user->createToken("API TOKEN")->plainTextToken;
            $user->save();
            return new UserResource($user);
        }else{
            return 'هناك خطأ في البيانات';
        }
    }

    public function register($request)
    {
        if($request->phone){
        $data = $request->all();
        $user = $this->repository->store($data);
        return new UserResource($user);
        }else{
        $data = $request->all();
        $data['code'] = rand(1000,9999);
        DB::beginTransaction();
        $user = $this->repository->store($data);
        $mailData = [
            'email' => $request->email,
            'code' => $data['code'],
        ];
        if(Mail::to($request->email)->send(new Subscribe($mailData))){
        DB::commit();
        }else{
        DB::rollback();
        }
        return new UserResource($user);
        }
    }

    public function verify($request)
    {
        $user = $this->repository->find('email',$request->email);
        if($user->email_verified_at == null){
        if($user->code == $request->code){
            $user->email_verified_at = Carbon::now();
            $user->token = $user->createToken("API TOKEN")->plainTextToken;
            $user->code = null;
            $user->save();
            return new UserResource($user);
        }else{
            return 'هذا الكود غير صحيح برجاء مراجعة الكود الوارد لديكم في البريد الالكتروني مرة أخري';
        }
    }else{
        return 'تم تفعيل البريد الالكتروني من قبل برجاء الذهاب لتسجيل الدخول';
    }
    }

    public function GetUserInfo()
    {
        $user = Auth::user();
        if($user){
            return new UserResource($user);
        }else{
            return 'برجاء تسجيل الدخول اولا ';
        }
    }

    public function UpdateUserInfo($request)
    {
        $user = Auth::user();
        if($user){
            $data = $user->update($request->all());
            return new UserResource($user);
        }else{
            return 'برجاء تسجيل الدخول';
        }
    }

    public function ChangeUserPassword($request)
    {
        $user = Auth::user();
        if($user){
            $data = $user->update($request->all());
            return new UserResource($user);
        }else{
            return 'برجاء تسجيل الدخول';
        }
    }

    public function ForgetUserPassword($request)
    {
        if( $request->email){
            $user = $this->repository->find('email',$request->email);
            DB::beginTransaction();
            $user['code'] = rand(1000,9999);
            $mailData = [
                'email' => $request->email,
                'code' => $user['code'],
            ];
            if(Mail::to($request->email)->send(new Subscribe($mailData))){
            DB::commit();
            }else{
            DB::rollback();
            }
            }
    }

    public function UpdateUserPassword($request)
    {

            $user = $this->repository->find('email',$request->email);
            $user->password = $request->password;
            $user->save();
    }

    public function getUserProducts()
    {
        $user = Auth::user();
        return ProductResource::collection($user->products);
    }
}
