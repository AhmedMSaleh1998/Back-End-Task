<?php


namespace App\Services;

use App\Repositories\IRepository;
use Illuminate\Http\Request;


class BaseService implements IService
{

    /**
     * @var IRepository $repository
     */
    protected $repository;

    /**
     * @var Request $request
     */
    protected $request;

    /**
     * BaseService constructor.
     *
     * @param IRepository $repository
     */
    public function __construct(IRepository $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    public function store($data)
    {
        $record = $this->repository->store($data);
        return $record;
    }

/*     public function update($id, $data)
    {
        $this->repository->update($id, $data);
        $record = $this->repository->show($id);
        return $record;
    } */

    public function show($id)
    {
        return $this->repository->show($id, $this->with);
    }

    public function find($AttName , $AtrValue)
    {
        return $this->repository->find($AttName , $AtrValue);
    }

    public function get()
    {
        return $this->repository->get();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function first()
    {
        return $this->repository->first();
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
    }
}
