<?php

namespace App\Repositories\Auth\Admin;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Auth\Admin\AdminDesign;
use LaravelEasyRepository\Implementations\Eloquent;

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
    public function __construct(User $model, Role $role)
    {
        $this->model = $model;
        $this->role = $role;
    }

    public function datatable()
    {
        return $this->model->select('id','uuid','name','deleted_at','email','created_at')
                            ->with('profile');
    }

    public function role()
    {
        return $this->role->select('id','name','guard_name')
                            ->whereNotIn('name',['SuperAdmin'])
                            ->orderby('id','desc')
                            ->get();
    }

    public function create($param)
    {
        # code...
    }
}
