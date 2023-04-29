@php
    $activities=\App\Models\Activity::with('user','foundation')->latest()->take(5)->get();
    $foundations=\App\Models\Foundation::with('user')->get();
@endphp
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="footer-charity-text">
                    <h2>HELP CHARITY</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </p>
                    <hr>

                </div>
            </div>
            <div class="col-md-8">
                <div class="row">

                    <div class="col-md-6 col-sm-3">
                        <div class="footer-text two">
                            <h3>USEFUL LINKS</h3>
                            <ul>
                                <li class="active"><a href="{{url('/')}}">HOME</a></li>
                                <li><a href="#foundation">Foundation</a></li>
                                <li><a href="#activity">Activities</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4">
                        <div class="footer-text one">
                            <h3>CONTACT US</h3>
                            <ul>
                                <li><a href="#"><i class="material-icons">location_on</i>1 Street, derby, FL 2147, USA</a></li>
                                <li><a href="#"><i class="material-icons">email</i>fuu@gmail.com</a></li>
                                <li><a href="#"><i class="material-icons">call</i>+123456789</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
