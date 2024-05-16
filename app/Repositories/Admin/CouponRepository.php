<?php

namespace App\Repositories\Admin;

use App\DataTables\CouponDataTable;
use App\Interfaces\Admin\CouponRepositoryInterface;

class CouponRepository implements CouponRepositoryInterface {
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('Admin.Coupon.index');
    }
}
