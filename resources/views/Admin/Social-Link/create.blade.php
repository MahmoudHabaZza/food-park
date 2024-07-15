@extends('Admin.layouts.master')
@section('title')
    Create New Social Link
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Social Link</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New Social Link
            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-links.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Icon</label>
                        <button name="icon" role="iconpicker" class="btn btn-secondary" style="display: block"></button>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" value="{{ old('link') }}">
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
