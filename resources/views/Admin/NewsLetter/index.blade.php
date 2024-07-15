@extends('Admin.layouts.master')
@section('title')
    News Letter
@endsection
@section('content')


    <div class="section">
        <div class="section-header">
            <h1>News Letter</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>News Letter</h4>
            </div>
            <div class="card-body">
                      <div class="accordion" id="accordion">
                        <div class="accordion-header collapsed bg-primary text-light p-3" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                          <h4>Send A News Letter</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                            <form action="{{ route('admin.news-letter.send') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" />
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="summernote">{{ old('message') }}</textarea>
                                </div>
                                <button class="btn btn-primary" type="submit" >Send</button>

                            </form>
                        </div>
                      </div>

            </div>
        </div>
    </div>
    <div class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h4>News Letter</h4>
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
