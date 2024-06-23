@extends('Admin.layouts.master')
@section('title')
In Process Orders
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>In Process Orders</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="order_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Order & Payment Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="order_status_form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="payment_status">Payment Status</label>
                            <select class="form-control payment_status" name="payment_status" id="payment_status">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="order_status">Order Status</label>
                            <select class="form-control order_status" name="order_status" id="order_status">
                                <option value="pending">Pending</option>
                                <option value="in_process">In Process</option>
                                <option value="delivered">Delivered</option>
                                <option value="declined">Declined</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close-button" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submit-btn">Save changes</button>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            var orderId = '';
            $(document).on('click', '.order_status_btn', function() {
                let id = $(this).data("id");
                let paymentStatus = $('.payment_status');
                let orderStatus = $('.order_status');
                orderId = id;
                $.ajax({
                    method: 'GET',
                    url: '{{ route("admin.order.status.get", ":id") }}'.replace(":id", id),
                    beforeSend:function(){
                        $('.submit-btn').prop('disabled',true);
                    },
                    success: function(response) {
                        paymentStatus.val('');
                        orderStatus.val('');

                        paymentStatus.find('option').each(function() {
                            if ($(this).val() == response.payment_status) {
                                paymentStatus.val(response.payment_status);
                            }
                        });

                        orderStatus.find('option').each(function() {
                            if ($(this).val() == response.order_status) {
                                orderStatus.val(response.order_status);
                            }
                        });

                        $('.submit-btn').prop('disabled',false)
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.order_status_form').on('submit',function(e){
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method:"POST",
                    url: '{{ route("admin.order.status.update", ":id") }}'.replace(":id", orderId),
                    data:formData,
                    beforeSend:function(){
                        $('.submit-btn').prop('disabled',true);
                    },
                    success:function(response){
                        toastr.success(response.message);
                        $('#order_status').modal('hide');
                        // $('.close-button').click();
                        $('table').DataTable().draw();


                    },
                    error:function(xhr,status,error){
                        toastr.error(xhr.responseJSON.message)
                    }

                })
            })
        })
    </script>
@endsection
