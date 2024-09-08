<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\Admin\AdminResponse;
use App\Repositories\Customer\CustomerResponse;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © Raungdev 2022
|--------------------------------------------------------------------------
*/
class dashboardController extends Controller
{
    protected $AdminResponse;
    public function __construct(AdminResponse $AdminResponse)
    {
        $this->AdminResponse    = $AdminResponse;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user       = $this->AdminResponse->datatable()->count();
            return view('home',compact('user'));
    }
}
