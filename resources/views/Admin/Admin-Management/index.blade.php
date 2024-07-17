@extends('Admin.layouts.master')
@section('title')
    Admin Management
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Admin Management</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Admin Management</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.admin-management.create') }}" class="btn btn-primary">
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
