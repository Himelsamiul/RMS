@extends('frontend.webpage')

@section('content')
<div class="content-wrapper" style="margin-top: 100px;"> <!-- Adjust margin-top value as needed -->
    <div class="contact">
        <div class="container">
            <div class="section-header text-center">
                <p>Contact Us</p>
                <h2>Contact For Any Query</h2>
            </div>
            <div class="row align-items-center contact-information">
                <div class="col-md-6 col-lg-3 animated-slide">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Address</h3>
                            <p>Mirpur, Dhaka, Bangladesh</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 animated-slide">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call Us</h3>
                            <p>01706636599</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 animated-slide">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email Us</h3>
                            <p>himel11@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 animated-slide">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-share"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Follow Us</h3>
                            <div class="contact-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row contact-form animated-slide">
                <div class="col-md-6">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate" action="" method="POST">
                        @csrf
                        <div class="control-group">
                            <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name="message" class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn custom-btn" type="submit" id="sendMessageButton">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
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
