@extends('Admin.layouts.master')
@section('title')
    Edit Slider
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Edit Slider
            </div>
            <div class="card-body">
                <form action="{{ route('admin.Slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Offer</label>
                        <input type="text" class="form-control" value="{{ $slider->offer }}" name="offer" />
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" value="{{ $slider->title }}" name="title" />
                    </div>
                    <div class="form-group">
                        <label>SubTitle</label>
                        <input type="text" class="form-control" value="{{ $slider->sub_title }}" name="sub_title" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $slider->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="btn_link" value="{{ $slider->btn_link }}" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($slider->status === 0) value="0">Disabled</option>
                            <option @selected($slider->status === 1) value="1">Enabled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>



                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($slider->image) }})',
                'background-size': 'cover',
                'background-position': 'center center',
            });
        });
    </script>
@endsection
