@extends('Admin.layouts.master')
@section('title')
    Create New
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Why Choose Us</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New
            </div>
            <div class="card-body">
                <form action="{{ route('admin.Slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Icon</label>
                        <button role="iconpicker" class="btn btn-secondary" style="display: block"></button>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option value="0">Disabled</option>
                            <option value="1">Enabled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>



                </form>
            </div>
        </div>
    </div>
@endsection
