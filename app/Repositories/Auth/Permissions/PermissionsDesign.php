<?php

namespace App\Repositories\Auth\Permissions;

use LaravelEasyRepository\Repository;

interface PermissionsDesign extends Repository {
    public function datatables();
    public function module();
    public function store($param);
}
