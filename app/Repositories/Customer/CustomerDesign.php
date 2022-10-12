<?php

namespace App\Repositories\Customer;

interface CustomerDesign {
    public function datatable();
    public function create($param);
    public function edit($id);
    public function update($param, $id);
    public function trashedData($id);
    public function restore($id);
    public function deletePermanent($id);
}
