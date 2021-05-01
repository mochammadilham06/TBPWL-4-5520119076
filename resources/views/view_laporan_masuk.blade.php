@extends('adminlte::page')

@section('title', 'Laporan Masuk PAGE')

@section('content_header')
<h1 class="text-center text-bold">LAPORAN MASUK</h1>
@stop
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">
     {{ __('Product Setting') }}

    </div>
    <div class="card-body">
     <a href="{{route('admin.print.produk')}}" target="_blank" class="btn btn-secondary mb-5"><i class="fa fa-print"></i>Print to PDF</a>

     <div class="btn-group mb-5" role="group" aria-label="Basis Example">

     </div>
     <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
      <thead>
       <tr>
        <th>NO</th>
        <th>PICTURE</th>
        <th>NAME</th>
        <th>CATEGORIES</th>
        <th>BRANDS</th>
        <th>PRICE</th>
        <th>STOCK</th>
       </tr>
      </thead>
      <tbody>
       @php $no=1; @endphp
       @foreach($barang as $key)
       <tr>
        <td>{{$no++}}</td>
        <td>
         @if($key->photo !== null)
         <img src="{{ asset('storage/photo_barang/'.$key->photo) }}" width="100px" />
         @else
         [Picture Not Found]
         @endif
        </td>
        <td>{{$key->name}}</td>
        <td>{{$key->view_kategori->name}}</td>
        <td>{{$key->view_merek->name}}</td>
        <td>{{$key->harga}}</td>
        <td>{{$key->stok}}</td>
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