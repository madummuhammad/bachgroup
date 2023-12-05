<!DOCTYPE html>
<html lang="id">

<head>
    @php
    use App\Models\Seo;
    use App\Models\SeoEng;

    if(session('lang')=="eng"){
        $seo=SeoEng::first();
    } else {
        $seo=Seo::first();
    }
    @endphp
    <meta charset="utf-8">
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="{{$seo->meta_description}}" />
    <meta name="next-head-count" content="8" />
    <meta name="keywords" content="{{$seo->meta_keywords}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <title>{{$seo->site_title}} @if(!request()->is('/'))
        -
    @endif @yield('title')</title>
    @php echo $seo->head_script @endphp

    <!-- favicon -->
    @stack('prepend-style')
    <link rel="shortcut icon" href="{{url('web/img/logo.svg')}}">


    <!-- css tailwind -->
    <link rel="stylesheet" type="text/css" href="{{url('/web')}}/css/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('/web')}}/css/custom.css" rel="stylesheet">

    <link rel="preload" href="{{url('/web')}}/fonts/Lato-ExtraBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{url('/web')}}/fonts/Lato-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{url('/web')}}/fonts/Lato-Regular.woff2" as="font" type="font/woff2" crossorigin>
    @stack('addon-style')


</head>
<!-- head html end -->

<body>
    <div class="overlay" id="overlay"></div>

    @include('includes.navbar')
    @yield('container')



    @include('includes.footer') 
</body>



@stack('prepend-script')
<script src="{{url('/web')}}/js/jquery.min.js"></script>
<script src="{{url('/web')}}/js/base.js"></script>
@stack('addon-script')


</html>