@extends('layouts.web')

@section('title')
{{$item->title}}
@endsection
@push("addon-style")
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{url('/web')}}/css/owl.carousel.min.css">
    <!-- popup slide Stylesheets -->
    <link rel="stylesheet" href="{{url('/web')}}/css/magnific-popup.min.css">


    <link rel="preload" href="{{url('/web')}}/fonts/Lato-ExtraBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{url('/web')}}/fonts/Lato-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{url('/web')}}/fonts/Lato-Regular.woff2" as="font" type="font/woff2" crossorigin>
@endpush
@section('container')
<div class="w-full relative bg-blue-one pt-24">
	<div class="container max-w-7xl m-auto">
		<div class="grid grid-cols-1 lg:grid-cols-2 py-16 lg:py-0 px-8">
			<div class="flex justify-center items-center">
				<h2 class="text-white font-extrabold text-2xl text-center pb-8 lg:pb-0">
				{{$item->header_tagline}} </h2>
			</div>
			<div>
				<img src="{{url('web')}}/img/cover-2.png" alt="cover">
			</div>
		</div>
	</div>
</div>

<!-- artikel -->
<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="py-16 px-8 lg:px-0">
		@php echo $item->section_2_description @endphp
	</div>
</section>
<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="flex flex-wrap py-16 px-8 lg:px-0 mx-auto">
		<div class="md:w-1/2 md:pr-12  md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-grey-3">
			<h3 class="lg:text-[32px] lg:leading-10 text-blue-two text-base text-center font-extrabold mb-2 ">{{$item->section_2_sub_1_title}}
			</h3>
			@php echo $item->section_2_sub_1_description @endphp

		</div>
		<div class="flex flex-col md:w-1/2 md:pl-12">
			<h3 class="lg:text-[32px] lg:leading-10 text-blue-two text-base text-center font-extrabold mb-2 ">@php echo $item->section_2_sub_2_title @endphp
			</h3>
			@php echo $item->section_2_sub_2_description @endphp

		</div>
	</div>
</section>

<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container px-5 py-16 mx-auto">
		<h2 class="lg:text-2xl lg:leading-10 text-blue-one text-center pb-8">{{$item->section_3_title}}</h2>
		<div class="flex flex-wrap lg:-m-4 w-full text-center">
			<div class="p-4 md:w-1/3 w-full">
				<img class="m-auto" src="{{url('web')}}/img/trusted.svg" alt="icon">
				<h2 class="font-semibold lg:text-xl text-blue-two py-4">@php echo $item->section_3_sub_1_title @endphp</h2>
				@php echo $item->section_3_sub_1_description @endphp

			</div>
			<div class="p-4 md:w-1/3 w-full">
				<img class="m-auto" src="{{url('web')}}/img/ownership.svg" alt="icon">
				<h2 class="font-semibold lg:text-xl text-blue-two py-4">@php echo $item->section_3_sub_2_title @endphp</h2>
				@php echo $item->section_3_sub_2_description @endphp

			</div>
			<div class="p-4 md:w-1/3 w-full">
				<img class="m-auto" src="{{url('web')}}/img/profesional.svg" alt="icon">
				<h2 class="font-semibold lg:text-xl text-blue-two py-4">@php echo $item->section_3_sub_3_title @endphp</h2>
				@php echo $item->section_3_sub_3_description @endphp


			</div>
		</div>
	</div>
</section>

