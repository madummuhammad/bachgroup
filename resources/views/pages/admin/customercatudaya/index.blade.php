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
            <div class="card-header"><strong>Pelanggan</strong></div>
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
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <button class="btn btn-primary mb-2"  type="button"  data-coreui-toggle="modal" data-coreui-target="#tambahCustomer">Tambah Pelanggan</button>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach($customers as $key => $customer)
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td><img style="width:100px" src="{{url('/')}}/{{$customer->image}}" alt=""></td>
                                    <td><button class="btn btn-success btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#editCustomer{{$customer->id}}">Edit 
                                    </button>
                                    <button class="btn btn-danger btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#hapusCustomer{{$customer->id}}">Hapus 
                                    </button>
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
<div class="modal fade" id="tambahCustomer" tabindex="-1" aria-labelledby="tambahCustomerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('customercatudaya.store')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahCustomerLabel">Tambah Pelanggan</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("POST")
                    @csrf   
                    <div class="mb-3">
                        <input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="image">
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

@foreach($customers as $key => $edit)
<div class="modal fade" id="editCustomer{{$edit->id}}" tabindex="-1" aria-labelledby="editCustomerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('customercatudaya.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerLabel">Edit Sertifikat</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("PATCH")
                    @csrf   
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12">
                                <img class="img-fluid" src="{{url('/')}}/{{$edit->image}}" alt="">
                            </div>
                        </div>
                        <input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="image">
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

<div class="modal fade" id="hapusCustomer{{$edit->id}}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('customercatudaya.destroy',$edit->id)}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Hapus Pelanggan</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("delete")
                    @csrf   
                    <p>Anda yakin akan menghapus pelanggan ini?</p>
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