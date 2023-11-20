@extends('layouts.admin')

@section('title')
Beranda
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
				@if ($errors->any())
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form action="{{route('admin.beranda.create')}}" method="POST" enctype="multipart/form-data">
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
					<!--  -->
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag indonesian-flag" src="{{url('indonesia.png')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="section_2_sub" value="{{$item->section_2_sub}}">
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="section_2_sub_eng" value="{{$item_eng->section_2_sub}}">
					</div>
					<div class="row mb-3">
						<div class="col-lg-4 col-12">
							<img class="img-fluid" src="{{url('/')}}/{{$item->section_2_image}}" alt="">
							<input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="section_2_image">
							<div class="d-flex justify-content-between align-items-center">
								<div class="col">Alt Text</div>
								<input type="text" class="form-control mt-2 col" name="section_2_alt_image" value="{{$item->section_2_alt_image}}">
							</div>
						</div>
						<div class="col-lg-8 col-12">
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('indonesia.png')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_2_title" value="{{$item->section_2_title}}">
							</div>
							<div class="mb-3">
								<label class="form-label" for="exampleFormControlInput1">
									<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
								</label>
								<input class="form-control" id="exampleFormControlInput1" type="text" name="section_2_title_eng" value="{{$item_eng->section_2_title}}">
							</div>
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
						</div>
					</div>
					<!--  -->
					<!--  Section 3 -->
					<div class="row mb-3">
						<div class="col-lg-4 col-12">
							<img class="img-fluid" src="{{url('/')}}/{{$item->section_3_image}}" alt="">
							<input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="section_3_image">
							<div class="d-flex justify-content-between align-items-center">
								<div class="col">Alt Text</div>
								<input type="text" class="form-control mt-2 col" name="section_3_alt_image" value="{{$item->section_3_alt_image}}">
							</div>
						</div>
						<div class="col-lg-8 col-12">
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
								<textarea name="section_3_description_eng" id="" cols="30" rows="10" class="summernote">{{$item_eng->section_3_description}}</textarea>
							</div>
						</div>
					</div>
					<!-- section 4 -->
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('indonesia.svg')}}" alt="">
						</label>
						<textarea name="section_4_sub" id="" cols="30" rows="10" class="summernote">{{$item->section_4_sub}}</textarea>
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<textarea name="section_4_sub_eng" id="" cols="30" rows="10" class="summernote">{{$item_eng->section_4_sub}}</textarea>
					</div>
					<div class="row">
						<div class="col-12">
							<h5>Titik Peta</h5>
						</div>
						<div class="col-12 col-lg-6">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label" for="staticEmail">Medan</label>
								<div class="col-sm-9">
									<input class="form-control" name="medan_pin" type="text" value="{{$item->medan_pin}}">
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label" for="staticEmail">Surabaya</label>
								<div class="col-sm-9">
									<input class="form-control" name="surabaya_pin" type="text" value="{{$item->surabaya_pin}}">
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label" for="staticEmail">Jakarta</label>
								<div class="col-sm-9">
									<input class="form-control" name="jakarta_pin" type="text" value="{{$item->jakarta_pin}}">
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label" for="staticEmail">Balikpapan</label>
								<div class="col-sm-9">
									<input class="form-control" name="balikpapan_pin" type="text" value="{{$item->balikpapan_pin}}">
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-end">
						<button class="btn btn-primary">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
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