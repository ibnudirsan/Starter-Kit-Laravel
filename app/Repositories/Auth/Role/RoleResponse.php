<?php

namespace App\Repositories\Auth\Role;

use App\Models\moduleMenu;
use App\Models\Role as RoleModel;
use Ramsey\Uuid\Uuid as Generator;
use Spatie\Permission\Models\Role;
use App\Repositories\Auth\Role\RoleDesign;
use Illuminate\Support\Facades\Log;
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
    protected $module;
    protected $RoleModel;
    public function __construct(Role $model, moduleMenu $module, RoleModel $RoleModel)
    {
        $this->model        = $model;
        $this->module       = $module;
        $this->RoleModel    = $RoleModel;
    }

    /**
     * List Role
     */
    public function datatable()
    {
        return $this->model->select('id','uuid','name','guard_name','created_at')
                                    ->with('permissions')
                                    ->whereIn('guard_name',['web','api'])
                                    ->whereNotIn('name',['SuperAdmin'])
                                    ->whereNull('deleted_at');
    }

    /**
     * List Trashed
     */

     public function tableTrashed()
     {
        return $this->RoleModel->select('id','uuid','name','guard_name','deleted_at')
                                ->with('permissions')
                                ->whereIn('guard_name',['web','api'])
                                ->whereNotIn('name',['SuperAdmin'])
                                ->onlyTrashed();
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
        $role   = $this->model->create([
            'uuid'  => str_replace('-', '', Generator::uuid4()->toString()),
            'name'  => $param->roleName
        ]);
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
        $result = $this->RoleModel->find($id);
            return $result->delete();
     }
}
