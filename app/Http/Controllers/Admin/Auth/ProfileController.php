<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\admin\profilePassword;
use App\Http\Requests\Auth\profile\updateProfile;
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
        $profile = $this->ProfileResponse->profile(auth()->user()->id);
            return view('master.auth.profile.index',compact('profile'));
    }

    public function ProfileImage(Request $request, $id)
    {
        try {            
            $this->ProfileResponse->imageProfile($request, $id);
            $notification = ['message'     => 'Successfully Upload Image Profile.',
                             'alert-type'  => 'success',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('profile.index')->with($notification);
        } catch (\Exception $e) {
            $notification = ['message'     => 'Failed to Upload Image Profile.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('profile.index')->with($notification);
        }
    }

    public function ProfileUpdate(updateProfile $request, $id)
    {
        try {
            $this->ProfileResponse->updateProfile($request, $id);
            $notification = ['message'     => 'Successfully Updated Data Profile.',
                             'alert-type'  => 'success',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('profile.index')->with($notification);
        } catch (\Exception $e) {
            $notification = ['message'     => 'Failed to Updated Data Profile.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('profile.index')->with($notification);
        }
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
