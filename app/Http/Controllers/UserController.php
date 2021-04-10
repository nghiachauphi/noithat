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
        $order = Order::where('nguoidung_id','=', $userID)->get();
//        dd($order);
//        $order_id = Order::where('id')->get();
        $bill = [];
        return view('layouts.info', compact('bill','user', 'order'));
    }

    public function editInfo(Request $request, $id){
        $info = NguoiDung::find($id);
        $info->name = $request->name;
        $info->phone = $request->phone;
        $info->email = $request->email;
        $info->address = $request->address;
        $info->save();
        return redirect('/info');
    }

    public function deleteInfo(Request $request, $id){
        $user = NguoiDung::find($id);
        $user->delete();
        return redirect('/');
    }

    public function upImage(Request $request, $id){
        $user = NguoiDung::find($id);
        if($request->hasFile('avatar')){

            $fImage = $request->file('avatar');
            $bientam = time().'_'.$fImage->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $fImage->move($destinationPath,$bientam);
            $user->hinhanh = $bientam;
        }
        else{
            $user->hinhanh = $request->hinhcu;
        }

        $user->save();
        return redirect('/info');
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
            $cancel->status=2;
        $cancel->save();
        return redirect('/info');
    }
}
