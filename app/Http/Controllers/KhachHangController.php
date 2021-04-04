<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\NguoiDung;

class KhachHangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function info(){
        $userID = Auth()->user()->id;
        $user = Auth()->user();
        $bill = Order::where('nguoidung_id','=', $userID)->first()->id;
        return view('layouts.info', compact('bill','user'));
    }
}
