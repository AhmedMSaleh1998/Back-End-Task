<?php

namespace App\Repositories;

use Illuminate\Container\Container as App;


interface IRepository
{

    /**
     * @param App $app
     */
    public function setModel(App $app);

}
