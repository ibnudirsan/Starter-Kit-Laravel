<?php

namespace App\Repositories\Auth\Google2Fa;


use Carbon\Carbon;
use App\Models\userSecret;
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
    public function __construct(userSecret $model)
    {
        $this->model = $model;
    }

    public function activation($param, $id)
    {
        $secret2Fa      = auth()->user()->secret->secret2Fa;
        $google2fa      = app('pragmarx.google2fa');
        $valid          = $google2fa->verifyKey($secret2Fa, $param->otp);
            if($valid === true) {
                $result = $this->model->whereUserId($id)->update([
                    'statusOTP' => true,
                    'timeOTP'   => Carbon::now()->addDay()->format('Y-m-d H:i:s'),
                ]);
                return (boolean) $result;
            } elseif ($valid === false) {
                $notification = ['message'     => 'Code No match, Google 2FA activation failed.',
                                 'alert-type'  => 'danger',
                                 'gravity'     => 'bottom',
                                 'position'    => 'right'];
                    return redirect()->route('google2fa.index')->with($notification);
            }

    }

    public function validation()
    {
        try {

            $timeOTP        = Carbon::now()->addDay()->format('Y-m-d H:i:s');
            $this->model->where('user_id',auth()->user()->id)->update([
                'timeOTP'   => $timeOTP
            ]);
            
        } catch (\Exception $e) {
            $notification = ['message'     => 'An error occurred in the internal server application.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('google.validation')->with($notification);
        }



    }
}
