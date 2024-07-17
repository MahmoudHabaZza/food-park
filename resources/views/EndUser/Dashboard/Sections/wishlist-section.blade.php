<div class="tab-pane fade " id="v-pills-messages2" role="tabpanel" aria-labelledby="v-pills-messages-tab2">
    <div class="fp_dashboard_body">
        <h3>WishList</h3>
        <div class="fp_dashboard_order">
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
                                    <td><i class="far fa-times" style="cursor: pointer" aria-hidden="true"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
