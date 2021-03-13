<?php

namespace App\Http\Controllers;
use App\DanhMuc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DanhMucController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	// Danh sách
	public function getDanhSach()
	{
		$danhmuc = DanhMuc::all();
		return view('danhmuc.danhsach', compact('danhmuc'));
	}
	
	// Form thêm
	public function getThem()
	{
		return view('danhmuc.them');
	}
	
	// Xử lý thêm
	public function postThem(Request $request)
	{
		$request->validate([
			'tendanhmuc' => 'required|max:50',
		]);
		
		$danhmuc = new DanhMuc();
		$danhmuc->tendanhmuc = $request->tendanhmuc;
		$danhmuc->created_at = Carbon::now();
		$danhmuc->updated_at  = Carbon::now();
		$danhmuc->save();
		
		return redirect('/danhmuc');
	}
	
	// Form sửa
	public function getSua($id)
	{
		$danhmuc = DanhMuc::find($id);
		return view('danhmuc.sua', compact('danhmuc'));
	}
	
	// Xử lý sửa
	public function postSua(Request $request, $id)
	{
		$request->validate([
			'tendanhmuc' => 'required|max:50',
		]);
		
		$danhmuc = DanhMuc::find($id);
		$danhmuc->tendanhmuc = $request->tendanhmuc;
		$danhmuc->updated_at  = Carbon::now();
		$danhmuc->save();
		
		return redirect('/danhmuc');
	}
	
	// Xác nhận xóa
	public function getXoa($id)
	{
		$danhmuc = DanhMuc::find($id);
		return view('danhmuc.xoa', compact('danhmuc'));
	}
	
	// Xử lý xóa
	public function postXoa(Request $request, $id)
	{
		$danhmuc = DanhMuc::find($id);
		$danhmuc->delete();
		
		return redirect('/danhmuc');
	}
}
