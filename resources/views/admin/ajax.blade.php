<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax crud</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
	<?php $no=1; ?>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Thêm mới sản phẩm
              </button>
	<table class="table" id="table">
		<thead>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>HSD</th>
			<th>Thời gian</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($data as $value)
			<tr class="post{{$value->id}}">
				<td>{{ $no++ }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->price }}</td> 
				<td>{{ $value->ngay_nhap }}</td>
				<td>{{ $value->expried}}</td>
				<td>{{ $value->created_at}}</td>
				<td><button type="button" class="btn btn-primary view-modal" data-toggle="modal" data-target="#exampleModal2" data-id="{{ $value->id }}" data-name="{{$value->name}}" data-price="{{$value->price}}" data-ngay_nhap="{{$value->ngay_nhap}}" data-expried="{{$value->expried}}">Xem chi tiết</button><button type="button" class="btn btn-primary edit-modal" data-toggle="modal" data-target="#exampleModal" data-id="{{ $value->id }}">Sửa</button><button type="button" class="btn btn-primary delete-modal" data-id="{{ $value->id }}">Xóa</button></td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{--Thêm mới--}}
<div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
              
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Thêm mới sản phẩm</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
              
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="form-horizontal">
   		 <label for="name">Tên sản phẩm:</label>
        <input type="text" class="form-control" name="name" id="name">
        <label for="price">Giá:</label>
        <input type="text" class="form-control" name="price" id="price">
        <label for="sl">Số lượng:</label>
        <input type="text" class="form-control" name="ngay_nhap" id="ngay_nhap">
        <label for="ex">HSD</label>
        <input type="text" class="form-control" name="expried" id="expried">
        <label for="anh">Hình ảnh:</label>
        <input type="file" class="form-control" name="tenanh" id="tenanh">
                    </div>
              
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary add-modal">Thêm sản phẩm</button>
  </form>
                    </div>
              
                  </div>
                </div>
              </div>
	{{--Sửa thông tin--}}
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<label for="id">Id</label>
      	<input type="text " class="form-control" name="id" id="id" disabled="">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" class="form-control" name="name" id="n">
        <label for="price">Giá:</label>
        <input type="text" class="form-control" name="price" id="p">
        <label for="sl">Số lượng:</label>
        <input type="text" class="form-control" name="ngay_nhap" id="ng">
        <label for="ex">HSD</label>
        <input type="text" class="form-control" name="expried" id="ex">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit">Save changes</button>
      </div>
    </div>
  </div>
</div>
{{--xóa--}}
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Bạn có muốn xóa product <span id="delete-pro"></span> id = <span id="delete-id"></span> </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete">Xóa</button>
      </div>
    </div>
  </div>
</div>
{{--Xem chi tiết--}}
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xem chi tiết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Tên sản phẩm: <i id="name-v"></i></h5>
        <h5>Giá: <i id="price-v"></i></h5>
        <h5>Số lượng: <i id="ng-v"></i></h5>
        <h5>HSD: <i id="ex-v"></i></h5>
      </div>
      
    </div>
  </div>
</div>
<script>
	 $(document).on('click','.add-modal', function (){
	 	$.ajax({
	 		type: 'POST',
	 		url: 'addAb',
	 		data: {
	 			'_token': $('meta[name="csrf-token"]').attr('content'),
	 			'name': $('input[name=name]').val(),
	 			'price': $('input[name=price]').val(),
	 			'ngay_nhap': $('input[name=ngay_nhap]').val(),
	 			'expried': $('input[name=expried]').val(),
	 			'tenanh':$('input[name=tenanh]').val()
	 		},
	 		success: function (data){
	 			$('#table').append(
	 				"<tr class='post"+ data.id +" '>"+
	 				"<td>"+ data.id+"</td>"+
	 				"<td>"+data.name+"</td>"+
	 				"<td>"+data.price+"</td>"+
	 				"<td>"+data.ngay_nhap+"</td>"+
	 				"<td>"+data.expried+"</td>"+
	 				"<td>"+data.created_at+"</td>"+
	 				"<td><button type='button' class='btn btn-primary edit-modal' data-toggle='modal' data-target='#exampleModal' data-id='"+data.id+"'>Sửa</button> <button type='button' class='btn btn-primary delete-modal' data-id='"+data.id+"'>Xóa</button></td>"+"</tr>"
	 				);
	 		}
	 	});
	 });

  $(document).on('click', '.edit-modal', function() {
        $.ajax({
            type: 'POST',
            url: 'getInforById',
            data: {
            '_token':$('meta[name="csrf-token"]').attr('content'),
            'id': $(this).attr('data-id')
            },success: function(data) {
                $('#id').val(data.id);
                $('#n').val(data.name);
                $('#p').val(data.price);
                $('#ng').val(data.ngay_nhap);
                $('#ex').val(data.expried);
            }
        });
    });

  $(document).on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editPost',
    data: {
				 '_token':$('meta[name="csrf-token"]').attr('content'),
				'id': $("#id").val(),
				'name': $('#n').val(),
				'price': $('#p').val(),
				'ngay_nhap': $('#ng').val(),
				'expried': $('#ex').val()
    },
success: function(data) {
      $('.post' + data.id).replaceWith(" "+
      "<tr class='post" + data.id + "'>"+
      "<td>" + data.id + "</td>"+
      "<td>" + data.name + "</td>"+
      "<td>" + data.price + "</td>"+
      "<td>" + data.ngay_nhap + "</td>"+
      "<td>" + data.expried + "</td>"+
      "<td>" + data.created_at + "</td>"+
 "<td><button type='button' class='btn btn-primary edit-modal' data-toggle='modal' data-target='#exampleModal' data-id='"+data.id+"'>Sửa</button> <button type='button' class='btn btn-primary delete-modal' data-id='"+data.id+"'>Xóa</button></td>"+
      "</tr>");
    }
  });
});
  $(document).on('click','.delete-modal', function (){
  	// confirm("Bạn muốn xóa không");
  	var _this = $(this);
        $.ajax({
            type: "POST",
            data: {
            	'_token': $('meta[name="csrf-token"]').attr('content'),
                id  :   $(this).attr('data-id')
            },
            url: "deletePost",
            success: function(data){
                // if(data=='OK'){
                  alert('Xóa học phần thành công');
                    _this.parents('tr').remove();
        }

  	});
  	});
  $(document).on('click','.view-modal',function (){
  	$('#name-v').text($(this).data('name'));
  	$('#price-v').text($(this).data('price'))
  	;
  	$('#ng-v').text($(this).data('ngay_nhap'));
  	$('#ex-v').text($(this).data('expried'));
  	// $.ajax({
  	// 	type: 'POST',
  	// 	url: 'viewPost',
  	// 	data: {
  	// 		'_token': $('meta[name="csrf-token"]').attr('content'),
  	// 		'id': $(this).attr('data-id')
  	// 	},
  	// 	success: function (data){
  	// 		console.log(data);
  	// 		$('#name-v').val(data.name);
  	// 	}
  	// });
  });
</script>
</body>
</html>