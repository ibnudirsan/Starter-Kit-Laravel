<?php

namespace App\Repositories\Auth\Permissions;

use App\Models\moduleMenu;
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
    protected $module;
    public function __construct(Permission $model, moduleMenu $module)
    {
        $this->model = $model;
        $this->module = $module;
    }

    public function datatables()
    {
        return $this->model->select('id','uuid','module_id','name','guard_name','created_at')
                           ->with('modules');
    }

    public function module()
    {
        return $this->module->select('id','module_name')
                            ->orderby('module_name','desc')
                            ->get();
    }

    public function store($param)
    {
        $this->model->create([
            'module_id'     => $param->moduleName,
            'name'          => $param->permissionName,
            'guard_name'    => $param->guardType,
        ]);
    }
}
