@extends('Admin.layouts.master')
@section('title')
    Comments
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Comments</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Comments</h4>
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
