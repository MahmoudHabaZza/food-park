@extends('Admin.layouts.master')
@section('title')
    Comments
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Comments</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Comments</h4>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function() {
            $(document).on('submit','.update_status_form',function(e){
                e.preventDefault();
                let commentId = $(this).data('id');
                let formData = $(this).serialize();
                $.ajax({
                    method:'POST',
                    url:'{{ route("admin.blog-comments.updateStatus",":commentId") }}'.replace(':commentId',commentId),
                    data:formData,
                    success:function(response){
                        toastr.success(response.message);
                        $('table').DataTable().draw();
                    },
                    error:function(xhr,status,error){
                        toastr.error(xhr.resonseJSON.error);
                    }
                })

            })
        })
    </script>
@endsection
