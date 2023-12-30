@extends('layouts.admin')

@section('title')
Blog
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
			<div class="card-header"><strong>Blog</strong></div>
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
						<a class="btn btn-primary mb-2" href="{{route('blog.create')}}">Tambah Blog</a>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Image</th>
									<th scope="col">Judul</th>
									<th scope="col">Edit</th>
								</tr>
							</thead>
							<tbody>
								@foreach($item as $key => $value)
								<tr>
									<td>{{$key+1}}</td>
									<td>
										<img src="{{url('/')}}/{{$value->image}}" height="100" alt="">
									</td>
									<td>
										<label class="form-label" for="exampleFormControlInput1">
											<img class="img-fluid flag indonesian-flag" src="{{url('indonesia.png')}}" alt="">
										</label>
										{{$value->title}}
										<hr>
										<label class="form-label" for="exampleFormControlInput1">
											<img class="img-fluid flag " src="{{url('england.svg')}}" alt="">
										</label>
										{{$value->eng->title}}
									</td>
									<td>
										<a href="{{route('blog.edit',$value->id)}}" class="btn btn-success btn-sm" type="button">Edit 
										</a>
										<button class="btn btn-danger btn-sm" type="button" data-coreui-toggle="modal" data-coreui-target="#hapusBlog{{$value->id}}">Hapus 
										</button>
										<div class="modal fade" id="hapusBlog{{$value->id}}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<form action="{{route('blog.destroy',$value->id)}}" method="POST" enctype="multipart/form-data">
														<div class="modal-header">
															<h5 class="modal-title" id="editUserLabel">Hapus Blog</h5>
															<button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															@method("delete")
															@csrf   
															<p>Anda yakin akan menghapus blog ini?</p>
														</div>
														<div class="modal-footer">
															<button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
															<button class="btn btn-primary">Hapus</button>
														</div>
													</form>
												</div>
											</div>
										</div>
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