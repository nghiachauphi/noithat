<?php

namespace App\Imports;

use App\SinhVien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SinhVienImport implements ToModel, WithHeadingRow
{
	public function model(array $row)
	{
		return new SinhVien([
			'id' => $row['ma_sinh_vien'],
			'lop_id' => $row['ma_lop'],
			'holot' => $row['ho_lot'],
			'ten' => $row['ten'],
		]);
	}
	
	public function headingRow(): int
	{
		return 5;
	}
}