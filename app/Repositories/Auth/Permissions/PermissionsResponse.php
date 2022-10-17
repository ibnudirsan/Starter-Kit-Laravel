<?php

namespace App\Repositories\Auth\Permissions;

use App\Models\Permission;
use LaravelEasyRepository\Implementations\Eloquent;


class PermissionsResponse extends Eloquent implements PermissionsDesign{

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

    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    public function datatables()
    {
        return $this->model->select('id','uuid','module_id','name','guard_name','created_at')
                           ->with('modules');
    }
}
