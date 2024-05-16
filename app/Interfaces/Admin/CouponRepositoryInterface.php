<?php

namespace App\Interfaces\Admin;

use App\DataTables\CouponDataTable;

interface CouponRepositoryInterface {
    public function index(CouponDataTable $dataTable);
}
