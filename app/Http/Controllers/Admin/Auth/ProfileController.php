<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\admin\profilePassword;
use App\Repositories\Auth\Profile\ProfileResponse;

class ProfileController extends Controller
{
    protected $ProfileResponse;
    public function __construct(ProfileResponse $ProfileResponse)
    {
        $this->ProfileResponse = $ProfileResponse;
    }

    public function index()
    {
        return view('master.auth.profile.index');
    }

    public function setting()
    {
        return view('master.auth.profile.setting');
    }

    public function password(profilePassword $request)
    {
        try {
            $id     = auth()->user()->id;
            $auth   = $this->ProfileResponse->CurrentPassword($id);
                if(Hash::check($request->passwordOld, $auth->password)) {
                    $this->ProfileResponse->updatePassword($request,$id);
                    $notification = ['message'     => 'Successfully Updated Password Profile.',
                                     'alert-type'  => 'success',
                                     'gravity'     => 'bottom',
                                     'position'    => 'right'];
                        return redirect()->route('profile.setting')->with($notification);

                } elseif (! Hash::check($request->passwordOld, $auth->password)) {
                    $notification = ['message'     => 'The current password is incorrect, Enter again.',
                                    'alert-type'  => 'danger',
                                    'gravity'     => 'bottom',
                                    'position'    => 'right'];
                        return redirect()->route('profile.setting')->with($notification);
                }
        } catch (\Exception $e) {
            $notification = ['message'     => 'Failed to update Password Profile.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('profile.setting')->with($notification);
        }
    }
}
