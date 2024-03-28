<?php

namespace App\Repositories\LaravelStarter;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\LaravelStarter;

class LaravelStarterResponse extends Eloquent implements LaravelStarterDesign{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(LaravelStarter $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
