@extends('layouts.main')

@section('title', 'Your-Cast')
@section('description', 'Your-Cast')
@section('keywords', 'Your-Cast')

@section('content')
    <a href="javascript:" id="return-to-top">
        <p class="text-weight-500 text-extra-large text-green">Scroll to top.
            <span class="text-gray-light" data-uk-icon="icon: arrow-right; ratio: 2"></span>
        </p>
    </a>
    <div id="loader-wrapper">
        <div class="loader-img">
            <img src="/logo/your-cast-logo-white.png" alt=""/>
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    @widget('header')
    <div id="episodes" class="padding-top-bottom-100px bg-black">
        <div class="container">
            <div class="row width-100 xs-no-margin">
                <div class="col-sm-6 padding-50px text-left sm-no-padding-top sm-text-center sm-no-padding-bottom">
                    <img alt="" class="border-radius-10 margin-bottom-20px hover-img" src="{{ $show->artwork }}"/>
                </div>
                <div class="col-sm-6 padding-50px text-left sm-no-padding-top sm-text-center sm-no-padding-bottom">
                    <p class="text-weight-500 text-extra-large text-gray-light margin-bottom-20px">{{ $show->title }}</p>
                    <p class="text-weight-400 margin-bottom-20px">{!! $show->description !!}</p>
{{--                    <div class="separator width-50 center-col bottom-border border-1px border-color-gray-extra-dark margin-top-50px margin-bottom-50px"></div>--}}
{{--                    <p class="text-weight-500 text-extra-large text-gray-light margin-bottom-20px">{{ $show->title }}</p>--}}
{{--                    <p class="text-weight-500 text-extra-large text-gray-light margin-bottom-20px">{{ $show->title }}</p>--}}
{{--                    <p class="text-weight-500 text-extra-large text-gray-light margin-bottom-20px">{{ $show->title }}</p>--}}
{{--                    <p class="text-weight-500 text-extra-large text-gray-light margin-bottom-20px">{{ $show->title }}</p>--}}
{{--                    <p class="text-weight-500 text-extra-large text-gray-light margin-bottom-20px">{{ $show->title }}</p>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-col text-center">
                    <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                        <div class="text-center margin-bottom-50px">
                            <h5 class="text-weight-800 text-white margin-bottom-20px sm-margin-bottom-5px">
                                Latest episodes.
                            </h5>
                            <img class="margin-bottom-20px" src="/images/separator-light.png" alt=""/>
                            <p class="no-margin">
                                <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                Latest episodes of this show.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                @foreach($episodes as $episode)
                    <div class="col-lg-4 col-md-12 col-xs-12 center-col text-center">
                        <div class="margin-bottom-50px text-center">
                            <img alt="" class="border-radius-10 width-50 margin-bottom-20px" src="{{ $episode->cover }}"/>
                            <p class="text-weight-500 text-extra-large text-gray-light margin-bottom-10px">
                                <span class="ep-tag">EP {{ $episode->episode }}</span>
                            </p>
                            <p class="text-weight-500 text-extra-large text-gray-light margin-bottom-10px min-height-100px">
                                {{ $episode->title }}
                            </p>
{{--                            <p class="margin-bottom-10px">--}}
{{--                                <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>--}}
{{--                                {!! $episode->content !!}--}}
{{--                            </p>--}}
                            <audio class="margin-auto" preload="auto" controls>
                                <source src="{{ $episode->audioFile->link }}">
                            </audio>
                        </div>
                    </div>
                @endforeach
            </div>
            <div
                class="separator width-50 center-col bottom-border border-1px border-color-gray-extra-dark margin-top-50px margin-bottom-50px"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12x">
                    {{ $episodes->links('pagination.default') }}
                </div>
            </div>
        </div>
    </div>
    @widget('footer')
@endsection
