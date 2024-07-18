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
                        <form action="" class="clear_db">
                            <button type="submit" class="btn btn-danger btn-lg mt-3 submit_btn"><b>Clear Database</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.clear_db').on('submit', function(e) {
                e.preventDefault();
                swal.fire({
                    title: "Are you sureTo Clear All Database ?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Clear it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "POST",
                            url: '{{ route("admin.clear-database.destroy") }}',
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            beforeSend:function(){
                                $('.submit_btn').prop('disabled', true);
                                $('.submit_btn').html(`<span class="spinner-border" role="status">Clearing...</span>`);
                            },
                            success: function(response) {
                                $('.submit_btn').prop('disabled', false);
                                $('.submit_btn').html(`Clear Database`);
                                toastr.success(response.message);
                            },
                            error:function(xhr,status,error)
                            {
                                let errorMessage = xhr.responseJSON.message;
                                toastr.error(errorMessage);
                                $('.submit_btn').prop('disabled', false);
                                $('.submit_btn').html(`Clear Database`);
                            }


                        });

                    }
                });
            })
        })
    </script>
@endsection
