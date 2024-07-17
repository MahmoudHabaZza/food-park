@extends('Admin.layouts.master')
@section('title')
     Update Admin
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Update Management</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Admin
            </div>
            <div class="card-body">
                <form action="{{ route('admin.admin-management.update',$admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $admin->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ $admin->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection
