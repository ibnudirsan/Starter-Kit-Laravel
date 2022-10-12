<?php

namespace App\Repositories\Admin;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class AdminResponse extends Eloquent implements AdminDesign {

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function datatable()
    {
        return $this->model->select('id','uuid','name','deleted_at','email','created_at')
                            ->with('profile');
    }

    public function create($param)
    {
        # code...
    }
}
