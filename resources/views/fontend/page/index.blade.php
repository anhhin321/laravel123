@extends('fontend.master')
@section('content')
@include('fontend.menu.menu')
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
  <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Tin nổi bật</h3>
          
        </header>

        <div class="row row-eq-height justify-content-center">
        	@include('fontend.news.news')
        	</div>
        </div></section>
@endsection