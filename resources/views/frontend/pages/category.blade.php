@extends('frontend.webpage')
@section('content')

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row">
                <div class="col-lg-4 text-start">
                    <h1>Our Menu's</h1>
                </div>
            </div>
            <div class="row ">
                @foreach($category->menu as $data)
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-4">
                        <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                            <img src="{{url('app/image/menu', $data->image)}}" class="img-fluid" alt="Card image" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$data->name}}</h5>
                            <p class="card-text">{{$data->description}}</p>
                            <p class="card-text">{{$data->price}}&nbsp;BDT</p>
                            <a href="{{route('add.to.cart',$data->id)}}" class="btn btn-primary"
                                data-mdb-ripple-init>Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
