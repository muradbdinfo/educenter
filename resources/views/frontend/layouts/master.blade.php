<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Educenter</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('public/frontend/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- slick slider -->
  <link rel="stylesheet" href="{{asset('public/frontend/plugins/slick/slick.css')}}">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="{{asset('public/frontend/plugins/themify-icons/themify-icons.css')}}">
  <!-- animation css -->
  <link rel="stylesheet" href="{{asset('public/frontend/plugins/animate/animate.css')}}">
  <!-- aos -->
  <link rel="stylesheet" href="{{asset('public/frontend/plugins/aos/aos.css')}}">
  <!-- venobox popup -->
  <link rel="stylesheet" href="{{asset('public/frontend/plugins/venobox/venobox.css')}}">

  <!-- Main Stylesheet -->
  <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{asset('public/frontend/images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{asset('public/frontend/images/favicon.png')}}" type="image/x-icon">

</head>

<body>
@include('frontend.layouts.header')
@include('frontend.layouts.slider')
@include('frontend.layouts.banner')
@include('frontend.layouts.aboutus')
@include('frontend.layouts.course')
@include('frontend.layouts.story_workshop')
@include('frontend.layouts.events')
@include('frontend.layouts.teacher')
@include('frontend.layouts.blog')

@yield('content')
  <!-- preloader start -->
  <div class="preloader">
    <img src="{{asset('public/frontend/images/preloader.gif')}}" alt="preloader">
  </div>
  <!-- preloader end -->




  @include('frontend.layouts.footer')













<!-- jQuery -->
<script src="{{asset('public/frontend/plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('public/frontend/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- slick slider -->
<script src="{{asset('public/frontend/plugins/slick/slick.min.js')}}"></script>
<!-- aos -->
<script src="{{asset('public/frontend/plugins/aos/aos.js')}}"></script>
<!-- venobox popup -->
<script src="{{asset('public/frontend/plugins/venobox/venobox.min.js')}}"></script>
<!-- filter -->
<script src="{{asset('public/frontend/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="{{asset('public/frontend/plugins/google-map/gmap.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('public/frontend/js/script.js')}}"></script>

</body>
</html>