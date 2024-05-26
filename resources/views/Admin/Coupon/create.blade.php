@extends('Admin.layouts.master')
@section('title')
    Create New Coupon
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Coupon</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New Coupon
            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupon.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" class="form-control" name="code" value="{{ old('code') }}" />
                    </div>
                    <div class="form-group">
                        <label>Coupon Quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{ old('quantity') }}" />
                    </div>
                    <div class="form-group">
                        <label>Minimum Purchase Amount</label>
                        <input type="text" class="form-control" name="min_purchase_amount" value="{{ old('min_purchase_amount') }}" />
                    </div>
                    <div class="form-group">
                        <label>Expire Date</label>
                        <input type="date" class="form-control" name="expire_date" value="{{ old('expire_date') }}" />
                    </div>
                    <div class="form-group">
                        <label>Discount Type</label>
                        <select class="form-control" name="discount_type">
                            <option value="percent">Percent</option>
                            <option value="amount">Amount</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <input type="text" class="form-control" name="discount" value="{{ old('discount') }}" />
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option value="0">Disabled</option>
                            <option value="1">Enabled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>



                </form>
            </div>
        </div>
    </div>
@endsection
