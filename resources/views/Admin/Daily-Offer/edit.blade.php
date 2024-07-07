@extends('Admin.layouts.master')
@section('title')
    Edit Daily Offer
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Edit Daily Offer</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                Edit Daily Offer
            </div>
            <div class="card-body">
                <form action="{{ route('admin.daily-offer.update',$dailyOffer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Product</label>
                        <select class="form-control" id="select2" name="product">
                            <option value="{{ $dailyOffer->product->id }}" selected>{{ $dailyOffer->product->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option disabled selected value="">Choose Status</option>
                            <option @selected($dailyOffer->status == 1) value="1">Active</option>
                            <option @selected($dailyOffer->status == 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>



                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#select2').select2({
                ajax: {
                    url: '{{ route("admin.daily-offer.search") }}',
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: function(data) {
                    return {
                        results: $.map(data, function(product) {
                            return {
                                text: product.name,
                                id: product.id,
                                image_url: "{{ asset(':productImage')  }}".replace(':productImage',product.thumb_image),
                            }
                        })
                    }
                }
                },
                minimumInputLength:3,
                templateResult:function(product){
                    var product = $(`<span><img src='${product.image_url}' class='img_thumbnail' width='50'>${product.text}</span>`);
                    return product;
                },
                escapeMarkup: function(m){return m;}

            });
        })
    </script>
@endsection
