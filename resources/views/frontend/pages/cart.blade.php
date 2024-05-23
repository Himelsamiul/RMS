@extends('frontend.webpage')

@section('content')

<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: 100px;">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    <div>
                        <a href="{{ route('cart.clear') }}" class="btn btn-danger">Clear Cart</a>
                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                                    class="fas fa-angle-down mt-1"></i></a></p>
                    </div>
                </div>

                @if(empty(session('cart')))
                <p>Your cart is empty.</p>
                @else
                @foreach(session('cart') as $cartItem)
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="{{ url('/app/image/menu/'.$cartItem['image']) }}" class="img-fluid rounded-3"
                                    alt="Cotton T-shirt">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb-2">{{ $cartItem['name'] }}</p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                    onclick="updateQuantity({{ $cartItem['id'] }}, -1, {{ $cartItem['price'] }})">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input id="quantity-{{ $cartItem['id'] }}" min="0" name="quantity"
                                    value="{{ $cartItem['quantity'] }}" type="number"
                                    class="form-control form-control-sm" readonly />
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                    onclick="updateQuantity({{ $cartItem['id'] }}, 1, {{ $cartItem['price'] }})">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0" id="subtotal-{{ $cartItem['id'] }}">{{ $cartItem['quantity'] }} x {{
                                    $cartItem['price'] }} = {{ $cartItem['subtotal'] }}</h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="{{ route('delete.order', ['orderId' => $cartItem['id']]) }}"
                                    class="btn btn-warning">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

                @if(!empty(session('cart')))
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('checkout') }}" type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-warning btn-block btn-lg">Checkout</a>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

<script>
    function updateQuantity(cartId, change, price) {
    const quantityInput = document.getElementById(`quantity-${cartId}`);
    const newQuantity = parseInt(quantityInput.value) + change;

    if (newQuantity >= 0) {
      // Send request to server to update the session
      updateCartSession(cartId, newQuantity, price);
    }
  }

  function updateSubtotal(cartId, price) {
    const quantityInput = document.getElementById(`quantity-${cartId}`);
    const newQuantity = parseInt(quantityInput.value);
    const newSubtotal = newQuantity * price;
    const subtotalElement = document.getElementById(`subtotal-${cartId}`);
    subtotalElement.innerHTML = `${newQuantity} x ${price.toFixed(2)} = ${newSubtotal.toFixed(2)}`;
  }

  function updateCartSession(cartId, newQuantity, price) {
    fetch('{{ route('update.cart') }}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({
        cartId: cartId,
        quantity: newQuantity
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        console.log('Cart updated successfully');
        // Update the quantity and subtotal in the DOM
        const quantityInput = document.getElementById(`quantity-${cartId}`);
        quantityInput.value = newQuantity;
        updateSubtotal(cartId, price);
      } else {
        console.error('Failed to update cart');
        alert(data.message); // Display the message to the user
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
</script>

@endsection