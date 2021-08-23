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
            <div>
                <div class="section-title">
                    <h2>
                        {{ $result[0]['name'] }}
                    </h2>
                </div>
                {!! $result[0]['description'] !!}
                <div style="margin-top: 3rem">
                    Tags: 
                    <a href="{{route('infoBlog', ['n' => $result[0]['slug'] ])}}"> 
                        @if( isset($result[0]['meta_keyword']))
                            #{{ $result[0]['meta_keyword'] }} 
                        @endif
                    </a>
                </div>
            </div>
        </div>
        
    </section>
</main>

@endsection