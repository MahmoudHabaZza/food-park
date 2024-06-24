<div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
aria-labelledby="v-pills-profile-tab">
<div class="fp_dashboard_body">
    <h3>order list</h3>
    <div class="fp_dashboard_order">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr class="t_header">
                        <th>Order</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td>
                            <h5>#{{ $order->invoice_id }}</h5>
                        </td>
                        <td>
                            <p>{{ date('F d, Y',strtotime($order->created_at)) }}</p>
                        </td>
                        <td>
                            @if ($order->order_status === 'pending')
                            <span class="active">Pending</span>
                            @elseif ($order->order_status === 'delivered')
                            <span class="complete">delivered</span>
                            @elseif ($order->order_status === 'in_process')
                            <span class="active">In Process</span>
                            @elseif ($order->order_status === 'declined')
                            <span class="cancel">Declined</span>
                            @endif
                        </td>
                        <td>
                            <h5>{{ currencyPosition($order->final_total) }}</h5>
                        </td>
                        <td><a class="view_invoice" onclick="viewOrder('{{ $order->id }}')">View Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach ($orders as $order)
    <div class="fp__invoice printable_section order_details_{{ $order->id }}">
        <a class="go_back d-print-none"><i class="fas fa-long-arrow-alt-left"></i> go back</a>
        <div class="fp__track_order d-print-none">
            <ul>
                @if (strtolower($order->order_status) == 'declined')
                <li class="active declined_status">order declined</li>
                @else
                <li class="{{ in_array(strtolower($order->order_status),['pending','in_process','delivered']) ? 'active' : '' }}">order pending</li>
                <li class="{{ in_array(strtolower($order->order_status),['in_process','delivered']) ? 'active' : '' }}">order in process</li>
                <li class="{{ in_array(strtolower($order->order_status),['delivered']) ? 'active' : '' }}">order delivered</li>

                @endif

            </ul>
        </div>
        <div class="fp__invoice_header">
            <div class="header_address">
                <h4>invoice to</h4>
                <p>{{ $order->address }}</p>
                <p>{{ @$order->userAddress->phone }}</p>
                <p>{{ @$order->userAddress->email }}</p>
            </div>
            <div class="header_address">
                <p><b>invoice no: </b><span>{{ $order->invoice_id }}</span></p>
                <p><b>payment status: </b><span>{{ $order->payment_status }}</span></p>
                <p><b>payment method: </b><span>{{ $order->payment_method }}</span></p>
                <p><b>transaction id: </b><span>{{ $order->transaction_id }}</span></p>
                <p><b>date:</b> <span>{{ date('d-m-Y',strtotime($order->created_at)) }}</span></p>
            </div>
        </div>
        <div class="fp__invoice_body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr class="border_none">
                            <th class="sl_no">SL</th>
                            <th class="package">item description</th>
                            <th class="price">Price</th>
                            <th class="qnty">Quantity</th>
                            <th class="total">Total</th>
                        </tr>
                        @foreach ($order->items as $item)
                        @php

                        $size = json_decode($item->product_size);
                        $options = json_decode($item->product_option);
                        $optionsPrice = 0;
                        foreach ($options as $option) {
                          $optionsPrice += $option->price;
                        }

                        $sizePrice = @$size->price;
                        $productTotal = ($item->unit_price + $sizePrice + $optionsPrice ) * $item->qty;

                    @endphp
                        <tr>
                            <td class="sl_no">{{ $loop->iteration }}</td>
                            <td class="package">
                                <p>{{ $item->product_name }}</p>
                                <span class="size">
                                    @if ($size)
                                    <b>{{ @$size->name }} ( {{ currencyPosition($size->price) }} )</b>
                                    @endif
                                </span>
                                @if($options)
                                <b>Options:</b><br>
                                @foreach ($options as $item_option)
                                    <span>{{ $item_option->name }} ( {{ currencyPosition($item_option->price) }} )</span><br>
                                @endforeach
                            @endif
                            </td>
                            <td class="price">
                                <b>{{ currencyPosition($item->unit_price) }}</b>
                            </td>
                            <td class="qnty">
                                <b>{{ $item->qty }}</b>
                            </td>
                            <td class="total">
                                <b>{{ currencyPosition($productTotal) }}</b>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="package" colspan="3">
                                <b>sub total</b>
                            </td>
                            <td class="qnty">
                                <b>{{ $order->product_qty }}</b>
                            </td>
                            <td class="total">
                                <b>{{ currencyPosition($order->subtotal) }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="package coupon" colspan="3">
                                <b>(-) Discount coupon</b>
                            </td>
                            <td class="qnty">
                                <b></b>
                            </td>
                            <td class="total coupon">
                                <b>{{ currencyPosition($order->discount) }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="package coast" colspan="3">
                                <b>(+) Shipping Cost</b>
                            </td>
                            <td class="qnty">
                                <b></b>
                            </td>
                            <td class="total coast">
                                <b>{{ currencyPosition($order->delivery_charge) }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="package" colspan="3">
                                <b>Total Paid</b>
                            </td>
                            <td class="qnty">
                                <b></b>
                            </td>
                            <td class="total">
                                <b>{{ currencyPosition($order->final_total) }}</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <a class="print_btn common_btn d-print-none" href="javascript:;" onclick="printOrderInvoice('{{ $order->id }}')"><i class="far fa-print"></i>
            print
            PDF</a>

    </div>
    @endforeach
</div>
</div>

@push('js')
    <script>

        // Print Order Invoice Logic
        function printOrderInvoice(id) {
            let printableContent = $('.order_details_' + id).html();
            let printableWindow = window.open('', '', 'width=600,height=600');
            printableWindow.document.open();
            printableWindow.document.write('<html>');
            printableWindow.document.write('<link rel="stylesheet" href="{{ asset("assets/EndUser") }}/css/bootstrap.min.css">');
            printableWindow.document.write('<body>');
            printableWindow.document.write(printableContent);
            printableWindow.document.write('</body><html>');
            printableWindow.document.close();

            printableWindow.print();
            printableWindow.close();
        }

        // View Order Details Invoice
        function viewOrder(id) {
            $('.fp_dashboard_order').fadeOut();
            $('.order_details_' + id).fadeIn();
        }
    </script>
@endpush
