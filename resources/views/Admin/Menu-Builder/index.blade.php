@extends('Admin.layouts.master')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Menu Builder</h1>
        </div>
        <div class="section-body">
            {!! Menu::render() !!}
        </div>
    </div>
@endsection
@section('js')
    {!! Menu::scripts() !!}
@endsection
