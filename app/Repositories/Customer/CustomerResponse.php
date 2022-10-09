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
        return $this->model->select('id','uuid','email','firstName','lastName','address','numberPhone');
    }

    /**
     * Query for Delete Method.
     */
    public function delete($id)
    {
        $result = $this->model->find($id);
            return $result->delete();
    }

    /**
     * Query for Datatable Transhed.
     */
    public function trashed()
    {
        return $this->model->select('id','email','firstName','lastName','address','numberPhone','deleted_at')
            ->onlyTrashed();
    }
}
