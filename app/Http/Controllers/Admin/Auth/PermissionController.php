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
                    ->addColumn('action', function ($action) {
                        
                        
                        if (auth()->user()->can('Permissions Edit')){
                            $Edit   =  '
                            <a href="'.route('permissions.edit', $action->uuid).'" type="button" class="btn btn-primary btn-sm">
                            Edit
                            </a>
                            ';
                        } else {
                            $Edit   = '';
                        }
                        
                        if(auth()->user()->can('Permissions Delete')) {
                            $Delete = '
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="isDelete('.$action->id.')">
                                            Delete
                                        </button>
                                      ';
                        } else {
                            $Delete = '';
                        }
                            return $Delete.' '.$Edit;
                    })
                    ->rawColumns(['action'])
                    ->escapeColumns(['action'])
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

    public function edit($id)
    {
        $modules = $this->PermissionsResponse->module();
        $result  = $this->PermissionsResponse->edit($id);
            return view('master.auth.permission.edit',compact('result','modules'));
    }

    public function update(requestPemissions $request, $id)
    {
        try {
            $this->PermissionsResponse->update($request, $id);
                $notification = ['message'     => 'Successfully updated Permission.',
                                 'alert-type'  => 'success',
                                 'gravity'     => 'bottom',
                                 'position'    => 'right'];
                    return redirect()->route('permissions.index')->with($notification);

        } catch (\Exception $e) {
           
            $notification = ['message'     => 'Failed to updated Permission.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('permissions.index')->with($notification);
            
        }
    }
}
