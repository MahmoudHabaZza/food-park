@extends('Admin.layouts.master')
@section('title')
    Create New Reservation Time
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/Admin/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Reservation Time</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Create New Reservation Time
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reservation-times.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="text" class="form-control timepicker" name="start_time" value="{{ old('start_time') }}" />
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="text" class="form-control timepicker" name="end_time" value="{{ old('end_time') }}" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option value="0">Disabled</option>
                            <option value="1">Enabled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>



                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
  <script src="{{ asset('assets/Admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
@endsection
