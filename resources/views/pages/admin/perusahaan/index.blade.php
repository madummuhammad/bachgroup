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
				<form action="{{route('admin.perusahaan.create')}}" method="POST" enctype="multipart/form-data">
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
					<!--  Section 3 Sub-->
					<div class="row mb-3">
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="section_3_title" value="{{$item->section_3_title}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="section_3_title_eng" value="{{$item_eng->section_3_title}}" type="text">
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_3_sub_1_title" value="{{$item->section_3_sub_1_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_3_sub_1_title_eng" value="{{$item_eng->section_3_sub_1_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<textarea name="section_3_sub_1_description" id="" cols="30" rows="10" class="summernote">{{$item->section_3_sub_1_description}}</textarea>
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<textarea id="" cols="30" rows="10" class="summernote" name="section_3_sub_1_description_eng">{{$item_eng->section_3_sub_1_description}}</textarea>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_3_sub_2_title" value="{{$item->section_3_sub_2_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_3_sub_2_title_eng" value="{{$item_eng->section_3_sub_2_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<textarea name="section_3_sub_2_description" id="" cols="30" rows="10" class="summernote">{{$item->section_3_sub_2_description}}</textarea>
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<textarea id="" cols="30" rows="10" class="summernote" name="section_3_sub_2_description_eng">{{$item_eng->section_3_sub_2_description}}</textarea>
							</div>
						</div>

						<div class="col-lg-4 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_3_sub_3_title" value="{{$item->section_3_sub_3_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_3_sub_3_title_eng" value="{{$item_eng->section_3_sub_3_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<textarea name="section_3_sub_3_description" id="" cols="30" rows="10" class="summernote">{{$item->section_3_sub_3_description}}</textarea>
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<textarea id="" cols="30" rows="10" class="summernote" name="section_3_sub_3_description_eng">{{$item_eng->section_3_sub_3_description}}</textarea>
							</div>
						</div>
					</div>
					<!--  -->
					<!-- Section 4 -->
					<div class="row mb-3">
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="komisaris_title" value="{{$item->komisaris_title}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="komisaris_title_eng" value="{{$item_eng->komisaris_title}}" type="text">
							</div>
						</div>
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="structure_title" value="{{$item->structure_title}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="structure_title_eng" value="{{$item_eng->structure_title}}" type="text">
							</div>
						</div>
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="komisaris" value="{{$item->komisaris}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="komisaris_eng" value="{{$item_eng->komisaris}}" type="text">
							</div>
						</div>
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="direktur_utama" value="{{$item->direktur_utama}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="direktur_utama_eng" value="{{$item_eng->direktur_utama}}" type="text">
							</div>
						</div>
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="direktur_keuangan" value="{{$item->direktur_keuangan}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="direktur_keuangan_eng" value="{{$item_eng->direktur_keuangan}}" type="text">
							</div>
						</div>
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="direktur_hrga" value="{{$item->direktur_hrga}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="direktur_hrga_eng" value="{{$item_eng->direktur_hrga}}" type="text">
							</div>
						</div>
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="direktur_pengembangan_bisnis" value="{{$item->direktur_pengembangan_bisnis}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="direktur_pengembangan_bisnis_eng" value="{{$item_eng->direktur_pengembangan_bisnis}}" type="text">
							</div>
						</div>
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="section_4_title" value="{{$item->section_4_title}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="section_4_title_eng" value="{{$item_eng->section_4_title}}" type="text">
							</div>
						</div>
						<div class="col-lg-12">
							<button class="btn btn-primary mb-2" type="button"  data-coreui-toggle="modal" data-coreui-target="#tambahItem">Tambah Item</button>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Tahun</th>
										<th scope="col">Deskripsi</th>
										<th scope="col">Edit</th>
									</tr>
								</thead>
								<tbody>
									@php
									$no=1;
									@endphp
									@foreach($milestone as $key => $item_milestone)
									<tr>
										<th scope="row">{{$no++}}</th>
										<td>{{$item_milestone->year}}</td>
										<td>
											@php
											echo $item_milestone->description
											@endphp
											------------
											<br>
											@php
											echo $item_milestone->eng->description
											@endphp
										</td>
										<td>
											<button class="btn btn-success btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#editItem{{$item_milestone->id}}">Edit 
											</button>
											<button class="btn btn-danger btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#deleteItem{{$item_milestone->id}}">Hapus 
											</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<!-- End section 4 -->
					<!-- Section 5 -->
					<div class="row mb-3">
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="section_5_title" value="{{$item->section_5_title}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="section_5_title_eng" value="{{$item_eng->section_5_title}}" type="text">
							</div>
						</div>
						<div class="col-lg-12">
							<button class="btn btn-primary mb-2"  type="button"  data-coreui-toggle="modal" data-coreui-target="#tambahSertifikat">Tambah Sertifikat</button>
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
									@foreach($certificate as $key => $item_certificate)
									<tr>
										<th scope="row">{{$no++}}</th>
										<td><img style="width:100px" src="{{url('/')}}/{{$item_certificate->image}}" alt=""></td>
										<td>
											<button class="btn btn-success btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#editSertifikat{{$item_certificate->id}}">Edit 
											</button>

											<button class="btn btn-danger btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#deleteCertificate{{$item_certificate->id}}">Hapus 
											</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<!-- End section 5 -->

					<!-- Section 6 -->
					<div class="row mb-3">
						<div class="col-lg-12 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="section_6_title" value="{{$item->section_6_title}}" type="text">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" name="section_6_title_eng" value="{{$item_eng->section_6_title}}" type="text">
							</div>
						</div>
						<div class="col-lg-12">
							<button class="btn btn-primary mb-2"  type="button"  data-coreui-toggle="modal" data-coreui-target="#tambahPenghargaan">Tambah Penghargaan</button>
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
									@foreach($award as $key => $item_award)
									<tr>
										<th scope="row">{{$no++}}</th>
										<td><img style="width:100px" src="{{url('/')}}/{{$item_award->image}}" alt=""></td>
										<td>
											<button class="btn btn-success btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#editPenghargaan{{$item_award->id}}">Edit 
											</button>
											<button class="btn btn-danger btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#deletePenghargaan{{$item_award->id}}">Hapus 
											</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<!-- End section 6 -->
					<div class="d-flex justify-content-end">
						<button class="btn btn-primary">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="tambahItemLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.milestones.create')}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahItemLabel">Tambah Item</h5>
						<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						@method("POST")
						@csrf	
						<div class="mb-3">
							<input class="form-control" id="exampleFormControlInput1" type="text" maxlength="4" name="year" value="">
						</div>
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
	@foreach($milestone as $key => $item_milestone)
	<div class="modal fade" id="editItem{{$item_milestone->id}}" tabindex="-1" aria-labelledby="tambahItemLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.milestones.update',$item_milestone->id)}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahItemLabel">Edit Item</h5>
						<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						@method("POST")
						@csrf	
						<div class="mb-3">
							<input class="form-control" id="exampleFormControlInput1" type="text" maxlength="4" name="year" value="{{$item_milestone->year}}">
						</div>
						<div class="mb-3">
							<label class="form-label" for="exampleFormControlInput1">
								<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
							</label>
							<textarea name="description" id="" cols="30" rows="10" class="summernote">{{$item_milestone->description}}</textarea>
						</div>
						<div class="mb-3">
							<label class="form-label" for="exampleFormControlInput1">
								<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
							</label>
							<textarea id="" cols="30" rows="10" class="summernote" name="description_eng">{{$item_milestone->eng->description}}</textarea>
						</div>
						<div class="mb-3">
							<img class="img-fluid" src="{{url('/')}}/{{$item_milestone->image}}" alt="">
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

	<div class="modal fade" id="deleteItem{{$item_milestone->id}}" tabindex="-1" aria-labelledby="tambahItemLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.milestones.destroy',$item_milestone->id)}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahItemLabel">Hapus Item</h5>
						<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						@method("delete")
						@csrf	
						<p>Hapus item ini?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
						<button class="btn btn-danger">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endforeach


	<div class="modal fade" id="tambahSertifikat" tabindex="-1" aria-labelledby="tambahSertifikatLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.certificate.create')}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahSertifikatLabel">Tambah Sertifikat</h5>
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

	@foreach($certificate as $key => $item_certificate)
	<div class="modal fade" id="editSertifikat{{$item_certificate->id}}" tabindex="-1" aria-labelledby="editSertifikatLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.certificate.update',$item_certificate->id)}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="editSertifikatLabel">Edit Sertifikat</h5>
						<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						@method("POST")
						@csrf	
						<div class="mb-3">
							<div class="row">
								<div class="col-12">
									<img class="img-fluid" src="{{url('/')}}/{{$item_certificate->image}}" alt="">
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

	<div class="modal fade" id="deleteCertificate{{$item_certificate->id}}" tabindex="-1" aria-labelledby="tambahItemLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.certificate.destroy',$item_certificate->id)}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahItemLabel">Hapus Item</h5>
						<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						@method("delete")
						@csrf	
						<p>Hapus item ini?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
						<button class="btn btn-danger">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endforeach


	<div class="modal fade" id="tambahPenghargaan" tabindex="-1" aria-labelledby="tambahPenghargaanLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.award.create')}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahPenghargaanLabel">Tambah Penghargaan</h5>
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

	@foreach($award as $key => $item_award)
	<div class="modal fade" id="editPenghargaan{{$item_award->id}}" tabindex="-1" aria-labelledby="editPenghargaanLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.award.update',$item_award->id)}}" method="POST" enctype="multipart/form-data">
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
									<img class="img-fluid" src="{{url('/')}}/{{$item_award->image}}" alt="">
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

	<div class="modal fade" id="deletePenghargaan{{$item_award->id}}" tabindex="-1" aria-labelledby="tambahItemLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('admin.perusahaan.award.destroy',$item_award->id)}}" method="POST" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="tambahItemLabel">Hapus Item</h5>
						<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						@method("delete")
						@csrf	
						<p>Hapus item ini?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
						<button class="btn btn-danger">Hapus</button>
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