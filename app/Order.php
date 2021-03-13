<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $keyType = 'string';
    protected $fillable = ['nguoidung_id'];
   
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
    public function bill()
    {
        return $this->hasMany(Bill::class);
    }
	
}
