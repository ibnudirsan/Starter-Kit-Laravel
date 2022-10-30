<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Repositories\Auth\Google2Fa\Google2FaResponse;

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
        $NewSecretKey   = $google2fa->generateSecretKey();
        $SecretKey      = $user->secret->secret2Fa;

        $QR_Image = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->name,
            $SecretKey
        );

        $QRCode = QrCode::size(200)->generate($QR_Image);

        return view('master.auth.2fa.index',compact('QRCode','SecretKey'));
    }

    public function activation(Request $request)
    {
        $id = auth()->user()->id;
        $this->Google2FaResponse->activation($request, $id);
            $notification = ['message'     => 'Code match, Successfuly activation of Google 2FA.',
                             'alert-type'  => 'success',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('google2fa.index')->with($notification);
    }
}
