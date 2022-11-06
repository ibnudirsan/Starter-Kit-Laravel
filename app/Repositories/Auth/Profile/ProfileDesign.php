<?php

namespace App\Repositories\Auth\Profile;

use LaravelEasyRepository\Repository;

interface ProfileDesign extends Repository {
    public function index();
    public function CurrentPassword($param);
    public function updatePassword($param, $id);
    public function imageProfile($param, $id);
    public function updateProfile($param, $id);
}
