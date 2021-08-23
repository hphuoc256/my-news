@section('meta')
    <meta name="keywords" content="{{ $result[0]['meta_keyword'] }}" />
    <meta name="descriptions" content="{{ $result[0]['meta_description'] }}" />
    <meta property="og:descriptions" content="{{ $result[0]['meta_keyword'] }}">
    <meta  property="og:keywords" content="{{ $result[0]['meta_description'] }}">
@endsection
@extends('client.layout.layout')
@section('content')

    <main id="main">

        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $result[0]['name'] }}</h2>
                </div>

            </div>
        </section>

        <section class="inner-page">
            <div class="container">
                <div class="inner-image">
                    <div class="section-title">
                        <h2>
                            {!! $result[0]['title'] !!}
                        </h2>
                    </div>
                    {!! $result[0]['description'] !!}
                    <div style="margin-top: 3rem">
                        Tags: 
                        <a href="{{route('detailProduct', ['p' => $result[0]['slug'] ])}}"> 
                            @if( isset($result[0]['meta_keyword']))
                                #{{ $result[0]['meta_keyword'] }} 
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="more-services" class="more-services">
            <div class="container">
                <div class="section-title aos-init aos-animate" data-aos="fade-up">
                    <h2>{{ $projectDone['name'] }}</h2>
                </div>
                <div class="row">
                    @if (isset($projectDone['data_children']))
                        @foreach ($projectDone['data_children'] as $proDone)
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="card aos-init aos-animate"
                                    style="background-image: url({{ $proDone['image'] }})" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="{{ $proDone['slug'] }}">{{ $proDone['name'] }}</a></h5>
                                        <p class="card-text">{!! $proDone['title'] !!}</p>
                                        <div class="read-more"><a href="{{ $proDone['slug'] }}"><i
                                                    class="icofont-arrow-right"></i>Xem thêm</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    </main>

@endsection
