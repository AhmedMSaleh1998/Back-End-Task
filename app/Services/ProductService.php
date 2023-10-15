<?php


namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ProductService extends BaseService
{

    /**
     * @var UserRepository $driverRepository
     */
    private $UserRepository;

    public function __construct(ProductRepository $repository, UserRepository $userRepository,Request $request)
    {
        parent::__construct($repository, $request);
        $this->userRepository = $userRepository;
    }

    public function store($request){
        $newProductData = $request->all();
            if($request->has('image')){
                    $name  = time() . '.' . $request['image']->extension();
                    $newProductData['image']->move(public_path('images/products'), $name);
                    $newProductData['image'] = $name;
            }
             $this->repository->store($newProductData);
    }

    public function update($request , $id){
        $oldProductData = $this->repository->find('id' , $id);
        $newProductData = $request->all();
            if($request->has('image')){
                    unlink(public_path('images/products/' . $oldProductData->image));
                    $name  = time() . '.' . $request['image']->extension();
                    $newProductData['image']->move(public_path('images/products'), $name);
                    $newProductData['image'] = $name;
            }
            // dd( $newProductData );
            $data = $oldProductData->update($newProductData);
            return $oldProductData;
    }

    public function AssignProductsToUser($request){
        $user = $this->userRepository->find('id' , $request['user_id']);
        //dd($user->products);
        $user->products()->attach($request['products']);
            return $user->products;
    }

    public function destroy($id){
        $product = $this->repository->find('id' , $id);
        unlink(public_path('images/products/' . $product->image));
        $product->delete();
    }
}
