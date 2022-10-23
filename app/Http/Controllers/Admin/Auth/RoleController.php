<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Auth\role\editRequest;
use App\Http\Requests\Auth\role\roleRequest;
use App\Repositories\Auth\Role\RoleResponse;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class RoleController extends Controller
{
    protected $RoleResponse;
    public function __construct(RoleResponse $RoleResponse)
    {
        $this->RoleResponse = $RoleResponse;
        $this->middleware('permission:Role Show',       ['only' => ['index']]);
        $this->middleware('permission:Role Create',     ['only' => ['create','store']]);
        $this->middleware('permission:Role Edit',       ['only' => ['edit','update']]);
        $this->middleware('permission:Role View',       ['only' => ['view']]);
        $this->middleware('permission:Role Trash',      ['only' => ['trash','dataTrash']]);
        $this->middleware('permission:Role Restore',    ['only' => ['restore']]);
        $this->middleware('permission:Role Delete',     ['only' => ['delete']]);
    }

    /**
     * List Data Role
     */
    public function index(Request $request)
    {
        if($request->ajax()) {

            $result = $this->RoleResponse->datatable();
                return DataTables::eloquent($result)


                ->addColumn('action', function ($action) {

                    if (auth()->user()->can('Role Trash')) {
                        $Trash  =  '
                                        <button type="button" class="btn btn-danger btn-sm btn-size"
                                            onclick="isTrash('.$action->id.')">
                                            Trash
                                        </button>
                                    ';
                    } else {
                        $Trash = '';
                    }

                    if (auth()->user()->can('Role View')) {
                        $View   =   '
                                        <a href="'.route('role.view',$action->uuid).'" type="button" 
                                            class="btn btn-success btn-sm btn-size">
                                            View
                                        </a>
                                    ';
                    } else {
                        $View   = '';
                    }

                    if (auth()->user()->can('Role Edit')) {
                        $Edit   =   '
                                        <a href="'.route('role.edit',$action->uuid).'" type="button"
                                            class="btn btn-primary btn-sm btn-size">
                                            Edit
                                        </a>
                                    ';            
                    } else {
                        $Edit   = '';
                    }
                        return $Trash." ".$View." ".$Edit;
                })

                ->addColumn('count', function ($count) {
                    return count($count->permissions). " Permissions";
                })

                ->editColumn('created_at', function ($created) {
                    return Carbon::create($created->created_at)->format('Y-m-d H:i:s');
                })

                ->editColumn('guard_name', function ($name) {
                    return ucwords($name->guard_name);
                })

                ->rawColumns(['created_at','action'])
                ->escapeColumns(['action'])
                ->smart(true)
                ->make();
        }

        return view('master.auth.role.index');
    }

    /**
     * View Create Data Role
     */
    public function create()
    {
        $authorities = $this->RoleResponse->permission();
            return view('master.auth.role.create',compact('authorities'));
    }

    /**
     * Process Create Data Role
     */
    public function store(roleRequest $request)
    {

        DB::beginTransaction();
        try {
            $this->RoleResponse->store($request);
                $notification = ['message'     => 'Successfully created Role.',
                                'alert-type'  => 'success',
                                'gravity'     => 'bottom',
                                'position'    => 'right'];
                    return redirect()->route('role.index')->with($notification);
        } catch (\Exception $e) {
            
            DB::rollBack();
            $notification = ['message'     => 'Failed to created Role.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('role.index')->with($notification);

        } finally {
            DB::commit();
        }
    }

    /**
     * View Edit data Role
     */
    public function edit($id)
    {
        $authorities = $this->RoleResponse->permission();
        $result      = $this->RoleResponse->view($id);
            return view('master.auth.role.edit', compact('authorities','result'));
    }

    /**
     * Process Edit data Role
     */
    public function update(editRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            
            $this->RoleResponse->update($request, $id);
            $notification = ['message'     => 'Successfully updated Role.',
                             'alert-type'  => 'success',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('role.index')->with($notification);

        } catch (\Exception $e) {
            
            DB::rollBack();
            $notification = ['message'     => 'Failed to updated Role.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('role.index')->with($notification);

        } finally {
            DB::commit();
        }
    }

    /**
     * View data Role
     */
    public function view($id)
    {
        $authorities = $this->RoleResponse->permission();
        $result      = $this->RoleResponse->view($id);
            return view('master.auth.role.view', compact('authorities','result'));
    }

    /**
     * Process moving data Role to Trash
     */
    public function trash($id)
    {
        DB::beginTransaction();
        try {
            $this->RoleResponse->transh($id);
            $message = "Successfully to moving Data Role Trash.";
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
     * List Trash data Role
     */
    public function dataTrash(Request $request)
    {
        if($request->ajax()) {

            $result = $this->RoleResponse->tableTrashed();
                return DataTables::eloquent($result)

                ->addColumn('action', function ($action) {

                    if (auth()->user()->can('Role Restore')) {
                        $Restore  = '
                                        <button type="button" class="btn btn-primary btn-sm btn-size"
                                            onclick="isRestore('.$action->id.')">
                                            Restore
                                        </button>
                                    ';
                    } else {
                        $Restore = '';
                    }

                    if (auth()->user()->can('Role Delete')) {
                        $Delete  =  '
                                        <button type="button" class="btn btn-danger btn-sm btn-size"
                                            onclick="isDelete('.$action->id.')">
                                            Delete
                                        </button>
                                    ';
                    } else {
                        $Delete  = '';
                    }

                    
                        return $Restore." ".$Delete;
                })


                ->addColumn('count', function ($count) {
                    return count($count->permissions). " Permissions";
                })

                ->editColumn('deleted_at', function ($deleted) {
                    return Carbon::create($deleted->deleted_at)->format('Y-m-d H:i:s');
                })

                ->rawColumns(['action'])
                ->escapeColumns(['action'])
                ->smart(true)
                ->make();
        }
            return view('master.auth.role.trash');
    }

    /**
     * Process Role data Restore
     */
    public function restore($id)
    {
        try {
            $this->RoleResponse->restore($id);
            $result  = $this->RoleResponse->trashedfirst($id);
            $message = "Successfully to Restore data Role : $result->name.";
            $success = true;
        } catch (\Exception $e) {
            $message = "Failed to Restore data Role.";
            $success = false;
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
     * Delete Permanent Data Role
     */
    public function delete($id)
    {
        try {
            $result  = $this->RoleResponse->trashedfirst($id);
            $this->RoleResponse->delete($id);
            $success = true;
            $message = "Successfully to Delete Permanent Data Role : $result->name.";
        } catch (\Exception $e) {
            $message = "Failed to Delete data Role.";
            $success = false;
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
