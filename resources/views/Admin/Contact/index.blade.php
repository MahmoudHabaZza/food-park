@extends('Admin.layouts.master')
@section('title')
    Update Contact Information
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Contact Info</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Your Contact Information
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Phone One</label>
                        <input type="text" name="phone_one" class="form-control" value="{{ @$contact->phone_one }}">
                    </div>
                    <div class="form-group">
                        <label>Phone Two</label>
                        <input type="text" name="phone_two" class="form-control" value="{{ @$contact->phone_two }}">
                    </div>
                    <div class="form-group">
                        <label>Mail One</label>
                        <input type="text" name="mail_one" class="form-control" value="{{ @$contact->mail_one }}">
                    </div>
                    <div class="form-group">
                        <label>Mail Two</label>
                        <input type="text" name="mail_two" class="form-control" value="{{ @$contact->mail_two }}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ @$contact->address }}">
                    </div>
                    <div class="form-group">
                        <label>Map Link</label>
                        <input type="text" name="map_link" class="form-control" value="{{ @$contact->map_link }}">
                    </div>


                    <button class="btn btn-primary" type="submit">Update</button>
            </div>






            </form>
        </div>
    </div>
    </div>
@endsection

