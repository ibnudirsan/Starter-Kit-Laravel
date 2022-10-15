<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Auth\admin\adminRequest;
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
                                        <button type="button" class="btn btn-danger btn-sm"
                                                onclick="isTrash('.$Trash->id.')">
                                                    Trash
                                        </button>
                                    ';
                            })

                    ->addColumn('edit', function ($edit) {
                        return  '
                                    <a href="'.route('admin.edit',$edit->uuid).'" type="button" class="btn btn-primary btn-sm">
                                                Edit
                                    </a>
                                ';
                    })

                    ->addColumn('role', function (User $user) {
                        $name = $user->roles->pluck('name')->implode(', ');
                        return "<span class='badge bg-secondary'>$name</span>";
                    })

                    ->rawColumns(['trash','edit','role'])
                    ->escapeColumns(['trash','edit'])
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
        DB::beginTransaction();
        try {
            
            $this->AdminResponse->create($request);
                $notification = ['message'     => 'Successfully created Admin.',
                                 'alert-type'  => 'success',
                                 'gravity'     => 'bottom',
                                 'position'    => 'right'];
                    return redirect()->route('admin.index')->with($notification);
        } catch (\Exception $e) {

            DB::rollBack();
            $notification = ['message'     => 'Failed to created Admin.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('role.index')->with($notification);

        } finally {
            DB::commit();
        }
    }

    public function edit($id)
    {
        $roles  = $this->AdminResponse->role();
        $result = $this->AdminResponse->edit($id);
            return view('master.admin.edit',compact('roles','result'));
    }
}
