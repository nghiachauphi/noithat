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

        $this->validate($request, [
            'hovaten' => 'required',
            'email' => 'required|email',
            'dienthoai' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'diachi'=>'required',
        ]);
//       	dd($thanhtien);
        $order = Order::create([
            'nguoidung_id' => auth()->user()->id,
            'hovaten' => $request->hovaten,
            'diachi' => $request->diachi,
            'email' => $request->email,
            'dienthoai' => $request->dienthoai,
            'ghichu' => $request->ghichu,
            'tongtien' => $thanhtien,
        ]);

       	foreach($carts as $item) {
			Bill::create([
	            'nguoidung_id' => auth()->user()->id,
	            'sanpham_id' => $item->sanpham_id,
	            'discount' => $code,
                'chatlieu' => $item->chatlieu,
                'trongluong' => $item->trongluong,
                'kichthuoc' => $item->kichthuoc,
	            'price' => $item->price,
	            'soluong' => $item->soluong,
	            'order_id' => $order->id,
	        ]);
	  	}

        foreach($carts as $item) {

            $soluongmua = $item->soluong;
            $sanpham = SanPham::find($item->sanpham_id);
            if($soluongmua < $sanpham->soluong)
            {
                $sanpham->soluong = ($sanpham->soluong) - $soluongmua;
                $sanpham->save();
            }
            else
            return back()->with('error', 'Số lượng mua vượt quá số lượng trong kho.');
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
