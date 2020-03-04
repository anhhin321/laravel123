<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','trang chủ')</title>
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{!! asset('lib/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{!! asset('lib/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
  <link href="{!! asset ('lib/animate/animate.min.css') !!}" rel="stylesheet">
  <link href="{!! asset ('lib/ionicons/css/ionicons.min.css') !!}" rel="stylesheet">
  <link href="{!! asset ('lib/owlcarousel/assets/owl.carousel.min.css') !!}" rel="stylesheet">
  <link href="{!! asset ('lib/lightbox/css/lightbox.min.css') !!}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{!! asset ('css/style.css') !!}" rel="stylesheet">
</head>
<body>
	@include('fontend.menu.menu')
	  <div id="main">
      <section id="testimonials" class="section-bg">
      <div class="container">
        <header class="section-header">
          <h3>Tin mới nhất</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-12">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
            	@include('fontend.slide.slide')
            </div>
        </div>
    </div>
</div>
</section>
@yield('content')
  <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Tin nổi bật</h3>
          
        </header>

        <div class="row row-eq-height justify-content-center">
        	@include('fontend.news.news')
        	</div>
        </div></section>
        <div class="row hidden-xs">
  
    <div class="col-centered" id="clouds-footer">
      
      
    </div><!-- /clouds -->
  
  </div>
	<script src="{!! asset ('lib/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset ('lib/jquery/jquery-migrate.min.js') !!}"></script>
  <script src="{!! asset ('lib/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <script src="{!! asset ('lib/easing/easing.min.js') !!}"></script>
  <script src="{!! asset ('lib/mobile-nav/mobile-nav.js') !!}"></script>
  <script src="{!! asset ('lib/wow/wow.min.js') !!}"></script>
  <script src="{!! asset ('lib/waypoints/waypoints.min.js') !!}"></script>
  <script src="{!! asset ('lib/counterup/counterup.min.js') !!}"></script>
  <script src="{!! asset ('lib/owlcarousel/owl.carousel.min.js') !!}"></script>
  <script src="{!! asset ('lib/isotope/isotope.pkgd.min.js') !!}"></script>
  <script src="{!! asset ('lib/lightbox/js/lightbox.min.js') !!}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="{!! asset ('js/main.js') !!}"></script>
</body>
</html>