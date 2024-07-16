@extends('Admin.layouts.master')
@section('title')
    Create New Page
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Page Builder</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New Page
            </div>
            <div class="card-body">
                <form action="{{ route('admin.page-builder.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="summernote" class="summernote"  name="content">{!! old('content') !!}</textarea>
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

