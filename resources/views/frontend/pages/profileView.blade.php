@extends('frontend.webpage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <img src="" alt="Upload Image" class="rounded-circle" width="150">
                                <div class="middle">
    
                                </div>
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">User: {{auth()->user()->name}}</a></h2>
                                <h6 class="d-block"><a href="javascript:void(0)"></a> Approved Bookings</h6>
                                <h6 class="d-block"><a href="javascript:void(0)"></a> Pending Bookings</h6>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Full Name</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    <hr />



                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Email</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Contact Info</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->phoneno }}
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Address</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->address }}
                        </div>
                    </div>
                    </hr>



                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                        Facebook, Google, Twitter Account that are connected to this account
                    </div>
                </div>

            </div>


        </div>

    </div>
</div>
</div>
</div>

<!--<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Address</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

       @foreach($order as $data)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->auth()->user()->name}}</td>
            <td>{{$order->auth()->user()->phoneno}}</td>
            <td>{{$order->OrderDetail->food->name}}</td>
            <td>{{$order->OrderDetail->quantity}}</td>
            <td>{{$order->total_price}}</td>
            <td>{{$order->auth()->user()->address}}</td>
            <td>{{$order->payment_method}}</td>
            <td>{{$order->create_at->format('d-m-Y')}}</td>
            <td>

                <a class="btn btn-danger" href="">Cancel Booking</a>

                <a class="btn btn-success" href="">Make Payment</a>
            
            </td>
        </tr>

       @endforeach

    </tbody>

</table>-->



@endsection