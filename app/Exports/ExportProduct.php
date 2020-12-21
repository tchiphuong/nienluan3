<?php

namespace App\Exports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportProduct implements FromCollection,WithHeadings,WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return product::all();
    }

    public function headings(): array {
        return [
            'Mã sản phẩm',
            'Tên sản phẩm',
            'Giá',
            'Giảm giá (%)',
            'Size',
            'Màu',
            'Số lượng',
            'Mô tả',
            'Nội dung'
        ];
    }
    public function map($product): array {
        return [
            $product->product_id,
            $product->product_name,
            number_format($product->product_price)." đ",
            $product->product_discount,
            $product->product_size,
            $product->product_color,
            $product->product_quantity,
            $product->product_desc,
            $product->product_content
//            $product->created_at,
//            $product->updated_at
        ];
    }
}
