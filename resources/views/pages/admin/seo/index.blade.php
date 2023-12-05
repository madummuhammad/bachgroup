@extends('layouts.admin')

@section('title')
SEO
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
			<div class="card-header"><strong>SEO</strong></div>
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
				<form action="{{route('admin.seo.create')}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method("POST")
					<label for="" class="form-label">Site Title</label>				
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag indonesian-flag" src="{{url('indonesia.png')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="site_title" value="{{$item->site_title}}">
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="site_title_eng" value="{{$item_eng->site_title}}">
					</div>

					<label for="" class="form-label">Meta Keywords</label>				
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag indonesian-flag" src="{{url('indonesia.png')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="meta_keywords" value="{{$item->meta_keywords}}">
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="meta_keywords_eng" value="{{$item_eng->meta_keywords}}">
					</div>

					<label for="" class="form-label">Meta Description</label>				
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag indonesian-flag" src="{{url('indonesia.png')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="meta_description" value="{{$item->meta_description}}">
					</div>
					<div class="mb-3">
						<label class="form-label" for="exampleFormControlInput1">
							<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
						</label>
						<input class="form-control" id="exampleFormControlInput1" type="text" name="meta_description_eng" value="{{$item_eng->meta_description}}">
					</div>
					<label for="" class="form-label">Head Script</label>				
					<div class="mb-3">
						<textarea name="head_script" class="form-control" id="" cols="30" rows="10">{{$item->head_script}}</textarea>
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