<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Auth\Role\RoleResponse;

class RoleController extends Controller
{
    protected $RoleResponse;
    public function __construct(RoleResponse $RoleResponse)
    {
        $this->RoleResponse = $RoleResponse;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {

            $result = $this->RoleResponse->datatable();
                return DataTables::eloquent($result)

                ->addColumn('view', function ($view) {
                    return  '
                                <a href="#" type="button" class="btn btn-success btn-sm btn-size">
                                    View
                                </a>
                            ';
                })

                ->addColumn('edit', function ($edit) {
                    return  '
                                <a href="#" type="button" class="btn btn-primary btn-sm btn-size">
                                    Edit
                                </a>
                            ';
                })

                ->editColumn('created_at', function ($created) {
                    return Carbon::create($created->created_at)->format('Y-m-d H:i:s');
                })

                ->rawColumns(['view','edit','created_at'])
                ->escapeColumns(['view','edit'])
                ->smart(true)
                ->make();
        }

        return view('master.auth.role.index');
    }

    public function create()
    {
        $authorities = $this->RoleResponse->permission();
            return view('master.auth.role.create',compact('authorities'));
    }

    public function store(Request $request)
    {
        try {
            $this->RoleResponse->store($request);
                $notification = ['message'     => 'Successfully created Role.',
                                'alert-type'  => 'success',
                                'gravity'     => 'bottom',
                                'position'    => 'right'];
                    return redirect()->route('role.index')->with($notification);
        } catch (\Exception $e) {
            
            $notification = ['message'     => 'Failed to created Role.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('role.index')->with($notification);

        }
    }
}
