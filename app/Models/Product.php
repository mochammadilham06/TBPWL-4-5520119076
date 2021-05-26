<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function view_kategori()
    {
        return $this->belongsTo('App\Models\Categories', 'categories_id', 'id');
    }
    public function view_merek()
    {
        return $this->belongsTo('App\Models\Brands', 'brands_id', 'id');
    }

    public static function getDataProduk()
    {
        $barang = Product::all();

        $barang_filter = [];
        $no = 1;

        for ($i = 0; $i < $barang->count(); $i++) {
            $barang_filter[$i]['no'] = $no++;
            $barang_filter[$i]['name'] = $barang[$i]->name;
            $barang_filter[$i]['brands_id'] = $barang[$i]->view_merek->name;
            $barang_filter[$i]['categories_id'] = $barang[$i]->view_kategori->name;
            $barang_filter[$i]['harga'] = $barang[$i]->harga;
            $barang_filter[$i]['stok'] = $barang[$i]->stok;
        }

        return $barang_filter;
    }

    protected $fillable = [
        'name',
        'brands_id',
        'categories_id',
        'harga',
        'stok',
    ];
}
