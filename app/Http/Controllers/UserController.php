<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\NguoiDung;
use App\Order;
use App\Bill;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function info(){
        $userID = Auth()->user()->id;
        $user = Auth()->user();

        return view('layouts.info', compact('user'));
    }

    public function sanpham_damua(){
        $userID = Auth()->user()->id;
        $user = Auth()->user();
        $order = Order::where('nguoidung_id','=', $userID)->get();
//        dd($order);
//        $order_id = Order::where('id')->get();
        $bill = [];
        return view('layouts.sanpham-damua', compact('bill','user', 'order'));
    }


    public function editInfo(Request $request, $id){
        $info = NguoiDung::find($id);
        if($request->hasFile('avatar')){

            $fImage = $request->file('avatar');
            $bientam = time().'_'.$fImage->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $fImage->move($destinationPath,$bientam);
            $info->hinhanh = $bientam;
        }
        else{
            $info->hinhanh = $request->hinhcu;
        }
        $info->save();

        $info->name = $request->name;
        $info->phone = $request->phone;
        $info->email = $request->email;
        $info->address = $request->address;
        $info->save();
        return redirect('/info');
    }

    public function getDeleteInfo($id){
        $user = NguoiDung::find($id);
        return view('layouts.delete-info',compact('user'));
    }

    public function deleteInfo(Request $request, $id){
        $user = NguoiDung::find($id);
        $user->delete();
        return redirect('/');
    }


    public function status_order(Request $request, $id){

        $status = Order::where('id', $id)->first();
        if($request->status=0)
            $status->status = $status->status=0;
        else
            $status->status = $status->status=1;
        $status->save();
        return redirect('/info');
    }

    public function cancelOrder(Request $request,$id){
        $cancel = Order::find($id);
        if($request->cancel)
            $cancel->status=4;
        $cancel->save();
        return redirect('/sanpham-damua');
    }
}
