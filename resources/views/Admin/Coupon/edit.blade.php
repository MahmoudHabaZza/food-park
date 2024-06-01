@extends('Admin.layouts.master')
@section('title')
    Edit Coupon
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Coupon</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Edit Coupon
            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupon.update',$coupon->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $coupon->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" class="form-control" name="code" value="{{ $coupon->code }}" />
                    </div>
                    <div class="form-group">
                        <label>Coupon Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{ $coupon->quantity }}" />
                    </div>
                    <div class="form-group">
                        <label>Minimum Purchase Amount</label>
                        <input type="text" class="form-control" name="min_purchase_amount" value="{{ $coupon->min_purchase_amount }}" />
                    </div>
                    <div class="form-group">
                        <label>Expire Date</label>
                        <input type="date" class="form-control" name="expire_date" value="{{ $coupon->expire_date }}" />
                    </div>
                    <div class="form-group">
                        <label>Discount Type</label>
                        <select class="form-control" name="discount_type">
                            <option @selected($coupon->discount_type == "percent") value="percent">Percent</option>
                            <option @selected($coupon->discount_type == "amount") value="amount">Amount</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" class="form-control" name="discount" value="{{ $coupon->discount }}" />
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($coupon->status === 0) value="0">Disabled</option>
                            <option @selected($coupon->status === 1) value="1">Enabled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection
