@extends('frontend.webpage')
@section('content')


<div class="menu">
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
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Mini cheese Burger</span> <strong>$9.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            
                            
                            
                            



                            
                            
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-burger-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>



@endsection