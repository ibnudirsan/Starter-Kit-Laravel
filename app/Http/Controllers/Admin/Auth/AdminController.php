<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Auth\admin\editRequest;
use App\Http\Requests\Auth\admin\adminRequest;
use App\Repositories\Auth\Admin\AdminResponse;
use PhpParser\Builder\Function_;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class AdminController extends Controller
{

    protected $AdminResponse;
    public function __construct(AdminResponse $AdminResponse)
    {
        $this->AdminResponse = $AdminResponse;
        $this->middleware('permission:Admin Create',    ['only' => ['create','store']]);
        $this->middleware('permission:Admin Edit',      ['only' => ['edit','update']]);
        $this->middleware('permission:Admin Trash',     ['only' => ['trashedData','trash']]);
        $this->middleware('permission:Admin Restore',   ['only' => ['Restore']]);
        $this->middleware('permission:Admin Show',      ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        /**
         * index data Admin
         */
        if($request->ajax()) {
            
            $result = $this->AdminResponse->datatable();
            return DataTables::eloquent($result)

                    ->editColumn('created_at', function ($crated) {
                        $date = Carbon::create($crated->created_at)->format('Y-m-d H:i:s');
                        return $date;
                    })

                    ->addColumn('action', function ($action) {

                        if (auth()->user()->can('Admin Trash')){
                            $Trash =    '
                                            <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="isTrash('.$action->id.')">
                                                    Block
                                            </button>
                                        ';
                        } else {
                            $Trash =    '';
                        }

                        if (auth()->user()->can('Admin Edit')) {
                            $Edit   =  '
                                            <a href="'.route('admin.edit',$action->uuid).'" type="button" class="btn btn-primary btn-sm">
                                                        Edit
                                            </a>
                                        ';
                        } else {
                            $Edit   =   '';
                        }
                            return $Trash.' '.$Edit;
                    })

                    ->addColumn('role', function (User $user) {
                        $name = $user->roles->pluck('name')->implode(', ');
                        return "<span class='badge bg-secondary'>$name</span>";
                    })

                    ->rawColumns(['action','role'])
                    ->escapeColumns(['action'])
                    ->smart(true)
                    ->make();
        }
            return view('master.auth.admin.index');
    }

    /**
     * View Create Data Admin
     */
    public function create()
    {
        $roles = $this->AdminResponse->role();
            return view('master.auth.admin.create',compact('roles'));
    }

    /**
     * Process Create Data Admin
     */
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

    /**
     * View Edit Data Admin
     */
    public function edit($id)
    {
        $roles  = $this->AdminResponse->role();
        $result = $this->AdminResponse->edit($id);
            return view('master.auth.admin.edit',compact('roles','result'));
    }

    /**
     * Process Edit Data Admin
     */
    public function update(editRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            $this->AdminResponse->update($request, $id);
                $notification = ['message'     => 'Successfully updated Admin.',
                                'alert-type'  => 'success',
                                'gravity'     => 'bottom',
                                'position'    => 'right'];
                    return redirect()->route('admin.index')->with($notification);

        } catch (\Exception $e) {

            DB::rollBack();
                $notification = ['message'     => 'Failed to updated Admin.',
                                 'alert-type'  => 'danger',
                                 'gravity'     => 'bottom',
                                 'position'    => 'right'];
                    return redirect()->route('admin.index')->with($notification);
        } finally {
            DB::commit();
        }
    }

    /**
     * Process moving data admin to Trash
     */
    public function trashedData($id)
    {
        DB::beginTransaction();
        try {
            $this->AdminResponse->trashedData($id);
            $message = "Successfully to Trashed Data Admin.";
            $success = true;
        } catch (\Exception $e) {
            DB::rollBack();
            $message = "Failed to moving data Trash";
            $success = false;
        } finally {
            DB::commit();
        }
            if($success == true) {
                /**
                 * Return response true
                 */
                return response()->json([
                    'success' => $success,
                    'message' => $message,
                ]);
            } elseif ($success == false) {
                /**
                 * Return response false
                 */
                return response()->json([
                    'success' => $success,
                    'message' => $message,
                ]);
            }
    }

    /**
     * List Data Trash Admin
     */
    public function trash(Request $request)
    {
        if($request->ajax()) {
            
            $result = $this->AdminResponse->datatable()
                                          ->onlyTrashed();

                return DataTables::eloquent($result)


                        ->addColumn('action', function ($restore) {
                            
                            if (auth()->user()->can('Admin Restore')) {
                                $Restore =  '
                                                <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="isRestore('.$restore->id.')">
                                                            Restore
                                                </button>
                                            ';
                            } else {
                                $Restore =  '';
                            }
                                return $Restore;
                        })

                        ->editColumn('deleted_at', function ($deleted) {
                            $date = Carbon::create($deleted->deleted_at)->format('Y-m-d H:i:s');
                            return $date;
                        })

                        ->editColumn('secret.isBlock', function($status) {
                            return $status->secret->isBlock == 1    ? 
                                                                        '<span class="badge bg-danger">Block</span>'
                                                                    :   
                                                                        '<span class="badge bg-success">Active</span>';
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns(['action'])
                        ->smart(true)
                        ->make();

        }
            return view('master.auth.admin.trash');
    }

    /**
     * Process Restore data Admin
     */
    public function Restore($id)
    {
        DB::beginTransaction();
        try {
            $this->AdminResponse->restore($id);
            $result  = $this->AdminResponse->trashedfirst($id);
            $message = "Successfully to restore Data Admin : $result->name.";
            $success = true;
        } catch (\Exception $e) {
            $message = "Failed to Restore data Admin.";
            $success = false;
            DB::rollBack();
        } finally {
            DB::commit();
        }
            if($success == true) {
                /**
                 * Return response true
                 */
                return response()->json([
                    'success' => $success,
                    'message' => $message,
                ]);
            } elseif ($success == false) {
                /**
                 * Return response false
                 */
                return response()->json([
                    'success' => $success,
                    'message' => $message,
                ]);
            }
    }
}
