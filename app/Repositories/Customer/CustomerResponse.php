<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use App\Repositories\Customer\CustomerDesign;

class CustomerResponse  implements CustomerDesign {

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;
    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    /**
     * Query for datatable without get() method.
     */
    public function datatable()
    {
        return $this->model->select('id','uuid','firstName','lastName','address','numberPhone','email','birthDay','age','deleted_at');
    }

    /**
     * Query for create data customer method.
     */
    public function create($param)
    {
        return $this->model->create([
            'firstName'     => $param->firstName,
            'lastName'      => $param->lastName,
            'email'         => $param->email,
            'address'       => $param->address,
            'numberPhone'   => $param->numberPhone
        ]);
    }

    /**
     * Query for trashedData Method.
     */
    public function trashedData($id)
    {
        $result = $this->model->find($id);
            return $result->delete();
    }

    /**
     * Query for Restore Data.
     */
    public function restore($id)
    {
        $result = $this->model
                        ->withTrashed()
                        ->find($id);
            return $result->restore();
    }

    /**
     * Query for Delete Permanent Data.
     */
    public function deletePermanent($id)
    {
        $result = $this->model
                        ->withTrashed()
                        ->find($id);
            return $result->forceDelete();
    }
}
