@extends('layouts.web')

@section('title')

@endsection
@section('container')
<!-- bahasa popup -->
<div class="js-modal fixed z-50 top-2/4 left-0 right-0 m-auto overflow-y-auto lg:w-[480px] w-80  hidden bg-white p-8 shadow-xl rounded-lg border-grey-3 border-[1px]"
data-id="modal5">
<div>
	<div class="flex justify-between pb-4">
		<h3 class="text-blue-two font-bold">PEMBERITAHUAN</h3>
		<button class="js-close-btn"><img src="{{url('/web')}}/img/close2.svg" alt="icon"></button>
	</div>

	<p class="text-grey-1 font-normal">Halaman berbahasa Inggris sedang dalam
		tahap pengembangan.
	Silakan lanjutkan dengan halaman berbahasa Indonesia.</p>
</div>
</div>

<!-- cover -->
<div class="w-full relative bg-blue-one pt-24">
	<div class="container max-w-7xl m-auto">
		<div class="grid grid-cols-1 lg:grid-cols-2 py-16 lg:py-0 px-8">
			<div class="flex justify-center items-center">
				<h2 class="text-white font-extrabold text-2xl text-center pb-8 lg:pb-0">{{$item->header_tagline}}</h2>
			</div>
			<div>
				<img src="{{url('/')}}/{{$item->header_image}}" alt="cover">
			</div>
		</div>
	</div>
</div>

<!-- artikel -->
<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container mx-auto flex px-5 lg:pt-16 pt-8 pb-8 md:flex-row flex-col items-center">
		<p class="text-base text-grey-1">@php echo $item->section_2_sub @endphp
		</p>
	</div>

	<div class="container mx-auto flex px-5 lg:pb-8 md:flex-row flex-col items-start">
		<div class="lg:w-96 mb-10 md:mb-0">
			<img class=" " alt="{{$item->section_2_alt_image}}" src="{{url('/')}}/{{$item->section_2_image}}">
		</div>
		<div class="lg:flex-grow lg:ml-8 md:w-1/2 flex flex-col  text-left">
			<h2 class="text-blue-two text-xl mb-4">@php echo $item->section_2_title @endphp
			</h2>
			<p class="mb-8 leading-relaxed text-base text-grey-1">@php echo $item->section_2_description @endphp
			</p>

		</div>
	</div>
	<div class="container mx-auto flex px-5 lg:pb-8 md:flex-row flex-col items-start">
		<div class="lg:w-96 mb-10 md:mb-0">
			<img class=" " alt="{{$item->section_3_alt_image}}" src="{{url('/')}}/{{$item->section_3_image}}">
		</div>
		<div class="lg:flex-grow lg:ml-8 md:w-1/2 flex flex-col  text-left">
			<h2 class="text-blue-two text-xl mb-4">@php echo $item->section_3_title @endphp
			</h2>
			<p class="lg:mb-8 leading-relaxed text-base text-grey-1">@php echo $item->section_3_description @endphp
			</p>

		</div>
	</div>
</section>

<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container mx-auto flex px-5 lg:pt-16 pt-8 pb-8 md:flex-row flex-col items-center">
		<p class="text-base text-grey-1">@php echo $item->section_4_sub @endphp</p>
	</div>
</section>

<!-- map -->
<section class="text-grey-2 container max-w-7xl m-auto pt-8 pb-16 flex justify-center items-center">
	<div class="relative">
		<img class="" src="{{url('/web')}}/img/map.svg" alt="map">
		<div class="absolute w-full h-full top-0">
			<!-- btnpoinlocation 1 -->
			<button class="js-btn-modal pin1 lg:top-[30px] lg:left-[83px] left-[15px] top-[-11px] absolute"
			data-id="1">
			<img src="{{url('/web')}}/img/pinlocation.svg" alt="pinloc">
		</button>

		<!-- btnpoinlocation 1 -->
		<div class="js-modal absolute z-30 overflow-y-auto lg:w-[480px] w-80 lg:top-12 lg:left-20 left-0 top-0 hidden bg-white p-8 shadow-xl m-6 rounded-lg border-grey-3 border-[1px]"
		data-id="modal1">
		<div>
			<div class="flex justify-between pb-4">
				<h3 class="text-blue-two font-bold">MEDAN</h3>
				<button class="js-close-btn"><img src="{{url('/web')}}/img/close2.svg" alt="icon"></button>
			</div>

			<p class="text-grey-1 font-normal">@php echo $item->medan_pin @endphp</p>
		</div>
	</div>

	<!-- btnpoinlocation 2 -->
	<button class="js-btn-modal pin1 lg:bottom-[130px] lg:left-[297px] left-[75px] bottom-[38px] absolute"
	data-id="2">
	<img src="{{url('/web')}}/img/pinlocation.svg" alt="pinloc">
</button>

<!-- btnpoinlocation 2 -->
<div class="js-modal absolute z-30 overflow-y-auto lg:w-[480px] w-80 lg:bottom-28 lg:left-80 left-0 bottom-8 hidden bg-white p-8 shadow-xl m-6 rounded-lg border-grey-3 border-[1px]"
data-id="modal2">
<div>
	<div class="flex justify-between pb-4">
		<h3 class="text-blue-two font-bold">JAKARTA (KANTOR PUSAT)</h3>
		<button class="js-close-btn"><img src="{{url('/web')}}/img/close2.svg" alt="icon"></button>
	</div>

	<p class="text-grey-1 font-normal">@php echo $item->jakarta_pin @endphp</p>
</div>
</div>

<!-- btnpoinlocation 3 -->
<button class="js-btn-modal pin1 lg:bottom-[100px] lg:left-[453px] left-32 bottom-8 absolute"
data-id="3">
<img src="{{url('/web')}}/img/pinlocation.svg" alt="pinloc">
</button>

<!-- btnpoinlocation 3 -->
<div class="js-modal absolute z-30 overflow-y-auto lg:w-[480px] w-80 lg:bottom-24 lg:left-[28rem] left-0 bottom-8 hidden bg-white p-8 shadow-xl m-6 rounded-lg border-grey-3 border-[1px]"
data-id="modal3">
<div>
	<div class="flex justify-between pb-4">
		<h3 class="text-blue-two font-bold">SURABAYA</h3>
		<button class="js-close-btn"><img src="{{url('/web')}}/img/close2.svg" alt="icon"></button>
	</div>

	<p class="text-grey-1 font-normal">@php echo $item->surabaya_pin @endphp</p>
</div>
</div>
<!-- btnpoinlocation 4 -->
<button class="js-btn-modal pin1 lg:top-[-28px] lg:left-[562px] left-[160px] bottom-[84px] absolute"
data-id="4">
<img src="{{url('/web')}}/img/pinlocation.svg" alt="pinloc">
</button>

<!-- btnpoinlocation 4 -->
<div class="js-modal absolute z-30 overflow-y-auto lg:w-[480px] w-80 lg:top-40 lg:left-[35rem] left-0 bottom-20 hidden bg-white p-8 shadow-xl m-6 rounded-lg border-grey-3 border-[1px]"
data-id="modal4">
<div>
	<div class="flex justify-between pb-4">
		<h3 class="text-blue-two font-bold">BALIKPAPAN</h3>
		<button class="js-close-btn"><img src="{{url('/web')}}/img/close2.svg" alt="icon"></button>
	</div>

	<p class="text-grey-1 font-normal">@php echo $item->balikpapan_pin @endphp</p>
</div>
</div>



</div>



</div>

</section>
@endsection