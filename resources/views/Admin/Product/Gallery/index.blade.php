@extends('Admin.layouts.master')
@section('title')
    Product Gallery
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Product Gallery ( {{ $product->name }} )</h1>
        </div>
        <div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">Go Back</a>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Upload Image</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Create Gallery</label>
                        <input type="file" name="image" class="form-control">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Upload</button>
            </div>
            </form>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Images</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th><img src="{{ asset($image->image) }}" style="width:100px;"></th>
                            <th><a href="{{ route('admin.product.gallery.destroy',$image->id) }}" class="btn btn-danger fas fa-trash delete-item"></a></th>
                        </tr>
                    @endforeach
                    @if (count($images) === 0)
                    <tr>
                        <td colspan="3" class="text-center">There is No Data Found</td>
                    </tr>
                    @endif
                </tbody>
                </table>
            </div>
        </div>
    @endsection
