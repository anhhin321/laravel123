@extends('home')
@section('title','Sửa bài viết')
@section('content')
<form action="" method="POST">
	@csrf
	<label for="">id</label>
      	<input type="text" id="id" name="id" class="form-control" value="{!! $data['id'] !!}" disabled="">
<label for="name">Tiêu đề bài viết:</label>
    <input type="text" class="form-control" name="tieude" value="{!! $data['tieude'] !!}" id="tieude" onkeyup="ChangeToSlug();">
    <label for="name">slug:</label>
    <input type="text" class="form-control" name="slug" value="{!! $data['slug'] !!}" id="slug">
    <label for="name">Ảnh:</label>
    <input type="file" class="form-control" name="img" id="img">
  <label for="comment">Tóm tắt bài viết:</label>
  <textarea class="form-control" rows="5"  name="tomtat" value="{!! $data['tomtat'] !!}"></textarea>
    <h4>Nội dung bài viết</h4>
    <textarea name="noidung" id="noidung" class="form-control" value="{!! $data['noidung'] !!}"></textarea>
      <!-- <script>CKEDITOR.replace('noidung');</script> -->
      <button type="submit" class="btn btn-outline-primary">Sửa bài viết</button>
</form>
    <script src="http://anhhin.orgfree.com/soan-thao-code/ckeditor/ckeditor.js"></script>
@endsection