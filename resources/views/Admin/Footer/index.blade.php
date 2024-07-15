@extends('Admin.layouts.master')
@section('title')
    Update Footer Information
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Footer Information</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Your Footer Information
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-info.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label>short description</label>
                            <textarea name="short_description" class="form-control">{{ @$footer_info->short_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ @$footer_info->address }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ @$footer_info->email }}">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ @$footer_info->phone }}">
                        </div>
                        <div class="form-group">
                            <label>CopyRight</label>
                            <input type="text" name="copyright" class="form-control" value="{{ @$footer_info->copyright }}">
                        </div>


                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
            </div>






            </form>
        </div>
    </div>
    </div>
@endsection
