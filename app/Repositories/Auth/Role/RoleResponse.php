<?php

namespace App\Repositories\Auth\Role;

use App\Models\Role;
use App\Models\moduleMenu;
use App\Repositories\Auth\Role\RoleDesign;
use LaravelEasyRepository\Implementations\Eloquent;

class RoleResponse extends Eloquent implements RoleDesign {

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

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function permission()
    {
       return moduleMenu::with('permissions')
                                    ->orderby('module_name','asc')
                                    ->get();
    }
}
