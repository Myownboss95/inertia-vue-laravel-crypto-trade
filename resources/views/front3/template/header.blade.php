<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from zytheme.com/demos/cryptech/home-blockchain.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Oct 2022 19:18:08 GMT -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bitcoin And Crypto Currency Html5 Template">
    <link href="assets/images/favicon/favicon.png" rel="icon">

    <link
        href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600,600i,700%7CRoboto:300i,400,400i,500,500i,700"
        rel="stylesheet" type="text/css">

    <link href="{{ asset('front3/css/external.css') }}" rel="stylesheet">
    <link href="{{ asset('front3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front3/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('front3/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front3/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front3/revolution/css/navigation.css') }}">

    @stack('css')

    <!--[if lt IE 9]>
      <script src="{{ asset('front3/js/html5shiv.js') }}"></script>
      <script src="{{ asset('front3/js/respond.min.js') }}"></script>
    <![endif]-->
    @client()

    <title>{{ config('app.name') }} | @yield('title')</title>
</head>

<body>
    <div class="preloader">
        <div class="signal"></div>
    </div>
    <div id="wrapper" class="wrapper clearfix">
