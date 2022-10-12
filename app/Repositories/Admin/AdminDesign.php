<?php

namespace App\Repositories\Admin;

use LaravelEasyRepository\Repository;

interface AdminDesign extends Repository {
    public function datatable();
    public function create($param);
}
