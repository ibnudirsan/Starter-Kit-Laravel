<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Customer\CustomerResponse;

class CustomerController extends Controller
{

    protected $CustomerResponse ;
    public function __construct(CustomerResponse  $CustomerResponse )
    {
        $this->CustomerResponse  = $CustomerResponse ;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {
            $result = $this->CustomerResponse->datatable();
                return DataTables::of($result)
                                ->addIndexColumn(['address'])
                                ->rawColumns([])
                                ->escapeColumns([])
                                ->smart(true)
                                ->make();
        }
            return view('master.customer.index');
    }
}
