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
                                                 isBlock
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

    public function trashedData($id)
    {
        DB::beginTransaction();
        try {
            $this->AdminResponse->trashedData($id);
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
                    'success' => $success
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

    public function trash(Request $request)
    {
        if($request->ajax()) {
            
            $result = $this->AdminResponse->datatable()
                                          ->onlyTrashed();

                return DataTables::eloquent($result)


                        ->addColumn('restore', function ($restore) {
                            return  '
                                        <button type="button" class="btn btn-danger btn-sm"
                                                onclick="isRestore('.$restore->id.')">
                                                    Restore
                                        </button>
                                    ';
                        })

                        ->editColumn('deleted_at', function ($deleted) {
                            $date = Carbon::create($deleted->deleted_at)->format('Y-m-d H:i:s');
                            return $date;
                        })

                        ->rawColumns(['restore'])
                        ->escapeColumns(['restore'])
                        ->smart(true)
                        ->make();

        }

            return view('master.admin.trash');
    }

    public function Restore($id)
    {
        DB::beginTransaction();
        try {
            $this->AdminResponse->restore($id);
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
                    'success' => $success
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
