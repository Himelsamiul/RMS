@extends('frontend.webpage')

@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <i class="fas fa-user-circle fa-5x"></i> <!-- User icon -->
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a
                                        href="javascript:void(0);">User: {{auth()->user()->name}}</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- User Information Display -->
                    
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
                            0{{ auth()->user()->phoneno }}
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
                    <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                        aria-labelledby="ConnectedServices-tab">
                        Facebook, Google, Twitter Account that are connected to this account
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
           
            <th scope="col">Total Price</th>
            <th scope="col">Transanction ID</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $key => $data)
        <tr>
            <th scope="row">{{$key+1}}</th>
            
            <td>{{$data->total_price}}</td>
            <td>{{$data->transaction_id}}</td>
            <td>{{$data->payment_method}}</td>
            <td>
                @if($data->payment_status == 'success')
                paid
                @else
                {{$data->payment_status}}
                @endif
                
            </td>
            <td>{{$data->created_at}}</td>
            <td>
                <a class="btn btn-success" href="{{route('profile.view.order',$data->id)}}">View Order</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
