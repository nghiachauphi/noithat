<?php

namespace App\Imports;

use App\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SanPhamImport implements ToModel
{
	public function model(array $row)
	{
		return new SanPham([
			'danhmuc_id' => $row[0],
			'tensanpham' => $row[1],
			'mota' => $row[2],
			'hinhanh' => $row[3],
			'giatien' => $row[4],
			'trongluong' => $row[5],
			'kichthuoc' => $row[6],
			'chatlieu' => $row[7],
			'soluong' => $row[8],
		]);
	}
	
//	public function headingRow(): int
//	{
//		return 1;
//	}
}