@extends('backend.pages.order.orderview')


@section('content')
<h1> Order list </h1>

{{-- <div class="col-lg-4 px-5 d-inline-flex align-items- text-start">
  <form class="col-lg-12" action="{{route('admin.order.search')}}" method="get">
      <input style="border-radius: 10px;" class="col-lg-9" type="text" class="form-control" placeholder="Search..." name="search">
      <button class="col-lg-2" type="submit" class="btn btn-success">Search</button>
  </form>
</div> --}}



<a class="btn btn-danger" href="{{route('order.print')}}">Print</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Total price</th>
      <th scope="col">Payment method</th>
      <th scope="col">Address</th>
      <th scope="col">Receiver Mobile</th>
      <th scope="col">Receiver Name</th>
      <th scope="col">Receiver Email</th>
      <th scope="col">Order Note</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Order Status</th>
      <th scope="col">Transaction ID</th>
      <th scope="col">Deliveryman</th>
      <th scope="col">Action</th>

 
    </tr>
  </thead>
  <tbody>
    @foreach($order_data as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->total_price}}</td>
      <td>{{$item->payment_method}}</td>
      <td>{{$item->address}}</td>
      <td>{{$item->receiver_mobile}}</td>
      <td>{{$item->receiver_name}}</td>
      <td>{{$item->receiver_email}}</td>
      <td>{{$item->order_note}}</td>
      <td>{{$item->transaction_id}}</td>
      <td>{{$item->status}}</td>
      <td>{{$item->payment_status}}</td>
      <td>{{$item->deliver->name ?? null}}</td>


      <td>
        <a class ="btn btn-primary btn-sm" href="{{route('order.view',$item->id)}}">View</a>

      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>


@endsection