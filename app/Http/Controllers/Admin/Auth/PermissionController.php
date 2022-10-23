<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Auth\permissions\requestPemissions;
use App\Repositories\Auth\Permissions\PermissionsResponse;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class PermissionController extends Controller
{
    protected $PermissionsResponse;
    public function __construct(PermissionsResponse $PermissionsResponse)
    {
        $this->PermissionsResponse = $PermissionsResponse;
        $this->middleware('permission:Permissions Show',    ['only'    => ['index']]);
        $this->middleware('permission:Permissions Create',  ['only'    => ['create','store']]);
        $this->middleware('permission:Permissions Edit',    ['only'    => ['edit','update']]);
        $this->middleware('permission:Permissions Trash',   ['only'    => ['trash','dataTrash']]);
        $this->middleware('permission:Permissions Restore', ['only'    => ['restore']]);
        $this->middleware('permission:Permissions Delete',  ['only'    => ['delete']]);
    }

    public function index(Request $request)
    {
        /**
         * List Data Permissions
         */
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
                            $Edit   =   '
                                            <a href="'.route('permissions.edit', $action->uuid).'" type="button" class="btn btn-primary btn-sm">
                                                Edit
                                            </a>
                                        ';
                        } else {
                            $Edit   =   '';
                        }
                        
                        if(auth()->user()->can('Permissions Trash')) {
                            $Delete =   '
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="isTrash('.$action->id.')">
                                                Trash
                                            </button>
                                        ';
                        } else {
                            $Delete =   '';
                        }
                            return $Edit.' '.$Delete;
                    })
                    ->rawColumns(['action'])
                    ->escapeColumns(['action'])
                    ->smart(true)
                    ->make();
        }
            return view('master.auth.permission.index');
    }

    /**
     * View Create Data Permission.
     */
    public function create()
    {
        $results = $this->PermissionsResponse->module();
            return view('master.auth.permission.create', compact('results'));
    }

    /**
     * Process Create Data Permission.
     */
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

    /**
     * View Edit Data Permission.
     */
    public function edit($id)
    {
        $modules = $this->PermissionsResponse->module();
        $result  = $this->PermissionsResponse->edit($id);
            return view('master.auth.permission.edit',compact('result','modules'));
    }

    /**
     * Process Edit Data Permission.
     */
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

    /**
     * Process Moving Data Permission to Trash.
     */
    public function trash($id)
    {
        try {
            $this->PermissionsResponse->trash($id);
            $success = true;
            $message = "Successfully to moving Trash data Pemission.";
        } catch (\Exception $e) {
            $message = "Failed to moving Trash data Permisson.";
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
     * List Data Permissions Trash.
     */
    public function dataTrash(Request $request)
    {
        if($request->ajax()) {

            $result = $this->PermissionsResponse
                           ->datatables()
                           ->onlyTrashed();

                return DataTables::eloquent($result)
                
                ->editColumn('deleted_at', function ($deleted) {
                    return empty($deleted->deleted_at) ? '-' : Carbon::create($deleted->deleted_at)->format('Y-m-d H:i:s');
                })
                ->editColumn('guard_name', function ($name) {
                    return ucwords($name->guard_name);
                })

                ->addColumn('action', function ($action) {
                        

                    if (auth()->user()->can('Permissions Restore')){
                        $Restore   =    "
                                            <button type='button' class='btn btn-primary btn-sm'
                                                onclick='isRestore($action->id)'>
                                                Restore
                                            </button>
                                        ";
                    } else {
                        $Restore   = '';
                    }
                    
                    if(auth()->user()->can('Permissions Delete')) {
                        $Delete     =   '
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="isDelete('.$action->id.')">
                                                Delete
                                            </button>
                                        ';
                    } else {
                        $Delete = '';
                    }
                        return $Restore.' '.$Delete;
                })

                ->rawColumns(['action'])
                ->escapeColumns(['action'])
                ->smart(true)
                ->make();
        }
        return view('master.auth.permission.trash');
    }

    /**
     * Process Restore Data Permission.
     */
    public function restore($id)
    {
        try {
            $this->PermissionsResponse->restore($id);
            $result  = $this->PermissionsResponse->trashedfirst($id);
            $success = true;
            $message = "Successfully to restore Data Pemission: $result->name.";
        } catch (\Exception $e) {
            $message = "Failed to restore Data Restore.";
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
     * Delete Permanent Data Permission
     */
    public function delete($id)
    {
        try {
            $result  = $this->PermissionsResponse->trashedfirst($id);
            $this->PermissionsResponse->delete($id);
            $success = true;
            $message = "Successfully to Delete Permanent Data Permission : $result->name.";
        } catch (\Exception $e) {
            $message = "Failed to Delete Permanent Data Permission.";
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
