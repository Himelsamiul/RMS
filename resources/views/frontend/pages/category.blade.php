@extends('frontend.webpage')
@section('content')

<style>
.card {
    background-color: rgba(248, 249, 250, 0.3); 
    border: 1px solid rgba(224, 224, 224, 0.1); 
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
    margin: 10px; 
    padding: 15px; 
    max-width: 250px; 
}

/* Adjust card image */
.card-img-top {
    object-fit: cover; 
    height: 150px; 
    width: 100%;
}

/* Card title and text */
.card-title,
.card-text {
    color: #EAE86F; /* cart er text er colour change korbo */
}

/* Primary button */
.btn-primary {
    background-color: #007bff; 
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker blue on hover */
    border-color: #0056b3;
}

/* Move heading to the right */
.heading {
    text-align: right; 
    margin-right: -300px; /* heading ta placed korbo */
    padding-right: 20px; 
}

/* Background image for the page */
body {
    background-image: url('/p.jpg'); /* image set korbo */
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
}
</style>

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="heading" style="color: #EAE86F; font-family: 'Arial', sans-serif; font-size: 36px; text-shadow: 2px 2px 4px #aaa;">
                        Our Menu's
                    </h1>
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
                            
                            @if($data->previousprice)
                            <!-- Show both previous and current price if previous price exists -->
                            <p class="card-text">
                                <span style="text-decoration: line-through;">{{$data->previousprice}}&nbsp;BDT</span> 
                                <span style="color: #EAE86F;">{{$data->price}}&nbsp;BDT</span>
                            </p>
                            @else
                            
                            <p class="card-text">
                                <span style="color: #EAE86F;">{{$data->price}}&nbsp;BDT</span>
                            </p>
                            @endif
                            
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
