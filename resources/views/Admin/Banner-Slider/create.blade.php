@extends('Admin.layouts.master')
@section('title')
    Create New Banner Slider
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Banner Slider</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New Banner Slider
            </div>
            <div class="card-body">
                <form action="{{ route('admin.banner-slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image-preview">Banner Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="banner" id="image-upload" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Subtitle</label>
                        <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title') }}">
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input type="text" class="form-control" name="url" value="{{ old('url') }}">
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

