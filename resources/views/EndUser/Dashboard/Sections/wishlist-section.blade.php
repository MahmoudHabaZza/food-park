<div class="wishlist_container">
<div class="tab-pane fade"
id="v-pills-messages2" role="tabpanel" aria-labelledby="v-pills-messages-tab2">
    <div class="fp_dashboard_body">
        <h3>WishList</h3>
        <div class="fp_dashboard_order wishlist_section">
            @if (count($wishlist) == 0)
                <h5 class="alert alert-secondary">WishList is Empty</h5>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr class="t_header">
                                <th>No</th>
                                <th>Name</th>
                                <th>stock</th>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($wishlist as $item)
                                <tr>
                                    <td>
                                        <h5>#{{ $loop->iteration }}</h5>
                                    </td>
                                    <td>
                                        {{ $item->product->name }}
                                    </td>
                                    <td>
                                        @if ($item->product->quantity > 0)
                                            <h5 class="text-success">In Stock</h5>
                                        @else
                                            <h5 class="text-danger">Out of Stock</h5>
                                        @endif
                                    </td>
                                    <td><a class="view_invoice"
                                            href="{{ route('product.show', $item->product->slug) }}">View Product</a>
                                    </td>
                                    <td>
                                        <a href="javascript:;" class="remove_from_wishlist" data-id="{{ $item->id }}">
                                        <i class="far fa-times" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function() {
        // Handle wishlist item removal
        $(document).on('click', '.remove_from_wishlist', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                method: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: "{{ route('wishlist.destroy', ':id') }}".replace(':id', id),
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    hideLoader();
                    toastr.success(response.message);
                    loadWishlistSection(); // Reload wishlist section after item removal

                },
                error: function(xhr, status, error) {
                    hideLoader();
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(index, value) {
                        toastr.error(value);
                    });
                },
                complete: function() {
                    hideLoader();
                }
            });
        });

        function loadWishlistSection() {
            $.ajax({
                url: "{{ route('dashboard') }}",
                method: 'GET',
                data: {
                    section: 'wishlist'
                },
                success: function(response) {
                    // Assuming `#v-pills-messages2` is the container where you want to place the wishlist section
                    $('.wishlist_container').html();
                    $('.wishlist_container').html(response.html);
                    $('#v-pills-messages2').addClass('active');
                    $('#v-pills-messages2').addClass('show');

                },
                error: function(xhr, status, error) {
                    toastr.error('Failed to load wishlist items.');
                }
            });
        }
    });
</script>
@endpush

