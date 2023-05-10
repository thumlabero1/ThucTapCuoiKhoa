<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SanPhamExport implements FromCollection, WithHeadings, WithMapping
{
    public function headings(): array
    {
        return [
            'tên sản phẩm',
            'mô tả',
            'nội dung',
            'hình ảnh',
            'danh mục sản phẩm',
            'giá',
            'giá giảm',
            'hiển thị',
            'slug'
        ];
    }
    public function map($row): array
    {
        return [
            $row->name,
            $row->description,
            $row->content,
            $row->thumb,
            $row->menu_id,
            $row->price,
            $row->price_sale,
            $row->active,
            $row->slug
        ];
    }
    public function collection()
    {
        return Product::all();
    }
}
