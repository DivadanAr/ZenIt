@extends('layout/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/myorder.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="content-order">
    <div class="head">
        <div class="left">
            <h1>My Order</h1>
            <p style="font-size: 15px;">Review and Manage Your Orders</p>
        </div>
    </div>
    <div class="menus">
        <p style="font-size: 20px; font-weight: 600;">Total : {{ $orders->count() }} Orders</p>
        <div class="left-row">
            <form class="tabs" action="" method="POST" id="toggle">
                    <input type="radio" id="radio-1" name="tabs" value="1" checked onchange="change()"/>
                    <label class="tab" for="radio-1">View All</label>
                    <input type="radio" id="radio-2" name="tabs" value="2" onchange="change()"/>
                    <label class="tab" for="radio-2">My Order</label>
                    <input type="radio" id="radio-3" name="tabs" value="3" onchange="change()"/>
                    <label class="tab" for="radio-3">Completed</label>
                    <input type="radio" id="radio-4" name="tabs" value="4" onchange="change()"/>
                    <label class="tab" for="radio-4">Canceled</label>
                    <span class="glider"></span>
            </form>
        </div>
        <div class="filter-dropdown">
            <select name="sort" id='sort' class="option-filter" >
                <option id="1" value="" selected="" >All</option>
                <option id="1" value="" selected="" >Harga</option>
                <option id="1" value="" selected="" >Quantity</option>
                <option id="1" value="" selected="" >latest</option>
                <option id="1" value="" selected="" >Newest</option>
            </select>
        </div>
    </div>
    <table border="1px" id="tableData" width="100%">
        <tr>
            <th style="width: 50px;">No.</th>
            <th>Invoice</th>
            <th>Status</th>
            <th>date</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Payment Method</th>
            <th>Action</th>
        </tr>
        @forelse($orders as $order)
        <tr>
            <td style="width: 50px;">{{ $loop->iteration }}</td>
            <td>{{ $order->invoice_no }}</td>
            <td class="status">
                @if($order->status == 'Not Paid')
                    @include('status.notPaid')
                @elseif($order->status == 'PAID')
                    @include('status.verified')
                @elseif($order->status == 'PROCESSED')
                    @include('status.processed')
                @elseif($order->status == 'SHIPPED')
                    @include('status.shipped')
                @elseif($order->status == 'CANCELED')
                    @include('status.canceled')
                @elseif($order->status == 'DELIVERED')
                    @include('status.delivered')
                @elseif($order->status == 'COMPLETE')
                    @include('status.complete')
                @elseif($order->status == 'REFUNDED')
                    @include('status.refunded')
                @else
                <p>Status Unknown</p>
                @endif
            </td>
            <td>{{ $order->created_at->format('Y/m/d') }}</td>
            <td>{{ array_sum($order->orderItem->pluck('product_qty')->all()) }}</td>
            <td>Rp. {{ number_format($order->total,0,',','.') }}</td>
            <td>{{ $order->payment_type }}</td>
            <td>
                <a href="{{ route('cust.order.detail', $order->id) }}">Details</a>
            </td>
        </tr>
        @empty
        <tr>
          <td colspan="8">
              No record found!
          </td>
        </tr>

        @endforelse
    </table>
</div>

<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    function change(){

        let x = $('#toggle').serialize();

    $.ajax({
        type: "POST",
        url: "{{ url('/order') }}",
        data: x,
        success: function (response) {
            $('#tableData').html(response)
        }
    });
}
</script>
@endsection
