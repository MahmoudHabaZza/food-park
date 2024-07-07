@extends('Admin.layouts.master')
@section('title')
    Daily Offers
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Daily Offers</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Daily Offer</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.daily-offer.create') }}" class="btn btn-primary">
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
