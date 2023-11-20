@extends('layouts.web')

@section('title')
{{$item->title}}
@endsection
@section('container')
<section class="text-grey-2 container pt-24 max-w-7xl m-auto">
	<div class="container px-5 pb-16 py-16 mx-auto w-full">

		<h3 class="lg:text-2xl lg:leading-10 text-blue-one text-base text-center font-extrabold mb-8">{{$item->title}}
		</h3>
		<div class="container mx-auto flex px-5 lg:pb-8 md:flex-row flex-col items-start">
			<div class="lg:w-96 mb-10 md:mb-0">
				<img class=" " alt="hero" src="{{url('/')}}/{{$item->image}}">
			</div>
			<div class="lg:flex-grow lg:ml-8 md:w-1/2 flex flex-col text-left">
				@php echo $item->description @endphp




			</div>
		</div>
	</div>
</section>
@endsection