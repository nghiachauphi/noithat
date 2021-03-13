<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiscountCode;

class DiscountCodeController extends Controller
{
    public function discountCodeAddForm()
    {
        return view('discount_codes.add');
    }

    public function list(Request $request)
    {
        $code = DiscountCode::all();
        return view('discount_codes.list', compact('code'));
    }

    public function discountCodeAdd(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'unique:discount_codes,name'
            ],
            [
                'name.unique' => 'Mã giảm giá này đã tồn tại'
            ]
        );
        $inputs = $request->all();
        DiscountCode::create(
            $request->all()
        );

        return back()->with('success', 'Thêm thành công');
    }

    public function getXoa($id)
    {
        $code = DiscountCode::find($id);
        return view('discount_codes.xoa', compact('code'));
    }
    
    // Xử lý xóa
    public function postXoa(Request $request, $id)
    {
        $code = DiscountCode::find($id);
        $code->delete();
        
        return redirect('/discount');
    }
}
