<?php

namespace App\Repositories\Auth\Admin;

use LaravelEasyRepository\Repository;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
interface AdminDesign extends Repository {
    public function datatable();
    public function role();
    public function create($param);
    public function edit($id);
    public function update($param, $id);
    public function trashedData($id);
    public function trashedfirst($id);
    public function restore($id);
}
