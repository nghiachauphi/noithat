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

    public function postSua(Request $request,$id)
    {
        dd(1232423);
//        $regisSP = RegisProducts::find($id);
//        if($regisSP->soluong < $request->soluong_update) {
//
//            $regisSP->soluong = $request->soluong_update;
//            $regisSP->save();
//            return redirect('/cart');
//        }
//        else
//            return back()->with('error', 'Số lượng mua vượt quá số lượng trong kho.');
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

        if($soluong < $product->soluong) {
            $regisSP = new RegisProducts();
            $regisSP->sanpham_id = $id_sp;
            $regisSP->nguoidung_id = auth()->user()->id;
            $regisSP->trongluong = $request->trongluong;
            $regisSP->chatlieu = $request->chatlieu;
            $regisSP->kichthuoc = $request->kichthuoc;
            $regisSP->soluong = $request->soluongmua;

            $regisSP->price = ($request->giatien) * $soluong;
            $regisSP->save();
            return redirect('/cart');

        }
        else
        return back()->with('error', 'Số lượng mua vượt quá số lượng trong kho.');

	}
//
//	public function getSua(Request $request,$id)
//    {
//        $userId = auth()->user()->id;
//        $total = RegisProducts::where('nguoidung_id', $userId)->sum('price');
//        $carts = RegisProducts::where('nguoidung_id', $userId)->latest()->get();
//        $regisSP = RegisProducts::find($id);
//        return view('layouts.cart.sua-giohang', compact('regisSP','carts'));
//    }


    public function postXoa(Request $request,$regis_id)
    {
//        $regis_id = $request->regis_id;
        $chitietsp = RegisProducts::find($regis_id);
        $chitietsp->delete();
        return redirect('/cart');
    }

}