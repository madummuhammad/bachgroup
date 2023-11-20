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
				<form action="{{route('admin.contact.create')}}" method="POST" enctype="multipart/form-data">
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
						<div class="col-lg-4 col-12">
							<img class="img-fluid" src="{{url('/')}}/{{$item->image}}" alt="">
							<input type="file" accept=".png,.jpg,.jpeg" class="form-control mt-2" name="image">
							<div class="d-flex justify-content-between align-items-center">
								<div class="col">Alt Text</div>
								<input type="text" class="form-control mt-2 col" name="alt_image" value="{{$item->alt_image}}">
							</div>
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
						<textarea name="description" id="" cols="30" rows="10" class="summernote">{{$item->description}}</textarea>
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<textarea id="" cols="30" rows="10" class="summernote" name="description_eng">{{$item_eng->description}}</textarea>
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