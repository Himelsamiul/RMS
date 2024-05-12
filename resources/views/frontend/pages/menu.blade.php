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
                
                <!-- <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#burgers"></a>
                </li>
                 -->
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
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>

                                
                                <div class="menu-text">
                                    <h3><span>Double size burger</span> <strong>$11.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Bacon, EGG and Cheese</span> <strong>$13.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Pulled porx Burger</span> <strong>$18.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-burger.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Fried chicken Burger</span> <strong>$22.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-burger-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div id="snacks" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-snack.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Corn Tikki - Spicy fried Aloo</span> <strong>$15.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-snack.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Bread besan Toast</span> <strong>$35.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-snack.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Healthy soya nugget snacks</span> <strong>$20.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-snack.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Tandoori Soya Chunks</span> <strong>$30.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-snack-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
                <div id="beverages" class="container tab-pane fade">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Single Cup Brew</span> <strong>$7.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Caffe Americano</span> <strong>$9.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Caramel Macchiato</span> <strong>$15.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Standard black coffee</span> <strong>$8.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                            <div class="menu-item">
                                <div class="menu-img">
                                    <img src="img/menu-beverage.jpg" alt="Image">
                                </div>
                                <div class="menu-text">
                                    <h3><span>Standard black coffee</span> <strong>$12.00</strong></h3>
                                    <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="img/menu-beverage-img.jpg" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection