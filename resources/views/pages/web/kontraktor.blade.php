@extends('layouts.web')

@section('title')
{{$item->title}}
@endsection
@section('container')
<div class="w-full relative bg-blue-one pt-24">
	<div class="container max-w-7xl m-auto">
		<div class="grid grid-cols-1 lg:grid-cols-2 py-16 lg:py-0 px-8">
			<div class="flex justify-center items-center">
				<h2 class="text-white font-extrabold text-2xl text-center pb-8 lg:pb-0">
					{{$item->header_tagline}} </h2>
				</div>
				<div>
					<img src="{{url('/')}}/{{$item->header_image}}" alt="cover">
				</div>
			</div>
		</div>
	</div>
	<section class="text-grey-2 container max-w-7xl m-auto">
		<div class="container lg:px-5 py-16 mx-auto px-8 w-full">
			@php echo $item->section_2_description @endphp
			<div class="flex flex-wrap pt-8 mx-auto">
				<div class="md:w-1/2 md:pr-12  md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-grey-3">
					<h3 class="lg:text-2xl lg:leading-10 text-blue-one text-base text-center font-extrabold mb-8 ">
						{{$item->section_2_sub_1_title}}
					</h3>
					@php echo $item->section_2_sub_1_description @endphp
				</div>
				<div class="flex flex-col md:w-1/2 md:pl-12">
					<h3 class="lg:text-2xl lg:leading-10 text-blue-one text-base text-center font-extrabold mb-8 ">
						{{$item->section_2_sub_2_title}}
					</h3>
					@php echo $item->section_2_sub_2_description @endphp
				</div>
			</div>
		</div>
	</section>

	<section class="text-grey-2 container max-w-7xl m-auto">
		<div class="container lg:px-5 py-16 mx-auto px-8 w-full">

			<h3 class="lg:text-2xl lg:leading-10 text-blue-one text-base text-center font-extrabold mb-8 ">
				{{$item->section_3_title}}
			</h3>
			<img class="m-auto" src="{{url('/')}}/{{$item->section_3_image}}" alt="map">
			@php echo $item->section_3_description @endphp
			<div class="grid lg:grid-cols-3 grid-cols-1 gap-8 pt-2">
				@foreach($image as $image)
				<img class="object-cover w-full m-auto" src="{{url('/')}}/{{$image->image}}" alt="img">
				@endforeach
			</div>
		</div>
	</section>

	<section class="text-grey-2 container max-w-7xl m-auto">
		<div class="container lg:px-5 py-16 mx-auto px-8 w-full">
			<h3 class="lg:text-2xl lg:leading-10 text-blue-one text-base text-center font-extrabold mb-8 ">
				@if(session('lang')=="eng")
				{{$customer_section->title_eng;}}
				@else
				{{$customer_section->title;}}
				@endif
			</h3>
			<div class="grid lg:grid-cols-6 grid-cols-2 gap-8 pb-8">
				@foreach($customer as $customer)
				<img class="object-cover w-full m-auto" src="{{url('/')}}/{{$customer->image}}" alt="img">
				@endforeach
			</div>
		</div>
	</section>
	@endsection