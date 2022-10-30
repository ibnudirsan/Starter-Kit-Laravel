<?php

namespace App\Repositories\Auth\Profile;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Profile;
use App\Models\User;

class ProfileResponse extends Eloquent implements ProfileDesign {

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    protected $profile;

    /**
     *
     * @param User $model
     * @param profileUser $profile
     */
    public function __construct(User $model, profileUser $profile)
    {
        $this->model    = $model;
        $this->profile  = $profile;
    }

    public function index()
    {
        # code...
    }
}
