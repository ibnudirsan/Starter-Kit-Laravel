<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Auth\permissions\requestPemissions;
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

    public function create()
    {
        $results = $this->PermissionsResponse->module();
            return view('master.auth.permission.create', compact('results'));
    }

    public function store(requestPemissions $request)
    {
        try {
            $this->PermissionsResponse->store($request);
            $notification = ['message'     => 'Successfully created Permission.',
                             'alert-type'  => 'success',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('permissions.index')->with($notification);

        } catch (\Exception $e) {
            
            $notification = ['message'     => 'Failed to created Permission.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('permissions.index')->with($notification);

        }
    }
}
