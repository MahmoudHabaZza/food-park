@extends('Admin.layouts.master')
@section('title')
    Edit Banner Slider
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Banner Slider</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Edit Banner Slider
            </div>
            <div class="card-body">
                <form action="{{ route('admin.banner-slider.update',$bannerSlider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="image-preview">Banner Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="banner" id="image-upload" />
                            <input type="hidden" name="old_banner" value="{{ $bannerSlider->banner }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $bannerSlider->title }}">
                    </div>
                    <div class="form-group">
                        <label>Subtitle</label>
                        <input type="text" class="form-control" name="sub_title" value="{{ $bannerSlider->sub_title }}">
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input type="text" class="form-control" name="url" value="{{ $bannerSlider->url }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($bannerSlider->status == 1) value="1">Active</option>
                            <option @selected($bannerSlider->status == 0) value="0">Inactive</option>
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
            'background-image': 'url({{ asset($bannerSlider->banner) }})',
            'background-position':'center center',
            'background-size':'cover',
        })
    })
</script>
@endsection
