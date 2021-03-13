<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\NguoiDung;
use App\SanPham;
use App\Order;
use App\RegisProducts;
use DB;

class BillController extends Controller
{
	public function list()
	{
		$user = auth()->user();
		
		if ($user->level == 1) {
			$bill = Order::latest()->get();
		} else {
			$bill = Order::where('nguoidung_id', auth()->user()->id)->latest()->get();
		}
		
		return view('bill.list', compact('user', 'bill'));
	}

	public function send(Request $request)
    {
        
		$userId = auth()->user()->id;
		$carts = RegisProducts::where('nguoidung_id', $userId)->latest()->get();
        $total = RegisProducts::where('nguoidung_id', $userId)->sum('price');
        $code = intval($request->code);
        if($code==0){
       		$thanhtien = $total;
        }
       	else{
       		$thanhtien = $total - $total * ($code/100);
       	}
        $order = Order::create([
            'nguoidung_id' => auth()->user()->id
        ]);
       	foreach($carts as $item) {
			Bill::create([
	            'nguoidung_id' => auth()->user()->id,
	            'sanpham_id' => $item->sanpham_id,
	            'discount' => $code,
	            'price' => $item->price,
	            'diachi' => $request->diachi,
	            'sdt' => $request->sdt,
	            'thanhtien' => $thanhtien,
	            'soluong' => $item->soluong,
	            'order_id' => $order->id
	        ]);
	  	}
	  		// dd($carts->price);
	   	RegisProducts::where('nguoidung_id', $userId)->delete();
		return redirect('/');
    }

    public function duyet($id, Request $request)
	{	
		$request->validate([
			'status',
		]);
		
		$order = Order::where('id', $id)->first();
		$order->status = $order->status=1;
		$order->save();
		return redirect('/bill');
	
	}

    // Xác nhận xóa
	public function getXoa($id)
	{
		$bill = Order::find($id);
		return view('bill.xoa', compact('bill'));
	}
	
	// Xử lý xóa
	public function postXoa(Request $request, $id)
	{
		$bill = Order::find($id);
		$bill->delete();
		
		return redirect('/bill');
	}
}
