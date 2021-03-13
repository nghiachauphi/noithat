<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisProducts extends Model
{
	protected $table = 'regis_products';
	protected $keyType = 'string';
	protected $fillable = [
		'nguoidung_id','sanpham_id', 'soluong', 'price'
	];

	public function nguoiDung()
	{
		return $this->belongsTo(NguoiDung::class, 'nguoidung_id', 'id');
	}

	public function bill()
	{
		return $this->belongsTo(Bill::class);
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