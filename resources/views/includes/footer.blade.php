@php
use App\Models\Footer;
use App\Models\FooterEng;
if(session('lang')=="eng"){
    $item=FooterEng::get()->first();
} else {
    $item=Footer::get()->first();
}
@endphp

<!-- footer -->
<footer class="py-8 bg-blue-one">
    <div class="text-center container max-w-7xl m-auto px-5 pt-8 pb-8  items-center">
        <h4 class="text-white pb-4">{{$item->title}}</h4>
        <div class="flex justify-center gap-4 items-center">
            <a target="_blank" href="{{$item->ig_link}}">
                <img src="{{url('/web')}}/img/facebook.svg" alt="fb">
            </a>
            <a target="_blank" href="{{$item->fb_link}}">
                <img src="{{url('/web')}}/img/instagram.svg" alt="ig">
            </a>
        </div>

        <span class="inline-block h-[2px] w-full rounded bg-white mt-8 mb-8"></span>
    </div>

    <div class="text-center text-xs leading-5 text-white text-navy-blue">
        {{$item->copyright}}
    </div>
</footer>

<!-- <h1 class="hidden"> BACH-Group </h1> -->