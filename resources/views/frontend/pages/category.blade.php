@extends('frontend.webpage')
@section('content')

<div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Our Organic Products</h1>
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
                                    <div class="row g-4">
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




<!--<div class="menu">
    <div class="container">
        <div class="section-header text-center">
            <p>Food Menu</p>
            <h2>Delicious Food Menu</h2>
        </div>
        <div class="menu-tab">
            <ul class="nav nav-pills justify-content-center">
                
                
            </ul>
            <div class="tab-content">
                <div id="burgers" class="container tab-pane active">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">

                        @foreach($category->menu as $data)
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="{{url('app/image/menu', $data->image)}}" alt="Image">
                             
                              
                                </div>
                                <div class="menu-text">
                                    <h3><span>{{$data->name}}</span> <strong>{{$data->price}}&nbsp;BDT</strong></h3>
                                    <p>{{$data->description}}</p>
                                    
                                </div>


                            </div>
                            @endforeach
                            
                            
                            



                            
                            
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-burger-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>-->



@endsection