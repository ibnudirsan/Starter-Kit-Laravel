<?php

namespace App\Repositories\Auth\Role;

use LaravelEasyRepository\Repository;

interface RoleDesign extends Repository{
    public function datatable();
    public function permission();
    public function store($param);
    public function view($id);
    public function update($param, $id);
    public function transh($id);
    public function tableTrashed();
    public function trashedfirst($id);
    public function restore($id);
    public function delete($id);
}
