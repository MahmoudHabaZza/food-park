@extends('Admin.layouts.master')
@section('title')
    Update About Information
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>About Us</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Your About Us Information
            </div>
            <div class="card-body">
                <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="form-group">
                            <label>Image</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" />
                                <input type="hidden" name="old_image" value="{{ @$about->image }}" id="image-upload" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Main Title</label>
                            <input type="text" name="main_title" class="form-control" value="{{ @$about->main_title }}">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ @$about->title }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="summernote">{{ @$about->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Video Link</label>
                            <input type="text" name="video_link" class="form-control" value="{{ @$about->video_link }}">
                        </div>

                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
            </div>






            </form>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
        $('.image-preview').css({
            'background-image': 'url({{ asset(@$about->image) }})',
            'background-position':'center center',
            'background-size':'cover',
        })
    })
    </script>
@endsection
