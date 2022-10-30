<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        # code...
    }

    public function setting()
    {
        return view('master.auth.admin.profile.setting');
    }
}
