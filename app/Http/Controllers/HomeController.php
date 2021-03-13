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
        return view("welcome", compact('sanpham'));
    }
}