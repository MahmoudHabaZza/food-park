@extends('Admin.layouts.master')
@section('title')
    Update Counters
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Counter</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Update Your Counter
            </div>
            <div class="card-body">
                <form action="{{ route('admin.counter.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="form-group">
                            <label>Background</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="background" id="image-upload" />
                                <input type="hidden" name="old_background" value="{{ @$counter->background }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <hr>
                            <h5>Counter One</h5>
                            <hr>
                            <div class="form-group">
                                <label for="counter_icon_one">Counter Icon One</label>
                                <button name="counter_icon_one" role="iconpicker" class="btn btn-secondary"
                                    style="display: block" data-icon="{{ @$counter->counter_icon_one }}"></button>
                            </div>
                            <div class="form-group">
                                <label for="counter_count_one">Count One</label>
                                <input type="text" name="counter_count_one" id="counter_count_one" value="{{ @$counter->counter_count_one }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="counter_name_one">Counter Name One</label>
                                <input type="text" name="counter_name_one" value="{{ @$counter->counter_name_one }}" id="counter_name_one" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <hr>
                            <h5>Counter Two</h5>
                            <hr>
                            <div class="form-group">
                                <label for="counter_icon_two">Counter Icon Two</label>
                                <button name="counter_icon_two" role="iconpicker" class="btn btn-secondary"
                                    style="display: block" data-icon="{{ @$counter->counter_icon_two }}"></button>
                            </div>
                            <div class="form-group">
                                <label for="counter_count_two">Count Two</label>
                                <input type="text" name="counter_count_two" value="{{ @$counter->counter_count_two }}" id="counter_count_two" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="counter_name_two">Counter Name Two</label>
                                <input type="text" name="counter_name_two" value="{{ @$counter->counter_name_two }}" id="counter_name_two" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <hr>
                            <h5>Counter Three</h5>
                            <hr>
                            <div class="form-group">
                                <label for="counter_icon_three">Counter Icon Three</label>
                                <button name="counter_icon_three" role="iconpicker" class="btn btn-secondary"
                                    style="display: block" data-icon="{{ @$counter->counter_icon_three }}"></button>
                            </div>
                            <div class="form-group">
                                <label for="counter_count_three">Count Three</label>
                                <input type="text" name="counter_count_three" value="{{ @$counter->counter_count_three }}" id="counter_count_three" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="counter_name_three">Counter Name Three</label>
                                <input type="text" name="counter_name_three" value="{{ @$counter->counter_name_three }}" id="counter_name_three" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <hr>
                            <h5>Counter Four</h5>
                            <hr>
                            <div class="form-group">
                                <label for="counter_icon_four">Counter Icon Four</label>
                                <button name="counter_icon_four" role="iconpicker" class="btn btn-secondary"
                                    style="display: block" data-icon="{{ @$counter->counter_icon_four }}"></button>
                            </div>
                            <div class="form-group">
                                <label for="counter_count_four">Count Four</label>
                                <input type="text" name="counter_count_four" value="{{ @$counter->counter_count_four }}" id="counter_count_four" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="counter_name_four">Counter Name Four</label>
                                <input type="text" name="counter_name_four" value="{{ @$counter->counter_name_four }}" id="counter_name_four" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>



            <button class="btn btn-primary" type="submit">Create</button>



            </form>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
        $('.image-preview').css({
            'background-image': 'url({{ asset(@$counter->background) }})',
            'background-position':'center center',
            'background-size':'cover',
        })
    })
    </script>
@endsection
