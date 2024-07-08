@extends('Admin.layouts.master')
@section('title')
    Create New Chef
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Chef</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New Chef
            </div>
            <div class="card-body">
                <form action="{{ route('admin.chef.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image-preview">Chef Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Facebook <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="fb" value="{{ old('fb') }}">
                    </div>
                    <div class="form-group">
                        <label>LinkedIn <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="in" value="{{ old('in') }}">
                    </div>
                    <div class="form-group">
                        <label>X <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="x" value="{{ old('x') }}">
                    </div>
                    <div class="form-group">
                        <label>Show At Home</label>
                        <select class="form-control" name="show_at_home">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>



                </form>
            </div>
        </div>
    </div>
@endsection

