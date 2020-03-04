<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Demo1;
use App\App02;
use App\User; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = User::All();
        return view('admin.home', compact('data'));
    }
    // public function admin()
    // {
    //     $data = Demo1::All();
    //     return view('home', compact('data'));
    // }
    public function addNews()
    {
        return view('admin.add');
    }
    public function addAction(Request $request)
    {
        $new = new App02;
        $file = $request->file('img');
        $new->tieude = $request->tieude;
        $new->slug = $request->slug;
        $new->tomtat = $request->tomtat;
        $new->noidung = $request->noidung;
        if (strlen($file) > 0 ) {
            $file_name = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('uploads/');
            $file->move($destinationPath,$file_name);
            $new->anh    = $file_name;
        }
        $new->save();
        // alert('thêm bài viết thành công');
        return redirect()->route('list-news');
    }
    public function addUser(Request $request)
    {
        $new = new User;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = Hash::make($request->password);
        
        $new->save();
        return redirect()->route('home');
    }
    public function deleteUser(Request $request)
    {
        $delete = User::find($request->id);
        $delete->delete();
        return response()->json();
    }
    public function getInfo(Request $request)
    {
        $data = User::find($request->id);
        return response()->json($data);
    }
    public function saveUser(Request $request)
    {
        $upus = User::find ($request->id);
        //$upus->name = $request->name;
        $upus->email = $request->email;
        $upus->save();
        return response()->json($upus);
    }
    public function listNews()
    {
        $data = App02::All();
        return view('admin.listnews', compact('data'));
    }
    public function getPost(Request $request, $id)
    {
        $data = App02::findorFail($id)->toArray();
        return view('admin.update', compact('data'));
        // return response()->json($data);
    }
    public function savePost(request $request)
    {
        $post = App02::find($request->id);
        $file = $request->file('img');
        $post->tieude = $request->tieude;
        $post->tomtat = $request->tomtat;
        $post->slug = $request->slug;
        $post->noidung = $request->noidung;
        if (strlen($file) > 0 ) {
            $fImagesCurrent  = $request->fImageCurrent;
            if (file_exists(public_path().'/uploads/'.$fImagesCurrent)) {
               file::delete(public_path().'/uploads/'.$fImagesCurrent);
              // unlink(public_path().'/uploads/images/'.$posts_id->images);
            }
            $file_name = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('uploads/images/');
            $file->move($destinationPath,$file_name);
            $post->images    = $file_name;
        }
        $post->save();
        return response()->json($post);

    }
}

