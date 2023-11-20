@extends('layouts.admin')

@section('title')
{{$page->name}}
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
			<div class="card-header"><strong>{{$page->name}}</strong></div>
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
				<form action="{{route('admin.telecommunication_contractor.create')}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method("POST")					
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag indonesian-flag" src="{{url('indonesia.png')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="title" value="{{$item->title}}">
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="title_eng" value="{{$item_eng->title}}">
					</div>
					<div class="row mb-3">
						<div class="col-12">

							<h5>Header Banner</h5>
						</div>
						<div class="col-lg-4 col-12">
							<img class="img-fluid" src="{{url('/')}}/{{$item->header_image}}" alt="">
							<input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="header_image">
						</div>
						<div class="col-lg-8 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="header_tagline" value="{{$item->header_tagline}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="header_tagline_eng" value="{{$item_eng->header_tagline}}">
							</div>
						</div>
					</div>
					<!-- section 2 -->
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
						</label>
						<textarea name="section_2_description" id="" cols="30" rows="10" class="summernote">{{$item->section_2_description}}</textarea>
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<textarea id="" cols="30" rows="10" class="summernote" name="section_2_description_eng">{{$item_eng->section_2_description}}</textarea>
					</div>
					<!--  -->

					<!-- Section 2 Sub -->
					<div class="row mb-3">
						<div class="col-lg-6 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_2_sub_1_title" value="{{$item->section_2_sub_1_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_2_sub_1_title_eng" value="{{$item_eng->section_2_sub_1_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<textarea name="section_2_sub_1_description" id="" cols="30" rows="10" class="summernote">{{$item->section_2_sub_1_description}}</textarea>
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<textarea id="" cols="30" rows="10" class="summernote" name="section_2_sub_1_description_eng">{{$item_eng->section_2_sub_1_description}}</textarea>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_2_sub_2_title" value="{{$item->section_2_sub_2_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_2_sub_2_title_eng" value="{{$item_eng->section_2_sub_2_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<textarea name="section_2_sub_2_description" id="" cols="30" rows="10" class="summernote">{{$item->section_2_sub_2_description}}</textarea>
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<textarea id="" cols="30" rows="10" class="summernote" name="section_2_sub_2_description_eng">{{$item_eng->section_2_sub_2_description}}</textarea>
							</div>
						</div>
					</div>
					<!--  -->

					<!-- Section 3 -->
					<div class="row mb-3">
						<div class="col-lg-4 col-12">
							<img class="img-fluid" src="{{url('/')}}/{{$item->section_3_image}}" alt="">
							<input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="section_3_image">
						</div>
						<div class="col-lg-8 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_3_title" value="{{$item->section_3_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_3_title_eng" value="{{$item_eng->section_3_title}}">
							</div>
						</div>
					</div>
					<!-- section 2 -->
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
						</label>
						<textarea name="section_3_description" id="" cols="30" rows="10" class="summernote">{{$item->section_3_description}}</textarea>
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<textarea id="" cols="30" rows="10" class="summernote" name="section_3_description_eng">{{$item_eng->section_3_description}}</textarea>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<button class="btn btn-primary mb-2" type="button"  data-coreui-toggle="modal" data-coreui-target="#tambahFoto">Tambah Foto</button>
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
									@foreach($image as $key => $item_image)
									<tr>
										<th scope="row">{{$no++}}</th>
										<td><img style="width:100px" src="{{url('/')}}/{{$item_image->image}}" alt=""></td>
										<td><button class="btn btn-success btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#editImage{{$item_image->id}}">Edit 
										</button></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<!--  -->
					<!-- End section 3 -->
					<div class="d-flex justify-content-end">
						<button class="btn btn-primary">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="tambahFoto" tabindex="-1" aria-labelledby="tambahFotoLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.telecommunication_contractor.image.create')}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahFotoLabel">Tambah Foto</h5>
						<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						@method("POST")
						@csrf	
						<div class="mb-3">
							<!-- <img class="img-fluid" src="{{url('/')}}/{{$item->header_image}}" alt=""> -->
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

	@foreach($image as $key => $item_image)
	<div class="modal fade" id="editImage{{$item_image->id}}" tabindex="-1" aria-labelledby="editPenghargaanLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.telecommunication_contractor.image.update',$item_image->id)}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="editPenghargaanLabel">Edit Penghargaan</h5>
						<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						@method("POST")
						@csrf	
						<div class="mb-3">
							<div class="row">
								<div class="col-12">
									<img class="img-fluid" src="{{url('/')}}/{{$item_image->image}}" alt="">
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