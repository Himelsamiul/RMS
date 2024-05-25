<!DOCTYPE html>
<html lang="en">

<head>
    @notifyCss
    <meta charset="utf-8">
    <title>Olivia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{url('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
    <link href="{{url('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <style>  
    .notify {
            z-index: 9999;
            /* align-items: flex-end; */
            /* align-items: center; */
            justify-content: start;
        }
        </style>
</head>

<body>
    <!-- Nav Bar Start -->



    @include('notify::components.notify')

    @include('frontend.partials.header')



    <!-- Nav Bar End -->


    <!-- Carousel Start -->


    @yield('content')
    <!-- Blog End -->



    <!-- Footer Start -->



    @include('frontend.partials.footer')



    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('lib/easing/easing.min.js')}}"></script>
    <script src="{{url('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{url('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{url('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{url('ail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{url('mail/contact.js')}}"></script>
    @notifyJs
    <!-- Template Javascript -->
    <script src="{{url('js/main.js')}}"></script>
    @stack('yourJsCode')
</body>

</html>
