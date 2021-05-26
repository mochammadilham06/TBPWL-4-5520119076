<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;
//use PhpOffice\PhpSpreadsheet\Calculation\Category;
use PDF;


use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $trans = Transaksi::all();
        return view('view_transaksi', compact('user', 'trans'));
    }

    public function add_transaction(Request $req)
    {
        $trans = new Transaksi;

        $trans->pembeli = $req->get('pembeli');
        $trans->stok = $req->get('stok');
        $trans->harga = $req->get('harga');
        $trans->total = $req->get('total');
        $trans->id_produk = $req->get('id_produk');


        $trans->save();

        $notification = array(
            'message' => 'Transaction Successfully',
            'alert' => 'success'
        );
        return redirect()->route('admin.transaksi')->with($notification);
    }
    public function update_transaction(Request $req)
    {
        $trans = Transaksi::find($req->get('id'));


        $trans->pembeli = $req->get('pembeli');
        $trans->stok = $req->get('stok');
        $trans->harga = $req->get('harga');
        $trans->total = $req->get('total');
        $trans->id_produk = $req->get('id_produk');

        $trans->save();

        $notification = array(
            'message' => 'Transaction Successfully',
            'alert' => 'success'
        );
        return redirect()->route('admin.transaksi')->with($notification);
    }
    public function getDataTransaksi($id)
    {
        $trans = Transaksi::find($id);
        $prodak = $trans->view_product->name;
        $brands_id = $trans->view_product->brands_id;
        $categories_id = $trans->view_product->categories_id;

        return response()->json(['data' => $trans, 'prodak' => $prodak, 'brands_id' => $brands_id, 'categories_id' => $categories_id]);
    }
    public function destroy(Request $req)
    {
        $trans = Transaksi::find($req->id);

        $trans->delete();

        $notification = array(
            'message' => 'Data Successfully Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.transaksi')->with($notification);
    }
    public function laporan_keluar()
    {
        $user = Auth::user();
        $trans = Transaksi::all();
        return view('view_laporan_keluar', compact('user', 'trans'));
    }
    public function print_produk()
    {
        $barang = Transaksi::all();

        $pdf = PDF::loadview('print_produk', ['barang' => $barang]);
        return $pdf->download('data_barang_masuk.pdf');
    }

    public function getDataProduct($id)
    {

        // dd($id);
        $prodak = Product::where('id', $id)->first();
        $kategori_id = $prodak->view_kategori->id;
        $brands_id = $prodak->view_merek->id;


        return response()->json(['kategori_id' => $kategori_id, 'brands_id' => $brands_id, 'prodak' => $prodak]);
    }
    public function print_transaksi()
    {
        $trans = Transaksi::all();

        $pdf = PDF::loadview('print_produk_keluar', ['trans' => $trans]);
        return $pdf->stream('data_barang_keluar.pdf');
    }

    public function export_transaksi()
    {
        return Excel::download(new TransaksiExport, 'barang_keluar.xlsx');
    }
}
