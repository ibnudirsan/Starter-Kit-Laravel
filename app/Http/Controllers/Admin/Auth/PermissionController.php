<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Auth\Permissions\PermissionsResponse;

class PermissionController extends Controller
{
    protected $PermissionsResponse;
    public function __construct(PermissionsResponse $PermissionsResponse)
    {
        $this->PermissionsResponse = $PermissionsResponse;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {

            $result = $this->PermissionsResponse->datatables();
                return DataTables::eloquent($result)

                    ->editColumn('created_at', function ($crated) {
                        return empty($crated->created_at) ? '-' : Carbon::create($crated->created_at)->format('Y-m-d H:i:s');
                    })
                    ->editColumn('guard_name', function ($name) {
                        return ucwords($name->guard_name);
                    })
                    ->addColumn('edit', function ($edit) {
                        return  '
                                    <a href="" type="button" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                ';
                    })
                    ->rawColumns(['edit'])
                    ->escapeColumns(['edit'])
                    ->smart(true)
                    ->make();
        }
            return view('master.auth.permission.index');
    }
}
