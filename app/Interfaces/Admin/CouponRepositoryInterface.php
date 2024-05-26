<?php

namespace App\Interfaces\Admin;

use App\DataTables\CouponDataTable;
use App\Http\Requests\Admin\CouponCreateRequest;

interface CouponRepositoryInterface {
    public function index(CouponDataTable $dataTable);
    public function create();
    public function store(CouponCreateRequest $request);
}
