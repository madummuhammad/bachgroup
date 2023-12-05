@extends('layouts.admin')

@section('title')
User
@endsection
@section('container')
<style>
    .flag{
        border: 1px solid gray;
        border-radius: 2px;
        width: 20px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header"><strong>User</strong></div>
            <div class="card-body">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif               
                <!-- Section 5 -->
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <button class="btn btn-primary mb-2"  type="button"  data-coreui-toggle="modal" data-coreui-target="#tambahUser">Tambah User</button>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hak Akses</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach($item as $user)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->hak_akses}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#editUser{{$user->id}}">Edit 
                                        </button>
                                        @if(auth()->user()->email!==$user->email)
                                        <button class="btn btn-danger btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#hapusUser{{$user->id}}">Hapus 
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End section 5 -->
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUserLabel">Tambah User</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("POST")
                    @csrf   
                    <div class="mb-3">
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="name" value="" placeholder="Nama...">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" id="exampleFormControlInput1" type="email" name="email" value="" placeholder="Email...">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="password" value="" placeholder="Password...">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="hak_akses" aria-label="Default select example">
                            <option selected="" value="">Pilih hak akses</option>
                            @if(auth()->user()->hak_akses=='superadmin')
                            <option value="superadmin">Super Admin</option>
                            @endif
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($item as $item)
<div class="modal fade" id="editUser{{$item->id}}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('user.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("PATCH")
                    @csrf   
                    <div class="mb-3">
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="name" placeholder="Nama..." value="{{$item->name}}">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" id="exampleFormControlInput1" type="email" name="email" placeholder="Email..." value="{{$item->email}}">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="password" placeholder="Password...">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="hak_akses" aria-label="Default select example">
                            <option selected="" value="">Pilih hak akses</option>
                            @if(auth()->user()->hak_akses=='superadmin')
                            <option value="superadmin" @if($item->hak_akses=='superadmin') selected @endif>Super Admin</option>
                            @endif
                            <option value="admin" @if($item->hak_akses=='admin') selected @endif>Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusUser{{$item->id}}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('user.destroy',$item->id)}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Hapus User</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("delete")
                    @csrf   
                    <p>Anda yakin akan menghapus user ini?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
@push('addon-style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@push('addon-script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endpush