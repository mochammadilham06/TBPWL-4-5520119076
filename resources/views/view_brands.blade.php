@extends('adminlte::page')

@section('title', 'BrandS')

@section('content_header')
<h1 class="text-center text-bold">MEREK</h1>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-bold">
                    {{ __('KELOLA MEREK') }}

                </div>
                <div class="card-body">
                    <button class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modalTambahData"><i class="fa fa-plus"></i> Add Data</button>
                    <a href="{{route('admin.print.books')}}" target="_blank" class="btn btn-secondary mb-5"><i class="fa fa-print"></i>Print to PDF</a>
                    <div class="btn-group mb-5" role="group" aria-label="Basis Example">
                        <a href="{{route('admin.book.export')}}" class="btn btn-info" target="_blank">Exports</a>
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#importDataModal">Import</a>
                    </div>
                    <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA BRAND</th>
                                <th>KETERANGAN</th>
                                <th>ACTION</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($merek as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$key->name}}</td>
                                <td>{{$key->description}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-brands" class="btn" data-toggle="modal" data-target="#modalEditData" data-id="{{ $key->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" id="btn-delete-brands" class="btn" data-toggle="modal" data-target="#deleteBukuModal" data-id="{{ $key->id }}"><i class="fa fa-trash"></i></button>
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


<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Brands</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.brand.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Brands</label>
                        <input type="text" class="form-control" name="name" id="name" required />
                    </div>
                    <div class="form-group">
                        <label for="description">Keterangan</label>
                        <input type="text" class="form-control" name="description" id="description" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->




<!-- Modal Edit Data -->
<div class="modal fade" id="modalEditData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Brands</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.brand.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="edit-name">Brands</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required />
                    </div>
                    <div class="form-group">
                        <label for="edit-description">Keterangan</label>
                        <input type="text" class="form-control" name="description" id="edit-description" required />
                    </div>



                    <div class="modal-footer">
                        <input type="hidden" name="id" id="edit-id" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->

<!-- Modal Hapus Data -->
<div class="modal fade" id="deleteBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data <strong class="font-italic">{{$key->name}}</strong>?
                <form method="post" action="{{ route('admin.brand.delete') }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Data -->
@stop


@section('js')

<script>
    $(function() {
        $("#datepicker").datepicker({
            format: "yyyy", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years"
        });

        $(document).on('click', "#btn-delete-brands", function() {
            let id = $(this).data('id');
            $('$delete-id').val(id);

        });

        $(document).on('click', '#btn-edit-brands', function() {
            let id = $(this).data('id');

            $.ajax({
                type: "get",
                url: baseurl + '/admin/ajaxadmin/dataBrands/' + id,
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#edit-name').val(res.name);
                    $('#edit-description').val(res.description);
                    $('#edit-id').val(res.id);
                },
            });
        });

    });
</script>
@stop