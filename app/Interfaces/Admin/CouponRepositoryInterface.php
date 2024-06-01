<?php

namespace App\Interfaces\Admin;

use App\DataTables\CouponDataTable;
use App\Http\Requests\Admin\CouponCreateRequest;
use App\Http\Requests\Admin\CouponUpdateRequest;

interface CouponRepositoryInterface {
    public function index(CouponDataTable $dataTable);
    public function create();
    public function store(CouponCreateRequest $request);
    public function edit(string $id);
    public function update(CouponUpdateRequest $request, string $id);
    public function destroy(string $id);
}
