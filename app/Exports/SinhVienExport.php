<?php

namespace App\Exports;

use App\SinhVien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SinhVienExport implements FromCollection, WithHeadings
{
	public function headings(): array
	{
		return [
			'Mã sinh viên',
			'Mã lớp',
			'Họ lót',
			'Tên',
			'Ngày sinh',
			'Điện thoại',
			'Email',
			'Ghi chú',
		];
	}
	
	public function collection()
	{
		return SinhVien::all('id', 'lop_id', 'holot', 'ten', 'ngaysinh', 'dienthoai', 'email', 'ghichu');
	}
}