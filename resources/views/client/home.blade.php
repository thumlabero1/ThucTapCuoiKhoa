@extends('client.main')
@section('header')
    <link rel="stylesheet" type="text/css" href="/template/client/countdown/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/template/client/countdown/css/media-query.css" />
@endsection
@section('content')
    <!-- Slider -->
    @include('client.slider')
    @include('client.countdown')
    <!-- Banner -->
    @include('client.banner')
    @include('client.home_slide_product')
    @include('client.home_blog')
@endsection
@section('footer')
    <script src="/template/client/countdown/js/jquery.countdown.js"></script>
    <script src="/template/client/countdown/js/jquery.parallax.js"></script>
    <script src="/template/client/countdown/js/snow.js"></script>
    <script src="/template/client/countdown/js/main.js"></script>
    <script>
        // Parallax Init
        $('#christmas_scene').parallax({
            scalarX: 5,
            scalarY: 15,
            invertY: false
        });
    </script>
    <iframe src="http://www.nhaccuatui.com/mh/background/sbohdqKBRkXO" width="1" height="1" frameborder="0"
        allowfullscreen></iframe>
@endsection
