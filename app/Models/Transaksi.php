<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public function view_product()
    {
        return $this->belongsTo('App\Models\Product', 'id_produk', 'id');
    }
    public function view_category()
    {
        return $this->belongsTo('App\Models\Categories', 'categories_id', 'id');
    }

    public static function getDataKeluar()
    {
        $keluar = Transaksi::all();

        $trans = [];
        $no = 1;

        for ($i = 0; $i < $keluar->count(); $i++) {
            $trans[$i]['no'] = $no++;
            $trans[$i]['pembeli'] = $trans[$i]->pembeli;
            $trans[$i]['harga'] = $trans[$i]->harga;
            $trans[$i]['stok'] = $trans[$i]->stok;
            $trans[$i]['total'] = $trans[$i]->total;
            $trans[$i]['id_produk'] = $trans[$i]->id_produk;
        }

        return $trans;
    }
}
