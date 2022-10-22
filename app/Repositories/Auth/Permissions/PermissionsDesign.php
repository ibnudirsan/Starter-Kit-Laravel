<?php

namespace App\Repositories\Auth\Permissions;

use LaravelEasyRepository\Repository;

interface PermissionsDesign extends Repository {
    public function datatables();
    public function module();
    public function store($param);
    public function edit($id);
    public function update($param, $id);
    public function trash($id);
    public function restore($id);
}
