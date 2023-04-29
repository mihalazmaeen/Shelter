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
    <link rel="stylesheet" href="{{asset('frontend_landing/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_landing/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend_landing/responsive.css')}}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('frontend_landing/style.css')}}">
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


    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        /**
     * The CSS shown here will not be introduced in the Quickstart guide, but shows
     * how you can use CSS to style your Element's container.
     */
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;}
        div.stars {

            width: 270px;

            display: inline-block;

        }

        .mt-200{
            margin-top:200px;
        }

        input.star { display: none; }



        label.star {

            float: right;

            padding: 10px;

            font-size: 36px;

            color: #4A148C;

            transition: all .2s;

        }



        input.star:checked ~ label.star:before {

            content: '\f005';

            color: #FD4;

            transition: all .25s;

        }


        input.star-5:checked ~ label.star:before {

            color: #FE7;

            text-shadow: 0 0 20px #952;

        }



        input.star-1:checked ~ label.star:before { color: #F62; }



        label.star:hover { transform: rotate(-15deg) scale(1.3); }



        label.star:before {

            content: '\f006';

            font-family: FontAwesome;

        }
    </style>


</head>
<body class="cnt-home">
@php
    $activities=\App\Models\Activity::with('user','foundation')->latest()->take(5)->get();
    $foundations=\App\Models\Foundation::with('user')->get();
@endphp
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')
<!-- ============================================== HEADER : END ============================================== -->


<div class="body-content">
    <div class="container-fluid">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-6">
                    <div class="blog-post wow fadeInUp">
                        <img class="img-responsive" style="height: 350px; width: 100%" src="{{asset($foundation->image)}}" alt="">
                        <h1 class="text-center">Foundation Name: {{$foundation->name}}</h1>
                        <h1  class="text-center">Foundation Motto: {{$foundation->motto}}</h1>
                        <h4  class="text-center">Rating: {{round($rating,1)}}</h4>
                        <span class="author">{{$foundation->user->name}}</span>

                        <span class="date-time">{{$foundation->created_at->format('l jS \\of F Y h:i:s A') }}</span>
                        <p>{{$foundation->description}}</p>
                    </div>
                    @php
                        $review=\App\Models\Review::where('foundation_id',$foundation->id)->with('user')->latest()->limit(5)->get();
                        $comment=\App\Models\Review::where('foundation_id',$foundation->id)->get();
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-review-comments">{{count($comment)}} comments</h3>
                        </div>


                        <div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
                            @foreach($review as $item)
                            <div class="blog-comments-responce outer-top-xs ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2">
                                        <img src="{{url('upload/user_images/'.$item->user->profile_photo_path)}}" alt="Responsive image" class="img-rounded img-responsive">
                                    </div>
                                    <div class="col-md-10 col-sm-10 outer-bottom-xs">
                                        <div class="blog-sub-comments inner-bottom-xs">
                                            <h4>{{$item->user->name}}</h4>


                                            <p>{{$item->comment}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>




                    </div>

                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Leave A Review</h4>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user())

                                @php
                                    $user_review=\App\Models\Review::where('foundation_id',$foundation->id)->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->with('user')->get();
                                @endphp

                                @if(count($user_review)>1)
                                    <div class="col-md-12">
                                        <h3>You have submitted a review</h3>
                                    </div>
                                @else
                                    <form method="post" action="{{route('foundation.review')}}">
                                        @csrf
                                        <input type="hidden" name="foundation_id" value="{{$foundation->id}}">
                                        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">

                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="stars">
                                                        <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                                                        <label class="star star-5" for="star-5"></label>
                                                        <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                                                        <label class="star star-4" for="star-4"></label>
                                                        <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                                                        <label class="star star-3" for="star-3"></label>
                                                        <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                                                        <label class="star star-2" for="star-2"></label>
                                                        <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                                                        <label class="star star-1" for="star-1"></label>
                                                    </div>



                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                                <textarea name="comment" class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
                                            </div>

                                        </div>
                                        <div class="col-md-12 outer-bottom-small m-t-20">
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Review</button>
                                        </div>
                                    </form>
                                @endif







                            @else
                                <div class="col-md-12">
                                    <h3>Please log in to submit a review</h3>
                                </div>
                            @endif

                        </div>
                    </div>
                    </div>
                                <div class="col-md-6 sidebar">
                                    <div class="sidebar-module-container">



                                        <!-- ==============================================CATEGORY============================================== -->
                                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                            <h3 class="section-title text-center">Donate</h3>
                                            <div class="card mt-2 mb-2">
                                                <h4 class="text-center">Top Donors</h4>
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Name</th>
                                                        <th scope="col" class="text-center">Donations</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $top_donors= \App\Models\Donation::select('donations.name', \Illuminate\Support\Facades\DB::raw('SUM(donations.amount) as total_donations'))->where('foundation_id',$foundation->id)->groupBy('donations.phone')->orderByDesc('total_donations')->limit(3)->get();
                                                    @endphp
                                                    @foreach($top_donors as $donors)
                                                    <tr>
                                                        <td class="text-center">{{$donors->name}}</td>
                                                        <td class="text-center">{{$donors->total_donations}}</td>
                                                    </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="sidebar-widget-body m-t-10">

                                                <div class="accordion">
                                                    <div class="card">
                                                        <h4>Using Card</h4>
                                                        <form action="{{route('stripe.donation')}}" method="post" id="payment-form">
                                                            @csrf
                                                            <div class="form-row">

                                                                <label for="card-element">
                                                                    Credit or debit card
                                                                                                                                        <input type="hidden" name="foundation_id" value="{{$foundation->id}}">

                                                                </label>
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Your Name<span>*</span></label>
                                                                    <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter name" value="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Your Email<span>*</span></label>
                                                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Email" value="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Your Phone<span>*</span></label>
                                                                    <input type="text" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter phone" value="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Donation Amount<span>*</span></label>
                                                                    <input type="number" name="amount" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter amount" value="" required>
                                                                </div>

                                                                <div id="card-element">

                                                                    <!-- A Stripe Element will be inserted here. -->
                                                                </div>
                                                                <!-- Used to display form errors. -->
                                                                <div id="card-errors" role="alert"></div>
                                                            </div>
                                                            <br>
                                                            <button class="btn btn-primary">Submit Donation</button>
                                                        </form>
                                                    </div>
                                                    <div class="card">
                                                        <h4>Using Bkash</h4>
                                                        <form action="{{route('bkash.donation')}}" method="post" id="payment-form">
                                                            @csrf
                                                            <input type="hidden" name="foundation_id" value="{{$foundation->id}}">
                                                            <div class="form-row">

                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1">Send Money to this Number: 01883260341<span></span></label>
                                                                    <label class="info-title" for="exampleInputEmail1">Then Enter The Transaction ID<span>*</span></label>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Your Name<span>*</span></label>
                                                                    <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter name" value="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Your Email<span>*</span></label>
                                                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Email" value="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Your Phone<span>*</span></label>
                                                                    <input type="text" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter phone" value="" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Donation Amount<span>*</span></label>
                                                                    <input type="number" name="amount" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter amount" value="" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="info-title" for="exampleInputEmail1"> Bkash Transaction ID<span>*</span></label>
                                                                    <input type="text" name="bkash_transaction" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter TID" value="" required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <button class="btn btn-primary">Submit Donation</button>
                                                        </form>
                                                    </div>







                                                </div><!-- /.accordion -->
                                            </div><!-- /.sidebar-widget-body -->
                                        </div><!-- /.sidebar-widget -->

                                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                                       <!-- /.sidebar-widget -->
                                        <!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
                                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog-page">
                <div class="col-md-12">
                    <section class="our_activity">


                        @php
                            $activities=\App\Models\Activity::with('user','foundation')->where('foundation_id',$foundation->id)->get();

                        @endphp

                        <h2 class="text-center">OUR ACTIVITY</h2>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua. </p>
                        <div class="container">
                            <div class="row">
                                @foreach($activities as $activity)
                                    <div class="col-md-4 col-xs-12">
                                        <div class="single-Promo" >
                                            <div class="promo-icon">
                                                <img src="{{asset($activity->image)}}" style="height: 70px; width: 100px">
                                            </div>
                                            <h2 class="text-center"><a href="{{url('activities/details/'.$activity->id)}}">{{$activity->title}}</a></h2>
                                            <p>
                                                {{Illuminate\Support\Str::of($activity->description)->words(15, '...')}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->


<!-- For demo purposes – can be removed on production -->


<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51K411CAS0IFiYWoIUDy8Brvqx45QoGChvqVWi4ils3bqLtfZt2tw1gPMvCxDta4u2AvG6d8yU5PE0XrDqhnWvoAe00NyDRyNrc');
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>



</body>
</html>
