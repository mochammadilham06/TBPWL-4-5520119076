@extends('adminlte::page')

@section('title', 'Page Laporan Barang Keluar')

@section('content_header')
<h1 class="text-center text-bold">LAPORAN BARANG KELUAR</h1>
@stop
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">
     {{ __('Transaction Setting') }}

    </div>
    <div class="card-body">

     <a href="{{route('admin.print.transaksi')}}" target="_blank" class="btn btn-secondary mb-5"><i class="fa fa-print"></i>Print to PDF</a>
     <div class="btn-group mb-5" role="group" aria-label="Basis Example">
      <a href="{{route('admin.export.transaksi')}}" class="btn btn-info" target="_blank">Exports</a>
      <a href="" class="btn btn-warning" data-toggle="modal" data-target="#importDataModal">Import</a>
     </div>
     <div class="btn-group mb-5" role="group" aria-label="Basis Example">

     </div>
     <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
      <thead>
       <tr>
        <th>NO</th>
        <th>NAME</th>
        <th>BUYER</th>
        <th>CATEGORIES</th>
        <th>BRANDS</th>
        <th>PRICE</th>
        <th>AMOUNT</th>
        <th>TOTAL</th>

       </tr>
      </thead>
      <tbody>
       @php $no=1; @endphp
       @foreach($trans as $key)
       <tr>
        <td>{{$no++}}</td>
        <td>{{$key->view_product->name}}</td>
        <td>
         {{$key->pembeli}}
        </td>
        @php
        $categories_id = App\Models\Categories::where('id', $key->view_product->categories_id)->first();
        $brands_id = App\Models\Brands::where('id', $key->view_product->brands_id)->first();
        @endphp
        <td>{{$categories_id->name}}</td>
        <td>{{$brands_id->name}}</td>
        <td>{{$key->harga}}</td>
        <td>{{$key->stok}}</td>
        <td>{{$key->total}}</td>

       </tr>
       @endforeach
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>
</div>
@stop