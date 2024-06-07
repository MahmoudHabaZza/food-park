@extends('Admin.layouts.master')
@section('title')
    Delivery Areas
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Delivery Areas</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Delivery Areas</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.delivery-area.create') }}" class="btn btn-primary">
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
