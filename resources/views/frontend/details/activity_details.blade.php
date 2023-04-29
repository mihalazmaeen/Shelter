<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Flipmart premium HTML5 & CSS3 Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('details/assets/css/bootstrap.min.css')}}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('details/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('details/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('details/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('details/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('details/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('details/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('details/assets/css/bootstrap-select.min.css')}}">




    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('details/assets/css/font-awesome.css')}}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend_landing/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/responsive.css')}}">


</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')
<!-- ============================================== HEADER : END ============================================== -->

@php

@endphp
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-12">
                    <div class="blog-post wow fadeInUp">
                        <img class="img-responsive" style="height: 600px; width: 100%" src="{{asset($activity->image)}}" alt="">
                        <h1>{{$activity->title}}</h1>
                        <span class="author">{{$activity->user->name}}</span>

                        <span class="date-time">{{$activity->created_at->format('l jS \\of F Y h:i:s A') }}</span>
                        <p>{{$activity->description}}</p>


                    </div>

                    @php
                        $comments=\App\Models\Comment::where('activity_id',$activity->id)->get();
                    @endphp
                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <h2>Comments</h2>
                        @foreach($comments as $item)

                            <div class="blog-comments-responce outer-top-xs ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2">
                                        <h4>{{$item->name}}</h4>
                                    </div>
                                    <div class="col-md-10 col-sm-10 outer-bottom-xs">
                                        <div class="blog-sub-comments inner-bottom-xs">
                                            <h4>{{$item->title}}</h4>
                                            <p>{{$item->comment}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach
                    </div>



                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <form method="post" action="{{route('activity.comment')}}">
                            @csrf
                            <input type="hidden" name="activity_id" value="{{$activity->id}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Leave A Comment</h4>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                        <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                        <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                        <input type="text" name="title" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
                                    </div>

                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                        <textarea name="comment" class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
                                    </div>

                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
@php
    $activities=\App\Models\Activity::with('user','foundation')->latest()->take(5)->get();
    $foundations=\App\Models\Foundation::with('user')->get();
@endphp

@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->


<!-- For demo purposes – can be removed on production -->


<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('details/assets/js/jquery-1.11.1.min.js')}}"></script>

<script src="{{asset('details/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('details/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('details/assets/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('details/assets/js/echo.min.js')}}"></script>
<script src="{{asset('details/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('details/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('details/assets/js/jquery.rateit.min.js')}}"></script>
<script type="{{asset('details/text/javascript" src="assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('details/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('details/assets/js/wow.min.js')}}"></script>
<script src="{{asset('details/assets/js/scripts.js')}}"></script>
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
