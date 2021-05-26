<?php

namespace App\Exports;

use App\Models\Transaksi;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransaksiExport implements WithHeadings, WithTitle, FromArray, ShouldAutoSize, WithStyles
{
    public function array(): array
    {
        return Transaksi::getDataKeluar();
    }
    public function headings(): array
    {
        return [
            'NO',
            'NAME',
            'BUYER',
            'CATEGORIES',
            'BRANDS',
            'PRICE',
            'AMOUNT',
            'TOTAL'
        ];
    }
    public function title(): string
    {
        return 'BARANG KELUAR';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
