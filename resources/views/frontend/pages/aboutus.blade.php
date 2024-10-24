@extends('frontend.webpage')

@section('content')
<div class="content-wrapper" style="margin-top: 100px;">
    <div class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img animated-slide">
                        <img src="img/about.jpg" alt="Image" class="custom-img-height">
                        <button type="button" class="btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content animated-slide">
                        <div class="section-header">
                            <p>About Us</p>
                            <h2  >Cooking Since 2020</h2>
                        </div>
                        <div class="about-text">
                            <p>
                                "Welcome to Food Heaven, where culinary excellence meets exceptional service! Since 2020, Food Haven's has been the heart of our community, dedicated to providing you with unforgettable dining experiences. From our carefully crafted menus featuring locally sourced ingredients to our warm and inviting ambiance, every aspect of Food Heaven's is designed to delight your senses and create lasting memories. Whether you're joining us for a cozy dinner with loved ones or a celebratory gathering with friends, our team is here to ensure your time with us is nothing short of extraordinary. Come savor the flavors of Food Haven's and experience hospitality at its finest!"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS to decrease image height and add animations -->
<style>
    .custom-img-height {
        height: 300px; /* Adjust the height as needed */
    }

    /* Floating animation */
    .animated-slide {
        opacity: 0;
        transform: translateY(-50px);
        animation: slideDown 1s ease-out forwards;
    }

    /* Keyframes for the slide-down animation */
    @keyframes slideDown {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
