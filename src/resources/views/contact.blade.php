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
    @widget('contact')
    @widget('footer')
@endsection
