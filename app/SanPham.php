<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
	protected $table = 'sanpham';
	protected $keyType = 'string';
	protected $fillable = [
	  'danhmuc_id',
	  'tensanpham',
	  'mota',
	  'hinhanh',
	  'giatien',
	  'trongluong',
	  'kichthuoc',
	  'chatlieu',
	  'soluong',
    ];
	
	public function danhmuc()
	{
		return $this->belongsTo('App\DanhMuc');
	}
	public function ChiTietSP()
	{
		return $this->hasMany('App\ChiTietSP');
	}
	public function regisProducts()
	{
		return $this->belongsTo('App\RegisProducts');
	}
	public function bill()
    {
        return $this->hasMany(Bill::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}