<?php

namespace App\Repositories\Auth\Module;

use LaravelEasyRepository\Repository;

interface ModuleDesign extends Repository {
    public function datatables();
    public function store($param);
    public function edit($id);
    public function update($param, $id);
    public function trash($id);
}
