<?php

namespace App\Repositories\Auth\Profile;

use App\Models\User;
use App\Models\profileUser;
use LaravelEasyRepository\Implementations\Eloquent;

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

    public function CurrentPassword($param)
    {
        return $this->model->select('password')->where('id',$param)->first();
    }

    public function updatePassword($param, $id)
    {
        return $this->model->where('id',$id)->update([
            'password'  => bcrypt($param->password)
        ]);
    }

    public function profile($id)
    {
        return $this->profile->whereUserId($id)->first();
    }

    public function imageProfile($param, $id)
    {
        # code...
    }

    public function updateProfile($param, $id)
    {
        return $this->profile->whereUserId($id)->update([
            'fullName'      => $param->fullname,
            'numberPhone'   => $param->numberphone,
            'TeleID'        => $param->telegram
        ]);
    }
}
