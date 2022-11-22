<?php

namespace App\Repositories\Auth\Permissions;

use App\Models\moduleMenu;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid as Generator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Permission as PemisssionModel;
use LaravelEasyRepository\Implementations\Eloquent;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class PermissionsResponse extends Eloquent implements PermissionsDesign {

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
    protected $role;
    protected $model;
    protected $module;
    protected $PemisssionModel;
    public function __construct(Permission $model, moduleMenu $module, PemisssionModel $PemisssionModel, Role $role)
    {
        $this->role             = $role;
        $this->model            = $model;
        $this->module           = $module;
        $this->PemisssionModel  = $PemisssionModel;
    }

    public function datatables()
    {
        return $this->PemisssionModel->select('id','uuid','module_id','name','guard_name','created_at','deleted_at')
                                     ->with('modules');
    }

    public function module()
    {
        return $this->module->select('uuid','module_name')
                            ->orderby('module_name','desc')
                            ->get();
    }

    public function store($param)
    {
        DB::beginTransaction();
        try {
            $this->model->create([
                'uuid'          => str_replace('-', '', Generator::uuid4()->toString()),
                'module_id'     => $param->moduleName,
                'name'          => $param->permissionName,
                'guard_name'    => $param->guardType,
            ]);
    
            $role = $this->role->whereName('SuperAdmin')->first();
            $role->givePermissionTo($param->permissionName);
        } catch (\Exception $e) {
            DB::rollBack();
        } finally {
            DB::commit();
        }
    }

    public function edit($id)
    {
        return $this->PemisssionModel->select('uuid','module_id','name','guard_name')
                           ->with('modules')
                           ->whereUuid($id)
                           ->firstOrFail();
    }

    public function trashedfirst($id)
    {
        return $this->PemisssionModel->select('uuid','module_id','name','guard_name')
                                    ->whereId($id)
                                    ->withTrashed()
                                    ->firstOrFail();
    }

    public function update($param, $id)
    {
        return $this->model->whereUuid($id)->update([
            'module_id'     => $param->moduleName,
            'name'          => $param->permissionName,
            'guard_name'    => $param->guardType,
        ]);
    }

    public function trash($id)
    {
        $result = $this->PemisssionModel->find($id);
            return $result->delete();
    }

    public function restore($id)
    {
        $result = $this->PemisssionModel
                       ->withTrashed()
                       ->find($id);
            return $result->restore();
    }

    public function delete($id): void
    {
        $result = $this->PemisssionModel
                        ->withTrashed()
                        ->find($id);
            $result->forceDelete();
    }
}
