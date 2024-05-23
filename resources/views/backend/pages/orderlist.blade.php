@extends('backend.master')
@section('content')

<div>
  <h1>All Order Report</h1>
<button onclick="printReport()" class="btn btn-primary mt-3">Print </button>

<table class="table">
  <thead>
    
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Food Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Transaction ID</th>
      
      <th scope="col">Payment Method</th>
      <th scope="col">Payment Status</th>
    </tr>
  </thead>
  <tbody>

  @foreach($list as $order)
    @foreach($order->orderDetails as $detail)
    <tr>
      <td>{{ $order->id }}</td>
      <td>{{$order->customer->name}}</td>
      <td>{{ $detail->menu->name }}</td>
      <td>{{ $detail->quantity }}</td>
      <td>{{ $order->total_price }}</td>
      <td>{{ $order->transaction_id }}</td>
     
      <td>{{ $order->payment_method }}</td>
      <td>{{ $order->payment_status }}</td>
    </tr>
    @endforeach
  @endforeach

  </tbody>
</table>
</div>
<script>
        function printReport() {
            window.print();
        }
    </script>
@endsection
