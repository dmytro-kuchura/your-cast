<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="text" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    @vite('resources/js/app.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<a href="javascript:" id="return-to-top">
    <p class="text-weight-500 text-extra-large text-green">Scroll to top.
        <span class="text-gray-light" data-uk-icon="icon: arrow-right; ratio: 2"></span>
    </p>
</a>
@widget('header')
<div id="counter" class="bg-black">
    <div class="row no-margin no-padding">
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 center-col text-center no-margin no-padding"
             data-uk-scrollspy="target: > img; cls: uk-animation-slide-bottom-medium; delay: 200">
            <img src="images/backgrounds/bg-03.jpg" alt=""/>
        </div>
        <div
            class="col-lg-7 col-md-12 col-sm-12 col-xs-12 no-margin no-padding uk-flex uk-flex-middle md-padding-top-100px md-padding-bottom-100px md-padding-left-15px md-padding-right-15px">
            <div class="container-small">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-col text-center">
                        <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                            <div class="text-left margin-bottom-50px">
                                <h5 class="text-weight-800 text-white margin-bottom-20px sm-margin-bottom-5px">We are
                                    also a podcast studio. Your ideas deserve a voice, we'll give you the platform.</h5>

                                <img class="margin-bottom-20px" src="images/separator-light.png" alt=""/>
                                <p class="no-margin"><span class="text-green margin-right-10px"
                                                           data-uk-icon="icon: info; ratio: 1"></span>The studio is
                                    equipped with multiple microphones and headphones to accommodate several guests or
                                    hosts, and a mixing board is used to balance the levels of each speaker's voice.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="shows" class="padding-top-bottom-100px bg-gray-extra-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-col text-center">
                <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                    <div class="text-center margin-bottom-50px">
                        <h5 class="text-weight-800 text-white margin-bottom-20px sm-margin-bottom-5px">More Podi
                            Shows.</h5>
                        <img class="margin-bottom-20px" src="images/separator-light.png" alt=""/>
                        <p class="no-margin">
                            <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                            Lorem ipsum dolor simet actually some words and stuff.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-col text-center">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 center-col text-left margin-auto">
                        <div class="position-relative width-100">
                            <ul class="uk-child-width-expand tab-spread padding-bottom-50px md-no-padding-bottom"
                                data-uk-tab="animation: uk-animation-fade"
                                data-uk-scrollspy="target: > li; cls: uk-animation-scale-up; delay: 200">
                                <li class="text-center">
                                    <a href="#">
                                        <img alt="" class="border-radius-10 margin-bottom-20px hover-img"
                                             src="/images/thumbnails/5.jpg"/>
                                    </a>
                                    <p class="text-weight-500 text-extra-large text-gray-light sm-hidden margin-bottom-20px">
                                        The Avery Davis Podcast
                                    </p>
                                    <p class="sm-hidden no-margin-bottom">
                                        <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                        Avery Davis.
                                    </p>
                                </li>
                                <li class="text-center">
                                    <a href="#">
                                        <img alt="" class="border-radius-10 margin-bottom-20px hover-img"
                                             src="/images/thumbnails/6.jpg"/>
                                    </a>
                                    <p class="text-weight-500 text-extra-large text-gray-light sm-hidden">Celebrity
                                        Talks Podcast</p>
                                    <p class="sm-hidden no-margin-bottom">
                                        <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                        Rita Nora.
                                    </p>
                                </li>
                                <li class="text-center">
                                    <a href="#">
                                        <img alt="" class="border-radius-10 margin-bottom-20px hover-img" src="images/thumbnails/7.jpg"/>
                                    </a>
                                    <p class="text-weight-500 text-extra-large text-gray-light sm-hidden">
                                        The Circles of Life Podcast
                                    </p>
                                    <p class="sm-hidden no-margin-bottom">
                                        <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                        Jake Moore.
                                    </p>
                                </li>
                                <li class="text-center">
                                    <a href="#">
                                        <img alt="" class="border-radius-10 margin-bottom-20px hover-img" src="images/thumbnails/8.jpg"/>
                                    </a>
                                    <p class="text-weight-500 text-extra-large text-gray-light sm-hidden">
                                        Life is Wow Female Podcast
                                    </p>
                                    <p class="sm-hidden no-margin-bottom">
                                        <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                        Sheila Ham.
                                    </p>
                                </li>
                                <li class="text-center">
                                    <a href="#">
                                        <img alt="" class="border-radius-10 margin-bottom-20px hover-img" src="images/thumbnails/9.jpg"/>
                                    </a>
                                    <p class="text-weight-500 text-extra-large text-gray-light sm-hidden">
                                        My Thoughts Exactly Podcast
                                    </p>
                                    <p class="sm-hidden no-margin-bottom">
                                        <span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>
                                        John Baker.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--@widget('pricing')--}}
<div id="clients" class="padding-top-bottom-100px bg-black">
    <div class="container">
        <div class="row no-margin no-padding">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 center-col">
                <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                    <div class="text-left">
                        <h5 class="text-weight-800 text-white margin-bottom-20px sm-margin-bottom-5px">Podcasting made
                            simple. Our partners get the highest quality services.</h5>
                        <img class="margin-bottom-20px" src="images/separator-light.png" alt=""/>
                        <p><span class="text-green margin-right-10px" data-uk-icon="icon: info; ratio: 1"></span>The
                            studio is equipped with multiple microphones and headphones to accommodate several guests or
                            hosts, and a mixing board is used to balance the levels of each speaker's voice.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 center-col uk-flex uk-flex-middle md-padding-top-100px">
                <div data-uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-medium; delay: 200">
                    <p class="text-center no-margin">
                        <span class="text-green text-center margin-right-10px"
                              data-uk-icon="icon: info; ratio: 1"></span>
                        Popular shows:
                    </p>
                    <div
                        class="separator width-50 center-col bottom-border border-1px border-color-gray-extra-dark margin-top-50px margin-bottom-50px"></div>
                    <div class="row text-center margin-auto">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <img class="opacity-7" alt="" src="images/clients/logo-9.png"/>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <img class="opacity-7" alt="" src="images/clients/logo-10.png"/>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <img class="opacity-7" alt="" src="images/clients/logo-11.png"/>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <img class="opacity-7" alt="" src="images/clients/logo-12.png"/>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <img class="opacity-7" alt="" src="images/clients/logo-13.png"/>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <img class="opacity-7" alt="" src="images/clients/logo-14.png"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@widget('contact')
@widget('footer')
@vite('resources/sass/app.scss')
</body>
</html>
