@extends('frontend.webpage')

@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <!-- User Profile Card -->
            <div class="card mb-4 shadow-lg border-0 animated-card" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <!-- User Icon with Animation -->
                        <div class="image-container animated-icon">
                            <i class="fas fa-user-circle fa-5x text-light"></i> <!-- Updated icon with color -->
                        </div>
                        <!-- User Info -->
                        <div class="userData ml-4">
                            <h2 class="d-block" style="font-size: 1.75rem; font-weight: bold; color: white;">User: {{ auth()->user()->name }}</h2>
                            <p class="text-light">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <!-- User Information Display -->
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label class="font-weight-bold text-light">Full Name</label>
                        </div>
                        <div class="col-md-10 col-7">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    <hr class="bg-light" />
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label class="font-weight-bold text-light">Email</label>
                        </div>
                        <div class="col-md-10 col-7">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <hr class="bg-light" />
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label class="font-weight-bold text-light">Contact Info</label>
                        </div>
                        <div class="col-md-10 col-7">
                            0{{ auth()->user()->phoneno }}
                        </div>
                    </div>
                    <hr class="bg-light" />
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label class="font-weight-bold text-light">Address</label>
                        </div>
                        <div class="col-md-10 col-7">
                            {{ auth()->user()->address }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table showing order details -->
<div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Total Price</th>
                <th scope="col">Transaction ID</th>
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
                    Paid
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
</div>

<!-- Custom CSS for Animation -->
<style>
    .animated-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .animated-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
    }

    .animated-icon {
        animation: bounce 1.5s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }
</style>
@endsection
