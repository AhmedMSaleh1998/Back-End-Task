<?php

namespace App\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements IRepository
{
    protected $model;

    public function __construct(App $app)
    {
        $this->setModel($app);
    }

    abstract public function model();

    public function setModel(App $app)
    {
        $this->model = $app->make($this->model());
    }


    public function find($rowname , $rowvalue)
    {
        return $this->model->where($rowname, $rowvalue)->first();
    }

    /* public function find($id)
    {
        return $this->first($id);
    } */

    public function get()
    {
        return $data = $this->get();
    }

    public function getAll()
    {
        return $data = $this->model->paginate(4);
    }

    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            return $this->model->create($data);
        });
    }

     public function update($id, $data)
    {
        return DB::transaction(function () use ($data , $id) {
            return $this->model->where('id', $id)->update($data);
        });
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function destroy($id)
    {
        $record = $this->show($id);
        return $this->model->where('id', $id)->delete();
    }
}
