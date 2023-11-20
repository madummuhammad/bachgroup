@extends('layouts.web')

@section('title')
{{$page->name}}
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
		@php echo $item->description @endphp
	</div>
</section>
@endsection