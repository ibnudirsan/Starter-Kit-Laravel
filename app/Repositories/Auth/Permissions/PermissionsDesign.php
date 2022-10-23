<?php

namespace App\Repositories\Auth\Permissions;

use LaravelEasyRepository\Repository;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
interface PermissionsDesign extends Repository {
    public function datatables();
    public function module();
    public function store($param);
    public function edit($id);
    public function trashedfirst($id);
    public function update($param, $id);
    public function trash($id);
    public function restore($id);
    public function delete($id);
}
