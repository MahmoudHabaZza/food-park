@extends('Admin.layouts.master')
@section('title')
    Social Links
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Social Links</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Social Links</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary">
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
