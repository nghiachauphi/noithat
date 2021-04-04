<?php

namespace App\Http\Controllers;
use App\DanhMuc;
use App\RegisProducts;
use App\SanPham;
use Carbon\Carbon;
use App\ChiTietSP;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
	
	// Danh sách
	public function getDanhSach()
	{
		$danhmuc = DanhMuc::all();
		$sanpham = SanPham::all();
		return view('sanpham.danhsach', compact('sanpham','danhmuc'));
	}

    public function getDanhSachAdmin()
    {
        $danhmuc = DanhMuc::all();
        $sanpham = SanPham::all();
        return view('admin.sanpham.danhsach', compact('sanpham','danhmuc'));
    }
	
	// Form thêm
	public function getThem()
	{
		$danhmuc = DanhMuc::all();
		return view('admin.sanpham.them', compact('danhmuc'));
	}

	public function search(Request $req)
	{
		$chitietsp = ChiTietSP::all();
		$sanpham = SanPham::where('tensanpham', 'LIKE', "%$req->searchString%")->get();
		$danhmuc = DanhMuc::all();
		return view('search', compact('danhmuc','sanpham','chitietsp'));
	}
	
	// Xử lý thêm
	public function postThem(Request $request)
	{
		$request->validate([
			'danhmuc_id' => 'required',
			'tensanpham' => 'required',
			'mota',
			'hinhanh',
			'giatien',
		]);
		
		$sanpham = new SanPham();
		$sanpham->danhmuc_id = $request->danhmuc_id;
		$sanpham->tensanpham = $request->tensanpham;
		$sanpham->mota = $request->mota;

		if($request->hasFile('hinhanh')){

            $fImage = $request->file('hinhanh');
            $bientam = time().'_'.$fImage->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $fImage->move($destinationPath,$bientam);
        }
        $sanpham->hinhanh = $bientam;
		$sanpham->giatien = $request->giatien;
		$sanpham->giatien = $request->giatien;
		$sanpham->trongluong = $request->trongluong;
		$sanpham->kichthuoc = $request->kichthuoc;
		$sanpham->chatlieu = $request->chatlieu;
		$sanpham->soluong = $request->soluong;
		$sanpham->created_at = Carbon::now();
		$sanpham->updated_at  = Carbon::now();
		$sanpham->save();
		
		return redirect('/admin/sanpham');
	}
	
	// Form sửa
	public function getSua($id)
	{
		$danhmuc = DanhMuc::all();
		$sanpham = SanPham::find($id);
		$sp = SanPham::where('id', $id)->latest()->get();
		return view('admin.sanpham.sua', compact('sanpham','danhmuc','sp'));
		// dd($hangxe);
	}
	
	// Xử lý sửa
	public function postSua(Request $request, $id)
	{	
	

		$sanpham = SanPham::find($id);
		$sanpham->danhmuc_id = $request->danhmuc_id;
		$sanpham->tensanpham = $request->tensanpham;
		$sanpham->mota = $request->mota;
		$sanpham->giatien = $request->giatien;
        $sanpham->trongluong = $request->trongluong;
        $sanpham->kichthuoc = $request->kichthuoc;
        $sanpham->chatlieu = $request->chatlieu;
        $sanpham->soluong = $request->soluong;

		if($request->hasFile('hinhanh')){

            $fImage = $request->file('hinhanh');
            $bientam = time().'_'.$fImage->getClientOriginalName();
            $destinationPath = public_path('/upload');
            $fImage->move($destinationPath,$bientam);
            $sanpham->hinhanh = $bientam;
        }
        else{
        	$sanpham->hinhanh = $request->hinhcu;
        }

		$sanpham->updated_at  = Carbon::now();
		$sanpham->save();
		
		return redirect('/admin/sanpham');
	}
	
	// Xác nhận xóa
	public function getXoa($id)
	{
		$sanpham = SanPham::find($id);
		return view('admin.sanpham.xoa', compact('sanpham'));
	}
	
	// Xử lý xóa
	public function postXoa(Request $request, $id)
	{
		$sanpham = SanPham::find($id);
		$sanpham->delete();
		
		return redirect('/admin/sanpham');
	}

	// Nhập từ Excel
	public function postNhap(Request $request)
	{
		Excel::import(new SanPhamImport, $request->TapTinExcel);
		
		return redirect('/admin/sanpham');
	}
	
	// Xuất ra Excel
	public function getXuat()
	{
		return Excel::download(new SanPhamExport, 'ds_sanpham.xlsx');
	}

    public function chitietsp($id)
    {

//        $userId = auth()->user()->id;
//        $getND = RegisProducts::where('nguoidung_id', $userId)->latest()->get();
        $sanpham = SanPham::where('id', $id)->first();
        $regis_products = RegisProducts::where('sanpham_id', $id)->first();
        return view('layouts.chitietsp', compact('regis_products','sanpham'));
    }
}