<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container px-5 py-16 mx-auto">
		<h2 class="lg:text-2xl lg:leading-10 text-blue-one text-center pb-8">{{$item->section_4_title}}</h2>
		<div class="owl-carousel owl-theme">
			@foreach($milestone as $milestone)
			<div class="item relative">
				<div class="bulet-cricle absolute"><img src="{{url('web')}}/img/pin.svg" alt=""></div>
				<div class=" ">
					<img src="{{url('/')}}/{{$milestone->image}}" alt="">
					<h3 class="text-blue-two font-semibold text-2xl">{{$milestone->year}}</h3>
					<p class="text-base text-grey-1">@php echo $milestone->description @endphp</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container px-5 py-16 mx-auto w-full">
		<h3 class="text-center text-blue-one text-2xl font-extrabold pb-8">{{$item->komisaris_title}}</h3>
		<div class="flex flex-wrap pb-8">
			<div class="lg:w-1/3 p-[10.66px]">
				<div class="relative text-center">
					<img class="m-auto mb-4" src="{{url('web')}}/img/bod/hartanto.png" alt="">
					<h4 class="text-blue-two font-semibold text-[20px]">Hartanto Rahardja</h4>
					<h5 class="text-grey-1 font-medium text-base">Komisaris</h5>
				</div>
			</div>
			<div class="lg:w-1/3 p-[10.66px]">
				<div class="relative text-center">
					<img class="m-auto mb-4" src="{{url('web')}}/img/bod/budi.png" alt="">
					<h4 class="text-blue-two font-semibold text-[20px]">Budi Kurniawan</h4>
					<h5 class="text-grey-1 font-medium text-base">Direktur Utama</h5>
				</div>
			</div>
			<div class="lg:w-1/3 p-[10.66px]">
				<div class="relative text-center">
					<img class="m-auto mb-4" src="{{url('web')}}/img/bod/hasbi.png" alt="">
					<h4 class="text-blue-two font-semibold text-[20px]">Hasby Jap</h4>
					<h5 class="text-grey-1 font-medium text-base">Direktur Keuangan</h5>
				</div>
			</div>
		</div>
		<div class="flex flex-wrap pb-8 container max-w-3xl m-auto">
			<div class="lg:w-1/2 p-4">
				<div class="relative text-center">
					<img class="m-auto mb-4" src="{{url('web')}}/img/bod/zulfahmi.png" alt="">
					<h4 class="text-blue-two font-semibold text-[20px]">Zulfahmi Fithri</h4>
					<h5 class="text-grey-1 font-medium text-base">Direktur HRGA</h5>
				</div>
			</div>
			<div class="lg:w-1/2 p-4">
				<div class="relative text-center">
					<img class="m-auto mb-4" src="{{url('web')}}/img/bod/iwan.png" alt="">
					<h4 class="text-blue-two font-semibold text-[20px]">Iwan Budy Rahadian</h4>
					<h5 class="text-grey-1 font-medium text-base">Direktur Pengembangan Bisnis</h5>
				</div>
			</div>

		</div>
	</div>
</section>

<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container px-5 py-16 mx-auto w-full">
		<h3 class="text-center text-blue-one text-2xl font-extrabold pb-8">{{$item->structure_title}}</h3>
		<div class="flex justify-center items-center">
			<img src="{{url('web')}}/img/logo-body.svg" alt="icon-logo">

		</div>
		<div class="flex justify-center items-center relative">
			<div class="relative">
				<img src="{{url('web')}}/img/struktur.svg" alt="struktur">
				<button class="linkpopup js-btn-modal link1" data-id="6"></button>
				<button class="linkpopup js-btn-modal link2" data-id="7"></button>
				<button class="linkpopup js-btn-modal link3" data-id="8"></button>
			</div>


		</div>
	</div>
</section>

<!-- link1 -->
<div class="js-modal fixed z-50 top-1/3 left-0 right-0 m-auto overflow-y-auto lg:w-[480px] w-80  hidden bg-white p-8 shadow-xl rounded-lg border-grey-3 border-[1px]"
data-id="modal6">
<div>
	<div class="flex justify-between pb-4">
		<h3 class="text-blue-two font-bold">PT BACH Multi Global</h3>
		<button class="js-close-btn"><img src="{{url('web')}}/img/close2.svg" alt="icon"></button>
	</div>

	<p class="text-grey-1 font-normal mb-4">PT BACH Multi Global adalah perusahaan yang bergerak dalam
		penyediaan
		barang dan jasa di bidang penjualan generator set, suku cadang, dan pemeliharaan yang diperlukan bagi
	para pemain di industri telekomunikasi. Perusahaan ini didirikan pada tahun 2006.</p>
	<a class=" text-blue-two font-semibold" href="https://www.bach.co.id/">Kunjungi Wesbsite</a>
</div>
</div>

