<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
use Mail;
use App\Mail\demoSendmail;
use Auth;
// use Illuminate\Support\Facades\Auth;
class ExampleController extends Controller
{
    public function index()
    {
    	$data = Example::all();
    	return view('admin.ajax', compact('data'));
    }
    public function getInforById(Request $req)
    {
    	$data = Example::find($req->id); 
    	return response()->json($data);
    }
     public function editPost(request $request){
    $post = Example::find ($request->id);
    $post->name = $request->name;
    $post->price = $request->price;
    $post->ngay_nhap = $request->ngay_nhap;
    $post->expried = $request->expried;
    
    $post->save();
    return response()->json($post);
  }
  public function deletePost(request $req)
  {
  	$delete = Example::find($req->id);
  	$delete->delete();
  	return response()->json();
  }
  public function addAb(Request $request)
  {
  	$new = new Example;
  	$new->name = $request->name;
  	$new->price = $request->price;
  	$new->ngay_nhap = $request->ngay_nhap;
  	$new->expried = $request->expried;
  	$new->save();
  	return response()->json($new);
  }
  public function viewPost(Request $request)
  {
  	$data = Example::find($req->id);
  	return response()->json($data);
  }
  public function getTestMail()
  {
    return view('test01');
  }
  public function postTextMail(Request $request)
  {
    $nhan = $request->a;
    // $cd = $request->b;
    $tn = $request->mota1;
    // $cd = $request->b;
    // $data = ['hoten'=>'nka'];
    // Mail::send('blanks',$data, function ($msg){
    //   $msg->from('anhhin321@gmail.com','Anh Hin');
    //   $msg->to('no1tailieuonthi@gmail.com','trang vu')->subject('Gửi mail 4/445');
    // });
    Mail::to($nhan)->send(new demoSendmail($tn));
    return 'check mail xem có tin nhắn mới không,  hehe';
  }
  public function getcheck()
  {
    if(Auth::check())
      return 'đã đăng nhạp';
    else
      return 'chưa dang nhap';
  }

}
