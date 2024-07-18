@extends('Admin.layouts.master')
@section('title')
    Clear DataBase
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h2>Clear DataBase</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-body">
                    <div class="alert alert-warning alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Danger</div>
                            Are you sure you want to delete all data from the database? This action is dangerous
                        </div>
                        <form action="">
                            <button type="submit" class="btn btn-danger btn-lg mt-3"><b>Clear Database</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
