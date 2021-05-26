<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'brands_id' => $row[1],
            'categories_id' => $row[2],
            'harga' => $row[3],
            'stok' => $row[4],
        ]);
    }
}
