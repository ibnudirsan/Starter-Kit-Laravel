<?php

namespace App\Repositories\Auth\Permissions;

use LaravelEasyRepository\Repository;

interface PermissionsDesign extends Repository {
    public function datatables();
    public function store($param, $id);
    public function module();
}
