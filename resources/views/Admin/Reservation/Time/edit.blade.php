@extends('Admin.layouts.master')
@section('title')
    Update Reservation Time
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
                Update Reservation Time
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reservation-times.update',$time->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="text" class="form-control timepicker" name="start_time" value="{{ $time->start_time }}" />
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="text" class="form-control timepicker" name="end_time" value="{{ $time->end_time }}" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($time->status == 0) value="0">Disabled</option>
                            <option @selected($time->status == 1) value="1">Enabled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
  <script src="{{ asset('assets/Admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
@endsection
