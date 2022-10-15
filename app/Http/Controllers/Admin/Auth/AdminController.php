<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\admin\adminRequest;
use App\Repositories\Auth\Admin\AdminResponse;

class AdminController extends Controller
{

    protected $AdminResponse;
    public function __construct(AdminResponse $AdminResponse)
    {
        $this->AdminResponse = $AdminResponse;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {
            
            $result = $this->AdminResponse->datatable();
            return DataTables::eloquent($result)

                    ->editColumn('created_at', function ($crated) {
                        $date = Carbon::create($crated->created_at)->format('Y-m-d H:i:s');
                        return $date;
                    })

                    ->addColumn('trash', function ($Trash) {
                            return  '
                                        <button type="button" class="btn btn-danger btn-sm btn-size"
                                                onclick="isTrash('.$Trash->id.')">
                                                    Trash
                                        </button>
                                    ';
                            })

                    ->addColumn('edit', function ($edit) {
                        return  '
                                    <a href="#" type="button" class="btn btn-success btn-sm btn-size">
                                                Edit
                                    </a>
                                ';
                    })

                    ->addColumn('role', function ($role) {
                        return "Superadmin";
                    })

                    ->rawColumns(['trash','edit','role'])
                    ->escapeColumns(['trash','edit','role'])
                    ->smart(true)
                    ->make();
        }
            return view('master.admin.index');
    }

    public function create()
    {
        $roles = $this->AdminResponse->role();
            return view('master.admin.create',compact('roles'));
    }

    public function store(adminRequest $request)
    {
        dd($request->all());
    }
}
