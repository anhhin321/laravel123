@extends('home')
@section('title','Danh sách bài viết')
@section('content')
<?php $stt=1; ?>
<table class="table" id="table">
	<thead>
		<th>STT</th>
		<th>Tên bài viết</th>
		<th>Ảnh</th>
		<th>Link bài viết</th>
		<th>Action</th>
	</thead>
	<tbody>
		@foreach($data as $value)
		<tr class="post{{$value->id}}">
			<td>{{$stt++}}</td>
			<td>{{$value['tieude']}}</td>
			<td><img src="{!! asset('uploads/'.$value['anh'])!!}" alt="{{$value['tieude']}}" class="rounded" width="200" height="145"></td>
			<td>......</td>
			<td>
				<a href="{!! route('getPost',['id'=>$value['id']])!!}"><button class="btn btn-primary" data-id="{{ $value->id }}">Sửa</button></a>
				<button class="btn btn-danger">xóa</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{-- modal sửa thông tin--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<label for="">id</label>
      	<input type="text" id="id" name="id" disabled="">
<label for="name">Tiêu đề bài viết:</label>
    <input type="text" class="form-control" name="tieude" value="" id="tieude" onkeyup="ChangeToSlug();">
    <label for="name">slug:</label>
    <input type="text" class="form-control" name="slug" value="" id="slug">
    <label for="name">Ảnh:</label>
    <input type="file" class="form-control" name="img" id="img">
    <script src="http://anhhin.orgfree.com/soan-thao-code/ckeditor/ckeditor.js"></script>
    <div class="form-group">
  <label for="comment">Tóm tắt bài viết:</label>
  <textarea class="form-control" rows="5" id="tomtat" name="tomtat"></textarea>
</div>
    <h4>Nội dung bài viết</h4>
    <textarea name="noidung" id="noidung" class="form-control" rows="5"></textarea>
      <!-- <script>CKEDITOR.replace('noidung'); document.getElementById(noidung);</script> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary edit">Lưu</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).on('click','.edit-modal', function (){
		$.ajax({
			type: 'POST',
			url: 'getPost',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'id': $(this).attr('data-id')
			},
			success: function (data){
				$("#id").val(data.id);
				$("#tieude").val(data.tieude);
				$("#slug").val(data.slug);
				$("#tomtat").val(data.tomtat);
				$("#noidung").val(data.noidung);
			}
		});
	});
	$(document).on('click','.edit', function (){
		$.ajax({
			type: 'POST',
			url: 'savePost',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'id': $(this).attr('data-id'),
				'tieude': $('#tieude').val(),
				'slug':$('#slug').val(),
				'tomtat': $('#tomtat').val(),
				'img': $('#img').val()
			},
			success: function (){
				$('#table').replaceWith(
	 				"<tr class='post"+ data.id +" '>"+
	 				"<td>"+ data.id+"</td>"+
	 				"<td>"+data.tieude+"</td>"+
	 				"<td>"+'.......'+"</td>"+
	 				
	 				"<td><button type='button' class='btn btn-primary edit-modal' data-toggle='modal' data-target='#exampleModal' data-id='"+data.id+"'>Sửa</button> <button type='button' class='btn btn-primary delete-modal' data-id='"+data.id+"'>Xóa</button></td>"+"</tr>");
			}
		});
	});
</script>
@endsection