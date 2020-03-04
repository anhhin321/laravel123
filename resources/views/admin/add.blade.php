@extends('home')
@section('title','Thêm bài viết mới')
@section('content')
<script>

</script>
<h2>Thêm bài viết</h2>
<form action="{!! route('addAction') !!}" enctype="multipart/form-data" method="POST">
	@csrf
	<label for="name">Tiêu đề bài viết:</label>
    <input type="text" class="form-control" name="tieude" value="" id="tieude" onkeyup="ChangeToSlug();">
    <label for="name">Slug:</label>
    <input type="text" class="form-control" name="slug" value="" id="slug">
    <label for="name">Ảnh:</label>
    <input type="file" class="form-control" name="img" id="img">
    <script src="http://anhhin.orgfree.com/soan-thao-code/ckeditor/ckeditor.js"></script>
    <div class="form-group">
  <label for="comment">Tóm tắt bài viết:</label>
  <textarea class="form-control" rows="5" id="tomtat" name="tomtat"></textarea>
</div>
    <h4>Nội dung bài viết</h4>
    <textarea name="noidung" id="noidung"></textarea>
      <script>CKEDITOR.replace('noidung');</script>
      <input type="submit" class="btn btn-outline-primary" value="Thêm bài viết">
</form>
@endsection
