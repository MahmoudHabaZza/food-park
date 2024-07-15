@extends('Admin.layouts.master')
@section('title')
    Update Social Link
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Social Link</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Social Link
            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-links.update',$social_link->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon</label>
                        <button name="icon" role="iconpicker" class="btn btn-secondary" style="display: block" data-icon="{{ $social_link->icon }}"></button>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $social_link->name }}">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" value="{{ $social_link->link }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option @selected($social_link->status == 1) value="1">Active</option>
                            <option @selected($social_link->status == 0) value="0">Inactive</option>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection
