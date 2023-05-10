<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SanPhamImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'name' => $row['ten_san_pham'],
            'description' => $row['mo_ta'],
            'content' => $row['noi_dung'],
            'thumb' => $row['hinh_anh'],
            'content' => $row['noi_dung'],
            'menu_id' => $row['danh_muc_san_pham'],
            'price' => $row['gia'],
            'price_sale' => $row['gia_giam'],
            'active' => $row['hien_thi'],
            'slug' => $row['slug'],
        ]);
    }
}
