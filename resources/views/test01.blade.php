<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="http://anhhin.orgfree.com/soan-thao-code/ckeditor/ckeditor.js"></script> -->

</head>
<body>

<div class="container">
  <form action="{{ route('postTest') }}" method="POST">
    @csrf
    <div class="control-group">
      <label class="control-label" for="inputFname">người nhận <sup>*</sup></label>
      <div class="controls">
        <input type="text" id="inputFname" name="a" class="form-control">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputFname">Chủ đề <sup>*</sup></label>
      <div class="controls">
        <input type="text" id="inputFname" name="b" class="form-control">
      </div>
    </div>
    <script src="http://anhhin.orgfree.com/soan-thao-code/ckeditor/ckeditor.js"></script>
<h4>Tin nhắn</h4>
      <script>CKEDITOR.replace('mota1');</script>
 <textarea name="mota1" id="mota1" class="form-control" cols="5"></textarea>
 <div class="form-group">
    <button type="submit" class="btn btn-primary">Test Email</button>
</div>
  </form>


</body>
</html>
