@extends('Admin.layouts.master')
@section('title')
    Update Blog
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Blog</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Blog
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ $blog->image }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control summernote">{{ $blog->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Blog Category</label>
                        <select class="form-control select2" name="blog_category_id">
                            <option disabled selected value="">Choose Category</option>
                            @foreach ($blog_categories as $category)
                                <option  @selected($blog->blog_category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SEO Title <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="seo_title" value="{{ @$blog->seo_title }}">
                    </div>
                    <div class="form-group">
                        <label>SEO Description <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="seo_description" value="{{ @$blog->seo_description }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option @selected($blog->status == 1) value="1">Active</option>
                            <option @selected($blog->status == 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('.image-preview').css({
            'background-image': 'url({{ asset($blog->image) }})',
            'background-position':'center center',
            'background-size':'cover',
        })
    })
</script>
@endsection
