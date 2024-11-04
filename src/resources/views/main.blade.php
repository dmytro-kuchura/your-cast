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
    <div id="counter" class="bg-black">
        <div class="row no-margin no-padding">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 center-col text-center no-margin no-padding"
                 data-uk-scrollspy="target: > img; cls: uk-animation-slide-bottom-medium; delay: 200">
                <img src="images/backgrounds/main.jpg" alt=""/>
            </div>
            <div
                class="col-lg-7 col-md-12 col-sm-12 col-xs-12 no-margin no-padding uk-flex uk-flex-middle md-padding-top-100px md-padding-bottom-100px md-padding-left-15px md-padding-right-15px">
                <div class="container-small">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-col text-center">
                            <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                                <div class="text-left margin-bottom-50px">
                                    <h5 class="text-weight-800 text-white margin-bottom-20px sm-margin-bottom-5px">
                                        Home for your Podcast
                                    </h5>
                                    <img class="margin-bottom-20px" src="images/separator-light.png" alt=""/>
                                    <p class="no-margin">
                                        <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                        With Your-Cast platform you receive, strong application for create and update your podcast ecosystem.
                                        Import from another services, and work with YouTube, Apple Podcast, Spotify.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    @widget('newslater')--}}
{{--    @widget('pricing')--}}
    @widget('popular')
    @widget('contact')
    @widget('footer')
@endsection
