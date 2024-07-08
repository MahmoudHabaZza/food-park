@extends('Admin.layouts.master')
@section('title')
    Edit Chef
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Chef</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Edit Chef
            </div>
            <div class="card-body">
                <form action="{{ route('admin.chef.update',$chef->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="image-preview">Chef Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                            <input type="hidden" name="old_image" value="{{ $chef->image }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $chef->name }}">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $chef->title }}">
                    </div>
                    <div class="form-group">
                        <label>Facebook <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="fb" value="{{ @$chef->fb }}">
                    </div>
                    <div class="form-group">
                        <label>LinkedIn <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="in" value="{{ @$chef->in }}">
                    </div>
                    <div class="form-group">
                        <label>X <code>(Optional)</code></label>
                        <input type="text" class="form-control" name="x" value="{{ $chef->x }}">
                    </div>
                    <div class="form-group">
                        <label>Show At Home</label>
                        <select class="form-control" name="show_at_home">
                            <option @selected($chef->show_at_home == 1)  value="1">Yes</option>
                            <option @selected($chef->show_at_home == 0)  value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($chef->status == 1) value="1">Active</option>
                            <option @selected($chef->status == 0) value="0">Inactive</option>
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
            'background-image': 'url({{ asset($chef->image) }})',
            'background-position':'center center',
            'background-size':'cover',
        })
    })
</script>
@endsection
