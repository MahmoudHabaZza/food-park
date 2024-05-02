@extends('Admin.layouts.master')
@section('title')
    Product Gallery
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Product Gallery</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Images</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="">Create Gallery</label>
                    <input type="file" name="image" class="form-control">
                    <input type="hidden" name="product_id" value="{{ $id }}">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
        </div>
    </div>
@endsection
