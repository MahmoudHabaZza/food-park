@extends('Admin.layouts.master')
@section('title')
    Update Category Category
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Category
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($category->status === 0) value="0">Disabled</option>
                            <option @selected($category->status === 1) value="1">Enabled</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Show At Home</label>
                        <select class="form-control" name="show_at_home">
                            <option disabled selected>Choose</option>
                            <option value="1" @selected($category->show_at_home === 1)>Yes</option>
                            <option value="0" @selected($category->show_at_home === 0)>No</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>



                </form>
            </div>
        </div>
    </div>
@endsection
