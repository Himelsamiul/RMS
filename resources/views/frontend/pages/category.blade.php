@extends('frontend.webpage')
@section('content')

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Our Menu's</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4 menu-box">
                                @foreach($category->menu as $data)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="{{url('app/image/menu', $data->image)}}" class="img-fluid w-100 rounded-top" alt="">
                                        </div>

                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>{{$data->name}}</h4>
                                            <p>{{$data->description}}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">{{$data->price}}&nbsp;BDT</p>
                                                <a href="{{route('add.to.cart',$data->id)}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .menu-box {
        background-color: rgba(173, 216, 230, 0.5); /* Very light blue color */
        padding: 20px;
        border-radius: 10px;
    }
</style>

@endsection
