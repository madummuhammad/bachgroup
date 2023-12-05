@extends('layouts.web')

@section('title')
{{$item->title}}
@endsection
@section('container')
<!-- cover -->
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
			<p class="text-grey-1 text-base font-normal pb-8">@php echo $item->section_2_description @endphp
			</p>

			<div class="container mx-auto flex pb-8 md:flex-row flex-col items-center">
				<div class="lg:w-96 mb-10 md:mb-0">
					<img class="" alt="{{$item->section_2_sub_1_alt_image}}" src="{{url('/')}}/{{$item->section_2_sub_1_image}}">
				</div>
				<div class="lg:flex-grow lg:ml-8 md:w-1/2 flex flex-col  text-left">
					<p class="mb-8 leading-relaxed text-base text-grey-1">@php echo $item->section_2_sub_1_description @endphp
					</p>

				</div>
			</div>
			<div class="container mx-auto flex lg:pb-8 md:flex-row flex-col items-center">
				<div class="lg:w-96 mb-10 md:mb-0">
					<img class=" " alt="{{$item->section_2_sub_2_alt_image}}" src="{{url('/')}}/{{$item->section_2_sub_2_image}}">
				</div>
				<div class="lg:flex-grow lg:ml-8 md:w-1/2 flex flex-col  text-left">
					<p class="lg:mb-8 leading-relaxed text-base text-grey-1">
						@php echo $item->section_2_sub_2_description @endphp
					</p>

				</div>
			</div>
			<div class="container mx-auto flex lg:pb-8 md:flex-row pt-8 lg;pt-0 flex-col items-center">
				<div class="lg:w-96 mb-10 md:mb-0">
					<img class=" " alt="{{$item->section_2_sub_3_alt_image}}" src="{{url('/')}}/{{$item->section_2_sub_3_image}}">
				</div>
				<div class="lg:flex-grow lg:ml-8 md:w-1/2 flex flex-col  text-left">
					<p class="lg:mb-8 leading-relaxed text-base text-grey-1">@php echo $item->section_2_sub_3_description @endphp
					</p>

				</div>
			</div>
			<div class="flex justify-center items-center pt-4">
				<a class="text-blue-two" href="https://www.bach.co.id/">Lihat Selengkapnya</a>
			</div>

		</div>
	</section>

	<section class="text-grey-2 container max-w-7xl m-auto">
		<div class="container lg:px-5 py-16 mx-auto px-8 w-full">
			<h3 class="lg:text-2xl lg:leading-10 text-blue-one text-base text-center font-extrabold mb-8">PROYEK KAMI
			</h3>

			<div class="grid lg:grid-cols-3 grid-cols-1 gap-8">
				@foreach($project as $project)
				<div>
					<img class="object-cover w-full m-auto pb-4" src="{{url('/')}}/{{$project->image}}" alt="img">
					<h4 class="text-blue-two font-semibold pb-2">{{$project->title}}</h4>
					<div class="text-base text-grey-1">@php echo $project->description @endphp</div>
				</div>
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