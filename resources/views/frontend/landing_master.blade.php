<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front page</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend_landing/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/responsive.css')}}">
</head>

<body>
@php
    $activities=\App\Models\Activity::with('user','foundation')->latest()->take(5)->get();
    $foundations=\App\Models\Foundation::with('user')->get();
@endphp
<div class="wrapper">
{{--  Header starts--}}
    @include('frontend.body.header')
{{--Slider Starts--}}
    @include('frontend.body.slider')


    @yield('content')



{{--   Footer--}}
    @include('frontend.body.footer')
</div>
<script src="{{asset('frontend_landing/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('frontend_landing/js/animationCounter.js')}}"></script>
<script src="{{asset('frontend_landing/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend_landing/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend_landing/js/active.js')}}"></script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>

</body>

</html>
