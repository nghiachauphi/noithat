<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
	protected $table = 'danhmuc';
	protected $keyType = 'string';
	
	protected $fillable = [
		'id', 'tendanhmuc'
	];
	
	public function SanPham()
	{
		return $this->hasMany('App\SanPham');
	}
}