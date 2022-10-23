<?php

namespace App\Repositories\Customer;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
interface CustomerDesign {
    public function datatable();
    public function create($param);
    public function edit($id);
    public function update($param, $id);
    public function trashedData($id);
    public function restore($id);
    public function deletePermanent($id);
}
