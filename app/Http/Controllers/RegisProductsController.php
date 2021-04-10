<?php

namespace App\Http\Controllers;

use App\RegisProducts;
use App\NguoiDung;
use App\SanPham;
use App\DiscountCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class RegisProductsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	//View
	public function list()
	{
		$discountCodes = DB::table('discount_codes')->where('expire', '>=', date('Y-m-d'))->get();
		$userId = auth()->user()->id;
        $total = RegisProducts::where('nguoidung_id', $userId)->sum('price');
        $carts = RegisProducts::where('nguoidung_id', $userId)->latest()->get();
		
		
		return view('layouts.cart.list',compact('total','discountCodes','carts'));
	}
	// Form thêm
	public function getThem($id_sp)
	{
		$userId = auth()->user()->id;
		$getND = RegisProducts::where('nguoidung_id', $userId)->latest()->get();
		$sanpham = SanPham::where('id', $id_sp)->first();
        $regis_products = RegisProducts::where('sanpham_id', $id_sp)->first();
        
		return view('layouts.addproducts', compact('regis_products','sanpham','getND'));
	}
	
	// Xử lý thêm
	public function postThem($id_sp,Request $request)
	{
		$userId = auth()->user()->id;
        $getND = RegisProducts::where('nguoidung_id', $userId)->latest()->get();

		$product = SanPham::where('id', '=', $id_sp)->first();
		if(!$product){
			//Sản phẩm không tồn tại
			return redirect('/');
		}
        $soluong = intval($request->input('soluongmua'));
		$regisSP = new RegisProducts();
		$regisSP->sanpham_id = $id_sp;
		$regisSP->nguoidung_id = auth()->user()->id;
        $regisSP->trongluong = $request->trongluong;
        $regisSP->chatlieu = $request->chatlieu;
        $regisSP->kichthuoc = $request->kichthuoc;
        $regisSP->soluong = $request->soluongmua;

        $regisSP->price = ($request->giatien)*$soluong;
		$regisSP->save();
		
		return redirect('/cart');
	}



}