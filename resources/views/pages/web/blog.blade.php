@extends('layouts.web')

@section('title')
Blog
@endsection
@section('container')
<style>
	.grid {
		display: flex;
		flex-wrap: wrap;
	}

	.grid-item {
		padding: 8px;
		width: calc(100% / 4);
		box-sizing: border-box; /* tambahkan ini untuk menghindari masalah padding */
	}

	h3 {
		font-size: 20px;
		color: black;
	}

	/* Perbaikan responsivitas menggunakan media queries */
	@media screen and (max-width: 768px) {
		.grid-item {
			width: calc(100% / 2);
		}
	}

	@media screen and (max-width: 480px) {
		.grid-item {
			width: 100%;
		}
	}
</style>

<!-- cover -->
<div class="w-full relative bg-blue-one pt-24">
	<div class="container max-w-7xl m-auto" style="padding-top: 24px; padding-bottom: 24px;">
		<div class="grid grid-cols-1 lg:grid-cols-2 py-16 lg:py-0 px-8">
			<div class="flex justify-center items-center">
				<h2 class="text-white font-extrabold text-2xl text-center pb-8 lg:pb-0">BLOG</h2>
			</div>
			<div>
			</div>
		</div>
	</div>
</div>

<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container lg:px-5 py-16 mx-auto px-8 w-full">
		<div class="grid">
			@foreach($item as $value)
			<a href="{{route('blog.web.show',$value->id)}}" class="grid-item">
				<img src="{{ url('/') }}/{{ $value->image }}" class="img-fluid" alt="{{ $value->alt_image }}">
				<h3 class="text-lg font-semibold mt-5">{{ $value->title }}</h3>
				<p>{{date("F j, Y", strtotime($value->created_at))}}</p>
			</a>
			@endforeach
		</div>
	</div>
</section>


@endsection