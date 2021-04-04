<?php

namespace App\Http\Controllers;
use App\DanhMuc;
use App\SanPham;
use App\ChiTietSP;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
	public function getHome()
	{
		$chitietsp = ChiTietSP::all();
		$sanpham = SanPham::all();
		$danhmuc = DanhMuc::all();

		return view('home', compact('danhmuc','sanpham','chitietsp'));
	}

    public function getWelcome()
    {
        $sanpham = SanPham::all();
        $danhmuc = DanhMuc::all();
        $ban = SanPham::where('danhmuc_id', 1)->get();
        $ghe = SanPham::where('danhmuc_id', 2)->get();
        $tu = SanPham::where('danhmuc_id', 3)->get();
        return view("welcome", compact('sanpham','danhmuc','ban','ghe', 'tu'));
    }
}