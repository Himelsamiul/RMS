@extends('frontend.webpage')

@section('content')
<div class="carousel">
    <div class="container-fluid">
        <div class="owl-carousel">
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="{img/carousel-1.jpg" alt="Image">
                </div>
               <div class="carousel-text">
                    <h1>Best <span>Quality</span> Ingredients</h1>
                    <p>
                    Experience the flavors of the world with our exquisite culinary creations
                    </p>
                    <div class="carousel-btn">
                        <a class="btn custom-btn" href="{{route('all.menu')}}">View Menu</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="img/carousel-2.jpg" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>World’s <span>Best</span> Chef</h1>
                    <p>
                    Discover the artistry of cuisine as we delight your senses with our gastronomic delights.
                    </p>
                    <div class="carousel-btn">
                        <a class="btn custom-btn" href="">View Menu</a>
                       
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="img/carousel-3.jpg" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>Fastest Order <span>Delivery</span></h1>
                    <p>
                    Hungry? Don't wait long! Our speedy delivery brings deliciousness to your doorstep
                    </p>
                    <div class="carousel-btn">
                        <a class="btn custom-btn" href="">View Menu</a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Booking Start -->

<!-- Booking End -->


<!-- About Start -->


















<!-- About End -->


<!-- Video Modal Start-->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->


<!-- Feature Start -->
<div class="feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-header">
                    <p>Why Choose Us</p>
                    <h2>Our Key Features</h2>
                </div>
                <div class="feature-text">
                    <div class="feature-img">
                        <div class="row">
                            <div class="col-6">
                                <img src="img/feature-1.jpg" alt="Image">
                            </div>
                            <div class="col-6">
                                <img src="img/feature-2.jpg" alt="Image">
                            </div>
                            <div class="col-6">
                                <img src="img/feature-3.jpg" alt="Image">
                            </div>
                            <div class="col-6">
                                <img src="img/feature-4.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                    <p>
                    Welcome to our restaurant management system, where we streamline every aspect of your operations. From intuitive table and order management to seamless billing and reservation systems, we ensure a smooth dining experience. With advanced inventory tracking, detailed analytics, and staff management tools, we empower you to run a successful restaurant efficiently and effectively.
                    </p>
                   
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="feature-item">
                            <i class="flaticon-cooking"></i>
                            <h3>World’s best Chef</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="feature-item">
                            <i class="flaticon-vegetable"></i>
                            <h3>Natural ingredients</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="feature-item">
                            <i class="flaticon-medal"></i>
                            <h3>Best quality products</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="feature-item">
                            <i class="flaticon-meat"></i>
                            <h3>Fresh vegetables & Meet</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="feature-item">
                            <i class="flaticon-courier"></i>
                            <h3>Fastest door delivery</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="feature-item">
                            <i class="flaticon-fruits-and-vegetables"></i>
                            <h3>Ground beef & Low fat</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput metus tortor
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Food Start -->
<div class="food">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="food-item">
                    <i class="flaticon-burger"></i>
                    <h2>Burgers</h2>
                    <p>
                        Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                    </p>
                    <a href="">View Menu</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="food-item">
                    <i class="flaticon-snack"></i>
                    <h2>Snacks</h2>
                    <p>
                        Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                    </p>
                    <a href="">View Menu</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="food-item">
                    <i class="flaticon-cocktail"></i>
                    <h2>Beverages</h2>
                    <p>
                        Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                    </p>
                    <a href="">View Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Food End -->


<!-- Menu Start -->









<!-- Menu End -->


<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Team</p>
            <h2>Our Master Chef</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/team-1.jpg" alt="Image">
                        <div class="team-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-text">
                        <h2>Adam Phillips</h2>
                        <p>CEO, Co Founder</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/team-2.jpg" alt="Image">
                        <div class="team-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-text">
                        <h2>Dylan Adams</h2>
                        <p>Master Chef</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/team-3.jpg" alt="Image">
                        <div class="team-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-text">
                        <h2>Jhon Doe</h2>
                        <p>Master Chef</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/team-4.jpg" alt="Image">
                        <div class="team-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-text">
                        <h2>Josh Dunn</h2>
                        <p>Master Chef</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->

<!--<div class="testimonial">
    <div class="container">
        <div class="owl-carousel testimonials-carousel">
            <div class="testimonial-item">
                <div class="testimonial-img">
                    <img src="img/testimonial-1.jpg" alt="Image">
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                </p>
                <h2>Client Name</h2>
                <h3>Profession</h3>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-img">
                    <img src="img/testimonial-2.jpg" alt="Image">
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                </p>
                <h2>Client Name</h2>
                <h3>Profession</h3>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-img">
                    <img src="img/testimonial-3.jpg" alt="Image">
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                </p>
                <h2>Client Name</h2>
                <h3>Profession</h3>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-img">
                    <img src="img/testimonial-4.jpg" alt="Image">
                </div>
                <p>
                    Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                </p>
                <h2>Client Name</h2>
                <h3>Profession</h3>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Contact Start -->






<!-- Contact End -->


<!-- Blog Start -->
<div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <p>Food Blog</p>
            <h2>Latest From Food Blog</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="img/blog-1.jpg" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-title">Lorem ipsum dolor sit amet</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-user"></i>Admin</p>
                            <p><i class="far fa-list-alt"></i>Food</p>
                            <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                            <p><i class="far fa-comments"></i>10</p>
                        </div>
                        <div class="blog-text">
                            <p>
                                Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor. Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte
                            </p>
                            <a class="btn custom-btn" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="img/blog-2.jpg" alt="Blog">
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-title">Lorem ipsum dolor sit amet</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-user"></i>Admin</p>
                            <p><i class="far fa-list-alt"></i>Food</p>
                            <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                            <p><i class="far fa-comments"></i>10</p>
                        </div>
                        <div class="blog-text">
                            <p>
                                Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor. Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte
                            </p>
                            <a class="btn custom-btn" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection