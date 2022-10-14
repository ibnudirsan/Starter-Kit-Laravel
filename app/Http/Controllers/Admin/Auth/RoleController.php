<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\Role\RoleResponse;

class RoleController extends Controller
{
    protected $RoleResponse;
    public function __construct(RoleResponse $RoleResponse)
    {
        $this->RoleResponse = $RoleResponse;
    }

    public function index()
    {
        return view('master.auth.role.index');
    }

    public function create()
    {
        $authorities = $this->RoleResponse->permission();
            return view('master.auth.role.create',compact('authorities'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
