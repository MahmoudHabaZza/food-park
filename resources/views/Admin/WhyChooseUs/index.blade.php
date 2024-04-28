@extends('Admin.layouts.master')
@section('title')
    Why Choose Us
@endsection
@section('content')


    <div class="section">
        <div class="section-header">
            <h1>Why Choose Us</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Why Choose Us</h4>
            </div>
            <div class="card-body">
                      <div class="accordion" id="accordion">
                        <div class="accordion-header collapsed bg-primary text-light p-3" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                          <h4>Why Choose Us Section Title</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Top Title</label>
                                    <input type="text" class="form-control" name="why_choose_top_title" value="{{ $titles['why_choose_top_title'] }}" />
                                </div>
                                <div class="form-group">
                                    <label>Main Title</label>
                                    <input type="text" class="form-control" name="why_choose_main_title" value="{{ $titles['why_choose_main_title'] }}" />
                                </div>
                                <div class="form-group">
                                    <label>Subtitle</label>
                                    <input type="text" class="form-control" name="why_choose_sub_title" value="{{ $titles['why_choose_sub_title'] }}" />
                                </div>
                                <button class="btn btn-primary" type="submit" >Save</button>

                            </form>
                        </div>
                      </div>

            </div>
        </div>
    </div>
    <div class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Why Choose Us</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.Slider.create') }}" class="btn btn-primary">
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
