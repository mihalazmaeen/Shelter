@extends('frontend.landing_master')
@section('content')

    @php
        $activities=\App\Models\Activity::with('user','foundation')->get();
        $foundations=\App\Models\Foundation::with('user')->get();
    @endphp

    <section class="our_cuauses" id="foundation">
        <h2>OUR Foundations</h2>
        <p>Check Our Amazing Foundations. </p>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="our_cuauses_single owl-carousel owl-theme">
                        @foreach($foundations as $foundation)
                            <div class="item">
                                <img src="{{asset($foundation->image)}}" href="{{url('foundations/details/'.$foundation->id)}}" style="height: 250px; width: 436px" alt="">
                                <div class="for_padding">
                                    <h2 class="text-center">{{$foundation->name}}</h2>
                                    <p class="text-center text-dark" style="margin-top: 0px !important;">{{$foundation->motto}}</p>
                                    <p style="margin-top: 10px !important;">
                                        {{Illuminate\Support\Str::of($foundation->description)->words(15, '...')}}
                                    </p>

                                    <h2 class="borderes"><a href="{{url('foundations/details/'.$foundation->id)}}">DONATE NOW</a></h2>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_activity" id="activity">




        <h2>OUR ACTIVITY</h2>
        <p>Check Our Recent Activities. </p>
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







    <div class="clear"></div>




    <script>
        let p = document.querySelector('p');
        let maxLength = 100;

        if (p.textContent.length > maxLength) {
            p.textContent = p.textContent.slice(0, maxLength) + '...';
        }
    </script>






@endsection
