@extends('Admin.layouts.master')
@section('title')
    Product Size
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Product Sizes ( {{ $product->name }} )</h1>
        </div>
        <div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-3">Go Back</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Add New Size</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.size.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"/>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control"/>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Add New Option</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.option.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"/>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control"/>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>All Sizes</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $size->name }}</th>
                                    <th>{{ currencyPosition($size->price) }}</th>
                                    <th><a href="{{ route('admin.product.size.destroy',$size->id) }}" class="btn btn-danger fas fa-trash delete-item"></a></th>
                                </tr>
                            @endforeach
                            @if (count($sizes) === 0)
                            <tr>
                                <td colspan="4" class="text-center">There is No Data Found</td>
                            </tr>
                            @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>All Variants</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($options as $option)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $option->name }}</th>
                                    <th>{{ currencyPosition($option->price) }}</th>
                                    <th><a href="{{ route('admin.product.option.destroy',$option->id) }}" class="btn btn-danger fas fa-trash delete-item"></a></th>
                                </tr>
                            @endforeach
                            @if (count($options) === 0)
                            <tr>
                                <td colspan="4" class="text-center">There is No Data Found</td>
                            </tr>
                            @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endsection
