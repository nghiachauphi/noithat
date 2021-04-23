<?php

namespace App\Exports;

use App\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
class SanPhamExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	
        return SanPham::all();
    }
}
