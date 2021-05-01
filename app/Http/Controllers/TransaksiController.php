<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;
class TransaksiController extends Controller
{
    public function index(){
        $user = Auth::user();
        $trans = Transaksi::all();
        return view('view_transaksi', compact('user', 'trans'));
    }
}
