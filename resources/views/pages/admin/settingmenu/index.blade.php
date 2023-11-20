@extends('layouts.admin')

@section('title')
Setting Menu
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
            <div class="card-header"><strong>Halaman</strong></div>
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
                        <button class="btn btn-primary mb-2"  type="button"  data-coreui-toggle="modal" data-coreui-target="#tambahUser">Tambah Halaman</button>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Publish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach($item as $pages)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$pages->name}}</td>
                                    <td>
                                        @if($pages->can_be_deleted==1)
                                        <button class="btn btn-success btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#editPage{{$pages->id}}">Edit 
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($pages->can_be_deleted==1)
                                        <button class="btn btn-danger btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#hapusPage{{$pages->id}}">Hapus 
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.setting.hidden',$pages->id)}}" method="POST">
                                            @csrf
                                            @if($pages->hidden==1)
                                            <button class="btn btn-secondary"></button>
                                            @else
                                            <button class="btn btn-primary"></button>
                                            @endif
                                        </form>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('admin.setting.store')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUserLabel">Tambah Halaman</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("POST")
                    @csrf   
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">
                            <img class="img-fluid flag indonesian-flag" src="{{url('indonesia.png')}}" alt="">
                        </label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="title" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">
                            <img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
                        </label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="title_eng" value="">
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">

                            <h5>Header Banner</h5>
                        </div>
                        <div class="col-lg-4 col-12">
                            <img class="img-fluid" src="" alt="">
                            <input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="header_image">
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">
                                    <img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
                                </label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="header_tagline" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">
                                    <img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
                                </label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="header_tagline_eng" value="">
                            </div>
                        </div>
                    </div>
                    <!-- section 2 -->
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">
                            <img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
                        </label>
                        <textarea name="description" id="" cols="30" rows="10" class="summernote"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">
                            <img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
                        </label>
                        <textarea id="" cols="30" rows="10" class="summernote" name="description_eng"></textarea>
                    </div>
                    <!--  -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($item as $edit)
@if($edit->can_be_deleted==1)
<div class="modal fade" id="editPage{{$edit->id}}" tabindex="-1" aria-labelledby="editPageLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('admin.setting.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPageLabel">Edit Halaman</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("POST")
                    @csrf   
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">
                            <img class="img-fluid flag indonesian-flag" src="{{url('indonesia.png')}}" alt="">
                        </label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="title" value="{{$edit->title}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">
                            <img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
                        </label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="title_eng" value="{{$edit->eng->title}}">
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">

                            <h5>Header Banner</h5>
                        </div>
                        <div class="col-lg-4 col-12">
                            <img class="img-fluid" src="{{url('/')}}/{{$edit->new_page->header_image}}" alt="">
                            <input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="header_image">
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">
                                    <img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
                                </label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="header_tagline" value="{{$edit->new_page->header_tagline}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">
                                    <img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
                                </label>
                                <input class="form-control" id="exampleFormControlInput1" type="text" name="header_tagline_eng" value="{{$edit->new_page_eng->header_tagline}}">
                            </div>
                        </div>
                    </div>
                    <!-- section 2 -->
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">
                            <img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
                        </label>
                        <textarea name="description" id="" cols="30" rows="10" class="summernote">{{$edit->new_page->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlInput1">
                            <img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
                        </label>
                        <textarea id="" cols="30" rows="10" class="summernote" name="description_eng">{{$edit->new_page_eng->description}}</textarea>
                    </div>
                    <!--  -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusPage{{$edit->id}}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.setting.destroy',$edit->id)}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Hapus Halaman</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @method("delete")
                    @csrf   
                    <p>Anda yakin akan menghapus halaman ini?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
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