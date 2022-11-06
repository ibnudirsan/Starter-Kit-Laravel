<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Repositories\Auth\Google2Fa\Google2FaResponse;
use App\Http\Requests\Auth\google2fa\validatorGoogle2fa;

class Google2FaController extends Controller
{
    protected $Google2FaResponse;
    public function __construct(Google2FaResponse $Google2FaResponse)
    {
        $this->Google2FaResponse = $Google2FaResponse;
    }

    public function index()
    {
        $user           = Auth::User();  
        $google2fa      = app('pragmarx.google2fa');
        $SecretKey      = $user->secret->secret2Fa;

        $QR_Image = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->name,
            $SecretKey
        );

        $QRCode = QrCode::size(200)->generate($QR_Image);

        return view('master.auth.google2fa.index',compact('QRCode','SecretKey'));
    }

    public function activation(validatorGoogle2fa $request)
    {
        try {
            $id = auth()->user()->id;
                $result = $this->Google2FaResponse->activation($request, $id);
                if($result === true) {
                    $notification = ['message'     => 'Code Match, Successfuly activation of Google 2FA.',
                                     'alert-type'  => 'success',
                                     'gravity'     => 'bottom',
                                     'position'    => 'right'];
                        return redirect()->route('google2fa.index')->with($notification);
                } else {
                    return $result;
                }
        } catch (\Exception $e) {
            $notification = ['message'     => 'An error occurred on the internal server.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('google2fa.index')->with($notification);
        }
    }

    public function validation()
    {
        return view('master.auth.google2fa.validation');
    }

    public function google2FaValidator(validatorGoogle2fa $request)
    {
        $google2fa      = app('pragmarx.google2fa');
        $valid          = $google2fa->verifyKey(auth()->user()->secret->secret2Fa, $request->otp);
            if($valid) {
                $this->Google2FaResponse->validation();
                $notification = ['message'     => 'Welcome to the CMS RumahDev.',
                                 'alert-type'  => 'success',
                                 'gravity'     => 'bottom',
                                 'position'    => 'right'];
                    return redirect()->route('home')->with($notification);
            } elseif (!$valid){
                $notification = ['message'     => 'Code No match, OTP Google 2FA Failed.',
                                 'alert-type'  => 'danger',
                                 'gravity'     => 'bottom',
                                 'position'    => 'right'];
                    return redirect()->route('google.validation')->with($notification);
            }

    }
}
