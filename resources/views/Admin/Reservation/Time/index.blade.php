@extends('Admin.layouts.master')
@section('title')
    Reservaiton Times
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Reservaiton Times</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Reservaiton Times</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.reservation-times.create') }}" class="btn btn-primary">
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
