@extends('Admin.layouts.master')
@section('title')
    Banner Slider
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Banner Slider</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Banner Slider</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.banner-slider.create') }}" class="btn btn-primary">
                        Create New
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection
