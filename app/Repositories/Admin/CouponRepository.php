<?php

namespace App\Repositories\Admin;

use App\DataTables\CouponDataTable;
use App\Http\Requests\Admin\CouponCreateRequest;
use App\Http\Requests\Admin\CouponUpdateRequest;
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
    public function edit(string $id) : View
    {
        $coupon = Coupon::findOrFail($id);
        return view('Admin.Coupon.edit',compact('coupon'));
    }
    public function update(CouponUpdateRequest $request , string $id) : RedirectResponse
    {
        $coupon = Coupon::findOrFail($id);

        $coupon->update([
            'name' => $request->name,
            'code' => $request->code,
            'quantity' => $request->quantity,
            'min_purchase_amount' => $request->min_purchase_amount,
            'expire_date' => $request->expire_date,
            'discount_type' => $request->discount_type,
            'discount' => $request->discount,
            'status' => $request->status,
        ]);

        toastr()->success('Coupon Updated Successfully!');
        return to_route('admin.coupon.index');
    }
    public function destroy(string $id)
    {
        try{
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();
            return response(['status' => 'success' , 'message' => 'Coupon Deleted Successfully']);
        }catch(\Exception) {
            return response(['status' => 'error' , 'message' => 'Something Went Wrong!']);

        }
    }
}
