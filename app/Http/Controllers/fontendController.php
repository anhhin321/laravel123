<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App02;
use App\Demo02;
class fontendController extends Controller
{
    public function index()
    {
        $dulieu = App02::All();
        return view('fontend.master', compact('dulieu'));
    }
    public function getNews(request $req,$slug)
    {
        $data = App02::All()->where('slug',$slug)->first();
        $dulieu = App02::All();

        return view('fontend.views', compact('data','dulieu'));
    }
    public function getData()
    {
        // $gtln =Demo02::All()->max('id_customer');
        // $tong = Demo02::All()->sum('id_customer');
        $banghi = Demo02::select('id','name','unit_price','unit')->paginate(4);
        $data = Demo02::count();
        
        return view('test', compact('banghi','data'));
    }
}

