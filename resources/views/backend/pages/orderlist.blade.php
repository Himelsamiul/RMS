@extends('backend.master')
@section('content')

<div>
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
      <td>{{ $order->status }}</td>
    </tr>
    @endforeach
  @endforeach

  </tbody>
</table>
</div>

@endsection
