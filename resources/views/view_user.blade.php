@extends('adminlte::page')

@section('title', 'BrandS')

@section('content_header')
<h1 class="text-center text-bold">USER</h1>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('User Setting') }}

                </div>
                <div class="card-body">
                    <button class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modalTambahUser"><i class="fa fa-plus"></i> Tambah User</button>
                  
                    <div class="btn-group mb-5" role="group" aria-label="Basis Example">
                        
                    </div>
                    <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>FOTO</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>PASSWORD</th>
                                <th>ROLES</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($users as $pengguna)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    @if($pengguna->photo !== null)
                                    <img src="{{ asset('storage/photo_user/'.$pengguna->photo) }}" width="100px" />
                                    @else
                                    [Picture Not Found]
                                    @endif
                                </td>
                                <td>{{$pengguna->name}}</td>
                                <td>{{$pengguna->email}}</td>
                                <td>{{$pengguna->password}}</td>
                                <td>{{$pengguna->roles_id}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-buku" class="btn" data-toggle="modal" data-target="#editBukuModal" data-id="{{ $pengguna->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" id="btn-delete-buku" class="btn" data-toggle="modal" data-target="#deleteBukuModal" data-id="{{ $pengguna->id }}" data-cover="{{ $pengguna->cover }}"><i class="fa fa-trash"></i></button>
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

<div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.user.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input min="1" type="password" class="form-control" name="password" id="password" required />
                    </div>
                    <div class="form-group">
                        <label for="roles">Role</label>
                        <input type="text" class="form-control" name="roles" id="roles" required />
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <input type="file" class="form-control" name="photo" id="photo" />
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



@stop