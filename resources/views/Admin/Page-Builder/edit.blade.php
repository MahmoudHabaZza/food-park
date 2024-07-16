@extends('Admin.layouts.master')
@section('title')
    Update Page
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Page Builder</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Page
            </div>
            <div class="card-body">
                <form action="{{ route('admin.page-builder.update',$page->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $page->name }}"/>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="summernote"  name="content">{!! $page->content !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($page->status == 0) value="0">Disabled</option>
                            <option @selected($page->status == 1) value="1">Enabled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection
