<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AddUserRequest;
use App\Http\Requests\Admin\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Services\UserService;

class UserController extends BaseController
{

    public function __construct(UserService $service)
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
            $data = User::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = '<a href="edit/'.$row->id.'" class="edit btn btn-info btn-sm">Edit</a>';
                        $btn = $btn.'<a href="show/'.$row->id.'" class="show btn btn-primary btn-sm">Show</a>';
                        $btn = $btn.'<a href="products/'.$row->id.'" class="show btn btn-dark btn-sm">Products</a>';
                           $btn = $btn.'<a href="delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                            return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $this->service->store($request);
        return redirect(route('admin.users.index'))->with(['success' => 'User Created successfully']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->service->find('id',$id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        try{
            $data = $this->service->update($request , $id);
            return redirect(route('admin.users.index'))->with(['success' => 'User Updated Successfully']);

        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function show($id)
    {
        $user = $this->service->find('id',$id);
        return view('admin.users.show',compact('user'));
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
            return redirect(route('admin.users.index'))->with(['success' => 'User Deleted Successfully']);

        } catch (Exception $exception) {
            return $exception;
        }
    }
    public function products($id)
    {
        try{
            if(\request()->ajax()){
                $user = $User::find($id);
                return DataTables::of($user->products)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="edit/'.$row->id.'" class="edit btn btn-info btn-sm">Edit</a>';
                            $btn = $btn.'<a href="show/'.$row->id.'" class="show btn btn-primary btn-sm">Show</a>';
                               $btn = $btn.'<a href="delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                                return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.users.index');

        } catch (Exception $exception) {
            return $exception;
        }
    }


}
