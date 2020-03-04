	<meta charset="UTF-8">
	<title></title>
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
  @include('fontend.menu.menu')
<div class="container" style="margin-top: 77px;">
	<div style="text-align: center; width: 500px;" class="text-center">
	  <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="myBtn" onfocus="myFunction(this.id)"></textarea>
</div>
</div>
	<h1>{!! $data['tieude'] !!}</h1>
	<img src="{!! asset('uploads/'.$data['anh'])!!}" alt="{{$data['tieude']}}" class="rounded">
	<h5>{!! $data['tomtat'] !!}</h5>

	{!! $data['noidung'] !!}
	<hr>
	<h4>Thêm vào giỏ hàng</h4>
	<form action="{!! route('addProduct') !!}" method="POST">
		@csrf
		Tên sản phẩm: <input type="text" name="tensp" value="{{$data['tieude']}}" disabled="" class="form-control">
		Số lượng: <input type="number" class="form-control" name="sl">
		<button class="btn btn-primary text-center" type="submit">Thêm vào giỏ hàng</button>
	</form>
	<hr>
<script>
	
myFunction = (x) => {
  $(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
}); 
}
</script>


</div>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Tin nổi bật</h3>
          
        </header>

        <div class="row row-eq-height justify-content-center">
        	@include('fontend.news.news')
        	</div>
        </div></section>
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

