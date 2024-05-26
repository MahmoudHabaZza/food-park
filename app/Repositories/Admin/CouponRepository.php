<?php

namespace App\Repositories\Admin;

use App\DataTables\CouponDataTable;
use App\Http\Requests\Admin\CouponCreateRequest;
use App\Interfaces\Admin\CouponRepositoryInterface;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CouponRepository implements CouponRepositoryInterface {
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('Admin.Coupon.index');
    }
    public function create() : View
    {
        return view('Admin.Coupon.create');
    }
    public function store(CouponCreateRequest $request) : RedirectResponse
    {
        Coupon::create([
            'name' => $request->name,
            'code' => $request->code,
            'quantity' => $request->quantity,
            'min_purchase_amount' => $request->min_purchase_amount,
            'expire_date' => $request->expire_date,
            'discount_type' => $request->discount_type,
            'discount' => $request->discount,
            'status' => $request->status,
        ]);

        toastr()->success('Coupon Created Successfully!');
        return to_route('admin.coupon.index');
    }
}
