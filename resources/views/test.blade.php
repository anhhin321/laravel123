<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2>Danh sách sản phẩm</h2>
	<table class="table">
		<thead>
			<th>id</th>
			<th>name</th>
			<th>unit_price</th>
			<th>unit</th>
		</thead>
		<tbody>
			@foreach($banghi as $value)
			<tr>
				<td>{{$value->id}}</td>
				<td>{{$value->name}}</td>
				<td>{{$value->unit_price}}</td>
				<td>{{$value->unit}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!!$banghi->links()!!}
	<h5>tổng số sản phẩm: {{$data+1}}</h5>
</body>
</html>		