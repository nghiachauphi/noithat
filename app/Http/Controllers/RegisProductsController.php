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
        //Gom 2 table db
		// $carts = RegisProducts::selectRaw('regis_products.*, sanpham.tensanpham')
		// ->leftJoin('sanpham', function($join) {
		//     $join->on('regis_products.sanpham_id', '=', 'sanpham.id');

		// })->where('nguoidung_id', $userId)->latest()->get();
		
		
		return view('cart.list',compact('total','discountCodes','carts'));
	}
	// Form thêm
	public function getThem($id_sp)
	{
		$userId = auth()->user()->id;
		$getND = RegisProducts::where('nguoidung_id', $userId)->latest()->get();
		$sanpham = SanPham::where('id', $id_sp)->first();
        $regis_products = RegisProducts::where('sanpham_id', $id_sp)->first();
        
		return view('sanpham.addproducts', compact('regis_products','sanpham','getND'));
	}
	
	// Xử lý thêm
	public function postThem($id_sp,Request $request)
	{
		$userId = auth()->user()->id;
        $getND = RegisProducts::where('nguoidung_id', $userId)->latest()->get();
		$request->validate([
			'soluong' => 'required',
			'price' => 'min:0',
		]);
		
		$product = SanPham::where('id', '=', $id_sp)->first();
		if(!$product){
			//Sản phẩm không tồn tại
			return redirect('/');
		}
		$so_luong = intval($request->input('soluong'));
		$regisSP = new RegisProducts();
		$regisSP->sanpham_id = $id_sp;
		$regisSP->soluong = $so_luong;
		$regisSP->price = ($so_luong * $product->giatien);
		$regisSP->nguoidung_id = auth()->user()->id;
		$regisSP->save();
		
		return redirect('/');
	}



}