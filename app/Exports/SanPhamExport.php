<?php

namespace App\Exports;

use App\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SanPhamExport implements FromCollection, WithHeadings,WithMapping
{
	public function headings(): array
	{
		return [
		    'id',
			'Tên danh mục',
			'Tên sản phẩm',
			'Mô tả',
			'Hình ảnh',
			'Giá tiền',
			'Trọng lượng',
			'Kích thước',
			'Chất liệu',
			'Số lượng',
		];
	}

	public function  map($row): array
    {
        return [
          $row->id,
            $row->danhmuc_id,
            $row->tensanpham,
            $row->mota,
            $row->hinhanh,
            $row->giatien,
            $row->trongluong,
            $row->kichthuoc,
            $row->chatlieu,
            $row->soluong,


        ];
    }

    public function collection()
	{
		return SanPham::all();
	}
}