<!-- link2 -->
<div class="js-modal fixed z-50 top-1/3 left-0 right-0 m-auto overflow-y-auto lg:w-[480px] w-80  hidden bg-white p-8 shadow-xl rounded-lg border-grey-3 border-[1px]"
data-id="modal7">
<div>
	<div class="flex justify-between pb-4">
		<h3 class="text-blue-two font-bold">PT BACH Multi Servis</h3>
		<button class="js-close-btn"><img src="{{url('web')}}/img/close2.svg" alt="icon"></button>
	</div>

	<p class="text-grey-1 font-normal">PT Bach Multi Servis adalah salah satu anak perusahaaan BACH Group
	yang bergerak di bidang jasa pemeliharaan atau servis. Perusahaan ini didirikan pada tahun 2019.</p>
</div>
</div>

<!-- link3 -->
<div class="js-modal fixed z-50 top-1/3 left-0 right-0 m-auto overflow-y-auto lg:w-[480px] w-80  hidden bg-white p-8 shadow-xl rounded-lg border-grey-3 border-[1px]"
data-id="modal8">
<div>
	<div class="flex justify-between pb-4">
		<h3 class="text-blue-two font-bold">PT BACH Multi Infrastruktur</h3>
		<button class="js-close-btn"><img src="{{url('web')}}/img/close2.svg" alt="icon"></button>
	</div>

	<p class="text-grey-1 font-normal ">Perusahaan yang berdiri tahun 2019, memiliki pelanggan dari berbagai
		perusahaan besar di industri telekomunikasi untuk menjalan berbagai proyek dalam bidang infrastruktur
		telekomunikasi. Bidang tersebut mencakup pembangunan dan ijin pembangunan menara telekomunikasi, fiber
	optic dan shelter komunikasi.</p>
</div>
</div>


<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container px-5 py-16 mx-auto w-full">
		<h3 class="text-center text-blue-one text-2xl font-extrabold pb-8">{{$item->section_5_title}}</h3>
		<div class="simplecarousel-list lg:simplecarousel-list-none">
			<div class="crousel-mobile">
				<div class="lg:flex lg:flex-wrap lg:!w-full lg:!relative">
					@foreach($certificate as $certificate)
					<div class="xl:!w-1/6 md:!w-1/2 lg:p-4">
						<div class="magnific-img">
							<a class="image-popup-vertical-fit" href="{{url('/')}}/{{$certificate->image}}" title="1.png">
								<img class="h-[175px] m-auto" src="{{url('/')}}/{{$certificate->image}}" alt="1.png" />
							</a>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</section>

<section class="text-grey-2 container max-w-7xl m-auto">
	<div class="container px-5 py-16 mx-auto w-full">
		<h3 class="text-center text-blue-one text-2xl font-extrabold pb-8">{{$item->section_6_title}}</h3>

		<div class="simplecarousel-list lg:simplecarousel-list-none">
			<div class="crousel-mobile">
				<div class="lg:flex lg:flex-wrap lg:!w-full lg:!relative">
					@foreach($award as $award)
					<div class="xl:!w-1/6 md:!w-1/2 lg:p-4">
						<div class="magnific-img">
							<a class="image-popup-vertical-fit" href="{{url('/')}}/{{$award->image}}" title="1.png">
								<img class="h-[175px] m-auto" src="{{url('/')}}/{{$award->image}}" alt="1.png" />
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('addon-script')
<script src="{{url('/web')}}/js/owl.carousel.js"></script>
<script src="{{url('/web')}}/js/jquery.magnific-popup.min.js"></script>


<script>
	$(document).ready(function () {
		$('.owl-carousel').owlCarousel({
			loop: false,
			margin: 10,
			mergeFit: true,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 3,
					nav: true
				},
				1000: {
					items: 6,
					nav: true,
					loop: false,
					margin: 0
				}
			}
		})

		$('.image-popup-vertical-fit').magnificPopup({
			type: 'image',
			mainClass: 'mfp-with-zoom',
			gallery: {
				enabled: true
			},

			zoom: {
				enabled: true,

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                opener: function (openerElement) {

                	return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }

        });

	});


</script>
@endpush