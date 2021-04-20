<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\NguoiDung;
use App\KhachHang;
use App\Domain;
use App\Hosting;
use App\Order;
use App\SanPham;
use Carbon\Carbon;
use Excel;
use App\Imports\DomainImport;
use App\Exports\DomainExport;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDanhSach()
    {
        $nguoidung = NguoiDung::all();
//       foreach ($nguoidung as $value){
//           $order = Order::where('nguoidung_id', $value->id)->get();
//          foreach ($order as $item){
//              $sp = SanPham::where('id',$item->sanpham_id)->get();
//              foreach ($sp as $a){
//                  dd($a->tensanpham);
//              }
//
//          }
//       }

//        dd($item->sanpham_id);


        return view('admin.khachhang.danhsach', compact('nguoidung','order'));
    }
}