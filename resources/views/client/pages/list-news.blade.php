@extends('client.layout.layout')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Tin tức</h2>
                </div>
            </div>
        </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach($result['list_news'] as $news)
                            <div class="col-lg-12" style="margin-top: 15px">
                                <div class="row">
                                    <div class="">
                                        <img src="{{ $news['image'] }}" class="img-blogs">
                                    </div>
                                    <h2 class="portfolio-title" style="margin-top: 25px;">{{ $news['name'] }}</h2>
                                    <p> {{ $news['title'] }} </p>
                                    <a href="{{route('infoBlog', ['n' => $news['slug'] ])}}" class="continue-reading">Đọc thêm  <i>></i></a>
                                </div>
                                <hr class="uk-margin-medium-top uk-margin-medium-bottom">
                            </div>
                        @endforeach

                        {{ $result['list_news']->render('client.pages.paginate-news') }}
                    </div>
                    <div class="col-lg-4">
                        <div style="margin-top: 30px;width: 100%;">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <form action="{{ route('search') }}" method="post">
                                    @csrf
                                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm">
                                </form>
                            </div>
                        </div>
                        <div class="card" style="width: 100%;padding: 10px;">
                            <div class="card-body">
                                <h4 class="uk-heading-bullet">Tin tức mới nhất</h4>
                                <ul class="uk-list uk-list-divider in-widget-popular" style="padding: 0; list-style: none;">
                                    @foreach($result['news_new'] as $news_new)
                                        <li class="category-li">
                                            <div class="uk-grid-collapse row" data-uk-grid="">
                                                <div class="uk-width-auto uk-first-column">
                                                    <img class="uk-border-rounded"
                                                        src="{{ $news_new['image'] }}"
                                                        data-src="{{ $news_new['image'] }}"
                                                        style="width: 68px; height: 68px" alt="" data-uk-img="">
                                                </div>
                                                <div class="uk-width-expand uk-margin-left">
                                                    <a style="color: #4f4f4f"
                                                        href="{{route('infoBlog', ['n' => $news_new['slug'] ])}}">
                                                        {!! Str::limit(html_entity_decode($news_new['name']), 40) !!}
                                                        <span class="uk-article-meta uk-margin-remove-bottom">
                                                            <i></i>
                                                            {{ \Carbon\Carbon::parse($news_new['created_at'])->diffForHumans() }}
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="card" style="width: 100%;padding: 10px; margin-top: 35px">
                            <div class="card-body">
                                <h4 class="uk-heading-bullet">Tin tức nổi bật</h4>
                                <ul class="uk-list uk-list-divider in-widget-popular" style="padding: 0; list-style: none;">
                                    @foreach($result['news_hot'] as $news_hot)
                                        <li class="category-li">
                                            <div class="uk-grid-collapse row" data-uk-grid="">
                                                <div class="uk-width-auto uk-first-column">
                                                    <img class="uk-border-rounded"
                                                        src="{{ $news_hot['image'] }}"
                                                        data-src="{{ $news_hot['image'] }}"
                                                        style="width: 68px; height: 68px" alt="" data-uk-img="">
                                                </div>
                                                <div class="uk-width-expand uk-margin-left">
                                                    <a style="color: #4f4f4f"
                                                        href="{{route('infoBlog', ['n' => $news_hot['slug'] ])}}">
                                                        {!! Str::limit(html_entity_decode($news_hot['name']), 40) !!}
                                                        <span class="uk-article-meta uk-margin-remove-bottom">
                                                            <i></i>
                                                            {{ \Carbon\Carbon::parse($news_hot['created_at']) }}
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- End Portfolio Details Section -->
</main>

@endsection