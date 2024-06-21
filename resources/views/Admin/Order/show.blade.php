@extends('admin.layouts.master')
@section('title')
@endsection()
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Invoice</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Invoice</div>
      </div>
    </div>

    <div class="section-body">
      <div class="invoice">
        <div class="invoice-print">
          <div class="row">
            <div class="col-lg-12">
              <div class="invoice-title">
                <h2>Invoice</h2>
                <div class="invoice-number">Order #{{ $order->invoice_id }}</div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <address>
                    <strong>Shipped To To:</strong><br>
                      <strong>Name : </strong>{{ $order->userAddress->first_name }} {{ $order->userAddress->last_name }}<br>
                      <strong>Phone : </strong>{{ $order->userAddress->phone }}<br>
                      <strong>Address : </strong>{!! $order->userAddress->address !!}<br>
                      <strong>Area : </strong>{!! $order->userAddress->deliveryArea->area_name !!}<br>

                  </address>
                </div>
                <div class="col-md-6 text-md-right">
                  <address>
                    <strong>Order Date:</strong><br>
                    {{ date('F d, Y - H:i',strtotime($order->created_at)) }}
                  </address>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <address>
                    <strong>Payment Method:</strong><br>
                    {{ $order->payment_method }}<br>
                    <strong>Payment Status</strong>
                    @if ($order->payment_status === 'pending')
                        <div class="badge badge-danger">pending</div>
                     @elseif (strtoupper($order->payment_status) === 'COMPLETED')
                        <div class="badge badge-success">COMPLETED</div>
                     @else
                        <div class="badge badge-success">{{ $order->payment_status }}</div>
                    @endif
                  </address>
                </div>
                <div class="col-md-6 text-md-right">
                  <address>
                    <strong>Order Status</strong><br>
                    @if ($order->order_status === 'delivered')
                        <div class="badge badge-success">Delivered</div>
                     @elseif ($order->order_status === 'declined')
                        <div class="badge badge-danger">Declined</div>
                     @else
                        <div class='badge badge-warning'>{{ $order->order_status }}</div>
                    @endif
                  </address>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-md-12">
              <div class="section-title">Order Summary</div>
              <p class="section-lead">All items here cannot be deleted.</p>
              <div class="table-responsive">
                <table class="table table-striped table-hover table-md">
                  <tr>
                    <th data-width="40">#</th>
                    <th>Item</th>
                    <th>Size & Optional</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Totals</th>
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>
                        @if ($size)
                        <b>{{ @$size->name }} ( {{ currencyPosition($size->price) }} )</b>
                        @endif
                        <br>
                        @if($options)
                            <b>Options:</b><br>
                            @foreach ($options as $item_option)
                                {{ $item_option->name }} ( {{ currencyPosition($item_option->price) }} )<br>
                            @endforeach
                        @endif
                    </td>
                    <td class="text-center">{{ currencyPosition($item->unit_price) }}</td>
                    <td class="text-center">{{ $item->qty }}</td>
                    <td class="text-right">{{ currencyPosition($productTotal) }}</td>
                  </tr>
                  @endforeach


                </table>
              </div>
              <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="col-md-4">
                    <form action="{{ route('admin.order.status.update',$order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="payment_status">Payment Status</label>
                            <select  class="form-control" name="payment_status" id="payment_status">
                                <option @selected(strtolower($order->payment_status) === 'pending') value="pending">Pending</option>
                                <option @selected(strtolower($order->payment_status) === 'completed') value="completed">Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="order_status">Order Status</label>
                            <select  class="form-control" name="order_status" id="order_status">
                                <option @selected(strtolower($order->order_status) === 'pending') value="pending">Pending</option>
                                <option @selected(strtolower($order->order_status) === 'in_process') value="in_process">In Process</option>
                                <option @selected(strtolower($order->order_status) === 'delivered') value="delivered">Delivered</option>
                                <option @selected(strtolower($order->order_status) === 'declined') value="declined">Declined</option>
                            </select>
                        </div>
                        <input type="submit" value="Update Status" class="btn btn-info">
                    </form>
                </div>
                </div>
                <div class="col-lg-4 text-right">
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Subtotal</div>
                    <div class="invoice-detail-value">{{ currencyPosition($order->subtotal) }}</div>
                  </div>
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Shipping</div>
                    <div class="invoice-detail-value">{{ currencyPosition($order->delivery_charge) }}</div>
                  </div>
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Discount</div>
                    <div class="invoice-detail-value">{{ currencyPosition($order->discount) }}</div>
                  </div>
                  <hr class="mt-2 mb-2">
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Total</div>
                    <div class="invoice-detail-value invoice-detail-value-lg">{{ currencyPosition($order->final_total) }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-md-right">
          <div class="float-lg-left mb-lg-0 mb-3">
          </div>
          <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
        </div>
      </div>
    </div>
  </section>
@endsection
