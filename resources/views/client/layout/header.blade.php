<!DOCTYPE html>
<html lang="vi">

<head><base href="{{ asset('/') }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>Thiết kế Bs Media-Thiết kế web chuyên nghiệp và uy tín cho doanh nghiệp</title>
    @yield('meta')
    <meta property="og:title" content="Thiết kế logo - Thiết kế Website - Marketing Online chuyên nghiệp">
    <meta property="og:type" content="article">
    <meta property="og:description" content="công ty thiết kế web BsMeia thiết kế website chuyên nghiệp, cao cấp, chuẩn SEO. Bảo hành và hỗ trợ trọn đời. Không thiết kế web giá rẻ kém chất lượng.">
    <meta  name="keyword" content="bạn muốn có website thiết kế đẹp, chất lượng và ổn định, thân thiện với các bộ máy tìm kiếm để được tăng hạng. Chúng tôi biết điều đó và có thể giúp bạn">
    <meta property="og:image" content="{{asset('fontend/img/2021/meta/infoshare.webp')}}"/>
    <meta property="og:image:secure_url" content="{{asset('fontend/img/2021/meta/infoshare.webp')}}" />
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="apple-touch-icon" href="{{asset('fontend/img/logo/logo114.webp')}}" rel="icon">

    <link rel="shortcut icon" href="{{asset('fontend/img/logo/bs1.webp')}}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('fontend/img/logo/logo57.webp')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('fontend/img/logo/logo72.webp')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('fontend/img/logo/logo114.webp')}}" />
    <link href="{{asset('fontend/img/logo/logo114.webp')}}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{asset('fontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/vendor/aos/aos.css')}}" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="{{asset('fontend/css/paginate.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/messenger.css')}}" rel="stylesheet">
</head>
<body>
    
    <!-- ======= Header ======= -->
    
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto" style="max-height: 62px !important">
                <a href="{{ route('home') }}" id="logo" rel="home"><img src="{{asset('fontend/img/logo/bs1.webp')}}"></a>

            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{ route('home') }}">{{ __('media.dashboard') }}</a></li>
                    @foreach($category as $menu)
                        <li class="drop-down"><a href="javaScript:void(0)">{{ $menu['name'] }}</a>
                            @if($menu->child)
                                <ul>
                                    @foreach($menu->child as $child)
                                        @if( $child['status'] !== 0 )
                                            <li>
                                                <a href="{{ route('detailProduct',['p' => $child['slug'] ]) }}">{{ $child['name'] }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    <li><a href="{{ route('infoBlog') }}">Tin tức</a></li>
                    {{-- <li class="drop-down"><a href="javaScript:void(0)">Lang</a>
                        <ul>
                            <li><a href="{!! route('change-language', ['en']) !!}">en</a></li>
                            <li><a href="{!! route('change-language', ['vi']) !!}">vi</a></li>
                        </ul>
                    </li>    --}}
                    <li class="get-started"><a href="tel:+840968104244">0968 104 244</a></li>
                </ul>
            </nav>
        </div>
    </header>