@foreach($dulieu as $value)
<div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <div class="card-body">
              	<a href="{!! url('getNews',['slug'=>$value['slug']]) !!}"><img src="{!! asset('uploads/'.$value['anh'])!!}" alt="" width="100%"></a>
                <h5 class="card-title">{{$value['tieude']}}</h5>
                <p class="card-text">{{$value['tomtat']}}</p>
                <a href="#" class="readmore">Đọc thêm </a>
              </div>
            </div>
          </div>
@endforeach