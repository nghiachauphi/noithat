<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietSP extends Model
{
    protected $table = 'chitietsp';
	protected $keyType = 'string';
	
	protected $fillable = [
		'sanpham_id', 'manhinh', 'os', 'camera_sau', 'camera_truoc', 'cpu', 'ram', 'bonhotrong', 'thenho', 'sim', 'pin', 'pk_sac', 'pk_tainghe',
	];
	public function SanPham()
	{
		return $this->belongsTo('App\SanPham');
	}
}