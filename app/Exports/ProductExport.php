<?php

namespace App\Exports;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductExport implements WithHeadings, WithTitle, FromArray, ShouldAutoSize, WithStyles
{

    // public function collection()
    // {
    //     return Product::all();
    // }
    public function array(): array
    {
        return Product::getDataProduk();
    }
    public function headings(): array
    {
        return [
            'NO',
            'NAME',
            'BRANDS',
            'CATEGORIES',
            'PRICE',
            'STOK'
        ];
    }
    public function title(): string
    {
        return 'BARANG MASUK';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
