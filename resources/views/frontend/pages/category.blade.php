@extends('frontend.webpage')
@section('content')

<style>
/* Light color scheme for the cards */
.card {
    background-color: #f8f9fa; /* Light background color */
    border: 1px solid #e0e0e0; /* Light border color */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    margin: 10px; /* Reduce the margin */
    padding: 15px; /* Reduce the padding */
    max-width: 250px; /* Set a maximum width to make the card smaller */
}

/* Adjust card image */
.card-img-top {
    object-fit: cover; 
    height: 150px; /* Reduce the height of the image */
    width: 100%;
}

/* Card title and text */
.card-title,
.card-text {
    color: #333; /* Dark text color for contrast */
}

/* Primary button */
.btn-primary {
    background-color: #007bff; /* Light blue background color */
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker blue on hover */
    border-color: #0056b3;
}
</style>

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row">
                <div class="col-lg-4 text-start">
                    <h1>Our Menu's</h1>
                </div>
            </div>
            <div class="row">
                @foreach($category->menu as $data)
                <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                    <div class="card mb-4">
                        <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                            <img src="{{url('app/image/menu', $data->image)}}" class="img-fluid card-img-top" alt="Card image" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$data->name}}</h5>
                            <p class="card-text">{{$data->description}}</p>
                            <p class="card-text">{{$data->price}}&nbsp;BDT</p>
                            <a href="{{route('add.to.cart',$data->id)}}" class="btn btn-primary" data-mdb-ripple-init>Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
