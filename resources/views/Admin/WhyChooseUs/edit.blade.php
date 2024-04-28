@extends('Admin.layouts.master')
@section('title')
    Update Why Choose Us Section
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Update Why Choose Us Section</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Why Choose Us Section
            </div>
            <div class="card-body">
                <form action="{{ route('admin.why-choose-us.update',$section->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon</label>
                        <button name="icon"  data-icon="{{ $section->icon }}" role="iconpicker" class="btn btn-primary" style="display: block"></button>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" value="{{ $section->title }}" class="form-control" name="title" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" value="{{ $section->description }}" class="form-control" name="description" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($section->status === 0) value="0">Disabled</option>
                            <option @selected($section->status === 1) value="1">Enabled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>



                </form>
            </div>
        </div>
    </div>
@endsection
