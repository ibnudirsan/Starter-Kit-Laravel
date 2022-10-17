<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Auth\module\moduleRequest;
use App\Repositories\Auth\Module\ModuleResponse;

class ModuleController extends Controller
{
    protected $ModuleResponse;
    public function __construct(ModuleResponse $ModuleResponse)
    {
        $this->ModuleResponse = $ModuleResponse;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {

            $result = $this->ModuleResponse->datatables();
            return DataTables::eloquent($result)

            ->editColumn('created_at', function ($crated) {
                $date = Carbon::create($crated->created_at)->format('Y-m-d H:i:s');
                return $date;
            })
            ->addColumn('edit', function ($edit) {
                return  '
                            <a href="" type="button" class="btn btn-primary btn-sm">
                                        Edit
                            </a>
                        ';
            })
            ->addColumn('permissions', function ($count) {
                return count($count->permissions). " Permissions";
            })
            ->rawColumns(['edit'])
            ->escapeColumns(['edit'])
            ->smart(true)
            ->make();

        }
        return view('master.auth.module.index');
    }

    public function create()
    {
        return view('master.auth.module.create');
    }

    public function store(moduleRequest $request)
    {
        try {
            $this->ModuleResponse->store($request);
            $notification = ['message'     => 'Successfully created Module.',
                             'alert-type'  => 'success',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('module.index')->with($notification);

        } catch (\Exception $e) {
            
            $notification = ['message'     => 'Failed to created Module.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('module.index')->with($notification);
            
        }
    }
}
