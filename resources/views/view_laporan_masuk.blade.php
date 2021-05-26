@extends('adminlte::page')

@section('title', 'Laporan Masuk PAGE')

@section('content_header')
<h1 class="text-center text-bold">LAPORAN BARANG MASUK</h1>
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
      <a href="{{route('admin.export.produk')}}" class="btn btn-info" target="_blank">Exports</a>
      <a href="" class="btn btn-warning" data-toggle="modal" data-target="#importDataModal">Import</a>
     </div>

     <div class="btn-group mb-5" role="group" aria-label="Basis Example">

     </div>
     <table id="table_data" class="table table-borderer display nowrap" style="width:100%">
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


<div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <div class="modal-body">
    <form method="POST" action="{{ route('admin.import.produk') }}" enctype="multipart/form-data">
     @csrf
     <div class="form-group">
      <label for="cover">Upload File</label>
      <input type="file" class="form-control" name="file">
     </div>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Upload</button>
    </form>
   </div>
  </div>
 </div>
</div>

@stop