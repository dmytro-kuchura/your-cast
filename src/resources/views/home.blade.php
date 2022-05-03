@extends('layouts.app')

@section('title', 'Your-Cast')
@section('description', 'Your-Cast')
@section('keywords', 'Your-Cast')

@section('content')
    @widget('slider')
    @widget('about')
    @widget('newslater')
{{--    @widget('pricing')--}}
{{--    @widget('blog')--}}
    @widget('contact')
@endsection
