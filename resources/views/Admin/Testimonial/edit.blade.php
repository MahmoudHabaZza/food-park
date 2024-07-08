@extends('Admin.layouts.master')
@section('title')
     Update Testimonial
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Testimonial</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Testimonial
            </div>
            <div class="card-body">
                <form action="{{ route('admin.testimonial.update',$testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="image-preview">Testimonial Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ $testimonial->image }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}">
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <select name="rating" class="form-control">
                            <option @selected($testimonial->rating == 1) value="1">1</option>
                            <option @selected($testimonial->rating == 2) value="2">2</option>
                            <option @selected($testimonial->rating == 3) value="3">3</option>
                            <option @selected($testimonial->rating == 4) value="4">4</option>
                            <option @selected($testimonial->rating == 5) value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Review</label>
                        <textarea class="form-control" name="review" rows="3">{{ $testimonial->review }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($testimonial->status == 1) value="1">Active</option>
                            <option @selected($testimonial->status == 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Show At Home</label>
                        <select class="form-control" name="show_at_home">
                            <option @selected($testimonial->show_at_home == 1) value="1">Yes</option>
                            <option @selected($testimonial->show_at_home == 0) value="0">No</option>
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
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($testimonial->image) }})',
                'background-position': 'center center',
                'background-size': 'cover',
            })
        })
    </script>
@endsection
