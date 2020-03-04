@extends('home')
@section('title','Trang quản lý')
@section('content')
<h2>Xin chào: {{Auth::user()->name}}</h2>
<div class="row">
<div class="col-sm-5">
	<form action="{!! route('addUser') !!}" method="POST">
		@csrf
	<table class="table table-bordered">
		<tr>
			<td colspan="2">
				<h4 class="text-center">Thêm admin</h4>
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
			</td>
		</tr>
		<tr>
			<td>Repeat password</td>
			<td>
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
			</td>
		</tr>
		<tr >
			<td colspan="2">
				<center>
					<button type="submit" class="btn btn-primary text-center"> Thêm tài khoản </button>
				</center>
			</td>
		</tr>
	</table>
</form>
</div>
<div class="col-sm-7">
	<h3>Danh sách tài khoản admin</h3>
	<table class="table" id="table">
		<thead>
			<th>STT</th>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php $stt=1; ?>
			@foreach($data as $value)
			<tr class="post{{$value->id}}">
				<td>{{$stt++}}</td>
				<td>{{$value['name']}}</td>
				<td>{{$value['email']}}</td>
				<td>
					<button class="btn btn-primary edit-modal" data-toggle="modal" data-target="#exampleModal" data-id="{{ $value->id }}">Sửa</button>
					<button class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal10" data-id="{{ $value->id }}">Xóa</button>

				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
	@can('example')
	<h4>Check tý xem sao</h4>
	@endcan
</div>
{{--Sửa thông tin--}}
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<label for="id">Id</label>
      	<input type="text " class="form-control" name="id" id="id" disabled="">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="n">
        <label for="price">Email:</label>
        <input type="text" class="form-control" name="price" id="p">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary edit">Lưu</button>
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
        <h4>Bạn có muốn xóa product id = <span id="delete-id"></span> </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete-modal">Xóa</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).on('click','.delete', function (){
		$('#delete-id').text($(this).data('id'));
		var  _this = $(this);
		$.ajax({
			type: 'POST',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'id': $(this).attr('data-id')
			},

			url: 'deleteUser',
			success: function (data){
				_this.parents('tr').remove();
			}
		});
	});
	$(document).on('click','.edit-modal', function (){
		$.ajax({
			type: 'POST',
			url: 'getInfo',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'id': $(this).attr('data-id')
			},
			
			success: function (data){
				$('#id').val(data.id);
				$('#n').val(data.name);
				$('#p').val(data.email);
			}
		});
	});
	$(document).on('click','.edit', function (){
		$.ajax({
			type: 'POST',
			url: 'saveUser',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'id': $(this).attr('data-id'),
				'name': $('#n').val(),
				'email': $('#p').val()
			},
			success: function (data){
				$('#table').replaceWith(
	 				"<tr class='post"+ data.id +" '>"+
	 				"<td>"+ data.id+"</td>"+
	 				"<td>"+data.name+"</td>"+
	 				"<td>"+data.email+"</td>"+
	 				
	 				"<td><button type='button' class='btn btn-primary edit-modal' data-toggle='modal' data-target='#exampleModal' data-id='"+data.id+"'>Sửa</button> <button type='button' class='btn btn-primary delete-modal' data-id='"+data.id+"'>Xóa</button></td>"+"</tr>");
			}
		});
	});
</script>
@endsection