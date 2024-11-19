<?php

namespace App\Repositories\Auth\Google2Fa;

use LaravelEasyRepository\Repository;

interface Google2FaDesign extends Repository {
    public function activation($param, $id);
    public function validation();
}
