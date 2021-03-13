<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';
    protected $keyType = 'string';
    protected $fillable = ['nguoidung_id', 'sanpham_id', 'status', 'soluong','discount','thanhtien','order_id','diachi','sdt','price'];
   
	public function nguoidung()
    {
        return $this->belongsTo(NguoiDung::class);
    }

    public function regisProducts()
    {
        return $this->hasMany(RegisProducts::class);
    }

    public function sanpham()
	{
		return $this->belongsTo(SanPham::class);
	}
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
	
}
