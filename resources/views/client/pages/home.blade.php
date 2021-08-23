@extends('client.layout.layout')
@section('content')
    <div id="home">
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1> {!! $result['slider']['title'] !!} </h1>
                        <h2 data-aos-delay="400"> {!! $result['slider']['description'] !!} </h2>
                        <div data-aos-delay="800">
                            <a href="tel:+840968104244" class="btn-get-started scrollto connect-mail">Liên hệ ngay</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                        <img src="{{ $result['slider']['image'] }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section>
        <main id="main">
            <section id="about" class="about ">
                <div class="container">
                    <div class="section-title">
                        <h2>{{ $result['newsBSMEDIA']['data']['name'] }}</h2>
                    </div>
                    <div class="row content">
                        <div class="col-lg-6" data-aos-delay="150">
                            <p> </p>
                            <ul>
                                {!! $result['newsBSMEDIA']['data']['description'] !!}
                            </ul>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0" data-aos-delay="300">
                            <p> {!! $result['newsBSMEDIA']['data']['title'] !!} </p>
                            <a href="tel:+840968104244" class="btn-learn-more connect-mail">Liên hệ ngay</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Us Section -->
            <!-- ======= Counts Section ======= -->
            <section id="counts" class="counts section-bg">
                <div class="icon_arrow_services "><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="39px"
                        viewBox="0 0 80 39" enable-background="new 0 0 80 39" xml:space="preserve">
                        <image id="image0" width="80" height="39" x="0" y="0" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAAAnCAMAAACv6D/mAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                        AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAyVBMVEUAAADvQDXvQDXvQDXv
                        QDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXv
                        QDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXvQDXv
                        QDX1mZX5yMb3tLHvRTvwUUn//Pz//v71lZHxY1z////2op7vQjjzfXfxWlL3sK3xXlb4vbv++fn0
                        jIf97u784N/+9PPzeXP0h4Lz/AZxAAAAKnRSTlMAA6C5B7LKFb8OCqaYw4l6E2rRXwL8VBvU+EXd
                        8TvrMyDlJyw29D5McoJRhxULAAAAAWJLR0Q0qbHp/QAAAAd0SU1FB+MLDwsBF+UquawAAAF2SURB
                        VEjHrdTnbsIwGIXhk7JHoZS9RzcUaqihUAId939RDRFQ8PpikSPlV+JHiRS9cK6GYS4CRGMhevEE
                        QhWTKeyWjoTkxdJAmGImisPSyRC87L8HpK4v9nIOTpeKX+jlzz3g5jKxIHqeeGt4fvQ6npi8Ygny
                        EnrxjU3ZTM+VKyoPqNZ0J94Z5/OF7m69ofY8sal6fnIE1V/dakM7lTiZfyx8cLhcfSq8TheG9WRx
                        zdyNDy637Et+x/4AxvX64olvzt3RlPPVlvPpj3i32QOxgShuXM69F9xdbCx6tSrleWLn/Mzi1xP9
                        Melf9PNH7k4jyt4+f7TYEg76IluJ3jF/5LoKUfYy0aAecC+KM3ctelkLD2g/DInlHBsPeCTEvKUH
                        NOomr2DtmcViyd4DnsoaTpc/aiWNqM8fKVZUoil/tCh75vyRYlH0qPzZinT+SLFw6gXJn40YLH+k
                        +HzwguaPmrMXg+ePFPM7zyZ/pPhimz9SzAXO3x/MGQSgnOBcVgAAACV0RVh0ZGF0ZTpjcmVhdGUA
                        MjAxOS0xMS0xNVQxMTowMToyMyswMzowMFVLUYcAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMTEt
                        MTVUMTE6MDE6MjMrMDM6MDAkFuk7AAAAAElFTkSuQmCC"></image>
                    </svg></div>
                <div class="container">
                    <div class="row">
                        <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start aos-init aos-animate"
                            data-aos="fade-right" data-aos-delay="150">
                            <img src="{{ $result['why_choose_service']['image'] }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0 aos-init aos-animate"
                            data-aos="fade-left" data-aos-delay="300">
                            <div class="content d-flex flex-column justify-content-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2> {{ $result['why_choose_service']['name'] }} </h2>
                                    </div>
                                    @foreach ($result['why_choose_service']['data_children'] as $child)
                                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                                            <div class="count-box">
                                                {!! $child['image'] !!}
                                                <!-- <i class="icofont-simple-smile"></i> -->
                                                <span> {{ $child['name'] }} </span>
                                                <p> {!! $child['title'] !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="services" class="services ">
                <div class="container">
                    <div class="section-title">
                        <h2> {{ $result['overall_service']['name'] }} </h2>
                        <p> {!! $result['overall_service']['title'] !!} </p>
                    </div>
                    <div class="row">
                        @foreach ($result['overall_service']['data_children'] as $overall_service)
                            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                                <div class="icon-box" data-aos-delay="100">
                                    <div>
                                        <img width="77" height="80"
                                            style="display: block; margin: auto; width: unset !important"
                                            src="{{ $overall_service['image'] }}">
                                    </div>
                                    <h4 class="title"><a href="" style="display: block; margin: auto; text-align: center;">
                                            {{ $overall_service['name'] }} </a></h4>

                                    {!! $overall_service['description'] !!}

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section id="portfolio" class="portfolio team section-bg">
                <div class="container">
                    <div class="section-title">
                        <h2> {{ $result['theme_website']['name'] }} </h2>
                        <p> {!! $result['theme_website']['title'] !!} </p>
                    </div>
                    <div class="row" data-aos-delay="200">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters">
                                @foreach ($result['theme_website']['data_children'] as $theme_website)
                                    <li data-filter=".filter-app{{ $theme_website['id'] }}">
                                        {{ $theme_website['name'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="row portfolio-container" data-aos-delay="400">
                        @foreach ($result['theme_website']['data_children'] as $theme_website)
                            @if ($theme_website['products'])
                                @foreach ($theme_website['products'] as $product)
                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app{{ $product['service_id'] }}">
                                        <div class="portfolio-wrap">
                                            <img src="{{ $product['image'] }}" class="img-fluid" alt="">
                                            <div class="portfolio-info">
                                                <h4>{{ $product['name'] }}</h4>
                                                <p>{!! $product['title'] !!}</p>
                                                <div class="portfolio-links">
                                                    <a href="{{ $product['image'] }}" data-gall="portfolioGallery"
                                                        class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                                                    <a href="{{ route('detailProduct', ['p' => $product['slug'] ]) }}" title="Chi tiết"><i
                                                            class="bx bx-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- End Portfolio Section -->
            <!-- ======= Pricing Section ======= -->
            <section id="pricing" class="pricing">
                <div class="container">
                    <div class="section-title">
                        <h2>{{ $result['service_pack']['name'] }}</h2>
                        <p>{!! $result['service_pack']['title'] !!}</p>
                    </div>
                    <div class="row">
                        @foreach ($result['service_pack']['data_children'] as $service_pack)
                            <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                                <div class="box" data-aos="zoom-in-left" data-aos-delay="200">
                                    <div class="pannel-header">
                                        <h3> {{ $service_pack['name'] }} </h3>
                                        <h4>
                                            <sub>
                                                @if ( isset($service_pack['price']) )
                                                    {{ number_format($service_pack['price']) }} VNĐ
                                                @else 
                                                    Liên hệ 
                                                @endif
                                            </sup>
                                        </h4>
                                    </div>
                                    <div class="pannel-boder">
                                        <ul>
                                            {!! $service_pack['description'] !!}
                                            <li><a href="{{ $service_pack['slug'] }}">Chi tiết</a></li>
                                        </ul>
                                        <div class="btn-wrap">
                                            <a href="tel:+840968104244" class="btn-buy">Tư vấn ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section>
            <!-- End Pricing Section -->
            <section id="more-services" class="more-services section-bg">
                <div class="container">
                    <div class="section-title aos-init aos-animate" data-aos="fade-up">
                        <h2>BÀI VIẾT MỚI NHẤT</h2>
                        <p>Cập nhật thông tin mới về xu hướng kinh doanh online, công nghệ làm web, thông tin khuyến mãi,
                            hướng
                            dẫn sử dụng, và các hoạt động chăm sóc khách hàng...</p>
                    </div>
                    <div class="row">
                        @foreach ($result['news_new'] as $news_new)
                            <div class="col-md-6 d-flex align-items-stretch mb-3">
                                <div class="card aos-init aos-animate"
                                    style="background-image: url({{ $news_new['image'] }});" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="{{ route('infoBlog', ['n' => $news_new['slug']]) }}">{{ $news_new['name'] }}</a>
                                        </h5>
                                        <p class="card-text">{{ $news_new['title'] }}</p>
                                        <div class="read-more"><a
                                                href="{{ route('infoBlog', ['n' => $news_new['slug']]) }}"><i
                                                    class="icofont-arrow-right"></i> Đọc thêm</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- ======= Team Section ======= -->
    </div>
@endsection

@section('javascript')
    <script>


    </script>
@endsection
