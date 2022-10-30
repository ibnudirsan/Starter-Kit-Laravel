<?php

namespace App\Repositories\Auth\Google2Fa;

use App\Models\profileUser;
use LaravelEasyRepository\Implementations\Eloquent;


class Google2FaResponse extends Eloquent implements Google2FaDesign{

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
    public function __construct(profileUser $model)
    {
        $this->model = $model;
    }

    public function activation($param)
    {
        $secret2Fa      = auth()->user()->secret->secret2Fa;
        $google2fa      = app('pragmarx.google2fa');
        $valid          = $google2fa->verifyKey($secret2Fa, $param->qrcode);
            if($valid) {
                return "OKE";
            } elseif (!$valid) {
                return "Error";
            }

    }
}
