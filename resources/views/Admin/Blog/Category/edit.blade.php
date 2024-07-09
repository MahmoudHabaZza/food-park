@extends('Admin.layouts.master')
@section('title')
    Edit Blog Category
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Blog Category</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Edit Blog Category
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blog-categories.update',$blog_category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $blog_category->name }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option @selected($blog_category->status == 1) value="1">Active</option>
                            <option @selected($blog_category->status == 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection

