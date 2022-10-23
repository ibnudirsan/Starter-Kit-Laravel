<?php

namespace App\Repositories\Auth\Module;

use App\Models\moduleMenu;
use LaravelEasyRepository\Implementations\Eloquent;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class ModuleResponse extends Eloquent implements ModuleDesign {
    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(moduleMenu $model)
    {
        $this->model = $model;
    }

    /**
     * Datatables Data Module
     */
    public function datatables()
    {
        return $this->model->select('id','uuid','module_name','created_at','deleted_at')
                           ->with('permissions');
    }

    /**
     * Store Data Module
     */
    public function store($param)
    {
        return $this->model->create([
            'module_name'   => $param->moduleName
        ]);
    }

    /**
     * Edit Data Module
     */
    public function edit($id)
    {
        return $this->model->select('uuid','module_name')
                           ->whereUuid($id)
                           ->firstOrFail();
    }

    /**
     * Update Data Module
     */
    public function update($param, $id)
    {
        return $this->model->whereUuid($id)->update([
            'module_name'   => $param->moduleName
        ]);
    }

    /**
     * Trash Data Module
     */
    public function trash($id)
    {
        $result = $this->model->find($id);
            return $result->delete();
    }

    /**
     * Get One Data
     */
    public function trashedfirst($id)
    {
        return $this->model->select('uuid','module_name')
                            ->whereId($id)
                            ->withTrashed()
                            ->firstOrFail();
    }

    /**
     * Restore Data Module
     */
    public function restore($id)
    {
        $result = $this->model
                        ->withTrashed()
                        ->find($id);
            return $result->restore();
    }

    /**
     * Delete Permanent Data Role
     */
    public function delete($id)
    {
        $result = $this->model
                       ->withTrashed()
                       ->find($id);
            return $result->forceDelete();
    }
}
