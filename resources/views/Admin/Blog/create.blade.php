@extends('Admin.layouts.master')
@section('title')
    Create New Blog
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Blog</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New Blog
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control summernote">{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Blog Category</label>
                        <select class="form-control select2" name="blog_category_id">
                            <option disabled selected value="">Choose Category</option>
                            @foreach ($blog_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SEO Title <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                    </div>
                    <div class="form-group">
                        <label>SEO Description <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="seo_description" value="{{ old('seo_description') }}">
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
