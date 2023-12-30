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

	.grid-item{
		padding: 8px;
		width: calc(100%/4);
	}

	h3{
		font-size: 20px;
		color: black;
	}

	.image{
		width: 50%;
	}

	@media screen and (max-width: 768px) {
		.image {
			width: calc(100% / 2);
		}
	}

	@media screen and (max-width: 480px) {
		.image {
			width: 100%;
		}
	}
</style>
<!-- cover -->
<div class="w-full relative bg-blue-one pt-24">
	<div class="container max-w-7xl m-auto" style="padding-top: 24px; padding-bottom: 24px;">
		<div class="grid grid-cols-1 lg:grid-cols-2 py-16 lg:py-0 px-8">
			<div class="flex justify-center items-center">
				<h2 class="text-white font-extrabold text-2xl text-center pb-8 lg:pb-0">{{$item->title}}</h2>
			</div>
			<div>
			</div>
		</div>
	</div>
</div>

<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container lg:px-5 py-16 mx-auto px-8 w-full">
		<div class="grid" style="display: flex; justify-content: center; margin-bottom: 25px;">
			<img class="image" src="{{url('/')}}/{{$item->image}}" alt="{{$item->alt_image}}">
		</div>
		<div>
			@php echo $item->content @endphp
		</div>
	</div>
</section>


@endsection