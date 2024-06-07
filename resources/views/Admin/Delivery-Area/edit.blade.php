@extends('Admin.layouts.master')
@section('title')
    Create New Delivery Area
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Delivery Area</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New Delivery Area
            </div>
            <div class="card-body">
                <form action="{{ route('admin.delivery-area.update',$deliveryArea->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Area Name</label>
                        <input type="text" name="area_name" value="{{ $deliveryArea->area_name }}" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Minimum Delivery Time</label>
                                <input type="text" name="min_delivery_time" value="{{ $deliveryArea->min_delivery_time }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Maxmum Delivery Time</label>
                                <input type="text" name="max_delivery_time" value="{{ $deliveryArea->max_delivery_time }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Delivery Fee</label>
                                <input type="text" name="delivery_fee" value="{{ $deliveryArea->delivery_fee }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option @selected($deliveryArea->status === 0) value="0">Disabled</option>
                                    <option @selected($deliveryArea->status === 1) value="1">Enabled</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection
