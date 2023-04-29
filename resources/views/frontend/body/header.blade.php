<header class="header">
    <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="contact">
                        <p><span class="phone"><a href="#">Phone: +880151000222</a></span><span class="email"><a href="#">Email: sadid.islam@g.bracu.ac.bd</a></span></p>
                    </div>
                </div>
                @auth
                    <div class="col-md-4 col-sm-4">
                        <div class="join-us">
                            <p><a href="{{route('dashboard')}}">Profile</a></p>
                        </div>
                    </div>
                @else
                    <div class="col-md-2 col-sm-2">
                        <div class="join-us">
                            <p><a href="{{route('login')}}">Login</a></p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="join-us">
                            <p><a href="{{url('/register')}}">Join Us</a></p>
                        </div>
                    </div>
                @endauth

            </div>
        </div>
    </section>
    <section class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <a href="{{url('/')}}">
                        <div class="main-logo">
                            <img src="{{asset('frontend_landing/img/main-logo.png')}}" alt="">
                            <h2>Shelter</h2>
                        </div>
                    </a>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{url('/')}}">HOME</a></li>
                            <li><a href="#foundation">Foundation</a></li>
                            <li><a href="#activity">Activities</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
