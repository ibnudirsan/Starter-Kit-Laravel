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

    public function __construct(Role $model, moduleMenu $module)
    {
        $this->model    = $model;
        $this->module   = $module;
    }

    /**
     * List Role
     */
    public function datatable()
    {
        return $this->model->select('id','uuid','name','guard_name','created_at')
                                    ->with('permissions')
                                    ->whereGuardName('web')
                                    ->whereNotIn('name',['SuperAdmin']);
    }

    /**
     * List Permissions
     */
    public function permission()
    {
       return $this->module->with('permissions')
                          ->orderby('module_name','asc')
                          ->get();
    }

    /**
     * Create Role
     */
    public function store($param)
    {
        $role   = $this->model->create(['name' => $param->roleName]);
            return $role->givePermissionTo($param->permissions);
    }

    /**
     * View Data Role
     */

     public function view($id)
     {
        return $this->model->with('permissions')
                            ->whereUuid($id)
                            ->firstOrFail();
     }


     /**
      * Update Role
      */
     public function update($param, $id): void
     {
        $this->model->whereUuid($id)->update([
            'name'  => $param->roleName
        ]);
            $role = $this->model->whereUuid($id)->first();
                $role->syncPermissions($param->permissions);
     }

     /**
      * Transh Role
      */
     public function transh($id)
     {
        $result = $this->model->find($id);
            return $result->delete();
     }
}
