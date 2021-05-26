<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Print</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>
 <h1 class="text-center">FEDOR STORAGE</h1>
 <h3 class="text-center">LAPORAN BARANG KELUAR</h3>
 <p class="text-center">Data of Product in 2021</p>
 <br>
 <table id="table-data" class="table table-bordered">
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
</body>

</html>