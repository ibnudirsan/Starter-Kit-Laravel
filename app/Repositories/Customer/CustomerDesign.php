<?php

namespace App\Repositories\Customer;

interface CustomerDesign {
    public function datatable();
    public function delete($id);
    public function trashed();
}
