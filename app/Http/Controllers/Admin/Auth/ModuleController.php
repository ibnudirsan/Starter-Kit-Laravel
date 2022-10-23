<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Auth\module\moduleRequest;
use App\Repositories\Auth\Module\ModuleResponse;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class ModuleController extends Controller
{
    protected $ModuleResponse;
    public function __construct(ModuleResponse $ModuleResponse)
    {
        $this->ModuleResponse = $ModuleResponse;
        $this->middleware('permission:Module Show',     ['only' => ['index']]);
        $this->middleware('permission:Module Create',   ['only' => ['create','store']]);
        $this->middleware('permission:Module Edit',     ['only' => ['edit','update']]);
        $this->middleware('permission:Module Trash',    ['only' => ['trash','trashData']]);
        $this->middleware('permission:Module Restore',  ['only' => ['restore']]);
        $this->middleware('permission:Module Delete',   ['only' => ['delete']]);
    }

    /**
     * index View Data Module
     */
    public function index(Request $request)
    {
        if($request->ajax()) {

            $result = $this->ModuleResponse->datatables();
            return DataTables::eloquent($result)

            ->editColumn('created_at', function ($crated) {
                $date = Carbon::create($crated->created_at)->format('Y-m-d H:i:s');
                return $date;
            })
            ->addColumn('action', function ($action) {
                if (auth()->user()->can('Module Edit')) {
                    $Edit   =  '
                                    <a href="'.route('module.edit', $action->uuid).'" type="button" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                ';
                } else {
                    $Edit   =   '';
                }

                if(auth()->user()->can('Module Trash')) {
                    $Trash  =   '
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="isTrash('.$action->id.')">
                                        Trash
                                    </button>  
                                ';
                } else {
                    $Trash  =   '';
                }
                    return $Trash." ".$Edit;
            })

            ->addColumn('permissions', function ($count) {
                return count($count->permissions). " Permissions";
            })
            ->rawColumns(['action'])
            ->escapeColumns(['action'])
            ->smart(true)
            ->make();

        }
        return view('master.auth.module.index');
    }

    /**
     * Create View Data Module
     */
    public function create()
    {
        return view('master.auth.module.create');
    }

    /**
     * Store Data Module
     */
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

    /**
     * Edit Data Module
     */
    public function edit($id)
    {
        $result = $this->ModuleResponse->edit($id);
            return view('master.auth.module.edit',compact('result'));
    }

    /**
     * Update Data Module
     */
    public function update(moduleRequest $request, $id)
    {
        try {
            $this->ModuleResponse->update($request, $id);
            $notification = ['message'     => 'Successfully Updated Module.',
                             'alert-type'  => 'success',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('module.index')->with($notification);

        } catch (\Exception $e) {
            
            $notification = ['message'     => 'Failed to Updated Module.',
                             'alert-type'  => 'danger',
                             'gravity'     => 'bottom',
                             'position'    => 'right'];
                return redirect()->route('module.index')->with($notification);
    
        }
    }

    /**
     * Trash Data Module
     */
    public function trash($id)
    {
        try {
            $this->ModuleResponse->trash($id);
            $message = "Successfully to Trashed Data Module.";
            $success = true;
        } catch (\Exception $e) {
            $message = "Failed to moving data Trash";
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
     * List Trash Data Module
     */
    public function trashData(Request $request)
    {
        if($request->ajax()) {
        
            $result = $this->ModuleResponse->datatables()
                                           ->onlyTrashed();

            return DataTables::eloquent($result)


            ->addColumn('action', function ($action) {

                if (auth()->user()->can('Module Restore')) {
                    $Restore  = '
                                    <button type="button" class="btn btn-primary btn-sm btn-size"
                                        onclick="isRestore('.$action->id.')">
                                        Restore
                                    </button>
                                ';
                } else {
                    $Restore = '';
                }

                if (auth()->user()->can('Module Delete')) {
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

            ->editColumn('deleted_at', function ($delete) {
                $date = Carbon::create($delete->deleted_at)->format('Y-m-d H:i:s');
                return $date;
            })
            ->addColumn('permissions', function ($count) {
                return count($count->permissions). " Permissions";
            })

            ->rawColumns([])
            ->escapeColumns([])
            ->smart(true)
            ->make();
        }   
            return view('master.auth.module.trash');
    }

    /**
     * Restore Data Module
     */
    public function restore($id)
    {
        try {
            $this->ModuleResponse->restore($id);
            $result  = $this->ModuleResponse->trashedfirst($id);
            $message = "Successfully to restore Data Module : $result->module_name.";
            $success = true;
        } catch (\Exception $e) {
            $message = "Failed to Restore data Module";
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
     * Delete Permanent Data Module
     */
    public function delete($id)
    {
        try {
            $result  = $this->ModuleResponse->trashedfirst($id);            
            $this->ModuleResponse->delete($id);
            $success = true;
            $message = "Successfully to Delete Permanent Data Module : $result->module_name.";
        } catch (\Exception $e) {
            $message = "Failed to Delete Permanent Data Module.";
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
