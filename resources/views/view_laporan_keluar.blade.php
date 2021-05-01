@extends('adminlte::page')

@section('title', 'Laporan Keluar PAGE')

@section('content_header')
<h1 class="text-center text-bold">LAPORAN KELUAR</h1>
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
        <th>ACTION</th>
       </tr>
      </thead>
      <tbody>
       @php $no=1; @endphp
       @foreach($trans as $key)
       <tr>
        <td>{{$no++}}</td>
        <td>{{$key->name}}</td>
        <td>
         {{$key->pembeli}}
        </td>
        <td>{{$key->categories_id}}</td>
        <td>{{$key->brands_id}}</td>
        <td>{{$key->harga}}</td>
        <td>{{$key->stok}}</td>
        <td>{{$key->total}}</td>
        <td>
         <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" id="btn-edit-data" class="btn" data-toggle="modal" data-target="#editData" data-id="{{ $key->id }}" data-stok="{{$key->stok}}" data-categories_id="{{$key->categories_id}}" data-brands_id="{{$key->brands_id}}"><i class="fa fa-edit"></i></button>
          <button type="button" id="btn-delete-data" class="btn" data-toggle="modal" data-target="#deleteData" data-id="{{ $key->id }}" data-photo="{{ $key->photo }}" data-name="{{$key->name}}"><i class="fa fa-trash"></i></button>
         </div>
        </td>
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