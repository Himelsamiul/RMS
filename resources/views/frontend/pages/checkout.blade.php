@extends('frontend.webpage')
@section('content')

<div class="container">

    <div class="py-5 text-center">
    </div>

    <div class="row" style="margin-top: 100px;">
        <div class="col-md-4 order-md-2 mb-4">
            <h2>Checkout form</h2>
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{ count(session('cart')) }}</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                @php
                $total = 0;
                @endphp
                @foreach(session('cart') as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $item['name'] }}</h6>
                    </div>
                    <span class="text-muted"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Quantity</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted">{{ $item['quantity'] }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Subtotal</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted">৳{{ $item['subtotal'] }}</span>
                </li>
                @php
                $total += $item['subtotal'];
                @endphp
                @endforeach
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Total</h6>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted">৳{{ $total }}</span>
                </li>
            </ul>
        </div>

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate="" action="{{ route('order.place') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Name</label>
                        <input value="{{ auth()->user()->name }}" name="name" type="text" class="form-control" id="firstName" placeholder="" value="" required="" readonly>
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input value="{{ auth()->user()->email }}" name="email" type="email" class="form-control" id="email" placeholder="you@example.com" readonly>
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="phoneno">Phone Number <span class="text-muted">(Optional)</span></label>
                    <input value="0{{ auth()->user()->phoneno }}" name="phone" type="text" class="form-control" id="phoneno" placeholder="1234567890" readonly>
                    <div class="invalid-feedback"> Please enter a valid phone number for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input value="{{ auth()->user()->address }}" name="address" type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>

                <hr class="mb-4">

                <hr class="mb-4">
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input value="cod" id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Cash on delivery</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input value="ssl" id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">SSL</label>
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2019 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

@endsection

