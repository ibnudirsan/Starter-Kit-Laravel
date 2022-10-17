<?php

namespace App\Repositories\Auth\Module;

use App\Models\moduleMenu;
use LaravelEasyRepository\Implementations\Eloquent;

class ModuleResponse extends Eloquent implements ModuleDesign {

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

    public function __construct(moduleMenu $model)
    {
        $this->model = $model;
    }

    public function datatables()
    {
        return $this->model->select('id','module_name','created_at')
                           ->with('permissions');
    }

    public function store($param)
    {
        return $this->model->create([
            'module_name'   => $param->moduleName
        ]);
    }

    public function edit($id)
    {
        return $this->model->select('id','module_name')
                           ->whereId($id)
                           ->firstOrFail();
    }

    public function update($param, $id)
    {
        return $this->model->whereId($id)->update([
            'module_name'   => $param->moduleName
        ]);
    }
}
